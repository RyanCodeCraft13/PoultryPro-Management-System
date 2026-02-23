CREATE DATABASE poultry_system;
USE poultry_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(255)
);

INSERT INTO users (username,password)
VALUES ('admin', '$2y$10$wH7kZJk8examplehashreplace');

CREATE TABLE batches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_name VARCHAR(100),
    type VARCHAR(50),
    total_chickens INT,
    start_date DATE
);

CREATE TABLE egg_production (
    id INT AUTO_INCREMENT PRIMARY KEY,
    batch_id INT,
    production_date DATE,
    total_eggs INT,
    FOREIGN KEY (batch_id) REFERENCES batches(id) ON DELETE CASCADE
);

CREATE TABLE feeds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feed_name VARCHAR(100),
    quantity INT,
    cost DECIMAL(10,2)
);

CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_date DATE,
    description VARCHAR(255),
    amount DECIMAL(10,2)
);

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expense_date DATE,
    description VARCHAR(255),
    amount DECIMAL(10,2)
);
