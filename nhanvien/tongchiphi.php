<?php
include("../config.php");
include("../autoload.php");

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'khuyenmai') {
        if (isset($_GET['idkh']) && isset($_GET['maphieu'])) {
            $maphieu = $_GET['maphieu'];
            $idkh = $_GET['idkh'];
        }
        else {
            $maphieu = 0;
            $idkh = null;
        }

        if($idkh == "NULL") {
            $sql_tamtinh = "SELECT * FROM thanhtoan WHERE maphieu = '$maphieu'";
            $query_tamtinh = mysqli_query($mysqli, $sql_tamtinh);
            $row_tamtinh = mysqli_fetch_assoc($query_tamtinh);
            $tamtinh = $row_tamtinh['tamtinh'];
            echo '0 VNĐ';
        }
        else {
            $sql_diem = "SELECT * FROM khachhang WHERE id_kh = $idkh";
            $query_diem = mysqli_query($mysqli, $sql_diem);
            $row_diem = mysqli_fetch_assoc($query_diem);
            $diem = $row_diem['diemtichluy'];

            $sql_tamtinh = "SELECT * FROM thanhtoan WHERE maphieu = '$maphieu'";
            $query_tamtinh = mysqli_query($mysqli, $sql_tamtinh);
            $row_tamtinh = mysqli_fetch_assoc($query_tamtinh);
            $tamtinh = $row_tamtinh['tamtinh'];

            if ($diem < 1000) {
                echo "0 VNĐ";
                setcookie('khuyenmai', 0, time() + 3600);
            }
            else if ($diem >= 1000 && $diem < 3000) {
                $giamgia = $tamtinh * 0.05;
                echo number_format($giamgia, 0, '', '.')." VNĐ";
                // $mysqli->query("UPDATE thanhtoan SET khuyenmai = $giamgia WHERE maphieu = '$maphieu'");
                if(isset($_COOKIE['khuyenmai'])) {
                    setcookie('khuyenmai', $giamgia, time() - 60);
                    setcookie('khuyenmai', $giamgia, time() + 3600);
                }
                else {
                    setcookie('khuyenmai', $giamgia, time() + 3600);
                }
                
            }
            else {
                $giamgia = $tamtinh * 0.1;
                echo number_format($giamgia, 0, '', '.')." VNĐ";
                // $mysqli->query("UPDATE thanhtoan SET khuyenmai = $giamgia WHERE maphieu = '$maphieu'");
                setcookie('khuyenmai', $giamgia, time() + 3600);
            }
        }
    }
    else if ($action == 'thanhtien') {
        if (isset($_GET['idkh']) && isset($_GET['maphieu'])) {
            $maphieu = $_GET['maphieu'];
            $idkh = $_GET['idkh'];
        }
        else {
            $maphieu = 0;
            $idkh = null;
        }

        if($idkh == "NULL") {
            $sql_tamtinh = "SELECT * FROM thanhtoan WHERE maphieu = '$maphieu'";
            $query_tamtinh = mysqli_query($mysqli, $sql_tamtinh);
            $row_tamtinh = mysqli_fetch_assoc($query_tamtinh);
            $tamtinh = $row_tamtinh['tamtinh'];
            echo number_format($tamtinh, 0, '', '.').' VNĐ';
        }
        else {
            $sql_diem = "SELECT * FROM khachhang WHERE id_kh = $idkh";
            $query_diem = mysqli_query($mysqli, $sql_diem);
            $row_diem = mysqli_fetch_assoc($query_diem);
            $diem = $row_diem['diemtichluy'];

            $sql_tamtinh = "SELECT * FROM thanhtoan WHERE maphieu = '$maphieu'";
            $query_tamtinh = mysqli_query($mysqli, $sql_tamtinh);
            $row_tamtinh = mysqli_fetch_assoc($query_tamtinh);
            $tamtinh = $row_tamtinh['tamtinh'];

            if ($diem < 1000) {
                echo number_format($tamtinh, 0, '', '.').' VNĐ';
            }
            else if ($diem >= 1000 && $diem < 3000) {
                $thanhtien = $tamtinh * 0.95;
                echo number_format($thanhtien, 0, '', '.')." VNĐ";
            }
            else {
                $thanhtien = $tamtinh * 0.9;
                echo number_format($thanhtien, 0, '', '.')." VNĐ";
            }
        }
    }
}


?>