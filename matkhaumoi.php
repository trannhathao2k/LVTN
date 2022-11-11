<?php
  include("./config.php");
  include("./autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Nhập mật khẩu mới</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="./css/dangnhap/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="./css/dangnhap/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/dangnhap/style.css">
  <style>
    html,
    body,
    header,
    .view {
      height: 100vh;
    }
    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 700px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
  </style>
</head>

<body class="login-page">

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
          <div class="col-md-7 col-sm-0" style="display: flex; align-items: center;">
            <h3 class="h1-responsive font-weight-bold mt-0 white-text">ĐẶT LẠI MẬT KHẨU</h3>
          </div>
        </div>
      
        
      </div>
    </nav>

    <!-- Intro Section -->
    <section class="view intro-2" style="background-image: url(./img/Images/doctor.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <div class="mask rgba-indigo-light h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!-- Form with header -->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">
                  <div id="email-khachhang" hidden><?php
                    if (isset($_GET['email'])) {
                      echo $_GET['email'];
                    }
                  ?></div>
                  <div id="form-datlaimatkhau">
                    <!-- Header -->
                    <div class="form-header info-color-dark">
                      <h3>ĐẶT LẠI MẬT KHẨU</h3>
                    </div>

                    <!-- Body -->                 
                    <div class="md-form mb-0">
                        <i class="fas fa-user prefix white-text"></i>
                        <input type="text" id="maXacNhan" name="maXacNhan" class="form-control" required>
                        <label for="maXacNhan">Mã xác nhận</label>
                        </div>

                        <div class="text-center">
                            <a class="btn info-color-dark btn-lg white-text" onclick="kiemtra()">Tiếp theo</a>
                        </div>
                  
                        <div class="text-center">

                            <div class="mb-1 wow fadeIn mt-3" >
                                <div id="maxn"></div>
                                <p class="white-text" style="font-size: 13px;">Mã xác nhận đang được gửi đi. <br/>Vui lòng nhấn thử lại nếu bạn chưa nhận được mã.</p>
                                <button id="btn-thulai" class="btn btn-sm white-text" style="background-color: tomato;" onclick="guilaima()" disabled>THỬ LẠI &nbsp;<b id="giay">60</b></button>
                                <script>
                                  window.onload = start();
                                  var s = null; // Giây
                                
                                  var timeout = null; // Timeout
                                
                                  function start()
                                  {
                                    
                                  /*BƯỚC 1: LẤY GIÁ TRỊ BAN ĐẦU*/
                                  if (document.getElementById('giay').innerHTML == '') {
                                    s = 59;
                                  }
                                  else {
                                    s = parseInt(document.getElementById('giay').innerHTML) - 1;
                                  }
                                  

                                  /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
                                  // Nếu số giây = 0 tức là đã hết giờ, lúc này:
                                  //  - Dừng chương trình
                                    if (s == 0){
                                        clearTimeout(timeout);
                                        document.getElementById('btn-thulai').disabled = false;
                                        document.getElementById('giay').innerHTML = '';
                                        return false;
                                    }

                                    /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
                                    document.getElementById('giay').innerHTML = s.toString();

                                    /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
                                    timeout = setTimeout(function(){
                                        s--;
                                        start();
                                    }, 1000);
                                  }
                                
                                  function stop(){
                                      clearTimeout(timeout);
                                  }
                                </script>
                            </div>

                        </div>
                    </div>
                    <!-- <div id="check02"></div> -->
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

  </header>
  <!-- Main Navigation -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="./js/dangnhap/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="./js/dangnhap/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="./js/dangnhap/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="./js/dangnhap/mdb.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script>
    function kiemtra() {
        maNhap = document.getElementById('maXacNhan').value;
        // document.getElementById('maxn').innerHTML = maNhap;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("form-datlaimatkhau").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "./action-doimatkhau.php?action=kiemtra&maNhap=" + maNhap, true);
        xmlhttp.send();
    };

    function luumatkhau() {
        matKhauMoi = document.getElementById('matKhauMoi').value;
        xacNhanMatKhau = document.getElementById('xacNhanMatKhau').value;
        email = document.getElementById('email-khachhang').innerHTML;
        // document.getElementById('check02').innerHTML = email;
        if (matKhauMoi == xacNhanMatKhau) {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("check").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
              }
          };
          xmlhttp.open("GET", "./action-doimatkhau.php?action=luumatkhau&matkhau=" + matKhauMoi + "&email=" + email, true);
          xmlhttp.send();
        }
        else {
          document.getElementById('kiemtramatkhau').innerHTML = `<b class="text-center white-text">Mat khau khong trung khop</b>`;
        }
        
    };

    function guilaima() {
      document.getElementById('btn-thulai').disabled = true;
      start();
      var email = document.getElementById('email-khachhang').innerHTML;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "datlaimatkhau.php?action=guima&email=" + email, true);
      xmlhttp.send();
    }
    
  </script>
</body>

</html>