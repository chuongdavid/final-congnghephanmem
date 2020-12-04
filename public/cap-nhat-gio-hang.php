<?php
    require_once __DIR__. "/../autoload/autoload.php";
    $key = intval(getInput("key"));
    $quantity = intval(getInput("quantity"));
    $key_product = $db -> fetchOne('product',"id = '".$key."'");
    if($key_product['quantity']<$quantity){
        echo 0;
    }
    else{
        $_SESSION['cart'][$key]['quantity'] = $quantity;
        echo 1;
    }
    
?>