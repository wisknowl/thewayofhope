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
<section class="section" style="background: #ffffed; position: relative;">
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
<section class="section" style="background: rgb(205, 219, 233);">
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
<section class="section" style="background: #ffffed; padding: 80px 0;">
    <div class="programs-section">
        <div class="container">
            <div class="section-title text-center" style="margin-bottom: 60px;">
            <h2><?php echo Language::get('programs_title', 'Our Programs'); ?></h2>
                <p>Making a difference in communities across the world</p>
        </div>
        
            <!-- Program 1: Education -->
            <div class="program-item education-program" style="margin-bottom: 80px;">
                <div class="program-container" style="display: flex; align-items: center; position: relative; min-height: 400px;">
                    <!-- Image Div (Left) -->
                    <div class="program-image" style="flex: 2; height: 500px; background-image: url('https://images.unsplash.com/photo-1636772523547-5577d04e8dc1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGFmcmljYW4lMjBjbGFzcyUyMHJvb218ZW58MHx8MHx8fDA%3D'); background-size: cover; background-position: center; border-radius: 10px; position: relative; z-index: 1;"></div>
                    
                    <!-- Text Div (Right) - Overlaps Image -->
                    <div class="program-content" style="flex: 1; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-left: -80px; position: relative; z-index: 2; min-height: 400px; display: flex; flex-direction: column; justify-content: center;">
                        <h3 style="font-size: 2rem; margin-bottom: 20px; color: var(--primary-blue);">Education</h3>
                        <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 25px; color: var(--text-light-grey);">Expanding access to quality learning opportunities for children and adults in underserved communities. We build foundations for brighter futures through comprehensive educational programs.</p>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/education" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                    </div>
            
            <!-- Program 2: Health Awareness -->
            <div class="program-item health-program" style="margin-bottom: 80px;">
                <div class="program-container" style="display: flex; align-items: center; position: relative; min-height: 400px;">
                    <!-- Text Div (Left) -->
                    <div class="program-content" style="flex: 1; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-right: -80px; position: relative; z-index: 2; min-height: 400px; display: flex; flex-direction: column; justify-content: center;">
                        <h3 style="font-size: 2rem; margin-bottom: 20px; color: var(--primary-blue);">Health Awareness</h3>
                        <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 25px; color: var(--text-light-grey);">Raising awareness and providing resources for HIV/AIDS, Ebola, Malaria, Polio, Tuberculosis prevention and treatment. We empower communities with health knowledge.</p>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/health" class="btn btn-primary">Learn More</a>
                    </div>
                    
                    <!-- Image Div (Right) - Overlapped by Text -->
                    <div class="program-image" style="flex: 2; height: 500px; background-image: url('<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/hero-2.jpg'); background-size: cover; background-position: center; border-radius: 10px; position: relative; z-index: 1;"></div>
                </div>
        </div>
        </div>
    </div>
</section>

<!-- Our Impact Section -->
<section class="section" style="background: rgb(205, 219, 233);">
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
        
        <div class="impact-cta" style="margin-top: 60px; padding: 40px; background: var(--primary-blue); border-radius: 10px; display: flex; align-items: center; justify-content: space-between;">
            <div class="cta-content" style="flex: 1;">
                <h3 style="color: white; font-size: 1.8rem; margin-bottom: 10px; font-weight: 600;">We can create a better tomorrow</h3>
                <p style="color: rgba(255,255,255,0.9); font-size: 1.1rem; margin: 0;">Every dollar counts and helps us bring hope and essential resources to those in need.</p>
            </div>
            <div class="cta-button" style="margin-left: 30px;">
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn btn-secondary" style="background: white; color: var(--primary-blue); border: 2px solid white; padding: 12px 24px; font-weight: 600; text-decoration: none; transition: all 0.3s ease;">Donate Now</a>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Get Involved Section -->
<section class="section" style="background:rgb(205, 219, 233);">
    <div class="get-involved-section">
        <div class="container">
        <div class="grid grid-2">
            <div class="get-involved-image">
                <img src="https://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-05.jpg" alt="Get involved" loading="lazy">
            </div>
            <div class="get-involved-content" style="display: flex; flex-direction: column; justify-content: center; height: 100%;">
                <div class="section-title" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%; padding: 40px 0;">
                    <div class="content-text" style="flex: 1; display: flex; flex-direction: column; justify-content: center;">
                        <h3 style="font-size: 1.4rem; color: var(--text-dark-grey); margin-bottom: 15px; font-weight: 500;">Get Involved</h3>
                        <h2 style="font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 25px; font-weight: 700; line-height: 1.2;">Join our movement for change</h2>
                        <p style="font-size: 1.1rem; color: var(--text-light-grey); margin-bottom: 20px; line-height: 1.6;">Join our non-profit organisation and be a part of our movement for positive change. We empower communities, support vulnerable individuals and strive towards building an equitable society. Together, we can create a better world. Join us now!</p>
                        <p class="lead" style="font-size: 1.1rem; color: var(--text-light-grey); line-height: 1.6; font-weight: 500;">Become part of a transformative movement by supporting our non-profit organization. Together we can make lasting change.</p>
                    </div>
                    <div class="content-button" style="margin-top: auto; padding-top: 40px;">
                    <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/involvement/volunteer" class="btn btn-primary">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Latest News Section -->
<section class="section" style="background: #ffffed;">
    <div class="news-section">
        <div class="container">
            <div class="section-title text-center" style="margin-bottom: 50px;">
            <h2><?php echo Language::get('nav_news', 'Latest News'); ?></h2>
            <p>Stay updated with our latest activities and achievements</p>
        </div>
        
            <div class="dynamic-news-container" style="display: flex; gap: 30px; min-height: 400px;">
                    <!-- Main News Display (Left) - flex: 3 -->
                    <div class="main-news-display" style="flex: 2; position: relative; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); height: 500px;">
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/health-campaign-success" class="news-slide active clickable-news" data-news="0" style="display: block; text-decoration: none; color: inherit; height: 100%; position: relative;">
                            <div class="news-background" style="height: 100%; background-image: url('<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/hero-2.jpg'); background-size: cover; background-position: center; position: relative;">
                                <div class="news-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0) 100%); display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-start; color: white; padding: 40px;">
                                    <div style="text-align: left; max-width: 80%;">
                                        <h3 style="font-size: 2.5rem; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); font-weight: 700; color: white;">Health Campaign Success</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/vocational-training-program" class="news-slide clickable-news" data-news="1" style="display: none; text-decoration: none; color: inherit; height: 100%; position: relative;">
                            <div class="news-background" style="height: 100%; background-image: url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; position: relative;">
                                <div class="news-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0) 100%); display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-start; color: white; padding: 40px;">
                                    <div style="text-align: left; max-width: 80%;">
                                        <h3 style="font-size: 2.5rem; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); font-weight: 700; color: white;">New Vocational Training Program</h3>
                                    </div>
                                </div>
                    </div>
                        </a>
                        
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/community-outreach-event" class="news-slide clickable-news" data-news="2" style="display: none; text-decoration: none; color: inherit; height: 100%; position: relative;">
                            <div class="news-background" style="height: 100%; background-image: url('https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; position: relative;">
                                <div class="news-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0) 100%); display: flex; flex-direction: column; justify-content: flex-end; align-items: flex-start; color: white; padding: 40px;">
                                    <div style="text-align: left; max-width: 80%;">
                                        <h3 style="font-size: 2.5rem; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); font-weight: 700; color: white;">Community Outreach Event</h3>
                                    </div>
                                </div>
                    </div>
                        </a>
                    
                    <!-- Navigation Arrows -->
                    <button class="news-nav news-prev" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.9); border: none; border-radius: 50%; width: 50px; height: 50px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--primary-blue); transition: all 0.3s ease;">‹</button>
                    <button class="news-nav news-next" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: rgba(255,255,255,0.9); border: none; border-radius: 50%; width: 50px; height: 50px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--primary-blue); transition: all 0.3s ease;">›</button>
                </div>
                
                        <!-- News List Sidebar (Right) - flex: 1 -->
                        <div class="news-list-sidebar" style="flex: 1; background: white; border-radius: 15px; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden;">
                            <h5 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 1.2rem; font-weight: 600;">Recent News</h5>
                            <div class="news-list" style="height: 350px; overflow-y: auto; overflow-x: hidden;">
                                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/health-campaign-success" class="news-list-item active clickable-news" data-news="0" style="display: block; width: 100%; height: 160px; border-radius: 10px; background-image: url('<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/hero-2.jpg'); background-size: cover; background-position: center; color: white; margin-bottom: 10px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 10px; padding: 15px; display: flex; flex-direction: column; justify-content: center;">
                                        <h6 style="font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Health Campaign Success</h6>
                                        <p style="font-size: 0.8rem; margin: 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">500+ community members reached</p>
                                    </div>
                                </a>
                                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/vocational-training-program" class="news-list-item clickable-news" data-news="1" style="display: block; width: 100%; height: 160px; border-radius: 10px; background-image: url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; margin-bottom: 10px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 10px; padding: 15px; display: flex; flex-direction: column; justify-content: center; color: white;">
                                        <h6 style="font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">New Vocational Training</h6>
                                        <p style="font-size: 0.8rem; margin: 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Computer skills program launched</p>
                                    </div>
                                </a>
                                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/community-outreach-event" class="news-list-item clickable-news" data-news="2" style="display: block; width: 100%; height: 160px; border-radius: 10px; background-image: url('https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; margin-bottom: 10px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 10px; padding: 15px; display: flex; flex-direction: column; justify-content: center; color: white;">
                                        <h6 style="font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Community Outreach</h6>
                                        <p style="font-size: 0.8rem; margin: 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Monthly event in Bafang</p>
                                    </div>
                                </a>
                                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/school-renovation" class="news-list-item clickable-news" style="display: block; width: 100%; height: 160px; border-radius: 10px; background-image: url('https://images.unsplash.com/photo-1497486751825-1233686d5d80?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; margin-bottom: 10px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 10px; padding: 15px; display: flex; flex-direction: column; justify-content: center; color: white;">
                                        <h6 style="font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">School Renovation Project</h6>
                                        <p style="font-size: 0.8rem; margin: 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">3 classrooms renovated in Douala</p>
                                    </div>
                                </a>
                                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/food-distribution" class="news-list-item clickable-news" style="display: block; width: 100%; height: 160px; border-radius: 10px; background-image: url('https://images.unsplash.com/photo-1584464491033-06628f3a6b7b?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; margin-bottom: 10px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 10px; padding: 15px; display: flex; flex-direction: column; justify-content: center; color: white;">
                                        <h6 style="font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Food Distribution Drive</h6>
                                        <p style="font-size: 0.8rem; margin: 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">1000 families supported</p>
                                    </div>
                                </a>
                                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/youth-empowerment" class="news-list-item clickable-news" style="display: block; width: 100%; height: 160px; border-radius: 10px; background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; margin-bottom: 10px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 10px; padding: 15px; display: flex; flex-direction: column; justify-content: center; color: white;">
                                        <h6 style="font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Youth Empowerment Summit</h6>
                                        <p style="font-size: 0.8rem; margin: 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Leadership training completed</p>
                                    </div>
                                </a>
                                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news/water-project" class="news-list-item clickable-news" style="display: block; width: 100%; height: 160px; border-radius: 10px; background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&auto=format&fit=crop&q=60&ixlib=rb-4.1.0'); background-size: cover; background-position: center; margin-bottom: 10px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; position: relative;">
                                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.4); border-radius: 10px; padding: 15px; display: flex; flex-direction: column; justify-content: center; color: white;">
                                        <h6 style="font-size: 0.9rem; margin-bottom: 5px; font-weight: 600; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">Clean Water Initiative</h6>
                                        <p style="font-size: 0.8rem; margin: 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.7); color: white;">New well installed in rural area</p>
                                    </div>
                                </a>
                    </div>
                </div>
        </div>
        </div>
    </div>
</section>

<!-- Stories Section -->
<section class="section" style="background: #ffffed;">
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
                    <img src="https://images.unsplash.com/photo-1641194298727-fa6e5401bf1b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDR8fHN1Y2Nlc3NmdWxsJTIwZW5naW5lZXJ8ZW58MHx8MHx8fDA%3Dhttps://websitedemos.net/non-profit-organization-04/wp-content/uploads/sites/1476/2023/06/home-08.jp" alt="Success Story" loading="lazy">
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
        <span class="donate-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="red" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        </span>
        <span class="donate-text">Donate</span>
    </a>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>