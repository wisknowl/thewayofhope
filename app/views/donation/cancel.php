<?php
// Include the main layout
$content = ob_start();
?>

<!-- Donation Cancel Page -->
<section class="section" style="background: #f8f9fa; min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
        <div style="max-width: 600px; margin: 0 auto;">
            <div style="background: white; padding: 4rem 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center;">
                
                <!-- Cancel Icon -->
                <div style="margin-bottom: 2rem;">
                    <div style="width: 80px; height: 80px; background: #ffc107; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 9V13M12 17H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <!-- Cancel Message -->
                <h1 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 2.5rem; font-weight: 700;">
                    Payment Cancelled
                </h1>
                
                <p style="color: var(--text-dark-grey); font-size: 1.2rem; margin-bottom: 2rem; line-height: 1.6;">
                    Your donation payment was cancelled. No charges have been made to your account.
                </p>

                <!-- Information Message -->
                <div style="background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem;">
                    <p style="color: #856404; margin: 0; font-size: 1.1rem; line-height: 1.6;">
                        <strong>No worries!</strong> You can try again anytime. Your support helps us continue our mission of breaking down inequalities across all layers of society.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem; text-decoration: none;">
                        Try Again
                    </a>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/" class="btn" style="padding: 1rem 2rem; font-size: 1.1rem; text-decoration: none; background: white; color: var(--primary-blue); border: 2px solid var(--primary-blue);">
                        Return to Homepage
                    </a>
                </div>

                <!-- Alternative Support -->
                <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-light);">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.3rem;">Other Ways to Support</h3>
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/get-involved" style="color: var(--primary-blue); text-decoration: none; font-size: 0.9rem;">
                            Volunteer
                        </a>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/store" style="color: var(--primary-blue); text-decoration: none; font-size: 0.9rem;">
                            Shop Our Store
                        </a>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/contact" style="color: var(--primary-blue); text-decoration: none; font-size: 0.9rem;">
                            Contact Us
                        </a>
                    </div>
                </div>

                <!-- Contact Information -->
                <div style="margin-top: 2rem;">
                    <p style="color: var(--text-light-grey); font-size: 0.9rem; margin-bottom: 0.5rem;">
                        Need help with your donation?
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




