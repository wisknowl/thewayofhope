<?php
// Include the main layout
$content = ob_start();
?>

<!-- Hero Section with Slideshow -->
<section class="hero">
    <?php
    // Include the header
    include __DIR__ . '/../../components/header.php';
    ?>
    <div class="hero-slideshow">
        <!-- Slide 1: General NGO Message -->
        <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
            <div class="hero-content">
                <h1><?php echo Language::get('hero_title', 'Break down inequalities across all layers of society'); ?></h1>
                <p><?php echo Language::get('hero_subtitle', 'A socio-humanitarian organization focused on improving living conditions through education, health awareness, vocational training, rights defense, and support for vulnerable groups.'); ?></p>
                <div class="hero-buttons">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn btn-primary"><?php echo Language::get('cta_donate', 'Donate Now'); ?></a>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/volunteer" class="btn btn-secondary"><?php echo Language::get('cta_volunteer', 'Volunteer'); ?></a>
                </div>
            </div>
        </div>
        
        <!-- Slide 2: Health Awareness -->
        <div class="hero-slide" style="background-image: url('<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/hero-2.jpg');">
            <div class="hero-content">
                <h1>Health Awareness & Community Wellness</h1>
                <p>Promoting healthy living through education, preventive care, and access to healthcare services. We empower communities with knowledge and resources for better health outcomes.</p>
                <div class="hero-buttons">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/health" class="btn btn-primary">Learn More</a>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/get-involved" class="btn btn-secondary">Get Involved</a>
                </div>
            </div>
        </div>
        
        <!-- Slide 3: Vocational Training -->
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
            <div class="hero-content">
                <h1>Vocational Training & Skills Development</h1>
                <p>Building sustainable futures through practical skills training and entrepreneurship programs. We equip individuals with marketable skills for economic independence and community development.</p>
                <div class="hero-buttons">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/vocational" class="btn btn-primary">Explore Programs</a>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/contact" class="btn btn-secondary">Contact Us</a>
                </div>
            </div>
        </div>
        
        <!-- Slide 4: Rights Defense -->
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
            <div class="hero-content">
                <h1>Rights Defense for Vulnerable Groups</h1>
                <p>Standing up for justice and equality. We provide legal support, advocacy, and protection for vulnerable communities, ensuring their voices are heard and their rights are respected.</p>
                <div class="hero-buttons">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/rights" class="btn btn-primary">Our Mission</a>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn btn-secondary">Support Us</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Slide Indicators -->
    <div class="hero-slide-indicators">
        <span class="hero-slide-indicator active" onclick="currentSlide(1)"></span>
        <span class="hero-slide-indicator" onclick="currentSlide(2)"></span>
        <span class="hero-slide-indicator" onclick="currentSlide(3)"></span>
        <span class="hero-slide-indicator" onclick="currentSlide(4)"></span>
    </div>
</section>

<!-- Three-Step Information Section -->
<section class="section" style="background:#f8f9fa; position: relative;">
    <div class="steps-section">
        <div class="container">
        <div class="steps-container">
            <div class="step-item step-1">
                <div class="step-content">
                    <h5>Causes</h5>
                    <p>We support education, healthcare, and poverty reduction.</p>
                </div>
                <div class="step-button">
                    <a href="#">
                        <span>See Proof <svg class="arrow-icon" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path>
                        </svg></span>
                    </a>
                </div>
            </div>
            
            <div class="step-item step-2">
                <div class="step-content">
                    <h5>Get involved</h5>
                    <p>Volunteer or donate your skills to make a difference.</p>
                </div>
                <div class="step-button">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/involvement/volunteer">
                        <span>View Financials <svg class="arrow-icon" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path>
                        </svg></span>
                    </a>
                </div>
            </div>
            
            <div class="step-item step-3">
                <div class="step-content">
                    <h5>Donation</h5>
                    <p>Contribute today and help us change lives and build a better future.</p>
                </div>
                <div class="step-button">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate">
                        <span>Learn More <svg class="arrow-icon" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path>
                        </svg></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="section" style="background: #f8f9fa;">
    <div class="about-section">
        <div class="container">
        <div class="grid grid-2">
            <div class="about-content">
                <div class="section-title">
                    <h3>About Us</h3>
                    <h2>Our journey of compassion and hope</h2>
                    <p>Join us on a journey towards compassion and hope. Through our non-profit organisation, we strive to make a positive impact on the world. Give back to your community and be a part of something greater than yourself.</p>
                    <p class="lead">A transformational journey towards bringing hope and compassion to the world.</p>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/about" class="btn btn-primary">Read More</a>
                </div>
            </div>
            <div class="about-images">
                <div class="image-grid">
                    <div class="image-item">
                        <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-0001.jpg" alt="Community support" loading="lazy">
                    </div>
                    <div class="image-item">
                        <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-03.jpg" alt="Health awareness" loading="lazy">
                    </div>
                    <div class="image-item">
                        <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-02.jpg" alt="Education programs" loading="lazy">
                    </div>
                    <div class="image-item">
                        <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-0004.jpg" alt="Vocational training" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="section" style="background: white;">
    <div class="programs-section">
        <div class="container">
        <div class="section-title">
            <h2><?php echo Language::get('programs_title', 'Our Programs'); ?></h2>
            <p>Making a difference in communities across Cameroon</p>
        </div>
        
        <div class="grid grid-3">
            <?php if (!empty($programs)): ?>
                <?php foreach ($programs as $program): ?>
                    <div class="card">
                        <div class="card-body">
                            <h4><?php echo $program['name_' . Language::getCurrentLanguage()] ?? $program['name_en']; ?></h4>
                            <p><?php echo substr($program['description_' . Language::getCurrentLanguage()] ?? $program['description_en'], 0, 100); ?>...</p>
                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/<?php echo strtolower(str_replace(' ', '-', $program['name_en'])); ?>" class="btn btn-outline">
                                <?php echo Language::get('learn_more', 'Learn More'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card">
                    <div class="card-body">
                        <h4>Education</h4>
                        <p>Expanding access to quality learning opportunities for all...</p>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/education" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Health Awareness</h4>
                        <p>HIV/AIDS, Ebola, Malaria, Polio, Tuberculosis awareness campaigns...</p>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/health" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Vocational Training</h4>
                        <p>Practical skills for employment and self-sufficiency...</p>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/vocational" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
</section>

<!-- Our Impact Section -->
<section class="section" style="background #f8f9fa;">
    <div class="impact-section">
        <div class="container">
        <div class="section-title text-center">
            <h3>Our Impact</h3>
            <h2>The impact we have made in our community</h2>
            <p>We have made a significant impact in our community through our non-profit organization. By providing services and support to those in need, we have created a positive change. Our efforts have helped to improve the lives of many and we are committed to continuing to make a difference.</p>
        </div>
        
        <div class="grid grid-4">
            <div class="impact-stat">
                <div class="stat-number">20M+</div>
                <div class="stat-label">People served worldwide</div>
            </div>
            <div class="impact-stat">
                <div class="stat-number">142,790</div>
                <div class="stat-label">Projects funded</div>
            </div>
            <div class="impact-stat">
                <div class="stat-number">1.8M</div>
                <div class="stat-label">People to take action</div>
            </div>
            <div class="impact-stat">
                <div class="stat-number">5,246</div>
                <div class="stat-label">Partner organizations</div>
            </div>
        </div>
        
        <div class="impact-cta text-center" style="margin-top: 60px; padding: 40px; background: rgba(255,255,255,0.1); border-radius: 10px;">
            <h3>We can create a better tomorrow</h3>
            <p>Every dollar counts and helps us bring hope and essential resources to those in need.</p>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn btn-secondary">Donate Now</a>
        </div>
        </div>
    </div>
</section>

<!-- Get Involved Section -->
<section class="section" style="background: white;">
    <div class="get-involved-section">
        <div class="container">
        <div class="grid grid-2">
            <div class="get-involved-image">
                <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-05.jpg" alt="Get involved" loading="lazy">
            </div>
            <div class="get-involved-content">
                <div class="section-title">
                    <h3>Get Involved</h3>
                    <h2>Join our movement for change</h2>
                    <p>Join our non-profit organisation and be a part of our movement for positive change. We empower communities, support vulnerable individuals and strive towards building an equitable society. Together, we can create a better world. Join us now!</p>
                    <p class="lead">Become part of a transformative movement by supporting our non-profit organization. Together we can make lasting change.</p>
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/involvement/volunteer" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Latest News Section -->
<section class="section"  style="background: #f8f9fa;">
    <div class="news-section">
        <div class="container">
        <div class="section-title">
            <h2><?php echo Language::get('nav_news', 'Latest News'); ?></h2>
            <p>Stay updated with our latest activities and achievements</p>
        </div>
        
        <div class="grid grid-3">
            <?php if (!empty($latestNews)): ?>
                <?php foreach ($latestNews as $news): ?>
                    <div class="card">
                        <div class="card-body">
                            <h4><?php echo $news['title_' . Language::getCurrentLanguage()] ?? $news['title_en']; ?></h4>
                            <p><?php echo substr($news['excerpt_' . Language::getCurrentLanguage()] ?? $news['excerpt_en'], 0, 100); ?>...</p>
                            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/<?php echo $news['id']; ?>" class="btn btn-outline">
                                <?php echo Language::get('read_more', 'Read More'); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card">
                    <div class="card-body">
                        <h4>Health Campaign Success</h4>
                        <p>Our recent health awareness campaign reached over 500 community members...</p>
                        <a href="#" class="btn btn-outline">Read More</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>New Vocational Training Program</h4>
                        <p>We're excited to announce the launch of our new computer skills training program...</p>
                        <a href="#" class="btn btn-outline">Read More</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Community Outreach Event</h4>
                        <p>Join us for our monthly community outreach event in Bafang...</p>
                        <a href="#" class="btn btn-outline">Read More</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        </div>
    </div>
</section>

<!-- Stories Section -->
<section class="section" style="background: #f8f9fa;">
    <div class="stories-section">
        <div class="container">
        <div class="section-title text-center">
            <h2>Inspiring tales of transformation</h2>
            <p>Get inspired by the remarkable stories of transformation through our non-profit organization. Join us in making a positive impact today.</p>
        </div>
        
        <div class="grid grid-3">
            <div class="story-card">
                <div class="story-image">
                    <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-06.jpg" alt="The Special One" loading="lazy">
                </div>
                <div class="story-content">
                    <h4>The Special One</h4>
                    <p>Join our non-profit organisation to help create a brighter future for those in need. Every donation counts towards making a difference in the lives of those less fortunate.</p>
                    <a href="#" class="btn btn-outline">Read More</a>
                </div>
            </div>
            
            <div class="story-card">
                <div class="story-image">
                    <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-07.jpg" alt="Community Impact" loading="lazy">
                </div>
                <div class="story-content">
                    <h4>Community Impact</h4>
                    <p>See how our programs have transformed communities and empowered individuals to build better futures for themselves and their families.</p>
                    <a href="#" class="btn btn-outline">Read More</a>
                </div>
            </div>
            
            <div class="story-card">
                <div class="story-image">
                    <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-08.jpg" alt="Success Story" loading="lazy">
                </div>
                <div class="story-content">
                    <h4>Success Story</h4>
                    <p>Discover how our vocational training programs have helped individuals gain skills and create sustainable livelihoods for their communities.</p>
                    <a href="#" class="btn btn-outline">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Donate Button (Homepage Only) -->
<div class="floating-donate-btn" id="floatingDonateBtn">
    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn-donate-floating">
        <span class="donate-icon">❤️</span>
        <span class="donate-text">Donate</span>
    </a>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>