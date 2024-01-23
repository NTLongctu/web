
<?php 
    require_once("layouts/header.php"); 
    //unset($_SESSION['cart']);
    if(! isset($_SESSION['name_id']))
    {
        echo "<script>alert('Bạn chưa đăng nhập!');location.href='login.php' </script>";
    }
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        $error = [];
        if(postInput('note') == '')
        {
            $error['note'] = " bạn chưa nhập ý kiến phản hồi!";
        }

        if(empty($error))
        {
            $data = [
                'id_user' => $_SESSION['name_id'],
                'noidung' => postInput('note'),
                'ngay' => date('Y/m/d')
            ];

            $insert = $db->insert("homgopy",$data);
            if($insert>0)
            {
                echo "<script>alert('Gửi phản hồi thành công!');location.href='index.php' </script>";
            }
        }
    }
    
    //data là mảng 2 chiều 
?>
                <!--ENDMENUNAV-->
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main" ><a href="">Phản hồi</a></h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;" >
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">Khách hàng:</label>
                        <div class="col-md-8">
                            <p><h4><?php echo $_SESSION['name_user'];?></h4></p>   
                        </div>
                        
                    </div>
                     <div class="form-group">
                        <label class="col-md-2 col-md-offset-1">nội dung:</label>
                        <div class="col-md-8">
                            <!--<input type="text" name=""  size="70" rows="9">-->
                            <textarea rows="5" cols="100" name="note"></textarea>
                            <?php if(isset($error['note'])) : ?>
                            <div class="alert alert-danger alert-dismissable"> 
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $error['note']; unset($error['note']); ?> 
                            </div>
                            <?php endif; ?>
                           
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-1"><button type="submit" class="btn btn-primary btn-user ">Gửi </button></div>
                        <div class="col-md-8"></div>
                    </div>  
                </form>
            </section>

        </div>
    </div>

   
<?php require_once("layouts/footer.php") ?>         
