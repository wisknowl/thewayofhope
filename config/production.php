<?php
/**
 * Production Configuration for The Way of Hope
 * Use this for Hostinger deployment
 */

// Database configuration (update with your Hostinger database details)
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_hostinger_db_name');
define('DB_USER', 'your_hostinger_db_user');
define('DB_PASS', 'your_hostinger_db_password');
define('DB_CHARSET', 'utf8mb4');

// Site configuration
define('SITE_URL', 'https://yourdomain.com');
define('SITE_NAME', 'The Way of Hope');
define('SITE_SLOGAN_EN', 'Break down inequalities across all layers of society.');
define('SITE_SLOGAN_FR', 'Briser les inégalités entre toutes les couches de la société.');

// Security settings (CHANGE THESE IN PRODUCTION!)
define('ENCRYPTION_KEY', 'your-unique-encryption-key-here-change-this');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Payment gateway settings (update with your production credentials)
define('PAYPAL_CLIENT_ID', 'your-production-paypal-client-id');
define('PAYPAL_CLIENT_SECRET', 'your-production-paypal-secret');
define('PAYPAL_MODE', 'live'); // Use 'live' for production

// Email settings (update with your Hostinger email settings)
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_USER', 'your-email@yourdomain.com');
define('SMTP_PASS', 'your-email-password');
define('SMTP_PORT', 587);

// File upload settings
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx']);

// Language settings
define('DEFAULT_LANGUAGE', 'en');
define('SUPPORTED_LANGUAGES', ['en', 'fr', 'es']);

// Brand colors
define('PRIMARY_BLUE', '#1a4f8c');
define('ACCENT_YELLOW', '#f4c824');
define('BACKGROUND_WHITE', '#ffffff');
define('TEXT_DARK_GREY', '#333333');

// Production optimizations
define('ENABLE_CACHING', true);
define('ENABLE_COMPRESSION', true);
define('ENABLE_MINIFICATION', true);
