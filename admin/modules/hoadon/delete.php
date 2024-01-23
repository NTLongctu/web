<?php
    $open = "hd";
    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $Edithd = $db->fetchID("hd",$id);
    if(empty(($Edithd)))
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại !";
        redirectAdmin("hd");
    }
    else 
    {
        $id_delete = $db->delete("hd", $id);
            if($id_delete > 0)
            {
                $_SESSION['success'] = "Xóa dữ liệu thành công thành công ";
                redirectAdmin("hoadon");
            }
            else
            {
                //thất bại
                $_SESSION['error'] = "Xóa dữ liệu thất bại ";
                redirectAdmin("hoadon");
            }
    }
?>