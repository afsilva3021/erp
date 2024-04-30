<?php 

session_set_cookie_params(['httponly' => true]);

session_start();

session_regenerate_id(true);


if(empty($_SESSION)){
    header("Location: ../index.php");
}