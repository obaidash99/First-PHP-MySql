<?php

session_start();

function requiredInput($value)
{
   $str = trim($value);
   if (strlen($str) > 0) {
      return true;
   }
   return false;
}

// sanittize string input
function sanetizeInput($value)
{
   $str = trim($value);
   $str = filter_var($str, FILTER_SANITIZE_STRING);
   return $str;
};

// sanittize email input
function sanetizeEmail($email)
{
   $email = trim($email);
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   return $email;
}

// min number 

function minInput($value, $min)
{
   if (strlen($value) < $min) {
      return false;
   }
   return true;
}

// max number 

function maxInput($value, $max)
{
   if (strlen($value) > $max) {
      return false;
   }
   return true;
}


// validate email

function validEmail($email)
{
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
   };
   return false;
}


// Image validate 
function imgValid($image) {
   // Image Validation
   $image_name = $_FILES['image']['name'];
   $temp_name = $_FILES['image']['tmp_name'];

   $f_type = $file['type'];
   $f_tmp_name = $file['tmp_name'];
   $f_error = $file['error'];
   $f_size = $file['size'];

   if ($image_name != '') {
      $ext = pathinfo($image_name);
      $original_name = $ext['filename'];
      $original_extension = $ext['extension'];

      $allowed = ["png", "jpg", "jpeg", "gif"];

      if (in_array($original_extension, $allowed)) {

         if ($f_error == 0) {
            if ($f_size < 5000000) {
               $new_name = uniqid("", true) . "." . $original_extension;
               $destination = "imgs/" . $new_name;

               move_uploaded_file($temp_name, URL . 'assets/uploads/products/' . $image_name);
               $_SESSION['success'] = "File uploaded Syccessfuly!";
            } else {
               $_SESSION['error'] = "File is too Big!";
            }
         } else {
            $_SESSION['error'] = "Error!";
         }
      } else {
         $_SESSION['error'] = 'File not allowed!';
      }
   } else {
      $_SESSION['error'] = 'Please choose an image!';
   }
}
