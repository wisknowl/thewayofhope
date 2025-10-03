<?php
// Include the main layout
$content = ob_start();
?>

<!-- Contact Hero Section -->
<section class="contact-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('contact_title', 'Contact Us'); ?></h1>
            <p style="font-size: 1.25rem;">Get in touch with us. We'd love to hear from you and answer any questions you may have.</p>
        </div>
    </div>
</section>

<!-- Contact Information and Form -->
<section class="section">
    <div class="container">
        <div class="grid grid-2">
            <!-- Contact Information -->
            <div>
                <h2>Get in Touch</h2>
                <p style="margin-bottom: 2rem;">We're here to help and answer any questions you might have. We look forward to hearing from you!</p>
                
                <div class="card" style="margin-bottom: 2rem;">
                    <div class="card-body">
                        <h3>📍 Address</h3>
                        <p><?php echo $settings['address'] ?? 'Bafang, Cameroon'; ?></p>
                    </div>
                </div>
                
                <div class="card" style="margin-bottom: 2rem;">
                    <div class="card-body">
                        <h3>📞 Phone</h3>
                        <p><?php echo $settings['contact_phone'] ?? '+237 6XX XXX XXX'; ?></p>
                        <p><a href="https://wa.me/237XXXXXXXXX" target="_blank" style="color: var(--accent-yellow);">WhatsApp: +237 XXXXXXXX</a></p>
                    </div>
                </div>
                
                <div class="card" style="margin-bottom: 2rem;">
                    <div class="card-body">
                        <h3>✉️ Email</h3>
                        <p><a href="mailto:<?php echo $settings['contact_email'] ?? 'info@thewayofhope.org'; ?>" style="color: var(--primary-blue);"><?php echo $settings['contact_email'] ?? 'info@thewayofhope.org'; ?></a></p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h3>🕒 Office Hours</h3>
                        <p><strong>Monday - Friday:</strong> 8:00 AM - 5:00 PM<br>
                        <strong>Saturday:</strong> 9:00 AM - 1:00 PM<br>
                        <strong>Sunday:</strong> Closed</p>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div>
                <h2>Send us a Message</h2>
                <form action="/api/contact" method="POST" id="contactForm">
                    <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">
                    
                    <div class="form-group">
                        <label class="form-label" for="name"><?php echo $this->translate('contact_name', 'Full Name'); ?> *</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="email"><?php echo $this->translate('contact_email', 'Email Address'); ?> *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="phone"><?php echo $this->translate('contact_phone', 'Phone Number'); ?></label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="subject"><?php echo $this->translate('contact_subject', 'Subject'); ?> *</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="message"><?php echo $this->translate('contact_message', 'Message'); ?> *</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><?php echo $this->translate('contact_send', 'Send Message'); ?></button>
                </form>
                
                <div id="formMessage" style="margin-top: 1rem; display: none;"></div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Find Us</h2>
            <p>Visit our office in Bafang, Cameroon</p>
        </div>
        
        <div style="background: #e0e0e0; height: 400px; border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--text-light-grey);">
            <div style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🗺️</div>
                <h3>Interactive Map</h3>
                <p>Google Maps integration would be embedded here</p>
                <p><strong>Address:</strong> <?php echo $settings['address'] ?? 'Bafang, Cameroon'; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Social Media Links -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Follow Us</h2>
            <p>Stay connected with our latest updates and activities</p>
        </div>
        
        <div style="text-align: center;">
            <div class="social-links" style="justify-content: center; margin-top: 2rem;">
                <a href="#" target="_blank" style="background: #3b5998;">Facebook</a>
                <a href="#" target="_blank" style="background: #e4405f;">Instagram</a>
                <a href="#" target="_blank" style="background: #000000;">TikTok</a>
                <a href="#" target="_blank" style="background: #25d366;">WhatsApp</a>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('formMessage');
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Sending...';
    submitBtn.disabled = true;
    
    fetch('/api/contact', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        messageDiv.style.display = 'block';
        if (data.success) {
            messageDiv.innerHTML = '<div style="color: green; padding: 1rem; background: #d4edda; border: 1px solid #c3e6cb; border-radius: var(--border-radius);">Message sent successfully! We\'ll get back to you soon.</div>';
            this.reset();
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
</script>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
