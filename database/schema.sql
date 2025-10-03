-- The Way of Hope Database Schema
-- Multi-language NGO website with e-commerce functionality

-- Users table for admin access
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'editor') DEFAULT 'editor',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Volunteers/Members table
CREATE TABLE volunteers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    skills TEXT,
    interests TEXT,
    membership_fee_paid BOOLEAN DEFAULT FALSE,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending'
);

-- Donations table
CREATE TABLE donations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    donor_name VARCHAR(100) NOT NULL,
    donor_email VARCHAR(100) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'XAF',
    payment_method ENUM('paypal', 'mtn_momo', 'orange_money', 'bank_transfer') NOT NULL,
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    program_id INT,
    is_recurring BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (program_id) REFERENCES programs(id)
);

-- Programs table
CREATE TABLE programs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name_en VARCHAR(100) NOT NULL,
    name_fr VARCHAR(100) NOT NULL,
    name_es VARCHAR(100) NOT NULL,
    description_en TEXT,
    description_fr TEXT,
    description_es TEXT,
    goals_en TEXT,
    goals_fr TEXT,
    goals_es TEXT,
    image VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- News/Blog posts table
CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title_en VARCHAR(200) NOT NULL,
    title_fr VARCHAR(200) NOT NULL,
    title_es VARCHAR(200) NOT NULL,
    content_en TEXT,
    content_fr TEXT,
    content_es TEXT,
    excerpt_en TEXT,
    excerpt_fr TEXT,
    excerpt_es TEXT,
    category VARCHAR(50),
    featured_image VARCHAR(255),
    author_id INT,
    status ENUM('draft', 'published') DEFAULT 'draft',
    published_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id)
);

-- Events table
CREATE TABLE events (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title_en VARCHAR(200) NOT NULL,
    title_fr VARCHAR(200) NOT NULL,
    title_es VARCHAR(200) NOT NULL,
    description_en TEXT,
    description_fr TEXT,
    description_es TEXT,
    event_date DATETIME NOT NULL,
    location VARCHAR(200),
    event_type ENUM('training', 'outreach', 'fundraiser', 'meeting') NOT NULL,
    max_participants INT,
    registration_required BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Gallery table
CREATE TABLE gallery (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200),
    description TEXT,
    file_path VARCHAR(255) NOT NULL,
    file_type ENUM('image', 'video') NOT NULL,
    category VARCHAR(50),
    is_featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Store products table
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    category VARCHAR(50),
    size_options JSON,
    stock_quantity INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Store orders table
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(100) NOT NULL,
    customer_email VARCHAR(100) NOT NULL,
    customer_phone VARCHAR(20),
    shipping_address TEXT,
    total_amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('paypal', 'mtn_momo', 'orange_money', 'bank_transfer') NOT NULL,
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    order_status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Store order items table
CREATE TABLE order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Contact messages table
CREATE TABLE contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Site settings table
CREATE TABLE site_settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default admin user (password: admin123)
INSERT INTO users (username, email, password, role) VALUES 
('admin', 'admin@thewayofhope.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Insert default programs
INSERT INTO programs (name_en, name_fr, name_es, description_en, description_fr, description_es) VALUES 
('Education', 'Éducation', 'Educación', 'Expanding access to quality learning', 'Élargir l\'accès à un apprentissage de qualité', 'Ampliar el acceso al aprendizaje de calidad'),
('Health Awareness', 'Sensibilisation à la santé', 'Concienciación sanitaria', 'HIV/AIDS, Ebola, Malaria, Polio, Tuberculosis awareness', 'Sensibilisation au VIH/SIDA, Ebola, Paludisme, Polio, Tuberculose', 'Concienciación sobre VIH/SIDA, Ébola, Malaria, Polio, Tuberculosis'),
('Vocational Training', 'Formation professionnelle', 'Formación profesional', 'Practical skills for employment', 'Compétences pratiques pour l\'emploi', 'Habilidades prácticas para el empleo'),
('Rights Defense', 'Défense des droits', 'Defensa de derechos', 'Support for vulnerable groups and minorities', 'Soutien aux groupes vulnérables et minorités', 'Apoyo a grupos vulnerables y minorías'),
('Disability Inclusion', 'Inclusion des personnes handicapées', 'Inclusión de discapacitados', 'Support for persons with disabilities', 'Soutien aux personnes handicapées', 'Apoyo a personas con discapacidad');

-- Insert default site settings
INSERT INTO site_settings (setting_key, setting_value) VALUES 
('site_title_en', 'The Way of Hope'),
('site_title_fr', 'La Voie de l\'Espoir'),
('site_title_es', 'El Camino de la Esperanza'),
('contact_email', 'info@thewayofhope.org'),
('contact_phone', '+237 6XX XXX XXX'),
('address', 'Bafang, Cameroon'),
('funds_raised', '0'),
('volunteers_count', '0'),
('projects_completed', '0');
