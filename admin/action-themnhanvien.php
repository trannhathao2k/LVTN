<?php
include("../config.php");
include("../ham.php");
session_start();

if(!isset($_SESSION['admin'])) {
  header("location:../index.php");
}

if (isset($_POST['registernv'])) {

  $hotennv = $_POST['hotennv'];

  $emailnv = $_POST['emailnv'];
  $sdtnv = $_POST['sdtnv'];
  $namsinhnv = $_POST['namsinhnv'];
  $diachinv = $_POST['diachinv'];
  
  if(isset($_POST['gioitinhnv'])){
    $gioitinhnv = $_POST['gioitinhnv'];;
  }
  else {
    $gioitinhnv = null;
  }
  
  $avatarnv = $_POST['avatarnv'];

  if($avatarnv != ""){

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
    $avatarnv = null;
  }

  $id_nv = "SELECT MAX(id_nv) id_max FROM nhanvien";
  $query_id_nv = mysqli_query($mysqli, $id_nv);
  $row_id_nv = mysqli_fetch_array($query_id_nv);
  $id_nv_new = $row_id_nv['id_max'] + 1;
  if($row_id_nv['id_max'] < 10) {
      $uname =  "nhanvien0$id_nv_new";
  }
  else {
      $uname = "nhanvien$id_nv_new";
  }

  $passwd = md5($uname);

    $checkEmail = $mysqli->query("SELECT * from nhanvien where email_nv='$emailnv'");
    if (mysqli_num_rows($checkEmail) == 0 ) {
        $checkPhone = $mysqli->query("SELECT * from nhanvien where sdt_nv='$sdtnv'");
        if (mysqli_num_rows($checkPhone) == 0) {
          if($gioitinhnv != null) {

              //Table khachhang: maKH,tenKH,hotenKH,sodienthoai,email,AnhDaiDien,username,password
              // $sqlAddUser = "INSERT into bacsi value(null,'$uname','$passwd','$hotenbs','$sdtbs','$emailbs','$gioitinhbs','$namsinhbs','$diachibs','$chuyenmon','$kinhnghiem','$gioithieu','pngtree-flat-default-avatar-png-image_2848906.jpg')";
              // $mysqli->query($sqlAddUser);

              // NotificationAndGoto("Đăng ký tài khoản thành công","./index-admin.php?route-admin=thongtinbacsi");

              if ($allowUpload)
              {
                //   Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                  move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

                  $sqlAddUser = "INSERT INTO nhanvien value(null,'$uname','$passwd','$hotennv','$sdtnv','$emailnv','$gioitinhnv','$namsinhnv','$diachinv','$nameImage')";
                  $mysqli->query($sqlAddUser);

                  NotificationAndGoto("Thêm nhân viên thành công!","index-admin.php?route-admin=thongtinnhanvien");
                // NotificationAndGoback("INSERT INTO nhanvien value(null,'$uname','$passwd','$hotennv','$sdtnv','$emailnv','$gioitinhnv','$namsinhnv','$diachinv','$target_file')");
              }
              else
              {
                  echo NotificationAndGoback("Không upload được file ảnh");
              }

          }else NotificationAndGoback("Giới tính không được để trống");

        } else NotificationAndGoback("Số điện thoại đã tồn tại!");
    } else NotificationAndGoback("Email đã tồn tại!");
}

if (isset($_POST['updatenv'])) {

  $hotennv = $_POST['hotennv'];

  $emailnv = $_POST['emailnv'];
  $sdtnv = $_POST['sdtnv'];
  $namsinhnv = $_POST['namsinhnv'];
  $diachinv = $_POST['diachinv'];
  $manv = $_POST['manv'];
  
  if(isset($_POST['gioitinhnv'])){
    $gioitinhnv = $_POST['gioitinhnv'];;
  }
  else {
    $gioitinhnv = null;
  }
  
  $avatarnv = $_POST['avatarnv'];

  if($avatarnv != ""){

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
    $avatarnv = null;
  }

  if($gioitinhnv != null) {

    if ($avatarnv != null) {
      if ($allowUpload)
      {
        //   Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
          move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
          $sqlAddUser = "UPDATE nhanvien SET hoten_nv = '$hotennv',
                                          sdt_nv = '$sdtnv',
                                          email_nv = '$emailnv',
                                          gioitinh_nv = '$gioitinhnv',
                                          namsinh = '$namsinhnv',
                                          diachi_nv = '$diachinv',
                                          anhdaidien_nv = '$nameImage'
                                        WHERE id_nv = $manv";
      }
    }
    else {
      $sqlAddUser = "UPDATE nhanvien SET hoten_nv = '$hotennv',
                                  sdt_nv = '$sdtnv',
                                  email_nv = '$emailnv',
                                  gioitinh_nv = '$gioitinhnv',
                                  namsinh = '$namsinhnv',
                                  diachi_nv = '$diachinv',
                                WHERE id_nv = $manv";
    }
          $mysqli->query($sqlAddUser);

          // echo $sqlAddUser;

          NotificationAndGoto("Cập nhật nhân viên thành công!","index-admin.php?route-admin=thongtinnhanvien");

  }else NotificationAndGoback("Giới tính không được để trống");
} else NotificationAndGoback("Không thành công!");