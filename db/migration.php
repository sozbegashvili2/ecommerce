<?php
require_once __DIR__.'/../config.php';

$servername =$config['host'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];

$conn = new \PDO("mysql:host=$servername",$username,$password);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "CREATE DATABASE IF NOT EXISTS $database";
 $conn->exec($sql);
 $conn->query("USE $database");
 $sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstName VARCHAR(30) NOT NULL,
lastName VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255),
verKey VARCHAR(1024),
verified INT(6),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
 $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS brands (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
brandName VARCHAR(30) NOT NULL
)";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS category (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
categoryName VARCHAR(30) NOT NULL
)";
    $conn->exec($sql);
    $sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(512) NOT NULL,
productPrice float NOT NULL,
productQuantity int (6),
productDesc varchar(2048),
productImg varchar(1024),
brandId int(6) UNSIGNED NOT NULL,
categoryId int(6) UNSIGNED NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (brandId) REFERENCES brands(id),
FOREIGN KEY (categoryId) REFERENCES category(id)
)";
    $conn->exec($sql);
} catch (PDOException $e) {
echo $e->getMessage().'<br>';
}