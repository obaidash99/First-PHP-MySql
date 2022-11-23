<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $id = $_POST['id'];

   $sql = "UPDATE `categories` SET `name` = '$name' WHERE `id` = '$id'";
   $result = mysqli_query($conn, $sql);

   header("location:../../pages/categories/index.php");
}
