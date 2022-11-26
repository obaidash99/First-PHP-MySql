<?php
require_once '../../core/config.php';
require_once ROOT_PATH . 'core/conn.php';


if ($_SERVER['REQUEST_METHOD'] == "GET") {

    // var_dump($_POST);
    // sanitization 

    // validation 


    $id = $_GET['id'];



    $id = $_GET['id'];
    $result = getRow('categories', $id);

    if ($result) {
        $result = deleteRow("categories", $id);
        if ($result) {
            echo "data DELETED successfully";
        } else {
            die("error in inserting to database : " . mysqli_error($conn));
        }
    }
}
