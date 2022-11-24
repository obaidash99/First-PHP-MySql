<?php require_once '../../core/config.php' ?>
<?php require_once ROOT_PATH . 'core/conn.php' ?>
<?php

function redirect($path)
{
   header("location:" . URL . $path);
}

function redirectWithWaitTime($path, $time)
{
   header("refresh:$time,url=" . URL . $path);
}
