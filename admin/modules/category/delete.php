
<?php
        require_once __DIR__. "/../../../autoload/autoload.php";
        $open = "category";
        $id = intval(getInput('id'));
        $EditCategory = $db -> fetchID('category',$id);
        if(empty($EditCategory)){
            $_SESSION['error'] = "Không tồn tại sản phẩm";
            redirectAdmin('category');
        }
        //kiem tra danh muc xem co san pham chua
        $is_product = $db -> fetchOne('product'," category_id = ".$id." ");
        if($is_product==NULL){
            $num = $db ->delete("category",$id);
            if($num >0){
                $_SESSION['success'] = ' Xóa thành công ';
                redirectAdmin("category");
            }
            else {
                $_SESSION['error'] = ' Xóa thất bại ';
                redirectAdmin("category");
            }
        }
        else{
            $_SESSION['error'] = ' Danh mục có sản phẩm. Bạn không thể xóa ';
            redirectAdmin("category");
        }
?>
