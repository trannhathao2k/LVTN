<?php
include("../config.php");
include("../ham.php");
session_start();

// if($_SESSION['admin'] || $_SESSION['khachhang'] || $_SESSION['bacsi'] || $_SESSION['nhanvien']) {
//     header("location:./trangcanhan-kh.php");
// }

if (isset($_POST['themlich-bacsi'])) {

    $tieude = $_POST['tieude'];
    $ngaykham = $_POST['ngaykham'];
    $giokham = $_POST['giokham'];
    $maphieu = $_POST['maphieu'];

    if(isset($_POST['noidung'])){
        $noidung = $_POST['noidung'];
    }
    else {
        $noidung = null;
    }

    $sql_themlichhen = "INSERT INTO lichtaikham VALUES (null,'$maphieu','$tieude', '$noidung','$ngaykham','$giokham',0)";
    $mysqli->query($sql_themlichhen);
    // echo $sql_themlichhen;

    NotificationAndGoto("Thêm lịch khám thành công!","./index-bs.php?route=lichhenkham&maphieu=$maphieu");

}
if(isset($_POST['capnhatlich-bacsi'])) {
    $tieude = $_POST['tieude'];
    $ngaykham = $_POST['ngaykham'];
    $giokham = $_POST['giokham'];
    $id_lichtaikham = $_POST['id_lichtaikham'];

    if(isset($_POST['noidung'])){
        $noidung = $_POST['noidung'];
    }
    else {
        $noidung = null;
    }

    $sql_capnhatlichhen = "UPDATE lichtaikham
                SET tieude = '$tieude',
                    noidung = '$noidung',
                    ngaytaikham = '$ngaykham',
                    giohen = '$giokham'
                WHERE maphieu = '$id_lichtaikham'";

    $mysqli->query($sql_capnhatlichhen);
    // $sql_maphieu = "SELECT * FROM lichtaikham WHERE id_lichtaikham = $id_lichtaikham";
    // $query_maphieu = mysqli_query($mysqli, $sql_maphieu);
    // $row_maphieu = mysqli_fetch_array($query_maphieu);
    // $maphieu = $row_maphieu['maphieu'];

    // echo $sql_capnhatlichhen;

    NotificationAndGoto("Cập nhật lịch khám thành công!","./index-bs.php?route=lichhenkham&maphieu=$id_lichtaikham");

}