<?php
// Include the main layout
$content = ob_start();
?>

<!-- Donation Success Page -->
<section class="section" style="background: #f8f9fa; min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto;">
            <div style="background: white; padding: 4rem 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center;">
                
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
                    Thank You for Your Donation!
                </h1>
                
                <p style="color: var(--text-dark-grey); font-size: 1.2rem; margin-bottom: 2rem; line-height: 1.6;">
                    Your generous contribution has been successfully processed and will help us continue our mission of breaking down inequalities across all layers of society.
                </p>

                <!-- Transaction Details -->
                <div style="background: var(--light-blue); padding: 2rem; border-radius: 10px; margin-bottom: 2rem; text-align: left;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.3rem;">Transaction Details</h3>
                    
                    <?php if (isset($data['amount']) && $data['amount']): ?>
                        <div style="margin-bottom: 0.5rem;">
                            <strong>Donation Amount:</strong> $<?php echo htmlspecialchars($data['amount']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($data['donation_id']) && $data['donation_id']): ?>
                        <div style="margin-bottom: 0.5rem;">
                            <strong>Donation ID:</strong> #<?php echo htmlspecialchars($data['donation_id']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($data['paypal_order_id']) && $data['paypal_order_id']): ?>
                        <div style="margin-bottom: 0.5rem;">
                            <strong>PayPal Order ID:</strong> <?php echo htmlspecialchars($data['paypal_order_id']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div style="margin-bottom: 0.5rem;">
                        <strong>Payment Status:</strong> 
                        <span style="color: <?php echo isset($data['success']) && $data['success'] ? '#28a745' : '#dc3545'; ?>; font-weight: 600;">
                            <?php echo isset($data['success']) && $data['success'] ? 'Completed' : 'Failed'; ?>
                        </span>
                    </div>
                    
                    <div>
                        <strong>Date:</strong> <?php echo date('F j, Y \a\t g:i A'); ?>
                    </div>
                </div>

                <!-- Impact Message -->
                <div style="background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem;">
                    <p style="color: #856404; margin: 0; font-size: 1.1rem; line-height: 1.6;">
                        <strong>Your Impact:</strong> Your donation helps us provide education, healthcare, and support to communities in need across Cameroon. Every dollar makes a difference!
                    </p>
                </div>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem; text-decoration: none;">
                        Return to Homepage
                    </a>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/about" class="btn" style="padding: 1rem 2rem; font-size: 1.1rem; text-decoration: none; background: white; color: var(--primary-blue); border: 2px solid var(--primary-blue);">
                        Learn More About Us
                    </a>
                </div>

                <!-- Contact Information -->
                <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-light);">
                    <p style="color: var(--text-light-grey); font-size: 0.9rem; margin-bottom: 0.5rem;">
                        Need help or have questions about your donation?
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

