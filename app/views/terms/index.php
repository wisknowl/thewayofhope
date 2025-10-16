<?php
// Include the main layout
$content = ob_start();
?>

<!-- Terms & Conditions Hero Section -->
<section class="terms-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1>Terms & Conditions</h1>
            <p style="font-size: 1.25rem;">Please read these terms and conditions carefully before using our website and services.</p>
        </div>
    </div>
</section>

<!-- Terms & Conditions Content -->
<section class="section" style="background: white;">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: white; padding: 3rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                
                <div style="margin-bottom: 2rem;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 1rem;">The Way of Hope Cameroon (WOH-CAM)</h2>
                    <p style="color: var(--text-light-grey); font-size: 0.9rem;"><strong>Effective Date:</strong> December 2024</p>
                </div>

                <div style="margin-bottom: 2rem;">
                    <p style="font-size: 1.1rem; line-height: 1.6; color: var(--text-dark-grey);">
                        By accessing and using our website, you agree to the following terms and conditions.
                    </p>
                </div>

                <!-- Section 1: General Use -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">1. General Use</h3>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">This website is operated by The Way of Hope Cameroon (WOH-CAM), a registered NGO in Cameroon.</li>
                        <li style="margin-bottom: 0.5rem;">All content provided on this website is for information and fundraising purposes.</li>
                    </ul>
                </div>

                <!-- Section 2: Donations -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">2. Donations</h3>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">All donations made through our website are voluntary and <strong>non-refundable</strong>.</li>
                        <li style="margin-bottom: 0.5rem;">Donations are used to support WOH-CAM programs and activities in line with our mission.</li>
                        <li style="margin-bottom: 0.5rem;">Donors will receive receipts for their contributions.</li>
                    </ul>
                    <div style="background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 8px; padding: 1rem; margin-top: 1rem;">
                        <p style="color: #856404; margin: 0; font-weight: 600;">
                            ⚠️ Important: All donations are final and cannot be refunded. Please ensure you are comfortable with your donation amount before proceeding.
                        </p>
                    </div>
                </div>

                <!-- Section 3: Intellectual Property -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">3. Intellectual Property</h3>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">All text, logos, graphics, and media on this website are the property of WOH-CAM unless otherwise stated.</li>
                        <li style="margin-bottom: 0.5rem;">Unauthorized use, reproduction, or distribution of our content is not permitted without prior consent.</li>
                    </ul>
                </div>

                <!-- Section 4: Third-Party Services -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">4. Third-Party Services</h3>
                    <p style="line-height: 1.6; color: var(--text-dark-grey);">
                        Our website may include links to third-party services (such as payment processors). 
                        WOH-CAM is not responsible for the content, security, or privacy practices of these external services.
                    </p>
                </div>

                <!-- Section 5: Limitation of Liability -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">5. Limitation of Liability</h3>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">WOH-CAM strives to provide accurate and updated information on this website.</li>
                        <li style="margin-bottom: 0.5rem;">However, we do not guarantee that all information will be free of errors or technical issues.</li>
                        <li style="margin-bottom: 0.5rem;">We are not liable for any damages arising from the use of this website.</li>
                    </ul>
                </div>

                <!-- Section 6: Changes to These Terms -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">6. Changes to These Terms</h3>
                    <p style="line-height: 1.6; color: var(--text-dark-grey);">
                        We may update these Terms & Conditions periodically. Continued use of our website means you accept the updated terms.
                    </p>
                </div>

                <!-- Section 7: Contact Us -->
                <div style="margin-bottom: 2rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">7. Contact Us</h3>
                    <p style="margin-bottom: 1rem; line-height: 1.6; color: var(--text-dark-grey);">
                        For questions about these Terms & Conditions, please contact us:
                    </p>
                    <div style="background: var(--light-blue); padding: 1.5rem; border-radius: 10px; margin-top: 1rem;">
                        <div style="margin-bottom: 0.5rem;">
                            <strong>📧 Email:</strong> <a href="mailto:info@thewayofhope.cm" style="color: var(--primary-blue);">info@thewayofhope.cm</a>
                        </div>
                        <div style="margin-bottom: 0.5rem;">
                            <strong>📍 Address:</strong> The Way of Hope Cameroon, Yaoundé, Cameroon
                        </div>
                        <div>
                            <strong>📞 Phone:</strong> <a href="tel:+237123456789" style="color: var(--primary-blue);">+237 123 456 789</a>
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border-light);">
                    <p style="color: var(--text-light-grey); font-size: 0.9rem;">
                        These Terms & Conditions were last updated on December 2024
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


