create database IF NOT EXISTS b7;

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

-- Benutzer
INSERT INTO users (username, email, location, joined_at, profile_description)
VALUES ('Maik Tappe', 'maik.tappe82@googlemail.com', 'Oer-Erkenschwick', '2023-02-01', 'Tüftler aus dem Ruhrgebiet');

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