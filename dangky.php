<?php
include("./config.php");
include("./ham.php");
session_start();

if(isset($_SESSION['khachhang'])) {
  $MaKH = $_SESSION['khachhang']['id_kh'];
  $sql_kh = "SELECT * FROM khachhang WHERE id_kh = $MaKH";
  $query_kh = mysqli_query($mysqli, $sql_kh);
  $khachhang = mysqli_fetch_array($query_kh);

  $dangnhap = true;
}
else {
  $dangnhap = false;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php
    if ($dangnhap) {
      echo 'Cập nhật thông tin khách hàng '.$khachhang['hoten_kh'];
    }
    else {
      echo 'Đăng ký tài khoản - Nha khoa Implant TQueen';
    }
  ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="./css/dangky/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="./css/dangky/mdb.min.css">
  <link rel="stylesheet" href="./css/dangky/style.css">

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

<body class="fixed-sn white-skin" style="background-image: url(./img/Images/doctor.jpg); ">

  <!-- Main Navigation -->
  <header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar elegant-color-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <a class="navbar-brand font-weight-bold title" href="./index.php">
              <img src="./img/TQueen-logo-removebg-preview.png" alt="logo">
            </a>
          </div>
          <div class="col-md-7" style="display: flex; align-items: center;">
            <h3 class="h1-responsive font-weight-bold mt-0 ml-3 white-text">
            <?php
              if ($dangnhap) {
                echo 'CẬP NHẬT';
              }
              else {
                echo 'ĐĂNG KÝ';
              }
            ?>
            </h3>
          </div>
        </div>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item">
            <?php
              if ($dangnhap) {
                echo '<a class="nav-link" href="./trangcanhan-kh.php">Về lại trang cá nhân</a>';
              }
              else {
                echo '<a class="nav-link" href="./dangnhap.php">Đăng nhập</a>';
              }
            ?>
          </li>
        </ul>
        
      </div>
    </nav>
    <!-- Navbar -->

  </header>
  <!-- Main Navigation -->

  <!-- Main layout -->
  <main class="mt-3">
    <div class="container-fluid">

      <!-- Section: Edit Account -->
      <section class="section">
      <form method="POST" action="./action-dangky.php" enctype="multipart/form-data">
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
                <div class="imageUploadContainer" style="font-family: Roboto,sans-serif;">
                  <div id="imageDefault">
                      <img 
                          src="<?php
                            if ($dangnhap == 1) {
                              echo $khachhang['anhdaidien_kh']; 
                            }
                            else {
                              echo 'img/default.jpg';
                            }
                          ?>" 
                          alt="Ảnh xem trước" 
                          id="imagePreview"
                          height="200px"
                          width="200px"
                          class="z-depth-1 mb-3 mx-auto">
                  </div>
                  <div class="imageUpload">
                      <input type="file" id="imageUploadInput" name="avatar" accept=".jpg,.png" hidden>
                      <!-- <span class="button" id="imageUploadInputBtn">Chọn Hình</span> -->
                      <div class="row flex-center">
                        <button type="button" class="btn btn-info btn-rounded btn-sm mt-3 mb-3" id="imageUploadInputBtn">Cập nhật ảnh đại diện</button>
                        <div id="cancel"></div>
                      </div> 

                  </div> 

                  <div id="uploadFileStatus"></div>
                  <div class="fileInfomation">
                      <p>
                          <b id="fileName"></b> 
                          <span id="fileInfomation_name"></span>
                      </p>
                      <p>
                          <b id="fileType"></b> 
                          <span id="fileInfomation_type"></span>
                          <div id="uploadFileStatus3"></div>
                      </p>
                      <p>
                          <b id="fileSize"></b> 
                          <span id="fileInfomation_size"></span>
                          <div id="uploadFileStatus2"></div>
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
              <!-- <form method="POST" action="./action-dangky.php" enctype="multipart/form-data"> -->
                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                  <!-- Edit Form -->
                  
                    <!-- First row -->

                    <div class="row">
                      <?php
                          if (!$dangnhap) {
                            ?>
                      <!-- First column -->
                          <div class="col-md-6">
                            <div class="md-form mb-0">
                              <input type="text" name="uname" id="uname" class="form-control" oninput="checkUserName()">
                              <label for="uname" data-error="wrong" data-success="right">Tên đăng nhập</label>
                              <div id="check-uname" style="text-align: right"></div>
                            </div>
                          </div>
                            <?php
                          }
                        ?>
                        
                      
                      <!-- Second column -->
                      <?php
                          if (!$dangnhap) {
                            ?>
                      <div class="col-md-6">
                        <div class="md-form mb-0">
                          <input type="password" name="passwd" id="passwd" class="form-control" oninput="checkPassword()">
                          <label for="passwd" data-error="wrong" data-success="right">Mật khẩu</label>
                          <div id="check-passwd" style="text-align: right"></div>
                        </div>
                      </div>
                      <?php } ?>
                    <!-- </div> -->
                    <!-- First row -->

                    <!-- First row -->
                    <!-- <div class="row"> -->
                      <!-- First column -->
                      
                          <div class="col-md-6">
                            <div class="md-form mb-0 mt-4">
                              <input type="text" name="hotenkh" id="hotenkh" class="form-control" oninput="checkName()" <?php
                                  if ($dangnhap) { 
                                    echo 'value="'.$khachhang['hoten_kh'].'"'; 
                                  }
                                    ?>>
                              <label for="hotenkh" data-error="wrong" data-success="right">Họ tên khách hàng</label>
                              <div id="check-name" style="text-align: right"></div>
                            </div>
                          </div>

                      <!-- Second column -->
                      <?php
                          if (!$dangnhap) {
                            ?>
                      <div class="col-md-6">
                        <div class="md-form mb-0 mt-4">
                          <input type="password" name="confirmPass" id="confirmPass" class="form-control" oninput="checkConfirmPass()">
                          <label for="confirmPass" data-error="wrong" data-success="right">Nhập lại mật khẩu</label>
                          <div id="check-confirmPass" style="text-align: right"></div>
                        </div>
                      </div>
                      <?php } ?>
                    <!-- </div> -->
                    <!-- First row -->

                    <!-- Second row -->
                    <!-- <div class="row"> -->

                      <!-- First column -->
                      <div class="col-md-6">
                        <div class="md-form mb-0 mt-4">
                          <input type="text" name="sdtkh" id="sdtkh" class="form-control" oninput="checkNumberPhone()" <?php
                                  if ($dangnhap) { 
                                    echo 'value="'.$khachhang['sdt_kh'].'"'; 
                                  }
                                    ?>>
                          <label for="sdtkh">Số điện thoại</label>
                          <div id="check-numberPhone" style="text-align: right"></div>
                        </div>
                      </div>
                      <!-- Second column -->

                      <div class="col-md-3">
                        <div class="md-form mb-0 mt-4">
                          <input type="number" name="tuoikh" id="tuoikh" min="1900" max="2022" class="form-control" oninput="checkBirthDay()" <?php
                                  if ($dangnhap) { 
                                    echo 'value="'.$khachhang['tuoi_kh'].'"'; 
                                  }
                                    ?>>
                          <label for="tuoikh" data-error="wrong" data-success="right">Năm sinh</label>
                          <div id="check-birthDay" style="text-align: right"></div>
                        </div>
                      </div>
                      <?php
                          if (!$dangnhap) {
                            ?>
                        <div class="col-md-3"></div>
                          <?php } ?>
                      

                    <!-- </div> -->
                    <!-- Second row -->

                    <!-- <div class="row"> -->
                      <div class="col-md-6">
                        <div class="md-form mb-0 mt-4">
                          <input type="email" name="emailkh" id="emailkh" class="form-control" oninput="checkEmail()" <?php
                                  if ($dangnhap) { 
                                    echo 'value="'.$khachhang['email_kh'].'"'; 
                                  }
                                    ?>>
                          <label for="emailkh">Email</label>
                          <div id="check-email" style="text-align: right"></div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row mt-4">
                          <div class="col-md-3">
                            <div class="md-form">
                              <p class="form-control mb-0 ml-0" style="border: 0">Giới tính:</p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="md-form mb-0 ml-0 form-group">
                              <input class="form-check-input" type="radio" id="nam" name="gioitinh" value="Nam" <?php
                                if($dangnhap) {
                                  if ($khachhang['gioitinh_kh'] === "Nam") {
                                  echo ' checked';
                                }
                                }
                              ?> onclick="document.getElementById('check-gioitinh-input').innerHTML = 1">
                              <label for="nam" class="form-check-label">Nam</label>
                              <input class="form-check-input" type="radio" id="nu" name="gioitinh" value="Nu" <?php
                                if ($dangnhap) {
                                  if ($khachhang['gioitinh_kh'] === "Nữ") {
                                    echo ' checked';
                                  }
                                }                               
                              ?> onclick="document.getElementById('check-gioitinh-input').innerHTML = 1">
                              <label for="nu" class="form-check-label">Nữ</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- </div> -->

                    <!-- Third row -->
                    <!-- <div class="row"> -->

                      <!-- First column -->
                      <div class="col-md-12">
                        <div class="md-form mb-0">
                          <textarea type="text" name="diachikh" id="diachikh" class="md-textarea form-control" rows="3" required><?php
                                  if ($dangnhap) { 
                                    echo $khachhang['diachi_kh']; 
                                  }
                                    ?></textarea>
                          <label for="diachikh">Địa chỉ</label>
                        </div>
                      </div>
                      <div class="col-md-12" hidden>
                        <div class="md-form mb-0">
                          <input id="avatarkh" name="avatarkh" value=""></input>     
                        </div>
                      </div>
                      
                    </div>
                    <!-- Third row -->

                    <!-- Fourth row -->
                    <div class="row">
                      <div class="col-md-12 text-center my-4">
                        <input type="submit" name="register" id="register" value="LƯU" class="btn btn-info btn-rounded">
                      </div>
                    </div>
                    <!-- Fourth row -->


                  <!-- Edit Form -->

                </div>
                <!-- Card content -->
              <!-- </form> -->

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

  </main>
  <!-- Main layout -->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="./js/dangky/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="./js/dangky/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="./js/dangky/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="./js/dangky/mdb.min.js"></script>

  <script type="text/javascript" src="./js/uploadimage.js"></script>
  <!-- Custom scripts -->
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

  </script>
  <script>
    // function kiemtra() {
    //   var uname = document.getElementById('check-uname-input').innerHTML;
    //   var passwd = document.getElementById('check-passwd-input').innerHTML;
    //   var name = document.getElementById('check-name-input').innerHTML;
    //   var confirmPass = document.getElementById('check-confirmPass-input').innerHTML;
    //   var numberPhone = document.getElementById('check-numberPhone-input').innerHTML;
    //   var birthDay = document.getElementById('check-birthDay-input').innerHTML;
    //   var email = document.getElementById('check-email-input').innerHTML;
    //   var gioitinh = document.getElementById('check-gioitinh-input').innerHTML;
    //   var khachhang = document.getElementById('check-khachhang-input').innerHTML;
    //   if ((uname == 1) && (passwd == 1) && (name == 1) && (confirmPass == 1) 
    //       && (numberPhone == 1) && (birthDay == 1) && (email == 1) && (gioitinh == 1) && (khachhang == 1)) {
    //     document.getElementById('register').disabled = false;
    //   }
    //   else {
    //     document.getElementById('register').disabled = true;        
    //   } 
    // }

    //Kiem tra UserName
    function checkUserName() {
      var uname = document.getElementById('uname');
      var checkUserName = document.getElementById('check-uname');
      var enoughRegex = new RegExp("(?=.{8,}).*", "g");

      if (uname.value.length == 0) {
        checkUserName.innerHTML = `<p style="color: red; font-size: 12px;">Tên đăng nhập không được để trống</p>`;
        document.querySelector('#uname').style.borderBottom = '2px solid red';
      }
      else if (uname.value.length > 30) {
        checkUserName.innerHTML = `<p style="color: red; font-size: 12px;">Tên đăng nhập phải chứa ít nhất 8 ký tự, tối đa 30 ký tự</p>`;
        document.querySelector('#uname').style.borderBottom = '2px solid red';
      }
      else {
        document.querySelector('#uname').style.borderBottom = '2px solid #ced4da';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("check-uname").innerHTML =(this.responseText);
          }
        };
        xmlhttp.open("GET", "action-check.php?action=checkUname&uname=" + uname.value, true);
        xmlhttp.send();
      }
    }

    //Kiem tra Mat khau
    function checkPassword() {
      var passwd = document.getElementById('passwd');
      var checkPassword = document.getElementById('check-passwd');
      var enoughRegex = new RegExp("(?=.{8,}).*", "g");

      if (passwd.value.length == 0) {
        checkPassword.innerHTML = `<p style="color: red; font-size: 12px;">Mật khẩu không được để trống</p>`;
        document.querySelector('#passwd').style.borderBottom = '2px solid red';
      }
      else if (passwd.value.length > 16) {
        checkPassword.innerHTML = `<p style="color: red; font-size: 12px;">Mật khẩu phải chứa ít nhất 8 ký tự, tối đa 16 ký tự</p>`;
        document.querySelector('#passwd').style.borderBottom = '2px solid red';
      }
      else if (enoughRegex.test(passwd.value)) {
        checkPassword.innerHTML = `<p style="color: green; font-size: 12px;">Mật khẩu hợp lệ</p>`;
        document.querySelector('#passwd').style.borderBottom = '2px solid green';
      }
      else {
        checkPassword.innerHTML = `<p style="color: red; font-size: 12px;">Mật khẩu phải chứa ít nhất 8 ký tự, tối đa 16 ký tự</p>`;
        document.querySelector('#passwd').style.borderBottom = '2px solid red';
      }
    }

    //Kiem tra Ho ten khach hang
    function checkName() {
      var name = document.getElementById('hotenkh');
      var checkPassword = document.getElementById('check-name');
      var enoughRegex = new RegExp("(?=.{8,}).*", "g");

      if (name.value.length == 0) {
        checkPassword.innerHTML = `<p style="color: red; font-size: 12px;">Họ tên không được để trống</p>`;
        document.querySelector('#hotenkh').style.borderBottom = '2px solid red';
      }
      else {
        checkPassword.innerHTML = `<p style="color: green; font-size: 12px;">Họ tên hợp lệ</p>`;
        document.querySelector('#hotenkh').style.borderBottom = '2px solid green';
      }
    }

    //Kiem tra Nhap lai mat khau
    function checkConfirmPass() {
      var passwd = document.getElementById('passwd');
      var confirmPass = document.getElementById('confirmPass');
      var checkConfirmPass = document.getElementById('check-confirmPass');

      if (confirmPass.value.length == 0) {
        checkConfirmPass.innerHTML = `<p style="color: red; font-size: 12px;">Ô này không được để trống</p>`;
        document.querySelector('#confirmPass').style.borderBottom = '2px solid red';
      }
      else if (passwd.value == confirmPass.value) {
        checkConfirmPass.innerHTML = `<p style="color: green; font-size: 12px;">Mật khẩu xác nhận trùng khớp</p>`;
        document.querySelector('#confirmPass').style.borderBottom = '2px solid green';
      }
      else {
        checkConfirmPass.innerHTML = `<p style="color: red; font-size: 12px;">Mật khẩu xác nhận chưa trùng khớp</p>`;
        document.querySelector('#confirmPass').style.borderBottom = '2px solid red';
      }
    }

    //Kiem tra so dien thoai
    function checkNumberPhone() {
      var numberPhone = document.getElementById('sdtkh');
      var checkNumberPhone = document.getElementById('check-numberPhone');
      var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;

      if (numberPhone.value.length == 0) {
        checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Họ tên không được để trống</p>`;
        document.querySelector('#sdtkh').style.borderBottom = '2px solid red';
      }
      else if (numberPhone.value.length != 10) {
        checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Số điện thoại phải có 10 số</p>`;
        document.querySelector('#sdtkh').style.borderBottom = '2px solid red';
      }
      else if (vnf_regex.test(numberPhone.value) == false) {
        checkNumberPhone.innerHTML = `<p style="color: red; font-size: 12px;">Dữ liệu nhập vào có ký tự không phải số hoặc đầu số chưa đúng (09, 03, 07, 08, 05)</p>`;
        document.querySelector('#sdtkh').style.borderBottom = '2px solid red';
      }
      else {
        document.querySelector('#sdtkh').style.borderBottom = '2px solid #ced4da';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("check-numberPhone").innerHTML =(this.responseText);
          }
        };
        xmlhttp.open("GET", "action-check.php?action=checkNumberPhone&numberPhone=" + numberPhone.value, true);
        xmlhttp.send();
      }
    }

    //Kiểm tra năm sinh
    function checkBirthDay() {
      var birthDay = document.getElementById('tuoikh');
      var checkBirthDay = document.getElementById('check-birthDay');
      var vnf_regex = /(([0-9]{4})\b)/g;

      if (birthDay.value.length == 0) {
        checkBirthDay.innerHTML = `<p style="color: red; font-size: 12px;">Năm sinh không được để trống</p>`;
        document.querySelector('#tuoikh').style.borderBottom = '2px solid red';
      }
      else if (vnf_regex.test(birthDay.value) == false) {
        checkBirthDay.innerHTML = `<p style="color: red; font-size: 12px;">Năm sinh phải là số và có 4 chữ số</p>`;
        document.querySelector('#tuoikh').style.borderBottom = '2px solid red';
      }
      else {
        checkBirthDay.innerHTML = `<p style="color: green; font-size: 12px;">Năm sinh hợp lệ</p>`;
        document.querySelector('#tuoikh').style.borderBottom = '2px solid green';
      }
    }

    function checkEmail() {
      var email = document.getElementById('emailkh');
      var checkEmail = document.getElementById('check-email')

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
        document.querySelector('#emailkh').style.borderBottom = '2px solid red';
      }
      else if (validatEemail(email.value) == false) {
        checkEmail.innerHTML = `<p style="color: red; font-size: 12px;">Email phải có định dạng abc@gmail.com</p>`;
        document.querySelector('#emailkh').style.borderBottom = '2px solid red';
      }
      else {
        document.querySelector('#emailkh').style.borderBottom = '2px solid #ced4da';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("check-email").innerHTML =(this.responseText);
          }
        };
        xmlhttp.open("GET", "action-check.php?action=checkEmail&email=" + email.value, true);
        xmlhttp.send();
      }
    }

  </script>

</body>

</html>
