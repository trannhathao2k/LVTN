<?php
include("../../config.php");

if (isset($_GET['soluong'])) {
    $soluong = $_GET['soluong'];
}
else {
    $soluong = 0;
}

for ($i = 1; $i <= $soluong; $i++) {
    ${'idbs'.$i} = $_GET['bacsi'.$i.''];
}

$mysqli->query("DELETE FROM temp_dsbacsi");

// if (mysqli_num_rows($query_check) == 0) {
//     $them = "INSERT INTO temp_dsbacsi VALUES (null, $idbs)";
//     $mysqli->query($them);
//     echo $them;
// }
// else {
//     $them = "UPDATE temp_dsbacsi SET id_bs = $idbs";
//     $mysqli->query($them);
//     echo $them;
// }
for($j = 1;$j <= $soluong;$j++) {
    // echo ${'idbs'.$j}.'<br/>';
    $them = "INSERT INTO temp_dsbacsi VALUES (null, ${'idbs'.$j})";
    $mysqli->query($them);
}


?>