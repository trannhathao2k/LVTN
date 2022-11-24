<?php

    if(isset($_GET['route'])) {
        $route = $_GET['route'];
    }
    else {
        $route = "trangcanhan";
    }

    switch($route) {
        case "trangcanhan":
            include("trangcanhan-bs.php");            
            break;
        case "phieukhambenh":
            include("phieukhambenh.php");
            break;
        case "khachhang":
            include("thongtinkhachhang.php");
            break;
        case "lichhenkham":
            include("lichhenkham.php");
            break;
        default:
            include("trangcanhan-bs.php");            
    }
?>