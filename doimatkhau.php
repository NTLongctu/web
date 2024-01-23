<?php
  require_once ("autoload/autoload.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/frontend/css/bootstrap.min.css">

    <script src="<?php echo base_url() ?>/public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>/public/frontend/js/bootstrap.min.js"></script>
    <!---->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css" />
    <!--slide-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">

</head>

<body class="bg-gradient-primary">
  <form action="" class="needs-validation" method="POST" enctype="multipart/form-data">
    <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Đổi mật khẩu</h1>
                </div>
                <form class="user">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="user Name">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                    </div>
                  </div>
                  <a href="login.html" class="btn btn-primary btn-user btn-block">
                    Register Account
                  </a>
                  <hr>
                  <a href="index.html" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Register with Google
                  </a>
                  <a href="index.html" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                  </a>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="login.html">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!-- Bootstrap core JavaScript-->
  <script src="/WebBanSach/public/admin/vendor/jquery/jquery.min.js"></script>
  <script src="/WebBanSach/public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/WebBanSach/public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/WebBanSach/public/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/WebBanSach/public/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/WebBanSach/public/admin/js/demo/chart-area-demo.js"></script>
  <script src="/WebBanSach/public/admin/js/demo/chart-pie-demo.js"></script>


</body>

</html>
