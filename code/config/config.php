<?php
//CREATE DATABASE shoping_cart

// CREATE TABLE users(
// id INT AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(100)  NOT NULL,
//   password VARCHAR(255) NOT NULL,
//   email VARCHAR(255) NOT NULL,
// 


// CREATE TABLE products(
// id INT AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(100)  NOT NULL,
//     price DECIMAL(10,2) NOT NULL,
//     price_before_discount DECIMAL(10,2) ,
//     quantity INT
// )
  
// CREATE TABLE orders(
// id INT AUTO_INCREMENT PRIMARY KEY,
//     total DECIMAL(10,2) NOT NULL,
//     user_id INT NOT NULL,
//     creat_at DATETIME DEFAULT CURRENT_TIMESTAMP,
//     FOREIGN KEY (user_id) REFERENCES users(id)

// )



// CREATE TABLE order_items(
// id INT AUTO_INCREMENT PRIMARY KEY,
//     price DECIMAL(10,2) NOT NULL,
//     order_id INT NOT NULL,
//     product_id INT NOT NULL,
//     quantity INT NOT NULL,
//     FOREIGN KEY (order_id) REFERENCES orders(id),
//     FOREIGN KEY (product_id) REFERENCES products(id)

// )