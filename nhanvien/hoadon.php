<?php 
  include("../config.php");

  if (isset($_GET['id'])) {
    $maphieu = $_GET['id'];
  }
  else {
    $maphieu = 0;
  }

  $sql_thongtin = "SELECT * FROM phieukhambenh, nhanvien WHERE phieukhambenh.id_nv = nhanvien.id_nv AND maphieu = '$maphieu'";
  $query_thongtin = mysqli_query($mysqli, $sql_thongtin);
  $thongtin = mysqli_fetch_array($query_thongtin);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Hóa đơn</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/dangky/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/dangky/mdb.min.css">
  <link rel="stylesheet" href="../css/dangky/mdb.css">
  <link rel="stylesheet" type="text/css" href="../css/dangky/addons/datatables.min.css">
  <link rel="stylesheet" href="../css/dangky/addons/datatables-select.min.css">
  <link rel="stylesheet" href="../css/dangky/style.css">
  <link rel="stylesheet" href="../css/dangky/modules/animations-extended.min.css">
  <!-- Your custom styles (optional) -->
  <style>
    *{margin:0px auto;padding:0px;}
div#wrapper{width:940px;padding:20px;font-family: 'Times New Roman', Times, serif;font-size: 16px;}
div#header{overflow: hidden;margin-bottom: 20px;}
div#left_header{float:left;width:350px;}
div#right_header{float:right;width:550px;padding-top: 0px;overflow: hidden;}
div#left_header p{overflow: hidden;margin-bottom: 5px;}
div#left_header label{width:100px;float:left;font-weight: bold;}
div#right_header p{font-size:25px;}
div#right_header span{font-weight: bold;font-size:16px;display: block;}
div#customer{margin-bottom: 20px;margin-top: 50px;}
div#customer p{overflow: hidden;margin-bottom: 5px;}
div#customer label{float:left;width:150px;font-weight: bold;}
div#product{overflow: hidden}
div#product table{border:1px solid #333;width:100%;border-collapse: collapse}
div#product table thead tr th{border:1px solid #333;padding:5px;font-weight: bold;}
div#product table tbody tr td{border:1px solid #333;padding:5px;}
div#product table tfoot tr td{border:1px solid #333;padding:5px;text-align: center;font-weight: bold;}
div#character{padding: 20px 0px;padding-left: 4px;}
div#character p label{font-style: italic;}
div#character p span{font-weight: bold;}
div#footer{overflow: hidden;padding: 20px 0px;width: 940px;}
div#left_footer{float:left;width:280px;text-align: center;}
div#right_footer{float:right;width:280px;text-align: center}
div#center_footer{float:none;width:280px;text-align: center}
a#print_button{margin-bottom: 10px;}
@page 
{
    size: auto;   /* auto is the initial value */
    margin: 0mm;  /* this affects the margin in the printer settings */
}
.woocommerce-table__line-item.order_item a {
color: #333;
text-decoration: none;
font-weight: 400 !important;
}

tr.woocommerce-table__line-item.order_item strong.product-quantity {
    font-weight: 400;
}
  </style>
</head>
 <!-- onload='window.print();' -->
<body onload='window.print();'>
  <!-- <div class="row p-3">
    <div class="col-lg-3">
      <img src="../img/TQueen-logo-removebg-preview.png" height="50px">
    </div>
    <div class="col-lg-9">
      <ul style="list-style-type: none;">
        <li><b style="font-size: 20px;">NHA KHOA IMPLANT TQUEEN</b></li>
        <li>Địa chỉ: 19U-19V Nguyễn Hữu Cảnh, P.19, Q.Bình Thạnh, TP.HCM</li>        
        <li>Điện thoại: 0968.892.700</li>        
        <li>Website: https://nhathao-2000.000webhostapp.com/</li>        
      </ul>
    </div>
  </div> -->
  </head><body><div id="wrapper">   
    <div id="header">
        <div id="left_header">
            <img src="../img/TQueen-logo-removebg-preview.png" alt="NHA KHOA TQUEEN" height="100px">
        </div>
        <div id="right_header">
            <ul style="list-style-type: none;margin-left: 20px;">
              <li><b style="font-size: 20px;">NHA KHOA IMPLANT TQUEEN</b></li>
              <li>Địa chỉ: 83 Đường số 3 khu dân cư Cityland, Phường 10, Quận Gò Vấp, TP.HCM</li>
              <li>Điện thoại: 0968.156.824</li>
              <li>Website: https://nhathao-2000.000webhostapp.com/</li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="mb-3" style="width: 100%;">
      <div style="float: left;margin-top: 0px;width: 50%;">
        <b>Mã phiếu: <?php echo $thongtin['maphieu'] ?></b>
      </div>
      <div style="float: right;margin-top: 0px;width: 50%;text-align: right;">
        <i>TP. Hồ Chí Minh, <?php
          date_default_timezone_set('Asia/Ho_Chi_Minh');
          $day = date("d");
          $month = date("m");
          $year = date("Y");
          echo "ngày $day tháng $month năm $year";
        ?></i>
      </div>
    </div>
    <div class="text-center mt-5">
      <h2>PHIẾU KHÁM VÀ ĐIỀU TRỊ RĂNG</h2>
    </div>
    <div id="customer">
        <p>
            <label>Họ và tên: </label>
            <span><?php echo $thongtin['tenkhachhang'] ?></span>
        </p>
        <p>
            <label>Địa chỉ: </label>
            <span><?php
              if ($thongtin['id_kh'] != 0) {
                $id_kh = $thongtin['id_kh'];
                $sql_thongtin_kh = "SELECT * FROM phieukhambenh, khachhang WHERE phieukhambenh.id_kh = khachhang.id_kh AND phieukhambenh.maphieu = '$maphieu' AND phieukhambenh.id_kh = $id_kh";
                $query_thongtin_kh = mysqli_query($mysqli, $sql_thongtin_kh);
                $thongtin_kh = mysqli_fetch_array($query_thongtin_kh);
                echo $thongtin_kh['diachi_kh'];
              }
            ?></span>
        </p>
        <p>
            <label>Email: </label>
            <span>
              <?php
                if($thongtin['id_kh'] != 0) {
                  echo $thongtin_kh['email_kh'];
                }
              ?>
            </span>
        </p>
        <p>
            <label>Số điện thoại: </label>
            <span>
              <?php
                if($thongtin['id_kh'] != 0) {
                  echo $thongtin_kh['sdt_kh'];
                }
              ?>
            </span>
        </p>  
		  
    </div>
    <div id="product">
	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
    <colgroup>
      <col width="60%" span="1">
      <col width="10%" span="1">
      <col width="30%" span="1">
    </colgroup>
		<thead>
			<tr style="background-color: #bdbdbd;">
				<th style="text-align:center; padding:5px;">Dịch vụ</th>
				<th style="text-align:center; padding:5px;">Số lượng</th>
				<th style="text-align:center; padding:5px;">Phí</th>
			</tr>
		</thead>
      
		<tbody>
      <?php
        $sql_dichvu = "SELECT * FROM phieukhambenh, dichvuduocchidinh, dichvu WHERE phieukhambenh.maphieu = dichvuduocchidinh.maphieu AND dichvu.id_dichvu = dichvuduocchidinh.id_dichvu AND phieukhambenh.maphieu = '$maphieu'";
        $query_dichvu = mysqli_query($mysqli, $sql_dichvu);
        $tongchiphi = 0;
        while($dichvu = mysqli_fetch_array($query_dichvu)) {
          ?>
            <tr>
              <td><?php echo $dichvu['ten_dichvu'] ?></td>
              <td class="text-center"><?php echo $dichvu['soluong'] ?></td>
              <td style="text-align: center;"><?php echo number_format(($dichvu['phihientai_dichvu'] * $dichvu['soluong']), 0, '', '.') ?> VNĐ</td>
            </tr>
          <?php
          $tongchiphi += $dichvu['phihientai_dichvu'] * $dichvu['soluong'];
        }
      ?>
		</tbody>
    <tfoot>
      <tr>
        <th colspan="2" style="text-align:left; padding:5px;font-weight: bold;border:1px solid #333;">Tổng chi phí</th>
        <td style="padding:5px;font-weight: bold;"><?php echo number_format($tongchiphi, 0, '', '.') ?> VNĐ</td>
      </tr>
      <tr>
        <th colspan="2" style="text-align:left; padding:5px;font-weight: bold;border:1px solid #333;">Giảm giá</th>
        <td style="padding:5px;font-weight: bold;"><?php
          if ($thongtin['id_kh'] != 0) {
            if ($thongtin_kh['diemtichluy'] < 1000) {
              echo "0 (Không áp dụng ưu đãi)";
              $giamgia = 0;
            }
            else if ($thongtin_kh['diemtichluy'] >= 1000 && $thongtin_kh['diemtichluy'] < 3000) {
              $giamgia = $tongchiphi * 0.05;
              echo number_format($giamgia, 0, '', '.')." VNĐ<br><small style='font-weight: 100'>(5% cho khách hàng thân thiết)</small>";
            }
            else {
              $giamgia = $tongchiphi * 0.1;
              echo number_format($giamgia, 0, '', '.')." VNĐ<br><small style='font-weight: 100'>(10% cho khách hàng VIP)</small>";
            }
          }
          else {
            $giamgia = 0;
            echo "<small style='font-weight: 100'>Không áp dụng do chưa có tài khoản</small>";
          }
          
        ?></td>
      </tr>
      <tr style="background-color: #e0e0e0;">
        <th colspan="2" style="text-align:left; padding:5px;font-weight: bold;border:1px solid #333;">THÀNH TIỀN</th>
        <td style="padding:5px;font-weight: bold;font-size: 16px;"><?php echo number_format(($tongchiphi - $giamgia), 0, '', '.') ?> VNĐ</td>
      </tr>
    </tfoot>

		<!--  -->
	</table>
    

    </div>
	
	<div id="character">
				
	<p>
      <label style="font-weight:700;">Ghi chú:</label>
      <span>.....................................</span>
  </p>
    </div>
    <div style="width: 900px;display: flex;text-align: center;margin-top: 0px;">
      <div style="width: 300px;">KHÁCH HÀNG<br><i>(Ký và ghi rõ họ tên)</i></div>
      <div style="width: 300px;">
        THU NGÂN<br><i>(Ký tên)</i>
        <p style="margin-top: 100px;"><?php
          $sql_nhanvien = "SELECT * FROM phieukhambenh, nhanvien WHERE phieukhambenh.id_nv = nhanvien.id_nv AND phieukhambenh.maphieu = '$maphieu'";
          $query_nhanvien = mysqli_query($mysqli, $sql_nhanvien);
          $nhanvien = mysqli_fetch_array($query_nhanvien);
          echo $nhanvien['hoten_nv'];
        ?></p>
      </div>
      <div style="width: 300px;">
        BÁC SĨ<br><i>(Ký tên)</i>
        <p style="margin-top: 100px;"><?php
          $sql_bacsi = "SELECT * FROM phieukhambenh, bacsi WHERE phieukhambenh.id_bs = bacsi.id_bs AND phieukhambenh.maphieu = '$maphieu'";
          $query_bacsi = mysqli_query($mysqli, $sql_bacsi);
          $bacsi = mysqli_fetch_array($query_bacsi);
          echo $bacsi['hoten_bs'];
        ?></p>
      </div>
    </div>
</div>
<script>
    function printpage() {
        window.print();
        window.close();
    }
//    printpage();
</script></body>
</body>