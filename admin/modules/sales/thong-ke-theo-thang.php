
<?php 
        $open = "sales";
        require_once __DIR__. "/../../../autoload/autoload.php";
        
            if(isset($_POST['month']) && isset($_POST['year'])){
                
                $month = $_POST['month'];
                $year = $_POST['year'];
                $sum_total = 0;
                $all_sale = [];
                $sql = "SELECT orders.*,product.name,transaction.amount FROM `orders`,`product`,`transaction` WHERE (orders.product_id = product.id) AND (transaction.id = orders.transaction_id) AND (orders.created_at BETWEEN '".$year."-".$month."-01'  AND '".$year."-".$month."-31')" ;
                $result = mysqli_query($db->link,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($db->link));
                if( $result)
                {
                    while ($num = mysqli_fetch_assoc($result))
                    {
                        $all_sale[] = $num;
                    }
                }
            }
            else{
                $sum_total = 0;
                $all_sale = [];
                $sql = "SELECT orders.*,product.name,transaction.amount FROM `orders`,`product`,`transaction` WHERE (orders.product_id = product.id) AND (transaction.id = orders.transaction_id)" ;
                    $result = mysqli_query($db->link,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($db->link));
                    if( $result)
                    {
                        while ($num = mysqli_fetch_assoc($result))
                        {
                            $all_sale[] = $num;
                        }
                    }
            }
        
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG CUA TRANG ADMIN -->
                    <h1 class="h3 mb-2 text-gray-800">Doanh thu
                    <a href="thong-ke-theo-thang.php" class="btn btn-success">Thống kê theo tháng</a>
                    <form class="form-group row" action="" method="POST" >
                        <div class="col-sm-2 ml-0">
                            <select class="form-control-sm m-1" name="month" >
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12" selected="selected">Tháng 12</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control-sm m-1" name="year">
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020" selected="selected">2020</option>
                            </select>
                        </div>
                        <button class="btn btn-info btn-sm">Thống kê</button>
                    </form>
                    </h1>
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
                    
                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="STT: activate to sort column descending" style="width: 10px;">STT</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Tên sản phẩm</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 15px;">Số lượng</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Sale: activate to sort column ascending" style="width: 31px;">Tổng giá</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 31px;">Ngày bán</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt = 1; foreach ($all_sale as $item):?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?php echo $stt?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo $item['quantity']?></td>
                                    <td><?php echo formatPrice($item['amount'])?></td>
                                    <td><?php echo $item['created_at']?></td>
                                </tr>
                            <?php $stt++; $sum_total+=$item['amount'] ;endforeach ?>
                            
                        </tbody>
                        <p style="font-weight:bold; font-size:larger;color:red">Tổng doanh thu: <?= formatPrice($sum_total) ?>VND 
                        <?php if(isset($_POST['month']) && isset($_POST['year']) ): ?>
                            trong tháng : <?php echo $_POST['month'] ?> năm : <?php echo $_POST['year'] ?>
                        <?php endif ?>
                        </p>
                    </table>
                        </div>
                    </div>
                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
