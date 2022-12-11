<?php
include("../config.php");
include("../ham.php");
session_start();

if(!isset($_SESSION['admin'])) {
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
  
  $avatarbs = $_POST['avatarbs'];

  if($avatarbs != ""){

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = (string)time();
    
    if (!isset($_FILES["avatar"])) {
      echo NotificationAndGoback("Dữ liệu không đúng cấu trúc");
      die;
    }
    if ($_FILES["avatar"]['error'] != 0)
    {
      echo NotificationAndGoback("Dữ liệu upload bị lỗi");
      die;
    }

    $target_dir    = "../img/AnhDaiDien/";
    $fileName = $_FILES["avatar"]["name"];
    $target_file   = $target_dir.$date.$fileName;
    $nameImage = "img/AnhDaiDien/".$date.$fileName;
    $allowUpload   = true;

    //Lấy phần mở rộng của file (jpg, png, ...)
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Cỡ lớn nhất được upload (bytes)
    $maxfilesize   = 10 * 1024 * 1024;

    // Những loại file được phép upload
    $allowtypes    = array('jpg', 'png');

    //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false)
    {
        // echo NotificationAndGoback("Đây là file ảnh - " . $check["mime"] . ".");
        $allowUpload = true;
    }
    else
    {
        echo NotificationAndGoback("Không phải file ảnh.");
        $allowUpload = false;
    }

    $fileTemp = $_FILES["avatar"]["tmp_name"];
    // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
    if (file_exists($target_file))
    {
        // echo NotificationAndGoback("Tên file đã tồn tại trên server, không được ghi đè");
        // $allowUpload = false;
    }
    // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
    if ($_FILES["avatar"]["size"] > $maxfilesize)
    {
        echo NotificationAndGoback("Không được upload ảnh lớn hơn 10Mb.");
        $allowUpload = false;
    }

    // Kiểm tra kiểu file
    if (!in_array($imageFileType,$allowtypes ))
    {
        echo NotificationAndGoback("Chỉ được upload các định dạng JPG, PNG");
        $allowUpload = false;
    }
  }
  else {
    $avatarbs = null;
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



    $checkEmail = $mysqli->query("SELECT * from bacsi where email_bs='$emailbs'");
    if (mysqli_num_rows($checkEmail) == 0 ) {
        $checkPhone = $mysqli->query("SELECT * from bacsi where sdt_bs='$sdtbs'");
        if (mysqli_num_rows($checkPhone) == 0) {
          if($gioitinhbs != null) {

              //Table khachhang: maKH,tenKH,hotenKH,sodienthoai,email,AnhDaiDien,username,password
              // $sqlAddUser = "INSERT into bacsi value(null,'$uname','$passwd','$hotenbs','$sdtbs','$emailbs','$gioitinhbs','$namsinhbs','$diachibs','$chuyenmon','$kinhnghiem','$gioithieu','pngtree-flat-default-avatar-png-image_2848906.jpg')";
              // $mysqli->query($sqlAddUser);

              // NotificationAndGoto("Đăng ký tài khoản thành công","./index-admin.php?route-admin=thongtinbacsi");

              if ($allowUpload)
              {
                  // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                  move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

                  //Table khachhang: maKH,tenKH,hotenKH,sodienthoai,email,AnhDaiDien,username,password
                  $sqlAddUser = "INSERT into bacsi value(null,'$uname','$passwd','$hotenbs','$sdtbs','$emailbs','$gioitinhbs','$namsinhbs','$diachibs','$chuyenmon','$kinhnghiem','$gioithieu','$nameImage')";
                  $mysqli->query($sqlAddUser);

                  NotificationAndGoto("Thêm bác sĩ thành công!","index-admin.php?route-admin=thongtinbacsi");

              }
              else
              {
                  echo NotificationAndGoback("Không upload được file ảnh");
              }

          }else NotificationAndGoback("Giới tính không được để trống");

        } else NotificationAndGoback("Số điện thoại đã tồn tại!");
    } else NotificationAndGoback("Email đã tồn tại!");
}

if (isset($_POST['updatebs'])) {

  $hotenbs = $_POST['hotenbs'];

  $emailbs = $_POST['emailbs'];
  $sdtbs = $_POST['sdtbs'];
  $namsinhbs = $_POST['tuoibs'];
  $diachibs = $_POST['diachibs'];
  $chuyenmon = $_POST['chuyenmon'];
  $kinhnghiem = $_POST['kinhnghiem'];
  $gioithieu = $_POST['gioithieu'];
  $mabs = $_POST['mabs'];
  
  if(isset($_POST['gioitinhbs'])){
    $gioitinhbs = $_POST['gioitinhbs'];;
  }
  else {
    $gioitinhbs = null;
  }
  
  $avatarbs = $_POST['avatarbs'];

  if($avatarbs != ""){

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = (string)time();
    
    if (!isset($_FILES["avatar"])) {
      echo NotificationAndGoback("Dữ liệu không đúng cấu trúc");
      die;
    }
    if ($_FILES["avatar"]['error'] != 0)
    {
      echo NotificationAndGoback("Dữ liệu upload bị lỗi");
      die;
    }

    $target_dir    = "../img/AnhDaiDien/";
    $fileName = $_FILES["avatar"]["name"];
    $target_file   = $target_dir.$date.$fileName;
    $nameImage = "img/AnhDaiDien/".$date.$fileName;
    $allowUpload   = true;

    //Lấy phần mở rộng của file (jpg, png, ...)
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Cỡ lớn nhất được upload (bytes)
    $maxfilesize   = 10 * 1024 * 1024;

    // Những loại file được phép upload
    $allowtypes    = array('jpg', 'png');

    //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false)
    {
        // echo NotificationAndGoback("Đây là file ảnh - " . $check["mime"] . ".");
        $allowUpload = true;
    }
    else
    {
        echo NotificationAndGoback("Không phải file ảnh.");
        $allowUpload = false;
    }

    $fileTemp = $_FILES["avatar"]["tmp_name"];
    // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
    if (file_exists($target_file))
    {
        // echo NotificationAndGoback("Tên file đã tồn tại trên server, không được ghi đè");
        // $allowUpload = false;
    }
    // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
    if ($_FILES["avatar"]["size"] > $maxfilesize)
    {
        echo NotificationAndGoback("Không được upload ảnh lớn hơn 10Mb.");
        $allowUpload = false;
    }

    // Kiểm tra kiểu file
    if (!in_array($imageFileType,$allowtypes ))
    {
        echo NotificationAndGoback("Chỉ được upload các định dạng JPG, PNG");
        $allowUpload = false;
    }
  }
  else {
    $avatarbs = null;
  }

  if($gioitinhbs != null) {

    if ($avatarbs != null) {
      if ($allowUpload) {
          // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
          move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
            $sqlAddUser = "UPDATE bacsi SET hoten_bs = '$hotenbs',
                                          sdt_bs = '$sdtbs',
                                          email_bs = '$emailbs',
                                          gioitinh_bs = '$gioitinhbs',
                                          namsinh_bs = '$namsinhbs',
                                          diachi_bs = '$diachibs',
                                          chuyenmon = '$chuyenmon',
                                          kinhnghiem = '$kinhnghiem',
                                          gioithieu = '$gioithieu',
                                          anhdaidien_bs = '$nameImage'
                                        WHERE id_bs = $mabs";
          }
      }
      else {
        $sqlAddUser = "UPDATE bacsi SET hoten_bs = '$hotenbs',
                                      sdt_bs = '$sdtbs',
                                      email_bs = '$emailbs',
                                      gioitinh_bs = '$gioitinhbs',
                                      namsinh_bs = '$namsinhbs',
                                      diachi_bs = '$diachibs',
                                      chuyenmon = '$chuyenmon',
                                      kinhnghiem = '$kinhnghiem',
                                      gioithieu = '$gioithieu'
                                    WHERE id_bs = $mabs";
      }
      
      $mysqli->query($sqlAddUser);

      // echo $sqlAddUser;

      NotificationAndGoto("Cập nhật thành công!","index-admin.php?route-admin=thongtinbacsi");

  }else NotificationAndGoback("Giới tính không được để trống");

}

else NotificationAndGoback("Không thành công!");