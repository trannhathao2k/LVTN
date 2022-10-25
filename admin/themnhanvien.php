<div class="container-fluid">

      <!-- Section: Edit Account -->
      <section class="section">
      <form method="POST" action="./action-themnhanvien.php" enctype="multipart/form-data">
        <!-- First row -->
        <div class="row">
          <!-- First column -->
          <div class="col-lg-4 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header mdb-color blue">
                <h5 class="mb-0 font-weight-bold">ẢNH ĐẠI DIỆN</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div class="imageUploadContainerNew" style="font-family: Roboto,sans-serif;">
                  <div id="imageDefaultNew">
                      <img 
                          src="../img/default.jpg" 
                          alt="Ảnh xem trước" 
                          id="imagePreviewNew"
                          height="200px"
                          width="200px"
                          class="z-depth-1 mb-3 mx-auto">
                  </div>
                  <div class="imageUploadNew">
                      <input type="file" id="imageUploadInputNew" name="avatar" accept=".jpg,.png" hidden>
                      <!-- <span class="button" id="imageUploadInputBtn">Chọn Hình</span> -->
                      <div class="row flex-center">
                        <button type="button" class="btn btn-info btn-rounded btn-sm mt-3 mb-3" id="imageUploadInputBtnNew">Cập nhật ảnh đại diện</button>
                        <div id="cancelNew"></div>
                      </div> 

                  </div> 

                  <div id="uploadFileStatusNew"></div>
                  <div class="fileInfomationNew">
                      <p>
                          <b id="fileNameNew"></b> 
                          <span id="fileInfomation_nameNew"></span>
                      </p>
                      <p>
                          <b id="fileTypeNew"></b> 
                          <span id="fileInfomation_typeNew"></span>
                          <div id="uploadFileStatus3New"></div>
                      </p>
                      <p>
                          <b id="fileSizeNew"></b> 
                          <span id="fileInfomation_sizeNew"></span>
                          <div id="uploadFileStatus2New"></div>
                      </p>
                  </div>
              </div>
                <!-- <img src="./img/AnhDaiDien/pngtree-flat-default-avatar-png-image_2848906.jpg" id="anhdaidien" alt="User Photo" class="z-depth-1 mb-3 mx-auto" width="120px" />
                
                <div class="row flex-center">
                  <button class="btn btn-info btn-rounded btn-sm">Cập nhật ảnh đại diện</button><br>
                </div> -->
              </div>
              <!-- Card content -->


            </div>
            <!-- Card -->
            <!-- <div class="card card-cascade narrower mt-3">
              <label for="test">Tên tệp: </label>
              <input type="file" name="photo" id="test" onchange="taidulieu()">
              <p id="showdulieu"></p>
              <a class="btn btn-sm btn-primary">CLICK</a>
            </div>
            <script>
              function taidulieu() {
                x = document.getElementById('test').value.target;
                document.getElementById('showdulieu').innerHTML = x;
              }
            </script> -->

          </div>
          <!-- First column -->

          <!-- Second column -->
          <div class="col-lg-8 mb-4">

                    <!-- Card -->
            <div class="card card-cascade narrower">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header mdb-color blue">
                    <h5 class="mb-0 font-weight-bold">THÔNG TIN CÁ NHÂN</h5>
                </div>
                <!-- Card image -->

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Edit Form -->
                    <form method="POST" action="./action-themnhanvien.php">
                    <!-- First row -->

                    <div class="row">

                        <!-- First column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="unamenv" id="unamenv" class="form-control validate" value="<?php
                                $id_nv = "SELECT MAX(id_nv) id_max FROM nhanvien";
                                $query_id_nv = mysqli_query($mysqli, $id_nv);
                                $row_id_nv = mysqli_fetch_array($query_id_nv);
                                $id_nv_new = $row_id_nv['id_max'] + 1;
                                if($row_id_nv['id_max'] < 10) {
                                echo "nhanvien0$id_nv_new";
                                }
                                else {
                                    echo "nhanvien$id_nv_new";
                                }
                            ?>" readonly disabled>
                            <label for="unamenv" data-error="wrong" data-success="right">Tên đăng nhập</label>
                        </div>
                        </div>
                        <!-- Second column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="passwdnv" id="passwdnv" class="form-control validate" value="<?php
                                if($row_id_nv['id_max'] < 10) {
                                    echo "nhanvien0$id_nv_new";
                                }
                                else {
                                    echo "nhanvien$id_nv_new";
                                }
                            ?>" readonly disabled>
                            <label for="passwdnv" data-error="wrong" data-success="right">Mật khẩu</label>
                        </div>
                        </div>
                    </div>
                    <!-- First row -->

                    <!-- First row -->
                    <div class="row">
                        <!-- First column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="hotennv" id="hotennv" class="form-control validate" required>
                            <label for="hotennv" data-error="wrong" data-success="right">Họ tên nhân viên</label>
                        </div>
                        </div>

                        <!-- Second column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" name="emailnv" id="emailnv" class="form-control validate">
                            <label for="emailnv" data-error="wrong" data-success="right">Email</label>
                        </div>
                        </div>
                    </div>
                    <!-- First row -->

                    <!-- Second row -->
                    <div class="row">

                        <!-- First column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="sdtnv" id="sdtnv" class="form-control validate">
                            <label for="sdtnv">Số điện thoại</label>
                        </div>
                        </div>
                        <!-- Second column -->

                        <div class="col-md-3">
                        <div class="md-form mb-0">
                            <input type="text" name="namsinhnv" id="namsinhnv" class="form-control validate">
                            <label for="namsinhnv" data-error="wrong" data-success="right">Năm sinh</label>
                        </div>
                        </div>
                        <div class="col-md-3 ">
                        </div>

                        

                        

                    </div>
                    <!-- Second row -->

                    <div class="row">
                        <!-- <div class="col-md-6">
                        </div> -->

                        <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                            <div class="md-form">
                                <p class="form-control mb-0 ml-0" style="border: 0">Giới tính:</p>
                            </div>
                            </div> 
                            <div class="col-md-6 mb-0">
                            <div class="md-form mb-0 ml-0 form-group">
                                <input class="form-check-input" type="radio" id="nam" name="gioitinhnv" value="Nam">
                                <label for="nam" class="form-check-label">Nam</label>
                                <input class="form-check-input" type="radio" id="nu" name="gioitinhnv" value="Nu">
                                <label for="nu" class="form-check-label">Nữ</label>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Third row -->
                    <div class="row">

                        <!-- First column -->
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <textarea type="text" name="diachinv" id="diachinv" class="md-textarea form-control" rows="3"></textarea>
                                <label for="diachinv">Địa chỉ</label>
                            </div>
                        </div>
                        <div class="col-md-12" hidden>
                            <div class="md-form mb-0">
                            <input id="avatarnv" name="avatarnv" value=""></input>     
                            </div>
                        </div>
                    </div>
                    <!-- Third row -->

                    <!-- Fourth row -->
                    <div class="row">
                        <div class="col-md-12 text-center my-4">
                        <input type="submit" name="registernv" id="registernv" value="TẠO TÀI KHOẢN" class="btn btn-info btn-rounded">
                        </div>
                    </div>
                    <!-- Fourth row -->

                    </form>
                    <!-- Edit Form -->

                </div>
                <!-- Card content -->

            </div>
            <!-- Card -->

        </div>
          <!-- Second column -->


        </div>
        <!-- First row -->
      </form>

      </section>
      <!-- Section: Edit Account -->

    </div>

    <script type="text/javascript" src="./js/uploadimage-nv.js"></script>