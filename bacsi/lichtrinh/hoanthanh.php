<?php
include("../../config.php");
include("../../autoload.php");

if (isset($_GET['maphieu']) && isset($_GET['idlich'])) {
    $maphieu = $_GET['maphieu'];
    $id_lich = $_GET['idlich'];
}
else {
    $maphieu = 0;
    $id_lich = 0;
}

$mysqli->query("UPDATE phieukhambenh SET trangthaikhambenh = 'Đã kết thúc' WHERE maphieu = '$maphieu'");
$mysqli->query("UPDATE lichtaikham SET trangthai = 1 WHERE id_lichtaikham = $id_lich");

echo '<meta http-equiv="refresh" content="0;url=./index-bs.php?route=trangcanhan">';

?>