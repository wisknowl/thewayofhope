<?php
// Include the main layout
$content = ob_start();
?>

<!-- Events Hero Section -->
<section class="events-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('nav_events', 'Events'); ?></h1>
            <p style="font-size: 1.25rem;">Join us for community events, training sessions, and special programs throughout the year.</p>
        </div>
    </div>
</section>

<!-- Event Filters -->
<section class="section" style="background: #f8f9fa; padding: 40px 0;">
    <div class="container">
        <div style="text-align: center;">
            <h3>Filter Events</h3>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1rem;">
                <a href="/events" class="btn btn-outline">All Events</a>
                <?php if (!empty($eventTypes)): ?>
                    <?php foreach ($eventTypes as $eventType): ?>
                        <a href="/events?type=<?php echo $eventType['event_type']; ?>" class="btn btn-outline">
                            <?php echo ucfirst(str_replace('_', ' ', $eventType['event_type'])); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Events List -->
<section class="section">
    <div class="container">
        <?php if (!empty($events)): ?>
            <div class="grid grid-2">
                <?php foreach ($events as $event): ?>
                    <div class="card">
                        <div class="card-body">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                                <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                    <?php echo ucfirst(str_replace('_', ' ', $event['event_type'])); ?>
                                </span>
                                <span style="color: var(--text-light-grey); font-size: 0.875rem;">
                                    <?php echo date('M j, Y', strtotime($event['event_date'])); ?>
                                </span>
                            </div>
                            
                            <h3 style="margin-bottom: 1rem;">
                                <?php echo $event['title_' . $this->getLanguage()] ?? $event['title_en']; ?>
                            </h3>
                            
                            <p style="margin-bottom: 1.5rem;">
                                <?php echo $event['description_' . $this->getLanguage()] ?? $event['description_en']; ?>
                            </p>
                            
                            <div style="margin-bottom: 1.5rem;">
                                <p><strong>📅 Date:</strong> <?php echo date('F j, Y', strtotime($event['event_date'])); ?></p>
                                <?php if ($event['location']): ?>
                                    <p><strong>📍 Location:</strong> <?php echo $event['location']; ?></p>
                                <?php endif; ?>
                                <?php if ($event['max_participants']): ?>
                                    <p><strong>👥 Max Participants:</strong> <?php echo $event['max_participants']; ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ($event['registration_required']): ?>
                                <button class="btn btn-primary">Register Now</button>
                            <?php else: ?>
                                <span style="color: var(--text-light-grey); font-style: italic;">No registration required</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Default events if database is empty -->
            <div class="grid grid-2">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                Training
                            </span>
                            <span style="color: var(--text-light-grey); font-size: 0.875rem;">
                                Jan 15, 2025
                            </span>
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">
                            Computer Skills Training Workshop
                        </h3>
                        
                        <p style="margin-bottom: 1.5rem;">
                            Join us for a comprehensive computer skills training workshop designed to enhance digital literacy in our community. Learn basic computer operations, internet usage, and essential software applications.
                        </p>
                        
                        <div style="margin-bottom: 1.5rem;">
                            <p><strong>📅 Date:</strong> January 15, 2025</p>
                            <p><strong>📍 Location:</strong> The Way of Hope Community Center</p>
                            <p><strong>👥 Max Participants:</strong> 25</p>
                        </div>
                        
                        <button class="btn btn-primary">Register Now</button>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                Outreach
                            </span>
                            <span style="color: var(--text-light-grey); font-size: 0.875rem;">
                                Jan 20, 2025
                            </span>
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">
                            Health Awareness Community Outreach
                        </h3>
                        
                        <p style="margin-bottom: 1.5rem;">
                            Community health awareness campaign focusing on HIV/AIDS prevention, malaria awareness, and general health practices. Free health screenings and educational materials will be provided.
                        </p>
                        
                        <div style="margin-bottom: 1.5rem;">
                            <p><strong>📅 Date:</strong> January 20, 2025</p>
                            <p><strong>📍 Location:</strong> Bafang Market Square</p>
                            <p><strong>👥 Max Participants:</strong> 100</p>
                        </div>
                        
                        <span style="color: var(--text-light-grey); font-style: italic;">No registration required</span>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                Fundraiser
                            </span>
                            <span style="color: var(--text-light-grey); font-size: 0.875rem;">
                                Feb 10, 2025
                            </span>
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">
                            Annual Fundraising Gala
                        </h3>
                        
                        <p style="margin-bottom: 1.5rem;">
                            Join us for our annual fundraising gala featuring dinner, entertainment, and presentations about our impact in the community. All proceeds support our programs and initiatives.
                        </p>
                        
                        <div style="margin-bottom: 1.5rem;">
                            <p><strong>📅 Date:</strong> February 10, 2025</p>
                            <p><strong>📍 Location:</strong> Bafang Community Hall</p>
                            <p><strong>👥 Max Participants:</strong> 150</p>
                        </div>
                        
                        <button class="btn btn-primary">Register Now</button>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                Meeting
                            </span>
                            <span style="color: var(--text-light-grey); font-size: 0.875rem;">
                                Feb 15, 2025
                            </span>
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">
                            Monthly Volunteer Meeting
                        </h3>
                        
                        <p style="margin-bottom: 1.5rem;">
                            Monthly meeting for all volunteers to discuss upcoming activities, share experiences, and plan future initiatives. New volunteers are welcome to attend.
                        </p>
                        
                        <div style="margin-bottom: 1.5rem;">
                            <p><strong>📅 Date:</strong> February 15, 2025</p>
                            <p><strong>📍 Location:</strong> The Way of Hope Office</p>
                            <p><strong>👥 Max Participants:</strong> 50</p>
                        </div>
                        
                        <span style="color: var(--text-light-grey); font-style: italic;">No registration required</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Event Calendar -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Event Calendar</h2>
            <p>View all upcoming events in calendar format</p>
        </div>
        
        <div style="background: white; border-radius: var(--border-radius); padding: 2rem; box-shadow: var(--shadow-light);">
            <div style="text-align: center; color: var(--text-light-grey);">
                <div style="font-size: 3rem; margin-bottom: 1rem;">📅</div>
                <h3>Interactive Calendar</h3>
                <p>Full calendar integration would be embedded here</p>
                <p>Features would include:</p>
                <ul style="text-align: left; max-width: 400px; margin: 0 auto;">
                    <li>Monthly and weekly views</li>
                    <li>Event filtering by type</li>
                    <li>Registration integration</li>
                    <li>Mobile-responsive design</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Want to Organize an Event?</h2>
            <p>Have an idea for a community event? We'd love to hear from you!</p>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="/contact" class="btn btn-primary" style="margin-right: 1rem;">Contact Us</a>
            <a href="/volunteer" class="btn btn-outline">Become a Volunteer</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
