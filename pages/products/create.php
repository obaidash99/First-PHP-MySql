<?php require_once '../../core/config.php'; ?>
<?php require_once ROOT_PATH . 'core/conn.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/header.php'; ?>
<?php require_once ROOT_PATH . 'pages/inc/navbar.php'; ?>


<?php $result = selectAll("categories"); ?>


<h1>Add New Product!</h1>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form action="<?php echo URL . "controllers/products/store.php" ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="">Product Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Category Name</label>
                    <select name="category_id" class="form-control">
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Product Price</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Product Decription</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control bg-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once ROOT_PATH . 'pages/inc/footer.php'; ?>