<?php
  include("./config.php");
  include("./autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();

  if (isset($_GET['dangxuat'])) unset($_SESSION['khachhang']);
  if (isset($_GET['dangxuat-bs'])) unset($_SESSION['bacsi']);
  if (isset($_GET['dangxuat-nv'])) unset($_SESSION['nhanvien']);
  if (isset($_GET['dangxuat-admin'])) unset($_SESSION['admin']);

  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $today = date("Y-m-d");
  $check = "SELECT * FROM luottruycap WHERE ngay_truycap = '$today'";
  $query_check = mysqli_query($mysqli, $check);
  
  if (mysqli_num_rows($query_check) == 0) {
      $CountFile = "./index.log";
      $CF = fopen ($CountFile, "r");
      $Views = fread ($CF, filesize ($CountFile));
      fclose ($CF);
      $Views = 1;
      $luottruycap = "INSERT INTO luottruycap VALUES (null,'$today', $Views)";
      $mysqli->query($luottruycap);
  }
  else {
      $CountFile = "./index.log";
      $CF = fopen ($CountFile, "r");
      $Views = fread ($CF, filesize ($CountFile));
      fclose ($CF);
      $Views++; 
      $luottruycap = "UPDATE luottruycap SET soluot_truycap = $Views WHERE ngay_truycap = '$today'";
      $mysqli->query($luottruycap);
  }      

  $CF = fopen ($CountFile, "w");
  fwrite ($CF, $Views); 
  fclose ($CF);

  if(isset($_POST["unamekh"]) && isset($_POST["passwdkh"])){

    $passwdkh = $_POST["passwdkh"];
    $passwdkh_md5 = md5($passwdkh);
    
    $sql_kh = "select * from khachhang where username_kh = '".$_POST["unamekh"]."' and password_kh = '$passwdkh_md5'";
    $kt = mysqli_fetch_all(mysqli_query($mysqli, $sql_kh), MYSQLI_ASSOC);
    
    if( is_null($kt) || !isset($kt) || empty($kt)) {
        $_SESSION["error"] = "Tên tài khoản hoặc mật khẩu sai";
      }
      else {
        $_SESSION["khachhang"] = $kt[0];
        
        // header("location:./index.php");
      }
    
    }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Nha khoa Implant TQueen</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="./css/khachhang/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="./img/Logo-Title-removebg-preview.png" type="image/x-icon">
  <!-- Material Design Bootstrap -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap"
      rel="stylesheet"> -->
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <link href="./css/khachhang/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/khachhang/style.css">
  <link rel="stylesheet" href="./css/khachhang/modules/animations-extended.min.css">

  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }
  </style>
</head>

<body class="medical-lp">

  <!--Navigation & Intro-->
  <header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
      <div class="container">
        <div class="smooth-scroll">
          <a class="navbar-brand" href="#home">
            <img src="./img/TQueen-logo-removebg-preview.png">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!--Links-->
          <ul class="navbar-nav mr-auto list-unstyled">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle title" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">DỊCH VỤ</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="./dichvu/trongrangimplant.php">
                    <i class="fas fa-angle-right"></i>
                    Trồng răng Implant</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Bọc răng sứ</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Trồng răng Implant</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Trồng răng sứ</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Niềng răng thẩm mỹ</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Cạo vôi răng</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Trám răng</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Điều trị tủy răng</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Nhổ răng</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Phẩu thuật tạo hình nứu</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Tẩy trắng răng</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Tiểu phẩu răng khôn</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle title" id="navbarDropdownMenuLink12" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">BẢNG GIÁ</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Bảng giá Implant</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Bảng giá răng sứ</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Bảng giá niềng răng</a>
                  <a class="dropdown-item" href="">
                    <i class="fas fa-angle-right"></i>
                    Bảng giá các dịch vụ khác</a>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-offset="20">KIẾN THỨC NHA KHOA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-offset="20">LIÊN HỆ</a>
            </li>
          </ul>

          <!--Social Icons-->
          <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <?php if (isset($_SESSION['khachhang'])) { ?>
              <li class="nav-item dropdown notifications-nav">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown01" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">
                    Xin chào <?php echo $_SESSION['khachhang']['hoten_kh'] ?>
                  </span></a>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown01">
                  <a class="dropdown-item" href="./trangcanhan-kh.php">Trang cá nhân</a>
                  <a class="dropdown-item" href="index.php?dangxuat">Đăng xuất</a>
                </div>
              </li>
            <?php
              }
              else if (isset($_SESSION['bacsi'])){
                ?>
                  <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown01" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">
                        Xin chào <?php echo $_SESSION['bacsi']['hoten_bs'] ?>
                      </span></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown01">
                      <a class="dropdown-item" href="./bacsi/index-bs.php">Đến giao diện làm việc bác sĩ</a>
                      <a class="dropdown-item" href="index.php?dangxuat-bs">Đăng xuất</a>
                    </div>
                  </li>
                <?php
              }
              else if (isset($_SESSION['nhanvien'])) {
                ?>
                  <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown01" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">
                        Xin chào <?php echo $_SESSION['nhanvien']['hoten_nv'] ?>
                      </span></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown01">
                      <a class="dropdown-item" href="./nhanvien/index-nv.php">Đến giao diện làm việc của nhân viên</a>
                      <a class="dropdown-item" href="index.php?dangxuat-nv">Đăng xuất</a>
                    </div>
                  </li>
                <?php
              }
              else if (isset($_SESSION['admin'])) {
                ?>
                  <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown01" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">
                        Xin chào Admin
                      </span></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown01">
                      <a class="dropdown-item" href="./admin/index-admin.php">Đến giao diện làm việc của admin</a>
                      <a class="dropdown-item" href="index.php?dangxuat-admin">Đăng xuất</a>
                    </div>
                  </li>
                <?php
              }
              else {
                ?>
                  <li class="nav-item">
                    <a class="nav-link" href="./dangnhap.php">Đăng nhập</a>
                  </li>
                  <li class="nav-link"> | </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./dangky.php">Đăng ký</a>
                  </li>
                <?php
              }  
            ?>
            
          </ul>
          
        </div>
      </div>
    </nav>
    <!--/Navbar-->

    <!--Intro Section-->
    <section id="home" class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/37.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <div class="mask">
        <div class="container h-100 d-flex justify-content-center align-items-center">
          <div class="row pt-5 mt-3">
            <div class="col-12 col-md-6 text-center text-md-left p-2">
              <div class="white-text" style="margin-left: -20px;">
                <h1 class="h1-responsive font-weight-bold mt-md-5 mt-0 wow fadeInLeft" data-wow-delay="0.3s">NHA KHOA IMPLANT TQUEEN</h1>
                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                <p class="wow fadeInLeft mb-3" data-wow-delay="0.3s" >
                Nha khoa TQueen là một địa chỉ nha khoa uy tín hàng đầu về kỹ thuật cấy ghép implant hiện nay. 
                Với TS-BS Lee Ji-eun với 10 năm kinh nghiệp trong lĩnh vực.
                </p>
                <br>
                <!-- <a class="btn btn-unique btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft" data-wow-delay="0.3s">Download</a> -->
                <div class="smooth-scroll">
                  <a class="btn btn-outline-white btn-rounded font-weight-bold wow fadeInLeft" data-wow-delay="0.3s" href="#datlich" data-offset="80">
                    ĐẶT LỊCH THĂM KHÁM
                  </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </header>
  <!--/Navigation & Intro-->

  <!--Main content-->
  <main>

    <div class="container">

      <!--Section: Features v.1-->
      <section id="features" class="mt-4 mb-5 pb-5">

        <!--Section heading-->
        <h3 class="text-center mb-5 mt-5 pt-5 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
          GIÁ TRỊ CỐT LỖI NHA KHOA IMPLANT TQUEEN MANG LẠI
        </h3>

        <!--First row-->
        <div class="row features-big my-4 text-center">
          <!--First column-->
          <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
              <div class="canhgiua">
                <img src="./img/Group-3682.png" alt="uytin-image" height="80px" class="mt-3 my-4">
              </div>
              <h5 class="font-weight-bold mb-4">UY TÍN</h5>
                            <p class=" grey-text
                font-small mx-3">Tiến sĩ – Bác sỹ 10 năm tu nghiệp chuyên sâu tại Pháp. 
                Tất cả trang thiết bị, vật liệu nha khoa nhập khẩu trực tiếp từ Mỹ
                 và Châu Âu đạt chuẩn FDA và CE.</p fa-3x mb-4>
            </div>
          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
              <div class="canhgiua">
                <img src="./img/Group-46.png" alt="tantam-image" height="80px" class="mt-3 my-4">
              </div>
              <h5 class="font-weight-bold mb-4">TẬN TÂM</h5>
              <p class="grey-text font-small mx-3">Chính sách bảo hành và chăm sóc cho bệnh nhân đến trọn đời. 
                Tư vấn, hỗ trợ bệnh nhân nhiệt tình trong suốt quá trình điều trị. 
                Cam kết không bỏ mặc bệnh nhân sau khi điều trị xong.</p>
            </div>
          </div>
          <!--/Second column-->

          <!--Third column-->
          <div class="col-md-4 mb-1 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
              <div class="canhgiua">
                <img src="./img/Path-98.png" height="80px" class="mt-3 my-4">
              </div>
              <h5 class="font-weight-bold mb-4">CHUYÊN NGHIỆP</h5>
                            <p class=" grey-text
                font-small mx-3">Đảm bảo sự minh bạch tất cả thông tin trong quá trình tư vấn và điều trị cho bệnh nhân.
                Tuân thủ nghiêm chỉnh các quy định của pháp luật, đáp ứng đầy đủ tất cả các quy chuẩn của Bộ Y tế. 
                </p>
            </div>
          </div>
          <!--/Third column-->
        </div>
        <!--/First row-->

      </section>
      <!--/Section: Features v.1-->
    </div>

    <div id="home" class="container-fluid">

      <!--Grid row-->
      <div class="row my-5">

        <!--Grid column-->
        <div class="col-md-12">

          <h3 class="text-center mb-5 pt-5 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
            DỊCH VỤ NỔI BẬT
          </h3>

          <!--Tiles blog-->
          <div>
            <!--First row-->
            <div class="row">
              <!--First column-->
              <div class="col-xl-3 col-md-6 px-0">
                <!--Single blog post-->
                <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                    <!--Image-->
                    <div class="view overlay">

                      <img src="./img/Images/Dich-vu-1.png" class="img-fluid" alt="trongrangimplan" width="100%">

                      <div class="mask flex-center rgba-blue-strong">
                        <h4 class="white-text font-weight-bold">TRỒNG RĂNG IMPLANT</h4>
                      </div>
                    </div>
                    <!--/Image-->
                  </a>
                  <!--Blog post link-->

                </div>
                <!--/Single blog post-->
              </div>
              <!--/First column-->

              <!--Second column-->
              <div class="col-xl-3 col-md-6 px-0">
                <!--Single blog post-->
                <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                    <!--Image-->
                    <div class="view overlay">

                      <img src="./img/Images/Dich-vu-2.png" class="img-fluid" alt="bocrangsu-image" width="100%">

                      <div class="mask flex-center rgba-blue-strong">
                        <h4 class="white-text font-weight-bold">BỌC RĂNG SỨ</h4>
                      </div>
                    </div>
                    <!--/Image-->
                  </a>
                  <!--Blog post link-->

                </div>
                <!--/Single blog post-->
              </div>
              <!--/Second column-->

              <!--Third column-->
              <div class="col-xl-3 col-md-6 px-0">
                <!--Single blog post-->
                <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                    <!--Image-->
                    <div class="view overlay">

                      <img src="./img/Images/Dich-vu-3.png" class="img-fluid" alt="niengrang-image" width="100%">

                      <div class="mask flex-center rgba-blue-strong">
                        <h4 class="white-text font-weight-bold">NIỀNG RĂNG THẨM MỸ</h4>
                      </div>
                    </div>
                    <!--/Image-->
                  </a>
                  <!--Blog post link-->

                </div>
                <!--/Single blog post-->
              </div>
              <!--/Third column-->

              <!--Fourth column-->
              <div class="col-xl-3 col-md-6 px-0">
                <!--Single blog post-->
                <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                    <!--Image-->
                    <div class="view overlay">

                      <img src="./img/Images/Dich-vu-4.png" class="img-fluid" alt="dieutri-image" width="100%">

                      <div class="mask flex-center rgba-blue-strong">
                        <h4 class="white-text font-weight-bold">NHA KHOA ĐIỀU TRỊ</h4>
                      </div>
                    </div>
                    <!--/Image-->
                  </a>
                  <!--Blog post link-->
                </div>
                <!--/Single blog post-->
              </div>
              <!--/Fourth column-->
            </div>
            <!--/First row-->

          </div>

        </div>
        <!--/Grid column-->

      </div>
      <!--/Grid row-->

    </div>

    <div class="container">

      <!--Section: About-->
      <section id="about" class="info-section mb-5 mt-5 pt-4">

        <!--First row-->
        <div class="row pt-5 flex-column-reverse flex-md-row">

          <!--First column-->
          <div class="col-md-7 mb-2 smooth-scroll wow fadeIn" data-wow-delay="0.2s">

            <!--Heading-->
            <h2 class="mb-3 font-weight-bold">CÂU CHUYỆN CỦA TQUEEN</h2>
            <!--Description-->
            <!-- <h4 class="mb-5 dark-grey-text">Visit Our New Clinic in New York.</h4> -->
            <!--Content-->
            <p class="grey-text" align="justify">
              Với niềm đam mê và sự nhiệt huyết dành cho lĩnh vực Nha khoa, 
              ngay từ khi còn theo học tại ĐH Y Dược TP HCM, <b>Tiến sĩ – Bác sĩ Lee Ji-eun</b> 
              đã thể hiện xuất sắc trong quá trình học tập và dành được học bổng nghiên cứu sinh 
              tại Đại Học Aix- Marseille, nước Pháp.
            </p>

            <!-- <p class="grey-text" align="justify">Trong hơn 10 năm tu nghiệp tại Pháp và được tiếp cận 
              với những công nghệ hiện đại nhất, <b>Bác sĩ Lee Ji-eun</b> cảm thấy lo ngại trước những 
              kỹ thuật nha khoa đã quá cũ và không bắt kịp sự tiến bộ của nền Nha khoa thế giới tại nước ta. 
              Đồng thời, tại Việt Nam cũng thiếu đi những địa chỉ nha khoa tin cậy và các phương án 
              điều trị thích hợp cho người dân.
            </p>

            <p class="grey-text" align="justify">Việc thiếu đi các thông tin kiến thức được phổ biến 
              rộng rãi là nguyên nhân chính tạo nên sự thờ ơ và không quan tâm đúng mức đến sức khỏe 
              răng miệng của phần lớn người dân trong nước, dẫn đấu những hậu quả nghiêm trọng về sức khỏe 
              lâu dài, trong đó có chính gia đình của Bác sĩ Tùng.
            </p> -->

            <p class="grey-text" align="justify">Trở thành 1 trong những Tiến Sĩ Y Khoa trẻ nhất Việt Nam 
              sau khi bảo vệ thành công luận án tiến sĩ tại Pháp, với rất nhiều cơ hội để thành công tại 
              nước ngoài. Tuy nhiên, bằng tình yêu quê hương, Bác sĩ Lee đã quyết định từ bỏ tất cả để quay về Việt Nam và lập nghiệp.
            </p>

            <p class="grey-text" align="justify">Với những trăn trở và mong muốn đó của Bác sĩ Lee đã 
              trở thành kim chỉ nam để thành lập và phát triển Nha khoa TQueen. Thành lập năm 2014, 
              sau hơn 6 năm đi vào hoạt động, với sự nỗ lực không ngừng của <b>Tiến sĩ – Bác sĩ Lee Ji-eun</b> 
              cùng với đội ngũ cộng sự tại nha khoa TQueen đã thực hiện thành công hơn 10,000 ca Implant, 
              qua đó kiến tạo nụ cười hạnh phúc cho hàng ngàn bệnh nhân.
            </p>

            <p class="grey-text" align="justify">
            Đưa TQueen trở thành một địa chỉ nha khoa uy tín – chất lượng tại TP HCM, là lựa chọn hàng đầu 
            của các bệnh nhân trong và ngoài nước.
            </p>
            <br>
            <!--Button-->
            <!-- <a href="#home" class="btn btn-rounded btn-blue mb-4">Contact Us Now</a> -->

          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-lg-4 flex-center ml-lg-auto col-md-5 mb-5 wow fadeIn" data-wow-delay="0.3s">

            <!--Image-->
            <img src="./img/AnhDaiDien/IU.jpg" class="img-fluid z-depth-1">

          </div>
          <!--/Second column-->

        </div>
        <!--/First row-->

      </section>
      <!--Section: About-->

    </div>

    <!--Streak-->
    <div class="streak streak-photo streak-long-2" style="background-image: url('https://mdbootstrap.com/img/Others/doctor.jpg');">
      <div class="flex-center mask rgba-blue-strong">
        <div class="container text-center white-text">
          <h3 class="text-center text-white text-uppercase font-weight-bold mt-5 mb-5 pt-3 wow fadeIn" data-wow-delay="0.2s">NHA KHOA TQUEEN ĐIỂM ĐẾN TIN CẬY CỦA KHÁCH HÀNG TRONG VÀ NGOÀI NƯỚC</h3>

          <!--First row-->
          <div class="row text-white text-center wow fadeIn" data-wow-delay="0.2s">

            <!--First column-->
            <div class="col-md-3 mt-2">
              <h1 class="white-text font-weight-bold">10+</h1>
              <p>Tiến sĩ – Bác sỹ 10 năm tu nghiệp chuyên sâu tại Pháp</p>
            </div>
            <!--/First column-->

            <!--Second column-->
            <div class="col-md-3 mt-2">
              <h1 class="white-text font-weight-bold">100%</h1>
              <p>100% Công nghệ, trang thiết bị, vật liệu nha khoa chuyển giao trực tiếp từ Mỹ và châu Âu</p>
            </div>
            <!--/Second column-->

            <!--Third column-->
            <div class="col-md-3 mt-2">
              <h1 class="white-text font-weight-bold">10000+</h1>
              <p>Hơn 10,000 ca cấy ghép Implant thành công</p>
            </div>
            <!--/Third column-->

            <!--Fourth column-->
            <div class="col-md-3 mt-2 mb-5 pb-3">
              <h1 class="white-text font-weight-bold">6000+</h1>
              <p>Hơn 6,000 ca Thẩm mỹ răng sứ và Niềng răng thẩm mỹ thành công</p>
            </div>
            <!--/Fourth column-->

          </div>
          <!--/First row-->

        </div>
      </div>
    </div>
    <!--/Streak-->

    <div class="container">

      <!--Projects section v.3-->
      <section id="team" class="mt-4 mb-2">

        <!--Section heading-->
        <h3 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">GẶP GỠ CÁC TIẾN SĨ - BÁC SĨ CỦA TQUEEN</h3>
        <!--Section description-->
        <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">Nha khoa Implant TQUEEN với Đội ngũ BS và Chuyên gia nhiều năm 
          kinh nghiệm trong lĩnh vực cấy ghép Implant, bọc răng sứ, dán sứ veneer,chỉnh hình niềng răng,...</p>

        <!--First row-->
        <div class="row wow fadeIn" data-wow-delay="0.4s">

          <!--First column-->
          <div class="col-md-12">

            <div class="mb-2">

              <!-- Nav tabs -->
              <div class="row">
                <div class="col-md-12">
                  
                </div>
              </div>
              <ul class="nav md-pills pills-primary flex-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active " data-toggle="tab" href="#panel31" role="tab">Tiến sĩ - Bác sĩ<br/>Lee Ji-eun</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel32" role="tab">Tiến sĩ - Bác sĩ<br/>Dương Mịch</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel33" role="tab">Thạc sĩ - Bác sĩ<br/>Vương Nhất Bác</a>
                </li>
              </ul>

            </div>

            <!--Tab panels-->
            <div class="tab-content">

              <!--Panel 1-->
              <div class="tab-pane fade show in active" id="panel31" role="tabpanel">
                <br>

                <!--First row-->
                <div class="row d-flex justify-content-center">

                  <!--First column-->
                  <div class="col-lg-3 col-md-6 pb-5">

                    <!--Featured image-->
                    <div class="view overlay z-depth-1 z-depth-2">
                      <img src="./img/AnhDaiDien/IU.jpg" class="img-fluid">
                    </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                    <!--Title-->
                    <h4 class="mb-3">TIẾN SĨ - BÁC SĨ LEE JI-EUN</h4>

                    <!--Description-->
                    <ul class="ul-profile" align="justify">
                      <li>TIẾN SĨ Y-NHA KHOA TỐT NGHIỆP TẠI PHÁP</li>
                      <li>CHUYÊN GIA IMPLANT TỐT NGHIỆP TẠI PHÁP</li>
                      <li>Chứng chỉ hành nghề số: 0002468/TG – CCHN</li>
                      <li>Chuyên Cấy ghép Implant, Phẫu thuật nha chu, Phẫu thuật miệng</li>
                    </ul>

                  </div>
                  <!--/Second column-->
                </div>
                <!--/First row-->

              </div>
              <!--/.Panel 1-->

              <!--Panel 2-->
              <div class="tab-pane fade" id="panel32" role="tabpanel">
                <br>

                <!--First row-->
                <div class="row d-flex justify-content-center">

                  <!--First column-->
                  <div class="col-lg-3 col-md-6 pb-5">

                    <!--Featured image-->
                    <div class="view overlay z-depth-1 z-depth-2">
                      <img src="./img/AnhDaiDien/duong-mich.jpg" class="img-fluid">
                    </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                    <!--Title-->
                    <h4 class="mb-3">TIẾN SĨ - BÁC SĨ DƯƠNG MỊCH</h4>

                    <!--Description-->
                    <ul class="ul-profile" align="justify">
                      <li>TIẾN SĨ Y-NHA KHOA TỐT NGHIỆP TẠI PHÁP</li>
                      <li>GIẢNG VIÊN ĐẠI HỌC Y DƯỢC TP. HỒ CHÍ MINH</li>
                      <li>Chứng chỉ hành nghề số: 002457/BYT - CCHN</li>
                      <li>Chuyên Niềng răng, Điều trị đau khớp hàm mặt</li>
                    </ul>

                  </div>
                  <!--/Second column-->
                </div>
                <!--/First row-->

              </div>
              <!--/.Panel 2-->

              <!--Panel 3-->
              <div class="tab-pane fade" id="panel33" role="tabpanel">
                <br>

                <!--First row-->
                <div class="row d-flex justify-content-center">

                  <!--First column-->
                  <div class="col-lg-3 col-md-6 pb-5">

                    <!--Featured image-->
                    <div class="view overlay z-depth-1 z-depth-2">
                      <img src="./img/AnhDaiDien/vuong-nhat-bac.jpg" class="img-fluid">
                    </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                    <!--Title-->
                    <h4 class="mb-3">THẠC SĨ - BÁC SĨ VƯƠNG NHẤT BÁC</h4>

                    <!--Description-->
                    <ul class="ul-profile" align="justify">
                      <li>THẠC SĨ RĂNG HÀM MẶT ĐẠI HỌC Y DƯỢC TP. HỒ CHÍ MINH</li>
                      <li>Chứng chỉ hành nghề số: 047014/HCM - CCHN</li>
                      <li>Chuyên phục hình răng sứ - Veneer, phục hình sứ trên Implant</li>
                    </ul>

                  </div>
                  <!--/Second column-->
                </div>
                <!--/First row-->

              </div>
              <!--/.Panel 3-->

            </div>
            <!--/Tab panels-->

          </div>
          <!--/First column-->

        </div>
        <!--/First row-->

      </section>
      <!--/Projects section v.3-->

    </div>

    <div class="container-fluid grey lighten-3">
      <div class="container">

      <h3 class="text-center mb-3 mt-3 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
        VIDEOS CẢM NHẬN CỦA KHÁCH HÀNG VỀ NHA KHOA TQUEEN
      </h3>
      <section id="services" class="mt-3 pb-3">

        <!-- Grid row -->
        <div class="row mt-5 pt-5 wow fadeIn" data-wow-delay="0.4s">

          <!-- Grid column -->
          <div class="col-md-6 mb-1 text-center">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1 rounded">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/86-SgSRoc8w" 
                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

          </div>
          <!-- Grid column -->

          <!-- Second column -->
          <div class="col-md-6 mb-1 text-center">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1 rounded">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/CFWfVaS_oHc" title="YouTube video player" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>

      </div>
    </div>
    <!-- Hết mục video -->

    <div class="container">

      <!-- Section: Contact v.3 -->
      <section class="contact-section my-5" id="datlich">

        <!-- Form with header -->
        <div class="card">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-lg-12">
              
                <div class="card-body form">

                <!-- Header -->
                <h3 class="text-center mb-3 mt-3 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">ĐẶT LỊCH THĂM KHÁM CÙNG BÁC SĨ TQUEEN</h3>

                
                  <?php
                    if (isset($_SESSION['khachhang'])) {
                      $MaKH = $_SESSION['khachhang']['id_kh'];
                    

                      $ktra = "SELECT * FROM lichhentruoc WHERE id_kh = $MaKH";
                      $query_ktra = mysqli_query($mysqli, $ktra);
                      if(mysqli_num_rows($query_ktra) != 0) {
                        echo '<p class="white-text text-center font-weight-bold green">BẠN ĐÃ ĐẶT LỊCH RỒI, VUI LÒNG CHỈNH SỬA NẾU CÓ THAY ĐỔI MỚI</p>';
                      }
                    }
                    // else {
                    //   echo $ktra;
                    // }

                    if (isset($_SESSION['khachhang'])) {
                      include("./formlichhen.php");
                    }
                    else {
                    // ?>
                      <p class="grey-text" style="text-align: center;">Quý khách vui lòng đăng nhập để có thể đặt lịch hẹn khám</p>
                      <div class="canhgiua">
                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalLRFormDemo">ĐĂNG NHẬP</a>
                      </div>

                      <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog cascading-modal" role="document">
                          <!-- Content -->
                          <div class="modal-content">

                            <!-- Modal cascading tabs -->
                            <div class="modal-c-tabs">

                              <!-- Nav tabs -->
                              <ul class="nav md-tabs tabs-2 light-blue darken-3">
                                <li class="nav-item">
                                  <a class="nav-link active"><i class="fas fa-user mr-1"></i>
                                    ĐĂNG NHẬP</a>
                                </li>
                              </ul>

                              <!-- Tab panels -->
                              <div class="tab-content">
                                <!-- Panel 17 -->
                                <!-- <div class="tab-pane fade in show active" id="panel17" role="tabpanel"> -->

                                <form action="" method="POST">
                                  <!-- Body -->
                                  <div class="modal-body mb-1">
                                    <div class="md-form form-sm">
                                      <i class="fas fa-envelope prefix"></i>
                                      <input type="text" id="unamekh" name="unamekh" class="form-control form-control-sm">
                                      <label for="unamekh">Tên đăng nhập</label>
                                    </div>

                                    <div class="md-form form-sm">
                                      <i class="fas fa-lock prefix"></i>
                                      <input type="password" id="passwdkh" name="passwdkh" class="form-control form-control-sm">
                                      <label for="passwdkh">Mật khẩu</label>
                                    </div>
                                    <div class="mb-1 wow fadeIn mt-3" style="text-align: center;">
                                      <b style="color: red">
                                        <?php if (isset($_SESSION["error"])) {echo $_SESSION["error"]; unset($_SESSION["error"]);} ?> 
                                      </b>
                                      
                                    </div>
                                    <div class="text-center mt-2">
                                      <button type="submit" class="btn btn-info">ĐĂNG NHẬP <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                    <hr>
                                    <p class="mb-0" style="text-align: center;">Chưa có tài khoản ? <a href="./dangky.php">Đăng ký ngay</a></p>
                                  </div>
                                  <!-- Footer -->
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">ĐÓNG</button>
                                  </div>
                                </form>
                                  

                                </div>
                              </div>

                            </div>
                          </div>                 
                    <?php
                  }
                ?>
                

              </div>


              

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- Form with header -->

      </section>
      <!-- Section: Contact v.3 -->

      <hr>

      <!--Section: Testimonials v.2-->
      <section id="testimonials" class="mb-5 pb-4">

        <!--Section heading-->
        <h3 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
          CẢM NHẬN CỦA KHÁCH HÀNG SAU KHI SỬ DỤNG DỊCH VỤ TẠI NHA KHOA TQUEEN
        </h3>

        <div class="wrapper-carousel-fix">

          <!--Carousel Wrapper-->
          <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade wow fadeIn"
            data-wow-delay="0.4s" data-ride="carousel" data-interval="false">

            <!--Slides-->
            <div class="carousel-inner" role="listbox">
              <!--First slide-->
              <div class="carousel-item active">

                <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                    <img src="./img/AnhDaiDien/nick-young.jpg" class="rounded-circle img-fluid" style="overflow: hidden;" height="150px" width="150px">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>Nhờ người bạn đồng nghiệp giới thiệu, 
                  chị biết đến TQueen và thực hiện bọc răng sứ tại đây. Giờ chị có thể tự tin cười nói vui vẻ 
                  mà không e ngại hàm răng ố vàng. Cảm ơn Bác sĩ Lee Ji-eun, Bác sĩ Dương Mịch và TQueen rất nhiều.
                  </p>

                  <h4>Anh Trương Tiểu Phàm - Long An - 37 tuổi</h4>
                  <p>Bọc 20 răng toàn sứ - <strong>Zirconia</strong></p>

                </div>

              </div>
              <!--/First slide-->

              <!--Second slide-->
              <div class="carousel-item">

                <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                    <img src="./img/AnhDaiDien/meme-chong-nanh.jpg" class="rounded-circle" style="overflow: hidden" height="150px" width="150px">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>Mất răng, mà còn mất ngay răng cửa nên ảnh hưởng đến thẩm mỹ của chị lắm.
                   Chị chọn trồng Implant vì nhìn tự nhiên và giống với các răng thật còn lại nhất. 
                   Quá trình làm răng nhẹ nhàng, thoải mái và sau đó cũng không sưng đau gì nhiều.
                   Nhờ bác Bác và TQueen mà chị có được răng mới bền đẹp, có thể tự tin cười nói như xưa.
                  </p>

                  <h4>Anh Trần Ngọc Phong – TP Hồ Chí Minh - 27 tuổi</h4>
                  <p>Mất 1 răng – Trồng 1 trụ Implant Straumann</p>

                </div>

              </div>
              <!--/Second slide-->

              <!--Third slide-->
              <div class="carousel-item">

                <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                    <img src="./img/AnhDaiDien/nguyen-van-a.jpg" class="rounded-circle" style="overflow: hidden" height="150px" width="150px">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i> Lúc trước mất răng tôi làm hàm tháo lắp, mà chỉ 1, 2 năm sau hàm nó lỏng lẻo, 
                  thức ăn mắc vào rất khó chịu. Bất tiện không thể xài được nữa, nên tôi quyết định cấy Implant luôn. 
                  Đến TQueen nhờ bác sĩ tư vấn rõ ràng và lên kế hoạch cho tôi, nên tôi quyết định làm Implant toàn hàm luôn. 
                  Bác sĩ Tùng chích thuốc tê, rồi làm nhẹ nhàng, không đau. Có răng rồi tôi ăn uống thoải mái hơn hàm tháo lắp nhiều, 
                  sức khỏe cũng tốt hơn. Tôi cám ơn TQueen và bác Lee Ji-eun nhiều.
                  </p>

                  <h4>Anh Nguyễn Văn A - TP Hồ Chí Minh - 28 tuổi</h4>
                  <p>Mất răng toàn hàm – Trồng Implannt All on 4</p>

                </div>

              </div>
              <!--/Third slide-->

              <!-- slide 4 -->
              <div class="carousel-item">

                <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                    <img src="./img/AnhDaiDien/meme-01.jpg" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>Em rất ấn tượng với cơ sở vật chất và máy móc ở TQueen, 
                  hiện đại không thua kém gì ở nước ngoài. Và khi được biết bác sĩ Lee Ji-eun cũng từng tu nghiệp ở 
                  Pháp nên em càng yên tâm hơn. Sau khi cấy 2 răng Implant, em ăn uống dễ dàng hơn nhiều,
                  . em hoàn toàn yên tâm khi điều trị tại TQueen.
                  </p>

                  <h4>Em Mạc Phàm - Canada - 14 tuổi</h4>
                  <p>Mất 2 răng - Trồng 2 trụ Implant Mis C1</p>

                </div>

              </div>
            </div>
            <!--/Slides-->

            <!--Controls-->
            <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Trước đó</span>
            </a>
            <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Kế tiếp</span>
            </a>
            <!--/.Controls-->
          </div>
          <!--/Carousel Wrapper-->
        </div>

      </section>
      <!--/Section: Testimonials v.2-->

    </div>

  </main>
  <!--/Main content-->

  <!--Footer-->
  <footer class="page-footer text-center text-md-left stylish-color-dark pt-0">

    <div class="top-footer-color">
      <div class="container">
        <!--Grid row-->
        <div class="row py-2 d-flex align-items-center">

          <!--Grid column-->
          <div class="col-md-6 col-lg-6 text-center text-md-center mb-md-0">
            <p>
              HOTLINE TƯ VẤN 24/7<br/>
              <i class="fas fa-phone mr-3"></i>
              (+84) 94.1818.616
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-lg-5 text-center text-md-center mb-md-0">
            <p>
              GỬI EMAIL TƯ VẤN<br/>
              <i class="fas fa-envelope mr-3"></i>
              nhakhoa.ident@gmail.com
            </p>
          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->
      </div>
    </div>

    <!--Footer Links-->
    <div class="container mt-5 mb-0 text-center text-md-left">
      <div class="row mt-3">

        <!--First column-->
        <div class="col-md-3 col-lg-4 col-xl-2 mb-4">
          <h6 class="text-uppercase font-weight-bold"><strong>KẾT NỐI VỚI TQUEEN</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <div class="row">
            <div class="col-sm-3">
              <a href="https://www.facebook.com/NhaKhoaIDent" target="_blank">
                <i class="fab fa-facebook fa-2x"></i>
              </a>
            </div>
            <div class="col-sm-3">
              <a href="https://www.youtube.com/channel/UCqFZe36HfQU_h0y-lhVmgEQ?sub_confirmation=1" target="_blank">
              <i class="fab fa-youtube fa-2x"></i>
              </a>
            </div>
            <div class="col-sm-3">
              <a href="https://www.instagram.com/identdentalclinic" target="_blank">
              <i class="fab fa-instagram fa-2x"></i>
              </a>
            </div>
            <div class="col-sm-3">
              <a href="https://twitter.com/TrungTamImplant" target="_blank">
              <i class="fab fa-twitter fa-2x"></i>
              </a>
            </div>
          </div>
        </div>
        <!--/.First column-->

        <!--Second column-->
        <div class="col-md-5 col-lg-4 col-xl-5 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold"><strong>NHA KHOA IMPLANT TQUEEN</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><i class="fas fa-map-marker-alt"></i>  CS1: 19U-19V Nguyễn Hữu Cảnh, P.19, Q.Bình Thạnh, TP.HCM</p>
          <p><i class="fas fa-map-marker-alt"></i>  CS2: 193A-195 Hùng Vương, P.9, Q.5, TP.HCM</p>
          <p><i class="fas fa-map-marker-alt"></i>  CS3: 83 Đường số 3 khu dân cư Cityland, Phường 10, Quận Gò Vấp, TP.HCM</p>
          <p><i class="fas fa-phone"></i>  Hotline 1: (+84) 94.1818.616</p>
          <p><i class="fas fa-phone"></i>  Điện thoại: (028) 38406854</p>
          <p> 
          <div class="row">
            <div class="col-4">
              <i class="far fa-clock"></i>  Giờ làm việc:
            </div>
            <div class="col-8">
              <p>Thứ 2 - Thứ 7: 8h00 - 20h00
                <br/>
                Chủ nhật: 8h00 - 12h00</p>
            </div>
          </div>
          </p>

        </div>
        <!--/.Second column-->

        <!--Third column-->
        <div class="col-md-4 col-lg-3 col-xl-3">
          <h6 class="text-uppercase font-weight-bold"><strong>Thông tin cần biết</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><i class="far fa-arrow-alt-circle-right"></i>  Đội ngũ tiến sĩ - bác sĩ</p>
          <p><i class="far fa-arrow-alt-circle-right"></i>  Tại sao chọn chúng tôi ?</p>
          <p><i class="far fa-arrow-alt-circle-right"></i>  Cơ sở vật chất</p>
          <p><i class="far fa-arrow-alt-circle-right"></i>  Liên hệ</p>
          <p><i class="far fa-arrow-alt-circle-right"></i>  Chuyên gia răng miệng</p>

        </div>
        <!--/.Third column-->

      </div>
    </div>
    <!--/.Footer Links-->

    <!-- Copyright-->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        <p>
          GPKD/MST/0123456789
          <br/>
          Ngày cấp: 09/10/2014 bởi Sở Kế hoạch và Đầu tư Tp.Hồ Chí Minh
        </p>
      </div>
    </div>
    <!--/.Copyright -->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="./js/khachhang/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="./js/khachhang/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="./js/khachhang/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="./js/khachhang/mdb.min.js"></script>

  <!-- <script src="./js/khachhang/datepicker.js"></script> -->
  <!-- Custom scripts -->
  <script>

    // Animation init
    new WOW().init();

  </script>
  <script>
    $(function () {
      var selectedClass = "";
      $(".filter").click(function () {
        selectedClass = $(this).attr("data-rel");
        $("#gallery").fadeTo(100, 0.1);
        $("#gallery div").not("." + selectedClass).fadeOut().removeClass('animation');
        setTimeout(function () {
          $("." + selectedClass).fadeIn().addClass('animation');
          $("#gallery").fadeTo(300, 1);
        }, 300);
      });
    });

  </script>
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    $(document).ready(function () {
      $('.mdb-select').materialSelect();
    });
    
    function chonbacsi() {
      // var mabs = document.getElementById("dsbacsi").value;

      // var xmlhttp = new XMLHttpRequest();
      // xmlhttp.onreadystatechange = function() {
      //   if (this.readyState == 4 && this.status == 200) {
      //       document.getElementById("ngaygiokham").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
      //   }
      // };
      // xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs, true);
      // xmlhttp.send();
      
      var x =  document.getElementById("dsbacsi").value;
      if (x == 0) {       
        document.getElementById("ngaygiokham").innerHTML = `<h6 class="mt-3 mb-3 red-text d-flex align-items-center justify-content-center">Vui lòng chọn bác sĩ khám để có thể chọn ngày theo lịch làm việc của bác sĩ</h6>`;     
        document.getElementById("chongiokham").innerHTML = `<h6 class="mt-3 mb-3 red-text d-flex align-items-center justify-content-center">Vui lòng chọn bác sĩ và ngày làm việc để chọn giờ khám đặt trước</h6>`;     
        document.getElementById("from").value = "";
        document.getElementById("giokham").value = "";
      }
      else {
        document.getElementById("ngaygiokham").innerHTML = "";
      }

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
    }
    
    // function chonbacsi02() {
    //   var x =  document.getElementById("dsbacsi").value;
    //   // document.getElementById("form-contact-phone").value = 
    //   // <php
    //   //   $tong = 0;
    //   //   for($i=0;$i<10;$i++) {
    //   //     $tong += $i;
    //   //   }
    //   //   echo $tong;
    //   // ?>;
    //   // if (x != 0) {
    //     document.getElementById("ngaygiokham").innerHTML = "";

    //   // }  
    // }
  </script>
  <script>

  let monthEle = document.querySelector('.month-calender');
  let yearEle = document.querySelector('.year-calender');
  let btnNext = document.querySelector('.btn-next-calender');
  let btnPrev = document.querySelector('.btn-prev-calender');
  let btnToday = document.querySelector('.btn-today');
  let dateEle = document.querySelector('.date-container');

  let currentMonth = new Date().getMonth();
  let currentYear = new Date().getFullYear();

  // function displayInfo() {
  //     // Hiển thị tên tháng
  //     // let currentMonthName = new Date(
  //     //     currentYear,
  //     //     currentMonth
  //     // ).toLocaleString('en-us', { month: 'long' });

  //     monthEle.innerText = 'Tháng ' + (currentMonth + 1);

  //     // Hiển thị năm
  //     yearEle.innerText = currentYear;
      
  //     // Hiển thị ngày trong tháng
  //     renderDate();
  // }

  // Lấy số ngày của 1 tháng
  function getDaysInMonth() {
      return new Date(currentYear, currentMonth + 1, 0).getDate();
  }

  // Lấy ngày bắt đầu của tháng
  function getStartDayInMonth() {
      return new Date(currentYear, currentMonth, 1).getDay();
  }

  // Active current day
  function activeCurrentDay(day) {
      let day1 = new Date().toDateString();
      let day2 = new Date(currentYear, currentMonth, day).toDateString();
      return day1 == day2 ? 1 : 0;
  }

  // Hiển thị ngày trong tháng lên trên giao diện
  // function renderDate() {
  //     let daysInMonth = getDaysInMonth();
  //     let startDay = getStartDayInMonth();

  //     dateEle.innerHTML = '';

  //     for (let i = 0; i < startDay; i++) {
  //         dateEle.innerHTML += `
  //             <div class="day-calender"></div>
  //         `;
  //     }

  //     for (let i = 0; i < daysInMonth; i++) {
  //         if (activeCurrentDay(i+1) == 0) {
  //             dateEle.innerHTML += `
  //                 <a class="day-calender" id="${i + 1}-${currentMonth}" onclick="chonngay(${i + 1}, ${currentMonth})">${i + 1}</a>
  //             `;
  //         }
  //         else {
  //             dateEle.innerHTML += `
  //                 <a class="day-calender red-text font-weight-bold" id="${i + 1}-${currentMonth}" onclick="chonngay(${i + 1}, ${currentMonth})">
  //                     ${i + 1}
  //                 </a>
  //             `;
  //         }
  //     }
  // }

  function chonngay(day) {
    document.getElementById('from').value = `${currentYear}-${currentMonth+1}-${day}`;
    var mabs = document.getElementById("dsbacsi").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("chongiokham").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
      }
    };
    xmlhttp.open("GET", "giokham.php?mabs=" + mabs + "&day=" + day + "&month=" + (currentMonth + 1) + "&year=" + currentYear + "&thaotac=khachhang", true);
    xmlhttp.send();
  }
  
  function test() {
    var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("form-contact-message").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "themlichhen.php", true);
      xmlhttp.send();
  }

  function chongio(thoigian) {
    switch(thoigian) {
      case 1:
        document.getElementById('giokham').value = '7:00';
        break;
      case 2:
        document.getElementById('giokham').value = '8:30';
        break;
      case 3:
        document.getElementById('giokham').value = '10:00';
        break;
      case 4:
        document.getElementById('giokham').value = '13:00';
        break;
      case 5:
        document.getElementById('giokham').value = '14:30';
        break;
      case 6:
        document.getElementById('giokham').value = '16:00';
        break;
    }
    
  }

  // Xử lý khi ấn vào nút next month
  btnNext.addEventListener('click', function () {
      if (currentMonth == 11) {
          currentMonth = 0;
          currentYear++;
      } else {
          currentMonth++;
      }
      // displayInfo();
      document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
      document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
  });

  // Xử lý khi ấn vào nút previous month
  btnPrev.addEventListener('click', function () {
      if (currentMonth == 0) {
          currentMonth = 11;
          currentYear--;
      } else {
          currentMonth--;
      }
      // displayInfo();
      document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
      document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
  });

  btnToday.addEventListener('click', function () {
      let d = new Date();
      currentMonth = d.getMonth();
      currentYear = d.getFullYear();
      // displayInfo();
      document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
      document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

      var mabs = document.getElementById("dsbacsi").value;

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
      xmlhttp.send();
  });

  

  window.onload = displayInfo;
  </script>

</body>

</html>
