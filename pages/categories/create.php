<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'core/validations.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php'; ?>

<h1 class="text text-center bg-info text-white p-3">Add New Category</h1>

<?php

// To check if the name entered already in the database

// $sql = "SELECT `name` FROM `categories` ";
// $result = mysqli_query($conn, $sql);

// $rows = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($result);



?>

<?php if (isset($_SESSION['error_cat'])) : ?>
   <h5 class="alert alert-danger text-center"><?php echo $_SESSION['error_cat'] ?></h5>
<?php
   unset($_SESSION['error_cat']);
endif;
?>

<?php if (isset($_SESSION['success_cat'])) : ?>
   <h5 class="alert alert-success text-center"><?php echo $_SESSION['success_cat'] ?></h5>
<?php
   unset($_SESSION['success_cat']);
endif;
?>


<div class="col-md-6 offset-md-3">
   <form action="<?php echo URL ?>controllers/categories/store.php" method="POST" class="my-2 p-3 border">
      <div class="form-group my-3">
         <label for="name" class="my-2">Category Name</label>
         <input type="text" name="name" class="form-control" id="name">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
      <a href="<?php echo URL ?>pages/categories/index.php" class="btn btn-info text-white">Categories Page</a>
   </form>
</div>



<?php require_once ROOT_PATH . 'pages/inc/footer.php' ?>