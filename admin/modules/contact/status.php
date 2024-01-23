<?php

    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $statushd = $db->fetchID("homgopy",$id);
    
    $status =$statushd['status']==0 ? 1 : 0;
    
    $update = $db->update("homgopy",array("status" => $status),array("id" => $id));
    if($update>0)
    {
        $_SESSION['success'] = "Cập nhật trạng thái thành công!";
        header("Location:/WebBanSach/admin");
    }
    else
    {
        $_SESSION['success'] = "Cập nhật trạng thái thất bại!";
        header("Location:/WebBanSach/admin");
    }
?>