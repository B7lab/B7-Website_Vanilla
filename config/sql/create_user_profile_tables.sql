create database IF NOT EXISTS b7
CHARACTER SET utf8
COLLATE utf8_general_ci;

use b7;

CREATE TABLE if not exists users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    location VARCHAR(100),
    joined_at DATE,
    profile_description TEXT,
    profile_picture_url VARCHAR(255),
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE users CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE if not exists skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE if not exists user_skills (
    user_id INT,
    skill_id INT,
    PRIMARY KEY (user_id, skill_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
);

CREATE TABLE if not exists profiles (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    full_name VARCHAR(255),
    bio TEXT,
    profile_picture_url VARCHAR(255),
    date_of_birth DATE,
    location VARCHAR(255),
    private BOOLEAN DEFAULT TRUE, -- Steuert, ob das Profil privat ist (nur für angemeldete Nutzer sichtbar)
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE if not exists permissions (
    permission_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    profile_id INT NOT NULL,
    can_view BOOLEAN DEFAULT TRUE, -- Gibt an, ob der Benutzer das Profil sehen kann
    can_edit BOOLEAN DEFAULT FALSE, -- Gibt an, ob der Benutzer das Profil bearbeiten darf
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (profile_id) REFERENCES profiles(profile_id)
);

CREATE TABLE if not exists contributions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50)
);

CREATE TABLE if not exists user_contributions (
    user_id INT,
    contribution_id INT,
    PRIMARY KEY (user_id, contribution_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (contribution_id) REFERENCES contributions(id) ON DELETE CASCADE
);

CREATE TABLE if not exists appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    start DATETIME NOT NULL,
    end DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE if not exists inventory_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contribution_id INT NOT NULL,
    owner_id INT NOT NULL,
    `condition` TEXT,
    location VARCHAR(255),
    quantity INT DEFAULT 1,
    is_available BOOLEAN DEFAULT TRUE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (contribution_id) REFERENCES contributions(id) ON DELETE CASCADE,
    FOREIGN KEY (owner_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE if not exists item_offers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    offer_type ENUM('sale', 'rental') NOT NULL,
    price DECIMAL(10, 2),
    rental_period VARCHAR(50),
    available_from DATE,
    available_until DATE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES inventory_items(id) ON DELETE CASCADE
);

CREATE TABLE if not exists item_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    offer_id INT NOT NULL,
    buyer_id INT,
    rented_from DATE,
    rented_until DATE,
    final_price DECIMAL(10, 2),
    status ENUM('requested', 'confirmed', 'completed', 'cancelled') DEFAULT 'requested',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (offer_id) REFERENCES item_offers(id) ON DELETE CASCADE,
    FOREIGN KEY (buyer_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Tabelle: Shop-Artikel (manuell oder aus Inventar)
CREATE TABLE IF NOT EXISTS shop_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seller_id INT NOT NULL,
    inventory_item_id INT,  -- NULL wenn kein Inventargegenstand
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    currency ENUM('EUR', 'CREDITS') DEFAULT 'EUR',
    image_url VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (seller_id) REFERENCES users(id),
    FOREIGN KEY (inventory_item_id) REFERENCES inventory_items(id) ON DELETE SET NULL
);

-- Tabelle: b7-Credit-Konten
CREATE TABLE IF NOT EXISTS b7_credits (
    user_id INT PRIMARY KEY,
    credits DECIMAL(10,2) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tabelle: Käufe im Shop
CREATE TABLE IF NOT EXISTS shop_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    buyer_id INT NOT NULL,
    shop_item_id INT NOT NULL,
    price_paid DECIMAL(10,2),
    currency ENUM('EUR', 'CREDITS') NOT NULL,
    payment_status ENUM('pending', 'paid', 'refunded') DEFAULT 'pending',
    paid_at DATETIME,
    FOREIGN KEY (buyer_id) REFERENCES users(id),
    FOREIGN KEY (shop_item_id) REFERENCES shop_items(id)
);

-- b7-Credit Transaktionen (Käufe, Verkäufe, Aufladungen)
CREATE TABLE IF NOT EXISTS credit_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount DECIMAL(10,2), -- positiv = Gutschrift, negativ = Abbuchung
    reason VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS shop_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    available_until DATE,
    is_active BOOLEAN DEFAULT TRUE,
    sold_to_user_id INT NULL,
    payment_method ENUM('CREDITS', 'EUR') NULL,
    FOREIGN KEY (sold_to_user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS b7_credits (
    user_id INT PRIMARY KEY,
    credits INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE calendar_events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  title VARCHAR(255),
  start DATETIME,
  end DATETIME,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


-- Benutzer
INSERT INTO users (username, email, password_hash, location, joined_at, profile_description)
VALUES ('Maik Tappe', 'maik.tappe82@googlemail.com', '$2y$10$g/Pd1oWPVjoq1uUWNM2D2eFXZUkFcs.K70Ywg4yuFRXctZbQhkn/m', 'Oer-Erkenschwick', '2023-02-01', 'Tüftler aus dem Ruhrgebiet');

-- Fähigkeiten
INSERT INTO skills (name) VALUES 
('Electronics'), ('3D Printing'), ('Woodworking');

-- Zuordnung Benutzer ↔ Fähigkeiten
INSERT INTO user_skills (user_id, skill_id) VALUES 
(1, 1), (1, 2), (1, 3);

-- Geräte / Materialien
INSERT INTO contributions (name, description, category) VALUES 
('Drill Machine', '', 'Tool'),
('Laser Cutter', '', 'Tool'),
('3D Printer', '', 'Tool'),
('Schraubensortiment & Electronics', NULL, 'Material'),
('Raspberry Pi Setup', '', 'Device');

-- Zuordnung Benutzer ↔ Beiträge
INSERT INTO user_contributions (user_id, contribution_id) VALUES 
(1, 1), (1, 2), (1, 3), (1, 4), (1, 5);

INSERT INTO appointments (user_id, title, description, start, end)
VALUES
(1, 'Arzttermin', 'Hausarzt Dr. Müller', '2025-05-05 09:00:00', '2025-05-05 09:30:00'),
(1, 'Teammeeting', 'Zoom-Link folgt per Mail', '2025-05-06 14:00:00', '2025-05-06 15:00:00');

INSERT INTO inventory_items (contribution_id, owner_id, `condition`, location, quantity, notes)
VALUES 
(1, 1, 'Wie neu', 'Werkstatt', 1, 'Bohrmaschine von Bosch, 18V'),
(3, 1, 'Gut', 'Regal A2', 1, '3D-Drucker Ender 3, mit PETG-Filament'),
(4, 1, 'Sortiert', 'Schrank', 3, 'Mehrere Sortierkästen mit Schrauben und Widerständen');

-- Bohrmaschine zum Verleih
INSERT INTO item_offers (item_id, offer_type, price, rental_period, available_from, available_until, description)
VALUES 
(1, 'rental', 5.00, 'pro Tag', '2025-05-05', '2025-05-31', 'Leihbar für kleine Arbeiten');

-- 3D-Drucker zum Verkauf
INSERT INTO item_offers (item_id, offer_type, price, rental_period, available_from, available_until, description)
VALUES 
(2, 'sale', 150.00, NULL, '2025-05-01', '2025-06-30', 'Wenig genutzt, ideal für Einsteiger');

-- Maik bietet einen handgemachten Schlüsselanhänger an
INSERT INTO shop_items (seller_id, title, description, price, currency, image_url)
VALUES (1, 'Schlüsselanhänger aus Holz', 'Handgemacht in der offenen Werkstatt', 7.50, 'EUR', '/images/shop/keychain.jpg');

-- Inventargegenstand (3D-Drucker) wird auch im Shop angeboten – diesmal mit Credits
INSERT INTO shop_items (seller_id, inventory_item_id, title, description, price, currency)
VALUES (1, 2, '3D-Drucker Ender 3', 'Nur zur Abholung, mit PETG-Filament', 120.00, 'CREDITS');

-- Maik bekommt ein Startguthaben
INSERT INTO b7_credits (user_id, credits) VALUES (1, 200.00);

-- Transaktion: +200 Credits Aufladung
INSERT INTO credit_transactions (user_id, amount, reason)
VALUES (1, 200.00, 'Willkommensbonus');

-- Käufer kauft den Schlüsselanhänger per PayPal
INSERT INTO shop_orders (buyer_id, shop_item_id, price_paid, currency, payment_status, paid_at)
VALUES (1, 1, 7.50, 'EUR', 'paid', NOW());

-- Käufer kauft 3D-Drucker mit Credits
INSERT INTO shop_orders (buyer_id, shop_item_id, price_paid, currency, payment_status, paid_at)
VALUES (1, 2, 120.00, 'CREDITS', 'paid', NOW());

-- -120 Credits abbuchen
INSERT INTO credit_transactions (user_id, amount, reason)
VALUES (1, -120.00, 'Kauf: 3D-Drucker Ender 3');


UPDATE users
SET profile_description = 'Tüftler aus dem Ruhrgebiet'  -- Neuer Text
WHERE id = 1;