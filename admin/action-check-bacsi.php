<?php
include("../config.php");
include("../ham.php");
session_start();

if(isset($_GET['action-bs'])) {
    $action = $_GET['action-bs'];
    if ($action == 'checkEmail') {
        if (isset($_GET['email']) && isset($_GET['mabs'])) {
            $email = $_GET['email'];
            $mabs = $_GET['mabs'];
        }
        else {
            $email = 'none';
            $mabs = 'none';
        }

        if ($mabs == "ADD") {
            $sql_email = "SELECT * FROM bacsi WHERE email_bs = '$email'";
            $query_email = mysqli_query($mysqli, $sql_email);
            if((mysqli_num_rows($query_email) != 0)) {
                echo '<p style="color: red; font-size: 12px;">Email đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Email hợp lệ</p>';
            }
        }
        else {
            $sql_bs = "SELECT * FROM bacsi WHERE id_bs = $mabs AND email_bs = '$email'";
            $email_bs = $mysqli->query($sql_bs);

            $sql_email = "SELECT * FROM bacsi WHERE email_bs = '$email'";
            $query_email = mysqli_query($mysqli, $sql_email);
            if((mysqli_num_rows($query_email) != 0) && mysqli_num_rows($email_bs) == 0) {
                echo '<p style="color: red; font-size: 12px;">Email đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Email hợp lệ</p>';
            }
        }
        
    }
    else if ($action == 'checkNumberPhone') {
        if (isset($_GET['numberPhone']) && isset($_GET['mabs'])) {
            $numberPhone = $_GET['numberPhone'];
            $mabs = $_GET['mabs'];
        }
        else {
            $numberPhone = 0;
            $mabs = 0;
        }

        if ($mabs == "ADD") {
            $sql_numberPhone = "SELECT * FROM bacsi WHERE sdt_bs = '$numberPhone'";
            $query_numberPhone = mysqli_query($mysqli, $sql_numberPhone);
            if((mysqli_num_rows($query_numberPhone)) != 0) {
                echo '<p style="color: red; font-size: 12px;">Số điện thoại đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Số điện thoại hợp lệ</p>';
            }
        }
        else {
            $sql_sdt_bs = "SELECT * FROM bacsi WHERE id_bs = $mabs AND sdt_bs = '$numberPhone'";
            $sdt_bs = $mysqli->query($sql_sdt_bs);

            $sql_numberPhone = "SELECT * FROM bacsi WHERE sdt_bs = '$numberPhone'";
            $query_numberPhone = mysqli_query($mysqli, $sql_numberPhone);
            if((mysqli_num_rows($query_numberPhone)) != 0 && (mysqli_num_rows($sdt_bs) == 0)) {
                echo '<p style="color: red; font-size: 12px;">Số điện thoại đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Số điện thoại hợp lệ</p>';
            }
        }
    
    }
}

if(isset($_GET['action-nv'])) {
    $action = $_GET['action-nv'];
    if ($action == 'checkEmail') {
        if (isset($_GET['email']) && isset($_GET['manv'])) {
            $email = $_GET['email'];
            $manv = $_GET['manv'];
        }
        else {
            $email = 'none';
            $manv = 'none';
        }

        if ($manv == "ADD") {
            $sql_nv = "SELECT * FROM nhanvien WHERE email_nv = '$email'";
            $email_nv = $mysqli->query($sql_nv);

            if((mysqli_num_rows($email_nv) != 0)) {
                echo '<p style="color: red; font-size: 12px;">Email đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Email hợp lệ</p>';
            }
        }
        else {
            $sql_nv = "SELECT * FROM nhanvien WHERE id_nv = $manv AND email_nv = '$email'";
            $email_nv = $mysqli->query($sql_nv);

            $sql_email = "SELECT * FROM nhanvien WHERE email_nv = '$email'";
            $query_email = mysqli_query($mysqli, $sql_email);
            if((mysqli_num_rows($query_email) != 0) && mysqli_num_rows($email_nv) == 0) {
                echo '<p style="color: red; font-size: 12px;">Email đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Email hợp lệ</p>';
            }
        }
    }
    else if ($action == 'checkNumberPhone') {
        if (isset($_GET['numberPhone']) && isset($_GET['manv'])) {
            $numberPhone = $_GET['numberPhone'];
            $manv = $_GET['manv'];
        }
        else {
            $numberPhone = 0;
            $manv = 0;
        }

        if ($manv == "ADD") {
            $sql_numberPhone = "SELECT * FROM nhanvien WHERE sdt_nv = '$numberPhone'";
            $query_numberPhone = mysqli_query($mysqli, $sql_numberPhone);
            if((mysqli_num_rows($query_numberPhone)) != 0) {
                echo '<p style="color: red; font-size: 12px;">Số điện thoại đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Số điện thoại hợp lệ</p>';
            }
        }
        else {
            $sql_sdt_nv = "SELECT * FROM nhanvien WHERE id_nv = $manv AND sdt_nv = '$numberPhone'";
            $sdt_nv = $mysqli->query($sql_sdt_nv);

            $sql_numberPhone = "SELECT * FROM nhanvien WHERE sdt_nv = '$numberPhone'";
            $query_numberPhone = mysqli_query($mysqli, $sql_numberPhone);
            if((mysqli_num_rows($query_numberPhone)) != 0 && (mysqli_num_rows($sdt_nv) == 0)) {
                echo '<p style="color: red; font-size: 12px;">Số điện thoại đã tồn tại trong hệ thống</p>';
            }
            else {
                echo '<p style="color: green; font-size: 12px;">Số điện thoại hợp lệ</p>';
            }
        }
    }
}

?>