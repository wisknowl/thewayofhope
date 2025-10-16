<?php
// Include the main layout
$content = ob_start();
?>

<!-- Hero Section -->
<section class="hero" style="position: relative; background-image: url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1920&auto=format&fit=crop&q=80'); background-size: cover; background-position: center;">
    <!-- Overlay layer -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); z-index: 1;"></div>

    <?php
    // Include the header
    include __DIR__ . '/../../components/header.php';
    ?>

    <!-- Content layer -->
    <div class="hero-content" style="position: relative; z-index: 2;">
        <h1><?php echo Language::get('rare_diseases_hero_title', 'Understanding Rare Diseases'); ?></h1>
        <p style="color: white;"><?php echo Language::get('rare_diseases_hero_subtitle', 'Supporting families, advancing research, and building a global community for those affected by rare and neglected diseases.'); ?></p>
        <div class="hero-buttons">
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn btn-primary"><?php echo Language::get('cta_donate', 'Donate Now'); ?></a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/contact" class="btn btn-secondary"><?php echo Language::get('cta_contact_us', 'Contact Us'); ?></a>
        </div>
    </div>
</section>


<!-- Main Topics Section with Sidebar -->
<section class="section" style="background: rgb(205, 219, 233); padding: 80px 0;">
    <div class="container">
        <div style="display: flex; gap: 40px; align-items: flex-start;">
            
            <!-- Main Content Area (80%) -->
            <div class="topics-content" style="flex: 3; background: white; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); padding: 40px;">
                
                <!-- Topic 1: Why Understanding Matters -->
                <div id="understanding" class="topic-detail active">
                    <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=800&auto=format&fit=crop&q=80" alt="Why Understanding Matters" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic1_title', 'Why Understanding Matters'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic1_desc', 'Rare diseases affect millions worldwide, yet they remain largely misunderstood and underfunded. Understanding these conditions is crucial for early diagnosis, proper treatment, and supporting affected families. Each rare disease may affect only a small number of people, but collectively, they impact 1 in 10 individuals globally. By raising awareness, we can drive research, improve healthcare access, and ensure no one faces their journey alone.'); ?>
                    </p>
                </div>

                <!-- Topic 2: Challenges -->
                <div id="challenges" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&auto=format&fit=crop&q=80" alt="Challenges" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic2_title', 'Challenges'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic2_desc', 'Patients with rare diseases face numerous challenges including delayed diagnosis (often 5-7 years), limited treatment options, high medical costs, social isolation, and lack of specialized healthcare providers. Many conditions have no cure, and families often struggle to find information and support. Geographic barriers, especially in developing countries, further compound these difficulties. We work to address these challenges through advocacy, education, and direct support programs.'); ?>
                    </p>
                </div>

                <!-- Topic 3: Living with a Rare Disease -->
                <div id="living" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=800&auto=format&fit=crop&q=80" alt="Living with a Rare Disease" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic3_title', 'Living with a Rare Disease'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic3_desc', 'Living with a rare disease affects every aspect of daily life - from medical appointments and treatments to education, employment, and relationships. Patients and families become experts in their condition, often educating their own healthcare providers. Emotional resilience, strong support networks, and access to specialized care are essential. We provide resources, connect families with similar experiences, and advocate for better quality of life for all those affected.'); ?>
                    </p>
                </div>

                <!-- Topic 4: Resources -->
                <div id="resources" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=800&auto=format&fit=crop&q=80" alt="Resources" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic4_title', 'Resources'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic4_desc', 'Access to reliable information and resources is critical for rare disease patients and families. We provide comprehensive guides, connect individuals with specialist centers, offer financial assistance programs, and maintain a library of educational materials. Our resource hub includes information on disease management, treatment options, clinical trials, patient rights, and support services. We also facilitate connections to international rare disease databases and expert medical teams.'); ?>
                    </p>
                </div>

                <!-- Topic 5: Advancing Research -->
                <div id="research" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=800&auto=format&fit=crop&q=80" alt="Advancing Research" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic5_title', 'Advancing Research'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic5_desc', 'Research is the pathway to better treatments and potential cures. We support cutting-edge research by funding studies, facilitating data sharing, and connecting researchers with patient communities. Our initiatives include supporting clinical trials, promoting genetic research, and advocating for policies that accelerate drug development for rare diseases. Every research breakthrough brings hope and improves outcomes for patients worldwide.'); ?>
                    </p>
                </div>

                <!-- Topic 6: Global Advocacy -->
                <div id="advocacy" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&auto=format&fit=crop&q=80" alt="Global Advocacy" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic6_title', 'Global Advocacy'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic6_desc', 'Advocacy is essential to drive policy changes, improve healthcare systems, and secure funding for rare disease research and treatments. We work with governments, international organizations, and healthcare systems to ensure rare diseases are recognized in health policies. Our advocacy efforts focus on equitable access to diagnosis and treatment, patient rights, insurance coverage, and inclusion of rare diseases in national health agendas.'); ?>
                    </p>
                </div>

                <!-- Topic 7: Make a Difference -->
                <div id="difference" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800&auto=format&fit=crop&q=80" alt="Make a Difference" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic7_title', 'Make a Difference'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic7_desc', 'Everyone can contribute to the rare disease community. Whether through donations, volunteering, raising awareness, participating in fundraising events, or simply sharing information, your involvement matters. Support families by listening to their stories, advocate for better policies, or contribute to research funding. Together, we can transform the landscape of rare diseases and bring hope to millions of families worldwide.'); ?>
                    </p>
                </div>

                <!-- Topic 8: Rare Patients & Researchers -->
                <div id="patients-researchers" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=800&auto=format&fit=crop&q=80" alt="Rare Patients & Researchers" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic8_title', 'Rare Patients & Researchers'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic8_desc', 'The partnership between patients and researchers is fundamental to progress in rare diseases. Patients provide invaluable insights into their conditions, participate in clinical trials, and help shape research priorities. We facilitate these crucial collaborations through patient registries, research networks, and regular forums where patients and scientists work together. This partnership accelerates discovery and ensures research addresses real patient needs.'); ?>
                    </p>
                </div>

                <!-- Topic 9: Global Support -->
                <div id="global-support" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=800&auto=format&fit=crop&q=80" alt="Global Support" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic9_title', 'Global Support'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic9_desc', 'Rare diseases know no borders. Our global support network connects patients, families, healthcare providers, and researchers across continents. We provide multilingual resources, facilitate international collaborations, and ensure that advancements in one region benefit patients everywhere. Through our global partnerships, we work to reduce disparities in care and ensure all patients have access to the latest treatments and support services.'); ?>
                    </p>
                </div>

                <!-- Topic 10: Rare @ School -->
                <div id="school" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&auto=format&fit=crop&q=80" alt="Rare @ School" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic10_title', 'Rare @ School'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic10_desc', 'Children with rare diseases face unique challenges in educational settings. Our Rare @ School program provides resources for teachers, school administrators, and parents to create inclusive learning environments. We offer educational accommodations guidance, peer awareness programs, and support for managing medical needs during school hours. Every child deserves access to quality education, regardless of their health condition.'); ?>
                    </p>
                </div>

                <!-- Topic 11: Patient Organization in your Country -->
                <div id="patient-org" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1573497491208-6b1acb260507?w=800&auto=format&fit=crop&q=80" alt="Patient Organization" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic11_title', 'Patient Organization in your Country'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic11_desc', 'Local patient organizations are vital lifelines for rare disease communities. We help establish and strengthen patient organizations in countries worldwide, providing training, resources, and networking opportunities. These organizations advocate for local policy changes, organize support groups, and ensure patients have a voice in their healthcare systems. Find or start a patient organization in your area and connect with others who understand your journey.'); ?>
                    </p>
                </div>

                <!-- Topic 12: Global Partnerships -->
                <div id="partnerships" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&auto=format&fit=crop&q=80" alt="Global Partnerships" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic12_title', 'Global Partnerships'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic12_desc', 'Collaboration is key to addressing rare diseases effectively. We partner with leading research institutions, pharmaceutical companies, healthcare providers, and other NGOs to maximize our impact. These partnerships enable resource sharing, accelerate research, improve access to treatments, and ensure patients benefit from collective expertise. Together, we are stronger and can achieve more for the rare disease community.'); ?>
                    </p>
                </div>

                <!-- Topic 13: Connecting the Rare Disease Community -->
                <div id="connecting" class="topic-detail" style="display: none;">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800&auto=format&fit=crop&q=80" alt="Connecting the Community" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
                    <h2 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 2.2rem;"><?php echo Language::get('rare_topic13_title', 'Connecting the Rare Disease Community'); ?></h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light-grey);">
                        <?php echo Language::get('rare_topic13_desc', 'Connection transforms isolation into community. We bring together patients, families, caregivers, healthcare professionals, and researchers through online platforms, conferences, support groups, and social events. Sharing experiences, knowledge, and hope creates a powerful support network. Our community connects individuals across diseases, geographies, and backgrounds, united by a common cause: improving life for everyone affected by rare diseases.'); ?>
                    </p>
                </div>

            </div>

            <!-- Topics Sidebar (20%) -->
            <div class="topics-sidebar" style="flex: 1; position: sticky; top: 100px;">
                <div style="background: #f8f9fa; border-radius: 10px; padding: 25px; box-shadow: 0 3px 15px rgba(0,0,0,0.08);">
                    <h3 style="color: var(--primary-blue); margin-bottom: 20px; font-size: 1.3rem; border-bottom: 2px solid var(--primary-yellow); padding-bottom: 10px;"><?php echo Language::get('rare_topics_title', 'Topics'); ?></h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 10px;"><a href="#understanding" class="topic-link active" data-topic="understanding" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic1_title', 'Why Understanding Matters'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#challenges" class="topic-link" data-topic="challenges" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic2_title', 'Challenges'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#living" class="topic-link" data-topic="living" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic3_title', 'Living with a Rare Disease'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#resources" class="topic-link" data-topic="resources" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic4_title', 'Resources'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#research" class="topic-link" data-topic="research" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic5_title', 'Advancing Research'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#advocacy" class="topic-link" data-topic="advocacy" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic6_title', 'Global Advocacy'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#difference" class="topic-link" data-topic="difference" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic7_title', 'Make a Difference'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#patients-researchers" class="topic-link" data-topic="patients-researchers" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic8_title', 'Rare Patients & Researchers'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#global-support" class="topic-link" data-topic="global-support" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic9_title', 'Global Support'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#school" class="topic-link" data-topic="school" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic10_title', 'Rare @ School'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#patient-org" class="topic-link" data-topic="patient-org" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic11_title', 'Patient Organization in your Country'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#partnerships" class="topic-link" data-topic="partnerships" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic12_title', 'Global Partnerships'); ?></a></li>
                        <li style="margin-bottom: 10px;"><a href="#connecting" class="topic-link" data-topic="connecting" style="display: block; padding: 12px 15px; color: var(--text-dark-grey); text-decoration: none; border-radius: 5px; transition: all 0.3s; font-size: 0.95rem;"><?php echo Language::get('rare_topic13_title', 'Connecting the Rare Disease Community'); ?></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- How We Help Section -->
<section class="section" style="background: #ffffed; padding: 80px 0;">
    <div class="container">
        <div class="section-title text-center" style="margin-bottom: 60px;">
            <h2 style="color: var(--primary-blue); font-size: 2.5rem; margin-bottom: 15px;"><?php echo Language::get('rare_how_we_help_title', 'How We Help'); ?></h2>
            <p style="font-size: 1.1rem; color: var(--text-light-grey);"><?php echo Language::get('rare_how_we_help_subtitle', 'Our step-by-step process to support you'); ?></p>
        </div>

        <div class="help-steps" style="display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
            
            <!-- Step 1 -->
            <div class="help-step" style="flex: 1; min-width: 200px; text-align: center;">
                <img src="https://media.istockphoto.com/id/2228660735/photo/isolated-certified-document-with-seal-of-approval.webp?a=1&b=1&s=612x612&w=0&k=20&c=CHny989Ygc-SNoQ96Ju64dFW6oCt33jHKU1ZvbUfJ_U=" alt="Qualify & Register" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; margin: 0 auto 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.15);">
                <h4 style="color: var(--primary-blue); margin-bottom: 10px; font-size: 1.2rem;"><?php echo Language::get('rare_step1_title', 'Qualify & Register'); ?></h4>
                <p style="color: var(--text-light-grey); font-size: 0.95rem;"><?php echo Language::get('rare_step1_desc', 'See if you qualify, then fill out our patient questionnaire'); ?></p>
            </div>

            <!-- Arrow 1 -->
            <div class="arrow" style="flex: 0 0 40px; text-align: center;">
                <svg width="40" height="24" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M39.0607 13.0607C39.6464 12.4749 39.6464 11.5251 39.0607 10.9393L29.5147 1.39341C28.9289 0.807625 27.9792 0.807625 27.3934 1.39341C26.8076 1.97919 26.8076 2.92894 27.3934 3.51472L35.8787 12L27.3934 20.4853C26.8076 21.0711 26.8076 22.0208 27.3934 22.6066C27.9792 23.1924 28.9289 23.1924 29.5147 22.6066L39.0607 13.0607ZM-1.31134e-07 13.5L38 13.5L38 10.5L1.31134e-07 10.5L-1.31134e-07 13.5Z" fill="var(--primary-blue)"/>
                </svg>
            </div>

            <!-- Step 2 -->
            <div class="help-step" style="flex: 1; min-width: 200px; text-align: center;">
                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&auto=format&fit=crop&q=80" alt="Application Preparation" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; margin: 0 auto 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.15);">
                <h4 style="color: var(--primary-blue); margin-bottom: 10px; font-size: 1.2rem;"><?php echo Language::get('rare_step2_title', 'Application Preparation'); ?></h4>
                <p style="color: var(--text-light-grey); font-size: 0.95rem;"><?php echo Language::get('rare_step2_desc', 'We\'ll prepare your application and connect you with specialists'); ?></p>
            </div>

            <!-- Arrow 2 -->
            <div class="arrow" style="flex: 0 0 40px; text-align: center;">
                <svg width="40" height="24" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M39.0607 13.0607C39.6464 12.4749 39.6464 11.5251 39.0607 10.9393L29.5147 1.39341C28.9289 0.807625 27.9792 0.807625 27.3934 1.39341C26.8076 1.97919 26.8076 2.92894 27.3934 3.51472L35.8787 12L27.3934 20.4853C26.8076 21.0711 26.8076 22.0208 27.3934 22.6066C27.9792 23.1924 28.9289 23.1924 29.5147 22.6066L39.0607 13.0607ZM-1.31134e-07 13.5L38 13.5L38 10.5L1.31134e-07 10.5L-1.31134e-07 13.5Z" fill="var(--primary-blue)"/>
                </svg>
            </div>

            <!-- Step 3 -->
            <div class="help-step" style="flex: 1; min-width: 200px; text-align: center;">
                <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=400&auto=format&fit=crop&q=80" alt="Coordination & Support" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; margin: 0 auto 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.15);">
                <h4 style="color: var(--primary-blue); margin-bottom: 10px; font-size: 1.2rem;"><?php echo Language::get('rare_step3_title', 'Coordination & Support'); ?></h4>
                <p style="color: var(--text-light-grey); font-size: 0.95rem;"><?php echo Language::get('rare_step3_desc', 'We work with you and healthcare providers for comprehensive care'); ?></p>
            </div>

            <!-- Arrow 3 -->
            <div class="arrow" style="flex: 0 0 40px; text-align: center;">
                <svg width="40" height="24" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M39.0607 13.0607C39.6464 12.4749 39.6464 11.5251 39.0607 10.9393L29.5147 1.39341C28.9289 0.807625 27.9792 0.807625 27.3934 1.39341C26.8076 1.97919 26.8076 2.92894 27.3934 3.51472L35.8787 12L27.3934 20.4853C26.8076 21.0711 26.8076 22.0208 27.3934 22.6066C27.9792 23.1924 28.9289 23.1924 29.5147 22.6066L39.0607 13.0607ZM-1.31134e-07 13.5L38 13.5L38 10.5L1.31134e-07 10.5L-1.31134e-07 13.5Z" fill="var(--primary-blue)"/>
                </svg>
            </div>

            <!-- Step 4 -->
            <div class="help-step" style="flex: 1; min-width: 200px; text-align: center;">
                <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=400&auto=format&fit=crop&q=80" alt="Ongoing Care" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; margin: 0 auto 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.15);">
                <h4 style="color: var(--primary-blue); margin-bottom: 10px; font-size: 1.2rem;"><?php echo Language::get('rare_step4_title', 'Ongoing Care'); ?></h4>
                <p style="color: var(--text-light-grey); font-size: 0.95rem;"><?php echo Language::get('rare_step4_desc', 'Continuous support and connection to resources and community'); ?></p>
            </div>

        </div>

        <div style="text-align: center; margin-top: 50px;">
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/contact" class="btn btn-primary" style="padding: 15px 40px; font-size: 1.1rem;"><?php echo Language::get('cta_learn_more', 'Learn More'); ?></a>
        </div>
    </div>
</section>

<style>
/* Topic navigation styles */
.topic-link {
    background: white;
}

.topic-link:hover,
.topic-link.active {
    background: var(--primary-blue);
    color: white !important;
    transform: translateX(5px);
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .container > div[style*="display: flex"] {
        flex-direction: column;
    }
    
    .topics-sidebar {
        position: relative !important;
        top: 0 !important;
        width: 100%;
    }
    
    .help-steps {
        flex-direction: column;
    }
    
    .arrow {
        transform: rotate(90deg);
        margin: 20px 0;
    }
}
</style>

<script>
// Simple topic switcher using vanilla JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const topicLinks = document.querySelectorAll('.topic-link');
    const topicDetails = document.querySelectorAll('.topic-detail');
    
    topicLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetTopic = this.getAttribute('data-topic');
            
            // Hide all topics
            topicDetails.forEach(detail => {
                detail.style.display = 'none';
            });
            
            // Show selected topic
            document.getElementById(targetTopic).style.display = 'block';
            
            // Update active link
            topicLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            // Smooth scroll to top of content
            document.querySelector('.topics-content').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        });
    });
});
</script>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layouts/main.php';
?>

