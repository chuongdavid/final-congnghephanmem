
<?php 
        require_once __DIR__. "/../../../autoload/autoload.php";
        $open = "product";
        // get database category
        $category = $db -> fetchAll('category');
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $data = [
                    "name" => postInput('name'),
                    "slug" => to_slug(postInput('name')),
                    "price"=> postInput('price'),
                    "sale" => postInput('sale'),
                    "category_id"=> postInput('category_id'),
                    "content" => postInput('content'),
                    "quantity" => postInput('quantity'),
                    "how_to_use"=> postInput('how_to_use'),
                    "remarkable_thing" =>postInput('remarkable_thing'),
                    "location"=>postInput('location')
            ];
            $error = [];
            if(postInput("name")=='')
            {
                $error['name'] = " Mời bạn nhập tên sản phẩm ";
            }
            elseif (postInput("price")=='') {
                $error['price'] = " Mời bạn nhập tên giá sản phẩm ";
            }
            elseif (postInput("sale")=='') {
                $error['sale'] = " Mời bạn nhập % giảm giá ";
            }
            elseif (!isset($_FILES['image'])) {
                $error['image'] = " Mời bạn chọn hình ảnh ";
            }
            elseif (postInput("category_id")=='') {
                $error['category_id'] = " Mời bạn chọn danh mục ";
            }
            elseif (postInput("content")=='') {
                $error['content'] = " Mời bạn nhập nội dung ";
            }
            elseif (postInput("quantity")=='') {
                $error['quantity'] = " Mời bạn nhập số lượng ";
            }
            elseif (postInput("how_to_use")=='') {
                $error['how_to_use'] = " Mời bạn nhập điều kiện sử dụng ";
            }
            elseif (postInput("remarkable_thing")=='') {
                $error['remarkable_thing'] = " Mời bạn nhập điểm nổi bật ";
            }
            elseif (postInput("location")=='') {
                $error['location'] = " Mời bạn nhập địa điểm ";
            }
            else{
                if(empty($error)){ //if no error do this
                    if(isset($_FILES['image'])){
                        $file_name = $_FILES['image']['name'];
                        $file_tmp = $_FILES['image']['tmp_name'];
                        $file_type = $_FILES['image']['type'];
                        $file_error = $_FILES['image']['error'];
                        if($file_error == 0){
                            $part = ROOT ."product/";
                            $data['image'] = $file_name;

                        }
                    }
                    $id_insert = $db -> insert("product",$data);
                    if(count($id_insert)>0){
                        move_uploaded_file($file_tmp,$part.$file_name);
                        $_SESSION['success'] = "Thêm mới thành công";
                        redirectAdmin("product");
                    }
                    else{
                        $_SESSION['error'] = "Thêm mới thất bại";
                    }
                    
                }
            }
        }
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG CUA TRANG ADMIN -->
                    <h1 class="h3 mb-2 text-gray-800">Thêm mới sản phẩm</h1>
                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-10">
                            <form method="POST" action="" enctype="multipart/form-data" >
                                <div class="form-group row">
                                    <label for="inputNameProduct" class="col-sm-8 col-form-label">Danh mục sản phẩm</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-control">
                                            <option value="">--Mời bạn chọn danh mục sản phẩm--</option>
                                            <?php foreach ($category as $item):?>
                                            <option value="<?php echo $item['id']?>"><?php echo $item['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <?php if(isset($error['category'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['category'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNameProduct" class="col-sm-8 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNameProduct" placeholder="Vui lòng nhập tên sản phẩm" name="name">
                                    <?php if(isset($error['name'])): ?>
                                        <p class="text-danger m-2"><?php echo $error['name'] ?></p>
                                    <?php endif ?>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label for="inputPriceProduct" class="col-sm-8 col-form-label">Giá sản phẩm</label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputPriceProduct" placeholder="Vui lòng nhập giá sản phẩm(e.g: 9.000.000)" name="price">
                                    <?php if(isset($error['price'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['price'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSale" class="col-sm-1 col-form-label">Giá sale</label>
                                    <div class="col-sm-3">
                                    <input type="number" class="form-control" id="inputSale" placeholder="e.g: 10%" name="sale" value ="0">
                                    <?php if(isset($error['sale'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['sale'] ?></p>
                                    <?php endif ?>
                                    </div>

                                    <label for="inputImage" class="col-sm-1 col-form-label">Hình ảnh</label>
                                    <div class="col-sm-4">
                                    <input type="file" class="form-control" id="inputImage" name="image">
                                    <?php if(isset($error['image'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['image'] ?></p>
                                    <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContent" class="col-sm-8 col-form-label">Thông tin sản phẩm</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" rows=10 class="form-control" id="inputContent" placeholder="Vui lòng nhập thông tin sản phẩm" name="content"></textarea>
                                    <?php if(isset($error['content'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['content'] ?></p>
                                    <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContent" class="col-sm-8 col-form-label">Số lượng</label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputContent" placeholder="Vui lòng nhập số lượng sản phẩm" name="quantity">
                                    <?php if(isset($error['quantity'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['quantity'] ?></p>
                                    <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContent" class="col-sm-8 col-form-label">Điều kiện sử dụng</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" rows=10 class="form-control" id="inputContent" placeholder="Vui lòng nhập thông tin điều kiện sử dụng" name="how_to_use"></textarea>
                                    <?php if(isset($error['how_to_use'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['how_to_use'] ?></p>
                                    <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContent" class="col-sm-8 col-form-label">Điểm nổi bật</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" rows=10 class="form-control" id="inputContent" placeholder="Vui lòng nhập điểm nổi bật của sản phẩm" name="remarkable_thing"></textarea>
                                    <?php if(isset($error['remarkable_thing'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['remarkable_thing'] ?></p>
                                    <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputContent" class="col-sm-8 col-form-label">Địa điểm </label>
                                    <div class="col-sm-10">
                                    <textarea type="text" rows=10 class="form-control" id="inputContent" placeholder="Vui lòng nhập địa điểm" name="location"></textarea>
                                    <?php if(isset($error['location'])): ?>
                                            <p class="text-danger m-2"><?php echo $error['location'] ?></p>
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
