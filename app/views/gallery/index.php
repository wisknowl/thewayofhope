<?php
// Include the main layout
$content = ob_start();
?>

<!-- Gallery Hero Section -->
<section class="gallery-hero" style="height: 68vh; position: relative;">
    <?php include __DIR__ . '/../../components/header.php'; ?>
    <div class="hero-slideshow" style="background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1920&auto=format&fit=crop&q=80') center/cover no-repeat; backdrop-filter: blur(2px);">
        <div class="hero-content">
            <h1><?php echo $this->translate('nav_gallery', 'Gallery'); ?></h1>
            <p style="font-size: 1.25rem;">Explore our work through photos and videos showcasing our impact in the community.</p>
        </div>
    </div>
</section>

<!-- Gallery Filters -->
<section class="section" style="background: #f8f9fa; padding: 40px 0;">
    <div class="container">
        <div style="text-align: center;">
            <h3>Filter Gallery</h3>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1rem;">
                <a href="/gallery" class="btn btn-outline">All Media</a>
                <a href="/gallery?type=image" class="btn btn-outline">Photos</a>
                <a href="/gallery?type=video" class="btn btn-outline">Videos</a>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <a href="/gallery?category=<?php echo urlencode($category['category']); ?>" class="btn btn-outline">
                            <?php echo ucfirst($category['category']); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="section">
    <div class="container">
        <?php if (!empty($galleryItems)): ?>
            <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <?php foreach ($galleryItems as $item): ?>
                    <div class="gallery-item" style="position: relative; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-light); transition: var(--transition); cursor: pointer;">
                        <?php if ($item['file_type'] === 'image'): ?>
                            <img src="<?php echo $item['file_path']; ?>" alt="<?php echo $item['title']; ?>" style="width: 100%; height: 250px; object-fit: cover;">
                        <?php else: ?>
                            <div style="width: 100%; height: 250px; background: var(--primary-blue); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                                ▶️
                            </div>
                        <?php endif; ?>
                        
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 1rem;">
                            <h4 style="margin-bottom: 0.5rem;"><?php echo $item['title']; ?></h4>
                            <?php if ($item['description']): ?>
                                <p style="font-size: 0.875rem; margin: 0;"><?php echo substr($item['description'], 0, 100) . '...'; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Default gallery items if database is empty -->
            <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <div class="gallery-item" style="position: relative; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-light); transition: var(--transition); cursor: pointer;">
                    <div style="width: 100%; height: 250px; background: linear-gradient(135deg, var(--primary-blue), #2c5aa0); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                        📚
                    </div>
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 1rem;">
                        <h4 style="margin-bottom: 0.5rem;">Education Program</h4>
                        <p style="font-size: 0.875rem; margin: 0;">Students learning computer skills in our training center...</p>
                    </div>
                </div>
                
                <div class="gallery-item" style="position: relative; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-light); transition: var(--transition); cursor: pointer;">
                    <div style="width: 100%; height: 250px; background: linear-gradient(135deg, var(--accent-yellow), #e6b520); display: flex; align-items: center; justify-content: center; color: var(--text-dark-grey); font-size: 3rem;">
                        🏥
                    </div>
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 1rem;">
                        <h4 style="margin-bottom: 0.5rem;">Health Awareness Campaign</h4>
                        <p style="font-size: 0.875rem; margin: 0;">Community members receiving health screenings...</p>
                    </div>
                </div>
                
                <div class="gallery-item" style="position: relative; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-light); transition: var(--transition); cursor: pointer;">
                    <div style="width: 100%; height: 250px; background: linear-gradient(135deg, #28a745, #20c997); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                        🔧
                    </div>
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 1rem;">
                        <h4 style="margin-bottom: 0.5rem;">Vocational Training</h4>
                        <p style="font-size: 0.875rem; margin: 0;">Participants learning practical skills for employment...</p>
                    </div>
                </div>
                
                <div class="gallery-item" style="position: relative; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-light); transition: var(--transition); cursor: pointer;">
                    <div style="width: 100%; height: 250px; background: linear-gradient(135deg, #dc3545, #fd7e14); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                        👥
                    </div>
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 1rem;">
                        <h4 style="margin-bottom: 0.5rem;">Community Outreach</h4>
                        <p style="font-size: 0.875rem; margin: 0;">Volunteers engaging with community members...</p>
                    </div>
                </div>
                
                <div class="gallery-item" style="position: relative; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-light); transition: var(--transition); cursor: pointer;">
                    <div style="width: 100%; height: 250px; background: linear-gradient(135deg, #6f42c1, #e83e8c); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                        🎉
                    </div>
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 1rem;">
                        <h4 style="margin-bottom: 0.5rem;">Success Stories</h4>
                        <p style="font-size: 0.875rem; margin: 0;">Celebrating achievements and milestones...</p>
                    </div>
                </div>
                
                <div class="gallery-item" style="position: relative; border-radius: var(--border-radius); overflow: hidden; box-shadow: var(--shadow-light); transition: var(--transition); cursor: pointer;">
                    <div style="width: 100%; height: 250px; background: linear-gradient(135deg, #17a2b8, #6c757d); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                        ▶️
                    </div>
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; padding: 1rem;">
                        <h4 style="margin-bottom: 0.5rem;">Program Highlights</h4>
                        <p style="font-size: 0.875rem; margin: 0;">Video showcasing our impact in the community...</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Gallery Statistics -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="section-title">
            <h2>Our Impact in Numbers</h2>
            <p>Visual representation of our community impact</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-item">
                <h3>1,000+</h3>
                <p>Lives Impacted</p>
            </div>
            <div class="stat-item">
                <h3>50+</h3>
                <p>Events Organized</p>
            </div>
            <div class="stat-item">
                <h3>200+</h3>
                <p>Volunteers Trained</p>
            </div>
            <div class="stat-item">
                <h3>15+</h3>
                <p>Community Partners</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Share Your Story</h2>
            <p>Have photos or videos from our events? We'd love to see them!</p>
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="/contact" class="btn btn-primary" style="margin-right: 1rem;">Share Media</a>
            <a href="/get-involved" class="btn btn-outline">Get Involved</a>
        </div>
    </div>
</section>

<style>
.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-medium);
}

.gallery-grid {
    margin-bottom: 3rem;
}

@media (max-width: 768px) {
    .gallery-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>
