<?php require_once '../../core/config.php'; ?>
<?php require_once ROOT_PATH . 'core/conn.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php'; ?>
<?php

// $result = selectAll("products");

$sql = "SELECT *,products.id AS prod_id, categories.id AS cat_id, products.name AS prod_name,categories.name AS cat_name 
        FROM `products` 
        INNER JOIN `categories` 
        ON `categories`.`id` = `products`.`category_id` ";
$result = mysqli_query($conn, $sql);


?>





<h1 class="text-center col-12 bg-info py-3 text-white my-2">Show Products</h1>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $row['prod_name']; ?></td>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['price']; ?> $</td>
                            <td><?php echo $row['prod_id']; ?></td>
                            <td>
                                <img height="100" width="100" src="<?php echo URL ?>assets/uploads/<?php echo ($row['image']); ?>" />
                            </td>
                            <td>
                                <a href="<?php echo URL ?>pages/products/edit.php?id=<?php echo $row['prod_id']; ?>" class="btn btn-info text-white">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo URL ?>pages/products/delete.php?id=<?php echo $row['prod_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . 'pages/inc/footer.php'; ?>