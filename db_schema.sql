create database momDB;
use momDB;

CREATE TABLE menu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    coffee_name VARCHAR(50) NOT NULL,
    price DECIMAL(6, 2) NOT NULL,
    ingredients TEXT
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
