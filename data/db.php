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

$sql2 = "CREATE TABLE `categories`(
   `id` INT PRIMARY KEY AUTO_INCREMENT,
   `name` VARCHAR(100) NOT NULL
)";


$result = mysqli_query($conn, $sql2);

var_dump($result);
