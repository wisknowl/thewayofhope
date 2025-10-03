<?php
$content = ob_start();
?>
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
    <h3>Admin Users</h3>
    <a class="btn btn-primary" href="/admin/users/create">New Admin User</a>
</div>
<div class="card">
    <div class="card-body">
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align:left; border-bottom:1px solid var(--border-light);">
                    <th style="padding:0.5rem;">Username</th>
                    <th style="padding:0.5rem;">Email</th>
                    <th style="padding:0.5rem;">Role</th>
                    <th style="padding:0.5rem;">Created</th>
                    <th style="padding:0.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): foreach ($users as $u): ?>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td style="padding:0.5rem;">
                        <?php echo htmlspecialchars($u['username']); ?>
                        <?php if ($u['id'] == ($_SESSION['admin_user_id'] ?? 0)): ?>
                            <span class="badge" style="margin-left:0.5rem;">You</span>
                        <?php endif; ?>
                    </td>
                    <td style="padding:0.5rem;"><?php echo htmlspecialchars($u['email']); ?></td>
                    <td style="padding:0.5rem; text-transform:capitalize;">
                        <span class="badge" style="background: <?php echo $u['role'] === 'admin' ? 'var(--primary-blue)' : 'var(--accent-yellow)'; ?>; color: <?php echo $u['role'] === 'admin' ? 'white' : 'var(--text-dark-grey)'; ?>;">
                            <?php echo $u['role']; ?>
                        </span>
                    </td>
                    <td style="padding:0.5rem;"><?php echo date('Y-m-d', strtotime($u['created_at'])); ?></td>
                    <td style="padding:0.5rem;">
                        <a class="btn btn-outline" href="/admin/users/edit/<?php echo $u['id']; ?>">Edit</a>
                        <?php if ($u['id'] != ($_SESSION['admin_user_id'] ?? 0)): ?>
                            <a class="btn btn-outline" href="/admin/users/delete/<?php echo $u['id']; ?>" onclick="return confirm('Delete this user?');">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5" style="padding:0.75rem; color:var(--text-light-grey);">No admin users yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>
