<?php


    if(!$_SESSION['bacsi']) {
        header("location:../index.php");
    }

    if(isset($_GET['route'])) {
        $route = $_GET['route'];
    }
    else {
        $route = "trangcanhan";
    }

    //Cần refresh lại trang để title hiển thị đúng

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
        default:
            include("trangcanhan-bs.php");            
    }
?>