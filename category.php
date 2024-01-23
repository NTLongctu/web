<?php
    require_once("layouts/header.php");
    $id = intval(getInput('id'));
    $category = $db->fetchID("category",$id);
    if(isset($_GET['p']))
    {
        $p=$_GET['p'];
    }
    else
    {
        $p=1;
    }
    $sql = "SELECT * FROM product WHERE category_id = $id";
    $total = count($db->fetchsql($sql));
    $product = $db->fetchJones("product",$sql,$total,$p,4,true);
    $sotrang=$product['page'];
    unset($product['page']);
    $path = $_SERVER['SCRIPT_NAME']; 
?>
            <!--ENDMENUNAV-->
                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="public/frontend/images/slide/h5.jpg" class="img-thumbnail">
                        </section>
                        <section class="box-main1">
                            <h3 class="title-main"><a href="category.php?id=<?php echo$product['category_id']; ?>"><?php echo $category["name"] ?></a> </h3>
                            
                            <div class="showitem clearfix">
                                <?php foreach ($product as $item): ?>
                                    <div class="col-md-3 item-product bor">
                                        <a href="detail.php?id=<?php echo$item['id'] ?>">
                                            <img src="public/uploads/product/<?php echo$item['thunbar'] ?>" class="" width="100%" height="190">
                                        </a>
                                        <div class="info-item">
                                            <a href="detail.php?id=<?php echo $item['id'] ?>"><?php echo$item['name'] ?></a>
                                            <p><strike class="sale"><?php echo formatPricesale($item['price'],$item['sale']) ?> đ</strike> <b class="price"><?php echo formatPrice($item['price']) ?>đ</b></p>
                                        </div>
                                        <div class="hidenitem">
                                            <p><a href="detail.php?id=<?php echo$item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                            <p><a href="thich.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></p>
                                            <p><a href="viewcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            <?php for($i = 1; $i<=$sotrang ; $i++) :?>
                                                <li class="<?php isset($_GET['p'])&&$_GET['p']=$i?'activi':''?>"><a href="<?php echo$path?>?id=<?php echo$id?>&&p=<?php echo$i?>"><?php echo$i?></a></li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>      
        </div>
    <?php require_once("layouts/footer.php") ?>  