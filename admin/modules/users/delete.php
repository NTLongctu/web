<?php
    $open = "users";
    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $Editadmin = $db->fetchID("users",$id);
    if(empty(($Editadmin)))
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại !";
        redirectAdmin("users");
    }
    else 
    {
        $id_delete = $db->delete("users", $id);
            if($id_delete > 0)
            {
                $_SESSION['success'] = "Xóa dữ liệu thành công thành công ";
                redirectAdmin("users");
            }
            else
            {
                //thất bại
                $_SESSION['error'] = "Xóa dữ liệu thất bại ";
                redirectAdmin("users");
            }
    }
?>