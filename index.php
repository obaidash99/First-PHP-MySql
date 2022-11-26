<?php require_once 'core/config.php' ?>
<?php require_once 'core/conn.php' ?>
<?php require_once 'pages/inc/header.php' ?>
<?php require_once 'pages/inc/navbar.php' ?>

<h1 class="text-center col-12 bg-secondary py-3 text-white my-2">Simple POS System!</h1>

<div class="container">
   <div class="row">

      <div class="col-4">
         <div class="card" style="width: 18rem;">
            <img src="./assets/images/categories.jpg" width="300px" height="200px" class="card-img-top" alt="categories">
            <div class="card-body">
               <h5 class="card-title">Categories</h5>
               <p class="card-text">You can view all your categories, add new categories, edit and delete existed categories.</p>
               <a href="./pages/categories/index.php" class="btn btn-info text-white">All Categories</a>
            </div>
         </div>
      </div>

      <div class="col-4">
         <div class="card" style="width: 18rem;">
            <img src="./assets/images/products.png" width="300px" height="200px" class="card-img-top" alt="categories">
            <div class="card-body">
               <h5 class="card-title">Products</h5>
               <p class="card-text">You can view all your products, add new products, edit and delete existed products.</p>
               <a href="./pages/products/index.php" class="btn btn-info text-white">All Products</a>
            </div>
         </div>
      </div>

      <div class="col-4">
         <div class="card" style="width: 18rem;">
            <img src="./assets/images/users.jpeg" width="300px" height="200px" class="card-img-top" alt="categories">
            <div class="card-body">
               <h5 class="card-title">Users</h5>
               <p class="card-text">You can view all your users, add new users, edit and delete existed users.</p>
               <a href="./pages/users/index.php" class="btn btn-info text-white">All Users</a>
            </div>
         </div>
      </div>

   </div>
</div>

<?php require_once 'pages/inc/header.php' ?>