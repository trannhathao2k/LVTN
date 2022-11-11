<?php
include("./config.php");
include("./ham.php");
session_start();

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'checkEmail') {
        if (isset($_GET['email'])) {
            $email = $_GET['email'];
        }
        else {
            $email = 'none';
        }

        $sql_email = "SELECT * FROM khachhang WHERE email_kh = '$email'";
        $query_email = mysqli_query($mysqli, $sql_email);
        if(mysqli_num_rows($query_email) != 0) {
            echo '<p style="color: red; font-size: 12px;">Email đã tồn tại trong hệ thống</p>';
        }
        else {
            echo '<p style="color: green; font-size: 12px;">Email hợp lệ</p>';
        }
        // echo $email;
    }
    else if ($action == 'checkNumberPhone') {
        if (isset($_GET['numberPhone'])) {
            $numberPhone = $_GET['numberPhone'];
        }
        else {
            $numberPhone = 0;
        }

        $sql_numberPhone = "SELECT * FROM khachhang WHERE sdt_kh = '$numberPhone'";
        $query_numberPhone = mysqli_query($mysqli, $sql_numberPhone);
        if(mysqli_num_rows($query_numberPhone) != 0) {
            echo '<p style="color: red; font-size: 12px;">Số điện thoại đã tồn tại trong hệ thống</p>';
        }
        else {
            echo '<p style="color: green; font-size: 12px;">Số điện thoại hợp lệ</p>';
        }
    }
}

?>