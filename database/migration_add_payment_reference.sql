-- Migration to add payment_reference column to donations table
-- Run this if you already have a donations table without the payment_reference column

ALTER TABLE donations ADD COLUMN payment_reference VARCHAR(255) AFTER payment_status;
