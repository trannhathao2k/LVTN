<?php

$MaBS = $_SESSION['bacsi']['id_bs'];

$sql_bs = "SELECT * FROM `bacsi` WHERE `bacsi`.id_bs='$MaBS'";
$result_bs = mysqli_query($mysqli, $sql_bs);
$row_bs = mysqli_fetch_array($result_bs);

if(!$_SESSION['bacsi']) {
    header("location:./index.php");
}

?>

<div class="container-fluid">

      <!-- Section: Team v.1 -->
      <section class="section team-section">

        <!-- Grid row -->
        <div class="row text-center" >

          <!-- Grid column -->
          <div class="col-md-12 mb-4" >

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card ">

              <!-- Card Data -->
              <div class="admin-up d-flex justify-content-start">
                <i class="fas fa-users info-color py-4 mr-3 z-depth-2"></i>
                <div class="data">
                  <h5 class="font-weight-bold dark-grey-text">PHIẾU KHÁM BỆNH</h5>
                </div>
              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="card-body card-body-cascade">

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-lg-2">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form12" class="form-control form-control-sm text-center" value="<?php
                            // $max_id = "SELECT MAX(id_phieu) id_max FROM phieukhambenh";
                            // $result_max = mysqli_query($mysqli, $max_id);
                            // $num_max = mysqli_fetch_array($result_max);
                            // if($num_max['id_max'] == NULL) {
                            //     echo '1';
                            // }
                            // else {
                            //     echo $num_max['id_max'] + 1;
                            // }
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $char = date("dMyHis");
                            echo ''.$char.''.$row_bs['id_bs'].'';
                        ?>" disabled>
                      <label for="form12" class="">Mã phiếu</label>
                    </div>

                  </div>
                  <!-- Grid column -->
                  <!-- <div class="col-lg-1"></div> -->

                  <!-- Grid column -->
                  <div class="col-lg-4">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="phieukbtenkh" class="form-control form-control-sm">
                      <label for="phieukbtenkh" class="">Tên khách hàng</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                  <!-- <div class="col-lg-1"></div> -->

                  <!-- Grid column -->
                  <div class="col-lg-4">

                    <div class="md-form form-sm mb-0">
                      <input type="text" id="form4" class="form-control form-control-sm text-center" value="<?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        echo (date("Y-m-d H:i:s"));
                      ?>" disabled>
                      <label for="form4" class="disabled">Ngày lập phiếu</label>
                    </div>

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <div class="row p-3">
                    <div class="col-lg-12 canhgiua" style="background-color: #40c4ff;height: 50px">
                        <h5 class="font-weight-bold white-text">CHỌN DỊCH VỤ KHÁM CHỮA RĂNG</h5>
                        
                    </div>
                    <div class="table-dichvu col-lg-12">
                        <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Chọn</th>
                                <th class="th-sm">Tên dịch vụ
                                </th>
                                <th class="th-sm">Mô tả dịch vụ
                                </th>
                                <th class="th-sm">Phí
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sql_dichvu = "SELECT * FROM dichvu";
                                $query_dichvu = mysqli_query($mysqli, $sql_dichvu);
                                while ($row_dichvu = mysqli_fetch_array($query_dichvu)){
                                  ?>
                                  <tr>
                                    <th onclick="tongphi()">
                                      <input class="form-check-input" type="checkbox" id="checkbox-<?php echo $row_dichvu['id_dichvu'] ?>" onclick="themdichvu(<?php echo $row_dichvu['id_dichvu'] ?>);">
                                      <label class="form-check-label" for="checkbox-<?php echo $row_dichvu['id_dichvu'] ?>" class="mr-2 label-table"></label>
                                    </th>
                                      <td><?php echo $row_dichvu['ten_dichvu'] ?></td>
                                      <td style="text-align: justify;">
                                        <?php echo $row_dichvu['mota_dichvu'] ?>
                                      </td>
                                      <td style="color: red; font-weight: bold"><?php echo number_format($row_dichvu['phi_dichvu'], 0, '', '.') ?> VNĐ / <?php echo $row_dichvu['donvitinh'] ?></td>
                                  </tr>
                                  <?php
                                }
                              ?>                             
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                      <div class="card mt-3">
                        <div class="card-body">
                          <h5 class="font-weight-bold dark-grey-text" style="text-align: justify;">THANH TOÁN</h5>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Tên dịch vụ</th>
                                  <th>Phí dịch vụ</th>
                                  <th>Số lượng</th>
                                </tr>
                              </thead>
                              <tbody id="thanhtoan">
                              </tbody>
                            </table>
                          </div>
                          <div class="row">
                            <div class="col-lg-7" id="thanhtoan02"></div>
                            <div class="col-lg-2">
                              <h5 class="font-weight-bold dark-grey-text">TỔNG CHI PHÍ:</h5>
                            </div>
                            <div class="col-lg-3" id="tongchiphi">
                              <h5 class="font-weight-bold text-danger">0 VNĐ</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div style="text-align: right;">
                      <div id="themphieu"></div>
                        <button type="button" class="btn btn-primary mt-3" onclick="themphieu(<?php echo $row_bs['id_bs'] ?>)">LƯU PHIẾU</button>
                      </div>                 
                    </div>
                </div>
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Team v.1 -->

    </div>

  <script>

    function themdichvu(madv) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("thanhtoan").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
          }
        };
      xmlhttp.open("GET", "action-thanhtoan.php?madv=" + madv, true);
      xmlhttp.send();
    }

    function tongphi() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tongchiphi").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "tongphi.php", true);
      xmlhttp.send();
    }

    function changeSL(madv, thaotac) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("thanhtoan").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "soluong.php?madv=" + madv + "&thaotac=" + thaotac, true);
      xmlhttp.send();
    }

    function themphieu(mabs) {
      var ngaylap = document.getElementById("form4").value;
      var maphieu = document.getElementById("form12").value;
      var tenkhachhang = document.getElementById("phieukbtenkh").value; 

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("themphieu").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "themphieu.php?mabs=" + mabs + "&ngaylap=" + ngaylap + "&maphieu=" + maphieu + "&tenkh=" + tenkhachhang, true);
      xmlhttp.send();
    }
  </script>