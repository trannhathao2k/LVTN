<?php


    if(isset($_GET['route-admin'])) {
        $route = $_GET['route-admin'];
    }
    else {
        $route = "trangchu";
    }

    //Cần refresh lại trang để title hiển thị đúng

    switch($route) {
        case "trangchu":
            include("trangchu-admin.php");            
            break;
        case "thongtinbacsi":
            include("thongtinbacsi.php");            
            break;
        case "thembacsi":
            include("thembacsi.php");            
            break;
        default:
            include("trangchu-admin.php");            
    }
?>