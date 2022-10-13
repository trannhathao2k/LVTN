<?php
include("../config.php");
include("../autoload.php");
session_start();


if(!$_SESSION['nhanvien']) {
    header("location:./index.php");
}


if (isset($_GET['maphieu']) && isset($_GET['manv'])) {
    $maphieu = $_GET['maphieu'];
    $manv = $_GET['manv'];
}
else {
    $maphieu = 0;
    $manv = null;
}

$xacnhan = "UPDATE phieukhambenh SET trangthaithuphi = 1, id_nv = $manv WHERE maphieu = '$maphieu'";
$mysqli->query($xacnhan);
echo '<meta http-equiv="refresh" content="0;url=index-nv.php">';
// echo $xacnhan;

?>