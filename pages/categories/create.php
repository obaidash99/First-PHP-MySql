<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'core/validations.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php' ?>

<h1 class="text text-center bg-primary text-white p-3">Add New Category</h1>

<?php if ($error) : ?>
   <h5 class="alert alert-danger text-center"><?php echo $error ?></h5>
<?php endif; ?>

<?php if ($success) : ?>
   <h5 class="alert alert-success text-center"><?php echo $success ?></h5>
<?php endif; ?>

<div class="col-md-6 offset-md-3">
   <form action="<?php echo URL ?>controllers/categories/store.php" method="POST" class="my-2 p-3 border">
      <div class="form-group my-3">
         <label for="name" class="my-2">Category Name</label>
         <input type="text" name="name" class="form-control" id="name">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
   </form>
</div>

<?php require_once ROOT_PATH . 'pages/inc/footer.php' ?>