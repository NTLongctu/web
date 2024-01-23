<?php
    $open = "admin";
    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $Editadmin = $db->fetchID("admin",$id);
    if(empty(($Editadmin)))
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại !";
        redirectAdmin("admin");
    }
    else 
    {
        $id_delete = $db->delete("admin", $id);
            if($id_delete > 0)
            {
                $_SESSION['success'] = "Xóa dữ liệu thành công thành công ";
                redirectAdmin("admin");
            }
            else
            {
                //thất bại
                $_SESSION['error'] = "Xóa dữ liệu thất bại ";
                redirectAdmin("admin");
            }
    }
?>