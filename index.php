<?php
  include("./config.php");
  include("./autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();

  if (isset($_GET['dangxuat'])) unset($_SESSION['khachhang']);
  if (isset($_GET['dangxuat-bs'])) unset($_SESSION['bacsi']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Nha khoa Implant I-Dent</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="./css/khachhang/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="./css/khachhang/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/khachhang/style.css">
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
            <img src="./img/nha-khoa-ident-logo.png">
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
                  <a class="dropdown-item" href="">
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
            <!-- <li class="nav-item dropdown notifications-nav">
              <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown01" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profile</span></a>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown01">
                <a class="dropdown-item" href="#">Log Out</a>
                <a class="dropdown-item" href="#">My account</a>
              </div>
            </li> -->
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
            <div class="col-12 col-md-6 text-center text-md-left">
              <div class="white-text">
                <h1 class="h1-responsive font-weight-bold mt-md-5 mt-0 wow fadeInLeft" data-wow-delay="0.3s">NHA KHOA IMPLANT I-DENT</h1>
                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                <p class="wow fadeInLeft mb-3" data-wow-delay="0.3s">
                Nha khoa I-dent là một địa chỉ nha khoa uy tín hàng đầu về kỹ thuật cấy ghép implant hiện nay. 
                Với TS-BS Nguyễn Hiếu Tùng với 10 năm kinh nghiệp trong lĩnh vực.
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

    <!--Modal Info-->
    <!-- <div class="modal fade modal-ext" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 py-3" id="myModalLabel">Information about clinic</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">

            <h5 class="title mb-3 font-weight-bold">Opening hours:</h5>

            <table class="table">
              <tbody>
                <tr>
                  <td>Monday - Friday:</td>
                  <td>8 AM - 9 PM</td>
                </tr>
                <tr>
                  <td>Saturday:</td>
                  <td>9 AM - 6 PM</td>
                </tr>
                <tr>
                  <td>Sunday:</td>
                  <td>11 AM - 6 PM</td>
                </tr>
              </tbody>
            </table>

            <h5 class="title mb-4 font-weight-bold">Addresses:</h5>

            <div class="row">

              <div class="col-md-6">

                <p>125 Street<br> New York, NY 10012</p>

              </div>

              <div class="col-md-5">

                <p>Allen Street 5<br> New York, NY 10012</p>

              </div>

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-rounded btn-info waves-effect" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> -->

  </header>
  <!--/Navigation & Intro-->

  <!--Main content-->
  <main>

    <div class="container">

      <!--Section: Features v.1-->
      <section id="features" class="mt-4 mb-5 pb-5">

        <!--Section heading-->
        <h3 class="text-center mb-5 mt-5 pt-5 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
          GIÁ TRỊ CỐT LỖI NHA KHOA IMPLANT I-DENT MANG LẠI
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
                Tư vấn, hỗ trợ bệnh nhân nhiệt tình tất cả các vấn đề phát sinh trong suốt quá trình điều trị. 
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
            <h2 class="mb-3 font-weight-bold">CÂU CHUYỆN CỦA I-DENT</h2>
            <!--Description-->
            <!-- <h4 class="mb-5 dark-grey-text">Visit Our New Clinic in New York.</h4> -->
            <!--Content-->
            <p class="grey-text" align="justify">
              Với niềm đam mê và sự nhiệt huyết dành cho lĩnh vực Nha khoa, 
              ngay từ khi còn theo học tại ĐH Y Dược TP HCM, <b>Tiến sĩ – Bác sĩ Nguyễn Hiếu Tùng</b> 
              đã thể hiện xuất sắc trong quá trình học tập và dành được học bổng nghiên cứu sinh 
              tại Đại Học Aix- Marseille, nước Pháp.
            </p>

            <p class="grey-text" align="justify">Trong hơn 10 năm tu nghiệp tại Pháp và được tiếp cận 
              với những công nghệ hiện đại nhất, <b>Bác sĩ Nguyễn Hiếu Tùng</b> cảm thấy lo ngại trước những 
              kỹ thuật nha khoa đã quá cũ và không bắt kịp sự tiến bộ của nền Nha khoa thế giới tại nước ta. 
              Đồng thời, tại Việt Nam cũng thiếu đi những địa chỉ nha khoa tin cậy và các phương án 
              điều trị thích hợp cho người dân.
            </p>

            <p class="grey-text" align="justify">Việc thiếu đi các thông tin kiến thức được phổ biến 
              rộng rãi là nguyên nhân chính tạo nên sự thờ ơ và không quan tâm đúng mức đến sức khỏe 
              răng miệng của phần lớn người dân trong nước, dẫn đấu những hậu quả nghiêm trọng về sức khỏe 
              lâu dài, trong đó có chính gia đình của Bác sĩ Tùng.
            </p>

            <p class="grey-text" align="justify">Trở thành 1 trong những Tiến Sĩ Y Khoa trẻ nhất Việt Nam 
              sau khi bảo vệ thành công luận án tiến sĩ tại Pháp, với rất nhiều cơ hội để thành công tại 
              nước ngoài. Tuy nhiên, bằng tình yêu quê hương, nhiệt huyết và mong muốn đóng góp phát triển 
              cho ngành Nha khoa tại nước nhà, đặc biệt là trong lĩnh vực Cấy ghép Implant, Bác sĩ Tùng 
              đã quyết định từ bỏ tất cả để quay về Việt Nam và lập nghiệp.
            </p>

            <p class="grey-text" align="justify">Với những trăn trở và mong muốn đó của Bác sĩ Tùng đã 
              trở thành kim chỉ nam để thành lập và phát triển Nha khoa I-DENT. Thành lập năm 2014, 
              sau hơn 6 năm đi vào hoạt động, với sự nỗ lực không ngừng của <b>Tiến sĩ – Bác sĩ Nguyễn Hiếu Tùng</b> 
              cùng với đội ngũ cộng sự Bác sĩ, phụ tá, nhân viên tại nha khoa I-DENT đã thực hiện 
              thành công hơn 10,000 ca Implant, qua đó kiến tạo nụ cười hạnh phúc cho hàng ngàn bệnh nhân.
            </p>

            <p class="grey-text" align="justify">
            Đưa I-DENT trở thành một địa chỉ nha khoa uy tín – chất lượng tại TP HCM, là lựa chọn hàng đầu 
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
            <img src="./img/Images/BS-Tung.jpg" class="img-fluid z-depth-1">

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
          <h3 class="text-center text-white text-uppercase font-weight-bold mt-5 mb-5 pt-3 wow fadeIn" data-wow-delay="0.2s">NHA KHOA I-DENT ĐIỂM ĐẾN TIN CẬY CỦA KHÁCH HÀNG TRONG VÀ NGOÀI NƯỚC</h3>

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
        <h3 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">GẶP GỠ CÁC TIẾN SĨ - BÁC SĨ CỦA I-DENT</h3>
        <!--Section description-->
        <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">Nha khoa Implant I-DENT với Đội ngũ BS và Chuyên gia nhiều năm 
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
                  <a class="nav-link active " data-toggle="tab" href="#panel31" role="tab">TS - BS<br/>Nguyễn Hiếu Tùng</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel32" role="tab">Tiến sĩ - Bác sĩ<br/>Trần Thị Nguyên Ny</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel33" role="tab">Thạc sĩ - Bác sĩ<br/>Lê Thị Phương Linh</a>
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
                      <img src="./img/Images/tien-si-bac-si-nguyen-hieu-tung.jpg" class="img-fluid">
                    </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                    <!--Title-->
                    <h4 class="mb-3">TIẾN SĨ - BÁC SĨ NGUYỄN HIẾU TÙNG</h4>

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
                      <img src="./img/Images/tien-si-bac-si-tran-thi-nguyen-ni.jpg" class="img-fluid">
                    </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                    <!--Title-->
                    <h4 class="mb-3">TIẾN SĨ - BÁC SĨ TRẦN THỊ NGUYÊN NY</h4>

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
                      <img src="./img/Images/bs-linh.jpg" class="img-fluid">
                    </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                    <!--Title-->
                    <h4 class="mb-3">THẠC SĨ - BÁC SĨ LÊ THỊ PHƯƠNG LINH</h4>

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

      <section id="services" class="mt-3 pb-3">

        <!-- Grid row -->
        <div class="row mt-5 pt-5 wow fadeIn" data-wow-delay="0.4s">

          <!-- Grid column -->
          <div class="col-md-6 mb-1 text-center">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1 rounded">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/WXX4qCbyts0" title="YouTube video player" frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <p style="margin-top: 10px;">Đánh giá của Đài truyền hình <b class="text-danger">VTV3</b> về Nha khoa I-Dent</p>

          </div>
          <!-- Grid column -->

          <!-- Second column -->
          <div class="col-md-6 mb-1 text-center">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1 rounded">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/PQu1lk1zBiU" title="YouTube video player" frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <p style="margin-top: 10px;">Đánh giá của Đài truyền hình <b class="text-danger">HTV7</b> về Nha khoa I-Dent</p>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Download -->
      <hr>
      <h3 class="text-center mb-3 mt-3 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
        VIDEOS CẢM NHẬN CỦA KHÁCH HÀNG VỀ NHA KHOA I-DENT
      </h3>
      <section id="services" class="mt-3 pb-3">

        <!-- Grid row -->
        <div class="row mt-5 pt-5 wow fadeIn" data-wow-delay="0.4s">

          <!-- Grid column -->
          <div class="col-md-6 mb-1 text-center">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1 rounded">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/jZF0MMdPang" 
                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

          </div>
          <!-- Grid column -->

          <!-- Second column -->
          <div class="col-md-6 mb-1 text-center">

            <div class="embed-responsive embed-responsive-16by9 z-depth-1 rounded">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/cUUFDm2GJeo" title="YouTube video player" 
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
                <h3 class="text-center mb-3 mt-3 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">ĐẶT LỊCH THĂM KHÁM CÙNG BÁC SĨ I-DENT</h3>

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-6">
                    <div class="md-form mb-0">
                      <input type="text" id="form-contact-name" class="form-control">
                      <label for="form-contact-name" class="">Họ tên khách hàng</label>
                    </div>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-6">
                    <div class="md-form mb-0">
                      <input type="text" id="form-contact-email" class="form-control">
                      <label for="form-contact-email" class="">Địa chỉ email</label>
                    </div>
                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-6">
                    <div class="md-form mb-0">
                      <input type="text" id="form-contact-phone" class="form-control">
                      <label for="form-contact-phone" class="">Số điện thoại</label>
                    </div>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4">
                    <div class="md-form mb-0">
                      <input type="text" id="form-contact-company" class="form-control">
                      <label for="form-contact-company" class="">Chọn bác sĩ</label>
                    </div>
                  </div>
                  <!-- Grid column -->
                  <div class="col-md-2">
                    <div class="md-form mb-0">
                      <button type="button" class="btn btn-sm btn-primary">Danh sách bác sĩ</button>
                    </div>
                  </div>

                </div>
                <!-- Grid row -->

                <div class="row">
                  <!-- Grid column -->
                  <div class="col-md-6">
                    <div class="md-form">
                      <input placeholder="Chọn ngày" type="text" id="from" class="form-control datepicker">
                      <label for="date-picker-example">Chọn ngày khám</label>
                    </div>
                  </div>
                  <!-- Grid column -->
                  <!-- Grid column -->
                  <div class="col-md-6">

                  <div class="md-form">
                    <input placeholder="Selected time" type="text" id="input_endtime" class="form-control timepicker">
                    <label for="input_starttime" class="active">Dark version, 24 hours</label>
                  </div>

                  </div>
                  <!-- Grid column -->
                </div>

                <!-- Grid row -->
                <div class="row">

                  <!-- Grid column -->
                  <div class="col-md-12">
                    <div class="md-form mb-0">
                      <textarea type="text" id="form-contact-message" class="form-control md-textarea" rows="3"></textarea>
                      <label for="form-contact-message">Lời nhắn</label>
                      <a class="btn-floating btn-lg blue">
                        <i class="far fa-paper-plane"></i>
                      </a>
                    </div>
                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

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
          CẢM NHẬN CỦA KHÁCH HÀNG SAU KHI SỬ DỤNG DỊCH VỤ TẠI NHA KHOA I-DENT
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
                    <img src="./img/Images/khachhang/ChiThuYen.PNG" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>Nhờ người bạn đồng nghiệp giới thiệu, 
                  chị biết đến I-Dent và thực hiện bọc răng sứ tại đây. Giờ chị có thể tự tin cười nói vui vẻ 
                  mà không e ngại hàm răng ố vàng. Cảm ơn Bác sĩ Tùng, Bác sĩ Khanh và I-Dent rất nhiều.
                  </p>

                  <h4>Chị Thu Yến - Long An - 36 tuổi</h4>
                  <p>Bọc 20 răng toàn sứ - <strong>Zirconia</strong></p>

                </div>

              </div>
              <!--/First slide-->

              <!--Second slide-->
              <div class="carousel-item">

                <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                    <img src="./img/Images/khachhang/ChiUyen.PNG" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>Mất răng, mà còn mất ngay răng cửa nên ảnh hưởng đến thẩm mỹ của chị lắm.
                   Chị chọn trồng Implant vì nhìn tự nhiên và giống với các răng thật còn lại nhất. 
                   Quá trình làm răng nhẹ nhàng, thoải mái và sau đó cũng không sưng đau gì nhiều.
                   Nhờ bác Tùng và I-Dent mà chị có được răng mới bền đẹp, có thể tự tin cười nói như xưa.
                  </p>

                  <h4>Chị Uyên – TP Hồ Chí Minh - 27 tuổi</h4>
                  <p>Mất 1 răng – Trồng 1 trụ Implant Straumann</p>

                </div>

              </div>
              <!--/Second slide-->

              <!--Third slide-->
              <div class="carousel-item">

                <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                    <img src="./img/Images/khachhang/CoTam.PNG" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i> Lúc trước mất răng cô làm hàm tháo lắp, mà chỉ 1, 2 năm sau hàm nó lỏng lẻo, 
                  thức ăn mắc vào rất khó chịu. Bất tiện không thể xài được nữa, nên cô quyết định cấy Implant luôn. 
                  Đến I-Dent nhờ bác sĩ tư vấn rõ ràng và lên kế hoạch cho cô, nên cô quyết định làm Implant toàn hàm luôn. 
                  Bác sĩ Tùng chích thuốc tê, rồi làm nhẹ nhàng, không đau. Có răng rồi cô ăn uống thoải mái hơn hàm tháo lắp nhiều, 
                  sức khỏe cũng tốt hơn. Cô cám ơn I-Dent và bác Tùng nhiều.
                  </p>

                  <h4>Cô Tâm - TP Hồ Chí Minh - 68 tuổi</h4>
                  <p>Mất răng toàn hàm – Trồng Implannt All on 4</p>

                </div>

              </div>
              <!--/Third slide-->

              <!-- slide 4 -->
              <div class="carousel-item">

                <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                    <img src="./img/Images/khachhang/Peter.PNG" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>Tôi rất ấn tượng với cơ sở vật chất và máy móc ở I-Dent, 
                  hiện đại không thua kém gì ở nước ngoài. Và khi được biết bác sĩ Tùng cũng từng tu nghiệp ở 
                  Pháp nên tôi càng yên tâm hơn. Sau khi cấy 2 răng Implant, tôi ăn uống dễ dàng hơn nhiều,
                   khuôn mặt cũng cân đối và trẻ hơn trước. Tôi hoàn toàn yên tâm khi điều trị tại I-Dent.
                  </p>

                  <h4>Mr. Peter Bush - Canada - 43 tuổi</h4>
                  <p>Mất 2 răng - Trồng 2 trụ Implant Mis C1</p>

                </div>

              </div>
            </div>
            <!--/Slides-->

            <!--Controls-->
            <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
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
          <h6 class="text-uppercase font-weight-bold"><strong>KẾT NỐI VỚI I-DENT</strong></h6>
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
          <h6 class="text-uppercase font-weight-bold"><strong>NHA KHOA IMPLANT I-DENT</strong></h6>
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
          GPKD/MST/0312964786
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
    // Data Picker Initialization
    $('.datepicker').pickadate();

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

    // Time Picker Initialization
    $('#input_starttime').pickatime({
      twelvehour: true
    });
    $('#input_endtime').pickatime({
      // 12 or 24 hour
      twelvehour: false,
      // Light or Dark theme
      darktheme: true
    });

  </script>

</body>

</html>
