<?php
/**
 * API Controller for The Way of Hope
 */

require_once '../app/core/BaseController.php';

class ApiController extends BaseController {
    
    public function setLanguage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $language = $input['language'] ?? $_GET['lang'] ?? '';
        } else {
            $language = $_GET['lang'] ?? '';
        }
        
        if (in_array($language, SUPPORTED_LANGUAGES)) {
            $this->language::setLanguage($language);
            $this->jsonResponse(['success' => true, 'language' => $language]);
        } else {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid language'], 400);
        }
    }
    
    public function contact() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
            return;
        }
        
        // Validate CSRF token
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrfToken)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid CSRF token'], 403);
            return;
        }
        
        // Sanitize input
        $name = Security::sanitizeInput($_POST['name'] ?? '');
        $email = Security::sanitizeInput($_POST['email'] ?? '');
        $phone = Security::sanitizeInput($_POST['phone'] ?? '');
        $subject = Security::sanitizeInput($_POST['subject'] ?? '');
        $message = Security::sanitizeInput($_POST['message'] ?? '');
        
        // Validate required fields
        if (empty($name) || empty($email) || empty($message)) {
            $this->jsonResponse(['success' => false, 'message' => 'Required fields missing'], 400);
            return;
        }
        
        // Validate email
        if (!Security::validateEmail($email)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid email address'], 400);
            return;
        }
        
        // Save to database
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message
        ];
        
        $result = $this->db->query(
            "INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)",
            array_values($data)
        );
        
        if ($result) {
            $this->jsonResponse(['success' => true, 'message' => 'Message sent successfully']);
        } else {
            $this->jsonResponse(['success' => false, 'message' => 'Failed to send message'], 500);
        }
    }
    
    public function volunteer() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
            return;
        }
        
        // Validate CSRF token
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrfToken)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid CSRF token'], 403);
            return;
        }
        
        // Sanitize input
        $firstName = Security::sanitizeInput($_POST['first_name'] ?? '');
        $lastName = Security::sanitizeInput($_POST['last_name'] ?? '');
        $email = Security::sanitizeInput($_POST['email'] ?? '');
        $phone = Security::sanitizeInput($_POST['phone'] ?? '');
        $address = Security::sanitizeInput($_POST['address'] ?? '');
        $skills = Security::sanitizeInput($_POST['skills'] ?? '');
        $interests = Security::sanitizeInput($_POST['interests'] ?? '');
        
        // Validate required fields
        if (empty($firstName) || empty($lastName) || empty($email)) {
            $this->jsonResponse(['success' => false, 'message' => 'Required fields missing'], 400);
            return;
        }
        
        // Validate email
        if (!Security::validateEmail($email)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid email address'], 400);
            return;
        }
        
        // Save to database
        $data = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'skills' => $skills,
            'interests' => $interests
        ];
        
        $result = $this->db->query(
            "INSERT INTO volunteers (first_name, last_name, email, phone, address, skills, interests) VALUES (?, ?, ?, ?, ?, ?, ?)",
            array_values($data)
        );
        
        if ($result) {
            $this->jsonResponse(['success' => true, 'message' => 'Volunteer application submitted successfully']);
        } else {
            $this->jsonResponse(['success' => false, 'message' => 'Failed to submit application'], 500);
        }
    }
    
    public function donation() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
            return;
        }
        
        // Validate CSRF token
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Security::verifyCSRFToken($csrfToken)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid CSRF token'], 403);
            return;
        }
        
        // Sanitize input
        $donorName = Security::sanitizeInput($_POST['donor_name'] ?? '');
        $donorEmail = Security::sanitizeInput($_POST['donor_email'] ?? '');
        $amount = floatval($_POST['amount'] ?? 0);
        $paymentMethod = Security::sanitizeInput($_POST['payment_method'] ?? '');
        $programId = intval($_POST['program_id'] ?? 0);
        $isRecurring = isset($_POST['is_recurring']);
        
        // Validate required fields
        if (empty($donorName) || empty($donorEmail) || $amount <= 0 || empty($paymentMethod)) {
            $this->jsonResponse(['success' => false, 'message' => 'Required fields missing or invalid'], 400);
            return;
        }
        
        // Validate email
        if (!Security::validateEmail($donorEmail)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid email address'], 400);
            return;
        }
        
        // Save to database
        $data = [
            'donor_name' => $donorName,
            'donor_email' => $donorEmail,
            'amount' => $amount,
            'payment_method' => $paymentMethod,
            'program_id' => $programId > 0 ? $programId : null,
            'is_recurring' => $isRecurring
        ];
        
        $result = $this->db->query(
            "INSERT INTO donations (donor_name, donor_email, amount, payment_method, program_id, is_recurring) VALUES (?, ?, ?, ?, ?, ?)",
            array_values($data)
        );
        
        if ($result) {
            $donationId = $this->db->lastInsertId();
            
            // Here you would integrate with payment gateways
            // For now, we'll just return success
            $this->jsonResponse([
                'success' => true, 
                'message' => 'Donation recorded successfully',
                'donation_id' => $donationId
            ]);
        } else {
            $this->jsonResponse(['success' => false, 'message' => 'Failed to process donation'], 500);
        }
    }
}
