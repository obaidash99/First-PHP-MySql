<?php


$conn = mysqli_connect("localhost", "root", "", "new_ecommerce");

if (!$conn) {
   die("connection error : ");
}

function insert($sql)
{
   global $conn;
   $result = mysqli_query($conn, $sql);
   return $result;
}

function update($sql)
{
   global $conn;
   $result = mysqli_query($conn, $sql);
   return $result;
}

function getRow($table, $id)
{
   global $conn;
   $sql = "SELECT * FROM `$table` WHERE `id`='$id' ";
   $result = mysqli_query($conn, $sql);
   return mysqli_fetch_assoc($result);
}


function selectAll($table)
{
   global $conn;
   $sql = "SELECT * FROM `$table` ";
   $result = mysqli_query($conn, $sql);
   return $result;
}
