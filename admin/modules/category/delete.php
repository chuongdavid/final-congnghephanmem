
<?php
        require_once __DIR__. "/../../../autoload/autoload.php";
        $open = "category";
        $id = intval(getInput('id'));
        $EditCategory = $db -> fetchID('category',$id);
        if(empty($EditCategory)){
            $_SESSION['error'] = "Không tồn tại sản phẩm";
            redirectAdmin('category');
        }
        $num = $db ->delete("category",$id);
        if($num >0){
            $_SESSION['success'] = ' Xóa thành công ';
            redirectAdmin("category");
        }
        else {
            $_SESSION['error'] = ' Xóa thất bại ';
            redirectAdmin("category");
        }
?>
