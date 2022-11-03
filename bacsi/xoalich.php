<?php
include("../config.php");
include("../ham.php");
include("../autoload.php");
session_start();

if (isset($_GET['idlich'])) {
    $idlich = $_GET['idlich'];
}
else {
    $idlich = 0;
}

// NotificationAndGoback("Xóa lịch thành công!");
$sql_maphieu = "SELECT * FROM lichtaikham WHERE id_lichtaikham = $idlich";
$query_maphieu = mysqli_query($mysqli, $sql_maphieu);
$row_maphieu = mysqli_fetch_array($query_maphieu);
$maphieu = $row_maphieu['maphieu'];

$xoalich = "DELETE FROM lichtaikham WHERE id_lichtaikham = $idlich";
$mysqli->query($xoalich);

// echo $maphieu;

echo '<meta http-equiv="refresh" content="0;url=./index-bs.php?route=lichhenkham&maphieu='.$maphieu.'">';

?>