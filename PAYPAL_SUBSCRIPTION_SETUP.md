# PayPal Subscription Implementation Guide

## Overview
This document outlines the complete PayPal subscription implementation with 3-minute billing cycles for testing.

## What's Been Implemented

### 1. Database Schema ✅
- **donors table**: Stores donor information with anonymous support
- **subscriptions table**: Manages recurring subscriptions
- **paypal_plans table**: Caches PayPal product and plan IDs
- **donations table**: Modified to link to donors and subscriptions

**Migration Files:**
- `database/migration_donors_subscriptions.sql`
- `database/migration_paypal_plans.sql`

### 2. API Controller Enhancements ✅
**File: `app/controllers/ApiController.php`**

**New Methods:**
- `createPayPalSubscription()` - Creates subscription when user selects "Monthly"
- `getOrCreatePayPalPlan()` - Dynamically creates or retrieves cached plan
- `createPayPalProduct()` - Creates PayPal product via API
- `createPayPalPlanAPI()` - Creates PayPal plan with 3-minute cycles (sandbox)
- `createPayPalSubscriptionAPI()` - Creates PayPal subscription
- `paypalWebhook()` - Handles webhook notifications
- `handleRecurringPaymentCompleted()` - Processes recurring payments
- `cancel PayPalSubscription()` - Cancels subscriptions

**Key Features:**
- Dynamic plan creation for any donation amount
- 3-minute billing cycle for sandbox testing
- Webhook support for automatic payment capture
- Plan caching to avoid duplicate API calls

### 3. Donation Controller ✅
**File: `app/controllers/DonationController.php`**

**New Methods:**
- `subscriptionSuccess()` - Success page after subscription activation
- `manageSubscription()` - Subscription management page
- `cancelSubscription()` - Handles subscription cancellation

### 4. Routes ✅
**File: `app/core/Router.php`**

**New Routes:**
- `/donation/subscription-success` - After PayPal approves subscription
- `/subscription/manage` - User subscription management
- `/subscription/cancel` - Cancel subscription endpoint
- `/api/webhooks/paypal` - PayPal webhook endpoint

### 5. Form Updates ✅
**File: `app/views/donation/index.php`**

- Donor name and email are now optional
- Anonymous donation support with generated IDs
- "One Time" vs "Monthly" buttons implemented
- Custom amount handling fixed

## How It Works

### One-Time Donation Flow:
```
1. User fills form → Selects "One Time" → Clicks "Donate Now"
2. System creates donor record (or uses existing)
3. System creates donation record
4. System creates PayPal order
5. Redirects to PayPal for payment
6. PayPal redirects back → Payment captured
7. Donation status updated to "completed"
```

### Monthly Subscription Flow:
```
1. User fills form → Selects "Monthly" → Clicks "Donate Now"
2. System creates donor record (or uses existing)
3. System creates subscription record in database
4. System creates donation record (first payment)
5. System checks for cached PayPal plan (by amount)
6. If no plan exists:
   - Creates PayPal product
   - Creates PayPal plan (3-minute billing cycle for sandbox)
   - Caches plan ID in database
7. Creates PayPal subscription
8. Redirects user to PayPal to approve subscription
9. User approves → PayPal redirects to subscription-success page
10. Subscription status: "active"

Every 3 minutes (sandbox):
11. PayPal automatically charges the payment method
12. PayPal sends webhook notification: PAYMENT.SALE.COMPLETED
13. Webhook handler creates new donation record
14. Updates next_billing_date (+3 minutes)
```

### Webhook Events Handled:
- `BILLING.SUBSCRIPTION.ACTIVATED` - Subscription approved
- `PAYMENT.SALE.COMPLETED` - Recurring payment successful
- `BILLING.SUBSCRIPTION.CANCELLED` - User cancelled
- `BILLING.SUBSCRIPTION.SUSPENDED` - Payment failed/paused

## Testing Steps

### Prerequisites:
1. **Run migrations:**
   ```sql
   -- Run in phpMyAdmin or MySQL command line
   SOURCE database/migration_donors_subscriptions.sql;
   SOURCE database/migration_paypal_plans.sql;
   ```

2. **Set up PayPal webhook:**
   - Go to: https://developer.paypal.com/dashboard/webhooks
   - Create webhook with URL: `http://localhost/thewayofhope/public/api/webhooks/paypal`
   - OR use ngrok for local testing:
     ```
     ngrok http 80
     ```
     Then use the ngrok URL: `https://xxxx.ngrok.io/thewayofhope/public/api/webhooks/paypal`
   - Select events:
     - `BILLING.SUBSCRIPTION.ACTIVATED`
     - `PAYMENT.SALE.COMPLETED`
     - `BILLING.SUBSCRIPTION.CANCELLED`
     - `BILLING.SUBSCRIPTION.SUSPENDED`

### Test One-Time Donation:
1. Go to: `http://localhost/thewayofhope/public/donate`
2. Select "One Time"
3. Choose amount or enter custom
4. Optionally enter name/email (or leave blank for anonymous)
5. Select PayPal payment method
6. Click "Donate Now"
7. Login to PayPal sandbox
8. Complete payment
9. Verify success page shows
10. Check database: `donations` table should have new record with `subscription_id = NULL`

### Test Monthly Subscription:
1. Go to: `http://localhost/thewayofhope/public/donate`
2. Select "Monthly"
3. Choose amount (e.g., $25)
4. Enter name/email
5. Select PayPal payment method
6. Click "Donate Now"
7. **Wait for plan creation** (may take 5-10 seconds)
8. Login to PayPal sandbox
9. Approve subscription
10. Verify subscription-success page shows
11. Check database:
    - `donors` table: New donor record
    - `subscriptions` table: New subscription with `subscription_status = 'active'`
    - `donations` table: First donation record
    - `paypal_plans` table: Cached plan for this amount

### Test Recurring Payments:
1. After activating subscription, **wait 3 minutes**
2. Check webhook logs: `error_log` should show "Recurring payment processed"
3. Check database:
    - `donations` table: New donation record created automatically
    - `subscriptions` table: `next_billing_date` updated (+3 minutes)
4. **Wait another 3 minutes** and verify another payment is recorded
5. Repeat to test multiple billing cycles

### Test Subscription Cancellation:
1. Go to: `http://localhost/thewayofhope/public/subscription/manage`
2. Enter email used for subscription
3. Click "Find Subscription"
4. View subscription details and payment history
5. Click "Cancel Subscription"
6. Confirm cancellation
7. Check database: `subscription_status` changed to 'cancelled'
8. Verify no more recurring payments are processed

## Important Notes

### Sandbox vs Live:
- **Sandbox**: Uses 3-minute billing cycles for testing
- **Live**: Automatically switches to monthly (30-day) cycles
- Controlled by: `PAYPAL_MODE` constant in `config.php`

### Webhook Testing:
- **Local testing requires ngrok** or similar tunneling tool
- PayPal cannot reach `localhost` directly
- Alternative: Deploy to test server with public URL

### Anonymous Donations:
- Generated email format: `anon_xxxxx@anonymous.thewayofhope`
- Generated name format: `Anonymous Donor #xxxxxxxx`
- Flag: `is_anonymous = 1` in donors table

### Plan Caching:
- Plans are cached by amount in `paypal_plans` table
- Avoids recreating plans for common amounts
- Improves performance and reduces API calls

## Troubleshooting

### Issue: Subscription not created
**Check:**
- PayPal API credentials in `config.php`
- Error logs: `error_log` in PHP
- Database: Check if subscription record exists

### Issue: Webhooks not received
**Check:**
- Webhook URL is correct and accessible
- Webhook events are selected in PayPal dashboard
- ngrok is running (for local testing)
- Check PayPal webhook delivery history

### Issue: Recurring payments not working
**Check:**
- Webhook is set up correctly
- Subscription status is "active"
- Check PayPal sandbox dashboard for subscription status
- Verify webhook event `PAYMENT.SALE.COMPLETED` is enabled

### Issue: Plans table shows "3 minutes" in production
**Check:**
- `PAYPAL_MODE` should be 'live' not 'sandbox'
- Clear plans cache and recreate for live mode

## Next Steps

1. **Create view files** (currently not created):
   - `app/views/donation/subscription-success.php`
   - `app/views/donation/manage-subscription.php`

2. **Test thoroughly** with sandbox

3. **Set up ngrok** for webhook testing

4. **Switch to live mode** when ready:
   - Change `PAYPAL_MODE` to 'live'
   - Update PayPal credentials to live keys
   - Clear `paypal_plans` table to recreate with monthly cycles

## Files Modified/Created

### Created:
- `database/migration_paypal_plans.sql`
- `PAYPAL_SUBSCRIPTION_SETUP.md` (this file)

### Modified:
- `app/controllers/ApiController.php` (+600 lines)
- `app/controllers/DonationController.php` (+127 lines)
- `app/core/Router.php` (added 4 routes)
- `app/views/donation/index.php` (optional fields)
- `database/migration_donors_subscriptions.sql` (already existed)

### Still Needed:
- `app/views/donation/subscription-success.php`
- `app/views/donation/manage-subscription.php`

## Summary

✅ Dynamic PayPal plan creation
✅ 3-minute billing cycle for testing
✅ Webhook handling for recurring payments
✅ Subscription management and cancellation
✅ Anonymous donation support
✅ Normalized database structure

⏳ Pending:
- View file creation
- Webhook testing with ngrok
- Full end-to-end testing

