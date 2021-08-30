<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_gadget_trade_db";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . $dbname;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    secondname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Error creating user table: " . $conn->error;
}

// Item table
$sql = "CREATE TABLE IF NOT EXISTS items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT (6) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price INT (6) NOT NULL,
    item_condition VARCHAR(255) NOT NULL,
    image_link VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    specifications VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table items created successfully";
} else {
    echo "Error creating items table: " . $conn->error;
}

// Cart table
$sql = "CREATE TABLE IF NOT EXISTS cart (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT (6) NOT NULL,
    item_id INT (6) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table cart created successfully";
} else {
    echo "Error creating cart table: " . $conn->error;
}

// Address table
$sql = "CREATE TABLE IF NOT EXISTS shipping_addresses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT (6) NOT NULL,
    names VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    province VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    zipcode VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table cart created successfully";
} else {
    echo "Error creating cart table: " . $conn->error;
}

// Payments methods table
$sql = "CREATE TABLE IF NOT EXISTS payment_method (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT (6) NOT NULL,
    card_number INT (255) NOT NULL,
    expiration_date VARCHAR(255) NOT NULL,
    security_code INT (255) NOT NULL,
    billing_address VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table cart created successfully";
} else {
    echo "Error creating cart table: " . $conn->error;
}

// Order methods table
$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT (6) NOT NULL,
    total_cost INT (6) NOT NULL,
    shipping_information VARCHAR(255) NOT NULL,
    payment_information VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table orders created successfully";
} else {
    echo "Error creating orders table: " . $conn->error;
}

// Order items methods table
$sql = "CREATE TABLE IF NOT EXISTS order_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT (6) NOT NULL,
    item_id INT (6) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table order  created successfully";
} else {
    echo "Error creating order items table: " . $conn->error;
}
