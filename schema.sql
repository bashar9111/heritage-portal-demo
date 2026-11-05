-- Reconstructed from the recovered PHP queries. No original user data.
CREATE DATABASE IF NOT EXISTS heritage_demo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE heritage_demo;
CREATE TABLE users (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(30) NOT NULL UNIQUE,
 email VARCHAR(120) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;
CREATE TABLE stories (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 user_id INT UNSIGNED NOT NULL,
 title VARCHAR(160) NOT NULL,
 content TEXT NOT NULL,
 image_path VARCHAR(255) NOT NULL,
 post_type VARCHAR(20) NOT NULL DEFAULT 'story',
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;
