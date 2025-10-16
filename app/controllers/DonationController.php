<?php
/**
 * Donation Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class DonationController extends BaseController {
    
    public function index() {
        // Get programs for donation targeting
        $programs = $this->db->fetchAll("SELECT * FROM programs WHERE is_active = 1 ORDER BY name_en");
        
        // Get recent donations for display
        $recentDonations = $this->db->fetchAll("SELECT * FROM donations WHERE payment_status = 'completed' ORDER BY created_at DESC LIMIT 5");
        
        $data = [
            'programs' => $programs,
            'recentDonations' => $recentDonations,
            'pageTitle' => $this->translate('donate_title', 'Support Our Mission')
        ];
        
        $this->render('donation/index', $data);
    }
    
    public function success() {
        // Get parameters from PayPal redirect
        $donationId = $_GET['donation_id'] ?? '';
        $amount = $_GET['amount'] ?? '';
        $token = $_GET['token'] ?? '';
        $payerId = $_GET['PayerID'] ?? '';
        
        // If we have PayPal parameters, capture the payment
        if (!empty($token) && !empty($payerId) && !empty($donationId)) {
            try {
                // Create API controller instance to capture payment
                require_once '../app/controllers/ApiController.php';
                $apiController = new ApiController();
                
                // Capture the PayPal payment
                $captureResult = $apiController->capturePayPalPaymentFromSuccess($token, $donationId);
                
                if ($captureResult) {
                    // Payment captured successfully
                    $data = [
                        'success' => true,
                        'donation_id' => $donationId,
                        'amount' => $amount,
                        'paypal_order_id' => $token,
                        'message' => 'Payment completed successfully!'
                    ];
                } else {
                    // Payment capture failed
                    $data = [
                        'success' => false,
                        'donation_id' => $donationId,
                        'amount' => $amount,
                        'message' => 'Payment verification failed. Please contact support.'
                    ];
                }
            } catch (Exception $e) {
                // Error during payment capture
                $data = [
                    'success' => false,
                    'donation_id' => $donationId,
                    'amount' => $amount,
                    'message' => 'Payment verification error: ' . $e->getMessage()
                ];
            }
        } else {
            // No PayPal parameters, just show success page
            $data = [
                'success' => true,
                'donation_id' => $donationId,
                'amount' => $amount,
                'message' => 'Thank you for your donation!'
            ];
        }
        
        $this->render('donation/success', $data);
    }
    
    public function cancel() {
        $this->render('donation/cancel');
    }
    
    public function subscriptionSuccess() {
        // Get parameters from PayPal redirect
        $donationId = $_GET['donation_id'] ?? '';
        $subscriptionId = $_GET['subscription_id'] ?? '';
        $token = $_GET['token'] ?? ''; // PayPal subscription ID
        $ba_token = $_GET['ba_token'] ?? ''; // Billing agreement token
        
        if (!empty($subscriptionId)) {
            // Get subscription details
            $subscription = $this->db->fetch(
                "SELECT s.*, d.donor_name, d.donor_email FROM subscriptions s 
                 JOIN donors d ON s.donor_id = d.id 
                 WHERE s.id = ?",
                [$subscriptionId]
            );
            
            if ($subscription) {
                $data = [
                    'success' => true,
                    'subscription' => $subscription,
                    'donation_id' => $donationId,
                    'message' => 'Subscription activated successfully!'
                ];
            } else {
                $data = [
                    'success' => false,
                    'message' => 'Subscription not found'
                ];
            }
        } else {
            $data = [
                'success' => false,
                'message' => 'Invalid subscription parameters'
            ];
        }
        
        $this->render('donation/subscription-success', $data);
    }
    
    public function manageSubscription() {
        // This page requires the user to provide their email to lookup subscription
        $email = $_GET['email'] ?? $_POST['email'] ?? '';
        $subscription = null;
        
        if ($email) {
            // Find active subscription for this email
            $subscription = $this->db->fetch(
                "SELECT s.*, d.donor_name, d.donor_email FROM subscriptions s 
                 JOIN donors d ON s.donor_id = d.id 
                 WHERE d.donor_email = ? AND s.subscription_status = 'active' 
                 ORDER BY s.created_at DESC LIMIT 1",
                [$email]
            );
            
            if ($subscription) {
                // Get donation history for this subscription
                $donations = $this->db->fetchAll(
                    "SELECT * FROM donations WHERE subscription_id = ? ORDER BY created_at DESC",
                    [$subscription['id']]
                );
                $subscription['donations'] = $donations;
            }
        }
        
        $data = [
            'email' => $email,
            'subscription' => $subscription
        ];
        
        $this->render('donation/manage-subscription', $data);
    }
    
    public function cancelSubscription() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/subscription/manage');
            exit;
        }
        
        $subscriptionId = $_POST['subscription_id'] ?? '';
        $confirmEmail = $_POST['email'] ?? '';
        
        if (empty($subscriptionId) || empty($confirmEmail)) {
            $_SESSION['error'] = 'Missing required information';
            header('Location: ' . BASE_URL . '/subscription/manage');
            exit;
        }
        
        // Verify subscription belongs to this email
        $subscription = $this->db->fetch(
            "SELECT s.*, d.donor_email FROM subscriptions s 
             JOIN donors d ON s.donor_id = d.id 
             WHERE s.id = ? AND d.donor_email = ?",
            [$subscriptionId, $confirmEmail]
        );
        
        if (!$subscription) {
            $_SESSION['error'] = 'Subscription not found or email does not match';
            header('Location: ' . BASE_URL . '/subscription/manage?email=' . urlencode($confirmEmail));
            exit;
        }
        
        // Cancel subscription in PayPal
        try {
            require_once '../app/controllers/ApiController.php';
            $apiController = new ApiController();
            $result = $apiController->cancelPayPalSubscription($subscription['subscription_id']);
            
            if ($result) {
                // Update local database
                $this->db->query(
                    "UPDATE subscriptions SET subscription_status = 'cancelled' WHERE id = ?",
                    [$subscriptionId]
                );
                
                $_SESSION['success'] = 'Your subscription has been cancelled successfully';
            } else {
                $_SESSION['error'] = 'Failed to cancel subscription. Please contact support.';
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'Error cancelling subscription: ' . $e->getMessage();
        }
        
        header('Location: ' . BASE_URL . '/subscription/manage?email=' . urlencode($confirmEmail));
        exit;
    }
}
