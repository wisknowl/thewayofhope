<?php
/**
 * Configuration file for The Way of Hope website
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'wayofhope_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Site configuration
define('SITE_URL', 'https://thewayofhope.org');
define('SITE_NAME', 'The Way of Hope');
define('SITE_SLOGAN_EN', 'Break down inequalities across all layers of society.');
define('SITE_SLOGAN_FR', 'Briser les inégalités entre toutes les couches de la société.');

// Security settings
define('ENCRYPTION_KEY', 'your-secure-encryption-key-here');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Payment gateway settings
define('PAYPAL_CLIENT_ID', 'your-paypal-client-id');
define('PAYPAL_CLIENT_SECRET', 'your-paypal-secret');
define('PAYPAL_MODE', 'sandbox'); // or 'live'

// Email settings
define('SMTP_HOST', 'your-smtp-host');
define('SMTP_USER', 'your-email@domain.com');
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
