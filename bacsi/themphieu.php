<?php
include("../config.php");
include("../autoload.php");

if (isset($_GET['mabs']) && isset($_GET['ngaylap']) && isset($_GET['maphieu']) && isset($_GET['tenkh'])) {
    $mabs = $_GET['mabs'];
    $ngaylap = $_GET['ngaylap'];
    $maphieu = $_GET['maphieu'];
    $tenkh = $_GET['tenkh'];
}
else {
    $mabs = 0;
    $ngaylap = 0;
    $maphieu = 0;
    $tenkh = 0;
}

$taophieu = "INSERT INTO phieukhambenh VALUES (null, '$maphieu', null, '$tenkh' ,$mabs, null, '$ngaylap', 0, 0)";
$mysqli->query($taophieu);

// echo $taophieu;

$dichvu = "SELECT * FROM temp, dichvu WHERE temp.id_dv = dichvu.id_dichvu AND temp.id_bs = $mabs";
$query_dichvu = mysqli_query($mysqli, $dichvu);
$tongphi = 0;

while($row_dichvu = mysqli_fetch_array($query_dichvu)) {
    $madv = $row_dichvu['id_dv'];
    $phidv = $row_dichvu['phi_dichvu'];
    $soluong = $row_dichvu['soluong_dv'];

    $themdichvu = "INSERT INTO dichvuduocchidinh VALUES (null, '$maphieu', $madv, $phidv, $soluong)";
    $mysqli->query($themdichvu);
    $tongphi += $phidv * $soluong;
}



$capnhat = "UPDATE phieukhambenh SET tongchiphi = $tongphi WHERE maphieu = '$maphieu'";
$mysqli->query($capnhat);
echo '<meta http-equiv="refresh" content="0;url=index-bs.php?route=trangcanhan">';

?>