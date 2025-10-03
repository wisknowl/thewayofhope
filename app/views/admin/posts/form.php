<?php
$content = ob_start();
$isEdit = ($mode ?? 'create') === 'edit';
?>
<div class="card">
    <div class="card-body">
        <h3><?php echo $isEdit ? 'Edit Post' : 'Create Post'; ?></h3>
        <?php if (!empty($error)): ?>
            <div style="color:#721c24;background:#f8d7da;border:1px solid #f5c6cb;padding:0.75rem 1rem;border-radius:8px;margin:1rem 0;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo $isEdit ? '/admin/posts/update/' . $post['id'] : '/admin/posts/store'; ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">

            <div class="grid grid-3">
                <div class="form-group">
                    <label class="form-label">Title (EN)</label>
                    <input name="title_en" class="form-control" value="<?php echo htmlspecialchars($post['title_en'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Title (FR)</label>
                    <input name="title_fr" class="form-control" value="<?php echo htmlspecialchars($post['title_fr'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Title (ES)</label>
                    <input name="title_es" class="form-control" value="<?php echo htmlspecialchars($post['title_es'] ?? ''); ?>">
                </div>
            </div>

            <div class="grid grid-3">
                <div class="form-group">
                    <label class="form-label">Excerpt (EN)</label>
                    <input name="excerpt_en" class="form-control" value="<?php echo htmlspecialchars($post['excerpt_en'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Excerpt (FR)</label>
                    <input name="excerpt_fr" class="form-control" value="<?php echo htmlspecialchars($post['excerpt_fr'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label class="form-label">Excerpt (ES)</label>
                    <input name="excerpt_es" class="form-control" value="<?php echo htmlspecialchars($post['excerpt_es'] ?? ''); ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Category</label>
                <input name="category" class="form-control" value="<?php echo htmlspecialchars($post['category'] ?? ''); ?>">
            </div>

            <div class="grid grid-3">
                <div class="form-group">
                    <label class="form-label">Content (EN)</label>
                    <textarea name="content_en" class="form-control wysiwyg" rows="8"><?php echo htmlspecialchars($post['content_en'] ?? ''); ?></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Content (FR)</label>
                    <textarea name="content_fr" class="form-control wysiwyg" rows="8"><?php echo htmlspecialchars($post['content_fr'] ?? ''); ?></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Content (ES)</label>
                    <textarea name="content_es" class="form-control wysiwyg" rows="8"><?php echo htmlspecialchars($post['content_es'] ?? ''); ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="draft" <?php echo (($post['status'] ?? '') === 'draft') ? 'selected' : ''; ?>>Draft</option>
                    <option value="published" <?php echo (($post['status'] ?? '') === 'published') ? 'selected' : ''; ?>>Published</option>
                </select>
            </div>

            <div style="display:flex; gap:0.75rem;">
                <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Update' : 'Create'; ?> Post</button>
                <a href="/admin/posts" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea.wysiwyg',
    menubar: false,
    plugins: 'link lists code table',
    toolbar: 'undo redo | bold italic underline | bullist numlist | link | code | table',
    height: 260
});
</script>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


