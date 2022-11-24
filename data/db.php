<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
   die("Connection Faild: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS `new_ecommerce` ";

$result = mysqli_query($conn, $sql);

mysqli_close($conn);


$dbname = "new_ecommerce";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "CREATE TABLE `categories`(
   `id` INT PRIMARY KEY AUTO_INCREMENT,
   `name` VARCHAR(100) NOT NULL
)";

// $result = mysqli_query($conn, $sql);

$sql3 = "CREATE TABLE `products`(
   `id` INT PRIMARY KEY AUTO_INCREMENT,
   `category_id` INT NOT NULL,
   `name` VARCHAR(100) NOT NULL,
   `price` SMALLINT NOT NULL,
   `image` VARCHAR(200) NOT NULL,
   `description` TEXT NOT NULL,
   FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
) ";

$result = mysqli_query($conn, $sql3);
