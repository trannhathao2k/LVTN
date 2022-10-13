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

  if(!$_SESSION['khachhang']) {
    header("location:./index.php");
  }

  if (isset($_GET['dangxuat'])) unset($_SESSION['khachhang']);
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
  <link rel="stylesheet" href="./css/dangky/style.css">
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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background-color: #3e4551;">
      <div class="container">
        
        <div class="row">
          <div class="col-md-5">
            <a class="navbar-brand font-weight-bold title" href="./index.php">
              <img src="./img/TQueen-logo-removebg-preview.png" alt="logo">
            </a>
          </div>
          <div class="col-md-7" style="display: flex; align-items: center;">
            <h3 class="h1-responsive font-weight-bold mt-0 white-text">TRANG CÁ NHÂN</h3>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        </button>

        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php?dangxuat">Đăng xuất</a>
          </li>
        </ul>
        
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
          <div class="col-md-8 mb-5">
              <div class="col-md-12">
                <div class="card mb-4" style="margin-top: 100px;">
                  <div class="card-body">
                    <h5 class="font-weight-bold">LỊCH HẸN KHÁM</h5>
                    <table class="table table-striped" style="border: 1px solid #01579b;">
                      <thead>
                        <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
                          <th class="font-weight-bold">ID</th>
                          <th class="font-weight-bold">Ngày hẹn khám</th>
                          <th class="font-weight-bold">Giờ hẹn khám</th>
                          <th class="font-weight-bold">Bác sĩ đã chọn</th>
                          <th class="font-weight-bold">Lời nhắn</th>
                          <th class="font-weight-bold">Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                            $lichhen = "SELECT * FROM lichhentruoc, bacsi WHERE lichhentruoc.id_bs = bacsi.id_bs AND id_kh = $MaKH";
                            $query_lichhen = mysqli_query($mysqli, $lichhen);
                            $row_lichhen = mysqli_fetch_array($query_lichhen);
                          ?>
                          <td><?php echo $row_lichhen['id_lichhen'] ?></td>
                          <td><?php echo $row_lichhen['ngaydangky'] ?></td>
                          <td><?php echo $row_lichhen['giodangky'] ?></td>
                          <td><?php echo $row_lichhen['hoten_bs'] ?></td>
                          <td><?php echo $row_lichhen['loinhan'] ?></td>
                          <td class="canhgiua">
                            <a class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="modal" data-target="#modal-info-<?php echo $row_ttphieu['maphieu'] ?>" data-placement="right" title="Cập nhật lịch hẹn">
                              <i class="far fa-edit"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            <!-- Gird column -->
            <div class="col-md-12" >

              <div class="card" >
                <div class="card-body" >
                  <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%" style="border: 1px solid #01579b;">
                    <colgroup>
                      <col width="10%" span="1">
                      <col width="20%" span="4">
                      <col width="10%" span="1">
                    </colgroup>
                      <thead>
                      <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
                        <th class="font-weight-bold">Mã phiếu
                        </th>
                        <th class="font-weight-bold">Ngày khám bệnh
                        </th>
                        <th class="font-weight-bold">Bác sĩ khám
                        </th>
                        <th class="font-weight-bold">Nhân viên thu phí
                        </th>
                        <th class="font-weight-bold">Tổng chi phí
                        </th>
                        <th class="font-weight-bold">Xem chi tiết
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $ttphieu = "SELECT * FROM phieukhambenh, bacsi, nhanvien WHERE phieukhambenh.id_bs = bacsi.id_bs AND phieukhambenh.id_nv = nhanvien.id_nv AND phieukhambenh.id_kh = '$MaKH' ORDER BY phieukhambenh.ngaylapphieu  DESC";
                        $query_ttphieu = mysqli_query($mysqli, $ttphieu);
                        while($row_ttphieu = mysqli_fetch_array($query_ttphieu)) {
                          ?>
                            <tr>
                              <td><?php echo $row_ttphieu['maphieu'] ?></td>
                              <td><?php echo $row_ttphieu['ngaylapphieu'] ?></td>
                              <td><?php echo $row_ttphieu['hoten_bs'] ?></td>
                              <td><?php echo $row_ttphieu['hoten_nv'] ?></td>
                              <td class="red-text font-weight-bold"><?php echo number_format($row_ttphieu['tongchiphi'], 0, '','.') ?> VNĐ</td>
                              <td>
                                <a class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="modal" data-target="#modal-info-<?php echo $row_ttphieu['maphieu'] ?>" data-placement="right" title="Xem chi tiết">
                                  <i class="fas fa-arrow-right"></i>
                                </a>
                              </td>
                            </tr>
                          <?php
                        }
                      ?>
                       
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

    // Tooltips Initialization
    $(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });

  </script>
</body>

</html>
