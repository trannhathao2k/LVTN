<div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body" style="min-height: 500px">
              <h5 class="font-weight-bold white-text bg-info p-3 mt-0" style="text-align: center;">TRẠNG THÁI LÀM VIỆC CỦA BÁC SĨ</h5>
              <div class="row">
                <?php
                    $sql_bs = "SELECT * FROM bacsi";
                    $query_bs = mysqli_query($mysqli, $sql_bs);                           
                    while($bacsi = mysqli_fetch_array($query_bs)) {
                        $id_bs = $bacsi['id_bs'];
                        $sql_trangthai = "SELECT COUNT(*) ktra FROM phieukhambenh WHERE trangthaikhambenh = 'Đang khám' AND id_bs = $id_bs";
                        $query_trangthai = mysqli_query($mysqli, $sql_trangthai);
                        $trangthai = mysqli_fetch_assoc($query_trangthai);
                        if ($trangthai['ktra'] != 0) {
                            ?>
                            <div class="col-sm-3 canggiua mt-3 mb-3">
                                <div class="canhgiua" style="width: 90%; height: 100px;background-color: #00c851!important;border: 3px solid #00c851!important;border-radius: 10px;margin: auto;vertical-align: middle;color: white;font-weight: bold;">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="../<?php echo $bacsi['anhdaidien_bs'] ?>" height="50px" width="50px" class="rounded-circle" style="overflow: hidden;" alt="Avatar-BS-<?php echo $bacsi['hoten_bs'] ?>">
                                            </div>
                                            <div class="col-sm-8">
                                                <div style="font-size: 16px;"><?php echo $bacsi['hoten_bs'] ?></div>
                                                <div style="font-size: 11px;">ĐANG KHÁM BỆNH</div>
                                            </div>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        else {
                            ?>
                            <div class="col-sm-3 canggiua mt-3 mb-3">
                                <div class="canhgiua" style="width: 90%; height: 100px;border: 3px solid #00c851!important;border-radius: 10px;margin: auto;vertical-align: middle;font-weight: bold;">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="../<?php echo $bacsi['anhdaidien_bs'] ?>" height="50px" width="50px" class="rounded-circle" style="overflow: hidden;" alt="Avatar-BS">
                                            </div>
                                            <div class="col-sm-8">
                                                <div style="font-size: 16px;"><?php echo $bacsi['hoten_bs'] ?></div>
                                                <div style="font-size: 11px;">CHƯA CÓ KHÁCH HÀNG</div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
              </div>
              </div>
          </div>
      </div>
</div>