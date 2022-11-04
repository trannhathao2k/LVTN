<?php
include("../../config.php");

if (isset($_GET['idbs'])) {
    $idbs = $_GET['idbs'];
}
else {
    $idbs = date("m");
}

$sql_check = "SELECT * FROM temp_dsbacsi";
$query_check = mysqli_query($mysqli, $sql_check);

if (mysqli_num_rows($query_check) == 0) {
    $them = "INSERT INTO temp_thoigian VALUES (null, $chonThang)";
    $mysqli->query($them);
    echo $them;
}
else {
    $them = "UPDATE temp_thoigian SET thoigian = $chonThang";
    $mysqli->query($them);
    echo $them;
}

?>