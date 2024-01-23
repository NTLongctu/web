<?php 
    require_once ("autoload/autoload.php");
    $thich = $db->fetchAll("thich");

    

?>

<!DOCTYPE html>
<html>

<head>
    <title>PAP TECHNOLOGY: Đồ án tốt nghiệp</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/bootstrap.min.css">

    <script src="<?php echo base_url() ?>/public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>/public/frontend/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css">
    <!--slide-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
    



</head>

<body>
    <div id="wrapper">
        <!---->
        <!--HEADER-->
        <div id="header">
            <div id="header-top">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-6" id="header-text">
                            <a></a><b> </b>
                        </div>
                        <div class="col-md-6">
                            <nav id="header-nav-top">
                                <ul class="list-inline pull-right" id="headermenu">
                                    <?php if(isset($_SESSION['name_user'])) :?>
                                        <li>Xin chào <?php echo $_SESSION['name_user'] ?></li>
                                        <li>
                                            <a href=""><i class="fa fa-user"></i>Tài khoản<i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu">
                                                <li><a href="">Thông tin</a>
                                                </li>
                                                <li><a href="thongtindonhang.php">Đơn hàng</a>
                                                </li>
                                                <li><a href="viewcart.php">Giỏ hàng</a>
                                                </li>
                                                <li><a href="thoat.php">Đăng xuất</a>
                                                </li>

                                            </ul>
                                        </li>
                                        
                                    <?php else : ?>
                                        <li>
                                            <a href="login.php"><i class="fa fa-unlock"></i>Đăng nhập</a>
                                        </li>
                                        <li>
                                            <a href="taotaikhoan.php"><i class="fa fa-unlock"></i>đăng ký</a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row" id="header-main">
                    <div class="col-md-5">
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php">
                            <!--<img src="public/frontend/images/logo-default.png">-->
                            <p><b style="font-size: 24px; color: #00CCFF;">PAP TECHNOLOGY</b></p>
                        </a>
                    </div>
                    <div class="col-md-3" id="header-right">
                        <div class="pull-right">
                            <div class="pull-left">
                                <i class="glyphicon glyphicon-phone-alt"></i>
                            </div>
                            <div class="pull-right">
                                <p id="hotline">HOTLINE</p>
                                <p>0364091563</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END HEADER-->


        <!--MENUNAV-->
        <div id="menunav">
            <div class="container">
                <nav>
                    <div class="home pull-left">
                        <a href="index.php">Trang chủ</a>
                    </div>
                    <!--menu main-->
                    <ul id="menu-main">
                        <li>
                            <a href="index.php">Shop</a>
                        </li>
                        <?php if(isset($_SESSION['name_id'])): ?>
                        <li>
                            <a href="thongtindonhang.php">Đơn hàng</a>
                        </li>
                        <li>
                            <a href="xemsanphamyeuthich.php">Sản phẩm yêu thích</a>
                        </li>
                        <li>
                            <a href="gopy.php">Gửi phản hồi</a>
                        </li>
                        <?php endif; ?>
                        
                    </ul>
                    <!-- end menu main-->

                    <!--Shopping-->
                    <ul class="pull-right" id="main-shopping">
                        <li>
                            <a href="viewcart.php"><i class="fa fa-shopping-basket"></i> Giỏ hàng </a>
                        </li>
                    </ul>
                    <!--end Shopping-->
                </nav>
            </div>
        </div>
        <div id="maincontent">
    <div class="container">
        <div class="col-md-3  fixside">
            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                <ul>
                    <?php foreach($category as $item) :?>
                        <li><a href="category.php?id=<?php echo$item['id'];?>"><?php echo $item['name']; ?></a></li>
                    <?php endforeach;?>
                    
                </ul>
            </div>

            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-th-list"></i>  Sản phẩm mới </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                <?php foreach($productNew as $item) : ?>
                    <li class="clearfix">
                        <a href="detail.php?id=<?php echo$item['id'] ?>">
                            <img src="public/uploads/product/<?php echo $item['thunbar']; ?>" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"><?php echo $item['name'] ?></p>
                                <b class="price">Giảm giá:<?php echo formatPricesale($item['price'],$item['sale']) ?>đ</b>
                                <br>
                                <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?> đ</b>
                                <br>
                                <span class="view">
                                    <i class="fa fa-eye"></i> <?php echo$item['view'] ?> : 
                                    <i class="fa fa-heart-o"></i>
                                    <?php $dem = 0;$idpro =$item['id']; ?>
                                    <?php foreach ($thich as $iemm) {
                                        if($idpro == $iemm['id_product'])
                                        {
                                            $dem++;
                                        }
                                    }?>
                                     
                                    <?php echo$dem; ?>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
                    

                </ul>
                <!-- </marquee> -->
            </div>

            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-th-list"></i>  Sản phẩm nổi bật </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                <?php foreach($productHot as $item) :?>
                    <li class="clearfix">
                        <a href="detail.php?id=<?php echo$item['id'] ?>">
                            <img src="public/uploads/product/<?php echo $item['thunbar']; ?>" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"><?php echo $item['name'] ?></p>
                                <b class="price">Giảm giá:<?php echo formatPricesale($item['price'],$item['sale']) ?> đ</b>
                                <br>
                                <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?>đ</b>
                                <br>
                                <span class="view"><i class="fa fa-eye"></i>  <?php echo$item['view'] ?> : 
                                    <i class="fa fa-heart-o"></i>
                                    <?php $dem1 = 0;$idpro =$item['id']; ?>
                                    <?php foreach ($thich as $iemm) {
                                        if($idpro == $iemm['id_product'])
                                        {
                                            $dem1++;
                                        }
                                    }?>
                                     
                                    <?php echo$dem1; ?>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>

                    

                </ul>
                <!-- </marquee> -->
            </div>
        </div>