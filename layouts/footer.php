<?php  ?>

                    
                <div class="container-pluid">
                <section id="footer">
                    <div class="container">
                        <div class="col-md-3" id="shareicon">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8" id="title-block">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                
                            </div>
                        </div>
                       
                    </div>
                </section>
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-4" id="ft-about">
                                
                                
                            </div>
                            
                            <div class="col-md-4 box-footer">
                                <h3 class="tittle-footer">my accout</h3>
                               <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Giới thiệu</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Liên hệ </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Contact </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> My Account</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Giới thiệu</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4" id="footer-support">
                                <h3 class="tittle-footer"> Liên hệ</h3>
                                <ul>
                                    <li>
                                        
                                        <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i>25 Võ Thị Sáu, Đông Xuyên, Long Xuyên, An Giang</p>
                                        <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0364091563</p>
                                        <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i>ntlong_43th@student.agu.edu.vn</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
               
            </div>
        </div>      
    </div>
            </div>      
        </div>
    <script  src="<?php echo base_url() ?>/public/frontend/js/slick.min.js"></script>

    </body>
        
</html>

<script type="text/javascript">
    
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
    

    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e){
            e.preventDefault();
            $qty = $(this).parents("tr").find("#qty").val();
            console.log($qty);
            $key = $(this).attr("data-key");
            $.ajax({
                url:'updatecart.php',
                type: 'GET',
                data: {'qty':$qty,'key':$key},
                success:function(data)
                {
                    if(data==1)
                    {
                        alert(" Cập nhật giỏ hàng thành công ");
                        location.href='viewcart.php';
                    }
                    if(data==2)
                    {
                        alert("không đủ số lượng bạn cần! ");
                        location.href='viewcart.php';
                    }
                }
            });
        })
    }) 

   
   
</script>