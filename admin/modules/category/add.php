
<?php 
        require_once __DIR__. "/../../../autoload/autoload.php";
        $open = "category";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $data = [
                "name" => postInput('name'),
                "slug" => to_slug(postInput('name'))
            ];
            $error = [];
            if(postInput("name")=='')
            {
                $error['name'] = " Mời bạn nhập tên danh mục ";
            }
            if(empty($error)){ //if no error do this
                $isset = $db -> fetchOne('category',"name = '" .$data['name']. "'");
                if(count($isset)>0){ //data bi trùng
                    $_SESSION['error'] = "Tên danh mục đã tồn tại !";
                    redirectAdmin("category");
                }else{
                    $id_insert = $db -> insert("category",$data);
                    if($id_insert>0){
                        $_SESSION['success'] = 'Thêm mới thành công';
                        redirectAdmin("category");
                    }
                    else{
                        $_SESSION['error'] = 'Thêm mới thất bại';
                    }
                }
                
            }
        }
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG CUA TRANG ADMIN -->
                    <h1 class="h3 mb-2 text-gray-800">Thêm mới danh mục</h1>
                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-10">
                            <form method="POST" action="" >
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-8 col-form-label">Tên danh mục</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Vui lòng nhập tên danh mục" name="name">
                                    <?php if(isset($error['name'])): ?>
                                    <p class="text-danger m-2"><?php echo $error['name'] ?></p>
                                    <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>
