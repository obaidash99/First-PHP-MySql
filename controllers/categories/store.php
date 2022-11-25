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
         $result = insert($sql);

         if ($result) {
            $_SESSION['success_cat'] = "Added Successfully";
            redirect('pages/categories/index.php');
         }
      } else {
         $_SESSION['error_cat'] = 'Category Name must be between 3 and 25 chars';
         redirect('pages/categories/create.php');
      }
   } else {
      $_SESSION['error_cat'] = "Category Name required! / Category Must be a Valid Name";
      redirect('pages/categories/create.php');
   }
}
?>

<?php require_once ROOT_PATH . 'pages/inc/footer.php' ?>