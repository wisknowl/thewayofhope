<?php
$content = ob_start();
?>
<div class="grid grid-4">
    <div class="card"><div class="card-body"><h4>Total Donations</h4><p style="font-size:1.75rem;font-weight:700;color:var(--primary-blue);"><?php echo number_format($stats['donations']); ?> XAF</p></div></div>
    <div class="card"><div class="card-body"><h4>Volunteers</h4><p style="font-size:1.75rem;font-weight:700;color:var(--primary-blue);"><?php echo number_format($stats['volunteers']); ?></p></div></div>
    <div class="card"><div class="card-body"><h4>Posts</h4><p style="font-size:1.75rem;font-weight:700;color:var(--primary-blue);"><?php echo number_format($stats['posts']); ?></p></div></div>
    <div class="card"><div class="card-body"><h4>Orders</h4><p style="font-size:1.75rem;font-weight:700;color:var(--primary-blue);"><?php echo number_format($stats['orders']); ?></p></div></div>
</div>

<div class="grid grid-2" style="margin-top:2rem;">
    <div class="card"><div class="card-body">
        <h3>Quick Actions</h3>
        <div style="display:flex; gap:0.75rem; flex-wrap:wrap; margin-top:1rem;">
            <a class="btn btn-primary" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/content">Manage Content</a>
            <a class="btn btn-outline" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/volunteers">View Volunteers</a>
            <a class="btn btn-outline" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/donations">View Donations</a>
            <a class="btn btn-outline" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/admin/store">View Orders</a>
        </div>
    </div></div>
    <div class="card"><div class="card-body">
        <h3>Status</h3>
        <p>You're signed in as <strong><?php echo $_SESSION['admin_role'] ?? 'admin'; ?></strong>.</p>
        <p>Remember to change default credentials in production and enable HTTPS.</p>
    </div></div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


