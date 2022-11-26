<?php require_once '../../core/config.php'; ?>
<?php require_once ROOT_PATH . 'core/conn.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php'; ?>


<?php

$id = $_GET['id'];
$row = getRow("products", $id);
echo "<pre>";
print_r($row);


?>

<h1>Edit Product</h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form action="<?php echo URL . "controllers/categories/update.php?id=" . $id; ?>" method="POST">
                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" value="<?php echo  $row['name']; ?>" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" value="<?php echo  $row['name']; ?>" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Product Price</label>
                    <input type="text" value="<?php echo  $row['name']; ?>" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control bg-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . 'pages/inc/footer.php'; ?>