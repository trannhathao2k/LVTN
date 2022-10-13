<?php
include("../config.php");
include("../ham.php");
session_start();

if(!$_SESSION['admin']) {
    header("location:../index.php");
}

if (isset($_GET['mabs'])) {
    $mabs = $_GET['mabs'];
}
else {
    $mabs = 0;
}

$xoa = "DELETE FROM bacsi WHERE id_bs = $mabs";
$mysqli->query($xoa);

echo '<meta http-equiv="refresh" content="0;url=index-admin.php?route-admin=thongtinbacsi">';
?>