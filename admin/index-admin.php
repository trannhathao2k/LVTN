<?php 
  include("../config.php");
  include("../autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();

  //table dienthoai:      MaDT,TenDT,GiaGoc,GiaKhuyenMai,TrangThaiKM,TenTTKM,MoTa,SoLuong,DaBan,MaHang
  //table dathang:        MaDH,MaKH,LoiNhan,NgayDH,NgayGH,TrangThaiDH
  //table chitietdathang: MaDHChiTiet,MaDH,MaDT,SoLuong,GiaDonHang
  //table khachhang:      MaKH,HoTenKH,SoDienThoai,Email,Username,Password

  if (isset($_GET['dangxuat-admin'])) {
    unset($_SESSION['admin']);
    header("location:../index.php");
  } 

  // if(!$_SESSION['admin']) {
  //   header("location:../index.php");
  // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Xin chào admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/dangky/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/dangky/mdb.min.css">
  <link rel="stylesheet" type="text/css" href="../css/dangky/addons/datatables.min.css">
  <link rel="stylesheet" href="../css/dangky/addons/datatables-select.min.css">
  <link rel="stylesheet" href="../css/dangky/style.css">
  <!-- Your custom styles (optional) -->
  <style>

  </style>
</head>

<body class="fixed-sn white-skin">

  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="index-admin.php?route-admin=trangchu" class="pl-0"><img src="../img/nha-khoa-ident-logo.png"></a>
          </div>
        </li>

        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">

            <!-- Simple link -->
            <li>
              <a href="index-admin.php?route-admin=thongtinbacsi" class="collapsible-header waves-effect">Thông tin bác sĩ</a>
            </li>
            <li>
              <a href="#" class="collapsible-header waves-effect">Thông tin nhân viên</a>
            </li>
            <li>
              <a href="#" class="collapsible-header waves-effect">Tài khoản khách hàng</a>
            </li>

          </ul>
        </li>
        <!-- Side navigation links -->

      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>

      <!-- Breadcrumb -->
      <div class="breadcrumb-dn mr-auto">
        <p>Xin chào <b>Admin</b></p>
      </div>

      <!-- Navbar links -->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->
        <li class="nav-item">
          <a href="index-admin.php?dangxuat-admin" class="nav-link">Đăng xuất</a>
        </li>

      </ul>
      <!-- Navbar links -->

    </nav>
    <!-- Navbar -->

  </header>
  <!-- Main Navigation -->

  <?php
    if(isset($_GET['route-admin'])) {
      $route = $_GET['route-admin'];
      if($route == "thembacsi") {
        ?>
          <main style="background-image: url(./img/Images/doctor.jpg);">
            <?php include('./router-admin.php') ?>
          </main>
        <?php
      }
      else {
        ?>
          <main>
            <?php include('./router-admin.php') ?>
          </main>
        <?php
      }
    }
    else {
        ?>
          ?>
            <main>
              <?php include('./router-admin.php') ?>
            </main>
          <?php
    }
  ?>
  

  <!-- Footer -->
  <footer class="page-footer pt-0 mt-5">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2019 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>

      </div>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="../js/dangky/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/dangky/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/dangky/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/dangky/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="../js/dangky/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="../js/dangky/addons/datatables-select.min.js"></script>
  <!-- Custom scripts -->
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    let container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    $('#dtMaterialDesignExample').DataTable();

    $('#dt-material-checkbox').dataTable({
    });

    // $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox_wrapper').find('label').each(function () {
    //   $(this).parent().append($(this).children());
    // });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').find(
      'input').each(function () {
      
      $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length, #dt-material-checkbox_wrapper .dataTables_length').addClass(
      'd-flex flex-row mb-5 mt-0');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').addClass(
      'md-form mt-search');
    // $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').removeClass(
    //   'custom-select custom-select-sm form-control form-control-sm');
    // $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select, #dt-material-checkbox_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox_wrapper .dataTables_filterr').find(
      'label').remove();

      // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });
  </script>
</body>

</html>
