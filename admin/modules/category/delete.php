<?php
    $open = "category";
    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $Editcategory = $db->fetchID("category",$id);
    if(empty(($Editcategory)))
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại !";
        redirectAdmin("category");
    }
    $is_product = $db->fetchOne("product","category_id = $id")
    if($is_product == NULL)
    {
        $id_delete = $db->delete("category", $id);
        if($id_delete > 0)
        {
            $_SESSION['success'] = "Xóa dữ liệu thành công thành công ";
            redirectAdmin("category");
        }
        else
        {
            //thất bại
            $_SESSION['error'] = "Xóa dữ liệu thất bại ";
            redirectAdmin("category");
        }    
    }
    else
    {
        $_SESSION['error'] = "Danh mục có sản phẩm, bạn không thể xóa! ";
            redirectAdmin("category");
    }
    
?>