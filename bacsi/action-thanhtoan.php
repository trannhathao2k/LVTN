<?php
include("../config.php");
include("../autoload.php");
session_start();

if (isset($_GET['madv'])) {
    $madv = $_GET['madv'];
}
else {
    $madv = 0;
}

$MaBS = $_SESSION['bacsi']['id_bs'];

if($madv != 0) {
    $event = "SELECT * FROM temp";
    $query_event = mysqli_query($mysqli, $event);
    $i = 0;
    if(mysqli_num_rows($query_event) != 0) {
        while($row_event = mysqli_fetch_array($query_event)) {
            if ($row_event['id_dv'] == $madv) {
                $xoa = "DELETE FROM temp WHERE id_dv = $madv AND id_bs = $MaBS";
                $mysqli->query($xoa);
                $i++;
            }
        }
        if($i == 0) {
            $them = "INSERT INTO temp VALUES (null,$madv,1,$MaBS)";
            $mysqli->query($them);
        }
    }
    
    else {
        $them = "INSERT INTO temp VALUES (null,$madv,1,$MaBS)";
        $mysqli->query($them);
    }

    $temp = "SELECT * FROM temp, dichvu WHERE temp.id_dv = dichvu.id_dichvu AND temp.id_bs = $MaBS";
    $query_temp = mysqli_query($mysqli, $temp);
    while ($row_temp = mysqli_fetch_array($query_temp)) {
        echo
        '<tr>
            <td>'.$row_temp['ten_dichvu'].'</td>
            <td class="text-danger" style="font-weight: bold">'.number_format($row_temp['phi_dichvu'], 0, '', '.') ?> VNĐ / <?php echo $row_temp['donvitinh'].'</td>
            <td class="text-center mt-0" onclick="tongphi();reset()">
                <input type="button" class="btn btn-primary btn-sm" onclick="changeSL('.$row_temp['id_dichvu'].',0);tongphi();alert("Không thể giảm")" value="-">
                <span class="qty">'.$row_temp['soluong_dv'].'</span>
                <input type="button" class="btn btn-primary btn-sm" onclick="changeSL('.$row_temp['id_dichvu'].',1);tongphi()" value="+">
            </td>
        </tr>';
    }
}
else {
    echo 'Chưa thêm dịch vụ';
}

?>

<!-- <div class="btn-group radio-group ml-2" data-toggle="buttons">
    <label class="btn btn-sm btn-primary btn-rounded" onclick="changesl('.$row_temp['id_dichvu'].',0);tongphi()">
        <input type="radio" name="options">&mdash;
    </label>
    <label class="btn btn-sm btn-primary btn-rounded" onclick="changesl('.$row_temp['id_dichvu'].',1);tongphi()">
        <input type="radio" name="options">+
    </label>
</div> -->