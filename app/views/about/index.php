<?php
// Include the main layout
$content = ob_start();
?>

<!-- About Hero Section -->
<section class="about-hero" style="height: 68vh; position: relative;">
    <?php
    // Include the header
    include __DIR__ . '/../../components/header.php';
    ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1624031000106-79254a8faa19?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGRpc2Vhc2V8ZW58MHx8MHx8fDA%3D') center/cover no-repeat">
        <div class="hero-content">
            <h1><?php echo $this->translate('about_title', 'About The Way of Hope'); ?></h1>
            <p style="font-size: 1.25rem;"><?php echo $this->translate('hero_subtitle', 'A faith-inspired, socio-humanitarian organization focused on improving living conditions...'); ?></p>
        </div>
    </div>
</section>

<!-- Mission, Vision, Values Section -->
<section class="section">
    <div class="container">
        <div class="grid grid-3">
            <div class="card">
                <div class="card-header">
                    <h3><?php echo $this->translate('about_mission', 'Our Mission'); ?></h3>
                </div>
                <div class="card-body">
                    <p>A faith-inspired, socio-humanitarian organization focused on improving living conditions through education, health awareness, vocational training, rights defense, and support for vulnerable groups.</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3><?php echo $this->translate('about_vision', 'Our Vision'); ?></h3>
                </div>
                <div class="card-body">
                    <p>To break down inequalities across all layers of society, creating a more just and equitable world where every individual has the opportunity to thrive and contribute to their community.</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3><?php echo $this->translate('about_values', 'Our Values'); ?></h3>
                </div>
                <div class="card-body">
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;">• <strong>Compassion:</strong> Empathy and care for all</li>
                        <li style="margin-bottom: 0.5rem;">• <strong>Human Dignity:</strong> Respect for every person</li>
                        <li style="margin-bottom: 0.5rem;">• <strong>Integrity:</strong> Honest and transparent actions</li>
                        <li style="margin-bottom: 0.5rem;">• <strong>Respect:</strong> Valuing diverse perspectives</li>
                        <li style="margin-bottom: 0.5rem;">• <strong>Empowerment:</strong> Enabling self-sufficiency</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our History Section -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2><?php echo $this->translate('about_history', 'Our History'); ?></h2>
            <p>Founded in 2017 in Bafang, Cameroon</p>
        </div>
        
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <p style="font-size: 1.125rem; line-height: 1.8; margin-bottom: 2rem;">
                The Way of Hope was founded in 2017 in Bafang, Cameroon, with a vision to address the pressing social inequalities in our community. What started as a small group of dedicated individuals has grown into a registered NGO that has touched the lives of thousands.
            </p>
            
            <div class="grid grid-2" style="margin-top: 3rem;">
                <div class="card">
                    <div class="card-body">
                        <h4>2017 - Foundation</h4>
                        <p>Founded by Dr. Marie Nguema and a group of community leaders who recognized the need for organized social support in Bafang.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h4>2018 - First Programs</h4>
                        <p>Launched our first education and health awareness programs, reaching over 200 community members in the first year.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h4>2019 - Expansion</h4>
                        <p>Expanded to include vocational training programs and established partnerships with local government agencies.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h4>2020-Present - Growth</h4>
                        <p>Continued growth with new programs in disability inclusion and rights defense, now serving over 1,000 community members annually.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Board of Directors Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Board of Directors</h2>
            <p>Meet the leadership team guiding The Way of Hope</p>
        </div>
        
        <div class="grid grid-3">
            <?php foreach ($boardMembers as $member): ?>
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <div style="width: 120px; height: 120px; border-radius: 50%; background: #f0f0f0; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--primary-blue);">
                            👤
                        </div>
                        <h4><?php echo $member['name']; ?></h4>
                        <p style="color: var(--accent-yellow); font-weight: 600; margin-bottom: 1rem;"><?php echo $member['position']; ?></p>
                        <p><?php echo $member['bio']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Our Partners</h2>
            <p>Working together for positive change</p>
        </div>
        
        <div class="grid grid-3">
            <?php foreach ($partners as $partner): ?>
                <div class="card">
                    <div class="card-body" style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: #f0f0f0; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; border-radius: var(--border-radius);">
                            🤝
                        </div>
                        <h4><?php echo $partner['name']; ?></h4>
                        <p><?php echo $partner['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Get in Touch</h2>
            <p>We'd love to hear from you</p>
        </div>
        
        <div class="grid grid-2">
            <div>
                <h3>Contact Information</h3>
                <div style="margin-bottom: 1rem;">
                    <strong>Email:</strong> <?php echo $settings['contact_email'] ?? 'info@thewayofhope.org'; ?><br>
                    <strong>Phone:</strong> <?php echo $settings['contact_phone'] ?? '+237 6XX XXX XXX'; ?><br>
                    <strong>Address:</strong> <?php echo $settings['address'] ?? 'Bafang, Cameroon'; ?>
                </div>
                
                <h3>Office Hours</h3>
                <p>Monday - Friday: 8:00 AM - 5:00 PM<br>
                Saturday: 9:00 AM - 1:00 PM<br>
                Sunday: Closed</p>
            </div>
            
            <div>
                <h3>Send us a Message</h3>
                <form action="/api/contact" method="POST" style="margin-top: 1rem;">
                    <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">
                    
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
