<?php
$content = ob_start();
?>
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
    <h3>Posts</h3>
    <a class="btn btn-primary" href="/admin/posts/create">New Post</a>
    </div>
<div class="card">
    <div class="card-body">
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align:left; border-bottom:1px solid var(--border-light);">
                    <th style="padding:0.5rem;">Title</th>
                    <th style="padding:0.5rem;">Category</th>
                    <th style="padding:0.5rem;">Status</th>
                    <th style="padding:0.5rem;">Published</th>
                    <th style="padding:0.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($posts)): foreach ($posts as $p): ?>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td style="padding:0.5rem; max-width:420px;">
                        <?php echo htmlspecialchars($p['title_en']); ?>
                    </td>
                    <td style="padding:0.5rem;">
                        <?php echo htmlspecialchars($p['category'] ?? ''); ?>
                    </td>
                    <td style="padding:0.5rem; text-transform:capitalize;">
                        <?php echo htmlspecialchars($p['status']); ?>
                    </td>
                    <td style="padding:0.5rem;">
                        <?php echo $p['published_at'] ? date('Y-m-d', strtotime($p['published_at'])) : '-'; ?>
                    </td>
                    <td style="padding:0.5rem;">
                        <a class="btn btn-outline" href="/admin/posts/edit/<?php echo $p['id']; ?>">Edit</a>
                        <a class="btn btn-outline" href="/admin/posts/delete/<?php echo $p['id']; ?>" onclick="return confirm('Delete this post?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5" style="padding:0.75rem; color:var(--text-light-grey);">No posts yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


