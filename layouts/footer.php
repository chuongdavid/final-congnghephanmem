                  
</div>
<div class="container">
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="images/free-shipping.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="images/guaranteed.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="images/deal.png"></a>
                    </div>
                </div>
                <div class="container-pluid">
                <section id="footer">
                    <div class="container">
                        <div class="col-md-3" id="shareicon">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8" id="title-block">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                
                            </div>
                        </div>
                       
                    </div>
                </section>
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-3" id="ft-about">
                                
                                <p>KAC's voucher được thành lập từ năm 2020 với mong muốn mang đến cho khách hàng những deal giảm giá tốt nhất. </p>
                            </div>
                            <div class="col-md-3" id="footer-support">
                                <h3 class="tittle-footer"> Liên hệ</h3>
                                <ul>
                                    <li>
                                        
                                        <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> 68 Lê Văn Sĩ, phường 14, quận Phú Nhuân, Thành phố Hồ Chí Minh </p>
                                        <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0387845823</p>
                                        <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> support@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ft-bottom">
                    <p class="text-center">Tôn Đức Thắng 2020 </p>
                </section>
            </div>
        </div>      
    </div>
            </div>      
        </div>
    <script  src="js/slick.min.js"></script>

    </body>
        
</html>

<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e){
            e.preventDefault();
            $quantity = $(this).parents('tr').find("#quantity").val();
            $key = $(this).attr("data-key");
            $.ajax({
                url: 'cap-nhat-gio-hang.php',
                type: "GET",
                data:{'quantity':$quantity,'key':$key},
                success:function(data){
                    if(data == 1){
                        alert("Cập nhật giỏ hàng thành công");
                        location.href='gio-hang.php';
                    }
                    if(data == 0){
                        alert("Số lượng sản phẩm vượt quá hàng tồn trong kho");
                        location.href='gio-hang.php';
                    }
                }
            });
        })
    })
</script>