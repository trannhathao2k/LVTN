<?php
include("../config.php");
include("../autoload.php");

if (isset($_GET['maphieu']) && isset($_GET['manv']) && isset($_GET['taikhoan'])) {
    $maphieu = $_GET['maphieu'];
    $manv = $_GET['manv'];
    $taikhoan = $_GET['taikhoan'];
}
else {
    $maphieu = 0;
    $manv = null;
    $taikhoan = null;
}

$xacnhan = "UPDATE phieukhambenh SET trangthaithuphi = 1, id_nv = $manv, id_kh = $taikhoan WHERE id_phieu = $maphieu";
$mysqli->query($xacnhan);
// echo '<meta http-equiv="refresh" content="0;url=index-nv.php">';
// echo $xacnhan;

if(isset($_COOKIE['khuyenmai'])) {
    $khuyenmai = $_COOKIE['khuyenmai'];
}
else {
    $khuyenmai = 0;
}

$sql_maphieu = "SELECT * FROM phieukhambenh WHERE id_phieu = $maphieu";
$query_maphieu = mysqli_query($mysqli, $sql_maphieu);
$row_maphieu = mysqli_fetch_assoc($query_maphieu);
$maphieu_new = $row_maphieu['maphieu'];

$mysqli->query("UPDATE thanhtoan SET khuyenmai = $khuyenmai WHERE maphieu = '$maphieu_new'");

$sql_chiphi = "SELECT * FROM thanhtoan WHERE maphieu = '$maphieu_new'";
$query_chiphi = mysqli_query($mysqli, $sql_chiphi);
$row_chiphi = mysqli_fetch_assoc($query_chiphi);
$tongchiphi = $row_chiphi['tamtinh'] - $row_chiphi['khuyenmai'];

$mysqli->query("UPDATE phieukhambenh SET tongchiphi = $tongchiphi WHERE maphieu = '$maphieu_new'");

$diem = round($row_chiphi['tamtinh'] / 100000, 0);

$sql_khachhang = "SELECT * FROM khachhang WHERE id_kh = $taikhoan";
$query_khachhang = mysqli_query($mysqli, $sql_khachhang);
$row_khachhang = mysqli_fetch_assoc($query_khachhang);
$diemtichluy = $row_khachhang['diemtichluy'] + $diem;

$mysqli->query("UPDATE khachhang SET diemtichluy = $diemtichluy WHERE id_kh = $taikhoan");

?>