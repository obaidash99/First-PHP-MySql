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
