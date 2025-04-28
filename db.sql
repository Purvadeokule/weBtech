-- run this in phpMyAdmin or the MySQL console

CREATE DATABASE IF NOT EXISTS restaurant;
USE restaurant;

CREATE TABLE IF NOT EXISTS orders (
    order_id   INT AUTO_INCREMENT PRIMARY KEY,
    cust_name  VARCHAR(100) NOT NULL,
    table_no   INT         NOT NULL,
    order_date DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS order_items (
    item_id    INT          AUTO_INCREMENT PRIMARY KEY,
    order_id   INT          NOT NULL,
    item_name  VARCHAR(100) NOT NULL,
    quantity   INT          NOT NULL,
    price      DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);
