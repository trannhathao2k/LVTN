<?php
    // if(!$_SESSION['admin']) {
    //     header("location:../index.php");
    // }
?>

<div class="container-fluid" onload="thongke()">
  <section class="mt-md-4 pt-md-2 mb-3 pb-4">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
            <div class="data">
              <p class="text-uppercase">Doanh thu</p>
              <h4 class="font-weight-bold dark-grey-text" style="font-size: 16px;">
                <?php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = getdate();
                    $month = $date['mon'];

                    $doanhthu = "SELECT * FROM phieukhambenh WHERE MONTH(ngaylapphieu) = $month";
                    $query_doanhthu = mysqli_query($mysqli, $doanhthu);
                    $tong_doanhthu = 0;
                    while($row_doanhthu = mysqli_fetch_array($query_doanhthu)) {
                        $tong_doanhthu += $row_doanhthu['tongchiphi'];
                    }
                    echo number_format($tong_doanhthu, 0, '', '.') ;
                ?> VNĐ
              </h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade">
            <div class="progress mb-3">
                <?php
                    if ($month == 1) {
                        $month_pre = 12;
                    }
                    else {
                        $month_pre = $month - 1;
                    }
                    $doanhthu_pre = "SELECT * FROM phieukhambenh WHERE MONTH(ngaylapphieu) = $month_pre";
                    $query_doanhthu_pre = mysqli_query($mysqli, $doanhthu_pre);
                    $tong_doanhthu_pre = 0;
                    while($row_doanhthu_pre = mysqli_fetch_array($query_doanhthu_pre)) {
                        $tong_doanhthu_pre += $row_doanhthu_pre['tongchiphi'];
                    }
                    if ($tong_doanhthu > $tong_doanhthu_pre) {
                        if ($tong_doanhthu_pre == 0 || $tong_doanhthu == 0) {
                            $phantram = 100;
                        }
                        else {
                            $phantram = round( $tong_doanhthu / $tong_doanhthu_pre , 2) * 100 - 100;
                        }
                    }
                    else {
                      if ($tong_doanhthu_pre == 0 || $tong_doanhthu == 0) {
                        $phantram = 100;
                      }
                      else {
                          $phantram = round( $tong_doanhthu_pre / $tong_doanhthu , 2) * 100 - 100;
                    }
                    }

                    if ($tong_doanhthu >= $tong_doanhthu_pre) {
                        ?>
                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $phantram ?>%" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
                        <?php
                    }
                    else {
                        ?>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $phantram ?>%" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
                        <?php
                    }
                ?>
              
            </div>
            <p class="card-text"><?php
                if ($tong_doanhthu >= $tong_doanhthu_pre) {
                    echo "Nhiều hơn tháng trước $phantram%";
                }
                else {
                    echo "Ít hơn tháng trước $phantram%";
                }
            ?></p>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
            <div class="data">
              <p class="text-uppercase">Khách hàng</p>
              <h4 class="font-weight-bold dark-grey-text" style="font-size: 16px;">
                <?php
                    $khachhang = "SELECT COUNT(maphieu) soluongkh FROM phieukhambenh WHERE MONTH(ngaylapphieu) = $month";
                    $query_kh = mysqli_query($mysqli, $khachhang);
                    $soluong_kh = mysqli_fetch_array($query_kh);

                    $khachhang_pre = "SELECT COUNT(maphieu) soluongkh FROM phieukhambenh WHERE MONTH(ngaylapphieu) = $month_pre";
                    $query_kh_pre = mysqli_query($mysqli, $khachhang_pre);
                    $soluong_kh_pre = mysqli_fetch_array($query_kh_pre);

                    if ($soluong_kh['soluongkh'] >= $soluong_kh_pre['soluongkh']) {
                        if ($soluong_kh_pre['soluongkh'] == 0) {
                            $phantram_kh = 100;
                        }
                        else {
                            $phantram_kh = round( $soluong_kh['soluongkh'] / $soluong_kh_pre['soluongkh'] , 2) * 100 - 100;
                        }
                    }
                    else {
                      if ($soluong_kh['soluongkh'] == 0) {
                        $phantram_kh = 100;
                      }
                      else {
                          $phantram_kh = round( $soluong_kh_pre['soluongkh'] / $soluong_kh['soluongkh'] , 2) * 100 - 100;
                      }
                    }
                    
                    echo $soluong_kh['soluongkh'];
                ?>
              </h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade">
            <div class="progress mb-3">
              <?php
                if ($soluong_kh['soluongkh'] >= $soluong_kh_pre['soluongkh']) {
                    ?>
                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $phantram_kh ?>%" aria-valuenow="<?php echo $phantram_kh ?>"
            aria-valuemin="0" aria-valuemax="100"></div>
                    <?php
                }
                else {
                    ?>
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $phantram_kh ?>%" aria-valuenow="<?php echo $phantram_kh ?>"
            aria-valuemin="0" aria-valuemax="100"></div>
                    <?php
                }
              ?>
            </div>
            <p class="card-text">
                <?php
                    if ($soluong_kh['soluongkh'] >= $soluong_kh_pre['soluongkh']) {
                        echo "Nhiều hơn tháng trước $phantram_kh%";
                    }
                    else {
                        echo "Ít hơn tháng trước $phantram_kh%";
                    }
                ?>
            </p>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">

            <i class="fas fa-user-circle light-blue lighten-1 mr-3 z-depth-2"></i>
            <div class="data">
                <p class="text-uppercase">Tài khoản mới</p>
                <h4 class="font-weight-bold dark-grey-text" style="font-size: 16px;">
                    <?php
                      $dangky = "SELECT COUNT(id_kh) soluong_tk FROM khachhang WHERE MONTH(ngaytao_taikhoan) = $month";
                      $query_dk = mysqli_query($mysqli, $dangky);
                      $soluong_dk = mysqli_fetch_array($query_dk);
                      
      
                      $dangky_pre = "SELECT COUNT(id_kh) soluong_tk FROM khachhang WHERE MONTH(ngaytao_taikhoan) = $month_pre";
                      $query_dk_pre = mysqli_query($mysqli, $dangky_pre);
                      $soluong_dk_pre = mysqli_fetch_array($query_dk_pre);
      
                      if ($soluong_dk['soluong_tk'] >= $soluong_dk_pre['soluong_tk']) {
                          if ($soluong_dk_pre['soluong_tk'] == 0 || $soluong_dk['soluong_tk'] == 0) {
                              $phantram_dk = 100;
                          }
                          else {
                              $phantram_dk = round( $soluong_dk['soluong_tk'] / $soluong_dk_pre['soluong_tk'] , 2) * 100 - 100;
                          }
                      }
                      else {
                        if ($soluong_dk['soluong_tk'] == 0 || $soluong_dk_pre['soluong_tk'] == 0) {
                          $phantram_dk = 100;
                        }
                        else {
                            $phantram_dk = round( $soluong_dk_pre['soluong_tk'] / $soluong_dk['soluong_tk'] , 2) * 100 - 100;
                        }
                      }
                      
                      echo $soluong_dk['soluong_tk'];
                    ?>
                </h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade">
            <div class="progress mb-3">
              <?php
                if ($soluong_dk['soluong_tk'] >= $soluong_dk_pre['soluong_tk']) {
                  ?>
                    <div class="progress-bar bg-primary accent-2" role="progressbar" style="width: <?php echo $phantram_dk ?>%" aria-valuenow="<?php echo $phantram_dk ?>"
                aria-valuemin="0" aria-valuemax="100"></div>
                  <?php
                }
                else {
                  ?>
                    <div class="progress-bar bg-danger accent-2" role="progressbar" style="width: <?php echo $phantram_dk ?>%" aria-valuenow="<?php echo $phantram_dk ?>"
                aria-valuemin="0" aria-valuemax="100"></div>
                  <?php
                }
              ?>
              
            </div>
            <p class="card-text"><?php
              if ($soluong_dk['soluong_tk'] >= $soluong_dk_pre['soluong_tk']) {
                echo "Nhiều hơn tháng trước $phantram_dk%";
              }
              else {
                  echo "Ít hơn tháng trước $phantram_dk%";
              }
            ?></p>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-xl-3 col-md-6 mb-0">

        <!-- Card -->
        <div class="card card-cascade cascading-admin-card">

          <!-- Card Data -->
          <div class="admin-up">
            <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>
            <div class="data">
              <p class="text-uppercase">Truy cập hôm nay</p>
              <h4 class="font-weight-bold dark-grey-text" style="font-size: 16px;"><?php
                $CountFile = "../index.log";
                $CF = fopen ($CountFile, "r");
                $Views = fread ($CF, filesize ($CountFile));
                fclose ($CF);
                echo $Views; 
                
                // $luottruycap_thang = "SELECT * FROM luottruycap WHERE ngay_truycap = date_sub($today,INTERVAL 1 DAY)";
                $luottruycap_thang = "SELECT * FROM luottruycap WHERE MONTH(ngay_truycap) = $month";
                $query_truycapthang = mysqli_query($mysqli, $luottruycap_thang);
                $tongthang = 0;
                while($row_truycapthang = mysqli_fetch_array($query_truycapthang)) {
                    $tongthang += $row_truycapthang['soluot_truycap'];
                }
                
                
              ?></h4>
            </div>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade">
            <div class="progress mb-3">
              <div class="progress-bar red accent-2" role="progressbar" style="width: 100%" aria-valuenow="100"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="card-text">Lượt truy cập trong tháng <?php echo $month ?>: <b class="font-weight-bold dark-grey-text" style="font-size: 16px;position: absolute;right: 10px"><?php echo $tongthang ?></b></p>
          </div>

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </section>

  <section>
    
    <div class="card card-cascade narrower mt-0">
      <!-- <div style="height: 100px;">H</div> -->
      <!-- Card image -->
      <div class="row mt-5 mr-5 mb-0" style="display: flex;justify-content: right;">
        <div class="col-lg-2 p-2">
          <select id="chonloai" class="mdb-select colorful-select dropdown-primary md-form" onchange="loadPage()">
            <?php
              if(isset($_GET['chonloai'])) {
                $loai = $_GET['chonloai'];
              }
              else {
                $loai = "doanhThu";
              }
            ?>
            <option value="doanhThu" <?php if ($loai == "doanhThu") {echo 'selected';} ?>>Doanh thu</option>
            <option value="doanhThuBacSi" <?php if ($loai == "doanhThuBacSi") {echo 'selected';} ?>>Doanh thu theo bác sĩ</option>
            <option value="khachHang" <?php if ($loai == "khachHang") {echo 'selected';} ?>>Khách hàng</option>
            <option value="taiKhoanMoi" <?php if ($loai == "taiKhoanMoi") {echo 'selected';} ?>>Tài khoản mới</option>
            <option value="luotTruyCap" <?php if ($loai == "luotTruyCap") {echo 'selected';} ?>>Lượt truy cập</option>
          </select>
          <label for="chonloai" class="mdb-main-label">Chọn loại</label>
        </div>
        <div class="col-lg-3 p-2" id="selectDoctor" style="display: none;">
          <select id="chonbacsi" class="mdb-select md-form" multiple searchable="Tìm kiếm.."  onchange="thembacsi(this)">
            <?php
              $sql_bacsi = "SELECT * FROM bacsi";
              $query_bacsi = mysqli_query($mysqli, $sql_bacsi);
             
              while($bacsi = mysqli_fetch_array($query_bacsi)) {
                ?>
                  <option value="<?php echo $bacsi['id_bs'] ?>" data-icon="../<?php echo $bacsi['anhdaidien_bs'] ?>"
                      class="rounded-circle" <?php
                        $sql_dsbacsi = "SELECT * FROM temp_dsbacsi";
                        $query_dsbacsi = mysqli_query($mysqli, $sql_dsbacsi);
                        if (mysqli_num_rows($query_dsbacsi) != 0) {
                          while($ds_bacsi = mysqli_fetch_array($query_dsbacsi)) {
                            if($bacsi['id_bs'] == $ds_bacsi['id_bs']) {
                              echo 'selected';
                            }
                          }
                        }
                      ?>>
                    <?php echo $bacsi['hoten_bs'] ?></option>
                <?php
              }
            ?>
          </select>
          <button class="btn-save btn btn-primary btn-sm" onclick ="loadPage()">LƯU</button>
          <label for="chonbacsi" class="mdb-main-label">Chọn bác sĩ</label>
        </div>
        
        <div class="col-lg-2 p-2">
          <select id="thongke" class="mdb-select colorful-select dropdown-primary md-form" onchange="loadPage()">
            <?php
              if(isset($_GET['thongke'])) {
                $thongke = $_GET['thongke'];
              }
              else {
                $thongke = "thongKeThang";
              }
            ?>
            <option value="thongKeThang" <?php if ($thongke == "thongKeThang") {echo 'selected';} ?>>Tháng</option>
            <option value="thongKeNam" <?php if ($thongke == "thongKeNam") {echo 'selected';} ?>>Năm</option>
            <option value="thongKeTatCa" <?php if ($thongke == "thongKeTatCa") {echo 'selected';} ?>>Tất cả</option>
          </select>
          <label for="thongke" class="mdb-main-label">Thống kê theo</label>
        </div>
        <div class="col-lg-2 p-2" <?php
              if(isset($_GET['thang'])) {
                echo 'style="display: block"';
              }
              else {
                echo 'style="display: none"';
              }
            ?> id="selectMonth">
          <select id="chonThang" class="mdb-select colorful-select dropdown-primary md-form" onchange="loadPage()">
              <?php
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $monthCurrent = date("m");
              if(isset($_GET['thang'])) {
                $thang = $_GET['thang'];
              }
              else {
                $thang = $monthCurrent;
              }
                for($i = 1; $i <= 12; $i++) {                  
                  if($i == $thang) {
                    echo '<option value="'.$i.'" selected>Tháng '.$i.'</option>';
                  }
                  else {
                    echo '<option value="'.$i.'">Tháng '.$i.'</option>';
                  }
                }
              ?>
          </select>
          <label for="chonThang" class="mdb-main-label">Chọn tháng</label>
        </div>
        <!-- <div class="col-lg-2">
          <p id="test"></p>
        </div> -->
        <div class="col-lg-2 p-2" <?php
              if(isset($_GET['nam'])) {
                echo 'style="display: block"';
              }
              else {
                echo 'style="display: none"';
              }
            ?> id="selectYear">
          <select id="chonNam" class="mdb-select colorful-select dropdown-primary md-form" onchange="loadPage()">
              <?php
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $yearCurrent = date("Y");
                if(isset($_GET['nam'])) {
                  $nam = $_GET['nam'];
                }
                else {
                  $nam = $yearCurrent;
                }
                for($l = ($yearCurrent - 10); $l <= ($yearCurrent); $l++) {
                  if($l == $nam) {
                    echo '<option value="'.$l.'" selected>Năm '.$l.'</option>';
                  }
                  else {
                    echo '<option value="'.$l.'">Năm '.$l.'</option>';
                  }
                }
              ?>
          </select>
          <label for="chonNam" class="mdb-main-label">Chọn năm</label>
        </div>
      </div>
      <div class="view view-cascade gradient-card-header blue-gradient mb-5" style="margin-top: -50px;">      
        <h6 style="position: absolute; top: 15px; left: 20px; font-size: 12px;" id="donvitinh"></h6>
        <canvas id="sales"></canvas>
        <h6 style="position: absolute; bottom: 0px; right: 20px; font-size: 12px;" id="donvithoigian"></h6>
      </div>
      <!-- Card image -->

    </div>
    <p id="doanhthuthang1"></p>
    <p id="doanhthuthang2"></p>
  </section>

  <!-- <div class="default-color-dark ml-0 mr-0" style="height: 5px;width: 100%;margin-top: -50px;"></div> -->
  
  
    <div class="row mt-5">
      <div class="col-lg-12">
        <div class="card card-cascade narrower">
          <div class="view view-cascade gradient-card-header light-blue lighten-1">
            <h4 class="h2-responsive mb-0 font-weight-500">THÔNG TIN THU PHÍ KHÁCH HÀNG</h4>
          </div>
          
          <div class="card-body" >
              <!-- <h5 class="font-weight-bold white-text bg-info p-3 mt-0" style="text-align: center;">DANH SÁCH THU PHÍ KHÁCH HÀNG</h5> -->
              <table id="dtMaterialDesignExample" class="table table-striped table-responsive" style="border: 1px solid #01579b;" cellspacing="0" width="100%">
                  <colgroup>
                      <col width="10%" span="1">
                      <col width="15%" span="2">
                      <col width="10%" span="2">
                      <col width="12%" span="1">
                      <col width="5%" span="1">
                  </colgroup>
                  <thead>
                      <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
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
                      $ttphieu = "SELECT * FROM phieukhambenh, bacsi WHERE phieukhambenh.id_bs = bacsi.id_bs ORDER BY phieukhambenh.ngaylapphieu DESC";
                      $query_ttphieu = mysqli_query($mysqli, $ttphieu);
                      while($row_ttphieu = mysqli_fetch_array($query_ttphieu)) {
                  ?>
                      <tr>
                          <td><?php echo $row_ttphieu['maphieu'] ?></td>
                          <td><?php echo $row_ttphieu['tenkhachhang'] ?></td>
                          <td><?php echo $row_ttphieu['hoten_bs'] ?></td>
                          <td><?php echo $row_ttphieu['ngaylapphieu'] ?></td>
                          <td class="font-weight-bold red-text"><?php echo number_format($row_ttphieu['tongchiphi'], 0, '', '.') ?> VNĐ</td>
                          <td><?php
                              if($row_ttphieu['trangthaithuphi'] == 0) {
                                  echo '<button type="button" class="btn btn-sm btn-outline-deep-orange waves-effect mt-0 mb-0" style="width: 120px">Chờ thu phí</button>';
                              }
                              else {
                                  echo '<button type="button" class="btn btn-sm btn-outline-success waves-effect mt-0 mb-0" style="width: 120px">Đã thu phí</button>';
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
                                          <p><b>Ngày khám: </b><?php echo $row_ttphieu['ngaylapphieu'] ?></p>
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
  
  
</div>

<script>
</script>
