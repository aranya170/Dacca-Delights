-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2025 at 12:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dacca_delights_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(10) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
('bagels', 'Bagels', 'Traditional and flavored bagels', '🥯', 3, 1, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
('breads', 'Breads', 'Fresh baked breads and loaves', '🍞', 1, 1, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
('buns', 'Buns & Rolls', 'Burger buns, rolls and small breads', '🥖', 2, 1, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
('desserts', 'Desserts', 'Sweet treats, cookies and brownies', '🧁', 4, 1, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
('gluten_free', 'Gluten Free', 'Gluten-free bread options', '🌾', 6, 1, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
('tarts', 'Tarts & Pastries', 'Delicious tarts and pastries', '🥧', 5, 1, '2025-10-16 05:11:19', '2025-10-16 05:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total_orders` int(11) DEFAULT 0,
  `total_spent` decimal(12,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `address`, `total_orders`, `total_spent`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '01712345678', 'john@example.com', NULL, 0, 0.00, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(2, 'Jane Smith', '01798765432', 'jane@example.com', NULL, 0, 0.00, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(3, 'Ahmed Rahman', '01555123456', 'ahmed@example.com', NULL, 0, 0.00, '2025-10-16 05:11:19', '2025-10-16 05:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `daily_sales`
--

CREATE TABLE `daily_sales` (
  `id` int(11) NOT NULL,
  `sale_date` date NOT NULL,
  `total_orders` int(11) DEFAULT 0,
  `total_revenue` decimal(12,2) DEFAULT 0.00,
  `total_vat` decimal(12,2) DEFAULT 0.00,
  `cash_sales` decimal(12,2) DEFAULT 0.00,
  `card_sales` decimal(12,2) DEFAULT 0.00,
  `mobile_sales` decimal(12,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_sales`
--

INSERT INTO `daily_sales` (`id`, `sale_date`, `total_orders`, `total_revenue`, `total_vat`, `cash_sales`, `card_sales`, `mobile_sales`, `created_at`, `updated_at`) VALUES
(1, '2025-10-16', 4, 3291.00, 36.00, 3291.00, 0.00, 0.00, '2025-10-16 05:21:44', '2025-10-16 06:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `size_info` varchar(200) DEFAULT NULL,
  `min_quantity` int(11) DEFAULT 1,
  `is_available` tinyint(1) DEFAULT 1,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `category_id`, `price`, `description`, `size_info`, `min_quantity`, `is_available`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Sandwich Bread', 'breads', 250.00, 'Fresh sandwich bread from our bakery', '(~ 1000 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(2, 'Sourdough Bread', 'breads', 350.00, 'Fresh sourdough bread from our bakery', '(~ 650 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(3, 'Sourdough Bread Whole Wheat', 'breads', 420.00, 'Fresh sourdough bread whole wheat from our bakery', '(~ 650 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(4, 'Baguette', 'breads', 300.00, 'Fresh baguette from our bakery', '(~ 400 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(5, 'Mini Baguette', 'breads', 300.00, 'Fresh mini baguette from our bakery', '(~ 200 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(6, 'Milk Bread', 'breads', 200.00, 'Fresh milk bread from our bakery', '(~ 650 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(7, 'Premium Brown Bread', 'breads', 350.00, 'Fresh premium brown bread from our bakery', '(~ 650 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(8, 'Regular Brown Bread', 'breads', 300.00, 'Fresh regular brown bread from our bakery', '(~ 650 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(9, 'Premium Multigrain Bread', 'breads', 450.00, 'Fresh premium multigrain bread from our bakery', '(~ 650 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(10, 'Regular Multigrain Bread', 'breads', 400.00, 'Fresh regular multigrain bread from our bakery', '(~ 650 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(11, 'Khobus', 'breads', 40.00, 'Fresh khobus from our bakery', '(~ 100 gm) (minimum 6 pieces)', 6, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(12, 'Regular Ciabatta Bread', 'breads', 80.00, 'Fresh regular ciabatta bread from our bakery', '(~180 gm) (Minimum 4 pieces)', 4, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(13, 'Premium Ciabatta Bread', 'breads', 100.00, 'Fresh premium ciabatta bread from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(14, 'Arabian Khalid Al Nahal', 'breads', 1200.00, 'Fresh arabian khalid al nahal from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(15, 'Burger Bun', 'buns', 50.00, 'Fresh burger bun from our bakery', '(~ 90 gm) (minimum 6 pieces)', 6, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(16, 'Brioche Burger Bun', 'buns', 65.00, 'Fresh brioche burger bun from our bakery', '(~ 90 gm) (minimum 6 pieces)', 6, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(17, 'Mini Burger Bun', 'buns', 35.00, 'Fresh mini burger bun from our bakery', '(~ 35 gm) (minimum 12 pieces)', 12, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(18, 'Sourdough Bun', 'buns', 65.00, 'Fresh sourdough bun from our bakery', '(~ 90 gm) (minimum 10 pieces)', 10, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(19, 'Brioche Roll', 'buns', 60.00, 'Fresh brioche roll from our bakery', '(~ 90 gm) (minimum 6 pieces)', 6, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(20, 'Hot Cross Bun', 'buns', 85.00, 'Fresh hot cross bun from our bakery', '(minimum 6 pieces)', 6, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(21, 'Cinnamon Raisin Bagel', 'bagels', 95.00, 'Fresh cinnamon raisin bagel from our bakery', '(~ 90 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(22, 'Plain Bagel', 'bagels', 80.00, 'Fresh plain bagel from our bakery', '(~ 90 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(23, 'Sesame Bagel', 'bagels', 80.00, 'Fresh sesame bagel from our bakery', '(~ 90 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(24, 'Mixed Seed Bagel', 'bagels', 90.00, 'Fresh mixed seed bagel from our bakery', '(~ 90 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(25, 'Chia Bagel', 'bagels', 90.00, 'Fresh chia bagel from our bakery', '(~ 90 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(26, 'Cheese Bagel', 'bagels', 100.00, 'Fresh cheese bagel from our bakery', '(~ 90 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(27, 'Black Sesame Bagel', 'bagels', 95.00, 'Fresh black sesame bagel from our bakery', '(~ 90 gm)', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(28, 'Bagel Bunch', 'bagels', 500.00, 'Fresh bagel bunch from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(29, 'Garlic Herb Bagel', 'bagels', 0.00, 'Fresh garlic herb bagel from our bakery', '(~ 90 gm)', 1, 0, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(30, 'Everything Bagel', 'bagels', 0.00, 'Fresh everything bagel from our bakery', '(~ 90 gm)', 1, 0, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(31, 'Cheese Kunafa', 'desserts', 290.00, 'Fresh cheese kunafa from our bakery', '(minimum 2 pieces)', 2, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(32, 'Chocolate Brownie', 'desserts', 115.00, 'Fresh chocolate brownie from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(33, 'Chocolate Peanut Crunch Brownie', 'desserts', 130.00, 'Fresh chocolate peanut crunch brownie from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(34, 'Chocolate Chips Cookie', 'desserts', 75.00, 'Fresh chocolate chips cookie from our bakery', '(~ 50 gm) (minimum 10 pieces)', 10, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(35, 'Oatmeal Cookie', 'desserts', 65.00, 'Fresh oatmeal cookie from our bakery', '(~ 25 gm) (minimum 10 pieces)', 10, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(36, 'Pumpkin Spice Muffin', 'desserts', 65.00, 'Fresh pumpkin spice muffin from our bakery', '(minimum 4 pieces)', 4, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(37, 'Carrot Cheese Muffin', 'desserts', 65.00, 'Fresh carrot cheese muffin from our bakery', '(minimum 4 pieces)', 4, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(38, 'Mango Cheese Tart', 'tarts', 135.00, 'Fresh mango cheese tart from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(39, 'Hokkaido Cheese Tart', 'tarts', 125.00, 'Fresh hokkaido cheese tart from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(40, 'Egg Tart', 'tarts', 120.00, 'Fresh egg tart from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(41, 'Chocolate Cheese Tart', 'tarts', 125.00, 'Fresh chocolate cheese tart from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(42, 'Custard Tart', 'tarts', 120.00, 'Fresh custard tart from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(43, 'Lemon Tart', 'tarts', 150.00, 'Fresh lemon tart from our bakery', '', 1, 1, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(44, 'Regular Ragi Bread', 'gluten_free', 0.00, 'Fresh regular ragi bread from our bakery', '', 1, 0, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(45, 'Premium Ragi Bread', 'gluten_free', 0.00, 'Fresh premium ragi bread from our bakery', '', 1, 0, NULL, '2025-10-16 05:11:19', '2025-10-16 05:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `vat_rate` decimal(4,4) DEFAULT 0.1500,
  `vat_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('cash','card','mobile') DEFAULT 'cash',
  `amount_paid` decimal(10,2) NOT NULL,
  `change_amount` decimal(10,2) DEFAULT 0.00,
  `status` enum('pending','completed','cancelled') DEFAULT 'completed',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_id`, `customer_name`, `customer_phone`, `subtotal`, `vat_rate`, `vat_amount`, `total_amount`, `payment_method`, `amount_paid`, `change_amount`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'DD202510163888', NULL, '', '', 240.00, 0.1500, 36.00, 276.00, 'cash', 276.00, 0.00, 'completed', '', '2025-10-16 05:21:44', '2025-10-16 05:21:44'),
(2, 'DD202510164311', NULL, '', '', 240.00, 0.0000, 0.00, 240.00, 'cash', 240.00, 0.00, 'completed', '', '2025-10-16 05:31:51', '2025-10-16 05:31:51'),
(3, 'DD202510169573', NULL, 'Hasan Sonet', '1234', 1500.00, 0.0000, 0.00, 1500.00, 'cash', 1500.00, 0.00, 'completed', '', '2025-10-16 05:33:49', '2025-10-16 05:33:49'),
(4, 'DD202510164051', NULL, 'Aranya', '123213', 1275.00, 0.0000, 0.00, 1275.00, 'cash', 1275.00, 0.00, 'completed', '', '2025-10-16 06:28:26', '2025-10-16 06:28:26');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `update_customer_stats` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    IF NEW.customer_id IS NOT NULL THEN
        UPDATE customers 
        SET total_orders = total_orders + 1,
            total_spent = total_spent + NEW.total_amount
        WHERE id = NEW.customer_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_daily_sales_on_order` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    INSERT INTO daily_sales (sale_date, total_orders, total_revenue, total_vat, cash_sales, card_sales, mobile_sales)
    VALUES (DATE(NEW.created_at), 1, NEW.total_amount, NEW.vat_amount, 
            CASE WHEN NEW.payment_method = 'cash' THEN NEW.total_amount ELSE 0 END,
            CASE WHEN NEW.payment_method = 'card' THEN NEW.total_amount ELSE 0 END,
            CASE WHEN NEW.payment_method = 'mobile' THEN NEW.total_amount ELSE 0 END)
    ON DUPLICATE KEY UPDATE 
        total_orders = total_orders + 1,
        total_revenue = total_revenue + NEW.total_amount,
        total_vat = total_vat + NEW.vat_amount,
        cash_sales = cash_sales + CASE WHEN NEW.payment_method = 'cash' THEN NEW.total_amount ELSE 0 END,
        card_sales = card_sales + CASE WHEN NEW.payment_method = 'card' THEN NEW.total_amount ELSE 0 END,
        mobile_sales = mobile_sales + CASE WHEN NEW.payment_method = 'mobile' THEN NEW.total_amount ELSE 0 END;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `menu_item_id`, `item_name`, `item_price`, `quantity`, `subtotal`, `notes`, `created_at`) VALUES
(1, 1, 11, 'Khobus', 40.00, 6, 240.00, NULL, '2025-10-16 05:21:44'),
(2, 2, 11, 'Khobus', 40.00, 6, 240.00, NULL, '2025-10-16 05:31:51'),
(3, 3, 4, 'Baguette', 300.00, 1, 300.00, NULL, '2025-10-16 05:33:49'),
(4, 3, 14, 'Arabian Khalid Al Nahal', 1200.00, 1, 1200.00, NULL, '2025-10-16 05:33:49'),
(5, 4, 28, 'Bagel Bunch', 500.00, 1, 500.00, NULL, '2025-10-16 06:28:26'),
(6, 4, 27, 'Black Sesame Bagel', 95.00, 1, 95.00, NULL, '2025-10-16 06:28:26'),
(7, 4, 31, 'Cheese Kunafa', 290.00, 2, 580.00, NULL, '2025-10-16 06:28:26'),
(8, 4, 13, 'Premium Ciabatta Bread', 100.00, 1, 100.00, NULL, '2025-10-16 06:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `pos_settings`
--

CREATE TABLE `pos_settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_settings`
--

INSERT INTO `pos_settings` (`id`, `setting_key`, `setting_value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'restaurant_name', 'Dacca Delights', 'Restaurant name', '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(2, 'restaurant_type', 'Bakery & Cafe', 'Type of business', '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(3, 'currency_symbol', '৳', 'Currency symbol', '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(4, 'vat_rate', '0.15', 'VAT rate (15%)', '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(5, 'address', 'Dhaka, Bangladesh', 'Restaurant address', '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(6, 'phone', '+880-XXXX-XXXXX', 'Contact phone number', '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(7, 'receipt_footer', 'Thank you for visiting Dacca Delights!', 'Receipt footer message', '2025-10-16 05:11:19', '2025-10-16 05:11:19'),
(8, 'order_number_prefix', 'DD', 'Order number prefix', '2025-10-16 05:11:19', '2025-10-16 05:11:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_sales`
--
ALTER TABLE `daily_sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sale_date` (`sale_date`),
  ADD KEY `idx_daily_sales_date` (`sale_date`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_menu_items_category` (`category_id`),
  ADD KEY `idx_menu_items_available` (`is_available`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `idx_orders_date` (`created_at`),
  ADD KEY `idx_orders_number` (`order_number`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_item_id` (`menu_item_id`),
  ADD KEY `idx_order_items_order` (`order_id`);

--
-- Indexes for table `pos_settings`
--
ALTER TABLE `pos_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daily_sales`
--
ALTER TABLE `daily_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pos_settings`
--
ALTER TABLE `pos_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
