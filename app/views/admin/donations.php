<?php
$content = ob_start();
?>
<div class="card">
    <div class="card-body">
        <h3>Donations</h3>
        <table style="width:100%; border-collapse: collapse; margin-top:1rem;">
            <thead>
                <tr style="text-align:left; border-bottom:1px solid var(--border-light);">
                    <th style="padding:0.5rem;">Donor</th>
                    <th style="padding:0.5rem;">Email</th>
                    <th style="padding:0.5rem;">Amount</th>
                    <th style="padding:0.5rem;">Method</th>
                    <th style="padding:0.5rem;">Status</th>
                    <th style="padding:0.5rem;">Date</th>
                    <th style="padding:0.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($donations)): foreach ($donations as $d): ?>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td style="padding:0.5rem;"><?php echo $d['donor_name']; ?></td>
                    <td style="padding:0.5rem;"><?php echo $d['donor_email']; ?></td>
                    <td style="padding:0.5rem; font-weight:600; color:var(--primary-blue);"><?php echo number_format($d['amount']); ?> XAF</td>
                    <td style="padding:0.5rem; text-transform:capitalize;">
                        <?php echo str_replace('_', ' ', $d['payment_method']); ?>
                    </td>
                    <td style="padding:0.5rem; text-transform:capitalize;">
                        <?php echo $d['payment_status']; ?>
                    </td>
                    <td style="padding:0.5rem;"><?php echo date('Y-m-d', strtotime($d['created_at'])); ?></td>
                    <td style="padding:0.5rem;">
                        <form action="/admin/donations/status/<?php echo $d['id']; ?>" method="POST" style="display:flex; gap:0.5rem; align-items:center;">
                            <select name="payment_status" class="form-control" style="max-width:160px;">
                                <option value="pending" <?php echo $d['payment_status']==='pending'?'selected':''; ?>>Pending</option>
                                <option value="completed" <?php echo $d['payment_status']==='completed'?'selected':''; ?>>Completed</option>
                                <option value="failed" <?php echo $d['payment_status']==='failed'?'selected':''; ?>>Failed</option>
                            </select>
                            <button class="btn btn-outline" type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="6" style="padding:0.75rem; color:var(--text-light-grey);">No donations yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


