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
            <a href="index-bs.php?route=trangcanhan" class="pl-0"><img src="../img/TQueen-logo-removebg-preview.png"></a>
          </div>
        </li>

        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a href="index-bs.php?route=trangcanhan" class="collapsible-header waves-effect">Phiếu khám bệnh</a>
            </li>
            <li>
              <a href="index-bs.php?route=khachhang" class="collapsible-header waves-effect">Thông tin khách hàng</a>
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
        <!-- <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a> -->
        <i class="fas fa-user-tie fa-2x ml-3"></i>
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
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body" >
                  <h5 class="font-weight-bold white-text bg-info p-3 mt-0" style="text-align: center;">DANH SÁCH THU PHÍ KHÁCH HÀNG</h5>
                  
                  <table id="dtMaterialDesignExample" class="table table-striped table-responsive" style="border: 1px solid #01579b;" cellspacing="0" width="100%">
                      
                      <colgroup>
                          <col width="50" span="1">
                          <col width="150" span="1">
                          <col width="200" span="1">
                          <col width="200" span="1">
                          <col width="200" span="1">
                          <col width="150" span="1">
                          <col width="150" span="1">
                          <col width="50" span="1">
                      </colgroup>
                      <div style="text-align: right;">
                        <a class="btn btn-success" onclick="location.reload()">REFREST LIST</a>
                      </div>
                      <thead>
                          <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
                              <th>STT</th>
                              <th class="font-weight-bold">Mã phiếu
                              </th>
                              <th class="font-weight-bold">Tên khách hàng
                              </th>
                              <th class="font-weight-bold">Bác sĩ khám</th>
                              <th class="font-weight-bold">Ngày lập phiếu</th>
                              <th class="font-weight-bold">Phí dịch vụ
                              </th>
                              <th class="font-weight-bold">Trạng thái thu phí</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $stt = 1;
                        $ttphieu = "SELECT * FROM phieukhambenh, bacsi WHERE phieukhambenh.id_bs = bacsi.id_bs ORDER BY phieukhambenh.ngaylapphieu DESC";
                        $query_ttphieu = mysqli_query($mysqli, $ttphieu);
                        while($row_ttphieu = mysqli_fetch_array($query_ttphieu)) {
                      ?>
                          <tr>
                              <td class="text-center"><?php echo $stt++ ?></td>
                              <td><?php $maphieu = $row_ttphieu['maphieu'];
                                        echo $maphieu ?></td>
                              <td><?php echo $row_ttphieu['tenkhachhang'] ?></td>
                              <td><?php echo $row_ttphieu['hoten_bs'] ?></td>
                              <td><?php echo $row_ttphieu['ngaylapphieu'] ?></td>
                              <td class="font-weight-bold red-text"><?php echo number_format($row_ttphieu['tongchiphi'], 0, '', '.') ?> VNĐ</td>
                              <td class="text-center"><?php
                                  if($row_ttphieu['trangthaithuphi'] == 0) {
                                      echo '<button type="button" class="btn btn-sm btn-outline-deep-orange waves-effect mt-0 mb-0" style="width: 120px">Chờ thu phí</button>';
                                  }
                                  else {
                                      echo '<a class="text-success mt-0 mb-0 font-weight-bold">Đã thu phí <i class="far fa-check-circle"></i></a>';
                                  }
                              ?></td>
                              <td>
                                  <a class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="modal" data-target="#modal-info-<?php echo $row_ttphieu['maphieu'] ?>" data-placement="right" title="Xem chi tiết">
                                    <i class="fas fa-arrow-right"></i>
                                  </a>
                              </td>
                              <!--Modal Info-->
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
                                                <p><b>Bác sĩ phụ trách: </b> <?php echo $row_ttphieu['hoten_bs'] ?></p>
                                                <p id="maphieu-<?php echo $maphieu ?>" hidden><?php echo $maphieu ?></p>
                                            </div>
                                            <div class="col-md-6">
                                              <section>
                                                <?php
                                                  if (($row_ttphieu['id_kh'] == NULL) && ($row_ttphieu['trangthaithuphi'] == 0)) {
                                                    ?>
                                                      <select id="<?php echo $row_ttphieu['id_phieu'] ?>" class="mdb-select md-form m-3" searchable="Tìm kiếm.."
                                                       onchange="khuyenmai<?php echo $row_ttphieu['maphieu'] ?>();thanhtien<?php echo $row_ttphieu['maphieu'] ?>()">
                                                        <option value="NULL">Chưa có tài khoản</option>
                                                        <?php
                                                          $sql_kh = "SELECT * FROM khachhang";
                                                          $query_kh = mysqli_query($mysqli, $sql_kh);
                                                          while($kh = mysqli_fetch_array($query_kh)){
                                                            ?>
                                                              <option value="<?php echo $kh['id_kh'] ?>" data-icon="../<?php echo $kh['anhdaidien_kh'] ?>"
                                                                class="rounded-circle">
                                                                <ul>
                                                                  <li><?php echo $kh['hoten_kh'] ?> - </li>
                                                                  <li><?php echo $kh['sdt_kh'] ?></li>
                                                                  <li> - <?php echo $kh['email_kh'] ?></li>
                                                                </ul></option>
                                                            <?php
                                                          }
                                                        ?>
                                                      </select>
                                                      <label for="<?php echo $row_ttphieu['id_phieu'] ?>" class="mdb-main-label">Chọn tài khoản</label>
                                                    <?php
                                                  }
                                                  else if (($row_ttphieu['id_kh'] == NULL) && ($row_ttphieu['trangthaithuphi'] == 1)) {
                                                    echo 'Không có tài khoản';
                                                  }
                                                  else {
                                                    $id_kh = $row_ttphieu['id_kh'];
                                                    $sql_thongtinkh = "SELECT * FROM khachhang WHERE id_kh = $id_kh";
                                                    $query_thongtinkh = mysqli_query($mysqli, $sql_thongtinkh);
                                                    $thongtinkh = mysqli_fetch_array($query_thongtinkh);
                                                    echo '<ul style="text-align: left">';?>
                                                      <li><b>Tên tài khoản:</b> <?php echo $thongtinkh['hoten_kh'] ?></li>
                                                      <li><b>Email:</b> <?php echo $thongtinkh['email_kh'] ?></li>
                                                      <li><b>SĐT:</b> <?php echo $thongtinkh['sdt_kh'] ?></li>
                                                    <?php echo '</ul>';
                                                  }
                                                ?>
                                                
                                              </section>
                                              <script>
                                                function khuyenmai<?php echo $row_ttphieu['maphieu']?>() {
                                                  var khachhang = document.getElementById('<?php echo $row_ttphieu['id_phieu'] ?>').value;     
                                                  var xmlhttp = new XMLHttpRequest();
                                                  xmlhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                      document.getElementById('khuyenmai-<?php echo $row_ttphieu['maphieu'] ?>').innerHTML =(this.responseText);
                                                    }
                                                  };
                                                  var maphieu = document.getElementById('maphieu-<?php echo $row_ttphieu['maphieu'] ?>').innerHTML;
                                                  // document.getElementById('khuyenmai-<php echo $row_ttphieu['maphieu'] ?>').innerHTML = maphieu;
                                                  xmlhttp.open("GET", "./tongchiphi.php?action=khuyenmai&idkh=" + khachhang + "&maphieu=" + maphieu, true);
                                                  xmlhttp.send();                                                                                                                                               
                                                }

                                                function thanhtien<?php echo $row_ttphieu['maphieu']?>() {
                                                  var khachhang = document.getElementById('<?php echo $row_ttphieu['id_phieu'] ?>').value;
                                                  var xmlhttp = new XMLHttpRequest();
                                                  xmlhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                      document.getElementById('thanhtien-<?php echo $row_ttphieu['maphieu'] ?>').innerHTML =(this.responseText);
                                                    }
                                                  };
                                                  var maphieu = document.getElementById('maphieu-<?php echo $row_ttphieu['maphieu'] ?>').innerHTML;
                                                  xmlhttp.open("GET", "./tongchiphi.php?action=thanhtien&idkh=" + khachhang + "&maphieu=" + maphieu, true);
                                                  xmlhttp.send();                                                                                                                                            
                                                }
                                              </script>
                                              
                                              
                                            </div>
                                            <div id="test-new"></div>                                 
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
                                              $maphieu_new = $row_ttphieu['maphieu'];
                                              $tongphi = "SELECT * FROM thanhtoan WHERE maphieu = '$maphieu_new'";
                                              $query_tong = mysqli_query($mysqli, $tongphi);
                                              $row_tongchiphi = mysqli_fetch_assoc($query_tong);
                                              echo number_format($row_tongchiphi['tamtinh'], 0, '', '.');
                                            ?> VNĐ</b></h6>
                                            <h6 class="title mb-3 font-weight-bold" style="text-align: end;">Phí được giảm: <b class="red-text" id="khuyenmai-<?php echo $maphieu ?>"><?php
                                                echo number_format($row_tongchiphi['khuyenmai'], 0, '', '.');
                                              ?> VNĐ</b></h6>
                                            <h5 class="title mb-3 font-weight-bold" style="text-align: end;">THÀNH TIỀN: <b class="red-text" id="thanhtien-<?php echo $maphieu ?>"><?php
                                              $thanhtien = $row_tongchiphi['tamtinh'] - $row_tongchiphi['khuyenmai'];
                                              echo number_format($thanhtien, 0, '', '.')." VNĐ";
                                            ?></b></h5>
                                          </div>
                                          
                                        </div>
                                    </div>
                                    <!--Footer-->
                                    <div class="modal-footer">
                                      <div id="xacnhan"></div>
                                      <?php
                                        $ktra = "SELECT * FROM phieukhambenh WHERE maphieu = '$maphieu'";
                                        $query_ktra = mysqli_query($mysqli, $ktra);
                                        $row_ktra = mysqli_fetch_array($query_ktra);
                                        if ($row_ktra['trangthaithuphi'] == 0) {
                                          ?>
                                            <button type="button" class="btn btn-sm btn-rounded btn-success waves-effect" data-toggle="modal" data-target="#frameModalTopInfoDemo-<?php echo $maphieu ?>" data-backdrop="false" >Xác nhận đã thanh toán</button>
                                          <?php
                                        }
                                        else {
                                          ?>
                                            <button type="button" class="btn btn-sm btn-rounded btn-primary waves-effect" onclick='openPrint("<?php echo $maphieu ?>")'>In lại hóa đơn</button>
                                          <?php
                                        }
                                      ?>
                                      <section>
                                        <div class="modal fade top" id="frameModalTopInfoDemo-<?php echo $maphieu ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                          aria-hidden="true" data-backdrop="false">
                                          <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                                            <!-- Content -->
                                            <div class="modal-content">
                                              <!-- Body -->
                                              <div class="modal-body">
                                                <div class="row d-flex justify-content-center align-items-center">

                                                  <p class="pt-3 pr-2">Bạn chắc chắn đã nhận đủ phí khám chữa răng ?</p>

                                                  <?php $maphieu02 = $row_ttphieu['id_phieu'] ?>
                                                  <a type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#frameModalTopInfoDemo-02-<?php echo $maphieu ?>" data-backdrop="false" onclick="xacnhan('<?php echo $maphieu02 ?>', '<?php echo $MaNV ?>')">Có, tôi đã nhận đủ</a>
                                                  <a type="button" class="btn btn-outline-success btn-sm waves-effect" data-dismiss="modal">Không, tôi chưa nhận</a>

                                                </div>
                                              </div>
                                            </div>
                                            <!-- Content -->
                                          </div>
                                        </div>
                                      </section>
                                      
                                      <section>
                                        <div class="modal fade top" id="frameModalTopInfoDemo-02-<?php echo $maphieu ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                          aria-hidden="true" data-backdrop="false">
                                          <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                                            <!-- Content -->
                                            <div class="modal-content">
                                              <!-- Body -->
                                              <div class="modal-body">
                                                <div class="row d-flex justify-content-center align-items-center">

                                                  <p class="pt-3 pr-2">Bạn có muốn in hóa đơn cho khách hàng ?</p>

                                                  
                                                  <a type="button" class="btn btn-info btn-sm" onclick='openPrint("<?php echo $maphieu ?>");'>Có, giúp tôi in</a>
                                                  <a type="button" class="btn btn-outline-info btn-sm waves-effect" data-dismiss="modal" onclick="location.reload()">Không cần in hóa đơn</a>                                             
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Content -->
                                          </div>
                                        </div>
                                      </section>  
                                      
                                      <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect" data-dismiss="modal">ĐÓNG</button>
                                    </div>
                                    </div>
                                    <!--/Content-->
                                </div>
                              </div>
                              <!--/Modal Info-->
                          </tr>
                      <?php
                          }
                      ?>
                      </tbody>
                  </table>
                  
              </div>
          </div>
      </div>     
    </div>

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
