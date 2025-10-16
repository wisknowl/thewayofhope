<?php
// Include the main layout
$content = ob_start();
?>

<!-- Subscription Success Page -->
<section class="section" style="background: #f8f9fa; min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
        <div style="max-width: 700px; margin: 0 auto;">
            <div style="background: white; padding: 4rem 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center;">
                
                <?php if (isset($data['success']) && $data['success']): ?>
                    <!-- Success Icon -->
                    <div style="margin-bottom: 2rem;">
                        <div style="width: 80px; height: 80px; background: #28a745; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <h1 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 2.5rem; font-weight: 700;">
                        🎉 Subscription Activated!
                    </h1>
                    
                    <p style="color: var(--text-dark-grey); font-size: 1.2rem; margin-bottom: 2rem; line-height: 1.6;">
                        Thank you for setting up a monthly donation! Your recurring contribution helps us create lasting change in communities across Cameroon.
                    </p>

                    <!-- Subscription Details -->
                    <?php if (isset($data['subscription'])): ?>
                        <div style="background: var(--light-blue); padding: 2rem; border-radius: 10px; margin-bottom: 2rem; text-align: left;">
                            <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.3rem;">Subscription Details</h3>
                            
                            <div style="margin-bottom: 0.5rem;">
                                <strong>Monthly Amount:</strong> $<?php echo number_format($data['subscription']['amount'], 2); ?>
                            </div>
                            
                            <div style="margin-bottom: 0.5rem;">
                                <strong>Next Billing Date:</strong> <?php echo date('F j, Y', strtotime($data['subscription']['next_billing_date'] ?? '+1 month')); ?>
                            </div>
                            
                            <div style="margin-bottom: 0.5rem;">
                                <strong>Status:</strong> <span style="color: #28a745; font-weight: 600;">Active</span>
                            </div>
                            
                            <div style="margin-bottom: 0.5rem;">
                                <strong>Payment Method:</strong> <?php echo ucfirst(str_replace('_', ' ', $data['subscription']['payment_method'])); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- What Happens Next -->
                    <div style="background: #e7f3ff; border: 1px solid #b3d9ff; border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem; text-align: left;">
                        <h4 style="color: var(--primary-blue); margin-bottom: 1rem;">What Happens Next?</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 0.5rem 0; display: flex; align-items: start;">
                                <span style="color: var(--primary-blue); margin-right: 0.5rem;">✓</span>
                                <span>Your first payment has been processed successfully</span>
                            </li>
                            <li style="padding: 0.5rem 0; display: flex; align-items: start;">
                                <span style="color: var(--primary-blue); margin-right: 0.5rem;">✓</span>
                                <span>You'll receive a confirmation email with your donation receipt</span>
                            </li>
                            <li style="padding: 0.5rem 0; display: flex; align-items: start;">
                                <span style="color: var(--primary-blue); margin-right: 0.5rem;">✓</span>
                                <span>Your payment method will be charged automatically each month</span>
                            </li>
                            <li style="padding: 0.5rem 0; display: flex; align-items: start;">
                                <span style="color: var(--primary-blue); margin-right: 0.5rem;">✓</span>
                                <span>You can manage or cancel your subscription anytime</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem; text-decoration: none;">
                            Return to Homepage
                        </a>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/subscription/manage" class="btn" style="padding: 1rem 2rem; font-size: 1.1rem; text-decoration: none; background: white; color: var(--primary-blue); border: 2px solid var(--primary-blue);">
                            Manage Subscription
                        </a>
                    </div>

                <?php else: ?>
                    <!-- Error State -->
                    <div style="margin-bottom: 2rem;">
                        <div style="width: 80px; height: 80px; background: #dc3545; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <span style="color: white; font-size: 3rem;">!</span>
                        </div>
                    </div>

                    <h1 style="color: #dc3545; margin-bottom: 1rem; font-size: 2.5rem; font-weight: 700;">
                        Subscription Setup Failed
                    </h1>
                    
                    <p style="color: var(--text-dark-grey); font-size: 1.2rem; margin-bottom: 2rem;">
                        <?php echo $data['message'] ?? 'There was an error setting up your subscription. Please try again or contact support.'; ?>
                    </p>

                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem; text-decoration: none;">
                        Try Again
                    </a>
                <?php endif; ?>

                <!-- Contact Information -->
                <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-light);">
                    <p style="color: var(--text-light-grey); font-size: 0.9rem; margin-bottom: 0.5rem;">
                        Questions about your subscription?
                    </p>
                    <p style="color: var(--primary-blue); font-size: 0.9rem; margin: 0;">
                        Contact us at <a href="mailto:info@thewayofhope.cm" style="color: var(--primary-blue);">info@thewayofhope.cm</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>

