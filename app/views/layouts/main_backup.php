<!DOCTYPE html>
<html lang="<?php echo Language::getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
    // SEO Meta Tags
    require_once __DIR__ . '/../../core/SEO.php';
    $seo = SEO::generateMetaTags(
        $pageTitle ?? 'The Way of Hope',
        $pageDescription ?? 'Breaking down inequalities across all layers of society',
        $pageKeywords ?? '',
        $pageImage ?? ''
    );
    ?>
    
    <title><?php echo htmlspecialchars($seo['title']); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($seo['description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($seo['keywords']); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo $seo['og:type']; ?>">
    <meta property="og:url" content="<?php echo $seo['og:url']; ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($seo['og:title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seo['og:description']); ?>">
    <meta property="og:image" content="<?php echo $seo['og:image']; ?>">
    <meta property="og:site_name" content="<?php echo $seo['og:site_name']; ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="<?php echo $seo['twitter:card']; ?>">
    <meta property="twitter:url" content="<?php echo $seo['og:url']; ?>">
    <meta property="twitter:title" content="<?php echo htmlspecialchars($seo['twitter:title']); ?>">
    <meta property="twitter:description" content="<?php echo htmlspecialchars($seo['twitter:description']); ?>">
    <meta property="twitter:image" content="<?php echo $seo['twitter:image']; ?>">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    <?php echo SEO::generateStructuredData(); ?>
    </script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/css/style.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/apple-touch-icon.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo $seo['og:url']; ?>">
</head>
<body>
    <!-- Header -->
    <header class="header transparent" id="header">
        <div class="nav-container">
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/" class="logo">
                <img src="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/logo.png" alt="The Way of Hope" onerror="this.style.display='none'">
                <!-- <span>The Way of Hope</span> -->
            </a>
            
            <nav class="nav-menu" id="navMenu">
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/"><?php echo Language::get('nav_home', 'Home'); ?></a>
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/about"><?php echo Language::get('nav_about', 'About Us'); ?></a>
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs"><?php echo Language::get('nav_programs', 'Programs'); ?></a>
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/get-involved"><?php echo Language::get('nav_get_involved', 'Get Involved'); ?></a>
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/contact"><?php echo Language::get('nav_contact', 'Contact'); ?></a>
                
                <!-- More Dropdown -->
                <div class="nav-dropdown">
                    <button class="nav-dropdown-toggle" id="navDropdownToggle">
                        More <span class="dropdown-arrow">▼</span>
                    </button>
                    <div class="nav-dropdown-menu" id="navDropdownMenu">
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate"><?php echo Language::get('nav_donate', 'Donate'); ?></a>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/news"><?php echo Language::get('nav_news', 'News'); ?></a>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/events"><?php echo Language::get('nav_events', 'Events'); ?></a>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/gallery"><?php echo Language::get('nav_gallery', 'Gallery'); ?></a>
                        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/store"><?php echo Language::get('nav_store', 'Store'); ?></a>
                    </div>
                </div>
            </nav>
            
            <div class="language-switcher">
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/api/language?lang=en" class="<?php echo Language::getCurrentLanguage() === 'en' ? 'active' : ''; ?>">EN</a>
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/api/language?lang=fr" class="<?php echo Language::getCurrentLanguage() === 'fr' ? 'active' : ''; ?>">FR</a>
                <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/api/language?lang=es" class="<?php echo Language::getCurrentLanguage() === 'es' ? 'active' : ''; ?>">ES</a>
            </div>
            
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                ☰
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <?php echo $content ?? ''; ?>
    </main>

    <!-- Floating Donate Button -->
    <div class="floating-donate-btn" id="floatingDonateBtn">
        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/donate" class="btn-donate-floating">
            <span class="donate-icon">💰</span>
            <span class="donate-text">Donate</span>
        </a>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4><?php echo Language::get('about_title', 'About The Way of Hope'); ?></h4>
                    <p><?php echo Language::get('hero_subtitle', 'A faith-inspired, socio-humanitarian organization...'); ?></p>
                </div>
                
                <div class="footer-section">
                    <h4><?php echo Language::get('nav_programs', 'Programs'); ?></h4>
                    <ul>
                        <li><a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/education"><?php echo Language::get('program_education', 'Education'); ?></a></li>
                        <li><a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/health"><?php echo Language::get('program_health', 'Health Awareness'); ?></a></li>
                        <li><a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/vocational"><?php echo Language::get('program_vocational', 'Vocational Training'); ?></a></li>
                        <li><a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/programs/rights"><?php echo Language::get('program_rights', 'Rights Defense'); ?></a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4><?php echo Language::get('nav_contact', 'Contact'); ?></h4>
                    <p>Email: info@thewayofhope.org</p>
                    <p>Phone: +237 6XX XXX XXX</p>
                    <p>Address: Bafang, Cameroon</p>
                </div>
                
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="https://facebook.com/thewayofhope" target="_blank" rel="noopener noreferrer" aria-label="Facebook">Facebook</a>
                        <a href="https://instagram.com/thewayofhope" target="_blank" rel="noopener noreferrer" aria-label="Instagram">Instagram</a>
                        <a href="https://tiktok.com/@thewayofhope" target="_blank" rel="noopener noreferrer" aria-label="TikTok">TikTok</a>
                        <a href="https://wa.me/237XXXXXXXXX" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">WhatsApp</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> The Way of Hope. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/js/main.js"></script>
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/js/performance.js"></script>
</body>
</html>
