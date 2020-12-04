
<?php 
        $open = "sales";
        require_once __DIR__. "/../../../autoload/autoload.php";
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
        
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG CUA TRANG ADMIN -->
                    <h1 class="h3 mb-2 text-gray-800">Doanh thu
                    <a href="thong-ke-theo-ngay.php" class="btn btn-success">Thống kê theo ngày</a>
                    <a href="thong-ke-theo-thang.php" class="btn btn-success">Thống kê theo tháng</a>
                    <a href="thong-ke-theo-nam.php" class="btn btn-success">Thống kê theo năm</a>
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
                        <p style="font-weight:bold; font-size:larger;color:red">Tổng doanh thu: <?= formatPrice($sum_total) ?>VND</p>
                    </table>
                        </div>
                    </div>
                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
