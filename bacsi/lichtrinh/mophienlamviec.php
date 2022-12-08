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

$mysqli->query("UPDATE phieukhambenh SET trangthaikhambenh = 'Đang khám' WHERE maphieu = '$maphieu'");

echo '<meta http-equiv="refresh" content="0;url=./index-bs.php?route=trangcanhan&idlich='.$id_lich.'">';

?>