<?php require_once __DIR__. "/../autoload/autoload.php";
    $fee_deliver = 0;
    if(!isset($_SESSION['name_user'])){
        echo "<script>alert('Bạn phải đăng nhập mới thanh toán được !');
        location.href='index.php'</script>";
    }
    $user = $db ->fetchID('user',intval($_SESSION['name_id']));
   if($_SERVER['REQUEST_METHOD']=="POST"){
       var_dump($_POST['deliver']);
       $option = $_POST['deliver'];
       if($option=='email_voucher'){
           $fee_deliver = 35000;
           $_SESSION['total'] = $_SESSION['total'] + $fee_deliver;
       }
       $data = 
       [
           'amount' =>$_SESSION['total'],
           'users_id' => $_SESSION['name_id'],
           'note'=> postInput('note')

       ];
       $id_transaction = $db -> insert('transaction',$data);
        if($id_transaction>0){
            foreach($_SESSION['cart'] as $key => $value){
                $data_orders = [
                    'transaction_id' => $id_transaction,
                    'product_id' => $key,
                    'quantity' => $value['quantity'],
                    'price'=> $value['price']
                ];
                $id_insert = $db -> insert('orders',$data_orders);
                // $db -> update('product')
            }

            if($option=='email_voucher'){
                $_SESSION['success'] = "Lưu thông tin đơn hàng thành công !";
                header('Location:thanh-toan-qua-the.php?id='.$id_transaction.'');
            }
            else{
                header('Location:ship-voucher.php?id='.$id_transaction.'');
            }
        }
   }
   
?>
<?php require_once __DIR__. "/../layouts/header.php";?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class= "title-main auto"><a href=""></a>Thanh toán đơn hàng</h3>
        <form action="" method="POST" class="form-horizontal formcustom" role="form" style="margin-top: 20px">
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Tên thành viên</label>
                <div class="col-md-8">
                    <input type="text" readonly="" name='name' placeholder="Tên thành viên" class="form-control" value="<?= $user['name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Email</label>
                <div class="col-md-8">
                    <input type="text" readonly name='email' placeholder="email@gmail.com" class="form-control" value="<?= $user['email'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Số điện thoại</label>
                <div class="col-md-8">
                    <input type="text" readonly name='phone' placeholder="Số điện thoại" class="form-control" value="<?= $user['phone'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Địa chỉ</label>
                <div class="col-md-8">
                    <input type="text" readonly name='location' placeholder="Địa chỉ" class="form-control" value="<?= $user['address'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Số tiền</label>
                <div class="col-md-8">
                    <input type="text" readonly name='location' placeholder="Địa chỉ" class="form-control" value="<?= formatPrice($_SESSION['total']) ?>&nbsp VND">
                </div>
            </div>
            <div class="form-group ">
                <label class="col-md-2 col-md-offset-1">Hình thức giao hàng </label>
                <div class="col-md-8">
                    <label for="female">Giao hàng(Phí ship thêm 35.000 VND)</label>
                    <input type="radio" checked='checked' name='deliver' value="house_voucher">

                    <label for="female">Nhận e-voucher qua email</label>
                    <input type="radio" name='deliver' value="email_voucher">
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-2 col-md-offset-1">Ghi chú</label>
                <div class="col-md-8">
                    <input type="text" name='note' placeholder="Ghi chú cho bên giao hàng" class="form-control">
                </div>
            </div>
            <button class="btn btn-success col-md-2 col-md-offset-5">Xác nhận</button>

        </form>
    </section>
    

</div>
<?php require_once __DIR__. "/../layouts/footer.php";?>