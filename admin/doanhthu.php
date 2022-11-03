<?php
include("../config.php");

if (isset($_GET['thang'])) {
    $thang = $_GET['thang'];
}
else {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thang = date("m");
}

echo "<select>";
date_default_timezone_set('Asia/Ho_Chi_Minh');
function lastday04($month_ld = '', $year_ld = '') {
    if (empty($month_ld)) {
        $month_ld = date('m');
    }
    if (empty($year_ld)) {
        $year_ld = date('Y');
    }
    $result = strtotime("{$year_ld}-{$month_ld}-01");
    $result = strtotime('-1 second', strtotime('+1 month', $result));
    return date('d', $result);
}
$monthCurrent = date("m");
$yearCurrent = date("Y");
$lastday = lastday04($thang,$yearCurrent);
for($i = 0; $i < $lastday; $i++) {
    $day = $i + 1;
    $sql_luottruycap = "SELECT * FROM luottruycap WHERE ngay_truycap = '$yearCurrent-$thang-$day'";
    $query_luottruycap = mysqli_query($mysqli, $sql_luottruycap);
    if (mysqli_num_rows($query_luottruycap) == 0) {
    $soluottruycap = 0;
    }
    else {
    $luottruycap = mysqli_fetch_array($query_luottruycap);
    $soluottruycap = $luottruycap['soluot_truycap'];
    }
    // if($i != ($lastday - 1)) {
    //     echo $soluottruycap.', ';
    // }
    // else {
    //     echo $soluottruycap;
    // }
}

echo "]";

?>