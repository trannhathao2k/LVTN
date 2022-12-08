<?php 
  include("../config.php");
  include("../autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();
  $MaBS = $_SESSION['bacsi']['id_bs'];

  //table dienthoai:      MaDT,TenDT,GiaGoc,GiaKhuyenMai,TrangThaiKM,TenTTKM,MoTa,SoLuong,DaBan,MaHang
  //table dathang:        MaDH,MaKH,LoiNhan,NgayDH,NgayGH,TrangThaiDH
  //table chitietdathang: MaDHChiTiet,MaDH,MaDT,SoLuong,GiaDonHang
  //table khachhang:      MaKH,HoTenKH,SoDienThoai,Email,Username,Password

  $sql_bs = "SELECT * FROM `bacsi` WHERE `bacsi`.id_bs='$MaBS'";
  $result_bs = mysqli_query($mysqli, $sql_bs);
  $row_bs = mysqli_fetch_array($result_bs);

  if (isset($_GET['dangxuat-bs'])) {
    unset($_SESSION['bacsi']);
    header("location:../index.php");
  } 

  if(!isset($_SESSION['bacsi'])) {
    header("location:../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Xin chào bác sĩ</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/bacsi/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/bacsi/mdb.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bacsi/addons/datatables.min.css">
  <link rel="stylesheet" href="../css/bacsi/addons/datatables-select.min.css">
  <link rel="stylesheet" href="../css/bacsi/style.css">
  <script src="https://kit.fontawesome.com/00537c301f.js" crossorigin="anonymous"></script>
  <!-- Your custom styles (optional) -->
  <style>

  </style>
</head>

<body class="fixed-sn mdb-skin" onload="reset02()">

  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="index-bs.php?route=trangcanhan" class="pl-0"><img src="../img/TQueen-logo-removebg-preview.png"></a>
          </div>
        </li>

        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">

            <!-- Simple link -->
            <li>
              <a href="index-bs.php?route=trangcanhan" class="collapsible-header waves-effect">Trang chủ</a>
            </li>
            <li>
              <a href="index-bs.php?route=khachhang" class="collapsible-header waves-effect">Lịch tái khám của khách hàng</a>
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
        <p>Xin chào bác sĩ <b><?php echo $row_bs['hoten_bs'] ?></b></p>
      </div>

      <!-- Navbar links -->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->
        <li class="nav-item">
          <a href="index-bs.php?dangxuat-bs" class="nav-link">Đăng xuất</a>
        </li>

      </ul>
      <!-- Navbar links -->

    </nav>
    <!-- Navbar -->

  </header>
  <!-- Main Navigation -->

  <main>
    <?php include('./router-bs.php') ?>
  </main>

  <!-- Footer -->
  <footer class="page-footer pt-0 mt-5">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2022 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> Nha khoa TQueen </a>

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
      'd-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').addClass(
      'md-form');
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

    // Time Picker Initialization
    $('#input_starttime').pickatime({
      twelvehour: true
    });
    $('#input_endtime').pickatime({
      // 12 or 24 hour
      twelvehour: false,
      // Light or Dark theme
      darktheme: true
    });

    function reset02() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("reset").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "reset.php", true);
      xmlhttp.send();
    }

    function ketthuc(maphieu) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ketthuc").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ketthucphienlamviec.php?maphieu=" + maphieu, true);
      xmlhttp.send();
    }

  </script>
</body>

</html>
