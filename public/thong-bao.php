<?php require_once __DIR__. "/../autoload/autoload.php";
    unset($_SESSION['total']);
    unset($_SESSION['cart']);
?>
<?php require_once __DIR__. "/../layouts/header.php"; ?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class= "title-main auto"><a href=""></a>Thông báo thanh toán</h3>
        <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success" >
            <?=$_SESSION['success'];unset($_SESSION['success'])  ?>
        </div>
        <?php endif ?>
        <a href="index.php" class="btn btn-success">Trở về trang chủ</a>
    </section>
    

</div>
<?php require_once __DIR__. "/../layouts/footer.php";?>