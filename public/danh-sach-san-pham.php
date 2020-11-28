<?php require_once __DIR__. "/../autoload/autoload.php";
 $id = intval($_GET['id']);
 $Editcategory = $db -> fetchID('category',$id);
 $product = $db -> fetchAllCondition('product',"category_id = $id");
 
?>
<?php require_once __DIR__. "/../layouts/header.php";?>

                    <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> <?php echo $Editcategory['name'] ?> </a> </h3>
                            
                            <div class="showitem clearfix">
                                <?php foreach($product as $item): ?>
                                    <div class="col-md-3 item-product bor">
                                        <a href="chi-tiet-san-pham.php?id=<?= $item['id'] ?>">
                                            <img src="<?= base_url() ?>public/uploads/product/<?=$item['image'] ?>" class="" width="100%" height="180">
                                        </a>
                                        <div class="info-item">
                                            <a href="chi-tiet-san-pham.php?id=<?= $item['id'] ?>"><?= $item['name'] ?></a>
                                            <p><strike class="sale"><?= formatPrice($item['price']) ?></strike> <b class="price"><?= formatpricesale($item['price'],$item['sale']) ?></b></p>
                                        </div>
                                        <div class="hidenitem">
                                            <p><a href=""><i class="fa fa-search"></i></a></p>
                                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                                            <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <nav class="text-center">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                </nav>
                        </section>

                    </div>
<?php require_once __DIR__. "/../layouts/footer.php";?>