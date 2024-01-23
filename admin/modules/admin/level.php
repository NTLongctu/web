<?php

    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $leveladmin = $db->fetchID("admin",$id);
    if(empty($leveladmin))
    {
        $_SESSION['error'] = "dữ liệu không tồn tại ";
        redirectAdmin('admin');
    }
    $level = $leveladmin['level'] == 0 ? 1 : 0;
    $update = $db->update("admin",array("level" => $level),array("id" => $id));
    if($update>0)
    {
        $_SESSION['success'] = "Cập nhật trạng thái thành công!";
        redirectAdmin('admin');
    }
    else
    {
        $_SESSION['success'] = "Cập nhật trạng thái thất bại!";
        redirectAdmin('admin');
    }
?>