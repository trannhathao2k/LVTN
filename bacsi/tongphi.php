<?php
include("../config.php");
include("../autoload.php");
session_start();

if(!$_SESSION['bacsi']) {
    header("location:./index.php");
}

$tongphi = "SELECT * FROM temp, dichvu WHERE temp.id_dv = dichvu.id_dichvu";
$query_tongphi = mysqli_query($mysqli, $tongphi);
$tong = 0;

while($row_tongphi = mysqli_fetch_array($query_tongphi)) {
    $tong += $row_tongphi['phi_dichvu'] * $row_tongphi['soluong_dv'];
}

echo '<h5 class="font-weight-bold text-danger">'.number_format($tong, 0, '', '.') .' VNĐ</h5>';

?>