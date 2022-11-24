<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'core/validations.php' ?>
<?php require_once ROOT_PATH . 'controllers/helpers/helper.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php' ?>


<?php

if (isset($_POST['submit'])) {
   $name = sanetizeInput($_POST['name']);

   if (requiredInput($name) && !is_numeric($name)) {
      if (minInput($name, 3) && maxInput($name, 25)) {
         $sql = "INSERT INTO `categories` (`name`) VALUES ('$name') ";
         $result = mysqli_query($conn, $sql);

         if ($result) {
            $success = "Added Successfully";
         }
      } else {
         $error = 'Category Name must be between 3 and 25 chars';
      }
   } else {
      $error = "Category Name required! / Category Must be a Valid Name";
   }
}
?>


<?php if ($error) : ?>
   <h5 class="alert alert-danger text-center"><?php echo $error ?></h5>
   <a href="javascript:history.go(-1)" class="btn btn-primary">
      << Go Back</a>
      <?php endif; ?>

      <?php if ($success) : ?>
         <h5 class="alert alert-success text-center"><?php echo $success ?></h5>
         <a href="<?php URL ?>pages/categories/index.php" class="btn btn-primary">
            << Go Back</a>
            <?php endif; ?>


            <?php require_once ROOT_PATH . 'pages/inc/footer.php' ?>