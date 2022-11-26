<?php
require_once '../../core/config.php';
require_once ROOT_PATH . 'core/conn.php';
require_once ROOT_PATH . 'core/validations.php';
require_once ROOT_PATH . 'controllers/helpers/helper.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // store
    $name = sanetizeInput($_POST['name']);
    $price = sanetizeInput($_POST['price']);
    $category_id = sanetizeInput($_POST['category_id']);
    $description = sanetizeInput($_POST['description']);

    if (requiredInput($name) && !is_numeric($name)) {

        if (
            minInput($name, 3) && maxInput($name, 25)
        ) {

            if (requiredInput($price) && is_numeric($price)) {

                if (requiredInput($description) && !is_numeric($description) && minInput($description, 3)) {


                    $image_name = $_FILES['image']['name'];
                    $temp_name = $_FILES['image']['tmp_name'];

                    $file = $_FILES['image'];

                    $f_error = $file['error'];
                    $f_size = $file['size'];

                    if (
                        $image_name != ''
                    ) {
                        $ext = pathinfo($image_name);
                        $original_name = $ext['filename'];
                        $original_extension = $ext['extension'];

                        $allowed = ["png", "jpg", "jpeg", "gif"];

                        if (in_array($original_extension, $allowed)) {

                            if (
                                $f_error == 0
                            ) {
                                if ($f_size < 5000000) {
                                    $new_name = uniqid("", true) . "." . $original_extension;
                                    $destination = "imgs/" . $new_name;

                                    move_uploaded_file($temp_name, URL . 'assets/uploads/' . $image_name);

                                    $sql = "INSERT INTO `products` (`name`, `price`, `category_id`, `description`, `image`)
                                            VALUES('$name','$price','$category_id','$description','$image_name') ";

                                    $result = insert($sql);
                                    if ($result) {
                                        $_SESSION['success'] = 'Data Inserted Sucessfully';
                                        redirect('pages/products/create.php');
                                    } else {
                                        $_SESSION['error'] = "Error While Instering to Database";
                                        die(mysqli_info($conn));
                                    }

                                    $_SESSION['success'] = "File uploaded Syccessfuly!";
                                    redirect('pages/products/create.php');
                                } else {
                                    $_SESSION['error'] = "File is too Big!";
                                    redirect('pages/products/create.php');
                                }
                            } else {
                                $_SESSION['error'] = "Error!";
                                redirect('pages/products/create.php');
                            }
                        } else {
                            $_SESSION['error'] = 'File not allowed!';
                            redirect('pages/products/create.php');
                        }
                    } else {
                        $_SESSION['error'] = 'Please choose an image!';
                        redirect('pages/products/create.php');
                    }

                } else {
                    $_SESSION['error'] = 'Description is Required! & Must be More than 20 chars';
                    redirect('pages/products/create.php');
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
