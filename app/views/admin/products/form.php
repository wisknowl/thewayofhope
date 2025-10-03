<?php
$content = ob_start();
$isEdit = ($mode ?? 'create') === 'edit';
?>
<div class="card">
    <div class="card-body">
        <h3><?php echo $isEdit ? 'Edit Product' : 'Create Product'; ?></h3>
        <?php if (!empty($error)): ?>
            <div style="color:#721c24;background:#f8d7da;border:1px solid #f5c6cb;padding:0.75rem 1rem;border-radius:8px;margin:1rem 0;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo $isEdit ? '/admin/products/update/' . $product['id'] : '/admin/products/store'; ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">

            <div class="grid grid-2">
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input name="name" class="form-control" value="<?php echo htmlspecialchars($product['name'] ?? ''); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <input name="category" class="form-control" value="<?php echo htmlspecialchars($product['category'] ?? ''); ?>">
                </div>
            </div>

            <div class="grid grid-3">
                <div class="form-group">
                    <label class="form-label">Price (XAF)</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price'] ?? '0'); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" name="stock_quantity" class="form-control" value="<?php echo htmlspecialchars($product['stock_quantity'] ?? '0'); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Active</label>
                    <label style="display:flex; align-items:center; gap:0.5rem;">
                        <input type="checkbox" name="is_active" value="1" <?php echo !empty($product['is_active']) ? 'checked' : ''; ?>>
                        <span>Product is active</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Size Options (JSON)</label>
                <input name="size_options" class="form-control" placeholder='e.g. {"sizes":["S","M","L"],"colors":["Blue","White"]}' value="<?php echo htmlspecialchars($product['size_options'] ?? ''); ?>">
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="6"><?php echo htmlspecialchars($product['description'] ?? ''); ?></textarea>
            </div>

            <div style="display:flex; gap:0.75rem;">
                <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Update' : 'Create'; ?> Product</button>
                <a href="/admin/products" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


