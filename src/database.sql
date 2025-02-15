CREATE DATABASE konyvwebaruhaz
CHARACTER SET utf8
COLLATE utf8_hungarian_ci;


USE konyvwebaruhaz;

CREATE TABLE `books` (
  `book_id` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `title` VARCHAR(64) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `isbn` VARCHAR(17) UNIQUE NOT NULL,
  `author` VARCHAR(150) NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  `description` TEXT,
  `pages` INT(4) NOT NULL,
  `electronic` TINYINT(1) NOT NULL DEFAULT 0,
  `release_date` DATE NOT NULL,
  `cover` longblob COMPRESSED NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;


CREATE TABLE `users` (
  `user_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `surname` VARCHAR(100) NOT NULL,
  `firstname` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) UNIQUE NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  `phone_number` VARCHAR(20) NOT NULL,
  `reg_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` VARCHAR(150) NOT NULL 
);



CREATE TABLE `transactions` (
  `transaction_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT(11) NOT NULL,
  `payment_method` ENUM('credit_card', 'paypal', 'bank_transfer', 'crypto', 'cash') NOT NULL,
  `payment_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` DECIMAL(10,2) NOT NULL,
  `order_number` VARCHAR(50) UNIQUE NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) 
);

CREATE TABLE `orders` (
  `order_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT(11) NOT NULL,
  `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` ENUM('pending', 'completed', 'shipped', 'cancelled') NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) 
);


CREATE TABLE `delivery` (
  `delivery_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT(11) NOT NULL,
  `delivery_type` ENUM('standard', 'express', 'same_day') NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `delivery_date` DATE NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`order_id`) 
);



