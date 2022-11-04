<?php
include("../../config.php");
include("../../autoload.php");

if (isset($_GET['maphieu'])) {
    $maphieu = $_GET['maphieu'];
}
else {
    $maphieu = 0;
}

$mysqli->query("DELETE FROM lichtaikham WHERE maphieu = '$maphieu'");

echo '<meta http-equiv="refresh" content="0;url=./index-bs.php?route=lichhenkham&maphieu='.$maphieu.'">';

?>