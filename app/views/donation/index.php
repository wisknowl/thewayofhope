<?php
// Include the main layout
$content = ob_start();
?>

<!-- PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENT_ID; ?>&currency=USD"></script>

<!-- Donate Hero Section -->
<section class="donate-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1593113598332-cd288d649433?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('donate_title', 'Support Our Mission'); ?></h1>
            <p style="font-size: 1.25rem;">Your donation helps us break down inequalities and create positive change in communities across Cameroon. Every contribution makes a difference.</p>
        </div>
    </div>
</section>

<!-- Donation Form -->
<section class="section" style="background: rgb(205, 219, 233);">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="card">
                <div class="card-header">
                    <h2>Make a Donation</h2>
                    <p style="color: rgba(255,255,255,0.95);">Choose your donation amount and payment method. All donations are secure and tax-deductible.</p>
                </div>
                
                <div class="card-body">
                    <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/api/donation" method="POST" id="donationForm">
                        <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">
                        
                        <!-- Donation Type Selection -->
                        <div class="form-group">
                            <label class="form-label">Donation Type *</label>
                            <div class="donation-type-buttons" style="display: flex; gap: 1rem; margin-bottom: 2rem;">
                                <label class="donation-type-btn" style="flex: 1; cursor: pointer;">
                                    <input type="radio" name="donation_type" value="one_time" checked style="display: none;">
                                    <div class="donation-btn" style="padding: 1rem 2rem; border: 2px solid var(--primary-blue); border-radius: var(--border-radius); text-align: center; transition: all 0.3s ease; background: var(--primary-blue); color: white; font-weight: 600;">
                                        One Time
                                    </div>
                                </label>
                                <label class="donation-type-btn" style="flex: 1; cursor: pointer;">
                                    <input type="radio" name="donation_type" value="monthly" style="display: none;">
                                    <div class="donation-btn" style="padding: 1rem 2rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); text-align: center; transition: all 0.3s ease; background: white; color: var(--text-dark-grey); font-weight: 600;">
                                        Monthly
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label"><?php echo $this->translate('donate_amount', 'Donation Amount'); ?> *</label>
                            <div class="grid grid-4" style="margin-bottom: 1rem;">
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="25" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>$25</strong>
                                    </div>
                                </label>
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="50" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>$50</strong>
                                    </div>
                                </label>
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="100" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>$100</strong>
                                    </div>
                                </label>
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="250" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>$250</strong>
                                    </div>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label for="custom_amount">Or enter custom amount:</label>
                                <input type="number" id="custom_amount" name="custom_amount" class="form-control" placeholder="Enter amount in USD" min="5">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label"><?php echo $this->translate('donate_program', 'Donate to specific program'); ?></label>
                            <select name="program_id" class="form-control">
                                <option value="">General donation (use where most needed)</option>
                                <?php if (!empty($programs)): ?>
                                    <?php foreach ($programs as $program): ?>
                                        <option value="<?php echo $program['id']; ?>">
                                            <?php echo $program['name_' . $this->getLanguage()] ?? $program['name_en']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label"><?php echo $this->translate('donate_method', 'Payment Method'); ?> *</label>
                            <div class="grid grid-2">
                                <!-- Stripe Payment Method -->
                                <label class="payment-method-option" style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; background: linear-gradient(135deg, #635bff 0%, #4f46e5 100%);">
                                    <input type="radio" name="payment_method" value="stripe" style="margin-right: 0.5rem; z-index: 2; position: relative;">
                                    <div style="color: white; z-index: 2; position: relative;">
                                        <strong>Stripe</strong>
                                        <br><small style="opacity: 0.9;">Cards, Apple Pay, Google Pay</small>
                                    </div>
                                    <div class="payment-bg" style="position: absolute; top: -10px; right: -10px; opacity: 0.1; font-size: 3rem; color: white;">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.274 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.872 4.56 3.147 3.757 4.992 3.757 7.218c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.571-2.354 1.571-1.875 0-4.965-.921-6.99-2.109l-.9 5.555C5.175 22.99 8.385 24 11.714 24c2.641 0 4.843-.624 6.328-1.813 1.664-1.305 2.525-3.236 2.525-5.732 0-4.128-2.524-5.851-6.591-7.305z"/>
                                        </svg>
                                    </div>
                                </label>

                                <!-- PayPal Payment Method -->
                                <label class="payment-method-option" style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; background: linear-gradient(135deg, #0070ba 0%, #005ea6 100%);">
                                    <input type="radio" name="payment_method" value="paypal" style="margin-right: 0.5rem; z-index: 2; position: relative;">
                                    <div style="color: white; z-index: 2; position: relative;">
                                        <strong>PayPal</strong>
                                        <br><small style="opacity: 0.9;">International payments</small>
                                    </div>
                                    <div class="payment-bg" style="position: absolute; top: -10px; right: -10px; opacity: 0.1; font-size: 3rem; color: white;">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a3.35 3.35 0 0 0-.068-.42c-.23-1.18-1.02-2.08-2.22-2.51-.81-.29-1.78-.37-2.82-.37H8.89a.641.641 0 0 0-.633.74l-1.47 9.31h3.71l.8-5.08a.641.641 0 0 1 .633-.74h1.88c3.42 0 6.08-1.39 6.82-5.44.23-1.25.14-2.36-.35-3.19z"/>
                                        </svg>
                                    </div>
                                </label>
                                
                                <!-- Debit/Credit Card Payment Method -->
                                <label class="payment-method-option" style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);">
                                    <input type="radio" name="payment_method" value="credit_card" style="margin-right: 0.5rem; z-index: 2; position: relative;">
                                    <div style="color: white; z-index: 2; position: relative;">
                                        <strong>Debit/Credit Card</strong>
                                        <br><small style="opacity: 0.9;">Visa, Mastercard, American Express</small>
                                    </div>
                                    <div class="payment-bg" style="position: absolute; top: -10px; right: -10px; opacity: 0.1; font-size: 3rem; color: white;">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/>
                                        </svg>
                                    </div>
                                </label>

                                
                                <!-- Bank Transfer -->
                                <label class="payment-method-option" style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);">
                                    <input type="radio" name="payment_method" value="bank_transfer" style="margin-right: 0.5rem; z-index: 2; position: relative;">
                                    <div style="color: white; z-index: 2; position: relative;">
                                        <strong>Bank Transfer</strong>
                                        <br><small style="opacity: 0.9;">Direct bank transfer</small>
                                    </div>
                                    <div class="payment-bg" style="position: absolute; top: -10px; right: -10px; opacity: 0.1; font-size: 3rem; color: white;">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                </label>
                                
                                <!-- MTN Mobile Money -->
                                <label class="payment-method-option" style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%);">
                                    <input type="radio" name="payment_method" value="mtn_momo" style="margin-right: 0.5rem; z-index: 2; position: relative;">
                                    <div style="color: white; z-index: 2; position: relative;">
                                        <strong>MTN Mobile Money</strong>
                                        <br><small style="opacity: 0.9;">Local mobile payments</small>
                                    </div>
                                    <div class="payment-bg" style="position: absolute; top: -10px; right: -10px; opacity: 0.1; font-size: 3rem; color: white;">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                </label>
                                
                                <!-- Orange Money -->
                                <label class="payment-method-option" style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);">
                                    <input type="radio" name="payment_method" value="orange_money" style="margin-right: 0.5rem; z-index: 2; position: relative;">
                                    <div style="color: white; z-index: 2; position: relative;">
                                        <strong>Orange Money</strong>
                                        <br><small style="opacity: 0.9;">Local mobile payments</small>
                                    </div>
                                    <div class="payment-bg" style="position: absolute; top: -10px; right: -10px; opacity: 0.1; font-size: 3rem; color: white;">
                                        <svg width="60" height="60" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                </label>
                                
                            </div>
                        </div>
                        
                        
                        <div class="grid grid-2">
                            <div class="form-group">
                                <label class="form-label" for="donor_name">Donor Name <span style="color: var(--text-light-grey); font-size: 0.9rem;">(Optional)</span></label>
                                <input type="text" id="donor_name" name="donor_name" class="form-control" placeholder="Leave blank to donate anonymously">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="donor_email">Email Address <span style="color: var(--text-light-grey); font-size: 0.9rem;">(Optional)</span></label>
                                <input type="email" id="donor_email" name="donor_email" class="form-control" placeholder="For donation receipt (optional)">
                            </div>
                        </div>
                        
                        <div style="background: #fff3cd; padding: 1.5rem; border-radius: var(--border-radius); margin: 1rem 0; border: 1px solid #ffeaa7;">
                            <p style="margin: 0; color: #856404; font-size: 0.95rem;">
                                ℹ️ <strong>Anonymous Donations:</strong> You can donate without providing your name or email. However, providing your email allows us to send you a donation receipt and keep you updated on how your contribution is making a difference.
                            </p>
                        </div>
                        
                        <div style="background: #e7f3ff; padding: 1.5rem; border-radius: var(--border-radius); margin: 2rem 0;">
                            <h4>🔒 Secure Donation</h4>
                            <p>Your donation is processed securely. We use industry-standard encryption to protect your personal and financial information.</p>
                        </div>
                        
                        <div style="text-align: center; margin-top: 2rem;">
                            <button type="submit" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.125rem;">Donate Now</button>
                        </div>
                    </form>
                    
                    <!-- PayPal Button Container (Hidden by default) -->
                    <div id="paypal-button-container" style="display: none; margin-top: 2rem; text-align: center;"></div>
                    
                    <div id="formMessage" style="margin-top: 1rem; display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Non-Cash Donations -->
<section class="section" style="background: #ffffed;">
    <div class="container">
        <div class="section-title">
            <h2>Non-Cash Donations</h2>
            <p>We also accept non-cash donations to support our programs</p>
        </div>
        
        <div class="grid grid-3">
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📚</div>
                    <h4>Educational Materials</h4>
                    <ul style="text-align: left;">
                        <li>Books and textbooks</li>
                        <li>School supplies</li>
                        <li>Computers and tablets</li>
                        <li>Educational software</li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏥</div>
                    <h4>Health Supplies</h4>
                    <ul style="text-align: left;">
                        <li>Medical equipment</li>
                        <li>First aid supplies</li>
                        <li>Health awareness materials</li>
                        <li>Sanitary products</li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">👕</div>
                    <h4>Clothing & Items</h4>
                    <ul style="text-align: left;">
                        <li>Clothing for all ages</li>
                        <li>Blankets and bedding</li>
                        <li>Toys and games</li>
                        <li>Household items</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <p><strong>To arrange non-cash donations, please contact us:</strong></p>
            <p>Email: info@thewayofhope.org | Phone: +1 (202) 843 4615</p>
        </div>
    </div>
</section>

<!-- Recent Donations -->
<?php if (!empty($recentDonations)): ?>
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Recent Donations</h2>
            <p>Thank you to our generous supporters</p>
        </div>
        
        <div class="grid grid-3">
            <?php foreach ($recentDonations as $donation): ?>
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">💝</div>
                        <h4>$<?php echo number_format($donation['amount']); ?></h4>
                        <p><strong>From:</strong> <?php echo $donation['donor_name']; ?></p>
                        <p><strong>Method:</strong> <?php echo ucfirst(str_replace('_', ' ', $donation['payment_method'])); ?></p>
                        <p><strong>Date:</strong> <?php echo date('M j, Y', strtotime($donation['created_at'])); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
// Handle donation type button selection
document.querySelectorAll('.donation-type-btn').forEach(button => {
    button.addEventListener('click', function() {
        // Remove active class from all buttons
        document.querySelectorAll('.donation-type-btn').forEach(btn => {
            const btnDiv = btn.querySelector('.donation-btn');
            btnDiv.style.background = 'white';
            btnDiv.style.color = 'var(--text-dark-grey)';
            btnDiv.style.borderColor = 'var(--border-light)';
        });
        
        // Add active class to clicked button
        const btnDiv = this.querySelector('.donation-btn');
        btnDiv.style.background = 'var(--primary-blue)';
        btnDiv.style.color = 'white';
        btnDiv.style.borderColor = 'var(--primary-blue)';
        
        // Check the radio button
        this.querySelector('input[type="radio"]').checked = true;
    });
});

// COMMENTED OUT: JavaScript form submission - now using normal form submission
/*
document.getElementById('donationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('formMessage');
    const paymentMethod = formData.get('payment_method');
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Processing...';
    submitBtn.disabled = true;
    
    fetch('/api/donation', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (paymentMethod === 'paypal') {
                // Replace form with PayPal button
                replaceFormWithPayPal(data, formData);
            } else {
                // For other payment methods, show success message
                messageDiv.style.display = 'block';
                messageDiv.innerHTML = '<div style="color: green; padding: 1rem; background: #d4edda; border: 1px solid #c3e6cb; border-radius: var(--border-radius);">' + data.message + '</div>';
            }
        } else {
            messageDiv.style.display = 'block';
            messageDiv.innerHTML = '<div style="color: red; padding: 1rem; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: var(--border-radius);">Error: ' + data.message + '</div>';
        }
    })
    .catch(error => {
        messageDiv.style.display = 'block';
        messageDiv.innerHTML = '<div style="color: red; padding: 1rem; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: var(--border-radius);">An error occurred. Please try again.</div>';
    })
    .finally(() => {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
});
*/

// Handle custom amount input
document.getElementById('custom_amount').addEventListener('input', function() {
    if (this.value) {
        document.querySelectorAll('input[name="amount"]').forEach(radio => {
            radio.checked = false;
        });
    }
});

// Handle amount radio buttons
document.querySelectorAll('input[name="amount"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('custom_amount').value = '';
        }
    });
});

// PayPal Integration Functions
function replaceFormWithPayPal(data, formData) {
    const form = document.getElementById('donationForm');
    const paypalContainer = document.getElementById('paypal-button-container');
    const messageDiv = document.getElementById('formMessage');
    
    // Store donation ID for later use
    const donationId = data.donation_id;
    const orderId = data.order_id;
    
    // Hide the form
    form.style.display = 'none';
    
    // Show PayPal container
    paypalContainer.style.display = 'block';
    
    // Initialize PayPal button
    if (typeof paypal !== 'undefined') {
        paypal.Buttons({
            createOrder: function(data, actions) {
                return Promise.resolve(orderId);
            },
            onApprove: function(data, actions) {
                // Capture the payment
                return fetch('/api/donation/capture', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `order_id=${data.orderID}&donation_id=${donationId}`
                })
                .then(response => response.json())
                .then(captureData => {
                    if (captureData.success) {
                        messageDiv.style.display = 'block';
                        messageDiv.innerHTML = '<div style="color: green; padding: 1rem; background: #d4edda; border: 1px solid #c3e6cb; border-radius: var(--border-radius);">Payment successful! Thank you for your donation.</div>';
                        paypalContainer.style.display = 'none';
                    } else {
                        messageDiv.style.display = 'block';
                        messageDiv.innerHTML = '<div style="color: red; padding: 1rem; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: var(--border-radius);">Payment failed: ' + captureData.message + '</div>';
                    }
                })
                .catch(error => {
                    messageDiv.style.display = 'block';
                    messageDiv.innerHTML = '<div style="color: red; padding: 1rem; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: var(--border-radius);">Payment processing error. Please try again.</div>';
                });
            },
            onCancel: function(data) {
                messageDiv.style.display = 'block';
                messageDiv.innerHTML = '<div style="color: orange; padding: 1rem; background: #fff3cd; border: 1px solid #ffeaa7; border-radius: var(--border-radius);">Payment cancelled. You can try again or choose a different payment method.</div>';
                // Show form again
                form.style.display = 'block';
                paypalContainer.style.display = 'none';
            },
            onError: function(err) {
                messageDiv.style.display = 'block';
                messageDiv.innerHTML = '<div style="color: red; padding: 1rem; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: var(--border-radius);">PayPal error occurred. Please try again or choose a different payment method.</div>';
                // Show form again
                form.style.display = 'block';
                paypalContainer.style.display = 'none';
            }
        }).render('#paypal-button-container');
    } else {
        messageDiv.style.display = 'block';
        messageDiv.innerHTML = '<div style="color: red; padding: 1rem; background: #f8d7da; border: 1px solid #f5c6cb; border-radius: var(--border-radius);">PayPal SDK not loaded. Please refresh the page and try again.</div>';
        // Show form again
        form.style.display = 'block';
        paypalContainer.style.display = 'none';
    }
}
</script>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
