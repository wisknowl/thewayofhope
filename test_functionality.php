<?php
/**
 * Comprehensive Functionality Test for The Way of Hope
 * Run this to test all features before deployment
 */

echo "<h1>The Way of Hope - Functionality Test</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .test-section { margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 5px; }
    .pass { color: green; font-weight: bold; }
    .fail { color: red; font-weight: bold; }
    .warning { color: orange; font-weight: bold; }
    .info { color: blue; }
</style>";

// Test 1: Database Connection
echo "<div class='test-section'>";
echo "<h2>1. Database Connection Test</h2>";
try {
    require_once 'config/config.php';
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "<span class='pass'>✅ Database connection successful</span><br>";
    
    // Test if tables exist
    $tables = ['users', 'volunteers', 'donations', 'programs', 'posts', 'events', 'gallery', 'products', 'orders'];
    $missing_tables = [];
    foreach ($tables as $table) {
        $result = $pdo->query("SHOW TABLES LIKE '$table'");
        if ($result->rowCount() == 0) {
            $missing_tables[] = $table;
        }
    }
    
    if (empty($missing_tables)) {
        echo "<span class='pass'>✅ All required tables exist</span><br>";
    } else {
        echo "<span class='fail'>❌ Missing tables: " . implode(', ', $missing_tables) . "</span><br>";
    }
    
} catch (PDOException $e) {
    echo "<span class='fail'>❌ Database connection failed: " . $e->getMessage() . "</span><br>";
}
echo "</div>";

// Test 2: Core Classes
echo "<div class='test-section'>";
echo "<h2>2. Core Classes Test</h2>";
$core_classes = [
    'Router' => 'app/core/Router.php',
    'Database' => 'app/core/Database.php',
    'Security' => 'app/core/Security.php',
    'Language' => 'app/core/Language.php',
    'SEO' => 'app/core/SEO.php'
];

foreach ($core_classes as $class => $file) {
    if (file_exists($file)) {
        require_once $file;
        if (class_exists($class)) {
            echo "<span class='pass'>✅ $class class loaded successfully</span><br>";
        } else {
            echo "<span class='fail'>❌ $class class not found</span><br>";
        }
    } else {
        echo "<span class='fail'>❌ $class file not found: $file</span><br>";
    }
}
echo "</div>";

// Test 3: Controllers
echo "<div class='test-section'>";
echo "<h2>3. Controllers Test</h2>";
$controllers = [
    'HomeController',
    'AboutController', 
    'ProgramsController',
    'ContactController',
    'InvolvementController',
    'DonationController',
    'NewsController',
    'EventsController',
    'GalleryController',
    'StoreController',
    'AdminController',
    'AdminPostsController',
    'AdminProductsController',
    'AdminUsersController'
];

foreach ($controllers as $controller) {
    $file = "app/controllers/$controller.php";
    if (file_exists($file)) {
        echo "<span class='pass'>✅ $controller exists</span><br>";
    } else {
        echo "<span class='fail'>❌ $controller missing</span><br>";
    }
}
echo "</div>";

// Test 4: Views
echo "<div class='test-section'>";
echo "<h2>4. Views Test</h2>";
$views = [
    'layouts/main.php',
    'home/index.php',
    'about/index.php',
    'programs/index.php',
    'contact/index.php',
    'involvement/index.php',
    'donation/index.php',
    'news/index.php',
    'events/index.php',
    'gallery/index.php',
    'store/index.php',
    'admin/layout.php',
    'admin/dashboard.php'
];

foreach ($views as $view) {
    $file = "app/views/$view";
    if (file_exists($file)) {
        echo "<span class='pass'>✅ $view exists</span><br>";
    } else {
        echo "<span class='fail'>❌ $view missing</span><br>";
    }
}
echo "</div>";

// Test 5: Assets
echo "<div class='test-section'>";
echo "<h2>5. Assets Test</h2>";
$assets = [
    'public/assets/css/style.css',
    'public/assets/js/main.js',
    'public/assets/js/performance.js',
    'public/sitemap.xml',
    'public/robots.txt',
    'public/sw.js'
];

foreach ($assets as $asset) {
    if (file_exists($asset)) {
        echo "<span class='pass'>✅ $asset exists</span><br>";
    } else {
        echo "<span class='warning'>⚠️ $asset missing</span><br>";
    }
}
echo "</div>";

// Test 6: Language Files
echo "<div class='test-section'>";
echo "<h2>6. Language Files Test</h2>";
$languages = ['en', 'fr', 'es'];
foreach ($languages as $lang) {
    $file = "languages/$lang.php";
    if (file_exists($file)) {
        echo "<span class='pass'>✅ $lang language file exists</span><br>";
    } else {
        echo "<span class='fail'>❌ $lang language file missing</span><br>";
    }
}
echo "</div>";

// Test 7: Security Features
echo "<div class='test-section'>";
echo "<h2>7. Security Features Test</h2>";
if (class_exists('Security')) {
    // Test CSRF token generation
    $token = Security::generateCSRFToken();
    if (!empty($token)) {
        echo "<span class='pass'>✅ CSRF token generation works</span><br>";
    } else {
        echo "<span class='fail'>❌ CSRF token generation failed</span><br>";
    }
    
    // Test password hashing
    $password = 'test123';
    $hash = Security::hashPassword($password);
    if (Security::verifyPassword($password, $hash)) {
        echo "<span class='pass'>✅ Password hashing works</span><br>";
    } else {
        echo "<span class='fail'>❌ Password hashing failed</span><br>";
    }
    
    // Test input sanitization
    $dirty = '<script>alert("xss")</script>';
    $clean = Security::sanitizeInput($dirty);
    if ($clean !== $dirty) {
        echo "<span class='pass'>✅ Input sanitization works</span><br>";
    } else {
        echo "<span class='fail'>❌ Input sanitization failed</span><br>";
    }
}
echo "</div>";

// Test 8: URL Rewriting
echo "<div class='test-section'>";
echo "<h2>8. URL Rewriting Test</h2>";
if (file_exists('.htaccess')) {
    echo "<span class='pass'>✅ .htaccess file exists</span><br>";
} else {
    echo "<span class='fail'>❌ .htaccess file missing</span><br>";
}

if (file_exists('public/.htaccess')) {
    echo "<span class='pass'>✅ public/.htaccess file exists</span><br>";
} else {
    echo "<span class='warning'>⚠️ public/.htaccess file missing</span><br>";
}
echo "</div>";

// Test 9: Admin User
echo "<div class='test-section'>";
echo "<h2>9. Admin User Test</h2>";
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE role = 'admin' LIMIT 1");
    $stmt->execute();
    $admin = $stmt->fetch();
    
    if ($admin) {
        echo "<span class='pass'>✅ Admin user exists</span><br>";
        echo "<span class='info'>ℹ️ Username: " . htmlspecialchars($admin['username']) . "</span><br>";
    } else {
        echo "<span class='warning'>⚠️ No admin user found</span><br>";
    }
} catch (PDOException $e) {
    echo "<span class='fail'>❌ Could not check admin user: " . $e->getMessage() . "</span><br>";
}
echo "</div>";

// Test 10: File Permissions
echo "<div class='test-section'>";
echo "<h2>10. File Permissions Test</h2>";
$directories = ['public/uploads', 'app/views', 'languages'];
foreach ($directories as $dir) {
    if (is_dir($dir)) {
        if (is_writable($dir)) {
            echo "<span class='pass'>✅ $dir is writable</span><br>";
        } else {
            echo "<span class='warning'>⚠️ $dir is not writable</span><br>";
        }
    } else {
        echo "<span class='warning'>⚠️ $dir does not exist</span><br>";
    }
}
echo "</div>";

echo "<div class='test-section'>";
echo "<h2>Test Complete!</h2>";
echo "<p>If all tests passed, your website is ready for deployment.</p>";
echo "<p><strong>Next Steps:</strong></p>";
echo "<ul>";
echo "<li>Test the website in a browser</li>";
echo "<li>Test admin panel functionality</li>";
echo "<li>Add real content and images</li>";
echo "<li>Deploy to Hostinger</li>";
echo "</ul>";
echo "</div>";
?>
