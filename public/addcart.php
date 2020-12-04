<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    // if(isset($_SESSION['name_id']))
    // {
    //     echo "<script>alert('Bạn chưa có tài khoản, vui lòng đăng nhập');
    //     location.href='index.php'</script>";
    // }
    $id = intval($_GET['id']);
    $product = $db -> fetchID('product',$id);

    if(!isset($_SESSION['cart'][$id]))
    { 
        //insert to gio hang
        $_SESSION['cart'][$id]['name'] = $product['name'];
        $_SESSION['cart'][$id]['image']= $product['image'];
        $_SESSION['cart'][$id]['quantity'] = 1;
        $_SESSION['cart'][$id]['price']=$product['price'] = ((100 - $product['sale'])* $product['price'])/100;

    }
    else 
    {
        //update giỏ hàng
        $_SESSION['cart'][$id]['quantity'] += 1;
    }
    echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công');
        location.href='gio-hang.php'</script>";




?>