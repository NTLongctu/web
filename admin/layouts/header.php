<?php
  require_once ("../../../libraries/Database.php");
  require_once ("../../../libraries/Function.php");
  $db = new Database ;
  $dem = 0;
  $counthd = $db->fetchAll("hd");
  foreach ($counthd as $key => $value) {
    if($value['status']==0)
    {
      $dem +=1;
    }
  }
  $sql = "SELECT hd.*, users.name as nameuser, users.phone as phoneuser  FROM hd LEFT JOIN users ON users.id = hd.id_user ORDER BY ID DESC";
  $hdcxy= $db->fetchsql($sql);

  $tonghomgopy = 0;
  $chuaxulygopy = 0;
  $idkhachhanh = '';
  $homgpy = $db->fetchAll("homgopy");
  foreach ($homgpy as $item) {
    $tonghomgopy +=1;
    if($item['status']==0)
    {
      $chuaxulygopy +=1;
    }
  }

  $sqlhomgopy = "SELECT homgopy.* ,users.name as nameuser,users.avatar as avataruser FROM homgopy LEFT JOIN  users ON users.id = homgopy.id_user ORDER BY ID DESC";
  $messagesss = $db->fetchsql($sqlhomgopy);
  $sqlthang1 = " SELECT MONTH(ngaylap) as thang ,tongtien FROM hd  ";
  $t = $db->fetchsql($sqlthang1);
  $t1=0;$t2=0;$t3=0;$t4=0;$t5=0;$t6=0;$t7=0;$t8=0;$t9=0;$t10=0;$t11=0;$t12=0;
  foreach ($t as $item) {
      if($item['thang']== 1)
          $t1+=$item['tongtien'];
      if($item['thang']== 2)
          $t2+=$item['tongtien'];
      if($item['thang']== 3)
          $t3+=$item['tongtien'];
      if($item['thang']== 4)
          $t4+=$item['tongtien'];
      if($item['thang']== 5)
          $t4+=$item['tongtien'];
      if($item['thang']== 6)
          $t6+=$item['tongtien'];
      if($item['thang']== 7)
          $t7+=$item['tongtien'];
      if($item['thang']== 8)
          $t8+=$item['tongtien'];
      if($item['thang']== 9)
          $t9+=$item['tongtien'];
      if($item['thang']== 10)
          $t10+=$item['tongtien'];
      if($item['thang']== 11)
          $t11+=$item['tongtien'];
      if($item['thang']== 12)
          $t12+=$item['tongtien'];

  }
  $datamonth = [$t1,$t2,$t3,$t4,$t5,$t6,$t7,$t8,$t9,$t10,$t11,$t12];
 

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang quản trị</title>

  <!-- Custom fonts for this template-->
  <link href="/WebBanSach/public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">-->

  <!-- Custom styles for this template-->
  <link href="/WebBanSach/public/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="i/WebBanSach/admin/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Administrator <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/WebBanSach/admin/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Bảng điều khiển</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Quản lý </span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">mudules:</h6>
            <a class="collapse-item" href="../../modules/category/index.php">Quản lý danh mục</a>
            <a class="collapse-item" href="../../modules/product/index.php">quản lý sản phẩm</a>
          </div>
        </div>
      </li>
    
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Quản lý đơn hàng</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">mudules:</h6>
            <a class="collapse-item" href="../../modules/hoadon/index.php">Xem đơn hàng</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php if($_SESSION['admin_level'] == 1) :?>
      <li class="nav-item">
        <a class="nav-link" href="../../modules/users/index.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Quản lý người dùng</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/WebBanSach/admin/modules/admin/index.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Quản lý nhân viên</span></a>
      </li>
    
      <!-- Heading -->
      <hr class="sidebar-divider d-none d-md-block">
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="/WebBanSach/admin/">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Thống kê</span></a>
      </li>
      <?php endif; ?>
      <!-- Nav Item - Tables -->
      


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo$dem; ?>+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Các đơn hàng chưa xử lý
                </h6>
                <?php foreach ($hdcxy as $item) : ?>
                  <?php if($item['status']==0) :?>
                  <a class="dropdown-item d-flex align-items-center" href="/WebBanSach/admin/modules/hoadon/index.php">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500"><?php echo$item['ngaylap'] ?></div>
                      <span class="font-weight-bold"><?php echo $item['nameuser'] ?></span>
                      <p><?php echo formatPrice($item['tongtien']) ?>đ</p>
                    </div>
                  </a>
                  <?php endif; ?>
                <?php endforeach; ?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo $chuaxulygopy; ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Tin nhắn phản hồi từ khách hàng
                </h6>
                <?php foreach( $messagesss as $item) :?>
                  <?php if( $item['status']==0) :?>
                    <a class="dropdown-item d-flex align-items-center" href="/WebBanSach/admin/modules/contact/status.php?id=<?php echo$item['id'] ?>">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="/WebBanSach/public/admin/img/<?php echo $item['avataruser'] ?>" alt="">
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div class="font-weight-bold">
                        <div class="text-truncate"><?php echo $item['noidung']; ?></div>
                        <div class="small text-gray-500"><?php echo $item['nameuser']; ?> · <?php echo $item['ngay']; ?></div>
                      </div>
                    </a>
                  <?php endif; ?>
                <?php endforeach; ?>
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo$_SESSION['admin_name'] ?></span>
                <img class="img-profile rounded-circle" src="/WebBanSach/public/admin/img/<?php echo $_SESSION['admin_avatar']?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Hồ sơ cá nhân
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cài đặt
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Hoạt động đăng nhập
                </a>
                <!--<a class="dropdown-item" href="/WebBanSach/admin/login.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng nhập
                </a>
                -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/WebBanSach/login/dangxuat.php" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div> 
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


        