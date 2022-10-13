<?php
include("./config.php");
include("./autoload.php");
include("./ham.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Đăng ký tài khoản - Nha khoa Implant I-Dent</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="./css/dangky/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="./css/dangky/mdb.min.css">

  <!-- Your custom styles (optional) -->
  <style>
    .card.card-cascade .view.gradient-card-header {
            padding: 1.1rem 1rem;
        }

        .card.card-cascade .view {
            box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
      <script>
        //Check password == confirm_password != null
        var check = function() {
            var pass = document.getElementById('passwd').value
            var cf_pass = document.getElementById('confirmPass').value
            var regex = /([a-zA-Z])[a-zA-Z0-9]{3,}/

            if (pass == cf_pass && pass != '' && pass.match(regex)) {
                document.getElementById('confirmPassword').style.backgroundColor = '#00ff0080';
                // document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('confirmPassword').style.backgroundColor = '#ff000080';
                // document.getElementById('message').innerHTML = 'not matching';
            }
        };
    </script>
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
            <h3 class="h1-responsive font-weight-bold mt-0 ml-3 white-text">ĐĂNG KÝ</h3>
          </div>
        </div>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav nav-flex-icons ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./dangnhap.php">Đăng nhập</a>
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
                <img src="./img/AnhDaiDien/pngtree-flat-default-avatar-png-image_2848906.jpg" alt="User Photo" class="z-depth-1 mb-3 mx-auto" width="120px" />

                <!-- <label for="file-input_1">
                    <img id="review_1" src="./img/<?php echo $row_kh['anhdaidien_kh'] ?>" alt="">
                </label>
                <input id="file-input_1" name="hinh_anh_1" type="file" accept="image/*" onchange="loadFile_1(event)" style="display: none;" />
                <input type="hidden" name="old_image_1" value="<?php echo $row_kh['anhdaidien_kh'] ?>"> -->
                
                <div class="row flex-center">
                  <button class="btn btn-info btn-rounded btn-sm">Cập nhật ảnh đại diện</button><br>
                </div>
              </div>
              <!-- Card content -->
              <script>
                    var loadFile_1 = function(event) {
                        var review_1 = document.getElementById('review_1');
                        review_1.src = URL.createObjectURL(event.target.files[0]);
                        review_1.onload = function() {
                            URL.revokeObjectURL(review_1.src) // free memory
                        }
                    };
                </script>

            </div>
            <!-- Card -->

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
                <form method="POST" action="./action-dangky.php">
                  <!-- First row -->

                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" name="uname" id="uname" class="form-control validate">
                        <label for="uname" data-error="wrong" data-success="right">Tên đăng nhập</label>
                      </div>
                    </div>
                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="password" name="passwd" id="passwd" class="form-control validate">
                        <label for="passwd" data-error="wrong" data-success="right">Mật khẩu</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- First row -->
                  <div class="row">
                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" name="hotenkh" id="hotenkh" class="form-control validate">
                        <label for="hotenkh" data-error="wrong" data-success="right">Họ tên khách hàng</label>
                      </div>
                    </div>

                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="password" name="confirmPass" id="confirmPass" class="form-control validate">
                        <label for="confirmPass" data-error="wrong" data-success="right">Nhập lại mật khẩu</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- Second row -->
                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" name="sdtkh" id="sdtkh" class="form-control validate">
                        <label for="sdtkh">Số điện thoại</label>
                      </div>
                    </div>
                    <!-- Second column -->

                    <div class="col-md-3">
                      <div class="md-form mb-0">
                        <input type="text" name="tuoikh" id="tuoikh" class="form-control validate">
                        <label for="tuoikh" data-error="wrong" data-success="right">Tuổi</label>
                      </div>
                    </div>
                    <div class="col-md-3 ">
                    </div>

                    

                    

                  </div>
                  <!-- Second row -->

                  <div class="row">
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="email" name="emailkh" id="emailkh" class="form-control validate">
                        <label for="emailkh">Email</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="md-form">
                            <p class="form-control mb-0 ml-0" style="border: 0">Giới tính:</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="md-form mb-0 ml-0 form-group">
                            <input class="form-check-input" type="radio" id="nam" name="gioitinh" value="Nam">
                            <label for="nam" class="form-check-label">Nam</label>
                            <input class="form-check-input" type="radio" id="nu" name="gioitinh" value="Nu">
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
                        <textarea type="text" name="diachikh" id="diachikh" class="md-textarea form-control" rows="3"></textarea>
                        <label for="diachikh">Địa chỉ</label>
                      </div>
                    </div>
                  </div>
                  <!-- Third row -->

                  <!-- Fourth row -->
                  <div class="row">
                    <div class="col-md-12 text-center my-4">
                      <input type="submit" name="register" id="register" value="TẠO TÀI KHOẢN" class="btn btn-info btn-rounded">
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
  <script type="text/javascript" src="./js/dangky//mdb.min.js"></script>
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

</body>

</html>
