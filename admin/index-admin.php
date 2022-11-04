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
  <link rel="stylesheet" href="../css/dangky/mdb.css">
  <link rel="stylesheet" href="../css/dangky/mdb.min.css">
  <link rel="stylesheet" type="text/css" href="../css/dangky/addons/datatables.min.css">
  <link rel="stylesheet" href="../css/dangky/addons/datatables-select.min.css">
  <link rel="stylesheet" href="../css/dangky/style.css">
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

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="index-admin.php?route-admin=trangchu" class="pl-0"><img src="../img/TQueen-logo-removebg-preview.png"></a>
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
              <a href="index-admin.php?route-admin=thongtinnhanvien" class="collapsible-header waves-effect">Thông tin nhân viên</a>
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


  <main>
    <?php include('./router-admin.php') ?>
  </main>

  <!-- Footer -->
  <footer class="page-footer pt-0 mt-5">

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> ©2022 - Nha khoa Implant TQueen </a>

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
  <!-- <script type="text/javascript" src="./js/uploadimage-bs.js"></script> -->
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
    /*Global settings*/
    Chart.defaults.global.defaultFontColor = '#fff';

      var data = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          fillColor: "rgba(220,220,220,0.2)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(0,0,0,.15)",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: "#4CAF50"
        }, {
          label: "My Second dataset",
          fillColor: "rgba(255,255,255,.25)",
          strokeColor: "rgba(255,255,255,.75)",
          pointColor: "#fff",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(0,0,0,.15)",
          data: [28, 48, 40, 19, 56, 27, 60]
        }]
      };

      var dataOneLine = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          fillColor: "rgba(220,220,220,0.2)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(0,0,0,.15)",
          data: [35, 55, 44, 58, 53, 55, 60],
          backgroundColor: "#4CAF50"
        }]
      };

      var option = {
        responsive: true,
        // set font color
        scaleFontColor: "#fff",
        // font family
        defaultFontFamily: "'Roboto', sans-serif",
        // background grid lines color
        scaleGridLineColor: "rgba(255,255,255,.1)",
        // hide vertical lines
        scaleShowVerticalLines: false,
      };

      

      var ctxL = document.getElementById("sales").getContext('2d');
      var thongKe = [];
      var arrayLabel = [];

      let changeType = document.querySelector('#chonloai');
      let selectDoctor = document.querySelector('#selectDoctor');
      let selectMonth = document.querySelector('#selectMonth');
      let selectYear = document.querySelector('#selectYear');

      function loadPage() {
        var chonLoai = document.getElementById('chonloai').value;
        var thongKeTheo = document.getElementById('thongke').value;
        if (thongKeTheo == "thongKeThang") {
          var thang = document.getElementById('chonThang').value;
          window.location = "./index-admin.php?chonloai=" + chonLoai + "&thongke=" + thongKeTheo + "&thang=" + thang;
        }
        else if (thongKeTheo == "thongKeNam"){
          var nam = document.getElementById('chonNam').value;
          window.location = "./index-admin.php?chonloai=" + chonLoai + "&thongke=" + thongKeTheo + "&nam=" + nam;
        }
        else{
          window.location = "./index-admin.php?chonloai=" + chonLoai + "&thongke=" + thongKeTheo;
        }
      }

      //Sự kiện khi chọn Loại thống kê
      function thongke() {}
      var thongKe = [];
      var arrayLabel = [];
      var chonLoai = document.getElementById('chonloai').value;
      var thongKeTheo = document.getElementById('thongke').value;

      if (chonLoai == "doanhThuBacSi") {
        selectDoctor.style.display = 'block';
      }
      else {
        selectDoctor.style.display = 'none';
      }

      if (thongKeTheo == "thongKeThang") {
        chonThang = document.getElementById('chonThang').value;
      }
      else if (thongKeTheo == "thongKeNam") {
        chonNam = document.getElementById("chonNam").value;
      }

      // if (thongKeTheo == "thongKeThang") {
      //   selectMonth.style.display = 'block';
      //   selectYear.style.display = 'none';
      // }
      // else if (thongKeTheo == "thongKeNam") {
      //   selectMonth.style.display = 'none';
      //   selectYear.style.display = 'block';
      // }
      // else {
      //   selectMonth.style.display = 'none';
      //   selectYear.style.display = 'none';
      // }

      if (chonLoai != "doanhThuBacSi") {
        if (chonLoai == "doanhThu") {
          document.getElementById('donvitinh').innerHTML = "Triệu VNĐ";
          document.getElementById('donvithoigian').innerHTML = "Tháng";
          if(thongKeTheo == "thongKeNam") {       
            nameLabel = 'DOANH THU TRONG NĂM';
            document.getElementById('donvithoigian').innerHTML = "Tháng";   
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");

              if(isset($_GET['nam'])) {
                $year = $_GET['nam'];
              }
              else {
                $year = $yearCurrent;
              }
              for($i = 1; $i <= 12; $i++) {
                $doanhthu = "SELECT SUM(tongchiphi) tongdoanhthu FROM phieukhambenh WHERE MONTH(ngaylapphieu) = $i AND YEAR(ngaylapphieu) = $year";
                $query_doanhthu = mysqli_query($mysqli, $doanhthu);
                $tong_doanhthu = mysqli_fetch_array(($query_doanhthu));
                if($tong_doanhthu == NULL) {
                  $doanhthu_thang = 0;
                }
                else {
                  $doanhthu_thang = round($tong_doanhthu['tongdoanhthu'] / 1000000, 0); 
                }
                ?>
                  thongKe.push(<?php echo $doanhthu_thang ?>);
                <?php 
              }
                ?>
            arrayLabel = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
          }
          else if (thongKeTheo == "thongKeThang") {
            nameLabel = 'DOANH THU TRONG THÁNG';
            document.getElementById('donvithoigian').innerHTML = "Ngày";
            var nameDay = 1;       
            var chonThang = document.getElementById('chonThang').value;
            // document.cookie = "thang=" + Number(chonThang);
            var chonNam = document.getElementById('chonNam').value;

            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              function lastday($month_ld = '', $year_ld = '') {
                if (empty($month_ld)) {
                    $month_ld = date('m');
                }
                if (empty($year_ld)) {
                    $year_ld = date('Y');
                }
                $result = strtotime("{$year_ld}-{$month_ld}-01");
                $result = strtotime('-1 second', strtotime('+1 month', $result));
                return date('d', $result);
              }
              $monthCurrent = date("m");
              $yearCurrent = date("Y");
              $lastday = lastday($monthCurrent,$yearCurrent);

              if(isset($_GET['thang'])) {
                $month = $_GET['thang'];
              }
              else {
                $month = $monthCurrent;
              }          

              for($i = 1; $i <= $lastday; $i++) {
                // $thang = $_COOKIE['thang'];
                $doanhthu = "SELECT SUM(tongchiphi) tongdoanhthu FROM phieukhambenh WHERE DAY(ngaylapphieu) = $i AND MONTH(ngaylapphieu) = $month AND YEAR(ngaylapphieu) = $yearCurrent";
                $query_doanhthu = mysqli_query($mysqli, $doanhthu);
                $tong_doanhthu = mysqli_fetch_array(($query_doanhthu));
                if ($tong_doanhthu == NULL) {
                  $doanhthu_ngay = 0;
                }
                else {
                  $doanhthu_ngay = round($tong_doanhthu['tongdoanhthu'] / 1000000, 0);
                }
                
                ?>
                  thongKe.push(<?php echo $doanhthu_ngay ?>);
                  arrayLabel.push(nameDay);
                  nameDay++;
                  <?php 
              }
            ?>
            
          }
          else if (thongKeTheo == "thongKeTatCa") {
            nameLabel = 'DOANH THU TẤT CẢ';
            document.getElementById('donvithoigian').innerHTML = "Năm";
            yearDay = 2020;
            // yearDay = yearDay - 2;   
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");
              for($i = ($yearCurrent - 2); $i <= ($yearCurrent + 2); $i++) {
                $doanhthu = "SELECT SUM(tongchiphi) tongdoanhthu FROM phieukhambenh WHERE YEAR(ngaylapphieu) = $i";
                $query_doanhthu = mysqli_query($mysqli, $doanhthu);
                $tong_doanhthu = mysqli_fetch_array(($query_doanhthu));
                if ($tong_doanhthu == NULL) {
                  $doanhthu_nam = 0;
                }
                else {
                  $doanhthu_nam = round($tong_doanhthu['tongdoanhthu'] / 1000000, 0);
                }
                
                ?>
                  thongKe.push(<?php echo $doanhthu_nam ?>);
                  arrayLabel.push(yearDay);
                  yearDay++;
                <?php 
              }
                ?>
          }
        }
        else if (chonLoai == "khachHang") {
          document.getElementById('donvitinh').innerHTML = "Khách hàng";
          document.getElementById('donvithoigian').innerHTML = "Tháng";
          if(thongKeTheo == "thongKeNam") {       
            nameLabel = 'KHÁCH HÀNG TRONG NĂM';
            document.getElementById('donvithoigian').innerHTML = "Tháng";   
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");

              if(isset($_GET['nam'])) {
                $year = $_GET['nam'];
              }
              else {
                $year = $yearCurrent;
              }
              for($i = 1; $i <= 12; $i++) {
                $khachhang = "SELECT COUNT(maphieu) tongkhachhang FROM phieukhambenh WHERE MONTH(ngaylapphieu) = $i AND YEAR(ngaylapphieu) = $year";
                $query_khachhang = mysqli_query($mysqli, $khachhang);
                $tong_khachhang = mysqli_fetch_array(($query_khachhang));
                ?>
                  thongKe.push(<?php echo $tong_khachhang['tongkhachhang'] ?>);
                <?php 
              }
                ?>
            arrayLabel = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
          }
          else if (thongKeTheo == "thongKeThang") {
            nameLabel = 'KHÁCH HÀNG TRONG THÁNG';
            document.getElementById('donvithoigian').innerHTML = "Ngày";
            var nameDay = 1;       
            var chonThang = document.getElementById('chonThang').value;
            // document.cookie = "thang=" + Number(chonThang);
            var chonNam = document.getElementById('chonNam').value;
            
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              function lastday02($month_ld = '', $year_ld = '') {
                if (empty($month_ld)) {
                    $month_ld = date('m');
                }
                if (empty($year_ld)) {
                    $year_ld = date('Y');
                }
                $result = strtotime("{$year_ld}-{$month_ld}-01");
                $result = strtotime('-1 second', strtotime('+1 month', $result));
                return date('d', $result);
              }
              $monthCurrent = date("m");
              $yearCurrent = date("Y");

              if(isset($_GET['thang'])) {
                $month = $_GET['thang'];
              }
              else {
                $month = $monthCurrent;
              }
              $lastday = lastday02($monthCurrent,$yearCurrent);
              for($i = 1; $i <= $lastday; $i++) {
                // $thang = $_COOKIE['thang'];
                $khachhang = "SELECT COUNT(maphieu) tongkhachhang FROM phieukhambenh WHERE DAY(ngaylapphieu) = $i AND MONTH(ngaylapphieu) = $month AND YEAR(ngaylapphieu) = $yearCurrent";
                $query_khachhang = mysqli_query($mysqli, $khachhang);
                $tong_khachhang = mysqli_fetch_array(($query_khachhang));
                ?>
                  thongKe.push(<?php echo $tong_khachhang['tongkhachhang'] ?>);
                  arrayLabel.push(nameDay);
                  nameDay++;
                  <?php 
              }
            ?>
          }
          else if (thongKeTheo == "thongKeTatCa") {
            nameLabel = 'DOANH THU THEO NĂM';
            document.getElementById('donvithoigian').innerHTML = "Năm";
            yearDay = 2020;
            // yearDay = yearDay - 2;   
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");
              for($i = ($yearCurrent - 2); $i <= ($yearCurrent + 2); $i++) {
                $khachhang = "SELECT COUNT(maphieu) tongkhachhang FROM phieukhambenh WHERE YEAR(ngaylapphieu) = $i";
                $query_khachhang = mysqli_query($mysqli, $khachhang);
                $tong_khachhang = mysqli_fetch_array(($query_khachhang));
                ?>
                  thongKe.push(<?php echo $tong_khachhang['tongkhachhang'] ?>);
                  arrayLabel.push(yearDay);
                  yearDay++;
                <?php 
              }
                ?>
          }
        }
        else if (chonLoai == "taiKhoanMoi") {
          document.getElementById('donvitinh').innerHTML = "Tài khoản";
          document.getElementById('donvithoigian').innerHTML = "Tháng";
          if(thongKeTheo == "thongKeNam") {       
            nameLabel = 'TÀI KHOẢN TRONG NĂM';
            document.getElementById('donvithoigian').innerHTML = "Tháng";   
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");

              if(isset($_GET['nam'])) {
                $year = $_GET['nam'];
              }
              else {
                $year = $yearCurrent;
              }
              for($i = 1; $i <= 12; $i++) {
                $taikhoan = "SELECT COUNT(id_kh) tongtaikhoan FROM khachhang WHERE MONTH(ngaytao_taikhoan) = $i AND YEAR(ngaytao_taikhoan) = $year";
                $query_taikhoan = mysqli_query($mysqli, $taikhoan);
                $tong_taikhoan = mysqli_fetch_array(($query_taikhoan));
                ?>
                  thongKe.push(<?php echo $tong_taikhoan['tongtaikhoan'] ?>);
                <?php 
              }
                ?>
            arrayLabel = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
          }
          else if (thongKeTheo == "thongKeThang") {
            document.getElementById('donvithoigian').innerHTML = "Ngày";
            nameLabel = 'TÀI KHOẢN THEO NGÀY';
            var nameDay = 1;       
            var chonThang = document.getElementById('chonThang').value;
            // document.cookie = "thang=" + Number(chonThang);
            var chonNam = document.getElementById('chonNam').value;
            
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              function lastday03($month_ld = '', $year_ld = '') {
                if (empty($month_ld)) {
                    $month_ld = date('m');
                }
                if (empty($year_ld)) {
                    $year_ld = date('Y');
                }
                $result = strtotime("{$year_ld}-{$month_ld}-01");
                $result = strtotime('-1 second', strtotime('+1 month', $result));
                return date('d', $result);
              }
              $monthCurrent = date("m");
              $yearCurrent = date("Y");

              if(isset($_GET['thang'])) {
                $month = $_GET['thang'];
              }
              else {
                $month = $monthCurrent;
              }
              $lastday = lastday03($monthCurrent,$yearCurrent);
              for($i = 1; $i <= $lastday; $i++) {
                // $thang = $_COOKIE['thang'];
                $taikhoan = "SELECT COUNT(id_kh) tongtaikhoan FROM khachhang WHERE DAY(ngaytao_taikhoan) = $i AND MONTH(ngaytao_taikhoan) = $month AND YEAR(ngaytao_taikhoan) = $yearCurrent";
                $query_taikhoan = mysqli_query($mysqli, $taikhoan);
                $tong_taikhoan = mysqli_fetch_array(($query_taikhoan));
                ?>
                  thongKe.push(<?php echo $tong_taikhoan['tongtaikhoan'] ?>);
                  arrayLabel.push(nameDay);
                  nameDay++;
                  <?php 
              }
            ?>
          }
          else if (thongKeTheo == "thongKeTatCa") {
            nameLabel = 'DOANH THU THEO NĂM';
            document.getElementById('donvithoigian').innerHTML = "Năm";
            yearDay = 2020;
            // yearDay = yearDay - 2;   
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");
              for($i = ($yearCurrent - 2); $i <= ($yearCurrent + 2); $i++) {
                $taikhoan = "SELECT COUNT(id_kh) tongtaikhoan FROM khachhang WHERE YEAR(ngaytao_taikhoan) = $i";
                $query_taikhoan = mysqli_query($mysqli, $taikhoan);
                $tong_taikhoan = mysqli_fetch_array(($query_taikhoan));
                ?>
                  thongKe.push(<?php echo $tong_taikhoan['tongtaikhoan'] ?>);
                  arrayLabel.push(yearDay);
                  yearDay++;
                <?php 
              }
                ?>
          }
        }
        else if (chonLoai == "luotTruyCap") {
          document.getElementById('donvitinh').innerHTML = "Lượt truy cập";
          document.getElementById('donvithoigian').innerHTML = "Tháng";
          if(thongKeTheo == "thongKeNam") {       
            nameLabel = 'LƯỢT TRUY CẬP TRONG NĂM';
            document.getElementById('donvithoigian').innerHTML = "Tháng";

            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");

              if(isset($_GET['nam'])) {
                $year = $_GET['nam'];
              }
              else {
                $year = $yearCurrent;
              }
              for($i = 1; $i <= 12; $i++) {
                $luottruycap = "SELECT SUM(soluot_truycap) luottruycap FROM luottruycap WHERE MONTH(ngay_truycap) = $i AND YEAR(ngay_truycap) = $year";
                $query_luottruycap = mysqli_query($mysqli, $luottruycap);
                $tong_luottruycap = mysqli_fetch_array(($query_luottruycap));
                if($tong_luottruycap['luottruycap'] == NULL) {
                  $tongTruyCap = 0;
                }
                else {
                  $tongTruyCap = $tong_luottruycap['luottruycap'];
                }
                ?>
                  thongKe.push(<?php echo $tongTruyCap ?>);
                <?php 
              }
                ?>
            arrayLabel = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
          }
          else if (thongKeTheo == "thongKeThang") {
            document.getElementById('donvithoigian').innerHTML = "Ngày";
            nameLabel = 'TÀI KHOẢN THEO NGÀY';
            var nameDay = 1;       
            
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              function lastday04($month_ld = '', $year_ld = '') {
                if (empty($month_ld)) {
                    $month_ld = date('m');
                }
                if (empty($year_ld)) {
                    $year_ld = date('Y');
                }
                $result = strtotime("{$year_ld}-{$month_ld}-01");
                $result = strtotime('-1 second', strtotime('+1 month', $result));
                return date('d', $result);
              }
              $monthCurrent = date("m");
              $yearCurrent = date("Y");

              if(isset($_GET['thang'])) {
                $month = $_GET['thang'];
              }
              else {
                $month = $monthCurrent;
              }
              $lastday = lastday04($month,$yearCurrent);
              for($i = 1; $i <= $lastday; $i++) {
                $day = $i * 1;
                $sql_luottruycap = "SELECT * FROM luottruycap WHERE ngay_truycap = '$yearCurrent-$month-$day'";
                $query_luottruycap = mysqli_query($mysqli, $sql_luottruycap);
                if(mysqli_num_rows($query_luottruycap) != 0) {
                  $luottruycap = mysqli_fetch_array($query_luottruycap);
                  $soluottruycap = $luottruycap['soluot_truycap'];
                }
                else {
                  $soluottruycap = 0;
                }
                
                ?>
                  thongKe.push(<?php echo $soluottruycap ?>);
                  arrayLabel.push(nameDay);
                  nameDay++;
                  <?php 
              }
            ?>
          }
          else if (thongKeTheo == "thongKeTatCa") {
            nameLabel = 'TẤT CẢ LƯỢT TRUY CẬP';
            document.getElementById('donvithoigian').innerHTML = "Năm";
            yearDay = 2020;
            // yearDay = yearDay - 2;   
            <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $yearCurrent = date("Y");
              for($i = ($yearCurrent - 2); $i <= ($yearCurrent + 2); $i++) {
                $luottruycap = "SELECT SUM(soluot_truycap) luottruycap FROM luottruycap WHERE YEAR(ngay_truycap) = $i";
                $query_luottruycap = mysqli_query($mysqli, $luottruycap);
                $tong_luottruycap = mysqli_fetch_array(($query_luottruycap));
                if($tong_luottruycap['luottruycap'] == NULL) {
                  $tong_luottruycap['luottruycap'] = 0;
                }
                ?>
                  thongKe.push(<?php echo $tong_luottruycap['luottruycap'] ?>);
                  arrayLabel.push(yearDay);
                  yearDay++;
                <?php 
              }
                ?>
          }
        }

        var thongke02 = [];
        var thongke03 = [];
        var thongke04 = [];
        var thongke05 = [];
        var thongke06 = [];
        for (var i = 0; i < 12; i++) {
          thongke02.push(Math.round(Math.random() * 1400));
          thongke03.push(Math.round(Math.random() * 1400));
          thongke04.push(Math.round(Math.random() * 1400));
          thongke05.push(Math.round(Math.random() * 1400));
          thongke06.push(Math.round(Math.random() * 1400));
        }
          

        var myLineChart = new Chart(ctxL, {
          type: 'line',
          data: {
            labels: arrayLabel,
            datasets: [<?php
              ?>{
                label: nameLabel,
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                backgroundColor: [
                  'rgba(255, 255, 255, 0.2)',
                  'rgba(255, 255, 255, 0.2)',
                  'rgba(255, 255, 255, 0.2)',
                  'rgba(255, 255, 255, 0.2)',
                  'rgba(255, 255, 255, 0.2)',
                  'rgba(255, 255, 255, 0.2)'
                  
                ],
                borderColor: [
                  'rgba(255, 0, 102, 1)',
                  'rgba(255, 0, 102, 1)',
                  'rgba(255, 0, 102, 1)',
                  'rgba(255, 0, 102, 1)',
                  'rgba(255, 0, 102, 1)',
                  'rgba(255, 0, 102, 1)'
                ],
                borderWidth: 1,
                
                data: thongKe
              }
              // {
              //   label: "TEST-DSBACSI-NHAKHOA 02",
              //   fillColor: "rgba(220,220,220,0.2)",
              //   strokeColor: "rgba(220,220,220,1)",
              //   pointColor: "rgba(220,220,220,1)",
              //   pointStrokeColor: "#fff",
              //   pointHighlightFill: "#fff",
              //   pointHighlightStroke: "rgba(220,220,220,1)",
              //   backgroundColor: [
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)'
              //   ],
              //   borderColor: [
              //     'rgba(102, 255, 51, 1)',
              //     'rgba(102, 255, 51, 1)',
              //     'rgba(102, 255, 51, 1)',
              //     'rgba(102, 255, 51, 1)',
              //     'rgba(102, 255, 51, 1)',
              //     'rgba(102, 255, 51, 1)'
              //   ],
              //   borderWidth: 1,
                
              //   data: [1200, 856, 123, 489, 415, 367, 1120, 985, 578, 698, 330, 780]
              // },
              // {
              //   label: "TEST-DSBACSI-NHAKHOA 03",
              //   fillColor: "rgba(220,220,220,0.2)",
              //   strokeColor: "rgba(220,220,220,1)",
              //   pointColor: "rgba(220,220,220,1)",
              //   pointStrokeColor: "#fff",
              //   pointHighlightFill: "#fff",
              //   pointHighlightStroke: "rgba(220,220,220,1)",
              //   backgroundColor: [
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)'
              //   ],
              //   borderColor: [
              //     'rgba(255, 255, 0, 1)',
              //     'rgba(255, 255, 0, 1)',
              //     'rgba(255, 255, 0, 1)',
              //     'rgba(255, 255, 0, 1)',
              //     'rgba(255, 255, 0, 1)',
              //     'rgba(255, 255, 0, 1)'
              //   ],
              //   borderWidth: 1,
                
              //   data: thongke02
              // },
              // {
              //   label: "TEST-DSBACSI-NHAKHOA 04",
              //   fillColor: "rgba(220,220,220,0.2)",
              //   strokeColor: "rgba(220,220,220,1)",
              //   pointColor: "rgba(220,220,220,1)",
              //   pointStrokeColor: "#fff",
              //   pointHighlightFill: "#fff",
              //   pointHighlightStroke: "rgba(220,220,220,1)",
              //   backgroundColor: [
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)'
              //   ],
              //   borderColor: [
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)'
              //   ],
              //   borderWidth: 1,
                
              //   data: thongke03
              // },
              // {
              //   label: "TEST-DSBACSI-NHAKHOA 05",
              //   fillColor: "rgba(220,220,220,0.2)",
              //   strokeColor: "rgba(220,220,220,1)",
              //   pointColor: "rgba(220,220,220,1)",
              //   pointStrokeColor: "#fff",
              //   pointHighlightFill: "#fff",
              //   pointHighlightStroke: "rgba(220,220,220,1)",
              //   backgroundColor: [
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)'
              //   ],
              //   borderColor: [
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)'
              //   ],
              //   borderWidth: 1,
                
              //   data: thongke04
              // },
              // {
              //   label: "TEST-DSBACSI-NHAKHOA 06",
              //   fillColor: "rgba(220,220,220,0.2)",
              //   strokeColor: "rgba(220,220,220,1)",
              //   pointColor: "rgba(220,220,220,1)",
              //   pointStrokeColor: "#fff",
              //   pointHighlightFill: "#fff",
              //   pointHighlightStroke: "rgba(220,220,220,1)",
              //   backgroundColor: [
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)'
              //   ],
              //   borderColor: [
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)'
              //   ],
              //   borderWidth: 1,
                
              //   data: thongke05
              // },
              // {
              //   label: "TEST-DSBACSI-NHAKHOA 07",
              //   fillColor: "rgba(220,220,220,0.2)",
              //   strokeColor: "rgba(220,220,220,1)",
              //   pointColor: "rgba(220,220,220,1)",
              //   pointStrokeColor: "#fff",
              //   pointHighlightFill: "#fff",
              //   pointHighlightStroke: "rgba(220,220,220,1)",
              //   backgroundColor: [
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)',
              //     'rgba(255, 255, 255, 0.2)'
              //   ],
              //   borderColor: [
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)',
              //     'rgba(255, 153, 0, 1)'
              //   ],
              //   borderWidth: 1,
                
              //   data: thongke06
              // }
            ]
          },
          options: {
            responsive: true
          }
        });
      }
      else {
        document.getElementById('donvitinh').innerHTML = "Triệu VNĐ";
        document.getElementById('donvithoigian').innerHTML = "Tháng";

        function them(idbs) {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("doanhthuthang1").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
          };
          xmlhttp.open("GET", "./thongke/thongke.php?idbs=" + idbs, true);
          xmlhttp.send();
        }

        $sql_mabs = "SELECT * FROM temp_dsbacsi";
        $sql_doanhthubs = "SELECT * FROM phieukhambenh, ";
      };
      //Kết thúc sự kiện chọn loại thống kê

  </script>
</body>

</html>
