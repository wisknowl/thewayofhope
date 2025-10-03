<?php
/**
 * AdminUsersController - CRUD for admin users with roles
 */

require_once __DIR__ . '/../core/BaseController.php';
require_once __DIR__ . '/../models/UserModel.php';

class AdminUsersController extends BaseController {
    private UserModel $users;

    public function __construct() {
        parent::__construct();
        Security::requireLogin();
        $this->users = new UserModel();
    }

    public function index() {
        $all = $this->users->findAll([], 'created_at DESC');
        $this->render('admin/users/index', [ 'users' => $all, 'pageTitle' => 'Admin Users' ]);
    }

    public function create() {
        $this->render('admin/users/form', [ 'mode' => 'create', 'pageTitle' => 'Create Admin User' ]);
    }

    public function store() {
        $csrf = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrf)) {
            return $this->render('admin/users/form', [ 'mode' => 'create', 'error' => 'Invalid CSRF', 'pageTitle' => 'Create Admin User' ]);
        }

        $username = Security::sanitizeInput($_POST['username'] ?? '');
        $email = Security::sanitizeInput($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = Security::sanitizeInput($_POST['role'] ?? 'editor');

        // Validate required fields
        if (empty($username) || empty($email) || empty($password)) {
            return $this->render('admin/users/form', [ 'mode' => 'create', 'error' => 'All fields are required', 'pageTitle' => 'Create Admin User' ]);
        }

        // Check if username or email already exists
        $existing = $this->users->findByUsernameOrEmail($username);
        if ($existing) {
            return $this->render('admin/users/form', [ 'mode' => 'create', 'error' => 'Username or email already exists', 'pageTitle' => 'Create Admin User' ]);
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => Security::hashPassword($password),
            'role' => $role
        ];

        $id = $this->users->create($data);
        if ($id) return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/users');
        
        $this->render('admin/users/form', [ 'mode' => 'create', 'error' => 'Failed to create user', 'pageTitle' => 'Create Admin User' ]);
    }

    public function edit($matches) {
        $id = intval($matches[1] ?? 0);
        $user = $this->users->find($id);
        if (!$user) return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/users');
        $this->render('admin/users/form', [ 'mode' => 'edit', 'user' => $user, 'pageTitle' => 'Edit Admin User' ]);
    }

    public function update($matches) {
        $id = intval($matches[1] ?? 0);
        $csrf = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrf)) {
            $user = $this->users->find($id);
            return $this->render('admin/users/form', [ 'mode' => 'edit', 'user' => $user, 'error' => 'Invalid CSRF', 'pageTitle' => 'Edit Admin User' ]);
        }

        $username = Security::sanitizeInput($_POST['username'] ?? '');
        $email = Security::sanitizeInput($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = Security::sanitizeInput($_POST['role'] ?? 'editor');

        // Validate required fields
        if (empty($username) || empty($email)) {
            $user = $this->users->find($id);
            return $this->render('admin/users/form', [ 'mode' => 'edit', 'user' => $user, 'error' => 'Username and email are required', 'pageTitle' => 'Edit Admin User' ]);
        }

        $data = [
            'username' => $username,
            'email' => $email,
            'role' => $role
        ];

        // Only update password if provided
        if (!empty($password)) {
            $data['password'] = Security::hashPassword($password);
        }

        $this->users->update($id, $data);
        return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/users');
    }

    public function delete($matches) {
        $id = intval($matches[1] ?? 0);
        
        // Prevent deleting the current user
        if ($id == ($_SESSION['admin_user_id'] ?? 0)) {
            return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/users');
        }
        
        $this->users->delete($id);
        return $this->redirect(dirname($_SERVER['SCRIPT_NAME']) . '/admin/users');
    }
}
