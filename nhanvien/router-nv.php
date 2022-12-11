<?php
    if(isset($_GET['route'])) {
        $route = $_GET['route'];
    }
    else {
        $route = "trangchu";
    }

    switch($route) {
        case "trangchu":
            include("trangchu-nv.php");            
            break;
        case "trangthai":
            include("trangthaibacsi.php");
            break;
        default:
            include("trangchu-nv.php");            
    }
?>