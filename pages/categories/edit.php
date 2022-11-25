<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'controllers/helpers/helper.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php' ?>

<?php

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
   redirect("pages/categories/index.php");
}

$id = $_GET['id'];
$sql = "SELECT * FROM `categories` WHERE `id` = '$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);

if (!$check) {
   redirect("pages/categories/index.php");
}

$row = mysqli_fetch_assoc($result);


?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">Edit Category</h1>

<div class="col-md-6 offset-md-3">

   <?php if (isset($_SESSION['error_update'])) : ?>
      <h5 class="alert alert-danger text-center"><?php echo $_SESSION['error_update'] ?></h5>
   <?php
      unset($_SESSION['error_update']);
   endif; ?>

   <?php if (isset($_SESSION['success_update'])) : ?>
      <h5 class="alert alert-success text-center"><?php echo $_SESSION['success_update'] ?></h5>
   <?php
      unset($_SESSION['success_update']);
   endif; ?>

   <form action="<?php echo URL ?>controllers/categories/update.php" method="POST" class="my-2 p-3 border">
      <div class="form-group my-3">
         <label for="name">Category Name</label>
         <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="name">
         <input type="hidden" value="<?php echo $id ?>" name="id">
      </div>


      <button type="submit" class="btn btn-primary" name="submit">Edit Category</button>
   </form>
</div>


<?php require_once ROOT_PATH . 'pages/inc/footer.php' ?>