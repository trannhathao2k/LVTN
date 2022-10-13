<?php
include("./config.php");
include("./ham.php");
session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');

if (isset($_GET['mabs']) && isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year']) ) {
    $mabs = $_GET['mabs'];
    $day = $_GET['day'];
    $month = $_GET['month'];
    $year = $_GET['year'];
}
else {
    $mabs = 0;
    $day = $_GET['d'];
    $month = date("m");
    $year = date("Y");
}

if ($day < 10) {
    $day = '0'.$day;
}

echo '<div class="row p-5">';

$bacsi = "SELECT * FROM bacsi WHERE id_bs = $mabs";
$query_bacsi = mysqli_query($mysqli, $bacsi);
$row_bacsi = mysqli_fetch_array($query_bacsi);
echo
    '<div class="col-lg-4 col-md-6">
        <div class=" overlay z-depth-1 z-depth-2 canhgiua">
            <img src="./img/AnhDaiDien/'.$row_bacsi['anhdaidien_bs'].'" class="img-fluid">
        </div>
        <h6 class="mb-3 text-center mt-3 font-weight-bold text-uppercase">BS. '.$row_bacsi['hoten_bs'].'</h6>
    </div>';

$giokham = "SELECT * FROM lichhentruoc WHERE id_bs = $mabs AND ngaydangky = '$year-$month-$day'";
$query_giokham = mysqli_query($mysqli, $giokham);
$lich = array("F", "F", "F", "F", "F", "F");
while($row_giokham = mysqli_fetch_array($query_giokham)) {
    // echo '<div>'.$row_giokham['giodangky'].'</div>';
    switch($row_giokham['giodangky']) {
        case "07:00:00":
            $lich[0] = "T";
            break;
        case "08:30:00":
            $lich[1] = "T";
            break;
        case "10:00:00":
            $lich[2] = "T";
            break;
        case "13:00:00":
            $lich[3] = "T";
            break;
        case "14:30:00":
            $lich[4] = "T";
            break;
        case "16:00:00":
            $lich[5] = "T";
            break;
    }
}

// foreach ($lich as $value) {
//     echo '<p>'.$value.'</p>';
// }

echo '<div class="col-lg-8 col-md-12 text-left">
        <div>
            ';

$ca_lv = "SELECT * FROM calamviecbs WHERE id_bs = $mabs AND ngaylamviec = '$year-$month-$day'";
$query_calv = mysqli_query($mysqli, $ca_lv);
$row_calv = mysqli_fetch_array($query_calv);

// if($row_calv['calamviec'] === "A") {
//     $casang = true;
//     $cachieu = true;
// }
// else if ($row_calv['calamviec'] === "S") {
//     $casang = true;
//     $cachieu = false;
// }
// else {
//     $casang = false;
//     $cachieu = true;
// }

if ($row_calv['calamviec'] != "C") {
    echo '<div class="div canhgiua" style="width: 100%;">
        <h6 class="font-weight-bold text-center">CA SÁNG</h6>
    </div>

    <div style="display: flex; justify-content: space-between;">';
    //Ô chọn giờ 1
    if ($lich[0] == "T") {
        echo
            '<a class="btn btn-sm btn-outline-success" style="min-width: 130px;">
                7h00 - 8h30<br/>
                ĐÃ ĐƯỢC CHỌN
            </a>';
    }
    else {
        echo '
            <a class="btn btn-sm btn-outline-warning" onclick="chongio(1)" data-dismiss="modal" style="min-width: 130px;">
                7h00 - 8h30<br/>
                CÒN TRỐNG
            </a>
        ';
    }

    //Ô chọn giờ 2
    if($lich[1] == "T") {
        echo
            '<a class="btn btn-sm btn-outline-success" style="min-width: 130px;">
                8h30 - 10h00<br/>
                ĐÃ ĐƯỢC CHỌN
            </a>';
    }
    else {
        echo '
            <a class="btn btn-sm btn-outline-warning" onclick="chongio(2)" data-dismiss="modal" style="min-width: 130px;">
                8h30 - 10h00<br/>
                CÒN TRỐNG
            </a>
        ';
    }

    //Ô chọn giờ 3
    if($lich[2] == "T") {
        echo
            '<a class="btn btn-sm btn-outline-success" style="min-width: 130px;">
                10h00 - 11h30<br/>
                ĐÃ ĐƯỢC CHỌN
            </a>';
    }
    else {
        echo '
            <a class="btn btn-sm btn-outline-warning" onclick="chongio(3)" data-dismiss="modal" style="min-width: 130px;">
                10h00 - 11h30<br/>
                CÒN TRỐNG
            </a>
        ';
    }
    echo '
        </div>
    </div>';
}

if ($row_calv['calamviec'] !== "S") {
    echo '
    <hr>
    <div>
    <div class="div canhgiua" style="width: 100%;">
        <h6 class="font-weight-bold text-center">CA CHIỀU</h6>
    </div>
    
    <div style="display: flex; justify-content: space-between;">
';

//Ô chọn giờ 4
if($lich[3] == "T") {
    echo
        '<a class="btn btn-sm btn-outline-success" style="min-width: 130px;">
           13h00 - 14h30<br/>
            ĐÃ ĐƯỢC CHỌN
        </a>';
}
else {
    echo '
        <a class="btn btn-sm btn-outline-warning" onclick="chongio(4)" data-dismiss="modal" style="min-width: 130px;">
           13h00 - 14h30<br/>
            CÒN TRỐNG
        </a>
    ';
}

//Ô chọn giờ 5
if($lich[4] == "T") {
    echo
        '<a class="btn btn-sm btn-outline-success" style="min-width: 130px;">
            14h30 - 16h00<br/>
            ĐÃ ĐƯỢC CHỌN
        </a>';
}
else {
    echo '
        <a class="btn btn-sm btn-outline-warning" onclick="chongio(5)" data-dismiss="modal" style="min-width: 130px;">
            14h30 - 16h00<br/>
            CÒN TRỐNG
        </a>
    ';
}

//Ô chọn giờ 6
if($lich[5] == "T") {
    echo
        '<a class="btn btn-sm btn-outline-success" style="min-width: 130px;">
            16h00 - 17h30<br/>
            ĐÃ ĐƯỢC CHỌN
        </a>';
}
else {
    echo '
        <a class="btn btn-sm btn-outline-warning" onclick="chongio(6)" data-dismiss="modal" style="min-width: 130px;">
            16h00 - 17h30<br/>
            CÒN TRỐNG
        </a>
    ';
}

// echo $year.'-'.$month.'-'.$day;

echo '</div>
</div>';

}

echo '</div>
</div>';



?>