<?php
    $open = "product";
    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $Editcategory = $db->fetchID("product",$id);
    if(empty(($Editcategory)))
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại !";
        redirectAdmin("product");
    }
    $sqlcheck = "SELECT hd.*,cthd.*  FROM hd , cthd WHERE hd.id = cthd.id_hd ";
    $ischeack = $db->fetchsql($sqlcheck);
    foreach ($ischeack as $key => $value) {
        if($value['id_product'] == $id && ($value['status'] == 0 || $value['status']==1))
        {
           $tong +=1;
        }
    }
    if($tong >0)
    {
        $_SESSION['error'] = " Sản phẩm này có trong giỏ hàng và chưa được xử lý!";
        redirectAdmin("product");
    }
    else
    {
        $id_delete = $db->delete("product", $id);
            if($id_delete > 0)
            {
                $_SESSION['success'] = "Xóa dữ liệu thành công thành công ";
                redirectAdmin("product");
            }
            else
            {
                //thất bại
                $_SESSION['error'] = "Xóa dữ liệu thất bại ";
                redirectAdmin("product");
            }
    }
?>