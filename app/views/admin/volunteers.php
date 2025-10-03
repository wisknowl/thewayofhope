<?php
$content = ob_start();
?>
<div class="card">
    <div class="card-body">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h3>Volunteers</h3>
            <a class="btn btn-outline" href="/admin/volunteers/export">Export CSV</a>
        </div>
        <table style="width:100%; border-collapse: collapse; margin-top:1rem;">
            <thead>
                <tr style="text-align:left; border-bottom:1px solid var(--border-light);">
                    <th style="padding:0.5rem;">Name</th>
                    <th style="padding:0.5rem;">Email</th>
                    <th style="padding:0.5rem;">Phone</th>
                    <th style="padding:0.5rem;">Status</th>
                    <th style="padding:0.5rem;">Date</th>
                    <th style="padding:0.5rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($volunteers)): foreach ($volunteers as $v): ?>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td style="padding:0.5rem;"><?php echo $v['first_name'] . ' ' . $v['last_name']; ?></td>
                    <td style="padding:0.5rem;"><?php echo $v['email']; ?></td>
                    <td style="padding:0.5rem;"><?php echo $v['phone']; ?></td>
                    <td style="padding:0.5rem; text-transform:capitalize;"><?php echo $v['status']; ?></td>
                    <td style="padding:0.5rem;"><?php echo date('Y-m-d', strtotime($v['registration_date'])); ?></td>
                    <td style="padding:0.5rem;">
                        <form action="/admin/volunteers/status/<?php echo $v['id']; ?>" method="POST" style="display:flex; gap:0.5rem; align-items:center;">
                            <select name="status" class="form-control" style="max-width:140px;">
                                <option value="pending" <?php echo $v['status']==='pending'?'selected':''; ?>>Pending</option>
                                <option value="approved" <?php echo $v['status']==='approved'?'selected':''; ?>>Approved</option>
                                <option value="rejected" <?php echo $v['status']==='rejected'?'selected':''; ?>>Rejected</option>
                            </select>
                            <button class="btn btn-outline" type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="5" style="padding:0.75rem; color:var(--text-light-grey);">No volunteers yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$content = ob_get_clean();
include '../app/views/admin/layout.php';
?>


