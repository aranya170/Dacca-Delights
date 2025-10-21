-- Dacca Delights POS System Database Schema
-- Created: October 12, 2025

-- Database creation
CREATE DATABASE IF NOT EXISTS dacca_delights_pos;
USE dacca_delights_pos;

-- Categories table
CREATE TABLE categories (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    icon VARCHAR(10),
    sort_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Menu items table
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category_id VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    description TEXT,
    size_info VARCHAR(200),
    min_quantity INT DEFAULT 1,
    is_available BOOLEAN DEFAULT TRUE,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Customers table (optional customer info)
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    total_orders INT DEFAULT 0,
    total_spent DECIMAL(12,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(20) UNIQUE NOT NULL,
    customer_id INT NULL,
    customer_name VARCHAR(100),
    customer_phone VARCHAR(20),
    subtotal DECIMAL(10,2) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('cash', 'card', 'mobile') DEFAULT 'cash',
    amount_paid DECIMAL(10,2) NOT NULL,
    change_amount DECIMAL(10,2) DEFAULT 0.00,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'completed',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL
);

-- Order items table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    menu_item_id INT NOT NULL,
    item_name VARCHAR(100) NOT NULL,
    item_price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_item_id) REFERENCES menu_items(id) ON DELETE CASCADE
);

-- Daily sales summary table
CREATE TABLE daily_sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_date DATE NOT NULL UNIQUE,
    total_orders INT DEFAULT 0,
    total_revenue DECIMAL(12,2) DEFAULT 0.00,
    cash_sales DECIMAL(12,2) DEFAULT 0.00,
    card_sales DECIMAL(12,2) DEFAULT 0.00,
    mobile_sales DECIMAL(12,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Settings table for system configuration
CREATE TABLE pos_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(50) UNIQUE NOT NULL,
    setting_value TEXT,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert categories
INSERT INTO categories (id, name, description, icon, sort_order) VALUES
('breads', 'Breads', 'Fresh baked breads and loaves', '🍞', 1),
('buns', 'Buns & Rolls', 'Burger buns, rolls and small breads', '🥖', 2),
('bagels', 'Bagels', 'Traditional and flavored bagels', '🥯', 3),
('desserts', 'Desserts', 'Sweet treats, cookies and brownies', '🧁', 4),
('tarts', 'Tarts & Pastries', 'Delicious tarts and pastries', '🥧', 5),
('gluten_free', 'Gluten Free', 'Gluten-free bread options', '🌾', 6);

-- Insert POS settings
INSERT INTO pos_settings (setting_key, setting_value, description) VALUES
('restaurant_name', 'Dacca Delights', 'Restaurant name'),
('restaurant_type', 'Bakery & Cafe', 'Type of business'),
('currency_symbol', '৳', 'Currency symbol'),
('address', 'Dhaka, Bangladesh', 'Restaurant address'),
('phone', '+880-XXXX-XXXXX', 'Contact phone number'),
('receipt_footer', 'Thank you for visiting Dacca Delights!', 'Receipt footer message'),
('order_number_prefix', 'DD', 'Order number prefix');

-- Insert menu items
INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(1, 'Sandwich Bread', 'breads', 250, 'Fresh sandwich bread from our bakery', '(~ 1000 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(2, 'Sourdough Bread', 'breads', 350, 'Fresh sourdough bread from our bakery', '(~ 650 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(3, 'Sourdough Bread Whole Wheat', 'breads', 420, 'Fresh sourdough bread whole wheat from our bakery', '(~ 650 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(4, 'Baguette', 'breads', 300, 'Fresh baguette from our bakery', '(~ 400 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(5, 'Mini Baguette', 'breads', 300, 'Fresh mini baguette from our bakery', '(~ 200 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(6, 'Milk Bread', 'breads', 200, 'Fresh milk bread from our bakery', '(~ 650 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(7, 'Premium Brown Bread', 'breads', 350, 'Fresh premium brown bread from our bakery', '(~ 650 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(8, 'Regular Brown Bread', 'breads', 300, 'Fresh regular brown bread from our bakery', '(~ 650 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(9, 'Premium Multigrain Bread', 'breads', 450, 'Fresh premium multigrain bread from our bakery', '(~ 650 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(10, 'Regular Multigrain Bread', 'breads', 400, 'Fresh regular multigrain bread from our bakery', '(~ 650 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(11, 'Khobus', 'breads', 40, 'Fresh khobus from our bakery', '(~ 100 gm) (minimum 6 pieces)', 6, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(12, 'Regular Ciabatta Bread', 'breads', 80, 'Fresh regular ciabatta bread from our bakery', '(~180 gm) (Minimum 4 pieces)', 4, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(13, 'Premium Ciabatta Bread', 'breads', 100, 'Fresh premium ciabatta bread from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(14, 'Arabian Khalid Al Nahal', 'breads', 1200, 'Fresh arabian khalid al nahal from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(15, 'Burger Bun', 'buns', 50, 'Fresh burger bun from our bakery', '(~ 90 gm) (minimum 6 pieces)', 6, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(16, 'Brioche Burger Bun', 'buns', 65, 'Fresh brioche burger bun from our bakery', '(~ 90 gm) (minimum 6 pieces)', 6, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(17, 'Mini Burger Bun', 'buns', 35, 'Fresh mini burger bun from our bakery', '(~ 35 gm) (minimum 12 pieces)', 12, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(18, 'Sourdough Bun', 'buns', 65, 'Fresh sourdough bun from our bakery', '(~ 90 gm) (minimum 10 pieces)', 10, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(19, 'Brioche Roll', 'buns', 60, 'Fresh brioche roll from our bakery', '(~ 90 gm) (minimum 6 pieces)', 6, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(20, 'Hot Cross Bun', 'buns', 85, 'Fresh hot cross bun from our bakery', '(minimum 6 pieces)', 6, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(21, 'Cinnamon Raisin Bagel', 'bagels', 95, 'Fresh cinnamon raisin bagel from our bakery', '(~ 90 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(22, 'Plain Bagel', 'bagels', 80, 'Fresh plain bagel from our bakery', '(~ 90 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(23, 'Sesame Bagel', 'bagels', 80, 'Fresh sesame bagel from our bakery', '(~ 90 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(24, 'Mixed Seed Bagel', 'bagels', 90, 'Fresh mixed seed bagel from our bakery', '(~ 90 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(25, 'Chia Bagel', 'bagels', 90, 'Fresh chia bagel from our bakery', '(~ 90 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(26, 'Cheese Bagel', 'bagels', 100, 'Fresh cheese bagel from our bakery', '(~ 90 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(27, 'Black Sesame Bagel', 'bagels', 95, 'Fresh black sesame bagel from our bakery', '(~ 90 gm)', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(28, 'Bagel Bunch', 'bagels', 500, 'Fresh bagel bunch from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(29, 'Garlic Herb Bagel', 'bagels', 0, 'Fresh garlic herb bagel from our bakery', '(~ 90 gm)', 1, FALSE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(30, 'Everything Bagel', 'bagels', 0, 'Fresh everything bagel from our bakery', '(~ 90 gm)', 1, FALSE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(31, 'Cheese Kunafa', 'desserts', 290, 'Fresh cheese kunafa from our bakery', '(minimum 2 pieces)', 2, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(32, 'Chocolate Brownie', 'desserts', 115, 'Fresh chocolate brownie from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(33, 'Chocolate Peanut Crunch Brownie', 'desserts', 130, 'Fresh chocolate peanut crunch brownie from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(34, 'Chocolate Chips Cookie', 'desserts', 75, 'Fresh chocolate chips cookie from our bakery', '(~ 50 gm) (minimum 10 pieces)', 10, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(35, 'Oatmeal Cookie', 'desserts', 65, 'Fresh oatmeal cookie from our bakery', '(~ 25 gm) (minimum 10 pieces)', 10, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(36, 'Pumpkin Spice Muffin', 'desserts', 65, 'Fresh pumpkin spice muffin from our bakery', '(minimum 4 pieces)', 4, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(37, 'Carrot Cheese Muffin', 'desserts', 65, 'Fresh carrot cheese muffin from our bakery', '(minimum 4 pieces)', 4, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(38, 'Mango Cheese Tart', 'tarts', 135, 'Fresh mango cheese tart from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(39, 'Hokkaido Cheese Tart', 'tarts', 125, 'Fresh hokkaido cheese tart from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(40, 'Egg Tart', 'tarts', 120, 'Fresh egg tart from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(41, 'Chocolate Cheese Tart', 'tarts', 125, 'Fresh chocolate cheese tart from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(42, 'Custard Tart', 'tarts', 120, 'Fresh custard tart from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(43, 'Lemon Tart', 'tarts', 150, 'Fresh lemon tart from our bakery', '', 1, TRUE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(44, 'Regular Ragi Bread', 'gluten_free', 0, 'Fresh regular ragi bread from our bakery', '', 1, FALSE);

INSERT INTO menu_items (id, name, category_id, price, description, size_info, min_quantity, is_available) VALUES
(45, 'Premium Ragi Bread', 'gluten_free', 0, 'Fresh premium ragi bread from our bakery', '', 1, FALSE);

-- Create indexes for better performance
CREATE INDEX idx_orders_date ON orders(created_at);
CREATE INDEX idx_orders_number ON orders(order_number);
CREATE INDEX idx_menu_items_category ON menu_items(category_id);
CREATE INDEX idx_menu_items_available ON menu_items(is_available);
CREATE INDEX idx_order_items_order ON order_items(order_id);
CREATE INDEX idx_daily_sales_date ON daily_sales(sale_date);

-- Create triggers to update daily sales
DELIMITER //

CREATE TRIGGER update_daily_sales_on_order
AFTER INSERT ON orders
FOR EACH ROW
BEGIN
    INSERT INTO daily_sales (sale_date, total_orders, total_revenue, cash_sales, card_sales, mobile_sales)
    VALUES (DATE(NEW.created_at), 1, NEW.total_amount, 
            CASE WHEN NEW.payment_method = 'cash' THEN NEW.total_amount ELSE 0 END,
            CASE WHEN NEW.payment_method = 'card' THEN NEW.total_amount ELSE 0 END,
            CASE WHEN NEW.payment_method = 'mobile' THEN NEW.total_amount ELSE 0 END)
    ON DUPLICATE KEY UPDATE 
        total_orders = total_orders + 1,
        total_revenue = total_revenue + NEW.total_amount,
        cash_sales = cash_sales + CASE WHEN NEW.payment_method = 'cash' THEN NEW.total_amount ELSE 0 END,
        card_sales = card_sales + CASE WHEN NEW.payment_method = 'card' THEN NEW.total_amount ELSE 0 END,
        mobile_sales = mobile_sales + CASE WHEN NEW.payment_method = 'mobile' THEN NEW.total_amount ELSE 0 END;
END //

CREATE TRIGGER update_customer_stats
AFTER INSERT ON orders
FOR EACH ROW
BEGIN
    IF NEW.customer_id IS NOT NULL THEN
        UPDATE customers 
        SET total_orders = total_orders + 1,
            total_spent = total_spent + NEW.total_amount
        WHERE id = NEW.customer_id;
    END IF;
END //

DELIMITER ;

-- Sample data for testing
INSERT INTO customers (name, phone, email) VALUES
('John Doe', '01712345678', 'john@example.com'),
('Jane Smith', '01798765432', 'jane@example.com'),
('Ahmed Rahman', '01555123456', 'ahmed@example.com');
