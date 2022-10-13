<?php
include("../config.php");
include("../autoload.php");
session_start();

if(!$_SESSION['bacsi']) {
    header("location:./index.php");
}

if (isset($_GET['madv']) && isset($_GET['thaotac'])) {
    $madv = $_GET['madv'];
    $thaotac = $_GET['thaotac'];
}
else {
    $madv = 0;
    $thaotac = "";
}

$soluong = "SELECT * FROM temp WHERE id_dv = $madv";
$query_sl = mysqli_query($mysqli, $soluong);
$row_sl = mysqli_fetch_array($query_sl);

if ($thaotac == 0) {
    if($row_sl['soluong_dv'] > 1) {
        $sl_giam = $row_sl['soluong_dv'] - 1;
        $giam = "UPDATE temp SET soluong_dv = $sl_giam WHERE id_dv = $madv";
        $mysqli->query($giam);
    }
}

else if ($thaotac == 1) {
    $sl_tang = $row_sl['soluong_dv'] + 1;
    $tang = "UPDATE temp SET soluong_dv = $sl_tang WHERE id_dv = $madv";
    $mysqli->query($tang);
}

$temp = "SELECT * FROM temp, dichvu WHERE temp.id_dv = dichvu.id_dichvu";
$query_temp = mysqli_query($mysqli, $temp);
while ($row_temp = mysqli_fetch_array($query_temp)) {
    if($row_temp['soluong_dv'] == 1) {
        echo 
        '<tr>
            <td>'.$row_temp['ten_dichvu'].'</td>
            <td class="text-danger" style="font-weight: bold">'.number_format($row_temp['phi_dichvu'], 0, '', '.') ?> VNĐ / <?php echo $row_temp['donvitinh'].'</td>
            <td class="text-center mt-0" onclick="tongphi();reset()">
                <input type="button" class="btn blue accent-1 white-text btn-sm" onclick="changeSL('.$row_temp['id_dichvu'].',0);tongphi()" value="-">
                <span class="qty">'.$row_temp['soluong_dv'].'</span>
                <input type="button" class="btn btn-primary btn-sm" onclick="changeSL('.$row_temp['id_dichvu'].',1);tongphi()" value="+">
            </td>
        </tr>';
    }
    else {
        echo 
        '<tr>
            <td>'.$row_temp['ten_dichvu'].'</td>
            <td class="text-danger" style="font-weight: bold">'.number_format($row_temp['phi_dichvu'], 0, '', '.') ?> VNĐ / <?php echo $row_temp['donvitinh'].'</td>
            <td class="text-center mt-0" onclick="tongphi();reset()">
                <input type="button" class="btn bg-blue btn-primary btn-sm" onclick="changeSL('.$row_temp['id_dichvu'].',0);tongphi()" value="-">
                <span class="qty">'.$row_temp['soluong_dv'].'</span>
                <input type="button" class="btn btn-primary btn-sm" onclick="changeSL('.$row_temp['id_dichvu'].',1);tongphi()" value="+">
            </td>
        </tr>';
    }
    
}


?>