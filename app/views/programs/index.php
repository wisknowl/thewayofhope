<?php
// Include the main layout
$content = ob_start();
?>

<!-- Programs Hero Section -->
<section class="programs-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('programs_title', 'Our Programs'); ?></h1>
            <p style="font-size: 1.25rem;">Making a difference in communities across Cameroon through focused, impactful programs</p>
        </div>
    </div>
</section>

<!-- Programs Grid -->
<section class="section">
    <div class="container">
        <div class="grid grid-2">
            <?php if (!empty($programs)): ?>
                <?php foreach ($programs as $program): ?>
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <h3><?php echo $program['name_' . $this->getLanguage()] ?? $program['name_en']; ?></h3>
                            <p><?php echo $program['description_' . $this->getLanguage()] ?? $program['description_en']; ?></p>
                            
                            <div style="margin: 1.5rem 0;">
                                <h4>Goals & Objectives:</h4>
                                <p><?php echo $program['goals_' . $this->getLanguage()] ?? $program['goals_en']; ?></p>
                            </div>
                            
                            <div style="margin-top: 2rem;">
                                <a href="/programs/<?php echo strtolower(str_replace(' ', '-', $program['name_en'])); ?>" class="btn btn-primary">
                                    <?php echo $this->translate('learn_more', 'Learn More'); ?>
                                </a>
                                <a href="/donate?program=<?php echo $program['id']; ?>" class="btn btn-outline" style="margin-left: 1rem;">
                                    <?php echo $this->translate('cta_donate', 'Donate to this Program'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default programs if database is empty -->
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <h3><?php echo $this->translate('program_education', 'Education'); ?></h3>
                        <p>Expanding access to quality learning opportunities for all community members, regardless of age or background.</p>
                        
                        <div style="margin: 1.5rem 0;">
                            <h4>Goals & Objectives:</h4>
                            <ul>
                                <li>Provide literacy programs for adults</li>
                                <li>Support school children with supplies and tutoring</li>
                                <li>Offer computer skills training</li>
                                <li>Promote lifelong learning culture</li>
                            </ul>
                        </div>
                        
                        <div style="margin-top: 2rem;">
                            <a href="/programs/education" class="btn btn-primary">Learn More</a>
                            <a href="/donate?program=1" class="btn btn-outline" style="margin-left: 1rem;">Donate to this Program</a>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <h3><?php echo $this->translate('program_health', 'Health Awareness'); ?></h3>
                        <p>Comprehensive health awareness campaigns focusing on HIV/AIDS, Ebola, Malaria, Polio, and Tuberculosis prevention and treatment.</p>
                        
                        <div style="margin: 1.5rem 0;">
                            <h4>Goals & Objectives:</h4>
                            <ul>
                                <li>Conduct community health screenings</li>
                                <li>Provide health education workshops</li>
                                <li>Distribute preventive materials</li>
                                <li>Connect community members with healthcare services</li>
                            </ul>
                        </div>
                        
                        <div style="margin-top: 2rem;">
                            <a href="/programs/health" class="btn btn-primary">Learn More</a>
                            <a href="/donate?program=2" class="btn btn-outline" style="margin-left: 1rem;">Donate to this Program</a>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <h3><?php echo $this->translate('program_vocational', 'Vocational Training'); ?></h3>
                        <p>Practical skills training programs designed to enhance employability and promote self-sufficiency in the community.</p>
                        
                        <div style="margin: 1.5rem 0;">
                            <h4>Goals & Objectives:</h4>
                            <ul>
                                <li>Provide hands-on skills training</li>
                                <li>Connect graduates with employment opportunities</li>
                                <li>Support small business development</li>
                                <li>Foster entrepreneurship</li>
                            </ul>
                        </div>
                        
                        <div style="margin-top: 2rem;">
                            <a href="/programs/vocational" class="btn btn-primary">Learn More</a>
                            <a href="/donate?program=3" class="btn btn-outline" style="margin-left: 1rem;">Donate to this Program</a>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <h3><?php echo $this->translate('program_rights', 'Rights Defense'); ?></h3>
                        <p>Advocacy and support for vulnerable groups and minorities, ensuring their rights are protected and voices are heard.</p>
                        
                        <div style="margin: 1.5rem 0;">
                            <h4>Goals & Objectives:</h4>
                            <ul>
                                <li>Provide legal assistance and advocacy</li>
                                <li>Educate community on human rights</li>
                                <li>Support vulnerable groups</li>
                                <li>Promote social justice</li>
                            </ul>
                        </div>
                        
                        <div style="margin-top: 2rem;">
                            <a href="/programs/rights" class="btn btn-primary">Learn More</a>
                            <a href="/donate?program=4" class="btn btn-outline" style="margin-left: 1rem;">Donate to this Program</a>
                        </div>
                    </div>
                </div>
                
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <h3><?php echo $this->translate('program_disability', 'Disability Inclusion'); ?></h3>
                        <p>Comprehensive support and inclusion programs for persons with disabilities, ensuring they have equal opportunities to participate in community life.</p>
                        
                        <div style="margin: 1.5rem 0;">
                            <h4>Goals & Objectives:</h4>
                            <ul>
                                <li>Provide accessibility support</li>
                                <li>Offer specialized training programs</li>
                                <li>Advocate for inclusive policies</li>
                                <li>Create supportive community networks</li>
                            </ul>
                        </div>
                        
                        <div style="margin-top: 2rem;">
                            <a href="/programs/disability" class="btn btn-primary">Learn More</a>
                            <a href="/donate?program=5" class="btn btn-outline" style="margin-left: 1rem;">Donate to this Program</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Impact Statistics -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <h3>5</h3>
                <p>Active Programs</p>
            </div>
            <div class="stat-item">
                <h3>1,000+</h3>
                <p>Lives Impacted Annually</p>
            </div>
            <div class="stat-item">
                <h3>15+</h3>
                <p>Community Partners</p>
            </div>
            <div class="stat-item">
                <h3>7</h3>
                <p>Years of Service</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Get Involved</h2>
            <p>Join us in making a difference in your community</p>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="/get-involved" class="btn btn-primary" style="margin-right: 1rem;">Become a Volunteer</a>
            <a href="/donate" class="btn btn-outline">Make a Donation</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
