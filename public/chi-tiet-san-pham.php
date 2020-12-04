<?php require_once __DIR__. "/../autoload/autoload.php";

$id = intval($_GET['id']);
$product = $db -> fetchID('product',$id);
?>
<?php require_once __DIR__. "/../layouts/header.php";?>
<div class="col-md-9 bor">
                        

                        <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="<?php echo base_url()?>public/uploads/product/<?=$product['image'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                
                                <ul class="text-center bor clearfix" id="imgdetail">
                                    <li>
                                        <img src="<?php echo base_url()?>public/uploads/product/<?=$product['image'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url()?>public/uploads/product/<?=$product['image'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url()?>public/uploads/product/<?=$product['image'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url()?>public/uploads/product/<?=$product['image'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    <li><h3> <?php echo $product['name'] ?> </h3></li>
                                    <?php if($product['sale']>0): ?>
                                        <li><p><strike class="sale"><?php echo formatPrice($product['price']) ?> đ</strike> <b class="price"><?php echo formatpricesale($product['price'],$product['sale']) ?> đ</b</li>
                                    <?php else: ?>
                                        <li><b class="price"><?php echo formatpricesale($product['price'],$product['sale']) ?> đ</b</li>
                                    <?php endif ?>
                                    <li><a href="addcart.php?id=<?php echo $product['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></li>
                               </ul>
                            </div>

                        </section>
                        <div class="col-md-12" id="tabdetail">
                            <div class="row">
                                    
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Thông tin chi tiết </a></li>
                                    <li><a data-toggle="tab" href="#menu1">Đặc điểm nổi bật </a></li>
                                    <li><a data-toggle="tab" href="#menu2">Điều kiện sử dụng</a></li>
                                    <li><a data-toggle="tab" href="#menu3">Địa điểm sử dụng</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Thông tin chi tiết</h3><br>
                                        <p><?php echo $product['content'] ?></p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3>Đặc điểm nổi bật</h3>
                                        <p><?php echo $product['remarkable_thing'] ?></p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Điều kiện sử dụng</h3>
                                        <p><?php echo $product['how_to_use'] ?></p>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <h3>Địa điểm sử dụng</h3>
                                        <p><?php echo $product['location'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php require_once __DIR__. "/../layouts/footer.php";?>