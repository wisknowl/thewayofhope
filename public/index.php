<?php
/**
 * The Way of Hope - Main Entry Point
 * Secure, multi-language NGO website
 */

// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Start session with secure settings
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_only_cookies', 1);
session_start();

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include core files
require_once '../config/config.php';
require_once '../app/core/Router.php';
require_once '../app/core/Database.php';
require_once '../app/core/Security.php';
require_once '../app/core/Language.php';

// Initialize application
$router = new Router();
$router->handleRequest();
