<?php
/**
 * Admin Controller - authentication and dashboard
 */

require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/UserModel.php';

class AdminController extends BaseController {
    private UserModel $users;

    public function __construct() {
        parent::__construct();
        $this->users = new UserModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $identifier = Security::sanitizeInput($_POST['identifier'] ?? '');
            $password = $_POST['password'] ?? '';
            $csrfToken = $_POST['csrf_token'] ?? '';

            if (!Security::verifyCSRFToken($csrfToken)) {
                return $this->render('admin/login', [
                    'error' => 'Invalid request. Please try again.',
                    'pageTitle' => 'Admin Login'
                ]);
            }

            $user = $this->users->findByUsernameOrEmail($identifier);
            
            if ($user && Security::verifyPassword($password, $user['password'])) {
                
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_user_id'] = $user['id'];
                $_SESSION['admin_role'] = $user['role'];

                return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin');
            }

            return $this->render('admin/login', [
                'error' => 'Invalid credentials',
                'pageTitle' => 'Admin Login'
            ]);
        }

        $this->render('admin/login', [ 'pageTitle' => 'Admin Login' ]);
    }

    public function logout() {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();
        $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/login');
    }

    public function dashboard() {
        Security::requireLogin();
        $stats = [
            'donations' => $this->db->fetch("SELECT COALESCE(SUM(amount),0) as total FROM donations WHERE payment_status='completed'")['total'] ?? 0,
            'volunteers' => $this->db->fetch("SELECT COUNT(*) as c FROM volunteers")['c'] ?? 0,
            'posts' => $this->db->fetch("SELECT COUNT(*) as c FROM posts")['c'] ?? 0,
            'orders' => $this->db->fetch("SELECT COUNT(*) as c FROM orders")['c'] ?? 0,
        ];

        $this->render('admin/dashboard', [
            'stats' => $stats,
            'pageTitle' => 'Admin Dashboard'
        ]);
    }

    public function content() {
        Security::requireLogin();
        $this->render('admin/content', [ 'pageTitle' => 'Manage Content' ]);
    }

    public function volunteers() {
        Security::requireLogin();
        $volunteers = $this->db->fetchAll("SELECT * FROM volunteers ORDER BY registration_date DESC");
        $this->render('admin/volunteers', [ 'volunteers' => $volunteers, 'pageTitle' => 'Volunteers' ]);
    }

    public function exportVolunteersCSV() {
        Security::requireLogin();
        $volunteers = $this->db->fetchAll("SELECT * FROM volunteers ORDER BY registration_date DESC");
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="volunteers.csv"');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['First Name','Last Name','Email','Phone','Status','Registered']);
        foreach ($volunteers as $v) {
            fputcsv($out, [$v['first_name'],$v['last_name'],$v['email'],$v['phone'],$v['status'],$v['registration_date']]);
        }
        fclose($out);
        exit;
    }

    public function updateVolunteerStatus($matches) {
        Security::requireLogin();
        $id = intval($matches[1] ?? 0);
        $status = $_POST['status'] ?? 'pending';
        $this->db->query("UPDATE volunteers SET status = ? WHERE id = ?", [$status, $id]);
        $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/volunteers');
    }

    public function donations() {
        Security::requireLogin();
        $donations = $this->db->fetchAll("SELECT * FROM donations ORDER BY created_at DESC");
        $this->render('admin/donations', [ 'donations' => $donations, 'pageTitle' => 'Donations' ]);
    }

    public function updateDonationStatus($matches) {
        Security::requireLogin();
        $id = intval($matches[1] ?? 0);
        $status = $_POST['payment_status'] ?? 'pending';
        $this->db->query("UPDATE donations SET payment_status = ? WHERE id = ?", [$status, $id]);
        $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/donations');
    }

    public function store() {
        Security::requireLogin();
        $orders = $this->db->fetchAll("SELECT * FROM orders ORDER BY created_at DESC");
        $this->render('admin/store', [ 'orders' => $orders, 'pageTitle' => 'Store' ]);
    }

    public function updateOrderStatus($matches) {
        Security::requireLogin();
        $id = intval($matches[1] ?? 0);
        $status = $_POST['order_status'] ?? 'pending';
        $this->db->query("UPDATE orders SET order_status = ? WHERE id = ?", [$status, $id]);
        $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/store');
    }
}


