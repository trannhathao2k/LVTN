<?php
include("./config.php");
include("./ham.php");
session_start();


if(!$_SESSION['khachhang']) {
    header("location:./index.php");
}


if (isset($_POST['register'])) {
  $uname = $_POST['uname'];
  $passwd = $_POST['passwd'];
  $cfmPassword = $_POST['confirmPass'];

  $hotenkh = $_POST['hotenkh'];

  $emailkh = $_POST['emailkh'];
  $sdtkh = $_POST['sdtkh'];
  $tuoikh = $_POST['tuoikh'];
  $diachikh = $_POST['diachikh'];
  
  if(isset($_POST['gioitinh'])){
    $gioitinhkh = $_POST['gioitinh'];;
  }
  else {
    $gioitinhkh = null;
  }

//   echo "username = " . $username . "<br>";
//   echo "password = " . $password . "<br>";
//   echo "cfmPass = " . $cfmPassword . "<br>";
//   echo "fullname = " . $fullname . "<br>";
//   echo "email = " . $email . "<br>";
//   echo "phone = " . $phone . "<br>";
//   echo "address = " . $address . "<br>";

  $checkUsername = $mysqli->query("SELECT * from khachhang where username_kh='$uname'");
  if (mysqli_num_rows($checkUsername) == 0) {
      if ($passwd == $cfmPassword) {
          $checkEmail = $mysqli->query("SELECT * from khachhang where email_kh='$emailkh'");
          if (mysqli_num_rows($checkEmail) == 0 ) {
              $checkPhone = $mysqli->query("SELECT * from khachhang where sdt_kh='$sdtkh'");
              if (mysqli_num_rows($checkPhone) == 0) {
                if($gioitinhkh != null) {
                    $passwd_md5 = md5($passwd);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngaytao_tk = date("y-m-d H:i:s");
                    echo ''.$char.''.$row_bs['id_bs'].'';

                    //Table khachhang: maKH,tenKH,hotenKH,sodienthoai,email,AnhDaiDien,username,password
                    $sqlAddUser = "INSERT into khachhang value(null,'$uname','$passwd_md5','$hotenkh','$sdtkh','$emailkh','$gioitinhkh',$tuoikh,0,'$diachikh','pngtree-flat-default-avatar-png-image_2848906.jpg','$ngaytao_tk')";
                    $mysqli->query($sqlAddUser);

                    NotificationAndGoto("Đăng ký thành công, mời đăng nhập!","dangnhap.php");

                }else NotificationAndGoback("Giới tính không được để trống");

              } else NotificationAndGoback("Số điện thoại đã tồn tại!");
          } else NotificationAndGoback("Email đã tồn tại!");
      } else NotificationAndGoback("Mật khẩu không trùng khớp!");      
  } else NotificationAndGoback("Tên đăng nhập đã tồn tại!");
} else NotificationAndGoback("Không thể đăng ký!");