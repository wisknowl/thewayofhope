<?php
/**
 * Local Development Setup Script
 * Run this once to set up the local environment
 */

echo "<h1>The Way of Hope - Local Setup</h1>";

// Check PHP version
if (version_compare(PHP_VERSION, '7.4.0', '<')) {
    die("❌ PHP 7.4 or higher is required. Current version: " . PHP_VERSION);
}
echo "✅ PHP Version: " . PHP_VERSION . "<br>";

// Check required extensions
$required_extensions = ['pdo', 'pdo_mysql', 'json', 'session', 'mbstring'];
$missing_extensions = [];

foreach ($required_extensions as $ext) {
    if (!extension_loaded($ext)) {
        $missing_extensions[] = $ext;
    }
}

if (!empty($missing_extensions)) {
    die("❌ Missing required PHP extensions: " . implode(', ', $missing_extensions));
}
echo "✅ All required PHP extensions are loaded<br>";

// Check if config file exists
if (!file_exists('config/config.php')) {
    die("❌ Configuration file not found. Please create config/config.php");
}
echo "✅ Configuration file found<br>";

// Test database connection
try {
    require_once 'config/config.php';
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "✅ Database connection successful<br>";
} catch (PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "<br>";
    echo "Please check your database credentials in config/config.php<br>";
}

// Check directory permissions
$directories = ['public/uploads', 'app/views', 'languages'];
foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
        echo "✅ Created directory: $dir<br>";
    } else {
        echo "✅ Directory exists: $dir<br>";
    }
}

// Check if database schema exists
try {
    $result = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($result->rowCount() > 0) {
        echo "✅ Database schema appears to be set up<br>";
    } else {
        echo "⚠️ Database schema not found. Please run database/schema.sql<br>";
    }
} catch (PDOException $e) {
    echo "❌ Could not check database schema: " . $e->getMessage() . "<br>";
}

echo "<br><h2>Setup Complete!</h2>";
echo "<p>If all checks passed, you can now access your website at:</p>";
echo "<ul>";
echo "<li><a href='public/'>Frontend Website</a></li>";
echo "<li><a href='public/admin/'>Admin Panel</a> (admin / admin123)</li>";
echo "</ul>";

echo "<h3>Next Steps:</h3>";
echo "<ol>";
echo "<li>Import database/schema.sql into your MySQL database</li>";
echo "<li>Update config/config.php with your database credentials</li>";
echo "<li>Test all functionality</li>";
echo "<li>Add your content and images</li>";
echo "</ol>";
?>
