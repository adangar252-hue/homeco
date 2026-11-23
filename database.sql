CREATE DATABASE IF NOT EXISTS homco_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE homco_db;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150),
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150),
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200),
    content TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(150),
    phone VARCHAR(30),
    message TEXT,
    status ENUM('new', 'read', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO users (
    name,
    email,
    password,
    role
)
VALUES (
    'Admin',
    'admin@homco.com',
    SHA2('admin123', 256),
    'admin'
);


INSERT INTO services (
    title,
    description,
    image
)
VALUES
(
    'HOME DESIGN CONSULTATION',
    'Home design planning and consultation for your dream space.',
    'img12.jpeg'
),
(
    'HOME DESIGN 3D 2D INTERIOR SERVICE',
    '2D and 3D interior design with modern concepts.',
    'img11.jpeg'
),
(
    'ALL IN ONE HOME INTERIOR DESIGN',
    'Complete interior design package from plan to finish.',
    'img39.jpeg'
);


INSERT INTO projects (
    title,
    description,
    image
)
VALUES
(
    'PRE MADE HOME CONSULTATION',
    'Office meeting, working time call and on-site visit.',
    'img13.jpeg'
),
(
    'INTERIOR DESIGN REPAIR',
    'Repair and refresh your interior space.',
    'img16.jpeg'
),
(
    'EXPERIENCE FRAME DESIGN',
    'Create stylish frames and living spaces.',
    'img24.jpeg'
),
(
    'FULL HOUSE DECORATION',
    'Complete house decoration package.',
    'img7.jpeg'
),
(
    'PRE BUILDING HOME DESIGN',
    'Design before construction begins.',
    'img41.jpeg'
),
(
    'FULL PACKAGE DECORATION',
    'End-to-end home decoration.',
    'img25.jpeg'
);


INSERT INTO blog_posts (
    title,
    content,
    image
)
VALUES
(
    '10 TRENDS HOME DECORATION',
    'Modern ideas for a beautiful home.',
    'img57.jpeg'
),
(
    'HOW TO CLEANING OWN HOME',
    'Simple ways to maintain your interior.',
    'img49.jpeg'
),
(
    'TIPS CHOICE BEST AGENCY',
    'Things to consider before choosing an agency.',
    'img37.jpeg'
);