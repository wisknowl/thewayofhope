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
            Language::setLanguage($language);
            
            // Redirect back to the referring page or homepage
            $redirectUrl = $_SERVER['HTTP_REFERER'] ?? dirname($_SERVER['SCRIPT_NAME']) . '/';
            header('Location: ' . $redirectUrl);
            exit;
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
        // echo "Donation API called";
        // return 1;
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
        
        // Handle anonymous donations - generate unique identifiers if name/email not provided
        $isAnonymous = false;
        if (empty($donorName) || empty($donorEmail)) {
            $uniqueId = uniqid('anon_', true);
            if (empty($donorName)) {
                $donorName = 'Anonymous Donor #' . substr($uniqueId, -8);
            }
            if (empty($donorEmail)) {
                $donorEmail = $uniqueId . '@anonymous.thewayofhope';
            }
            $isAnonymous = true;
        }
        
        // Validate email format (even for generated emails)
        if (!Security::validateEmail($donorEmail)) {
            $this->jsonResponse(['success' => false, 'message' => 'Invalid email address'], 400);
            return;
        }
        
        // Handle amount - prioritize custom amount if provided, otherwise use radio selection
        $customAmount = floatval($_POST['custom_amount'] ?? 0);
        $radioAmount = floatval($_POST['amount'] ?? 0);
        
        // Use custom amount if it's greater than 0, otherwise use radio selection
        if ($customAmount > 0) {
            $amount = $customAmount;
        } else {
            $amount = $radioAmount;
        }
        
        $paymentMethod = Security::sanitizeInput($_POST['payment_method'] ?? '');
        $programId = intval($_POST['program_id'] ?? 0);
        
        // Handle donation type conversion
        $donationType = Security::sanitizeInput($_POST['donation_type'] ?? 'one_time');
        $isRecurring = ($donationType === 'monthly');
        
        // Validate required fields (amount and payment method are always required)
        if ($amount <= 0 || empty($paymentMethod)) {
            $this->jsonResponse(['success' => false, 'message' => 'Required fields missing or invalid'], 400);
            return;
        }
        
        // Step 1: Check if donor exists in donors table
        $existingDonor = $this->db->fetch(
            "SELECT * FROM donors WHERE donor_email = ?",
            [$donorEmail]
        );
        
        if ($existingDonor) {
            // Use existing donor
            $donorId = $existingDonor['id'];
        } else {
            // Create new donor
            $donorResult = $this->db->query(
                "INSERT INTO donors (donor_name, donor_email, is_anonymous) VALUES (?, ?, ?)",
                [$donorName, $donorEmail, $isAnonymous ? 1 : 0]
            );
            
            if (!$donorResult) {
                $this->jsonResponse(['success' => false, 'message' => 'Failed to create donor record'], 500);
                return;
            }
            
            $donorId = $this->db->lastInsertId();
        }
        
        // Step 2: Create subscription if recurring
        $subscriptionId = null;
        if ($isRecurring) {
            $subscriptionResult = $this->db->query(
                "INSERT INTO subscriptions (donor_id, amount, payment_method, program_id, billing_cycle, subscription_status) VALUES (?, ?, ?, ?, 'monthly', 'active')",
                [$donorId, $amount, $paymentMethod, $programId > 0 ? $programId : null]
            );
            
            if (!$subscriptionResult) {
                $this->jsonResponse(['success' => false, 'message' => 'Failed to create subscription'], 500);
                return;
            }
            
            $subscriptionId = $this->db->lastInsertId();
        }
        
        // Step 3: Create donation record
        $donationResult = $this->db->query(
            "INSERT INTO donations (donor_id, subscription_id, amount, payment_method, program_id, is_recurring) VALUES (?, ?, ?, ?, ?, ?)",
            [$donorId, $subscriptionId, $amount, $paymentMethod, $programId > 0 ? $programId : null, $isRecurring ? 1 : 0]
        );
        
        if ($donationResult) {
            $donationId = $this->db->lastInsertId();
            
            // Prepare data for payment processing
            $data = [
                'donor_id' => $donorId,
                'donor_name' => $donorName,
                'donor_email' => $donorEmail,
                'amount' => $amount,
                'payment_method' => $paymentMethod,
                'program_id' => $programId > 0 ? $programId : null,
                'is_recurring' => $isRecurring,
                'subscription_id' => $subscriptionId
            ];
            
            // Process payment based on method and donation type
            switch ($paymentMethod) {
                case 'paypal':
                    if ($isRecurring) {
                        // Create PayPal subscription for monthly donations
                        return $this->createPayPalSubscription($data, $donationId, $subscriptionId);
                    } else {
                        // One-time payment
                        return $this->processPayPalPayment($data, $donationId);
                    }
                case 'stripe':
                    return $this->processStripePayment($data, $donationId);
                case 'credit_card':
                    return $this->processCreditCardPayment($data, $donationId);
                case 'mtn_momo':
                case 'orange_money':
                case 'bank_transfer':
                    return $this->processLocalPayment($data, $donationId, $paymentMethod);
                default:
                    $this->jsonResponse(['success' => false, 'message' => 'Invalid payment method'], 400);
                    return;
            }
        } else {
            $this->jsonResponse(['success' => false, 'message' => 'Failed to process donation'], 500);
        }
    }
    
    /**
     * Process PayPal payment
     */
    private function processPayPalPayment($data, $donationId) {
        try {
            // Create PayPal order
            $orderData = [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'reference_id' => 'donation_' . $donationId,
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => number_format($data['amount'], 2, '.', '')
                    ],
                    'description' => 'Donation to The Way of Hope',
                    'custom_id' => $donationId
                ]],
                'application_context' => [
                    'return_url' => BASE_URL . '/donation/success?donation_id=' . $donationId . '&amount=' . $data['amount'],
                    'cancel_url' => BASE_URL . '/donation/cancel',
                    'brand_name' => 'The Way of Hope',
                    'landing_page' => 'NO_PREFERENCE',
                    'user_action' => 'PAY_NOW'
                ]
            ];
            
            $orderResponse = $this->createPayPalOrder($orderData);
            
            if ($orderResponse && isset($orderResponse['id'])) {
                // Update donation record with PayPal order ID
                $this->db->query(
                    "UPDATE donations SET payment_status = 'pending', payment_reference = ? WHERE id = ?",
                    [$orderResponse['id'], $donationId]
                );
                
                // Redirect user to PayPal for payment
                $approvalUrl = $this->getPayPalApprovalUrl($orderResponse);
                if ($approvalUrl) {
                    header('Location: ' . $approvalUrl);
                    exit;
                } else {
                    throw new Exception('Failed to get PayPal approval URL');
                }
            } else {
                throw new Exception('Failed to create PayPal order');
            }
            
        } catch (Exception $e) {
            // Update donation status to failed
            $this->db->query(
                "UPDATE donations SET payment_status = 'failed' WHERE id = ?",
                [$donationId]
            );
            
            $this->jsonResponse([
                'success' => false,
                'message' => 'PayPal payment failed: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Create PayPal order via API
     */
    private function createPayPalOrder($orderData) {
        $accessToken = $this->getPayPalAccessToken();
        
        if (!$accessToken) {
            throw new Exception('Failed to get PayPal access token');
        }
        
        $apiUrl = PAYPAL_MODE === 'live' 
            ? 'https://api-m.paypal.com/v2/checkout/orders'
            : 'https://api-m.sandbox.paypal.com/v2/checkout/orders';
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
            'PayPal-Request-Id: ' . uniqid()
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 201) {
            return json_decode($response, true);
        } else {
            error_log('PayPal API Error: ' . $response);
            throw new Exception('PayPal API request failed');
        }
    }
    
    /**
     * Get PayPal access token
     */
    private function getPayPalAccessToken() {
        $authUrl = PAYPAL_MODE === 'live'
            ? 'https://api-m.paypal.com/v1/oauth2/token'
            : 'https://api-m.sandbox.paypal.com/v1/oauth2/token';
        
        $authString = base64_encode(PAYPAL_CLIENT_ID . ':' . PAYPAL_CLIENT_SECRET);
        
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . $authString
        ];
        
        $data = 'grant_type=client_credentials';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $authUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            $tokenData = json_decode($response, true);
            return $tokenData['access_token'] ?? null;
        } else {
            error_log('PayPal Auth Error: ' . $response);
            return null;
        }
    }
    
    /**
     * Get PayPal approval URL from order response
     */
    private function getPayPalApprovalUrl($orderResponse) {
        foreach ($orderResponse['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return $link['href'];
            }
        }
        return null;
    }
    
    /**
     * Capture PayPal payment from success page (internal method)
     */
    public function capturePayPalPaymentFromSuccess($orderId, $donationId) {
        try {
            $captureResponse = $this->capturePayPalOrder($orderId);
            
            if ($captureResponse && $captureResponse['status'] === 'COMPLETED') {
                // Update donation status to completed
                $this->db->query(
                    "UPDATE donations SET payment_status = 'completed', payment_reference = ? WHERE id = ?",
                    [$orderId, $donationId]
                );
                
                return true;
            } else {
                // Update donation status to failed
                $this->db->query(
                    "UPDATE donations SET payment_status = 'failed' WHERE id = ?",
                    [$donationId]
                );
                return false;
            }
            
        } catch (Exception $e) {
            // Update donation status to failed
            $this->db->query(
                "UPDATE donations SET payment_status = 'failed' WHERE id = ?",
                [$donationId]
            );
            return false;
        }
    }

    /**
     * Capture PayPal payment
     */
    public function capturePayPalPayment() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
            return;
        }
        
        $orderId = $_POST['order_id'] ?? '';
        $donationId = $_POST['donation_id'] ?? '';
        
        if (empty($orderId) || empty($donationId)) {
            $this->jsonResponse(['success' => false, 'message' => 'Missing required parameters'], 400);
            return;
        }
        
        try {
            $captureResponse = $this->capturePayPalOrder($orderId);
            
            if ($captureResponse && $captureResponse['status'] === 'COMPLETED') {
                // Update donation status to completed
                $this->db->query(
                    "UPDATE donations SET payment_status = 'completed', payment_reference = ? WHERE id = ?",
                    [$orderId, $donationId]
                );
                
                $this->jsonResponse([
                    'success' => true,
                    'message' => 'Payment captured successfully',
                    'donation_id' => $donationId,
                    'transaction_id' => $orderId
                ]);
            } else {
                throw new Exception('Payment capture failed');
            }
            
        } catch (Exception $e) {
            // Update donation status to failed
            $this->db->query(
                "UPDATE donations SET payment_status = 'failed' WHERE id = ?",
                [$donationId]
            );
            
            $this->jsonResponse([
                'success' => false,
                'message' => 'Payment capture failed: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Capture PayPal order via API
     */
    private function capturePayPalOrder($orderId) {
        $accessToken = $this->getPayPalAccessToken();
        
        if (!$accessToken) {
            throw new Exception('Failed to get PayPal access token');
        }
        
        $apiUrl = PAYPAL_MODE === 'live'
            ? 'https://api-m.paypal.com/v2/checkout/orders/' . $orderId . '/capture'
            : 'https://api-m.sandbox.paypal.com/v2/checkout/orders/' . $orderId . '/capture';
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
            'PayPal-Request-Id: ' . uniqid()
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 201) {
            return json_decode($response, true);
        } else {
            error_log('PayPal Capture Error: ' . $response);
            throw new Exception('PayPal capture request failed');
        }
    }
    
    /**
     * Placeholder methods for other payment methods
     */
    private function processStripePayment($data, $donationId) {
        $this->jsonResponse([
            'success' => false,
            'message' => 'Stripe payment not implemented yet'
        ], 501);
    }
    
    private function processCreditCardPayment($data, $donationId) {
        $this->jsonResponse([
            'success' => false,
            'message' => 'Credit card payment not implemented yet'
        ], 501);
    }
    
    private function processLocalPayment($data, $donationId, $paymentMethod) {
        // For local payment methods, just mark as pending
        $this->db->query(
            "UPDATE donations SET payment_status = 'pending' WHERE id = ?",
            [$donationId]
        );
        
        $this->jsonResponse([
            'success' => true,
            'message' => 'Donation recorded. Payment instructions will be sent via email.',
            'donation_id' => $donationId
        ]);
    }
    
    /**
     * ========================================
     * PAYPAL SUBSCRIPTION METHODS
     * ========================================
     */
    
    /**
     * Create PayPal subscription for monthly donations
     */
    private function createPayPalSubscription($data, $donationId, $subscriptionId) {
        try {
            $amount = $data['amount'];
            
            // Step 1: Get or create PayPal plan for this amount
            $planId = $this->getOrCreatePayPalPlan($amount);
            
            if (!$planId) {
                throw new Exception('Failed to create or retrieve PayPal plan');
            }
            
            // Step 2: Create PayPal subscription
            $subscriptionData = [
                'plan_id' => $planId,
                'start_time' => gmdate('Y-m-d\TH:i:s\Z', strtotime('+3 minutes')), // Start in 3 minutes
                'subscriber' => [
                    'name' => [
                        'given_name' => explode(' ', $data['donor_name'])[0] ?? 'Donor',
                        'surname' => explode(' ', $data['donor_name'], 2)[1] ?? ''
                    ],
                    'email_address' => $data['donor_email']
                ],
                'application_context' => [
                    'brand_name' => 'The Way of Hope',
                    'locale' => 'en-US',
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'SUBSCRIBE_NOW',
                    'payment_method' => [
                        'payer_selected' => 'PAYPAL',
                        'payee_preferred' => 'IMMEDIATE_PAYMENT_REQUIRED'
                    ],
                    'return_url' => BASE_URL . '/donation/subscription-success?donation_id=' . $donationId . '&subscription_id=' . $subscriptionId,
                    'cancel_url' => BASE_URL . '/donation/cancel'
                ]
            ];
            
            $paypalSubscription = $this->createPayPalSubscriptionAPI($subscriptionData);
            
            if ($paypalSubscription && isset($paypalSubscription['id'])) {
                // Update our subscription record with PayPal subscription ID
                $this->db->query(
                    "UPDATE subscriptions SET subscription_id = ?, next_billing_date = DATE_ADD(NOW(), INTERVAL 3 MINUTE) WHERE id = ?",
                    [$paypalSubscription['id'], $subscriptionId]
                );
                
                // Update donation with pending status
                $this->db->query(
                    "UPDATE donations SET payment_status = 'pending' WHERE id = ?",
                    [$donationId]
                );
                
                // Get approval URL and redirect
                $approvalUrl = $this->getPayPalSubscriptionApprovalUrl($paypalSubscription);
                if ($approvalUrl) {
                    header('Location: ' . $approvalUrl);
                    exit;
                } else {
                    throw new Exception('Failed to get PayPal subscription approval URL');
                }
            } else {
                throw new Exception('Failed to create PayPal subscription');
            }
            
        } catch (Exception $e) {
            // Update subscription and donation status to failed
            $this->db->query(
                "UPDATE subscriptions SET subscription_status = 'failed' WHERE id = ?",
                [$subscriptionId]
            );
            $this->db->query(
                "UPDATE donations SET payment_status = 'failed' WHERE id = ?",
                [$donationId]
            );
            
            $this->jsonResponse([
                'success' => false,
                'message' => 'Subscription creation failed: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get or create PayPal plan for a specific amount
     */
    private function getOrCreatePayPalPlan($amount) {
        // Check if plan already exists in cache
        $existingPlan = $this->db->fetch(
            "SELECT * FROM paypal_plans WHERE amount = ? AND is_active = 1",
            [$amount]
        );
        
        if ($existingPlan) {
            return $existingPlan['plan_id'];
        }
        
        // Create new product and plan
        try {
            // Step 1: Create PayPal product
            $productData = [
                'name' => 'Monthly Donation - $' . number_format($amount, 2),
                'description' => 'Monthly recurring donation of $' . number_format($amount, 2) . ' to The Way of Hope',
                'type' => 'SERVICE',
                'category' => 'NONPROFIT'
            ];
            
            $product = $this->createPayPalProduct($productData);
            
            if (!$product || !isset($product['id'])) {
                throw new Exception('Failed to create PayPal product');
            }
            
            // Step 2: Create PayPal plan (using 3 minutes for testing)
            $billingCycleMinutes = (PAYPAL_MODE === 'sandbox') ? 3 : 43200; // 3 minutes for sandbox, 30 days for live
            
            $planData = [
                'product_id' => $product['id'],
                'name' => 'Monthly Donation Plan - $' . number_format($amount, 2),
                'description' => 'Recurring monthly donation of $' . number_format($amount, 2),
                'billing_cycles' => [
                    [
                        'frequency' => [
                            'interval_unit' => (PAYPAL_MODE === 'sandbox') ? 'MINUTE' : 'MONTH',
                            'interval_count' => (PAYPAL_MODE === 'sandbox') ? 3 : 1
                        ],
                        'tenure_type' => 'REGULAR',
                        'sequence' => 1,
                        'total_cycles' => 0, // 0 = infinite
                        'pricing_scheme' => [
                            'fixed_price' => [
                                'value' => number_format($amount, 2, '.', ''),
                                'currency_code' => 'USD'
                            ]
                        ]
                    ]
                ],
                'payment_preferences' => [
                    'auto_bill_outstanding' => true,
                    'setup_fee' => [
                        'value' => '0',
                        'currency_code' => 'USD'
                    ],
                    'setup_fee_failure_action' => 'CONTINUE',
                    'payment_failure_threshold' => 3
                ]
            ];
            
            $plan = $this->createPayPalPlanAPI($planData);
            
            if (!$plan || !isset($plan['id'])) {
                throw new Exception('Failed to create PayPal plan');
            }
            
            // Step 3: Cache plan in database
            $this->db->query(
                "INSERT INTO paypal_plans (amount, product_id, plan_id, billing_cycle_minutes, plan_name, plan_description) VALUES (?, ?, ?, ?, ?, ?)",
                [
                    $amount,
                    $product['id'],
                    $plan['id'],
                    $billingCycleMinutes,
                    $planData['name'],
                    $planData['description']
                ]
            );
            
            return $plan['id'];
            
        } catch (Exception $e) {
            error_log('PayPal plan creation error: ' . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Create PayPal product via API
     */
    private function createPayPalProduct($productData) {
        $accessToken = $this->getPayPalAccessToken();
        
        if (!$accessToken) {
            throw new Exception('Failed to get PayPal access token');
        }
        
        $apiUrl = PAYPAL_MODE === 'live'
            ? 'https://api-m.paypal.com/v1/catalogs/products'
            : 'https://api-m.sandbox.paypal.com/v1/catalogs/products';
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
            'PayPal-Request-Id: ' . uniqid()
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($productData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 201) {
            return json_decode($response, true);
        } else {
            error_log('PayPal Product API Error: ' . $response);
            throw new Exception('PayPal product creation failed');
        }
    }
    
    /**
     * Create PayPal plan via API
     */
    private function createPayPalPlanAPI($planData) {
        $accessToken = $this->getPayPalAccessToken();
        
        if (!$accessToken) {
            throw new Exception('Failed to get PayPal access token');
        }
        
        $apiUrl = PAYPAL_MODE === 'live'
            ? 'https://api-m.paypal.com/v1/billing/plans'
            : 'https://api-m.sandbox.paypal.com/v1/billing/plans';
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
            'PayPal-Request-Id: ' . uniqid()
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($planData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 201) {
            return json_decode($response, true);
        } else {
            error_log('PayPal Plan API Error: ' . $response);
            throw new Exception('PayPal plan creation failed');
        }
    }
    
    /**
     * Create PayPal subscription via API
     */
    private function createPayPalSubscriptionAPI($subscriptionData) {
        $accessToken = $this->getPayPalAccessToken();
        
        if (!$accessToken) {
            throw new Exception('Failed to get PayPal access token');
        }
        
        $apiUrl = PAYPAL_MODE === 'live'
            ? 'https://api-m.paypal.com/v1/billing/subscriptions'
            : 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions';
        
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken,
            'PayPal-Request-Id: ' . uniqid()
        ];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($subscriptionData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 201) {
            return json_decode($response, true);
        } else {
            error_log('PayPal Subscription API Error: ' . $response);
            throw new Exception('PayPal subscription creation failed');
        }
    }
    
    /**
     * Get approval URL from PayPal subscription response
     */
    private function getPayPalSubscriptionApprovalUrl($subscriptionResponse) {
        if (isset($subscriptionResponse['links'])) {
            foreach ($subscriptionResponse['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return $link['href'];
                }
            }
        }
        return null;
    }
    
    /**
     * Handle PayPal webhook notifications
     */
    public function paypalWebhook() {
        // Get raw POST data
        $rawData = file_get_contents('php://input');
        $webhookData = json_decode($rawData, true);
        
        // Log webhook for debugging
        error_log('PayPal Webhook Received: ' . $rawData);
        
        if (!$webhookData || !isset($webhookData['event_type'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid webhook data']);
            return;
        }
        
        $eventType = $webhookData['event_type'];
        
        try {
            switch ($eventType) {
                case 'BILLING.SUBSCRIPTION.ACTIVATED':
                    $this->handleSubscriptionActivated($webhookData);
                    break;
                    
                case 'PAYMENT.SALE.COMPLETED':
                    $this->handleRecurringPaymentCompleted($webhookData);
                    break;
                    
                case 'BILLING.SUBSCRIPTION.CANCELLED':
                    $this->handleSubscriptionCancelled($webhookData);
                    break;
                    
                case 'BILLING.SUBSCRIPTION.SUSPENDED':
                case 'BILLING.SUBSCRIPTION.EXPIRED':
                    $this->handleSubscriptionSuspended($webhookData);
                    break;
                    
                default:
                    error_log('Unhandled webhook event: ' . $eventType);
            }
            
            http_response_code(200);
            echo json_encode(['success' => true]);
            
        } catch (Exception $e) {
            error_log('Webhook processing error: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    /**
     * Handle subscription activated event
     */
    private function handleSubscriptionActivated($webhookData) {
        $paypalSubscriptionId = $webhookData['resource']['id'] ?? null;
        
        if ($paypalSubscriptionId) {
            // Update subscription status to active
            $this->db->query(
                "UPDATE subscriptions SET subscription_status = 'active' WHERE subscription_id = ?",
                [$paypalSubscriptionId]
            );
            
            error_log('Subscription activated: ' . $paypalSubscriptionId);
        }
    }
    
    /**
     * Handle recurring payment completed event
     */
    private function handleRecurringPaymentCompleted($webhookData) {
        $billingAgreementId = $webhookData['resource']['billing_agreement_id'] ?? null;
        $amount = $webhookData['resource']['amount']['total'] ?? 0;
        $transactionId = $webhookData['resource']['id'] ?? null;
        
        if ($billingAgreementId && $amount > 0) {
            // Find our subscription
            $subscription = $this->db->fetch(
                "SELECT * FROM subscriptions WHERE subscription_id = ?",
                [$billingAgreementId]
            );
            
            if ($subscription) {
                // Create new donation record for this recurring payment
                $this->db->query(
                    "INSERT INTO donations (donor_id, subscription_id, amount, payment_method, program_id, is_recurring, payment_status, payment_reference) VALUES (?, ?, ?, ?, ?, 1, 'completed', ?)",
                    [
                        $subscription['donor_id'],
                        $subscription['id'],
                        $amount,
                        $subscription['payment_method'],
                        $subscription['program_id'],
                        $transactionId
                    ]
                );
                
                // Update next billing date (add 3 minutes for sandbox, 1 month for live)
                $interval = (PAYPAL_MODE === 'sandbox') ? 'INTERVAL 3 MINUTE' : 'INTERVAL 1 MONTH';
                $this->db->query(
                    "UPDATE subscriptions SET next_billing_date = DATE_ADD(NOW(), $interval) WHERE id = ?",
                    [$subscription['id']]
                );
                
                error_log('Recurring payment processed: ' . $transactionId . ' for subscription: ' . $subscription['id']);
            }
        }
    }
    
    /**
     * Handle subscription cancelled event
     */
    private function handleSubscriptionCancelled($webhookData) {
        $paypalSubscriptionId = $webhookData['resource']['id'] ?? null;
        
        if ($paypalSubscriptionId) {
            // Update subscription status to cancelled
            $this->db->query(
                "UPDATE subscriptions SET subscription_status = 'cancelled' WHERE subscription_id = ?",
                [$paypalSubscriptionId]
            );
            
            error_log('Subscription cancelled: ' . $paypalSubscriptionId);
        }
    }
    
    /**
     * Handle subscription suspended event
     */
    private function handleSubscriptionSuspended($webhookData) {
        $paypalSubscriptionId = $webhookData['resource']['id'] ?? null;
        
        if ($paypalSubscriptionId) {
            // Update subscription status to paused
            $this->db->query(
                "UPDATE subscriptions SET subscription_status = 'paused' WHERE subscription_id = ?",
                [$paypalSubscriptionId]
            );
            
            error_log('Subscription suspended: ' . $paypalSubscriptionId);
        }
    }
    
    /**
     * Cancel PayPal subscription
     */
    public function cancelPayPalSubscription($paypalSubscriptionId) {
        try {
            $accessToken = $this->getPayPalAccessToken();
            
            if (!$accessToken) {
                throw new Exception('Failed to get PayPal access token');
            }
            
            $apiUrl = PAYPAL_MODE === 'live'
                ? 'https://api-m.paypal.com/v1/billing/subscriptions/' . $paypalSubscriptionId . '/cancel'
                : 'https://api-m.sandbox.paypal.com/v1/billing/subscriptions/' . $paypalSubscriptionId . '/cancel';
            
            $headers = [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $accessToken
            ];
            
            $cancelData = json_encode([
                'reason' => 'Customer requested cancellation'
            ]);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $cancelData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            // 204 No Content means success
            if ($httpCode === 204 || $httpCode === 200) {
                error_log('PayPal subscription cancelled: ' . $paypalSubscriptionId);
                return true;
            } else {
                error_log('PayPal cancellation failed: ' . $response);
                return false;
            }
            
        } catch (Exception $e) {
            error_log('PayPal subscription cancellation error: ' . $e->getMessage());
            return false;
        }
    }
}
