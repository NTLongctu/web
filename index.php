
<?php 
    require_once("layouts/header.php"); 
    //unset($_SESSION['cart']);
    
    

    $sqlcategoryhome = "SELECT * FROM category ";
    $categoryHome = $db->fetchsql($sqlcategoryhome);
    $data = [];
    $cateid='';
    foreach ($categoryHome as $item) {
        $cateid = intval($item['id']);
        $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY ID DESC";
        $productHome = $db->fetchsql($sql);
        $data[$item['name']] = $productHome;
    }
    //data là mảng 2 chiều 
   
?>
                <!--ENDMENUNAV-->


        <div class="col-md-9 bor">
            <section id="slide" class="text-center">
                <img src="public/frontend/images/slide/h5.jpg" class="img-thumbnail">
            </section>

            <section class="box-main1">
                <?php foreach ($data as $key => $value) :?>
                    <h3 class="title-main"><a><?php echo $key ?></a></h3>
                    <div class="showitem clearfix" >
                        <?php foreach($value as $item) :?>
                            <div class="col-md-3 item-product bor">
                                <a href="detail.php?id=<?php echo $item['id'] ?>">
                                    <img src="public/uploads/product/<?php echo$item['thunbar']?>" class="" width="100%" height="180">
                                </a>
                                <div class="info-item">
                                    <a href="detail.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                    <p><strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike>  <b class="price"><?php echo formatPricesale($item['price'],$item['sale']) ?>đ</b>
                                    </p>
                                </div>
                                <div class="hidenitem">
                                    <p><a href="detail.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a>
                                    </p>
                                    <p><a href="thich.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a>
                                    </p>
                                    <p><a href="addcart.php?id= <?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a>
                                    </p>
                                </div>
                            </div>
                            
                        <?php endforeach;?>
                    </div>
                    
                <?php endforeach; ?>
            </section>

        </div>
    </div>

   
<?php require_once("layouts/footer.php") ?>         
