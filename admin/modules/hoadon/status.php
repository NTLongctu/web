<?php

    require_once ("../../autoload/autoload.php");
    $id = intval(getInput('id'));
    $statushd = $db->fetchID("hd",$id);
    if(empty($statushd))
    {
        $_SESSION['error'] = "dữ liệu không tồn tại ";
        redirectAdmin('hoadon');
    }
    $status =0;
    if($statushd['status'] == 0)//xác nhận
    {
        $status = 1;
    }
    if($statushd['status'] == 1)// vận chuyển
    {
        $status = 2;
    }
    if($statushd['status'] == 2)// giao hàng
    {
        $status = 3;
    }
    $update = $db->update("hd",array("status" => $status),array("id" => $id));
    if($update>0 && $status==2 )
    {
        $_SESSION['success'] = "Cập nhật trạng thái thành công!";
        $sql = "SELECT * FROM cthd WHERE id_hd = $id ";
        $cthd = $db->fetchsql($sql);
        foreach ($cthd as $item) {
            $idproduct = intval($item['id_product']);
            $product = $db->fetchID("product", $idproduct);
            $number = $product['soluong'] - $item['soluong'];
            $up_date = $db->update("product", array("soluong"=>$number), array("id"=>$idproduct));
        }
        $_SESSION['success'] = "cập nhật trạng thái đơn hàng thành công!";
        redirectAdmin('hoadon');
    }
    else
    {
        $_SESSION['success'] = "Cập nhật trạng thái thất bại!";
        redirectAdmin('hoadon');
    }
?>