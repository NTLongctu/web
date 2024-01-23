
<?php 
    require_once("layouts/header.php"); 
    //unset($_SESSION['cart']);
    $user = $db->fetchID("users",intval($_SESSION['name_id']));
    //data là mảng 2 chiều
    /*if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];
        if(postInput('name')=='')
        {
            $error['name'] = "Hãy nhập username!";
        }
        if(postInput('address')=='')
        {
            $error['address'] = "Hãy nhập địa chỉ!";
        }
        if(postInput('Email')=='')
        {
            $error['Email'] = "Hãy nhập email!";
        }
        if(postInput('phone')=='')
        {
            $error['phone'] = "Hãy nhập số điện thoại!";
        }
        if(postInput('address')=='')
        {
            $error['address'] = "Hãy nhập số điện thoại!";
        }
    }*/
?>
        <!--ENDMENUNAV-->
        <div class="col-md-9 ">
            <section class="box-main1">
                <h3 class="title-main" ><a href="">Thanh toán đơn hàng</a></h3>
                <?php if(isset($_SESSION['error'])) : ?>
                  <div class="alert alert-danger alert-dismissable"> 
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $_SESSION['error']; unset($_SESSION['error']); ?> 
                  </div>
                <?php endif; ?>
                <form action="xacnhanthanhtoan.php" method="GET" class="form-horizontal formcustome" role="form" style="margin-top: 20px;" >
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên" value="<?php echo $user['name'];?>" >
                            <?php if(isset($error['name'])) : ?>
                              <div class="alert alert-danger alert-dismissable"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <?php echo $error['name']; unset($error['name']); ?> 
                              </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1"> Email</label>
                        <div class="col-md-8">
                            <input type="text" name="Email" class="form-control" placeholder="Nhập email" value="<?php echo $user['email'];?>" >
                             <?php if(isset($error['Email'])) : ?>
                              <div class="alert alert-danger alert-dismissable"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <?php echo $error['Email']; unset($error['Email']); ?> 
                              </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Phone</label>
                        <div class="col-md-8">
                            <input type="number"  min=0 name="phone" class="form-control" placeholder="Nhập phone" value="<?php echo $user['phone'];?>" >
                            <?php if(isset($error['phone'])) : ?>
                              <div class="alert alert-danger alert-dismissable"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <?php echo $error['phone']; unset($error['phone']); ?> 
                              </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Địa chỉ</label>
                        <div class="col-md-8">
                            <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo $user['address'];?>" >
                            <?php if(isset($error['address'])) : ?>
                              <div class="alert alert-danger alert-dismissable"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <?php echo $error['address']; unset($error['address']); ?> 
                              </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Địa chỉ giao hàng</label>
                        <div class="col-md-8">
                          <input type="text" name="diachinhanhang" class="form-control" placeholder="Nhập địa chỉ nhận hàng" value="<?php echo $user['address'];?>">
                            <?php if(isset($error['diachinhanhang'])) : ?>
                              <div class="alert alert-danger alert-dismissable"> 
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <?php echo $error['diachinhanhang']; unset($error['diachinhanhang']); ?> 
                              </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Ghi chú</label>
                        <div class="col-md-8">
                            <textarea rows="5" cols="96" name="note"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user ">Tiến thành đặt hàng</button>
                    </div>


                    
                </form>
            </section>

        </div>
    </div>

   
<?php require_once("layouts/footer.php") ?>         
