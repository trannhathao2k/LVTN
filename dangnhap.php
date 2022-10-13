<?php
  include("./config.php");
  include("./autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();

  $conn = mysqli_connect("localhost", "root", "", "webnhakhoa") or die ('Không thể kết nối tới database');

  if(isset($_POST["uname"])&&isset($_POST["passwd"])){

    $passwd = $_POST["passwd"];
    $passwd_md5 = md5($passwd);

    $admin = false;
    $uname_admin = $_POST['uname'];
    $passwd_admin = $_POST['passwd'];
    if (($uname_admin == 'admin2410') && ($passwd_admin == '24102000')) {
      $admin = true;
    }
    
    $sql_kh = "select * from khachhang where username_kh = '".$_POST["uname"]."' and password_kh = '$passwd_md5'";
    $kt = mysqli_fetch_all(mysqli_query($conn, $sql_kh), MYSQLI_ASSOC);

    $sql_bs = "select * from bacsi where username_bs = '".$_POST["uname"]."' and password_bs = '$passwd_md5'";
    $kt_bs = mysqli_fetch_all(mysqli_query($conn, $sql_bs), MYSQLI_ASSOC);

    $sql_nv = "select * from nhanvien where username_nv = '".$_POST["uname"]."' and password_nv = '$passwd_md5'";
    $kt_nv = mysqli_fetch_all(mysqli_query($conn, $sql_nv), MYSQLI_ASSOC);
    
    if( is_null($kt) || !isset($kt) || empty($kt)) {
      if(is_null($kt_bs) || !isset($kt_bs) || empty($kt_bs)) {
        if(is_null($kt_nv) || !isset($kt_nv) || empty($kt_nv)) {
          if(!$admin) {
            $_SESSION["err"] = "Tên tài khoản hoặc mật khẩu sai";
          }
          else {
            // $_SESSION["admin"] = true;
            header("location:./admin/index-admin.php");
          }
        }
        else {
          $_SESSION["nhanvien"] = $kt_nv[0];
          header("location:./nhanvien/index-nv.php");
        }
      }
      else {
        $_SESSION["bacsi"] = $kt_bs[0];
        header("location:./bacsi/index-bs.php");
      }
    }
    else{
        $_SESSION["khachhang"] = $kt[0];
        header("location:./index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Đăng nhập - Nha khoa I-Dent</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="./css/dangnhap/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="./css/dangnhap/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/dangnhap/style.css">
  <style>
    html,
    body,
    header,
    .view {
      height: 100vh;
    }
    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 700px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
  </style>
</head>

<body class="login-page">

  <!-- Main Navigation -->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar elegant-color-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <a class="navbar-brand font-weight-bold title" href="./index.php">
              <img src="./img/TQueen-logo-removebg-preview.png" alt="logo">
            </a>
          </div>
          <div class="col-md-7 col-sm-0" style="display: flex; align-items: center;">
            <h3 class="h1-responsive font-weight-bold mt-0 white-text">ĐĂNG NHẬP</h3>
          </div>
        </div>
      
        
      </div>
    </nav>

    <!-- Intro Section -->
    <section class="view intro-2" style="background-image: url(./img/Images/doctor.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <div class="mask rgba-indigo-light h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!-- Form with header -->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">

                  <!-- Header -->
                  <div class="form-header info-color-dark">
                    <h3>
                      <i class="fas fa-user mt-2 mb-2"></i> ĐĂNG NHẬP</h3>
                  </div>

                  <!-- Body -->
                  <form action="" method="POST">
                    <div class="md-form mb-0">
                      <i class="fas fa-user prefix white-text"></i>
                      <input type="text" id="orangeForm-name" name="uname" class="form-control">
                      <label for="orangeForm-name">Tên đăng nhập</label>
                    </div>

                    <div class="md-form mb-0">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input type="password" id="orangeForm-pass" name="passwd" class="form-control">
                      <label for="orangeForm-pass">Mật khẩu</label>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn info-color-dark btn-lg white-text">Đăng nhập</button>
                    </div>
                  </form> 

                  <div class="text-center">

                    <div class="mb-1 wow fadeIn mt-3" >
                      <b style="color: red">
                        <?php if(isset($_SESSION["error"])) {echo $_SESSION["error"]; unset($_SESSION["error"]);} ?> 
                      </b>
                      
                    </div>
                    
                    <!-- <button class="btn info-color-dark btn-lg white-text">Đăng nhập</button> -->
                    <hr>
                    <div class="inline-ul text-center d-flex justify-content-center">
                      <h6 class="text-center white-text mb-5 wow fadeIn">Chưa có tài khoản ?</h6>
                      <a href="./dangky.php"><div class="dangky-button waves-effect waves-light">
                        Đăng ký
                      </div></a>
                    </div>
                  </div>

                </div>
              </div>
              <!-- Form with header -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </header>
  <!-- Main Navigation -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="./js/dangnhap/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="./js/dangnhap/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="./js/dangnhap/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="./js/dangnhap/mdb.min.js"></script>
  <script>
    new WOW().init();
  </script>
</body>

</html>