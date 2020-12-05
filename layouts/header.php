<?php require_once __DIR__. "/../autoload/autoload.php";

    $category = $db -> fetchAll('category');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>KAC'team</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        
        <script  src="js/jquery-3.2.1.min.js"></script>
        <!-- search-function -->
        <script>
            function search(text) {
            $(document).ready(function () {
                $option = $("#search_option").val();
                if (text.length != 0) {
                    $.ajax({
                url: 'ajax.php',
                type: "GET",
                data:{'option':$option,'text':text},
                success:function(data){
                    $(".search-place").html(data);
                }
            });
                } else {
                $.post("ajax-search-empty.php", { data: text }, function (data) {
                    $(".search-place").html(data);
                });
                }
            });
            }
        </script>
        <script  src="js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>KAC's Voucher</a>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if(isset($_SESSION['name_user'])): ?>
                                            <li>
                                                <a href="" class="text-danger"><i class="fa fa-user"></i> Xin chào:&nbsp <?= $_SESSION['name_user'] ?> <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="">Liên hệ</a></li>
                                                    <li><a href="gio-hang.php">Giỏ hàng</a></li>
                                                    <li><a href="dang-xuat.php">Đăng xuất</a></li>
                                                </ul>
                                            </li>                                   
                                        <?php else: ?>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Login</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-unlock"></i> Sign up</a>
                                            </li>
                                        <?php endif ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control" id="search_option">
                                            <option> Tất cả danh mục</option>
                                            <?php foreach ($category as $item):?>
                                            <option value="<?php echo $item['id']?>"><?php echo $item['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                    <input onkeyup="search(this.value)" type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="images/logo.png">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0387845823</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="about-us.php">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach($category as $item):?>
                                <li>
                                    <a href="danh-sach-san-pham.php?id=<?= $item['id'] ?>"> <?=$item['name']?></a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>