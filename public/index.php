<?php require_once __DIR__. "/../autoload/autoload.php";

    $sqlHomecate = "SELECT name , id FROM category WHERE home = 1 ORDER BY updated_at";;
    $CategoryHome = $db -> fetchsql($sqlHomecate);
    $data = [];
    foreach($CategoryHome as $item){
        $cateid = intval($item['id']);

        $sql = "SELECT * FROM product WHERE category_id = $cateid";
        $ProcductHome = $db -> fetchsql($sql);
        $data[$item['name']] = $ProcductHome;
    }

?>
<?php require_once __DIR__. "/../layouts/header.php";?>

                    <div class="col-md-9 bor">
                        <section id="slide" class="text-left" >
                            <img src="<?= base_url() ?>public/images/slide/slide1.jpg" class="img-thumbnail">
                        </section>
                        
                        <section class="box-main1 search-place">
                        <?php foreach($data as $key =>$value):?>
                            <h3 class="title-main " style="text-align: left;"><a href="javascript:void(0)"> <?= $key ?> </a> </h3>
                            
                            <div class="showitem clearfix">
                            <?php foreach($value as $item):?>
                                
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
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div>
                            <?php endforeach ?>  
                            </div>
                            <?php endforeach ?>
                        </section>
                        

                    </div>
<?php require_once __DIR__. "/../layouts/footer.php";?>