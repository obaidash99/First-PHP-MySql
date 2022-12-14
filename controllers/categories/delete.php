<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'controllers/helpers/helper.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php' ?>
<?php

if (!isset($_GET['id']) || !is_numeric(($_GET['id']))) {
   redirect("pages/categories/index.php");
}

$id = $_GET['id'];
$sql = "SELECT * FROM `categories` WHERE `id` = '$id' LIMIT 1";

$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);

if (!$check) {
   redirect("pages/categories/index.php");
}

$sql2 = "DELETE FROM `categories` WHERE `id` = '$id' ";
mysqli_query($conn, $sql2);

?>

<h1 class="text-center col-12 bg-danger py-3 text-white my-2">Deleted Successfully</h1>

<?php redirectWithWaitTime("pages/categories/index.php", 2); ?>

<?php require_once ROOT_PATH . 'pages/inc/footer.php' ?>