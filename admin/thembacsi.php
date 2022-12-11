<div class="container-fluid">

      <!-- Section: Edit Account -->
      <section class="section">
      <form method="POST" action="./action-thembacsi.php" enctype="multipart/form-data">
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
                            if (isset($_GET['mabs'])) {
                                $idbs = $_GET['mabs'];
                                $sql_mabs = "SELECT * FROM bacsi WHERE id_bs = $idbs";
                                // $query_bacsi = mysqli_query($mysqli, $sql_mabs);
                                // $bacsi = mysqli_fetch_assoc($query_bacsi);
                                $bacsi = $mysqli->query($sql_mabs)->fetch_assoc();
                                echo $bacsi['anhdaidien_bs'];
                            }
                            else {
                                echo 'img/default.jpg';
                            }
                          ?>" 
                          alt="Ảnh xem trước" 
                          id="imagePreviewNew"
                          height="200px"
                          width="200px"
                          class="z-depth-1 mb-3 mx-auto"
                          style="overflow: hidden;">
                  </div>
                  <div class="imageUploadNew">
                      <input type="file" id="imageUploadInputNew" name="avatar" accept=".jpg,.png" hidden>
                      <!-- <span class="button" id="imageUploadInputBtn">Chọn Hình</span> -->
                      <div class="row flex-center">
                        <button type="button" class="btn btn-info btn-rounded btn-sm mt-3 mb-3" id="imageUploadInputBtnNew"><?php
                            if (isset($_GET['mabs'])) {
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
                    <p id="idbs" hidden><?php if(isset($_GET['mabs'])) {
                        $MaBS = $_GET['mabs'];
                        echo $MaBS;
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
                    <form method="POST" action="./action-thembacsi.php">
                    <!-- First row -->

                        <?php
                            if (!isset($_GET['mabs'])) {
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" name="unamebs" id="unamebs" class="form-control validate" value="<?php
                                                $id_bs = "SELECT MAX(id_bs) id_max FROM bacsi";
                                                $query_id_bs = mysqli_query($mysqli, $id_bs);
                                                $row_id_bs = mysqli_fetch_array($query_id_bs);
                                                $id_bs_new = $row_id_bs['id_max'] + 1;
                                                if($row_id_bs['id_max'] < 10) {
                                                echo "bacsi0$id_bs_new";
                                                }
                                                else {
                                                    echo "bacsi$id_bs_new";
                                                }
                                            ?>" readonly disabled>
                                            <label for="unamebs" data-error="wrong" data-success="right">Tên đăng nhập</label>
                                        </div>
                                    </div>
                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" name="passwdbs" id="passwdbs" class="form-control validate" value="<?php
                                                if($row_id_bs['id_max'] < 10) {
                                                    echo "bacsi0$id_bs_new";
                                                }
                                                else {
                                                    echo "bacsi$id_bs_new";
                                                }
                                            ?>" readonly disabled>
                                            <label for="passwdbs" data-error="wrong" data-success="right">Mật khẩu</label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>              

                    <!-- First row -->
                    <div class="row">
                        <!-- First column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="hotenbs" id="hotenbs" class="form-control mt-3" <?php
                                if (isset($_GET['mabs'])) {
                                    echo 'value="'.$bacsi['hoten_bs'].'"';
                                }
                            ?> oninput="checkNameBS()" required>
                            <label for="hotenbs" data-error="wrong" data-success="right">Họ tên bác sĩ</label>
                            <div id="check-NameBS" class="mb-5" style="text-align: right"></div>
                        </div>
                        </div>

                        <!-- Second column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="email" name="emailbs" id="emailbs" class="form-control mt-3" <?php
                                if (isset($_GET['mabs'])) {
                                    echo 'value="'.$bacsi['email_bs'].'"';
                                }
                            ?> oninput="checkEmailBS()" required>
                            <label for="emailbs" data-error="wrong" data-success="right">Email</label>
                            <div id="check-EmailBS" style="text-align: right" class="mb-5"></div>
                        </div>
                        </div>
                    </div>
                    <!-- First row -->

                    <!-- Second row -->
                    <div class="row">

                        <!-- First column -->
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="sdtbs" id="sdtbs" class="form-control" oninput="checkNumberPhoneBS()" <?php
                                if (isset($_GET['mabs'])) {
                                    echo 'value="'.$bacsi['sdt_bs'].'"';
                                }
                            ?> required>
                            <label for="sdtbs">Số điện thoại</label>
                            <div id="check-numberPhoneBS" style="text-align: right" class="mb-5"></div>
                        </div>
                        </div>
                        <!-- Second column -->

                        <div class="col-md-3">
                        <div class="md-form mb-0">
                            <input type="text" name="tuoibs" id="tuoibs" class="form-control" <?php
                                if (isset($_GET['mabs'])) {
                                    echo 'value="'.$bacsi['namsinh_bs'].'"';
                                }
                            ?> oninput="checkBirthDayBS()" required>
                            <label for="tuoibs" data-error="wrong" data-success="right">Năm sinh</label>
                            <div id="check-birthDayBS" style="text-align: right" class="mb-5"></div>
                        </div>
                        </div>
                        <div class="col-md-3 ">
                        </div>

                        

                        

                    </div>
                    <!-- Second row -->

                    <div class="row">
                        <div class="col-md-6">
                        <div class="md-form mb-5">
                            <textarea type="text" name="gioithieu" id="gioithieu" class="md-textarea form-control mb-5" required><?php
                                if (isset($_GET['mabs'])) {
                                    echo $bacsi['gioithieu'];
                                }
                            ?></textarea>
                            <label for="gioithieu">Giới thiệu</label>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                            <div class="md-form">
                                <p class="form-control mb-0 ml-0" style="border: 0">Giới tính:</p>
                            </div>
                            </div> 
                            <div class="col-md-6 mb-0">
                            <div class="md-form mb-0 ml-0 form-group">
                                <input class="form-check-input mb-5" type="radio" id="nam" name="gioitinhbs" value="Nam" <?php
                                if (isset($_GET['mabs']) && $bacsi['gioitinh_bs'] == "Nam") {
                                    echo 'checked';
                                }
                            ?>>
                                <label for="nam" class="form-check-label">Nam</label>
                                <input class="form-check-input mb-5" type="radio" id="nu" name="gioitinhbs" value="Nu" <?php
                                if (isset($_GET['mabs']) && $bacsi['gioitinh_bs'] == "Nu") {
                                    echo 'checked';
                                }
                            ?>>
                                <label for="nu" class="form-check-label">Nữ</label>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="chuyenmon" id="chuyenmon" class="form-control mb-5" <?php
                                if (isset($_GET['mabs'])) {
                                    echo 'value="'.$bacsi['chuyenmon'].'"';
                                }
                            ?> required>
                            <label for="chuyenmon">Chuyên môn</label>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" name="kinhnghiem" id="kinhnghiem" class="form-control mb-5" <?php
                                if (isset($_GET['mabs'])) {
                                    echo 'value="'.$bacsi['kinhnghiem'].'"';
                                }
                            ?> required>
                                <label for="kinhnghiem">Kinh nghiệm</label>
                            </div>
                        </div>
                    </div>

                    <!-- Third row -->
                    <div class="row">

                        <!-- First column -->
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <textarea type="text" name="diachibs" id="diachibs" class="md-textarea form-control" rows="3" required><?php
                                if (isset($_GET['mabs'])) {
                                    echo $bacsi['diachi_bs'];
                                }
                            ?></textarea>
                                <label for="diachibs">Địa chỉ</label>
                            </div>
                        </div>
                        <div class="col-md-12" hidden>
                            <div class="md-form mb-0">
                            <input id="avatarbs" name="avatarbs" value=""></input>     
                            </div>
                        </div>
                        <?php
                            if (isset($_GET['mabs'])) {
                                ?>
                                <div class="col-md-12" hidden>
                                    <div class="md-form mb-0">
                                    <input id="mabs" name="mabs" value="<?php echo $MaBS ?>"></input>     
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
                                if (!isset($_GET['mabs'])) {
                                    echo '<input type="submit" name="registerbs" id="registerbs" value="TẠO TÀI KHOẢN" class="btn btn-info btn-rounded">';
                                }
                                else {
                                    echo '<input type="submit" name="updatebs" id="updatebs" value="LƯU THAY ĐỔI" class="btn btn-info btn-rounded">';
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

    <script type="text/javascript" src="./js/uploadimage-bs.js"></script>
    <script>
        function checkNameBS() {
            var name = document.getElementById('hotenbs');
            var checkNameBS = document.getElementById('check-NameBS');

            if (name.value.length == 0) {
                checkNameBS.innerHTML = `<p style="color: red; font-size: 12px;">Họ tên không được để trống</p>`;
                document.querySelector('#hotenbs').style.borderBottom = '2px solid red';
            }
            else {
                checkNameBS.innerHTML = `<p style="color: green; font-size: 12px;">Họ tên hợp lệ</p>`;
                document.querySelector('#hotenbs').style.borderBottom = '2px solid green';
            }
        }

        function checkEmailBS() {
            var email = document.getElementById('emailbs');
            var checkEmail = document.getElementById('check-EmailBS');
            var mabs = document.getElementById('idbs').innerHTML;

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
                document.querySelector('#emailbs').style.borderBottom = '2px solid red';
            }
            else if (validatEemail(email.value) == false) {
                checkEmail.innerHTML = `<p style="color: red; font-size: 12px;">Email phải có định dạng abc@gmail.com</p>`;
                document.querySelector('#emailbs').style.borderBottom = '2px solid red';
            }
            else {
                document.querySelector('#emailbs').style.borderBottom = '2px solid #ced4da';
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("check-EmailBS").innerHTML =(this.responseText);
                }
                };
                xmlhttp.open("GET", "action-check-bacsi.php?action-bs=checkEmail&email=" + email.value + "&mabs=" + mabs, true);
                xmlhttp.send();
            }
        }

        function checkNumberPhoneBS() {
            var numberPhone = document.getElementById('sdtbs');
            var checkNumberPhone = document.getElementById('check-numberPhoneBS');
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mabs = document.getElementById('idbs').innerHTML;

            if (numberPhone.value.length == 0) {
                checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Số điện thoại không được để trống</p>`;
                document.querySelector('#sdtbs').style.borderBottom = '2px solid red';
            }
            else if (numberPhone.value.length != 10) {
                checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Số điện thoại phải có 10 số</p>`;
                document.querySelector('#sdtbs').style.borderBottom = '2px solid red';
            }
            else if (vnf_regex.test(numberPhone.value) == false) {
                checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Dữ liệu nhập vào có ký tự không phải số hoặc đầu số chưa đúng (09, 03, 07, 08, 05)</p>`;
                document.querySelector('#sdtbs').style.borderBottom = '2px solid red';
            }
            else {
                document.querySelector('#sdtbs').style.borderBottom = '2px solid #ced4da';
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("check-numberPhoneBS").innerHTML =(this.responseText);
                }
                };
                xmlhttp.open("GET", "action-check-bacsi.php?action-bs=checkNumberPhone&numberPhone=" + numberPhone.value + "&mabs=" + mabs, true);
                xmlhttp.send();
            }
        }

        function checkBirthDayBS() {
            var birthDay = document.getElementById('tuoibs');
            var checkBirthDay = document.getElementById('check-birthDayBS');
            var vnf_regex = /(([0-9]{4})\b)/g;

            if (vnf_regex.test(birthDay.value) == false) {
                checkBirthDay.innerHTML = `<p style="color: red; font-size: 12px;">Năm sinh phải là số và có 4 chữ số</p>`;
                document.querySelector('#tuoibs').style.borderBottom = '2px solid red';
            }
            else {
                checkBirthDay.innerHTML = `<p style="color: green; font-size: 12px;">Năm sinh hợp lệ</p>`;
                document.querySelector('#tuoibs').style.borderBottom = '2px solid green';
            }
        }
        
    </script>