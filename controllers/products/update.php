<?php 
require_once '../../core/config.php';
require_once ROOT_PATH.'core/conn.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){

    // var_dump($_POST);
    // sanitization 

    // validation 


    $id = $_GET['id'];
    $row = getRow("categories",$id);


    // store 
    $name = $_POST['name'];
    $sql = "UPDATE `categories` SET `name`='$name' WHERE `id`='$id' ";
    $result = update($sql);
    if($result){
        echo "data UPDATED successfully";
    }else{
        die("error in inserting to database : ".mysqli_error($conn));
    }
    

}