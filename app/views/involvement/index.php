<?php
// Include the main layout
$content = ob_start();
?>

<!-- Get Involved Hero Section -->
<section class="involvement-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('involve_title', 'Get Involved'); ?></h1>
            <p style="font-size: 1.25rem;">Join us in making a difference in your community. There are many ways to get involved with The Way of Hope.</p>
        </div>
    </div>
</section>

<!-- Ways to Get Involved -->
<section class="section">
    <div class="container">
        <div class="grid grid-3">
            <div class="card" style="text-align: center;">
                <div class="card-body">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🤝</div>
                    <h3><?php echo $this->translate('involve_volunteer', 'Become a Volunteer'); ?></h3>
                    <p>Join our team of dedicated volunteers and make a direct impact in your community. No experience necessary - we provide training!</p>
                    
                    <ul style="text-align: left; margin: 1.5rem 0;">
                        <li>Community outreach programs</li>
                        <li>Education and training support</li>
                        <li>Health awareness campaigns</li>
                        <li>Event organization and support</li>
                        <li>Administrative assistance</li>
                    </ul>
                    
                    <a href="/volunteer" class="btn btn-primary">Apply to Volunteer</a>
                </div>
            </div>
            
            <div class="card" style="text-align: center;">
                <div class="card-body">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">👥</div>
                    <h3><?php echo $this->translate('involve_member', 'Become a Member'); ?></h3>
                    <p>Join as an official member of The Way of Hope and help shape our organization's direction and priorities.</p>
                    
                    <ul style="text-align: left; margin: 1.5rem 0;">
                        <li>Voting rights in organizational decisions</li>
                        <li>Access to member-only events</li>
                        <li>Networking opportunities</li>
                        <li>Leadership development programs</li>
                        <li>Annual membership fee: 5,000 CFA</li>
                    </ul>
                    
                    <a href="/volunteer" class="btn btn-primary">Become a Member</a>
                </div>
            </div>
            
            <div class="card" style="text-align: center;">
                <div class="card-body">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💝</div>
                    <h3><?php echo $this->translate('involve_donate', 'Make a Donation'); ?></h3>
                    <p>Support our mission financially and help us reach more people in need. Every contribution makes a difference.</p>
                    
                    <ul style="text-align: left; margin: 1.5rem 0;">
                        <li>One-time or recurring donations</li>
                        <li>Donate to specific programs</li>
                        <li>Non-cash donations accepted</li>
                        <li>Multiple payment methods</li>
                        <li>Tax-deductible contributions</li>
                    </ul>
                    
                    <a href="/donate" class="btn btn-primary">Donate Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Volunteer Opportunities -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Current Volunteer Opportunities</h2>
            <p>We have several ongoing programs that need volunteer support</p>
        </div>
        
        <div class="grid grid-2">
            <div class="card">
                <div class="card-body">
                    <h4>📚 Education Program Volunteers</h4>
                    <p><strong>Time Commitment:</strong> 2-4 hours per week</p>
                    <p><strong>Responsibilities:</strong> Assist with tutoring, organize educational activities, help with literacy programs</p>
                    <p><strong>Requirements:</strong> Basic education, patience, and enthusiasm for teaching</p>
                    <a href="/volunteer" class="btn btn-outline">Apply Now</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h4>🏥 Health Awareness Volunteers</h4>
                    <p><strong>Time Commitment:</strong> 3-6 hours per week</p>
                    <p><strong>Responsibilities:</strong> Conduct health screenings, distribute materials, organize awareness campaigns</p>
                    <p><strong>Requirements:</strong> Interest in health topics, good communication skills</p>
                    <a href="/volunteer" class="btn btn-outline">Apply Now</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h4>🔧 Vocational Training Assistants</h4>
                    <p><strong>Time Commitment:</strong> 4-8 hours per week</p>
                    <p><strong>Responsibilities:</strong> Help with practical training sessions, mentor participants, assist with job placement</p>
                    <p><strong>Requirements:</strong> Relevant skills or experience in trades</p>
                    <a href="/volunteer" class="btn btn-outline">Apply Now</a>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h4>📢 Event Organizers</h4>
                    <p><strong>Time Commitment:</strong> Flexible, event-based</p>
                    <p><strong>Responsibilities:</strong> Plan and coordinate community events, manage logistics, coordinate volunteers</p>
                    <p><strong>Requirements:</strong> Organizational skills, leadership experience preferred</p>
                    <a href="/volunteer" class="btn btn-outline">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Stories -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Volunteer Stories</h2>
            <p>Hear from our amazing volunteers about their experiences</p>
        </div>
        
        <div class="grid grid-3">
            <div class="card">
                <div class="card-body">
                    <div style="width: 80px; height: 80px; background: #f0f0f0; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
                        👩
                    </div>
                    <h4>Marie, Education Volunteer</h4>
                    <p>"Volunteering with The Way of Hope has been incredibly rewarding. Seeing the children's faces light up when they understand a new concept makes every hour worthwhile."</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div style="width: 80px; height: 80px; background: #f0f0f0; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
                        👨
                    </div>
                    <h4>Paul, Health Awareness Volunteer</h4>
                    <p>"I've learned so much about community health and have made lasting friendships. The organization really cares about both the community and its volunteers."</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div style="width: 80px; height: 80px; background: #f0f0f0; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
                        👩
                    </div>
                    <h4>Grace, Vocational Training Volunteer</h4>
                    <p>"Helping people learn new skills and find employment has been one of the most fulfilling experiences of my life. The impact is real and lasting."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section" style="background: var(--primary-blue); color: white;">
    <div class="container">
        <div class="section-title">
            <h2 style="color: white;">Ready to Make a Difference?</h2>
            <p style="color: rgba(255,255,255,0.9);">Join our community of changemakers today</p>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="/volunteer" class="btn btn-primary" style="margin-right: 1rem; background: var(--accent-yellow); color: var(--text-dark-grey);">Start Volunteering</a>
            <a href="/donate" class="btn btn-secondary">Make a Donation</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
