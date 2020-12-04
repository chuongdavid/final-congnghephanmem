
<?php

require_once __DIR__. "/../autoload/autoload.php";
if(isset($_SESSION['name_id'])){
    echo "<script>alert('Bạn đã có tài khoản, không thể vào đây!');
    location.href='index.php'</script>";
}
// xử lý
$data = [
    "name" => postInput('name'),
    "email" => postInput('email'),
    "phone" => postInput('phone'),
    "address" => postInput('address'),
    "password" => postInput('password'),
];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($data['name'] == '')
    {
        $error['name'] = " Tên không được để trống !";
    }

    if($data['email'] == '')
    {
        $error['email'] = " Email được để trống !";
    }
    else{
        
    }

    if($data['phone'] == '')
    {
        $error['phone'] = " Phone được để trống !";
    }

    if($data['password'] == '')
    {
        $error['password'] = " Mật khẩu được để trống !";
    }
    else{
        $data['password'] = password_hash(postInput('password'),PASSWORD_DEFAULT);
    }

    if($data['address'] == '')
    {
        $error['address'] = " Địa chỉ không được để trống !";
    }

    //kiểm tra mảng  error

    if(empty($error))
    {   //check email ton tai
        $check_email = $db -> fetchOne('user',"email = '".$data['email']."'");  
        if(count($check_email)>0){
            $_SESSION['error'] = "Email này đã tồn tại!";
        }
        else{
            $insert_user = $db -> insert('user',$data);
            if(count($insert_user)>0){
                $_SESSION['success'] = "Đăng ký thành công. Mời bạn đăng nhập";
                header('Location:dang-nhap.php');
                
            }
            else{
                $_SESSION['error'] = "Đăng ký thất bại";
            }
        }
    }
    else
    {
        $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
    }

}

?>
<?php require_once __DIR__. "/../layouts/header.php";?>
    
    <div class = "col-md-9 bor">

        <section class="box-main1">
            <div class="clearfix" >
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                        </div>
                    <?php endif ?>
            </div>
            <h3 class = "title-main"><a href=""> Đăng ký thành viên </a> </h3>
            <form action="" method="POST" class= "form-horizontal formcustome" role="form" style="margin-top: 20px">

                <div class="form-group">
                    <label class="col-md-2 col-md-offset-1">Tên thành viên</label>
                    <div class= "col-md-8">
                        <input type= " text" name="name" placeholder=" Nguyễn Thiên Ân" class="form-control">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"><?php echo $error['name'] ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class= "form-group">
                    <label class="col-md-2 col-md-offset-1"> Email </label>
                    <div class="col-md-8">
                        <input type="email" name="email" placeholder="annguyen@gmail.com" class="form-control">
                        <?php if(isset($error['email'])): ?>
                            <p class="text-danger"><?php echo $error['email'] ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class= "form-group">
                    <label class="col-md-2 col-md-offset-1"> Mật Khẩu </label>
                    <div class="col-md-8">
                        <input type="password" name="password" placeholder="**********" class="form-control">
                        <?php if(isset($error['password'])): ?>
                            <p class="text-danger"><?php echo $error['password'] ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class= "form-group">
                    <label class="col-md-2 col-md-offset-1"> Số điện thoại </label>
                    <div class="col-md-8">
                        <input type="number" name="phone" placeholder="0909123456" class="form-control">
                        <?php if(isset($error['phone'])): ?>
                            <p class="text-danger"><?php echo $error['phone'] ?></p>
                        <?php endif ?>
                    </div>
                </div>

                <div class= "form-group">
                    <label class="col-md-2 col-md-offset-1"> Địa Chỉ </label>
                    <div class="col-md-8">
                        <input type="text" name="address" placeholder=" Xóm 2 Lan Quế Phường" class="form-control">
                        <?php if(isset($error['address'])): ?>
                            <p class="text-danger"><?php echo $error['address'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <button type="submit" class= "btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">
                Đăng ký</button>
            </form>

            <!--noi dung -->
        
        </section>
    </div> 
<?php require_once __DIR__. "/../layouts/footer.php";?>  