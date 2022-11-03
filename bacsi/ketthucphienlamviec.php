<?php
include("../config.php");
include("../autoload.php");
session_start();

if (isset($_GET['maphieu'])) {
    $maphieu = $_GET['maphieu'];
}
else {
    $maphieu = 0;
}

$ketthuc = "UPDATE phieukhambenh SET trangthaikhambenh = 'Đã kết thúc' WHERE maphieu = '$maphieu'";
$mysqli->query($ketthuc);

echo '<meta http-equiv="refresh" content="0;url=index-bs.php?route=trangcanhan">';