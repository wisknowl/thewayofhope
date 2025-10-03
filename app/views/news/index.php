<?php
// Include the main layout
$content = ob_start();
?>

<!-- News Hero Section -->
<section class="news-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('nav_news', 'News & Updates'); ?></h1>
            <p style="font-size: 1.25rem;">Stay informed about our latest activities, achievements, and community impact stories.</p>
        </div>
    </div>
</section>

<!-- News Filter -->
<section class="section" style="background: #f8f9fa; padding: 40px 0;">
    <div class="container">
        <div style="text-align: center;">
            <h3>Filter by Category</h3>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1rem;">
                <a href="/news" class="btn btn-outline">All News</a>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <a href="/news?category=<?php echo urlencode($category['category']); ?>" class="btn btn-outline">
                            <?php echo ucfirst($category['category']); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="section">
    <div class="container">
        <?php if (!empty($posts)): ?>
            <div class="grid grid-3">
                <?php foreach ($posts as $post): ?>
                    <article class="card">
                        <div class="card-body">
                            <div style="margin-bottom: 1rem;">
                                <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                    <?php echo ucfirst($post['category'] ?? 'General'); ?>
                                </span>
                                <span style="color: var(--text-light-grey); margin-left: 1rem; font-size: 0.875rem;">
                                    <?php echo date('M j, Y', strtotime($post['published_at'])); ?>
                                </span>
                            </div>
                            
                            <h3 style="margin-bottom: 1rem;">
                                <a href="/news/<?php echo $post['id']; ?>" style="color: var(--text-dark-grey); text-decoration: none;">
                                    <?php echo $post['title_' . $this->getLanguage()] ?? $post['title_en']; ?>
                                </a>
                            </h3>
                            
                            <p style="margin-bottom: 1.5rem;">
                                <?php echo $post['excerpt_' . $this->getLanguage()] ?? $post['excerpt_en'] ?? substr(strip_tags($post['content_' . $this->getLanguage()] ?? $post['content_en']), 0, 150) . '...'; ?>
                            </p>
                            
                            <a href="/news/<?php echo $post['id']; ?>" class="btn btn-outline">
                                <?php echo $this->translate('read_more', 'Read More'); ?>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Default news if database is empty -->
            <div class="grid grid-3">
                <article class="card">
                    <div class="card-body">
                        <div style="margin-bottom: 1rem;">
                            <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                Health Campaign
                            </span>
                            <span style="color: var(--text-light-grey); margin-left: 1rem; font-size: 0.875rem;">
                                Dec 15, 2024
                            </span>
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">
                            <a href="#" style="color: var(--text-dark-grey); text-decoration: none;">
                                Successful Health Awareness Campaign Reaches 500+ Community Members
                            </a>
                        </h3>
                        
                        <p style="margin-bottom: 1.5rem;">
                            Our recent health awareness campaign in Bafang was a tremendous success, reaching over 500 community members with vital information about HIV/AIDS prevention, malaria awareness, and general health practices...
                        </p>
                        
                        <a href="#" class="btn btn-outline">Read More</a>
                    </div>
                </article>
                
                <article class="card">
                    <div class="card-body">
                        <div style="margin-bottom: 1rem;">
                            <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                Education
                            </span>
                            <span style="color: var(--text-light-grey); margin-left: 1rem; font-size: 0.875rem;">
                                Dec 10, 2024
                            </span>
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">
                            <a href="#" style="color: var(--text-dark-grey); text-decoration: none;">
                                New Computer Skills Training Program Launched
                            </a>
                        </h3>
                        
                        <p style="margin-bottom: 1.5rem;">
                            We're excited to announce the launch of our new computer skills training program, designed to equip community members with essential digital literacy skills for the modern workplace...
                        </p>
                        
                        <a href="#" class="btn btn-outline">Read More</a>
                    </div>
                </article>
                
                <article class="card">
                    <div class="card-body">
                        <div style="margin-bottom: 1rem;">
                            <span style="background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.25rem 0.75rem; border-radius: var(--border-radius); font-size: 0.875rem; font-weight: 600;">
                                Success Story
                            </span>
                            <span style="color: var(--text-light-grey); margin-left: 1rem; font-size: 0.875rem;">
                                Dec 5, 2024
                            </span>
                        </div>
                        
                        <h3 style="margin-bottom: 1rem;">
                            <a href="#" style="color: var(--text-dark-grey); text-decoration: none;">
                                Vocational Training Graduate Starts Successful Business
                            </a>
                        </h3>
                        
                        <p style="margin-bottom: 1.5rem;">
                            Marie, a graduate of our vocational training program, has successfully started her own tailoring business and now employs three other community members...
                        </p>
                        
                        <a href="#" class="btn btn-outline">Read More</a>
                    </div>
                </article>
            </div>
        <?php endif; ?>
        
        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <div style="text-align: center; margin-top: 3rem;">
                <div style="display: flex; justify-content: center; gap: 0.5rem; align-items: center;">
                    <?php if ($currentPage > 1): ?>
                        <a href="/news?page=<?php echo $currentPage - 1; ?>" class="btn btn-outline">Previous</a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="/news?page=<?php echo $i; ?>" class="btn <?php echo $i == $currentPage ? 'btn-primary' : 'btn-outline'; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="/news?page=<?php echo $currentPage + 1; ?>" class="btn btn-outline">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Newsletter Signup -->
<section class="section" style="background: var(--primary-blue); color: white;">
    <div class="container">
        <div class="section-title">
            <h2 style="color: white;">Stay Updated</h2>
            <p style="color: rgba(255,255,255,0.9);">Subscribe to our newsletter for the latest news and updates</p>
        </div>
        
        <div style="max-width: 500px; margin: 0 auto; text-align: center;">
            <form style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center;">
                <input type="email" placeholder="Enter your email address" style="flex: 1; min-width: 250px; padding: 0.75rem; border: none; border-radius: var(--border-radius);">
                <button type="submit" class="btn btn-primary" style="background: var(--accent-yellow); color: var(--text-dark-grey);">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
