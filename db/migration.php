<?php
require_once __DIR__.'/../config.php';

$servername =$config['host'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];

$conn = new \PDO("mysql:host=$servername",$username,$password);

try {
 $sql = "CREATE DATABASE IF NOT EXISTS $database";
 $conn->exec($sql);
 $conn->query("USE $database");
 $sql = "CREATE TABLE users (
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

} catch (PDOException $e) {
echo $e->getMessage().'<br>';
}