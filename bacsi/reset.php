<?php
include("../config.php");
include("../autoload.php");

if(!$_SESSION['bacsi']) {
    header("location:./index.php");
}

$delete = "DELETE FROM temp";
$mysqli->query($delete);

?>