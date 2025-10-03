<?php
$content = ob_start();
?>
<div class="card">
    <div class="card-body">
        <h3>Orders</h3>
        <table style="width:100%; border-collapse: collapse; margin-top:1rem;">
            <thead>
                <tr style="text-align:left; border-bottom:1px solid var(--border-light);">
                    <th style="padding:0.5rem;">Customer</th>
                    <th style="padding:0.5rem;">Email</th>
                    <th style="padding:0.5rem;">Amount</th>
                    <th style="padding:0.5rem;">Payment</th>
                    <th style="padding:0.5rem;">Status</th>
                    <th style="padding:0.5rem;">Date</th>
                    <th style="padding:0.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): foreach ($orders as $o): ?>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td style="padding:0.5rem;"><?php echo $o['customer_name']; ?></td>
                    <td style="padding:0.5rem;"><?php echo $o['customer_email']; ?></td>
                    <td style="padding:0.5rem; font-weight:600; color:var(--primary-blue);"><?php echo number_format($o['total_amount']); ?> XAF</td>
                    <td style="padding:0.5rem; text-transform:capitalize;"><?php echo str_replace('_', ' ', $o['payment_method']); ?></td>
                    <td style="padding:0.5rem; text-transform:capitalize;"><?php echo $o['order_status']; ?></td>
                    <td style="padding:0.5rem;">&nbsp;<?php echo date('Y-m-d', strtotime($o['created_at'])); ?></td>
                    <td style="padding:0.5rem;">
                        <form action="/admin/orders/status/<?php echo $o['id']; ?>" method="POST" style="display:flex; gap:0.5rem; align-items:center;">
                            <select name="order_status" class="form-control" style="max-width:160px;">
                                <option value="pending" <?php echo $o['order_status']==='pending'?'selected':''; ?>>Pending</option>
                                <option value="processing" <?php echo $o['order_status']==='processing'?'selected':''; ?>>Processing</option>
                                <option value="shipped" <?php echo $o['order_status']==='shipped'?'selected':''; ?>>Shipped</option>
                                <option value="delivered" <?php echo $o['order_status']==='delivered'?'selected':''; ?>>Delivered</option>
                                <option value="cancelled" <?php echo $o['order_status']==='cancelled'?'selected':''; ?>>Cancelled</option>
                            </select>
                            <button class="btn btn-outline" type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="6" style="padding:0.75rem; color:var(--text-light-grey);">No orders yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


