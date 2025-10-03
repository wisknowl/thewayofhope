<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Admin'; ?> | The Way of Hope</title>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/css/style.css">
    <style>
        .admin-wrapper { display: grid; grid-template-columns: 260px 1fr; min-height: 100vh; }
        .admin-sidebar { background: #0f2f57; color: #fff; padding: 1.5rem 1rem; }
        .admin-sidebar a { color: #fff; text-decoration: none; display: block; padding: 0.5rem 0.75rem; border-radius: 6px; }
        .admin-sidebar a:hover { background: rgba(255,255,255,0.1); }
        .admin-topbar { background: #ffffff; padding: 1rem 1.5rem; box-shadow: 0 2px 10px rgba(0,0,0,0.06); display: flex; justify-content: space-between; align-items: center; }
        .admin-content { padding: 1.5rem; }
        .badge { background: var(--accent-yellow); color: var(--text-dark-grey); padding: 0.15rem 0.5rem; border-radius: 4px; font-size: 0.75rem; }
    </style>
    <link rel="icon" type="image/x-icon" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/assets/js/main.js" defer></script>
    </head>
<body>
<div class="admin-wrapper">
    <aside class="admin-sidebar">
        <div style="font-weight:700; font-size:1.25rem; margin-bottom:1rem;">The Way of Hope</div>
        <nav>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin">Dashboard</a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/content">Content</a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/volunteers">Volunteers</a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/donations">Donations</a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/store">Store</a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/products">Products</a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/users">Users</a>
            <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/logout" style="margin-top:1rem; color:#ffdddd;">Logout</a>
        </nav>
    </aside>
    <div>
        <div class="admin-topbar">
            <div style="font-weight:600; color: var(--primary-blue);"><?php echo $pageTitle ?? 'Admin'; ?></div>
            <div>
                <span class="badge">Role: <?php echo $_SESSION['admin_role'] ?? 'guest'; ?></span>
            </div>
        </div>
        <main class="admin-content">
            <?php echo $content ?? ''; ?>
        </main>
    </div>
</div>
</body>
</html>


