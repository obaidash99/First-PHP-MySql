<?php
require_once '../../core/config.php';
require_once ROOT_PATH . 'core/conn.php';
require_once ROOT_PATH . 'core/validations.php';
require_once ROOT_PATH . 'controllers/helpers/helper.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo "<pre>";
    print_r($_POST);

    $image_name = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp_name, ROOT_PATH . 'assets/uploads/products/' . $image_name);

    // store
    $name = sanetizeInput($_POST['name']);
    $price = sanetizeInput($_POST['price']);
    $category_id = sanetizeInput($_POST['category_id']);
    $description = sanetizeInput($_POST['description']);

    if (requiredInput($name) && !is_numeric($name)) {

        if (minInput($name, 3) && maxInput($name, 25)) {

            if (requiredInput($price) && is_numeric($price)) {

                $sql = "INSERT INTO `products` (`name`, `price`, `category_id`, `description`, `image`)
                    VALUES('$name','$price','$category_id','$description','$image_name') ";

                $result = insert($sql);
                if ($result) {
                    $_SESSION['success'] = 'Data Inserted Sucessfully';
                    redirect('pages/products/index.php');
                } else {
                    $_SESSION['error'] = "Error While Instering to Database";
                    die(mysqli_info($conn));
                }
            } else {
                $_SESSION['error'] = 'You Should Enter a Price';
                redirect('pages/products/create.php');
            }
        } else {
            $_SESSION['error'] = 'Category Name must be between 3 and 25 chars';
            redirect('pages/products/create.php');
        }
    } else {
        $_SESSION['error'] = "Category Name required! / Category Must be a Valid Name";
        redirect('pages/products/create.php');
    }
}
