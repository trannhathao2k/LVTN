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
  <link rel="stylesheet" href="./css/khachhang/bootstrap.min.css">
  <!-- Material Design Bootstrap  -->
  <link rel="stylesheet" href="./css/dangky/mdb.min.css">
  <link rel="stylesheet" href="./css/khachhang/style.css">
  <link rel="stylesheet" href="./css/khachhang/modules/animations-extended.min.css">

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
                            
                            if (mysqli_num_rows($query_lichhen) == 0) {
                              ?><td colspan="6">Bạn chưa đặt lịch hẹn trước</td><?php
                            }
                            else {
                              $row_lichhen = mysqli_fetch_array($query_lichhen);
                          ?>
                            <td><?php echo $row_lichhen['id_lichhen'] ?></td>
                            <td><?php echo $row_lichhen['ngaydangky'] ?></td>
                            <td><?php echo $row_lichhen['giodangky'] ?></td>
                            <td><?php echo $row_lichhen['hoten_bs'] ?></td>
                            <td><?php echo $row_lichhen['loinhan'] ?></td>
                            <td class="canhgiua">
                              <a class="badge cyan canhgiua" style="width: 25px; height: 25px" href="./index.php#datlich" data-placement="right" title="Cập nhật lịch hẹn">
                                <i class="far fa-edit"></i>
                              </a>
                            </td>
                          <?php } ?>
                        </tr>
                      </tbody>
                    </table>
                    <div class="mt-3" id="capnhat02"></div>                            
                  </div>
                </div>
                
              </div>
              <!-- <div class="col-md-12">
                
              </div> -->

            <!-- Gird column -->
            <div class="col-md-12">
              <div class="card">            
                <div class="card-body">                
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
                                <div class="modal fade modal-ext" id="modal-info-<?php echo $row_ttphieu['maphieu'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                              aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <!--Content-->
                                    <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 py-3" id="myModalLabel">THÔNG TIN CHI TIẾT</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!--Body-->
                                    <div class="modal-body text-center" style="font-size: 14px;">
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: left;">
                                                <p><b>Tên khách hàng: </b> <?php echo $row_ttphieu['tenkhachhang'] ?></p>
                                            </div>
                                            <div class="col-md-6">
                                              <p><b>Bác sĩ phụ trách: </b> <?php echo $row_ttphieu['hoten_bs'] ?></p>
                                            </div>                                 
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <?php
                                              $maphieu = $row_ttphieu['maphieu'];
                                              $ds_dichvu = "SELECT * FROM dichvuduocchidinh, dichvu, phieukhambenh WHERE dichvuduocchidinh.id_dichvu = dichvu.id_dichvu AND dichvuduocchidinh.maphieu = phieukhambenh.maphieu AND dichvuduocchidinh.maphieu = '$maphieu'";
                                              $query_ds = mysqli_query($mysqli, $ds_dichvu);
                                            ?>
                                            <h6 class="title mb-3 font-weight-bold">Danh sách dịch vụ:</h6>
                                            <ul class="striped list-unstyled waves-effect" style="background-color: #b9f6ca">
                                              <?php
                                                while($row_ds = mysqli_fetch_array($query_ds)) {
                                                  ?>
                                                    <li style="font-size: 14px;"><?php echo $row_ds['ten_dichvu'] ?> - <?php echo $row_ds['soluong']?> <?php echo $row_ds['donvitinh'] ?> - <b class="red-text"><?php echo number_format($row_ds['phihientai_dichvu'] * $row_ds['soluong'], 0, '', '.')?> VNĐ</b></li>
                                                  <?php
                                                }
                                              ?>
                                            </ul>
                                            <h6 class="title mb-3 font-weight-bold" style="text-align: end;">Tổng phí: <b class="red-text"><?php
                                              $tongphi = "SELECT * FROM phieukhambenh WHERE maphieu = '$maphieu'";
                                              $query_tong = mysqli_query($mysqli, $tongphi);
                                              $row_tongchiphi = mysqli_fetch_array($query_tong);
                                              echo number_format($row_tongchiphi['tongchiphi'], 0, '', '.');
                                            ?> VNĐ</b></h6>
                                            <h6 class="title mb-3 font-weight-bold" style="text-align: end;">Phí được giảm: <b class="red-text"><?php
                                                if ($row_ttphieu['id_kh'] != NULL) {
                                                  $sql_khachhang = "SELECT * FROM khachhang WHERE id_kh = $MaKH";
                                                  $query_khachhang = mysqli_query($mysqli, $sql_khachhang);
                                                  $row_khachhang = mysqli_fetch_array($query_khachhang);

                                                  if ($row_khachhang['diemtichluy'] < 1000) {
                                                    echo "0 VNĐ";
                                                    $giamgia = 0;
                                                  }
                                                  else if ($row_khachhang['diemtichluy'] >= 1000 && $row_khachhang['diemtichluy'] < 3000) {
                                                    $giamgia = $row_tongchiphi['tongchiphi'] * 0.05;
                                                    echo number_format($giamgia, 0, '', '.')." VNĐ";
                                                  }
                                                  else {
                                                    $giamgia = $row_tongchiphi['tongchiphi'] * 0.1;
                                                    echo number_format($giamgia, 0, '', '.')." VNĐ";
                                                  }
                                                }    
                                            ?>
                                            </b></h6>
                                            <h5 class="title mb-3 font-weight-bold" style="text-align: end;">THÀNH TIỀN: <b class="red-text"><?php
                                              echo number_format($row_tongchiphi['tongchiphi'] - $giamgia, 0, '', '.')." VNĐ";
                                            ?></b></h5>
                                            
                                          </div>                                         
                                        </div>
                                        <hr>
                                        <h5>LỊCH TRÌNH KHÁM BỆNH</h5>
                                        <div>
                                          <div class="row">
                                              <div class="col-md-12">

                                                  <!-- Stepers Wrapper -->
                                                  <ul class="stepper stepper-vertical mt-0">

                                                  <!-- First Step -->
                                                  <li class="completed">
                                                      <a href="#!">
                                                      <span class="circle">1</span>
                                                      <span class="label">Chỉ định dịch vụ &nbsp;&nbsp;<i style="font-size: 14px;font-weight: 400;"><?php echo date("d-m-Y H:i:s" ,strtotime($row_ttphieu['ngaylapphieu'])) ?></i></span>
                                                      </a>

                                                      <div class="step-content grey lighten-3 text-left">
                                                          <p>Chỉ định dịch vụ:</p>
                                                          <ul><?php
                                                              $sql_dsdichvu = "SELECT * FROM dichvuduocchidinh, dichvu WHERE dichvuduocchidinh.id_dichvu = dichvu.id_dichvu AND maphieu = '$maphieu'";
                                                              $query_dsdichvu = mysqli_query($mysqli, $sql_dsdichvu);
                                                              while($ds_dichvu = mysqli_fetch_array($query_dsdichvu)) {
                                                                  ?>
                                                                      <li><?php echo $ds_dichvu['ten_dichvu'] ?></li>
                                                                  <?php
                                                              }
                                                          ?></ul>                         
                                                      </div>
                                                  </li>

                                                  <?php
                                                      $sql_taikham = "SELECT * FROM lichtaikham WHERE maphieu = '$maphieu' ORDER BY ngaytaikham ASC, giohen ASC";
                                                      $query_taikham = mysqli_query($mysqli, $sql_taikham);
                                                      $stt = 1;                 
                                                      if (mysqli_num_rows($query_taikham) != 0) {
                                                          while($lichtaikham = mysqli_fetch_array($query_taikham)) {
                                                          ?>
                                                          <li class="<?php if ($lichtaikham['trangthai'] == 1) {
                                                              echo 'active';
                                                          } ?>" id="dulieu-<?php echo $lichtaikham['id_lichtaikham'] ?>">
                                                              <a>
                                                                  <span class="circle"><?php echo ++$stt; ?></span>
                                                                  <span class="label"><?php echo $lichtaikham['tieude'] ?> &nbsp;&nbsp;<i style="font-size: 14px;font-weight: 400;"><?php if($lichtaikham['giohen'] != NULL) {
                                                                      echo date("d-m-Y" ,strtotime($lichtaikham['ngaytaikham'])).' '.date("H:i:s",strtotime($lichtaikham['giohen']));
                                                                      }
                                                                      else {
                                                                          echo date("d-m-Y" ,strtotime($lichtaikham['ngaytaikham']));
                                                                      }
                                                                  ?></i></span>
                                                              </a>

                                                              <?php
                                                                  if ($lichtaikham['noidung'] != NULL) {
                                                                      ?>
                                                                          <div class="step-content grey lighten-3" style="width: 650px;text-align: left;">
                                                                              <p class="<?php
                                                                              if ($lichtaikham['trangthai'] == 0) {
                                                                                  echo 'grey-text';
                                                                              }
                                                                          ?>"><?php echo $lichtaikham['noidung'] ?></p>
                                                                          </div>
                                                                      <?php
                                                                  }
                                                              ?>                               
                                                          </li>
                                                          <?php
                                                          }
                                                      } 
                                                  ?>
                                                                  
                                                  <li id="li-kt-02">
                                                      <a href="#!">
                                                          <span class="circle"><?php echo ++$stt ?></span>
                                                          <span class="label">Kết thúc </span>
                                                      </a>
                                                  </li>

                                                  </ul>            

                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!--Footer-->
                                        <div class="modal-footer">                                                             
                                          <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect" data-dismiss="modal">ĐÓNG</button>
                                        </div>
                                      </div>
                                    <!--/Content-->
                                </div>
                              </div>
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
                <img src="<?php echo $row_kh['anhdaidien_kh'] ?>" class="rounded-circle" style="overflow: hidden;" alt="Avatar" height="150px" width="150px">
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
                    if($row_kh['diemtichluy'] < 1000) {
                      echo '<b style="color: #0099CC">Khách hàng mới <i class="fas fa-user-alt"></i></b>';
                    }
                    else if ($row_kh['diemtichluy'] >= 1000 && $row_kh['diemtichluy'] < 3000 ) {
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
                  <a href="./dangky.php" type="button" class="btn btn-sm btn-outline-primary btn-rounded waves-effect waves-light">CHỈNH SỬA TRANG CÁ NHÂN</a>
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
        © 2022. NHA KHOA IMPLANT TQUEEN

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

    function capnhatlichhen(makh) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("capnhat02").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "capnhat-lichhen.php?makh=" + makh, true);
      xmlhttp.send();
    }

    function chonbacsi() {

      var x =  document.getElementById("dsbacsi").value;
      if (x == 0) {       
        document.getElementById("ngaygiokham").innerHTML = `<h6 class="mt-3 mb-3 red-text d-flex align-items-center justify-content-center">Vui lòng chọn bác sĩ khám để có thể chọn ngày theo lịch làm việc của bác sĩ</h6>`;     
        document.getElementById("chongiokham").innerHTML = `<h6 class="mt-3 mb-3 red-text d-flex align-items-center justify-content-center">Vui lòng chọn bác sĩ và ngày làm việc để chọn giờ khám đặt trước</h6>`;     
        document.getElementById("from").value = "";
        document.getElementById("giokham").value = "";
      }
      else {
        document.getElementById("ngaygiokham").innerHTML = "";
      }

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
    }

    let monthEle = document.querySelector('.month-calender');
  let yearEle = document.querySelector('.year-calender');
  let btnNext = document.querySelector('.btn-next-calender');
  let btnPrev = document.querySelector('.btn-prev-calender');
  let btnToday = document.querySelector('.btn-today');
  let dateEle = document.querySelector('.date-container');
  // let closeForm = document.querySelector('.closeForm');

  let currentMonth = new Date().getMonth();
  let currentYear = new Date().getFullYear();

  // Lấy số ngày của 1 tháng
  function getDaysInMonth() {
      return new Date(currentYear, currentMonth + 1, 0).getDate();
  }

  // Lấy ngày bắt đầu của tháng
  function getStartDayInMonth() {
      return new Date(currentYear, currentMonth, 1).getDay();
  }

  // Active current day
  function activeCurrentDay(day) {
      let day1 = new Date().toDateString();
      let day2 = new Date(currentYear, currentMonth, day).toDateString();
      return day1 == day2 ? 1 : 0;
  }

  // Hiển thị ngày trong tháng lên trên giao diện
  // function renderDate() {
  //     let daysInMonth = getDaysInMonth();
  //     let startDay = getStartDayInMonth();

  //     dateEle.innerHTML = '';

  //     for (let i = 0; i < startDay; i++) {
  //         dateEle.innerHTML += `
  //             <div class="day-calender"></div>
  //         `;
  //     }

  //     for (let i = 0; i < daysInMonth; i++) {
  //         if (activeCurrentDay(i+1) == 0) {
  //             dateEle.innerHTML += `
  //                 <a class="day-calender" id="${i + 1}-${currentMonth}" onclick="chonngay(${i + 1}, ${currentMonth})">${i + 1}</a>
  //             `;
  //         }
  //         else {
  //             dateEle.innerHTML += `
  //                 <a class="day-calender red-text font-weight-bold" id="${i + 1}-${currentMonth}" onclick="chonngay(${i + 1}, ${currentMonth})">
  //                     ${i + 1}
  //                 </a>
  //             `;
  //         }
  //     }
  // }

  function chonngay(day) {
    document.getElementById('from').value = `${currentYear}-${currentMonth+1}-${day}`;
    var mabs = document.getElementById("dsbacsi").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("chongiokham").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
      }
    };
    xmlhttp.open("GET", "giokham.php?mabs=" + mabs + "&day=" + day + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
    xmlhttp.send();
  }
  
  function test() {
    var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form-contact-message").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "themlichhen.php", true);
      xmlhttp.send();
  }

  function chongio(thoigian) {
    switch(thoigian) {
      case 1:
        document.getElementById('giokham').value = '7:00';
        break;
      case 2:
        document.getElementById('giokham').value = '8:30';
        break;
      case 3:
        document.getElementById('giokham').value = '10:00';
        break;
      case 4:
        document.getElementById('giokham').value = '13:00';
        break;
      case 5:
        document.getElementById('giokham').value = '14:30';
        break;
      case 6:
        document.getElementById('giokham').value = '16:00';
        break;
    }
    
  }

  // Xử lý khi ấn vào nút next month
  btnNext.addEventListener('click', function () {
      if (currentMonth == 11) {
          currentMonth = 0;
          currentYear++;
      } else {
          currentMonth++;
      }
      // displayInfo();
      document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
      document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
  });

  // Xử lý khi ấn vào nút previous month
  btnPrev.addEventListener('click', function () {
      if (currentMonth == 0) {
          currentMonth = 11;
          currentYear--;
      } else {
          currentMonth--;
      }
      // displayInfo();
      document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
      document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
  });

  btnToday.addEventListener('click', function () {
      let d = new Date();
      currentMonth = d.getMonth();
      currentYear = d.getFullYear();
      // displayInfo();
      document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
      document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
  });

  // closeForm.addEventListener('click', function() {
  //     document.getElementById('capnhat02').innerHTML = "";
  // });
  

  window.onload = displayInfo;
  </script>
</body>

</html>