<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php' ?>

<?php

$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn, $sql);

?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">All Categories</h1>
<div class="row">
   <div class="col-sm-12">
      <table class="table">
         <thead>
            <tr>
               <th scope="col">ID</th>
               <th scope="col">Name</th>
               <th scope="col">Action</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            <?php if (mysqli_num_rows($result) > 0) :  ?>
               <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info text-white font-weight-bold">Edit</a>
                     </td>
                     <td>
                        <a href="<?php echo URL ?>controllers/categories/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger text-white font-weight-bold">Delete</a>
                     </td>
                  </tr>
               <?php endwhile; ?>
            <?php endif; ?>
         </tbody>
      </table>
   </div>
</div>

<?php require_once ROOT_PATH . 'pages/inc/header.php' ?>