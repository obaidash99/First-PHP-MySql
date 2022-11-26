<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'core/validations.php' ?>
<?php require_once ROOT_PATH . 'controllers/helpers/helper.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php' ?>
<?php

if (isset($_POST['submit'])) {
   $name = sanetizeInput($_POST['name']);
   $id = sanetizeInput($_POST['id']);

   if (requiredInput($name) && !is_numeric($name)) {

      if (minInput($name, 3) && maxInput($name, 25)) {

         $sql = "UPDATE `categories` SET `name` = '$name' WHERE `id` = '$id'";
         $result = update($sql);

         if ($result) {
            $_SESSION['success_update'] = "Updated Successfully";
            redirect("pages/categories/edit.php?id=" . $id);
         }
      } else {
         $_SESSION['error_update'] = 'Category Name must be between 3 and 25 chars';
         redirect("pages/categories/edit.php?id=" . $id);
      }
   } else {
      $_SESSION['error_update'] = "Category Name required! / Category Name Muat be Valid";
      redirect("pages/categories/edit.php?id=" . $id);
   }
}

?>




<?php require_once ROOT_PATH . 'pages/inc/footer.php' ?>