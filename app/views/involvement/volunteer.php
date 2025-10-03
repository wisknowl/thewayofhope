<?php
// Include the main layout
$content = ob_start();
?>

<!-- Volunteer Hero Section -->
<section class="volunteer-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('involve_volunteer', 'Become a Volunteer'); ?></h1>
            <p style="font-size: 1.25rem;">Join our team of dedicated volunteers and make a real difference in your community. We provide training and support for all volunteers.</p>
        </div>
    </div>
</section>

<!-- Volunteer Application Form -->
<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div class="card">
                <div class="card-header">
                    <h2>Volunteer Application Form</h2>
                    <p>Please fill out the form below to apply as a volunteer. All fields marked with * are required.</p>
                </div>
                
                <div class="card-body">
                    <form action="/api/volunteer" method="POST" id="volunteerForm">
                        <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">
                        
                        <div class="grid grid-2">
                            <div class="form-group">
                                <label class="form-label" for="first_name">First Name *</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="last_name">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="grid grid-2">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address *</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Street address, city, region"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="skills">Skills and Experience</label>
                            <textarea id="skills" name="skills" class="form-control" rows="3" placeholder="Please describe any relevant skills, experience, or qualifications you have"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="interests">Areas of Interest</label>
                            <textarea id="interests" name="interests" class="form-control" rows="3" placeholder="Which of our programs are you most interested in volunteering for? (Education, Health, Vocational Training, Rights Defense, Disability Inclusion)"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="availability">Availability</label>
                            <textarea id="availability" name="availability" class="form-control" rows="2" placeholder="When are you available to volunteer? (Days, times, frequency)"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="motivation">Why do you want to volunteer with us?</label>
                            <textarea id="motivation" name="motivation" class="form-control" rows="4" placeholder="Please tell us about your motivation for volunteering and what you hope to contribute"></textarea>
                        </div>
                        
                        <div style="background: #f8f9fa; padding: 1.5rem; border-radius: var(--border-radius); margin: 2rem 0;">
                            <h4>Membership Information</h4>
                            <p>As a volunteer, you can also become an official member of The Way of Hope for a registration fee of 5,000 CFA. This gives you:</p>
                            <ul>
                                <li>Voting rights in organizational decisions</li>
                                <li>Access to member-only events and networking</li>
                                <li>Leadership development opportunities</li>
                                <li>Priority for special programs and training</li>
                            </ul>
                            
                            <div style="margin-top: 1rem;">
                                <label style="display: flex; align-items: center; gap: 0.5rem;">
                                    <input type="checkbox" name="membership_interest" value="yes">
                                    <span>I am interested in becoming a member (5,000 CFA registration fee)</span>
                                </label>
                            </div>
                        </div>
                        
                        <div style="background: #e7f3ff; padding: 1.5rem; border-radius: var(--border-radius); margin: 2rem 0;">
                            <h4>What happens next?</h4>
                            <ol>
                                <li>We'll review your application within 3-5 business days</li>
                                <li>If approved, we'll contact you to schedule an orientation session</li>
                                <li>You'll receive training specific to your chosen program area</li>
                                <li>You'll be matched with ongoing volunteer opportunities</li>
                            </ol>
                        </div>
                        
                        <div style="text-align: center; margin-top: 2rem;">
                            <button type="submit" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.125rem;">Submit Application</button>
                        </div>
                    </form>
                    
                    <div id="formMessage" style="margin-top: 1rem; display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Volunteer Benefits -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Benefits of Volunteering</h2>
            <p>Volunteering with The Way of Hope offers many personal and professional benefits</p>
        </div>
        
        <div class="grid grid-3">
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💼</div>
                    <h4>Professional Development</h4>
                    <ul style="text-align: left;">
                        <li>Gain valuable work experience</li>
                        <li>Develop new skills</li>
                        <li>Build your resume</li>
                        <li>Network with professionals</li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">❤️</div>
                    <h4>Personal Growth</h4>
                    <ul style="text-align: left;">
                        <li>Make a positive impact</li>
                        <li>Meet like-minded people</li>
                        <li>Develop leadership skills</li>
                        <li>Increase self-confidence</li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🎓</div>
                    <h4>Learning Opportunities</h4>
                    <ul style="text-align: left;">
                        <li>Training in your chosen area</li>
                        <li>Workshops and seminars</li>
                        <li>Mentorship opportunities</li>
                        <li>Certificates of completion</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('volunteerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('formMessage');
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;
    
    fetch('/api/volunteer', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        messageDiv.style.display = 'block';
        if (data.success) {
            messageDiv.innerHTML = '<div style="color: green; padding: 1rem; background: #d4edda; border: 1px solid #c3e6cb; border-radius: var(--border-radius);">Application submitted successfully! We\'ll review your application and get back to you within 3-5 business days.</div>';
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
