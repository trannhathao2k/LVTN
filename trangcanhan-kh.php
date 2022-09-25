<?php 
  include("./config.php");
  include("./autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();
  $MaKH = $_SESSION['khachhang']['id_kh'];

  //table dienthoai:      MaDT,TenDT,GiaGoc,GiaKhuyenMai,TrangThaiKM,TenTTKM,MoTa,SoLuong,DaBan,MaHang
  //table dathang:        MaDH,MaKH,LoiNhan,NgayDH,NgayGH,TrangThaiDH
  //table chitietdathang: MaDHChiTiet,MaDH,MaDT,SoLuong,GiaDonHang
  //table khachhang:      MaKH,HoTenKH,SoDienThoai,Email,Username,Password

  $sql_kh = "SELECT * FROM `khachhang` WHERE `khachhang`.id_kh='$MaKH'";
  $result = mysqli_query($mysqli, $sql_kh);
  $row_kh = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Trang cá nhân khách hàng</title>
  <!-- Font Awesome  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS  -->
  <link rel="stylesheet" href="./css/dangky/bootstrap.min.css">
  <!-- Material Design Bootstrap  -->
  <link rel="stylesheet" href="./css/dangky/mdb.min.css">
  <!-- DataTables.net  -->
  <link rel="stylesheet" type="text/css" href="./css/dangky/addons/datatables.min.css">
  <link rel="stylesheet" href="./css/dangky/addons/datatables-select.min.css">

  <!-- Your custom styles (optional)  -->
  <style>

  </style>
</head>

<body class="fixed-sn white-skin">

  <!-- Main Navigation  -->
  <header>

    <!-- Sidebar navigation  -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
      <ul class="custom-scrollbar">

        <!-- Logo  -->
        <li class="logo-sn waves-effect py-3">
          <div class="text-center">
            <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
          </div>
        </li>

        <!-- Search Form  -->
        <li>
          <form class="search-form" role="search">
            <div class="md-form mt-0 waves-light">
              <input type="text" class="form-control py-2" placeholder="Search">
            </div>
          </form>
        </li>

        <!-- Side navigation links  -->

        <!-- Side navigation links  -->

      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation  -->

    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar elegant-color-dark">
      <div class="container">
        
        <div class="row">
          <div class="col-md-5">
            <a class="navbar-brand font-weight-bold title" href="./index.php">
              <img src="./img/nha-khoa-ident-logo.png" alt="logo">
            </a>
          </div>
          <div class="col-md-7" style="display: flex; align-items: center;">
            <h3 class="h1-responsive font-weight-bold mt-0 white-text">TRANG CÁ NHÂN</h3>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        
      </div>
    </nav>
    <!-- Navbar  -->

  </header>
  <!-- Main Navigation  -->

  <!-- Main layout  -->
  <main>
    <div class="container-fluid mb-5">

      <!-- Section: Basic examples -->
      <section class="section team-section">
        <div class="row">
          <div class="col-md-8 mb-5" >
            <!-- Gird column -->
            <div class="col-md-12" >

              <div class="card" style="margin-top: 100px;">
                <div class="card-body" >
                  <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                    <colgroup>
                      <col width="10%" span="1">
                      <col width="20%" span="4">
                      <col width="10%" span="1">
                    </colgroup>
                      <thead>
                      <tr>
                        <th>STT
                        </th>
                        <th>Ngày khám bệnh
                        </th>
                        <th>Ngày tái khám
                        </th>
                        <th>Bác sĩ khám
                        </th>
                        <th>Tổng chi phí
                        </th>
                        <th>Xem chi tiết
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2022/9/21</td>
                        <td>2022/9/28</td>
                        <td>Nguyễn Văn A</td>
                        <td>10000000</td>
                        <td>
                          <a class="badge cyan" data-toggle="tooltip" data-placement="right" title="Xem chi tiết">
                            <i class="fas fa-info-circle fa-2x"></i>
                          </a>
                        </td>
                      </tr> 
                      <tr>
                        <td>2</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>
                          <a class="badge cyan" >
                            <i class="fas fa-info-circle fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>
                          <a class="badge cyan" >
                            <i class="fas fa-info-circle fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>
                          <a class="badge cyan" >
                            <i class="fas fa-info-circle fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>
                          <a class="badge cyan" >
                            <i class="fas fa-info-circle fa-2x"></i>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>
                          <a class="badge cyan" >
                            <i class="fas fa-info-circle fa-2x"></i>
                          </a>
                        </td>
                      </tr> 
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- Gird column -->
          </div>

          <!-- Second column -->
          <div class="col-md-4 mb-md-0 mb-5">

            <!-- Card -->
            <div class="card profile-card">

              <!-- Avatar -->
              <div class="avatar z-depth-1-half mb-4">
                <img src="./img/AnhDaiDien/<?php echo $row_kh['anhdaidien_kh'] ?>" class="rounded-circle" alt="Avatar">
              </div>

              <div class="card-body pt-0 mt-0">
                <!-- Name -->
                <div class="text-center">
                  <h3 class="mb-3 font-weight-bold"><strong>
                    <?php
                      echo $row_kh['hoten_kh'];
                    ?>
                  </strong></h3>
                  <h6 class="mb-4"><?php
                    if($row_kh['diemtichluy'] < 100) {
                      echo '<b style="color: #0099CC">Khách hàng mới <i class="fas fa-user-alt"></i></b>';
                    }
                    else if ($row_kh['diemtichluy'] >= 100 && $row_kh['diemtichluy'] < 200 ) {
                      echo '<b style="color: #CC0000">Khách hành thân thiết <i class="fas fa-hands-helping"></i></b>';
                    }
                    else {
                      echo '<b style="color: #FF8800">Khách hàng VIP <i class="fas fa-spa"></i></b>';
                    }
                  ?></h6>
                </div>

                <ul class="striped list-unstyled">
                  <li><strong>Email: </strong><?php echo $row_kh['email_kh'] ?></li>

                  <li><strong>SĐT: </strong> <?php echo $row_kh['sdt_kh'] ?></li>

                  <li><strong>Giới tính: </strong> <?php echo $row_kh['gioitinh_kh'] ?></li>

                  <li><strong>Tuổi: </strong> <?php echo $row_kh['tuoi_kh'] ?></li>

                  <li><strong>Địa chỉ: </strong> <?php echo $row_kh['diachi_kh'] ?></li>
                  <li><strong>Điểm tích lũy: </strong> <?php echo $row_kh['diemtichluy'] ?></li>
                </ul>

                <div class="text-center">
                  <button type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effect waves-light">CHỈNH SỬA TRANG CÁ NHÂN</button>
                </div>

              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Second column -->
        </div>

        

      </section>
      <!-- Section: Basic examples -->

    </div>
  </main>
  <!-- Main layout -->

  <!-- Footer  -->
  <footer class="page-footer pt-0 mt-5">

    <!-- Copyright  -->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2019 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>

      </div>
    </div>
    <!-- Copyright  -->

  </footer>
  <!-- Footer  -->

  <!-- SCRIPTS  -->
  <!-- JQuery  -->
  <script src="./js/dangky/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips  -->
  <script type="text/javascript" src="./js/dangky/popper.min.js"></script>
  <!-- Bootstrap core JavaScript  -->
  <script type="text/javascript" src="./js/dangky/bootstrap.js"></script>
  <!-- MDB core JavaScript  -->
  <script type="text/javascript" src="./js/dangky/mdb.min.js"></script>
  <!-- DataTables  -->
  <script type="text/javascript" src="./js/dangky/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="./js/dangky/addons/datatables-select.min.js"></script>
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

      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'os',
        selector: 'td:first-child'
      }
    });

    $('#dtMaterialDesignExample_wrapper, #dt-material-checkbox_wrapper').find('label').each(function () {
      $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').find(
      'input').each(function () {
      $('input').attr("placeholder", "Search");
      $('input').removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length, #dt-material-checkbox_wrapper .dataTables_length').addClass(
      'd-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter, #dt-material-checkbox_wrapper .dataTables_filter').addClass(
      'md-form');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').removeClass(
      'custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select, #dt-material-checkbox_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select, #dt-material-checkbox_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filte, #dt-material-checkbox_wrapper .dataTables_filterr').find(
      'label').remove();

    // Tooltips Initialization
    $(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });

  </script>
</body>

</html>
