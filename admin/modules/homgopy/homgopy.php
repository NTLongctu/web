<?php
    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $statushomgopy = $db->fetchID("homgopy",$id);
    
    $status = $statushomgopy['status'] == 0 ? 1 :0;
    $update = $db->update("homgopy",array("status" => $status),array("id" => $id));
    if($update>0)
    {
        
        redirectAdmin('admin');
    }
    
?>