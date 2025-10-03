<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | The Way of Hope</title>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/css/style.css">
</head>
<body>
    <div style="text-align: center; padding: 100px 20px;">
        <h1 style="font-size: 4rem; color: var(--primary-blue); margin-bottom: 1rem;">404</h1>
        <h2 style="color: var(--text-dark-grey); margin-bottom: 1rem;">Page Not Found</h2>
        <p style="color: var(--text-light-grey); margin-bottom: 2rem;">The page you're looking for doesn't exist.</p>
        <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/" class="btn btn-primary">Go Home</a>
    </div>
</body>
</html>
