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
                          src="../<?php
                            if (isset($_GET['manv'])) {
                                $idnv = $_GET['manv'];
                                $sql_manv = "SELECT * FROM nhanvien WHERE id_nv = $idnv";
                                $nhanvien = $mysqli->query($sql_manv)->fetch_assoc();
                                echo $nhanvien['anhdaidien_nv'];
                            }
                            else {
                                echo 'img/default.jpg';
                            }
                          ?>" 
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
                        <button type="button" class="btn btn-info btn-rounded btn-sm mt-3 mb-3" id="imageUploadInputBtnNew"><?php
                            if (isset($_GET['manv'])) {
                                echo 'Cập nhật ảnh đại diện';
                            }
                            else {
                                echo 'Thêm ảnh đại diện';
                            }
                        ?></button>
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
                    <p id="idnv" hidden><?php if(isset($_GET['manv'])) {
                        $MaNV = $_GET['manv'];
                        echo $MaNV;
                    }
                    else {
                        echo "ADD";
                    }
                    ?></p>
                </div>
                <!-- Card image -->

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Edit Form -->
                    <form method="POST" action="./action-themnhanvien.php">
                    <!-- First row -->

                    <?php
                        if (!isset($_GET['manv'])) {
                            ?>
                                <div class="row">
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
                            <?php
                        }
                    ?>
                    
                    <!-- First row -->

                    <!-- First row -->
                    <div class="row">
                        <!-- First column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="hotennv" id="hotennv" class="form-control mt-3" <?php
                                if (isset($_GET['manv'])) {
                                    echo 'value="'.$nhanvien['hoten_nv'].'"';
                                }
                            ?> oninput="checkNameNV()" required>
                            <label for="hotennv" data-error="wrong" data-success="right">Họ tên nhân viên</label>
                            <div id="check-NameNV" class="mb-5" style="text-align: right"></div>
                        </div>
                        </div>

                        <!-- Second column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" name="emailnv" id="emailnv" class="form-control mt-3"  <?php
                                if (isset($_GET['manv'])) {
                                    echo 'value="'.$nhanvien['email_nv'].'"';
                                }
                            ?> oninput="checkEmailNV()" required>
                            <label for="emailnv" data-error="wrong" data-success="right">Email</label>
                            <div id="check-EmailNV" style="text-align: right" class="mb-5"></div>
                        </div>
                        </div>
                    </div>
                    <!-- First row -->

                    <!-- Second row -->
                    <div class="row">

                        <!-- First column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="sdtnv" id="sdtnv" class="form-control" <?php
                                if (isset($_GET['manv'])) {
                                    echo 'value="'.$nhanvien['sdt_nv'].'"';
                                }
                            ?> oninput="checkNumberPhoneNV()" required>
                            <label for="sdtnv">Số điện thoại</label>
                            <div id="check-numberPhoneNV" style="text-align: right" class="mb-5"></div>
                        </div>
                        </div>
                        <!-- Second column -->

                        <div class="col-md-3">
                        <div class="md-form mb-0">
                            <input type="text" name="namsinhnv" id="namsinhnv" class="form-control" <?php
                                if (isset($_GET['manv'])) {
                                    echo 'value="'.$nhanvien['namsinh'].'"';
                                }
                            ?> oninput="checkBirthDayNV()" required>
                            <label for="namsinhnv" data-error="wrong" data-success="right">Năm sinh</label>
                            <div id="check-birthDayNV" style="text-align: right" class="mb-5"></div>
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
                                <input class="form-check-input mb-5" type="radio" id="nam" name="gioitinhnv" value="Nam" <?php
                                    if (isset($_GET['manv']) && $nhanvien['gioitinh_nv'] == "Nam") {
                                        echo 'checked';
                                    }
                                ?>>
                                <label for="nam" class="form-check-label">Nam</label>
                                <input class="form-check-input mb-5" type="radio" id="nu" name="gioitinhnv" value="Nu" <?php
                                    if (isset($_GET['manv']) && $nhanvien['gioitinh_nv'] == "Nu") {
                                        echo 'checked';
                                    }
                                ?>>
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
                                <textarea type="text" name="diachinv" id="diachinv" class="md-textarea form-control" rows="3" required><?php
                                if (isset($_GET['manv'])) {
                                    echo $nhanvien['diachi_nv'];
                                }
                            ?></textarea>
                                <label for="diachinv">Địa chỉ</label>
                            </div>
                        </div>
                        <div class="col-md-12" hidden>
                            <div class="md-form mb-0">
                            <input id="avatarnv" name="avatarnv" value=""></input>     
                            </div>
                        </div>
                        <?php
                            if (isset($_GET['manv'])) {
                                ?>
                                <div class="col-md-12" hidden>
                                    <div class="md-form mb-0">
                                    <input id="manv" name="manv" value="<?php echo $MaNV ?>"></input>     
                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <!-- Third row -->

                    <!-- Fourth row -->
                    <div class="row">
                        <div class="col-md-12 text-center my-4">
                            <?php
                                if (!isset($_GET['manv'])) {
                                    echo '<input type="submit" name="registernv" id="registernv" value="TẠO TÀI KHOẢN" class="btn btn-info btn-rounded">';
                                }
                                else {
                                    echo '<input type="submit" name="updatenv" id="updatenv" value="LƯU THAY ĐỔI" class="btn btn-info btn-rounded">';
                                }
                            ?>
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
    <script>
        function checkNameNV() {
            var name = document.getElementById('hotennv');
            var checkNameNV = document.getElementById('check-NameNV');

            if (name.value.length == 0) {
                checkNameNV.innerHTML = `<p style="color: red; font-size: 12px;">Họ tên không được để trống</p>`;
                document.querySelector('#hotennv').style.borderBottom = '2px solid red';
            }
            else {
                checkNameNV.innerHTML = `<p style="color: green; font-size: 12px;">Họ tên hợp lệ</p>`;
                document.querySelector('#hotennv').style.borderBottom = '2px solid green';
            }
        }

        function checkEmailNV() {
            var email = document.getElementById('emailnv');
            var checkEmail = document.getElementById('check-EmailNV');
            var manv = document.getElementById('idnv').innerHTML;

            function validatEemail(x) {
                var atposition = x.indexOf("@");
                var dotposition = x.lastIndexOf(".");
                if (atposition < 1 || dotposition < (atposition + 2)
                        || (dotposition + 2) >= x.length) {
                    return false;
                }
            }

            if (email.value.length == 0) {
                checkEmail.innerHTML = `<p style="color: red; font-size: 12px;">Email không được để trống</p>`;
                document.querySelector('#emailnv').style.borderBottom = '2px solid red';
            }
            else if (validatEemail(email.value) == false) {
                checkEmail.innerHTML = `<p style="color: red; font-size: 12px;">Email phải có định dạng abc@gmail.com</p>`;
                document.querySelector('#emailnv').style.borderBottom = '2px solid red';
            }
            else {
                document.querySelector('#emailnv').style.borderBottom = '2px solid #ced4da';
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("check-EmailNV").innerHTML =(this.responseText);
                }
                };
                xmlhttp.open("GET", "action-check-bacsi.php?action-nv=checkEmail&email=" + email.value + "&manv=" + manv, true);
                xmlhttp.send();
            }
        }

        function checkNumberPhoneNV() {
            var numberPhone = document.getElementById('sdtnv');
            var checkNumberPhone = document.getElementById('check-numberPhoneNV');
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var manv = document.getElementById('idnv').innerHTML;

            if (numberPhone.value.length == 0) {
                checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Số điện thoại không được để trống</p>`;
                document.querySelector('#sdtnv').style.borderBottom = '2px solid red';
            }
            else if (numberPhone.value.length != 10) {
                checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Số điện thoại phải có 10 số</p>`;
                document.querySelector('#sdtnv').style.borderBottom = '2px solid red';
            }
            else if (vnf_regex.test(numberPhone.value) == false) {
                checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Dữ liệu nhập vào có ký tự không phải số hoặc đầu số chưa đúng (09, 03, 07, 08, 05)</p>`;
                document.querySelector('#sdtnv').style.borderBottom = '2px solid red';
            }
            else {
                document.querySelector('#sdtnv').style.borderBottom = '2px solid #ced4da';
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("check-numberPhoneNV").innerHTML =(this.responseText);
                }
                };
                xmlhttp.open("GET", "action-check-bacsi.php?action-nv=checkNumberPhone&numberPhone=" + numberPhone.value + "&manv=" + manv, true);
                xmlhttp.send();
            }
        }

        function checkBirthDayNV() {
            var birthDay = document.getElementById('namsinhnv');
            var checkBirthDay = document.getElementById('check-birthDayNV');
            var vnf_regex = /(([0-9]{4})\b)/g;

            if (vnf_regex.test(birthDay.value) == false) {
                checkBirthDay.innerHTML = `<p style="color: red; font-size: 12px;">Năm sinh phải là số và có 4 chữ số</p>`;
                document.querySelector('#namsinhnv').style.borderBottom = '2px solid red';
            }
            else {
                checkBirthDay.innerHTML = `<p style="color: green; font-size: 12px;">Năm sinh hợp lệ</p>`;
                document.querySelector('#namsinhnv').style.borderBottom = '2px solid green';
            }
        }
    </script>