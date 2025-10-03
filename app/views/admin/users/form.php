<?php
$content = ob_start();
$isEdit = ($mode ?? 'create') === 'edit';
?>
<div class="card">
    <div class="card-body">
        <h3><?php echo $isEdit ? 'Edit Admin User' : 'Create Admin User'; ?></h3>
        <?php if (!empty($error)): ?>
            <div style="color:#721c24;background:#f8d7da;border:1px solid #f5c6cb;padding:0.75rem 1rem;border-radius:8px;margin:1rem 0;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo $isEdit ? '/admin/users/update/' . $user['id'] : '/admin/users/store'; ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">

            <div class="grid grid-2">
                <div class="form-group">
                    <label class="form-label">Username *</label>
                    <input name="username" class="form-control" value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
                </div>
            </div>

            <div class="grid grid-2">
                <div class="form-group">
                    <label class="form-label">Password <?php echo $isEdit ? '(leave blank to keep current)' : '*'; ?></label>
                    <input type="password" name="password" class="form-control" <?php echo $isEdit ? '' : 'required'; ?>>
                </div>
                <div class="form-group">
                    <label class="form-label">Role *</label>
                    <select name="role" class="form-control" required>
                        <option value="editor" <?php echo (($user['role'] ?? '') === 'editor') ? 'selected' : ''; ?>>Editor</option>
                        <option value="admin" <?php echo (($user['role'] ?? '') === 'admin') ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
            </div>

            <div style="background: #e7f3ff; padding: 1rem; border-radius: var(--border-radius); margin: 1rem 0;">
                <h4>Role Permissions</h4>
                <ul style="margin: 0.5rem 0;">
                    <li><strong>Editor:</strong> Can manage content, volunteers, donations, and products</li>
                    <li><strong>Admin:</strong> Full access including user management and system settings</li>
                </ul>
            </div>

            <div style="display:flex; gap:0.75rem;">
                <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Update' : 'Create'; ?> User</button>
                <a href="/admin/users" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>
