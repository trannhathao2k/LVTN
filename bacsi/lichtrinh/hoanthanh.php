<?php
include("../../config.php");
include("../../autoload.php");

if (isset($_GET['maphieu']) && isset($_GET['idphieu'])) {
    $maphieu = $_GET['maphieu'];
    $id_phieu = $_GET['idphieu'];
}
else {
    $maphieu = 0;
    $id_phieu = 0;
}

$mysqli->query("UPDATE lichtaikham SET trangthai = 1 WHERE id_lichtaikham = $id_phieu");

echo '<meta http-equiv="refresh" content="0;url=./index-bs.php?route=lichhenkham&maphieu='.$maphieu.'">';

?>