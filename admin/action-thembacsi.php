<?php
include("../config.php");
include("../ham.php");
session_start();

if(!$_SESSION['admin']) {
  header("location:../index.php");
}

if (isset($_POST['registerbs'])) {

  $hotenbs = $_POST['hotenbs'];

  $emailbs = $_POST['emailbs'];
  $sdtbs = $_POST['sdtbs'];
  $namsinhbs = $_POST['tuoibs'];
  $diachibs = $_POST['diachibs'];
  $chuyenmon = $_POST['chuyenmon'];
  $kinhnghiem = $_POST['kinhnghiem'];
  $gioithieu = $_POST['gioithieu'];
  
  if(isset($_POST['gioitinhbs'])){
    $gioitinhbs = $_POST['gioitinhbs'];;
  }
  else {
    $gioitinhbs = null;
  }

  $id_bs = "SELECT MAX(id_bs) id_max FROM bacsi";
  $query_id_bs = mysqli_query($mysqli, $id_bs);
  $row_id_bs = mysqli_fetch_array($query_id_bs);
  $id_bs_new = $row_id_bs['id_max'] + 1;
  if($row_id_bs['id_max'] < 10) {
      $uname =  "bacsi0$id_bs_new";
  }
  else {
      $uname = "bacsi$id_bs_new";
  }

  $passwd = md5($uname);

  // NotificationAndGoback("$gioitinhbs");
  // NotificationAndGoback("INSERT into bacsi value(null,'$uname','$uname','$hotenbs','$sdtbs','$emailbs','$gioitinhbs',$tuoibs,'$diachibs','$chuyenmon','$kinhnghiem','$gioithieu','pngtree-flat-default-avatar-png-image_2848906.jpg')");

//   echo "username = " . $username . "<br>";
//   echo "password = " . $password . "<br>";
//   echo "cfmPass = " . $cfmPassword . "<br>";
//   echo "fullname = " . $fullname . "<br>";
//   echo "email = " . $email . "<br>";
//   echo "phone = " . $phone . "<br>";
//   echo "address = " . $address . "<br>";

    $checkEmail = $mysqli->query("SELECT * from bacsi where email_bs='$emailbs'");
    if (mysqli_num_rows($checkEmail) == 0 ) {
        $checkPhone = $mysqli->query("SELECT * from bacsi where sdt_bs='$sdtbs'");
        if (mysqli_num_rows($checkPhone) == 0) {
          if($gioitinhbs != null) {

              //Table khachhang: maKH,tenKH,hotenKH,sodienthoai,email,AnhDaiDien,username,password
              $sqlAddUser = "INSERT into bacsi value(null,'$uname','$passwd','$hotenbs','$sdtbs','$emailbs','$gioitinhbs','$namsinhbs','$diachibs','$chuyenmon','$kinhnghiem','$gioithieu','pngtree-flat-default-avatar-png-image_2848906.jpg')";
              $mysqli->query($sqlAddUser);

              NotificationAndGoto("Đăng ký tài khoản thành công","./index-admin.php?route-admin=thongtinbacsi");

          }else NotificationAndGoback("Giới tính không được để trống");

        } else NotificationAndGoback("Số điện thoại đã tồn tại!");
    } else NotificationAndGoback("Email đã tồn tại!");
} else NotificationAndGoback("Không thể đăng ký!");