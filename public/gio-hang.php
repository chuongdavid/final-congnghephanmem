<?php require_once __DIR__. "/../autoload/autoload.php";
    $sum = 0;
    if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0){
        echo "<script>alert('Không có sản phẩm nào trong giỏ hàng');
        location.href='index.php'</script>";
    }  
?>
<?php require_once __DIR__. "/../layouts/header.php";?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class= "title-main auto"><a href=""></a>Giỏ hàng của bạn</h3>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                     <th scope="col">STT</th>
                     <th scope="col">Tên sản phẩm</th>
                     <th scope="col">Hình ảnh</th>
                     <th scope="col" WIDTH="10%">Số lượng</th>
                     <th scope="col">Giá</th>
                     <th scope="col">Tổng tiền</th>
                     <th scope="col" WIDTH="15%">Thao tác </th>
                </tr>
            </thead>
            <tbody>
                <?php $stt=1 ;foreach ($_SESSION['cart'] as $key => $item): ?> 
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><img src="<?php echo base_url()?>public/uploads/product/<?=$item['image'] ?>" alt="" width="80px" height="80px"></td>
                            <td><input type="number" name = 'quantity' value = "<?php echo $item['quantity'] ?>" class="form-control" id='quantity' min = "0" ></td>
                            <td><?php echo formatPrice($item['price']) ?>VND</td>
                            <td><?php echo formatPrice($item['price'] * $item['quantity']) ?>VND</td>
                            <td>
                                <a href="xoa-cart.php?id=<?= $key ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng ?')">Xóa</a>
                                <a href="#" class="btn btn-xs btn-primary updatecart" data-key=<?= $key ?>>Cập nhật</a>

                            </td>
                        </tr>
                <?php $sum +=$item['price'] * $item['quantity']; $_SESSION['tongtien'] =$sum; ?>
                <?php $stt++; endforeach ?>
            </tbody>
        </table>
        <div class="col-md-5 pull-right">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h3>Thông tin đơn hàng</h3>
                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
                            Số tiền
                        </li>
                        <li class="list-group-item">
                            <span class="badge">10%</span>
                            Thuế VAT
                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php echo sale_promotion($_SESSION['tongtien']) ?>%</span>
                            Giảm giá  
                        </li>
                        <li class="list-group-item">
                            <span class="badge"><?php $_SESSION['total'] = ($_SESSION['tongtien'] * 110/100) - ($_SESSION['tongtien'] * sale_promotion($_SESSION['tongtien'])/100) ; echo formatPrice($_SESSION['total']) ?></span>
                            Tổng tiền cần thanh toán
                        </li>
                        <li class="list-group-item">
                            <a href="index.php" class="btn btn-info">Tiếp tục mua hàng</a>
                            <a href="thanh-toan.php" class="btn btn-info">Thanh toán</a>
                        </li>

                    </ul>

        </div> 
    </section>
    

</div>
<?php require_once __DIR__. "/../layouts/footer.php";?>