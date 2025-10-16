<?php
// Include the main layout
$content = ob_start();
?>

<!-- Manage Subscription Page -->
<section class="hero" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);">
    <div class="container">
        <h1 style="color: white;">Manage Your Subscription</h1>
        <p style="color: white;">View and manage your recurring donation subscription</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            
            <?php if (isset($_SESSION['success'])): ?>
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: var(--border-radius); margin-bottom: 2rem; border: 1px solid #c3e6cb;">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: var(--border-radius); margin-bottom: 2rem; border: 1px solid #f5c6cb;">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (empty($data['subscription'])): ?>
                <!-- Email Lookup Form -->
                <div class="card">
                    <div class="card-body">
                        <h2 style="margin-bottom: 1.5rem;">Find Your Subscription</h2>
                        <p style="color: var(--text-dark-grey); margin-bottom: 2rem;">
                            Enter the email address you used when setting up your monthly donation to view and manage your subscription.
                        </p>

                        <form method="POST" action="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/subscription/manage">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" 
                                       value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>" 
                                       placeholder="your@email.com" required>
                            </div>

                            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1rem;">
                                Find Subscription
                            </button>
                        </form>

                        <?php if (!empty($data['email']) && empty($data['subscription'])): ?>
                            <div style="background: #fff3cd; color: #856404; padding: 1rem; border-radius: var(--border-radius); margin-top: 1.5rem; border: 1px solid #ffeaa7;">
                                No active subscription found for this email address. If you believe this is an error, please contact support.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Help Section -->
                <div style="margin-top: 2rem; text-align: center;">
                    <p style="color: var(--text-light-grey); font-size: 0.95rem;">
                        Need help? <a href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/contact" style="color: var(--primary-blue);">Contact our support team</a>
                    </p>
                </div>

            <?php else: ?>
                <!-- Subscription Details -->
                <div class="card">
                    <div class="card-body">
                        <h2 style="margin-bottom: 1.5rem;">Your Subscription Details</h2>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                            <div>
                                <label style="font-weight: 600; color: var(--text-dark-grey); font-size: 0.9rem; display: block; margin-bottom: 0.5rem;">
                                    Donor Name
                                </label>
                                <p style="margin: 0; font-size: 1.1rem;">
                                    <?php echo htmlspecialchars($data['subscription']['donor_name']); ?>
                                </p>
                            </div>

                            <div>
                                <label style="font-weight: 600; color: var(--text-dark-grey); font-size: 0.9rem; display: block; margin-bottom: 0.5rem;">
                                    Email Address
                                </label>
                                <p style="margin: 0; font-size: 1.1rem;">
                                    <?php echo htmlspecialchars($data['subscription']['donor_email']); ?>
                                </p>
                            </div>

                            <div>
                                <label style="font-weight: 600; color: var(--text-dark-grey); font-size: 0.9rem; display: block; margin-bottom: 0.5rem;">
                                    Monthly Amount
                                </label>
                                <p style="margin: 0; font-size: 1.5rem; color: var(--primary-blue); font-weight: 700;">
                                    $<?php echo number_format($data['subscription']['amount'], 2); ?>
                                </p>
                            </div>

                            <div>
                                <label style="font-weight: 600; color: var(--text-dark-grey); font-size: 0.9rem; display: block; margin-bottom: 0.5rem;">
                                    Status
                                </label>
                                <p style="margin: 0;">
                                    <span style="padding: 0.5rem 1rem; background: #28a745; color: white; border-radius: 20px; font-size: 0.9rem;">
                                        <?php echo ucfirst($data['subscription']['subscription_status']); ?>
                                    </span>
                                </p>
                            </div>

                            <div>
                                <label style="font-weight: 600; color: var(--text-dark-grey); font-size: 0.9rem; display: block; margin-bottom: 0.5rem;">
                                    Next Billing Date
                                </label>
                                <p style="margin: 0; font-size: 1.1rem;">
                                    <?php echo date('F j, Y', strtotime($data['subscription']['next_billing_date'])); ?>
                                </p>
                            </div>

                            <div>
                                <label style="font-weight: 600; color: var(--text-dark-grey); font-size: 0.9rem; display: block; margin-bottom: 0.5rem;">
                                    Payment Method
                                </label>
                                <p style="margin: 0; font-size: 1.1rem;">
                                    <?php echo ucfirst(str_replace('_', ' ', $data['subscription']['payment_method'])); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Cancel Subscription Button -->
                        <div style="padding-top: 1.5rem; border-top: 1px solid var(--border-light);">
                            <button type="button" onclick="showCancelModal()" class="btn" style="background: #dc3545; color: white; padding: 0.75rem 2rem;">
                                Cancel Subscription
                            </button>
                            <p style="color: var(--text-light-grey); font-size: 0.85rem; margin-top: 0.5rem;">
                                You can cancel your subscription at any time. Your benefits will remain active until the end of the current billing period.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Payment History -->
                <?php if (isset($data['subscription']['donations']) && !empty($data['subscription']['donations'])): ?>
                    <div class="card" style="margin-top: 2rem;">
                        <div class="card-body">
                            <h3 style="margin-bottom: 1.5rem;">Payment History</h3>
                            
                            <div style="overflow-x: auto;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr style="background: var(--light-blue);">
                                            <th style="padding: 1rem; text-align: left; border-bottom: 2px solid var(--border-light);">Date</th>
                                            <th style="padding: 1rem; text-align: left; border-bottom: 2px solid var(--border-light);">Amount</th>
                                            <th style="padding: 1rem; text-align: left; border-bottom: 2px solid var(--border-light);">Status</th>
                                            <th style="padding: 1rem; text-align: left; border-bottom: 2px solid var(--border-light);">Reference</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['subscription']['donations'] as $donation): ?>
                                            <tr>
                                                <td style="padding: 1rem; border-bottom: 1px solid var(--border-light);">
                                                    <?php echo date('M j, Y', strtotime($donation['created_at'])); ?>
                                                </td>
                                                <td style="padding: 1rem; border-bottom: 1px solid var(--border-light); font-weight: 600;">
                                                    $<?php echo number_format($donation['amount'], 2); ?>
                                                </td>
                                                <td style="padding: 1rem; border-bottom: 1px solid var(--border-light);">
                                                    <span style="padding: 0.25rem 0.75rem; background: <?php echo $donation['payment_status'] === 'completed' ? '#28a745' : '#ffc107'; ?>; color: white; border-radius: 15px; font-size: 0.85rem;">
                                                        <?php echo ucfirst($donation['payment_status']); ?>
                                                    </span>
                                                </td>
                                                <td style="padding: 1rem; border-bottom: 1px solid var(--border-light); font-size: 0.9rem; color: var(--text-light-grey);">
                                                    <?php echo $donation['payment_reference'] ? substr($donation['payment_reference'], 0, 20) . '...' : 'N/A'; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Cancel Confirmation Modal -->
                <div id="cancelModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center;">
                    <div style="background: white; padding: 2rem; border-radius: 15px; max-width: 500px; margin: 2rem;">
                        <h3 style="margin-bottom: 1rem; color: #dc3545;">Cancel Subscription?</h3>
                        <p style="margin-bottom: 2rem; color: var(--text-dark-grey);">
                            Are you sure you want to cancel your monthly donation subscription? This action cannot be undone.
                        </p>

                        <form method="POST" action="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/subscription/cancel">
                            <input type="hidden" name="subscription_id" value="<?php echo $data['subscription']['id']; ?>">
                            <input type="hidden" name="email" value="<?php echo htmlspecialchars($data['subscription']['donor_email']); ?>">

                            <div style="display: flex; gap: 1rem;">
                                <button type="button" onclick="hideCancelModal()" class="btn" style="flex: 1; background: var(--border-light); color: var(--text-dark-grey);">
                                    Keep Subscription
                                </button>
                                <button type="submit" class="btn" style="flex: 1; background: #dc3545; color: white;">
                                    Yes, Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>
</section>

<script>
function showCancelModal() {
    document.getElementById('cancelModal').style.display = 'flex';
}

function hideCancelModal() {
    document.getElementById('cancelModal').style.display = 'none';
}

// Close modal when clicking outside
document.getElementById('cancelModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        hideCancelModal();
    }
});
</script>

<?php
$content = ob_get_clean();
include '../app/views/layouts/main.php';
?>

