
<?php 
        $open = "product";
        require_once __DIR__. "/../../../autoload/autoload.php";
        $product = $db -> fetchAll("product");
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG CUA TRANG ADMIN -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm
                        <a href="add.php" class="btn btn-success">Thêm mới</a>
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
                        <table class="table table-bordered dataTable table-responsive " id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="STT: activate to sort column descending" style="width: 10px;">STT</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 70px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 15px;">Price</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Sale: activate to sort column ascending" style="width: 31px;">Sale</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 31px;">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending" style="width: 69px;">Content</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending" style="width: 69px;">Quantity</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Condition: activate to sort column ascending" style="width: 69px;">Condition</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending" style="width: 69px;">Location</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Remarkable: activate to sort column ascending" style="width: 69px;">Speacial</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 69px;">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach ($product as $item):?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?php echo $stt?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo $item['price']?></td>
                                    <td><?php echo $item['sale']?></td>
                                    <td><img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['image'] ?>" width="31px" height="50px" alt=""></td>
                                    <td><?php echo $item['content']?></td>
                                    <td><?php echo $item['quantity']?></td>
                                    <td><?php echo $item['how_to_use']?></td>
                                    <td><?php echo $item['location']?></td>
                                    <td><?php echo $item['remarkable_thing']?></td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="edit.php?id=<?php echo $item['id']?>"> <i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn btn-danger btn-xs" href="delete.php?id=<?php echo $item['id']?>"> <i class="fa fa-times"></i> Xóa</a>
                                    </td>
                                </tr>
                            <?php $stt++ ;endforeach ?>
                            
                        </tbody>
                    </table>
                        </div>
                    </div>
                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
