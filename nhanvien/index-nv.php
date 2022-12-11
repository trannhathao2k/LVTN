<?php 
  include("../config.php");
  include("../autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();
  $MaNV = $_SESSION['nhanvien']['id_nv'];

  //table dienthoai:      MaDT,TenDT,GiaGoc,GiaKhuyenMai,TrangThaiKM,TenTTKM,MoTa,SoLuong,DaBan,MaHang
  //table dathang:        MaDH,MaKH,LoiNhan,NgayDH,NgayGH,TrangThaiDH
  //table chitietdathang: MaDHChiTiet,MaDH,MaDT,SoLuong,GiaDonHang
  //table khachhang:      MaKH,HoTenKH,SoDienThoai,Email,Username,Password

  $sql_nv = "SELECT * FROM `nhanvien` WHERE `nhanvien`.id_nv='$MaNV'";
  $result_nv = mysqli_query($mysqli, $sql_nv);
  $row_nv = mysqli_fetch_array($result_nv);

  if (isset($_GET['dangxuat'])) {
    unset($_SESSION['nhanvien']);
    header("location:../index.php");
  } 

  if(!$_SESSION['nhanvien']) {
    header("location:../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Xin chào nhân viên</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/dangky/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/dangky/mdb.min.css">
  <link rel="stylesheet" href="../css/dangky/mdb.css">
  <link rel="stylesheet" type="text/css" href="../css/dangky/addons/datatables.min.css">
  <link rel="stylesheet" href="../css/dangky/addons/datatables-select.min.css">
  <link rel="stylesheet" href="../css/dangky/style.css">
  <link rel="stylesheet" href="../css/dangky/modules/animations-extended.min.css">
  <!-- Your custom styles (optional) -->
  <style>
    .card.card-cascade .view.gradient-card-header {
            padding: 1.1rem 1rem;
        }
    .card.card-cascade .view {
        box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
    }
  </style>
</head>

<body class="fixed-sn mdb-skin">

  <!-- Main Navigation -->
  <header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="index-nv.php?route=trangchu" class="pl-0"><img src="../img/TQueen-logo-removebg-preview.png"></a>
          </div>
        </li>

        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a href="index-nv.php?route=trangchu" class="collapsible-header waves-effect">Danh sách thu phí khách hàng</a>
            </li>
            <li>
              <a href="index-nv.php?route=trangthai" class="collapsible-header waves-effect">Trạng thái bác sĩ</a>
            </li>
          </ul>
        </li>

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
        <p>Xin chào nhân viên <b><?php echo $row_nv['hoten_nv'] ?></b></p>
      </div>

      <!-- Navbar links -->
      <ul class="nav navbar-nav nav-flex-icons ml-auto">

        <!-- Dropdown -->
        <li class="nav-item">
          <a href="index-nv.php?dangxuat" class="nav-link">Đăng xuất</a>
        </li>

      </ul>
      <!-- Navbar links -->

    </nav>
    <!-- Navbar -->

  </header>
  <!-- Main Navigation -->

  <main>
  <?php include('./router-nv.php') ?>
  </main>

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
  <script src="../js/nhanvien/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/nhanvien/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/nhanvien/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/nhanvien/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="../js/nhanvien/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="../js/nhanvien/addons/datatables-select.min.js"></script>
  <!-- Custom scripts -->
  <script>

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
  </script>
  <script>
    // Data Picker Initialization
    $('.datepicker').pickadate();


    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').materialSelect();
    });

  </script>
  <script>
    function xacnhan(maphieu, manv) {
      
      var taiKhoan = document.getElementById(maphieu).value;
      // document.getElementById('test-new').innerHTML = 'Hello';
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("xacnhan").innerHTML =(this.responseText);
        }
      };
      xmlhttp.open("GET", "xacnhanthanhtoan.php?maphieu=" + maphieu + "&manv=" + manv + "&taikhoan=" + taiKhoan, true);
      xmlhttp.send();
    }

    function openPrint(id) {
      windowChild = window.open('./hoadon.php?id=' + id, "windowChild", "width=1500, height=1000");
      location.reload();
      return false;
    }

  </script>
</body>

</html>
