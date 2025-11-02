ALTER TABLE `menu_items` ADD `is_new` TINYINT(1) NOT NULL DEFAULT 0 AFTER `is_available`;

ALTER TABLE `orders` 
ADD `customer_address` TEXT NULL AFTER `customer_phone`,
ADD `delivery_instructions` TEXT NULL AFTER `customer_address`;

ALTER TABLE `orders` 
CHANGE `status` `status` ENUM('pending_payment','pending','completed','cancelled') 
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'pending_payment';
