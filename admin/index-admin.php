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
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

  </script>

  <script>
    /*Global settings*/
    Chart.defaults.global.defaultFontColor = '#fff';
    $(function () {
      // var data = {
      //   labels: ["January", "February", "March", "April", "May", "June", "July"],
      //   datasets: [{
      //     label: "My First dataset",
      //     fillColor: "rgba(220,220,220,0.2)",
      //     strokeColor: "rgba(220,220,220,1)",
      //     pointColor: "rgba(220,220,220,1)",
      //     pointStrokeColor: "#fff",
      //     pointHighlightFill: "#fff",
      //     pointHighlightStroke: "rgba(0,0,0,.15)",
      //     data: [65, 59, 80, 81, 56, 55, 40],
      //     backgroundColor: "#4CAF50"
      //   }, {
      //     label: "My Second dataset",
      //     fillColor: "rgba(255,255,255,.25)",
      //     strokeColor: "rgba(255,255,255,.75)",
      //     pointColor: "#fff",
      //     pointStrokeColor: "#fff",
      //     pointHighlightFill: "#fff",
      //     pointHighlightStroke: "rgba(0,0,0,.15)",
      //     data: [28, 48, 40, 19, 56, 27, 60]
      //   }]
      // };

      // var dataOneLine = {
      //   labels: ["January", "February", "March", "April", "May", "June", "July"],
      //   datasets: [{
      //     label: "My First dataset",
      //     fillColor: "rgba(220,220,220,0.2)",
      //     strokeColor: "rgba(220,220,220,1)",
      //     pointColor: "rgba(220,220,220,1)",
      //     pointStrokeColor: "#fff",
      //     pointHighlightFill: "#fff",
      //     pointHighlightStroke: "rgba(0,0,0,.15)",
      //     data: [35, 55, 44, 58, 53, 55, 60],
      //     backgroundColor: "#4CAF50"
      //   }]
      // };

      // var option = {
      //   responsive: true,
      //   // set font color
      //   scaleFontColor: "#fff",
      //   // font family
      //   defaultFontFamily: "'Roboto', sans-serif",
      //   // background grid lines color
      //   scaleGridLineColor: "rgba(255,255,255,.1)",
      //   // hide vertical lines
      //   scaleShowVerticalLines: false,
      // };

      //line
      var ctxL = document.getElementById("sales").getContext('2d');
      var thang12 = 100;
      var text12 = "Thang 12";
      var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
          labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", text12],
          datasets: [{
              label: "My First dataset",
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
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)'
              ],
              borderWidth: 1,
              
              data: [65, 59, 80, 81, 56, 55, 40, 56, 42, 59, 34, thang12]
            },
            {
              label: "My Second dataset",
              fillColor: "rgba(151,187,205,0.2)",
              strokeColor: "rgba(151,187,205,1)",
              pointColor: "rgba(151,187,205,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(151,187,205,1)",
              backgroundColor: [
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)'
              ],
              borderColor: [
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)'
              ],
              borderWidth: 1,
              data: [28, 48, 40, 19, 86, 27, 110, 89, 56, 78, 85, 69]
            },
            {
              label: "My Third dataset",
              fillColor: "rgba(151,187,205,0.2)",
              strokeColor: "rgba(151,187,205,1)",
              pointColor: "rgba(151,187,205,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(151,187,205,1)",
              backgroundColor: [
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(255, 255, 255, 0.2)'
              ],
              borderColor: [
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)'
              ],
              borderWidth: 1,
              data: [58, 56, 89, 45, 95, 75, 69, 36, 78, 64, 48, 78]
            }
          ]
        },
        options: {
          responsive: true
        }
      });

    });

  </script>
</body>

</html>
