<?php
    if(!$_SESSION['bacsi']) {
        header("location:../index.php");
    }
?>

<div class="container-fluid mb-5">

    <!-- Section: Thông tin cá nhân bác sĩ -->
    <section class="section team-section">
      <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-8 mb-5" >
          <div class="col-md-12">
            <div class="card" style="margin-top: 100px;">
              <div class="card-body">
                <h5 class="font-weight-bold dark-grey-text" style="text-align: justify;">PHIÊN LÀM VIỆC CỦA BÁC SĨ</h5>
                <div class="p-3" style="border: 2px solid #007E33;">
                  <?php
                    $MaBS = $_SESSION['bacsi']['id_bs'];
                    $sql_phieu = "SELECT * FROM phieukhambenh WHERE id_bs = $MaBS AND trangthaikhambenh = 'Đang khám'";
                    $query_phieu = mysqli_query($mysqli, $sql_phieu);
                    if(mysqli_num_rows($query_phieu) != 0) {
                      while($phieu = mysqli_fetch_array($query_phieu)) {
                        ?>
                          <p><b>Họ tên khách hàng:</b> <?php echo $phieu['tenkhachhang'] ?></p>
                          <?php
                            $maphieu = $phieu['maphieu'];
                            $ds_dichvu = "SELECT * FROM dichvuduocchidinh, dichvu, phieukhambenh WHERE dichvuduocchidinh.id_dichvu = dichvu.id_dichvu AND dichvuduocchidinh.maphieu = phieukhambenh.maphieu AND dichvuduocchidinh.maphieu = '$maphieu'";
                            $query_ds = mysqli_query($mysqli, $ds_dichvu);
                          ?>
                          <ul class="striped list-unstyled waves-effect" style="background-color: #b9f6ca">
                            <?php
                              while($row_ds = mysqli_fetch_array($query_ds)) {
                                ?>
                                  <li style="font-size: 14px;"><?php echo $row_ds['ten_dichvu'] ?> - <?php echo $row_ds['soluong']?> <?php echo $row_ds['donvitinh'] ?> - <b class="red-text" style="text-align: right;"><?php echo number_format($row_ds['phihientai_dichvu'] * $row_ds['soluong'], 0, '', '.')?> VNĐ</b></li>
                                <?php
                              }
                            ?>
                          </ul>
                          <p><b>Trạng thái thu phí:</b> <?php
                            if ($phieu['trangthaithuphi'] == 0) {
                              echo '<b class="red-text">Chờ thu phí</b>';
                            }
                            else {
                              echo '<b class="text-success">Đã thu phí</b>';
                            }
                          ?></p>
                          <?php
                            if ($phieu['id_kh'] != 0) {
                              echo '<p><b>Tài khoản: </b>';
                              $id_kh = $phieu['id_kh'];
                              $sql_khachhang = "SELECT * FROM khachhang WHERE id_kh = $id_kh";
                              $query_kh = mysqli_query($mysqli, $sql_khachhang);
                              if (mysqli_num_rows($query_kh) == 0) {
                                echo 'Không có tài khoản';
                              }
                              else {
                                $khachhang = mysqli_fetch_array($query_kh);
                                echo ''.$khachhang['hoten_kh'].' - '.$khachhang['sdt_kh'].' - '.$khachhang['email_kh'].'</p>';
                              }
                              
                            }
                          ?>
                          <p>
                            <?php
                              if (isset($_GET['idlich'])) {
                                echo '<hr><p><b>Thời gian hẹn: </b>';
                                $id_lich = $_GET['idlich'];
                                $sql_lichhen = "SELECT * FROM lichtaikham WHERE id_lichtaikham = $id_lich";
                                $query_lichhen = mysqli_query($mysqli, $sql_lichhen);
                                $lichhen = mysqli_fetch_array($query_lichhen);
                                if ($lichhen['giohen'] != NULL) {
                                  echo date("d-m-Y", strtotime($lichhen['ngaytaikham'])).' - '.date("h:i", strtotime($lichhen['giohen']));
                                }
                                else {
                                  echo date("d-m-Y", strtotime($lichhen['ngaytaikham']));
                                }
                                echo '</p>';
                                echo '<p><b>Tiêu đề: </b>'.$lichhen['tieude'].'</p>';
                                echo '<p><b>Nội dung: </b>'.$lichhen['noidung'].'</p>';
                              }
                            ?>
                          </p>
                        <?php
                      }
                      ?>
                      <div style="text-align: right;">
                        <a class="btn btn-rounded success-color waves-effect btn-sm white-text" href="./index-bs.php?route=lichhenkham&maphieu=<?php echo $maphieu ?>">QUẢN LÝ LỊCH HẸN</a>
                        <?php
                          if (isset($_GET['idlich'])) {
                            $id_lich02 = $_GET['idlich'];
                            ?>
                              <a class="btn btn-rounded primary-color-dark waves-effect btn-sm" onclick="hoanthanh('<?php echo $maphieu ?>', '<?php echo $id_lich02 ?>')">HOÀN THÀNH TÁI KHÁM</a>
                              <a class="btn btn-rounded danger-color waves-effect btn-sm" onclick="dongphien('<?php echo $maphieu ?>')">ĐÓNG PHIÊN LÀM VIỆC</a>
                            <?php
                          }
                          else {
                            ?>
                            <a class="btn btn-rounded primary-color-dark waves-effect btn-sm" onclick="dongphien('<?php echo $maphieu ?>')">HOÀN THÀNH KHÁM CHỮA</a>
                            <?php
                          }
                        ?>
                      </div>
                      <div id="ketthuc"></div>
                      
                      <?php
                    }
                    else { ?>
                      <p class="dark-grey-text text-center m-0">Hiện đang không có khách hàng</p>
                      <div style="text-align: right;">
                        <!-- <a class="btn btn-rounded primary-color-dark waves-effect btn-sm" onclick='mophien("<php echo $maphieu ?>")'>KẾT THÚC PHIÊN LÀM VIỆC</a> -->
                      </div>
                      <?php
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Second column -->
        <div class="col-md-4 mb-md-0 mb-5">

          <!-- Card -->
          <div class="card profile-card">

            <!-- Avatar -->
            <div class="avatar z-depth-1-half mb-4">
              <img src="../<?php echo $row_bs['anhdaidien_bs'] ?>" class="rounded-circle" style="overflow: hidden;" alt="Avatar" height="150px" width="150px">
            </div>

            <div class="card-body pt-0 mt-0">
              <!-- Name -->
              <div class="text-center">
                <h3 class="mb-3 font-weight-bold"><strong>
                  <?php
                    echo $row_bs['hoten_bs'];
                  ?>
                </strong></h3>
              </div>

              <ul class="striped list-unstyled">
                <li><strong>Email: </strong><?php echo $row_bs['email_bs'] ?></li>

                <li><strong>SĐT: </strong> <?php echo $row_bs['sdt_bs'] ?></li>

                <li><strong>Chuyên môn: </strong> <?php echo $row_bs['chuyenmon'] ?></li>

                <li><strong>Kinh nghiệm: </strong> <?php echo $row_bs['kinhnghiem'] ?></li>

                <li><strong>Địa chỉ: </strong> <?php echo $row_bs['diachi_bs'] ?></li>
              </ul>

            </div>

          </div>
          <!-- Card -->

        </div>
        <!-- Second column -->
      </div>

      <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-12" >

            <div class="card mt-5">
              <div class="card-body" >
                <a href="./index-bs.php?route=phieukhambenh">
                  <button type="button" class="btn btn-primary">Tạo phiếu khám bệnh</button>
                </a>
                <table id="dtMaterialDesignExample" class="table table-striped table-responsive" style="border: 1px solid #01579b;" cellspacing="0" width="100%">
                  <colgroup>
                    <col width="50" span="1">
                    <col width="150" span="4">
                    <col width="300" span="1">
                    <col width="100" span="1">
                    <col width="50" span="1">
                  </colgroup>
                    <thead>
                    <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
                      <th>STT</th>
                      <th class="font-weight-bold">Mã phiếu
                      </th>
                      <th class="font-weight-bold">Tên khách hàng
                      </th>
                      <th class="font-weight-bold">Ngày khám bệnh
                      </th>
                      <th class="font-weight-bold">Ngày tái khám
                      </th>
                      <th class="font-weight-bold">Dịch vụ</th>
                      <th class="font-weight-bold">Số lần tái khám còn lại
                      </th>
                      <th>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $stt = 1;
                      $MaBS = $_SESSION['bacsi']['id_bs'];
                      $phieu = "SELECT DISTINCT phieukhambenh.maphieu, phieukhambenh.tenkhachhang, phieukhambenh.ngaylapphieu
                                FROM phieukhambenh, lichtaikham 
                                WHERE phieukhambenh.maphieu = lichtaikham.maphieu AND phieukhambenh.id_bs = $MaBS AND lichtaikham.trangthai = 0 ORDER BY ngaytaikham DESC";
                      $query_phieu = mysqli_query($mysqli, $phieu);
                      while($row_phieu = mysqli_fetch_array($query_phieu)) {
                        ?>
                          <tr>
                            <td class="text-center"><?php echo $stt++ ?></td>
                            <td><?php echo $row_phieu['maphieu'] ?></td>
                            <td><?php echo $row_phieu['tenkhachhang'] ?></td>
                            <td><?php echo $row_phieu['ngaylapphieu'] ?></td>
                            <td><?php
                              $maphieu03 = $row_phieu['maphieu'];
                              $sql_ngaygannhat = "SELECT MIN(ngaytaikham) ngaygannhat FROM lichtaikham WHERE maphieu = '$maphieu03' AND trangthai = 0";
                              $query_ngaygannhat = mysqli_query($mysqli, $sql_ngaygannhat);
                              $row_ngaygannhat = mysqli_fetch_assoc($query_ngaygannhat);
                              echo $row_ngaygannhat['ngaygannhat'];
                            ?></td>
                            <td>
                              <ul>
                                <?php
                                  $sql_dichvu = "SELECT * FROM phieukhambenh, dichvu, dichvuduocchidinh 
                                                WHERE phieukhambenh.maphieu = dichvuduocchidinh.maphieu 
                                                      AND dichvu.id_dichvu = dichvuduocchidinh.id_dichvu
                                                      AND phieukhambenh.maphieu = '$maphieu03'";
                                  $query_dichvu = mysqli_query($mysqli, $sql_dichvu);
                                  while($row_dichvu = mysqli_fetch_assoc($query_dichvu)) {
                                    echo '<li>'.$row_dichvu['ten_dichvu'].'</li>';
                                  }
                                ?>
                              </ul>                             
                            </td>
                            <td class="text-center"><?php
                              $sql_solantaikham = "SELECT COUNT(*) solan FROM lichtaikham WHERE maphieu = '$maphieu03' AND trangthai = 0";
                              $query_solantaikham = mysqli_query($mysqli, $sql_solantaikham);
                              $row_solantaikham = mysqli_fetch_assoc($query_solantaikham);
                              echo $row_solantaikham['solan'];
                            ?></td>
                            <td class="text-center">
                              <a href="index-bs.php?route=lichhenkham&maphieu=<?php echo $row_phieu['maphieu'] ?>" class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="tooltip" data-placement="right" title="Xem chi tiết">
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
      </div>

      

    </section>
    <!-- End section: Thông tin cá nhân bác sĩ -->

  </div>
  <script>
    function hoanthanh(maphieu, id_lich) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ketthuc").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "./lichtrinh/hoanthanh.php?maphieu=" + maphieu + "&idlich=" + id_lich, true);
        xmlhttp.send();
    }

    function dongphien(maphieu) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ketthuc").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "./lichtrinh/dongphien.php?maphieu=" + maphieu, true);
        xmlhttp.send();
    }
  </script>