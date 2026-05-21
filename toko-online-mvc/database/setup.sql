-- Database: toko_online
-- Auto-setup database untuk aplikasi toko online

-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS toko_online;
USE toko_online;

-- Tabel Users untuk Authentication
CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'customer') DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Products untuk CRUD
CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT(11) DEFAULT 0,
    category VARCHAR(50),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Orders
CREATE TABLE IF NOT EXISTS orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Order Items
CREATE TABLE IF NOT EXISTS order_items (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    order_id INT(11) NOT NULL,
    product_id INT(11) NOT NULL,
    quantity INT(11) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user
-- Password: admin123 (hashed dengan password_hash)
INSERT INTO users (username, email, password, full_name, role) VALUES
('admin', 'admin@tokoonline.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin');

-- Insert sample products
INSERT INTO products (name, description, price, stock, category, image_url) VALUES
('Laptop Gaming ASUS ROG', 'Laptop gaming dengan spesifikasi tinggi, prosesor Intel Core i7, RAM 16GB, SSD 512GB', 15999000.00, 10, 'Electronics', 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=500'),
('Smartphone Samsung Galaxy S23', 'Flagship smartphone dengan kamera 200MP, layar AMOLED 6.8 inch', 12999000.00, 15, 'Electronics', 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=500'),
('Headphone Sony WH-1000XM5', 'Headphone noise cancelling premium dengan kualitas suara terbaik', 4999000.00, 20, 'Accessories', 'https://images.unsplash.com/photo-1546435770-a3e426bf472b?w=500'),
('Smart Watch Apple Watch Series 9', 'Smartwatch dengan fitur kesehatan lengkap dan always-on display', 6999000.00, 12, 'Accessories', 'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?w=500'),
('Keyboard Mechanical Logitech', 'Keyboard mechanical RGB dengan switch tactile', 1299000.00, 25, 'Accessories', 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=500'),
('Monitor LG UltraWide 34"', 'Monitor curved ultrawide untuk produktivitas maksimal', 7999000.00, 8, 'Electronics', 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=500'),
('Mouse Gaming Razer DeathAdder', 'Mouse gaming ergonomis dengan sensor 20000 DPI', 899000.00, 30, 'Accessories', 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=500'),
('Webcam Logitech C920', 'Webcam full HD untuk streaming dan video call', 1499000.00, 18, 'Accessories', 'https://images.unsplash.com/photo-1614624532983-4ce03382d63d?w=500');
