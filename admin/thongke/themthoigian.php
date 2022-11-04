<?php
include("../../config.php");

if (isset($_GET['chonThang'])) {
    $chonThang = $_GET['chonThang'];
}
else {
    $chonThang = 0;
}
$sql_check = "SELECT * FROM temp_thoigian";
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