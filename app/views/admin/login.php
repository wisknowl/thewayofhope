<?php
$content = ob_start();
?>
<div style="max-width:420px; margin: 7vh auto;">
    <div class="card">
        <div class="card-header">
            <h2>Admin Login</h2>
            <p>Sign in to manage the website</p>
        </div>
        <div class="card-body">
            <?php if (!empty($error)): ?>
                <div style="color:#721c24;background:#f8d7da;border:1px solid #f5c6cb;padding:0.75rem 1rem;border-radius:8px;margin-bottom:1rem;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/login" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">
                <div class="form-group">
                    <label class="form-label" for="identifier">Username or Email</label>
                    <input id="identifier" name="identifier" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">Sign In</button>
            </form>
            <p style="margin-top:0.75rem; color:var(--text-light-grey); font-size:0.9rem;">Default: admin / admin123</p>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


