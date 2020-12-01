<?php require_once __DIR__. "/../autoload/autoload.php";
    $error = [];
    $data = [
        "email" => postInput('email'),
        "password" => postInput('password')
      ];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if($data['email'] ==""){
          $error['email'] = "Email không được để trống";
      }
      if($data['password'] ==""){
        $error['password'] = "Mật khẩu không được để trống";
      }
      if(empty($error)){
        $data_user = $db -> fetchOne('user',"email = '".$data['email']."'");  
        if (password_verify($data['password'],$data_user['password'])) {
            $_SESSION['name_user'] = $data_user['name'];
            $_SESSION['name_id'] = $data_user['id'];
            echo "<script>alert(' Đăng nhập thành công ');location.href='index.php'</script>";
        } 
        else {
            $_SESSION['error'] = " Đăng nhập thất bại. Kiểm tra lại mật khẩu hoặc tài khoản của bạn. ";
        }
      }
      
      
      
    }
?>
<?php require_once __DIR__. "/../layouts/header.php";?>
    
    <div class = "col-md-9 bor">
        <section class="box-main1">
            <div class="clearfix" >
                    <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                        </div>
                    <?php endif ?>
            </div>
            <h3 class = "title-main"><a href=""> Đăng nhập</a> </h3>
            <form action="" method="POST" class= "form-horizontal formcustome" role="form" style="margin-top: 20px">

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

                <button type="submit" class= "btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">
                Đăng nhập</button>
            </form>

            <!--noi dung -->
        
        </section>
    </div> 
<?php require_once __DIR__. "/../layouts/footer.php";?>  