<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php' ?>

<?php

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $sql = "INSERT INTO `categories` (`name`) VALUES ('$name') ";
   $result = mysqli_query($conn, $sql);
}

?>

<h1 class="text text-center bg-primary text-white p-3">Add New Category</h1>

<div class="col-md-6 offset-md-3">
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="my-2 p-3 border">
      <div class="form-group my-3">
         <label for="name" class="my-2">Category Name</label>
         <input type="text" name="name" class="form-control" id="name">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
   </form>
</div>

<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>