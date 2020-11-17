
<?php 
        require_once __DIR__. "/../../autoload/autoload.php";
        $category = $db -> fetchAll("category");
?>
<?php require_once __DIR__. "/../layouts/header.php"; ?>
                    <!-- Page Heading NOI DUNG CUA TRANG ADMIN -->
                    <h1 class="h3 mb-2 text-gray-800">Xin chào bạn đến với trang quản trị của ADMIN</h1>
                    <!-- DataTales Example -->
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php require_once __DIR__. "/../layouts/footer.php"; ?>
