<?php

    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $statusadmin = $db->fetchID("admin",$id);
    if(empty($statusadmin))
    {
        $_SESSION['error'] = "dữ liệu không tồn tại ";
        redirectAdmin('admin');
    }
    $status = $statusadmin['status'] == 0 ? 1 : 0;
    $update = $db->update("admin",array("status" => $status),array("id" => $id));
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