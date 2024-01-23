
<?php 
    require_once("layouts/header.php"); 
    $user = $db->fetchID("users",intval($_SESSION['name_id']));
    $ghichu = getInput('note');

    if(getInput('name')=='')
    {
        $_SESSION['error'] = "Hãy nhập username!";
    }
    if(getInput('address')=='')
    {
        $_SESSION['error'] = "Hãy nhập địa chỉ!";
    }
    if(getInput('Email')=='')
    {
        $_SESSION['error'] = "Hãy nhập email!";
    }
    if(getInput('diachinhanhang')=='')
    {
        $_SESSION['error'] = "Hãy nhập địa chỉ nhận hàng!";
    }
    if(intval(getInput('phone'))=='')
    {
        $_SESSION['error'] = "Hãy nhập số điện thoại!";
    }
    //_debug(getInput('phone'));
    if(isset($_SESSION['error']))
    {
        echo "<script>alert('bạn chưa nhập đủ thông tin!');location.href='thanhtoan.php' </script>";
    }
    else
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $data= [
                "tongtien"       => $_SESSION['tongtien'],
                "id_user"        => $_SESSION['name_id'],
                "diachigiaohang" => getInput('diachinhanhang'),
                "ngaylap"        => date('Y/m/d'),
                "note"           => getInput("note")
            ];

            $idhd = $db->insert("hd",$data);

            if($idhd > 0)
            {
                foreach($_SESSION['cart'] as $key => $value)
                {
                    $thanhtien=$value['qty']*$value['pricesale'];
                    $data2 = [
                        "id_hd" => $idhd,
                        "id_product"=> $key,
                        "soluong"=> $value['qty'],
                        "dongia"=> $value['pricesale'],
                        "thanhtien"=>$thanhtien
                    ];
                    $idcthd = $db->insert("cthd",$data2);
                }
                echo "<script>alert('Lưu thông tin đơn hàng thành công!');location.href='index.php' </script>";
                unset($_SESSION['cart']);
            }
           
        }
    }
    

    
    //data là mảng 2 chiều 
?>
                <!--ENDMENUNAV-->
        <div class="col-md-9 ">
            <section class="box-main1">
                <h3 class="title-main" ><a href="">Xác nhận đơn hàng</a></h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;" >
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Khách hàng:</label>
                        <div class="col-md-8">
                            <p><h4><?php echo $user['name'];?></h4></p>
                           
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1"> Email</label>
                        <div class="col-md-8">
                            <p><h5><?php echo getInput('Email');?></h5></p>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Sô điện thoại liên hệ</label>
                        <div class="col-md-8">
                            <p><h5><?php echo $user['phone'];?></h5></p>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Địa chỉ</label>
                        <div class="col-md-8">
                            <p><h5><?php echo $user['address'];?></h5></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Địa chỉ giao hàng</label>
                        <div class="col-md-8">
                            <p><h5><?php echo getInput('diachinhanhang');?></h5></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Ghi chú</label>
                        <div class="col-md-8">
                            <p><h5><?php echo$ghichu ?></h5></p>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Thông tin đơn hàng</label>
                        <?php foreach ($_SESSION['cart'] as $key => $value) :?>
                            <div class="col-md-3">
                                <p><h5><?php echo $value['name'] ?></h5></p>
                            </div>
                            <div class="col-md-2">
                                <p><h5>x<?php echo $value['qty'] ?></h5></p>
                            </div>
                            <div class="col-md-2">
                                <p><h5><?php echo formatPrice($value['qty'] * $value['pricesale']) ?> đ</h5></p>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="form-group">
                        <hr>
                        <label class="col-md-2 col-md-offset-1">Tổng tiền:</label>
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-2">
                            <p><h5><?php echo formatPrice($_SESSION['tongtien']); ?>đ</h5></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user ">Xác nhận đơn hàng</button>
                    </div>  
                </form>
            </section>

        </div>
    </div>

   
<?php require_once("layouts/footer.php") ?>         
