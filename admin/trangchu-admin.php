<?php
    // if(!$_SESSION['admin']) {
    //     header("location:../index.php");
    // }
?>

<div class="container-fluid">
  <section class="mt-md-4 pt-md-2 mb-5 pb-4">

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
    
    <div class="card card-cascade narrower">
      <!-- <div style="height: 100px;">H</div> -->
      <!-- Card image -->
      <div class="view view-cascade gradient-card-header blue-gradient mb-5 mt-5">
        <canvas id="sales"></canvas>
      </div>
      <!-- Card image -->


    </div>
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
  /*Global settings*/
  Chart.defaults.global.defaultFontColor = '#fff';
    $(function () {
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

      //line
      var ctxL = document.getElementById("sales").getContext('2d');
      var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
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
              data: [65, 59, 80, 81, 56, 55, 40]
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
              data: [28, 48, 40, 19, 86, 27, 90]
            }
          ]
        },
        options: {
          responsive: true
        }
      });


      $('#dark-mode').on('click', function (e) {

        e.preventDefault();

        $('footer').toggleClass('mdb-color lighten-4 dark-card-admin');
        $('body, .navbar').toggleClass('white-skin navy-blue-skin');
        $(this).toggleClass('white text-dark btn-outline-black');
        $('body').toggleClass('dark-bg-admin');
        $('.card').toggleClass('dark-card-admin');
        $('h6, .card, p, td, th, i, li a, h4, input, label').not(
          '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
        $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
        $('.gradient-card-header').toggleClass('white black lighten-4');
        $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

        for (let i = 0; i <= 5; i++) {

          myLineChart.data.datasets[0].data[i] = (Math.random(i) * 90);
          myLineChart.data.datasets[1].data[i] = (Math.random(i) * 90);
        }
        myLineChart.update();

      });
    });
</script>