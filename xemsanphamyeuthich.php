
<?php 
    require_once("layouts/header.php"); 
    //unset($_SESSION['cart']);
  
    $sql ="SELECT * FROM thich WHERE users_id =".$_SESSION['name_id']." ";
    $spyeuthich =$db->fetchsql($sql);

    $product = $db->fetchAll("product");
    $tacgia = $db->fetchAll("tacgia");
    $nxb = $db->fetchAll("nxb");
    $congty =$db->fetchAll("cotyphathanh");
   
?>
                <!--ENDMENUNAV-->


        <div class="col-md-9 ">
            <section class="box-main1">
                    <h3 class="title-main"><a href=""> Sản phẩm yêu thích</a></h3>
                    
                    <table class="table table">
                        <?php if($spyeuthich>0) : ?>
                        <thead>
                                <tr>
                                    <th >Hình ảnh</th> 
                                    <th>Thông tin sản phẩm</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                        </thead>
                    <?php endif; ?>
                        <tbody >
                            <?php if($spyeuthich>0)  :?>
                                <?php foreach ($spyeuthich as $item) :?>
                                    <?php foreach($product as $value) :?>
                                        <?php if($item['id_product'] == $value['id']): ?>
                                        <tr>
                                            <td width="120px" height="120px" >
                                                <a href="detail.php?id=<?php echo$key;?>"><img src="public/uploads/product/<?php echo$value['thunbar']?>" width="100px" height="120px"> </a>
                                            </td>
                                            <td width="350px">
                                                <a href="detail.php?id=<?php echo$key;?>"><h4><?php echo $value['name'] ?></h4></a>
                                                <p>Tác giả: <i style="color: #1BA8FF">
                                                    <?php foreach($tacgia as$tg):?><?php echo$value['id_tacgia']==$tg['id']?$tg['name']:''?><?php endforeach;?>
                                                </i></p>
                                                <p><h5><?php echo formatPricesale($value['price'],$value['sale']) ?>đ</h5></p>
                                                <p><strike class="sale"><?php echo formatPrice($value['price']) ?> đ </strike> | -<?php echo $value['sale']; ?>%</p>
                                                <pre style="display: block;font-size: 5px;font-family: monospace;white-space: pre;margin: 0px; border: none;background-color: white;">
                                                    
                                                </pre>
                                                
                                            </td>
                                            
                                            <th>
                                                <pre style="display: block;font-size: 5px;font-family: monospace;white-space: pre;margin: 0px; border: none;background-color: white;"></pre>
                                                <p>Nhà xuất bản: <i style="color: #1BA8FF"><?php foreach($nxb as$nb):?><?php echo $value['id_nxb']==$nb['id']?$nb['name']:''?><?php endforeach;?></i></p>
                                                <p>Công ty phát hành: <i style="color: #1BA8FF"><?php foreach($congty as$ty):?><?php echo $value['id_cotyphathanh']==$ty['id']?$ty['name']:''?><?php endforeach;?></i></p></p>
                                                <p>Lược xem:<?php echo$value['view'] ?></p>
                                                <p></p>
                                            </th>
                                            <th></th>
                                        </tr>
                                        
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php else :?>

                                <tr>
                                    <td><img src="/WebBanSach/public/uploads/product/khongcosanpham.png" style="width: 100%"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;"><a href="/WebBanSach/" class="btn btn-warning" >Tiếp tục mua hàng</a></td>
                                </tr>
                            <?php endif; ?>    
                        </tbody>
                    </table>
                    
            </section>

        </div>
    </div>

   
<?php require_once("layouts/footer.php") ?>         
