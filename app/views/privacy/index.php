<?php
// Include the main layout
$content = ob_start();
?>

<!-- Privacy Policy Hero Section -->
<section class="privacy-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1>Privacy Policy</h1>
            <p style="font-size: 1.25rem;">Your privacy and trust are important to us. Learn how we collect, use, and protect your personal information.</p>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
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
                        The Way of Hope Cameroon (WOH-CAM) values your trust and is committed to protecting your privacy. 
                        This Privacy Policy explains how we collect, use, and safeguard the personal information you share 
                        with us through our website.
                    </p>
                </div>

                <!-- Section 1: Information We Collect -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">1. Information We Collect</h3>
                    <div style="margin-left: 1rem;">
                        <p style="margin-bottom: 1rem; line-height: 1.6; color: var(--text-dark-grey);">
                            <strong>Personal Information:</strong> Name, email address, phone number, and payment details 
                            (when making donations).
                        </p>
                        <p style="margin-bottom: 1rem; line-height: 1.6; color: var(--text-dark-grey);">
                            <strong>Non-Personal Information:</strong> Browser type, device information, IP address, 
                            and pages visited on our site.
                        </p>
                    </div>
                </div>

                <!-- Section 2: How We Use Your Information -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">2. How We Use Your Information</h3>
                    <p style="margin-bottom: 1rem; line-height: 1.6; color: var(--text-dark-grey);">
                        We use the information collected to:
                    </p>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">Process donations and issue receipts.</li>
                        <li style="margin-bottom: 0.5rem;">Communicate with you about our programs, events, and updates.</li>
                        <li style="margin-bottom: 0.5rem;">Improve our website, services, and donor experience.</li>
                        <li style="margin-bottom: 0.5rem;">Comply with legal and financial reporting requirements.</li>
                    </ul>
                </div>

                <!-- Section 3: Sharing of Information -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">3. Sharing of Information</h3>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">We do not sell, rent, or trade your information.</li>
                        <li style="margin-bottom: 0.5rem;">We may share limited details with trusted service providers (such as secure payment processors) who help us operate our services.</li>
                        <li style="margin-bottom: 0.5rem;">We may disclose information if required by law.</li>
                    </ul>
                </div>

                <!-- Section 4: Data Protection -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">4. Data Protection</h3>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">All financial transactions are encrypted and processed securely through trusted third-party providers.</li>
                        <li style="margin-bottom: 0.5rem;">We take appropriate security measures to protect against unauthorized access or misuse of your personal data.</li>
                    </ul>
                </div>

                <!-- Section 5: Your Rights -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">5. Your Rights</h3>
                    <p style="margin-bottom: 1rem; line-height: 1.6; color: var(--text-dark-grey);">
                        You have the right to:
                    </p>
                    <ul style="margin-left: 2rem; color: var(--text-dark-grey); line-height: 1.6;">
                        <li style="margin-bottom: 0.5rem;">Request access to your personal data.</li>
                        <li style="margin-bottom: 0.5rem;">Correct or update your information.</li>
                        <li style="margin-bottom: 0.5rem;">Withdraw consent from receiving communications.</li>
                        <li style="margin-bottom: 0.5rem;">Request deletion of your data where applicable.</li>
                    </ul>
                </div>

                <!-- Section 6: Cookies -->
                <div style="margin-bottom: 2.5rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">6. Cookies</h3>
                    <p style="line-height: 1.6; color: var(--text-dark-grey);">
                        Our website may use cookies to enhance your browsing experience. You may disable cookies in your 
                        browser settings, but some features may not function properly.
                    </p>
                </div>

                <!-- Section 7: Contact Us -->
                <div style="margin-bottom: 2rem;">
                    <h3 style="color: var(--primary-blue); margin-bottom: 1rem; font-size: 1.5rem;">7. Contact Us</h3>
                    <p style="margin-bottom: 1rem; line-height: 1.6; color: var(--text-dark-grey);">
                        If you have any questions about this Privacy Policy or how your data is handled, please contact us:
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
                        This Privacy Policy was last updated on December 2024
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

