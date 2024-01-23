
<?php 
    require_once("layouts/header.php"); 
    $sql ="SELECT * FROM users WHERE id =".$_SESSION['name_id']." ";
    $user =$db->fetchID("users", $_SESSION['name_id']);
    
    //data là mảng 2 chiều 
?>
                <!--ENDMENUNAV-->
        <div class="col-md-9 ">
            <section class="box-main1">
                <h3 class="title-main" ><a href="">Thông tin cá nhân</a></h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;" >
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Tên:</label>
                        <div class="col-md-8">
                            <p><h4><?php echo $user['name'];?></h4></p>
                           
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1"> Email:</label>
                        <div class="col-md-8">
                            <p><h5><?php echo $user['email'];?></h5></p>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Sô điện thoại liên hệ:</label>
                        <div class="col-md-8">
                            <p><h5><?php echo $user['phone'];?></h5></p>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Địa chỉ:</label>
                        <div class="col-md-8">
                            <p><h5><?php echo $user['address'];?></h5></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Ngày tạo:</label>
                        <div class="col-md-8">
                            <p><h5><?php echo $user['updated_at'];?></h5></p>
                        </div>
                    </div>
                    
                    
                   
                </form>
            </section>

        </div>
    </div>

   
<?php require_once("layouts/footer.php") ?>         
