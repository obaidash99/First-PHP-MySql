<?php
require_once '../../core/config.php';
require_once ROOT_PATH . 'core/conn.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // var_dump($_POST);
    // sanitization 

    // validation 

    echo "<pre>";
    print_r($_POST);
    echo "<pre>";

    $image_name =  $_FILES['image']['name'];
    $temp_name =  $_FILES['image']['tmp_name'];

    move_uploaded_file($temp_name, ROOT_PATH . 'assets/uploads/' . $image_name);



    // store 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $sql = "INSERT INTO `products`(`name`,`price`,`category_id`,`description`,`image`)
     VALUES('$name','$price','$category_id','$description','$image_name') ";
    $result = insert($sql);
    if ($result) {
        echo "data inserted successfully";
    } else {
        die("error in inserting to database : " . mysqli_error($conn));
    }
}
