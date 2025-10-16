-- Migration: Add PayPal Plans Cache Table
-- Date: 2025-10-16
-- Description: Creates table to cache PayPal product and plan IDs for subscriptions

CREATE TABLE IF NOT EXISTS paypal_plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    amount DECIMAL(10,2) NOT NULL UNIQUE,
    currency VARCHAR(3) DEFAULT 'USD',
    product_id VARCHAR(255) NOT NULL COMMENT 'PayPal Product ID',
    plan_id VARCHAR(255) NOT NULL COMMENT 'PayPal Plan ID',
    billing_cycle_minutes INT DEFAULT 43200 COMMENT 'Billing cycle in minutes (default: 30 days = 43200 minutes)',
    plan_name VARCHAR(255),
    plan_description TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_amount (amount),
    INDEX idx_plan_id (plan_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

