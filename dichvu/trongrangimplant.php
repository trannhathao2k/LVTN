<?php
  include("../config.php");
  include("../autoload.php");
  // include("./xacdinhdangnhap.php");
  session_start();

  if (isset($_GET['dangxuat'])) unset($_SESSION['khachhang']);
  if (isset($_GET['dangxuat-bs'])) unset($_SESSION['bacsi']);
  if (isset($_GET['dangxuat-nv'])) unset($_SESSION['nhanvien']);
  if (isset($_GET['dangxuat-admin'])) unset($_SESSION['admin']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Trồng răng Implant</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/dangky/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/dangky/mdb.min.css">
  <link rel="stylesheet" href="../css/dangky/style.css">

</head>

<body class="single-page">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar elegant-color-dark">
      <div class="container">
        <a class="navbar-brand font-weight-bold title" href="../index.php">
            <img src="../img/TQueen-logo-removebg-preview.png" alt="logo">
        </a>
        
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
  </header>

  <main>
    <div class="container">
        <section class="pb-3 wow fadeIn" style="margin-top: 150px;">

            <!-- Grid row -->
            <div class="row">

            <!-- Grid column -->
            <div class="col-md-12">

                <div class="card card-cascade wider reverse">
                    <div class="view view-cascade overlay">
                        <img src="../img/Images/dich-vu-cam-ghep-rang-gia-re.jpg" alt="Wide sample post image" class="nhakhoa-bg">
                        <a>
                        <div class=""></div>
                        </a>
                    </div>

                    <div class="card-body card-body-cascade text-center blue lighten-1 white-text">
                        <h2 class="m-auto"><a><strong>TRỒNG RĂNG IMPLANT</strong></a></h2>
                    </div>
                </div>

                <!-- Excerpt -->
                <div class="excerpt mt-5 wow fadeIn" data-wow-delay="0.3s">
                <p><b>Trồng răng Implant</b> hay còn gọi là cấy ghép Implant Với phương án này, các răng thật bị mất 
                    sẽ được thay thế bằng răng Implant, có cấu tạo Implant gồm 3 phần chính: Trụ Implant, 
                    Khớp nối Abutment và Mão sứ.
                </p>

                <p>Khi tiến hành trồng răng, trụ Implant sẽ được đặt vào bên trong xương hàm. Xương sẽ tự bám 
                    quanh thân trụ và tạo độ bám rất vững chắc. Sau đó, mão sứ được gắn cố định lên trên trụ 
                    Implant thông qua khớp nối Abutment. Răng đã được khôi phục hoàn toàn với sức nhai khỏe, 
                    thẩm mỹ tự nhiên, ngăn tiêu xương hàm và sử dụng trọn đời.</p>

                <hr style="border: 1px solid grey;margin: 50px 50px 10px 50px;">
                <h3 class="text-center text-center h3">
                    VÌ SAO NÊN CẤY GHÉP IMPLANT ?
                </h3>
                <hr style="border: 1px solid grey;margin: 10px 50px 50px 50px;">


                <p>Trồng răng Implant là phương pháp khôi phục rất hiệu quả, được tất cả các Bác sĩ, 
                    chuyên gia nha khoa trên thế giới đánh giá là tốt nhất hiện nay. Giúp những bệnh nhân 
                    mất răng có thể ăn nhai ngon miệng và cải thiện sức khỏe.</p>
                
                <blockquote class="blockquote mt-4 mb-4">
                    <ul style="list-style-type: disc;">
                        <li><p>Cấy ghép Implant là giải pháp hiệu quả và an toàn, với tỷ lệ thành công lên đến 98%. 
                        Quá trình trồng răng hoàn toàn không ảnh hưởng gì đến cơ thể.</p></li>
                        <li><p>Không chỉ thẩm mĩ đạt 100 % như thật, răng Implant còn đảm bảo chức năng ăn nhai tốt 
                            và phát âm dễ dàng.</p></li>
                        <li><p>Khắc phục tất cả các trường hợp: mất 1 răng, mất nhiều răng, mất răng toàn hàm, 
                            mất răng lâu năm.</p></li>
                        <li><p>Răng Implant tồn tại độc lập, không tác động đến bất kỳ một chiếc răng nào, 
                            vì vậy có thể bảo tồn nguyên vẹn các răng bên cạnh.</p></li>
                        <li><p>Ngăn ngừa tiêu xương hàm do mất răng lâu ngày, giữ cho khuôn mặt cân đối và không bị lão hóa.
                             Phương án dùng hàm tháo lắp, cầu răng sứ hoàn toàn không khắc phục được biến chứng này.</p></li>
                        <li><p>Răng Implant được trồng cố định, vững chắc nên các nhược điểm của hàm giả tháo lắp như vướng víu, 
                            dễ bị rơi, không cố định… được khắc phục hoàn toàn.</p></li>
                        <li><p>Hạn chế sâu răng, hôi miệng và một số bệnh lý nha chu khác.</p></li>
                        <li><p>Trồng răng Implant 1 lần có thể dùng được trọn đời, giúp tiết kiệm chi phí và thời gian, 
                            khi không phải đi lại trồng mới nhiều lần như hàm tháo lắp hay cầu sứ.</p></li>
                    </ul>
                </blockquote>

                <hr style="border: 1px solid grey;margin: 50px 50px 10px 50px;">
                <h3 class="text-center text-center h3">
                    CÁC TRƯỜNG HỢP MẤT RĂNG KHẮC PHỤC BẰNG PHƯƠNG PHÁP<br/> CẤY RĂNG IMPLANT
                </h3>
                <hr style="border: 1px solid grey;margin: 10px 50px 50px 50px;">

                <div class="row">
                    <div class="col-lg-5">
                        <img src="../img/Images/trong-rang-implant-1-removebg-preview.png" alt="cac-truong-hop-co-the-cay-rang" width="100%">
                    </div>
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-6 mt-1">
                                <div style="z-index: 2;position: relative;">
                                    <img src="../img/Images/mat-1-rang.png" alt="mat-1-rang" width="120px" height="120px">
                                </div>                              
                                <div class="bg-primary white-text canhgiua" style="height: 75px;width: 180px;font-weight: bold;position: absolute;left: 100px;top: 25px;z-index: 1">MẤT 1 RĂNG</div>
                            </div>
                            <div class="col-lg-6 mt-1">
                                <div style="z-index: 2;position: relative;">
                                    <img src="../img/Images/mat-3-rang-lien-ke.png" alt="mat-3-rang" width="120px" height="120px">
                                </div>                              
                                <div class="bg-primary white-text canhgiua" style="height: 75px;width: 180px;font-weight: bold;position: absolute;left: 100px;top: 25px;z-index: 1">MẤT 3 RĂNG LIỀN KỀ</div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div style="z-index: 2;position: relative;">
                                    <img src="../img/Images/mat-4-rang-lien-ke.png" alt="mat-4-rang" width="120px" height="120px">
                                </div>                              
                                <div class="bg-primary white-text canhgiua" style="height: 75px;width: 180px;font-weight: bold;position: absolute;left: 100px;top: 25px;z-index: 1">MẤT 4 RĂNG LIỀN KỀ</div>
                            </div><div class="col-lg-6 mt-3">
                                <div style="z-index: 2;position: relative;">
                                    <img src="../img/Images/mat-rang-toan-ham-1.png" alt="mat-rang-toan-ham" width="120px" height="120px">
                                </div>                              
                                <div class="bg-primary white-text canhgiua" style="height: 75px;width: 180px;font-weight: bold;position: absolute;left: 100px;top: 25px;z-index: 1">MẤT RĂNG TOÀN HÀM</div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="border: 1px solid grey;margin: 50px 50px 10px 50px;">
                <h3 class="text-center text-center h3">
                QUY TRÌNH CẤY GHÉP IMPLANT
                </h3>
                <hr style="border: 1px solid grey;margin: 10px 50px 50px 50px;">

                </div>

            </div>
            <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </section>
    </div>
  </main>

  <footer class="page-footer text-center text-md-left stylish-color-dark pt-0">

    <div class="blue">
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

</html>