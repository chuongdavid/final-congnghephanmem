
<?php 
        $open = "category";
        require_once __DIR__. "/../../../autoload/autoload.php";
        $category = $db -> fetchAll("category");
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG CUA TRANG ADMIN -->
                    <h1 class="h3 mb-2 text-gray-800">Danh sách danh mục
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
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 91px;">STT</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 141px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 65px;">Slug</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Created</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 69px;">Action</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 69px;">Home</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach ($category as $item):?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?php echo $stt?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo $item['slug']?></td>
                                    <td><?php echo $item['created_at']?></td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="edit.php?id=<?php echo $item['id']?>"> <i class="fa fa-edit"></i> Sửa</a>
                                        <a class="btn btn-danger btn-xs" href="delete.php?id=<?php echo $item['id']?>"> <i class="fa fa-times"></i> Xóa</a>
                                    </td>
                                    <td>
                                        <a href="home.php?id=<?php echo $item['id']?>" class="btn btn-xs <?php echo $item['home']==1 ? 'btn-info' : 'btn-default' ?>">
                                            <?php echo $item['home']==1 ? 'Hiển thị' : 'Không' ?>
                                        </a>
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
