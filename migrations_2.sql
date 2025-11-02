ALTER TABLE `orders` 
ADD `email` VARCHAR(255) NULL AFTER `customer_phone`,
ADD `bkash_transaction_id` VARCHAR(255) NULL AFTER `email`,
ADD `delivery_date` DATE NULL AFTER `payment_method`,
ADD `is_approved` TINYINT(1) NOT NULL DEFAULT 0 AFTER `delivery_date`;

ALTER TABLE `orders` 
CHANGE `status` `status` ENUM('pending_payment','pending','approved','completed','cancelled') 
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'pending';
