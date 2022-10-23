<?php
include("./config.php");
include("./ham.php");
session_start();

if (isset($_POST['register'])) {

  if(!isset($_SESSION['khachhang'])) {
    $uname = $_POST['uname'];
    $passwd = $_POST['passwd'];
    $cfmPassword = $_POST['confirmPass'];
  }
  
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
  
  $avatarkh = $_POST['avatarkh'];

  if($avatarkh != ""){

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

    $target_dir    = "img/AnhDaiDien/";
    $fileName = $_FILES["avatar"]["name"];
    $target_file   = $target_dir.$date.$fileName;
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
    $avatarkh = null;
  }

  

  if (!isset($_SESSION['khachhang'])) {
    $checkUsername = $mysqli->query("SELECT * from khachhang where username_kh='$uname'");
    if (mysqli_num_rows($checkUsername) == 0) {
        if ($passwd == $cfmPassword) {
            $checkEmail = $mysqli->query("SELECT * from khachhang where email_kh='$emailkh'");
            if (mysqli_num_rows($checkEmail) == 0 ) {
                $checkPhone = $mysqli->query("SELECT * from khachhang where sdt_kh='$sdtkh'");
                if (mysqli_num_rows($checkPhone) == 0) {
                  if($gioitinhkh != null) {
                      $passwd_md5 = md5($passwd);
                      $ngaytao_tk = date("y-m-d H:i:s");

                      if ($allowUpload)
                      {
                          // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                          move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

                          //Table khachhang: maKH,tenKH,hotenKH,sodienthoai,email,AnhDaiDien,username,password
                          $sqlAddUser = "INSERT into khachhang value(null,'$uname','$passwd_md5','$hotenkh','$sdtkh','$emailkh','$gioitinhkh',$tuoikh,0,'$diachikh','$target_file','$ngaytao_tk')";
                          $mysqli->query($sqlAddUser);

                          NotificationAndGoto("Đăng ký thành công, mời đăng nhập!","dangnhap.php");

                      }
                      else
                      {
                          echo NotificationAndGoback("Không upload được file ảnh");
                      }
                      
                      

                  }else NotificationAndGoback("Giới tính không được để trống");

                } else NotificationAndGoback("Số điện thoại đã tồn tại!");
            } else NotificationAndGoback("Email đã tồn tại!");
        } else NotificationAndGoback("Mật khẩu không trùng khớp!");      
    } else NotificationAndGoback("Tên đăng nhập đã tồn tại!");
  }
  else {
    $MaKH = $_SESSION['khachhang']['id_kh'];
        
    if ($avatarkh != null) {
      
      if ($allowUpload){
          // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
          move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

          $sqlAddUser = "UPDATE khachhang
                      SET hoten_kh = '$hotenkh',
                          sdt_kh = '$sdtkh',
                          tuoi_kh = $tuoikh,
                          diachi_kh = '$diachikh',
                          gioitinh_kh = '$gioitinhkh',
                          email_kh = '$emailkh',
                          anhdaidien_kh = '$target_file'
                      WHERE id_kh = $MaKH";
        }
    }
    else {
      $sqlAddUser = "UPDATE khachhang
                  SET hoten_kh = '$hotenkh',
                      sdt_kh = '$sdtkh',
                      tuoi_kh = $tuoikh,
                      diachi_kh = '$diachikh',
                      gioitinh_kh = '$gioitinhkh',
                      email_kh = '$emailkh'
                  WHERE id_kh = $MaKH";
    }
    
    $mysqli->query($sqlAddUser);
    echo $sqlAddUser;

    NotificationAndGoto("Cập nhật thành công!","trangcanhan-kh.php");
  }
} else NotificationAndGoback("Không thể đăng ký!");