<?php require_once __DIR__. "/../autoload/autoload.php";
    $user = $db -> fetchID('user',intval($_SESSION['name_id']));
    $inform_order = $db -> fetchAllCondition('orders','transaction_id='.intval($_GET['id']).'');
    $transaction = $db -> fetchID('transaction',intval($_GET['id']));
    $delivery_day = time() + 259200;
    $delivery_day = date("Y-m-d",$delivery_day);
    $string_inform = "Khách hàng: " . $user['name'] ."<br>" ."Ngày thanh toán: " . $transaction['created_at']."<br>";
    foreach ($inform_order as $item) {
        $each_product = $db -> fetchID('product',intval($item['product_id']));
        $string_inform = $string_inform . $each_product['name']."  " . ".Mã hóa đơn: " . $transaction['id'] ."<br>"."Thời gian giao hàng dự kiến: ".$delivery_day."<br>" ;
    };
    $check = send_code_voucher($string_inform,$user['email']);
    if($check){

        $_SESSION['success'] = "Đơn hàng của bạn đã được gửi qua mail. Đơn vị giao hàng sẽ liên hệ với bạn sớm nhất!";
        header('Location:thong-bao.php');
    }
    else{
        $_SESSION['error'] = "Thanh toán thất bại";
        header('Location:thong-bao.php');
    }
?>