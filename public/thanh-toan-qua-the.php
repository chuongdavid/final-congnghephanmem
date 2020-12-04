<?php require_once __DIR__. "/../autoload/autoload.php";
    $user = $db -> fetchID('user',intval($_SESSION['name_id']));
    $inform_order = $db -> fetchAllCondition('orders','transaction_id='.intval($_GET['id']).'');
    $transaction = $db -> fetchID('transaction',intval($_GET['id']));
    $string_inform = "Khách hàng: " . $user['name'] ."<br>" ."Ngày thanh toán: " . $transaction['created_at']."<br>";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        foreach ($inform_order as $item) {
            $code = uniqid();
            $each_product = $db -> fetchID('product',intval($item['product_id']));
            $string_inform = $string_inform . $each_product['name']."  " . ".Mã voucher: " . $code ."<br>" ;
        };
        $check = send_code_voucher($string_inform,$user['email']);
        if($check){

            $_SESSION['success'] = "Đơn hàng của bạn đã được gửi qua mail";
            header('Location:thong-bao.php');
        }
        else{
            $_SESSION['error'] = "Thanh toán thất bại";
        }
    }
?>
<?php require_once __DIR__. "/../layouts/header.php";?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class= "title-main auto"><a href=""></a>Điền thông tin thẻ</h3>
        <form action="" method="POST" class="form-horizontal formcustom" role="form" style="margin-top: 20px">
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Số thẻ</label>
                <div class="col-md-8">
                    <input type="text" name='id_card' placeholder="9704 1234 5678 9123 012" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Tháng/Năm phát hành</label>
                <div class="col-md-8">
                    <input type="text" name='date' placeholder="12/12" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Tên chủ thẻ</label>
                <div class="col-md-8">
                    <input type="text" name='name' placeholder="NGUYỄN VĂN Z" class="form-control">
                </div>
            </div>
            
            <button class="btn btn-success col-md-2 col-md-offset-5">Xác nhận</button>

        </form>
    </section>
    

</div>
<?php require_once __DIR__. "/../layouts/footer.php";?>