<div class="container-fluid mb-5">

      <!-- Section: Basic examples -->
      <section class="section team-section">
        <div class="row flex-column-reverse flex-md-row">
          <div class="col-md-8 mb-5" >
            <!-- Gird column -->
            <div class="col-md-12" >

              <div class="card" style="margin-top: 100px;">
                <div class="card-body" >
                  <a href="./index-bs.php?route=phieukhambenh">
                    <button type="button" class="btn btn-primary">Tạo phiếu khám bệnh</button>
                  </a>
                  <table id="dtMaterialDesignExample" class="table table-striped table-responsive" cellspacing="0" width="100%">
                    <colgroup>
                      <col width="10%" span="1">
                      <col width="20%" span="4">
                      <col width="10%" span="1">
                    </colgroup>
                      <thead>
                      <tr>
                        <th>Mã phiếu
                        </th>
                        <th>Tên khách hàng
                        </th>
                        <th>Ngày khám bệnh
                        </th>
                        <th>Tổng chi phí
                        </th>
                        <th>Trạng thái thu phí
                        </th>
                        <th>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $MaBS = $_SESSION['bacsi']['id_bs'];
                        $phieu = "SELECT * FROM phieukhambenh WHERE phieukhambenh.id_bs = $MaBS";
                        $query_phieu = mysqli_query($mysqli, $phieu);
                        while($row_phieu = mysqli_fetch_array($query_phieu)) {
                          ?>
                            <tr>
                              <td><?php echo $row_phieu['maphieu'] ?></td>
                              <td><?php echo $row_phieu['tenkhachhang'] ?></td>
                              <td><?php echo $row_phieu['ngaylapphieu'] ?></td>
                              <td class="red-text font-weight-bold"><?php echo number_format($row_phieu['tongchiphi'], 0, '', '.')?> VNĐ</td>                      
                              <td><?php
                                if ($row_phieu['trangthaithuphi'] == 0) {
                                  echo '<b class="text-danger font-weight-bold">Chờ thu phí</b>';
                                }
                                else {
                                  echo '<b class="text-success font-weight-bold">Đã thu phí</b>';
                                }
                              ?></td>
                              <td>
                                <a class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="tooltip" data-placement="right" title="Xem chi tiết">
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
                <img src="../img/AnhDaiDien/<?php echo $row_bs['anhdaidien_bs'] ?>" class="rounded-circle" alt="Avatar">
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

        

      </section>
      <!-- Section: Basic examples -->

    </div>