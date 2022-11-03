<?php
include("../config.php");
include("../autoload.php");
session_start();


if(!$_SESSION['nhanvien']) {
    header("location:./index.php");
}


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

$xacnhan = "UPDATE phieukhambenh SET trangthaithuphi = 1, id_nv = $manv, id_kh = $taikhoan WHERE id_phieu = '$maphieu'";
$mysqli->query($xacnhan);
// echo '<meta http-equiv="refresh" content="0;url=index-nv.php">';
// echo $xacnhan;

?>