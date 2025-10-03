<?php
// Include the main layout
$content = ob_start();
?>

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
<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="card">
                <div class="card-header">
                    <h2>Make a Donation</h2>
                    <p>Choose your donation amount and payment method. All donations are secure and tax-deductible.</p>
                </div>
                
                <div class="card-body">
                    <form action="/api/donation" method="POST" id="donationForm">
                        <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">
                        
                        <div class="form-group">
                            <label class="form-label"><?php echo $this->translate('donate_amount', 'Donation Amount'); ?> *</label>
                            <div class="grid grid-4" style="margin-bottom: 1rem;">
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="5000" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>5,000 XAF</strong>
                                    </div>
                                </label>
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="10000" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>10,000 XAF</strong>
                                    </div>
                                </label>
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="25000" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>25,000 XAF</strong>
                                    </div>
                                </label>
                                <label style="text-align: center; cursor: pointer;">
                                    <input type="radio" name="amount" value="50000" style="margin-right: 0.5rem;">
                                    <div style="padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); transition: var(--transition);">
                                        <strong>50,000 XAF</strong>
                                    </div>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label for="custom_amount">Or enter custom amount:</label>
                                <input type="number" id="custom_amount" name="custom_amount" class="form-control" placeholder="Enter amount in XAF" min="1000">
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
                                <label style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: var(--transition);">
                                    <input type="radio" name="payment_method" value="paypal" style="margin-right: 0.5rem;">
                                    <div>
                                        <strong>PayPal</strong>
                                        <br><small>International payments</small>
                                    </div>
                                </label>
                                
                                <label style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: var(--transition);">
                                    <input type="radio" name="payment_method" value="mtn_momo" style="margin-right: 0.5rem;">
                                    <div>
                                        <strong>MTN Mobile Money</strong>
                                        <br><small>Local mobile payments</small>
                                    </div>
                                </label>
                                
                                <label style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: var(--transition);">
                                    <input type="radio" name="payment_method" value="orange_money" style="margin-right: 0.5rem;">
                                    <div>
                                        <strong>Orange Money</strong>
                                        <br><small>Local mobile payments</small>
                                    </div>
                                </label>
                                
                                <label style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--border-light); border-radius: var(--border-radius); cursor: pointer; transition: var(--transition);">
                                    <input type="radio" name="payment_method" value="bank_transfer" style="margin-right: 0.5rem;">
                                    <div>
                                        <strong>Bank Transfer</strong>
                                        <br><small>Direct bank transfer</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label style="display: flex; align-items: center; gap: 0.5rem;">
                                <input type="checkbox" name="is_recurring" value="1">
                                <span><?php echo $this->translate('donate_recurring', 'Make this a recurring donation'); ?></span>
                            </label>
                        </div>
                        
                        <div class="grid grid-2">
                            <div class="form-group">
                                <label class="form-label" for="donor_name">Donor Name *</label>
                                <input type="text" id="donor_name" name="donor_name" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="donor_email">Email Address *</label>
                                <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                            </div>
                        </div>
                        
                        <div style="background: #e7f3ff; padding: 1.5rem; border-radius: var(--border-radius); margin: 2rem 0;">
                            <h4>🔒 Secure Donation</h4>
                            <p>Your donation is processed securely. We use industry-standard encryption to protect your personal and financial information.</p>
                        </div>
                        
                        <div style="text-align: center; margin-top: 2rem;">
                            <button type="submit" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.125rem;">Donate Now</button>
                        </div>
                    </form>
                    
                    <div id="formMessage" style="margin-top: 1rem; display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Non-Cash Donations -->
<section class="section" style="background: #f8f9fa;">
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
            <p>Email: info@thewayofhope.org | Phone: +237 6XX XXX XXX</p>
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
                        <h4><?php echo number_format($donation['amount']); ?> XAF</h4>
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
document.getElementById('donationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('formMessage');
    
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
        messageDiv.style.display = 'block';
        if (data.success) {
            messageDiv.innerHTML = '<div style="color: green; padding: 1rem; background: #d4edda; border: 1px solid #c3e6cb; border-radius: var(--border-radius);">Donation recorded successfully! You will be redirected to the payment gateway.</div>';
            // In a real implementation, redirect to payment gateway
        } else {
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
</script>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
