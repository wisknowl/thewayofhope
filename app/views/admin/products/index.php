<?php
$content = ob_start();
?>
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
    <h3>Products</h3>
    <a class="btn btn-primary" href="/admin/products/create">New Product</a>
</div>
<div class="card">
    <div class="card-body">
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align:left; border-bottom:1px solid var(--border-light);">
                    <th style="padding:0.5rem;">Name</th>
                    <th style="padding:0.5rem;">Price</th>
                    <th style="padding:0.5rem;">Stock</th>
                    <th style="padding:0.5rem;">Status</th>
                    <th style="padding:0.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): foreach ($products as $p): ?>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td style="padding:0.5rem; max-width:420px;">
                        <?php echo htmlspecialchars($p['name']); ?>
                    </td>
                    <td style="padding:0.5rem; font-weight:600; color:var(--primary-blue);">
                        <?php echo number_format($p['price']); ?> XAF
                    </td>
                    <td style="padding:0.5rem;">
                        <?php echo intval($p['stock_quantity']); ?>
                    </td>
                    <td style="padding:0.5rem;">
                        <?php echo $p['is_active'] ? 'Active' : 'Inactive'; ?>
                    </td>
                    <td style="padding:0.5rem;">
                        <a class="btn btn-outline" href="/admin/products/edit/<?php echo $p['id']; ?>">Edit</a>
                        <a class="btn btn-outline" href="/admin/products/delete/<?php echo $p['id']; ?>" onclick="return confirm('Delete this product?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5" style="padding:0.75rem; color:var(--text-light-grey);">No products yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


