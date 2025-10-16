-- Migration: Add Donors and Subscriptions Tables
-- Date: 2025-10-16
-- Description: Creates donors and subscriptions tables for normalized donation management

-- Step 1: Create donors table
CREATE TABLE IF NOT EXISTS donors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    donor_name VARCHAR(255) NOT NULL,
    donor_email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(50),
    address TEXT,
    is_anonymous BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Step 2: Create subscriptions table
CREATE TABLE IF NOT EXISTS subscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    donor_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    program_id INT NULL,
    subscription_id VARCHAR(255) COMMENT 'PayPal/Stripe subscription ID',
    billing_cycle VARCHAR(50) DEFAULT 'monthly',
    subscription_status ENUM('active', 'paused', 'cancelled', 'failed') DEFAULT 'active',
    next_billing_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (donor_id) REFERENCES donors(id) ON DELETE CASCADE,
    FOREIGN KEY (program_id) REFERENCES programs(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Step 3: Migrate existing donation data to donors table
-- Insert unique donors from existing donations table
INSERT INTO donors (donor_name, donor_email, is_anonymous)
SELECT DISTINCT 
    donor_name,
    donor_email,
    0 as is_anonymous
FROM donations
WHERE donor_email IS NOT NULL AND donor_email != ''
ON DUPLICATE KEY UPDATE donor_name = VALUES(donor_name);

-- Step 4: Add donor_id column to donations table
ALTER TABLE donations 
    ADD COLUMN donor_id INT NULL AFTER id,
    ADD COLUMN subscription_id INT NULL;

-- Step 5: Update existing donations with donor_id
UPDATE donations d
JOIN donors don ON d.donor_email = don.donor_email
SET d.donor_id = don.id;

-- Step 6: Add foreign key constraints to donations table
ALTER TABLE donations
    ADD FOREIGN KEY (donor_id) REFERENCES donors(id) ON DELETE CASCADE,
    ADD FOREIGN KEY (subscription_id) REFERENCES subscriptions(id) ON DELETE SET NULL;

-- Step 7: Make donor_id NOT NULL after migration (optional - uncomment if needed)
-- ALTER TABLE donations MODIFY donor_id INT NOT NULL;

-- Step 8: Remove redundant donor_name and donor_email columns from donations table
-- These are now stored in the donors table and accessed via donor_id
ALTER TABLE donations DROP COLUMN donor_name;
ALTER TABLE donations DROP COLUMN donor_email;

-- Indexes for better performance
CREATE INDEX idx_donor_email ON donors(donor_email);
CREATE INDEX idx_donor_anonymous ON donors(is_anonymous);
CREATE INDEX idx_subscription_status ON subscriptions(subscription_status);
CREATE INDEX idx_subscription_donor ON subscriptions(donor_id);
CREATE INDEX idx_donation_donor ON donations(donor_id);
CREATE INDEX idx_donation_subscription ON donations(subscription_id);
