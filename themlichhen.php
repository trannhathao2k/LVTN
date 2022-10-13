<?php
include("./config.php");
include("./ham.php");
session_start();

// if($_SESSION['admin'] || $_SESSION['khachhang'] || $_SESSION['bacsi'] || $_SESSION['nhanvien']) {
//     header("location:./trangcanhan-kh.php");
// }

if (isset($_POST['themlichhen'])) {

    $bacsi = $_POST['bacsi'];
    $ngaykham = $_POST['ngaykham'];

    if(isset($_POST['loinhan'])){
        $loinhan = $_POST['loinhan'];
    }
    else {
        $loinhan = null;
    }

    if(isset($_POST['ngaykham'])){
        $ngaykham = $_POST['ngaykham'];
    }
    else {
        $ngaykham = date("Y-m-d");
    }

    if(isset($_POST['giokham'])){
        $giokham = $_POST['giokham'];
    }
    else {
        $giokham = date("H:i:s");
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date("Y-m-d H:i:s");

    if (isset($_SESSION['khachhang'])) {
        $MaKH = $_SESSION['khachhang']['id_kh'];
    }

    // echo $date;

    $check = "SELECT * FROM lichhentruoc WHERE id_kh = $MaKH";
    $query_check = mysqli_query($mysqli, $check);
    if(mysqli_num_rows($query_check) == 0) {
        $sql_themlichhen = "INSERT INTO lichhentruoc VALUES (null,$MaKH,'$date', $bacsi,'$ngaykham','$giokham','$loinhan')";
        $mysqli->query($sql_themlichhen);

        NotificationAndGoto("Dat lich hen thanh cong!","./trangcanhan-kh.php");
    }
    else {
        NotificationAndGoto("Ban da dat lich hen, vui long vao trang ca nhan de cap nhat!","./trangcanhan-kh.php");
    }

    

}
// else NotificationAndGoback("Không thể đặt lịch hẹn khám!");

    // NotificationAndGoback("$date");
    // echo $bacsi;
    
    // if (isset($_POST['themlichhen'])) {

    //     $bacsi = $_POST['bacsi'];
    //     $ngaykham = $_POST['ngaykham'];
    //     $giokham = $_POST['giokham'];
    //     $loinhan = $_POST['loinhan'];
    
    //     if(isset($_POST['loinhan'])){
    //         $loinhan = $_POST['loinhan'];
    //     }
    //     else {
    //         $loinhan = null;
    //     }
    
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');
    //     $date = date("y-m-d H:i:s");
    
    //     if (isset($_SESSION['khachhang'])) {
    //         $MaKH = $_SESSION['khachhang']['id_kh'];
    //     }
    
    //     // echo "INSERT INTO lichhentruoc VALUES (null,$MaKH,'$date', $bacsi,'$ngaykham','$giokham','$loinhan')";
    
    //     $sql_themlichhen = "INSERT INTO lichhentruoc VALUES (null,$MaKH,'$date', $bacsi,'$ngaykham','$giokham','$loinhan')";
    //     $mysqli->query($sql_themlichhen);
    
    //     // NotificationAndGoto("Đặt lịch hẹn khám thành công!","./trangcanhan-kh.php");
        
    
    // } else NotificationAndGoback("Không thể đặt lịch hẹn khám!");
