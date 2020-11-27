
<?php
        require_once __DIR__. "/../../../autoload/autoload.php";
        $open = "product";
        $id = intval(getInput('id'));
        $EditProduct = $db -> fetchID('product',$id);
        if(empty($EditProduct)){
            $_SESSION['error'] = "Không tồn tại sản phẩm";
            redirectAdmin('category');
        }
        $num = $db ->delete("product",$id);
        if($num >0){
            $_SESSION['success'] = ' Xóa thành công ';
            redirectAdmin("product");
        }
        else {
            $_SESSION['error'] = ' Xóa thất bại ';
            redirectAdmin("product");
        }
?>
