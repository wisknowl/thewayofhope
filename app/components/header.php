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