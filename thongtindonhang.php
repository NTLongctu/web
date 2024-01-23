
<?php 
    require_once("layouts/header.php"); 
    //unset($_SESSION['cart']);
    $user = $db->fetchID("users",$_SESSION['name_id']);
    $sqlhd ="SELECT * FROM hd ORDER BY id DESC ";
    $hd = $db->fetchsql($sqlhd);
    $cthd = $db->fetchAll("cthd");
    $admin = $db->fetchAll("admin");
    $product = $db->fetchAll("product");
    /*$sqlcthd ="SELECT * FROM cthd WHERE id_hd =".$hd['id']." ";
    $cthd = $db->fetchsql($sqlcthd);
    _debug($cthd);*/
    
    //_debug($cthd);
    
    //data là mảng 2 chiều 
   
?>
                <!--ENDMENUNAV-->


         <div class="col-md-9 ">
            <section class="box-main1">
                <h3 class="title-main" ><a href="">Đơn hàng đã đặt</a></h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;" >
                <?php foreach($hd as $item) :?>
                    <?php if($item['id_user']== $_SESSION['name_id']) :?>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1">Mã hóa đơn:</label>
                            <div class="col-md-8">
                                <p><?php echo$item['id'] ?></h4></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1">Khách hàng:</label>
                            <div class="col-md-8">
                                <p><h4><?php echo $user['name'];?></h4></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"> Email</label>
                            <div class="col-md-8">
                                <p><h5><?php echo $user['email'];?></h5></p>
                            </div>   
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1">Sô điện thoại nhận hàng:</label>
                            <div class="col-md-8">
                                <p><h5><?php echo $user['phone'];?></h5></p>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1">Địa chỉ giao hàng:</label>
                            <div class="col-md-8">
                                <p><h5><?php echo $item['diachigiaohang'];?></h5></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1">Ghi chú:</label>
                            <div class="col-md-8">
                                <p><h5><?php echo$item['note']; ?></h5></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1">Thông tin đơn hàng:</label>
                            <?php foreach ($cthd as $value) :?>
                                <?php if($value['id_hd']==$item['id']):?>
                                    <div class="col-md-3">
                                        <p><h5>
                                            <?php foreach($product as $key) :?>
                                                <?php if($key['id']==$value['id_product']):?>
                                                    <?php echo $key['name']; ?>
                                                <?php endif; ?> 
                                            <?php endforeach; ?>       
                                        </h5></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><h5>x<?php echo $value['soluong']; ?></h5></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><h5><?php echo formatPrice($value['dongia']); ?> đ</h5></p>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 col-md-offset-1"></label>
                                <div class="col-md-3">
                                    
                                </div>
                                <div class="col-md-2">
                                    <label >Tổng tiền:</label>
                                </div>
                                <div class="col-md-3">
                                    <p><h5><?php echo formatPrice($item['tongtien'])?> đ</h5></p>
                                </div>
                        </div>
                        <div class="form-group">
                            
                            <label class="col-md-2 col-md-offset-1"></label>
                            <div class="col-md-3">
                                
                            </div>
                            <div class="col-md-2">
                                
                            </div>
                            <div class="col-md-2">
                                <p><h5>
                                    <?php if($item['status']==0):?>
                                       <a href="" class="btn btn-danger btn-user "> <?php echo"Đang chờ xác nhận" ?></a>
                                    <?php elseif($item['status']==1): ?>
                                        <a href="" class="btn btn-primary btn-user "><?php echo"Chờ vận chuyển" ?></a>
                                    <?php elseif($item['status']==2) :?>
                                        <a href="" class="btn btn-info btn-user "><?php echo"Chờ giao hàng" ?></a>
                                        <?php else :?>
                                        <a href="" class="btn btn-info btn-user "><?php echo"Chờ giao hàng" ?></a>
                                    <?php endif; ?>

                                </h5></p>
                            </div>
                        </div>
                        <hr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </form>
            </section>

        </div>
    </div>

   
<?php require_once("layouts/footer.php") ?>         
