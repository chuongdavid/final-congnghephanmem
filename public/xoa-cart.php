<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    $id = intval(getInput('id'));
    unset($_SESSION['cart'][$id]);
    header('Location:gio-hang.php');
    
?>