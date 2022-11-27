<?php require_once '../../core/config.php'; ?>
<?php require_once ROOT_PATH . 'core/conn.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php'; ?>


<?php

$id = $_GET['id'];

echo "<pre>";
print_r($_GET);

$row = getRow("products", $id);


echo $id;
echo "<pre>";
print_r($row);

?>

<h1 class="text-center col-12 bg-success py-3 text-white my-2">Edit Product</h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form action="<?php echo URL . "controllers/products/update.php?id=" . $id; ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" value="<?php echo  $row['name']; ?>" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Product Price</label>
                    <input type="number" value="<?php echo  $row['price']; ?>" name="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Product Decription</label>
                    <textarea name="description" class="form-control" rows="5"><?php echo  $row['description']; ?></textarea>
                </div>
                <div class="mb-3" style="display: flex; justify-content: space-between; gap: 5%;">
                    <div style="flex: 75%;">
                        <label for="">Product Image</label>
                        <input type="file" value="<?php echo  $row['image']; ?>" name="image" class="form-control">
                    </div>
                    <img src="../../assets/uploads/<?php echo $row['image']; ?>" width="100" height="100" style="flex: 20%; border-radius: 10px;" alt="">
                </div>

                <div class="mb-3">
                    <input type="submit" class="form-control bg-success text-white">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . 'pages/inc/footer.php'; ?>