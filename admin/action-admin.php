<?php
include("../config.php");
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'them') {
        if (isset($_GET['idbacsi']) && isset($_GET['calamviec']) && isset($_GET['ngaylamviec'])) {
            $id_bacsi = $_GET['idbacsi'];
            $calamviec = $_GET['calamviec'];
            $ngaylamviec = $_GET['ngaylamviec'];
        }
        else {
            $id_bacsi = 0;
            $calamviec = 0;
            $ngaylamviec = 0;
        }

        $mysqli->query("INSERT INTO calamviecbs VALUES (null, $id_bacsi, '$ngaylamviec', '$calamviec')");

        $month = date("m", strtotime($ngaylamviec));
        $year = date("Y", strtotime($ngaylamviec));

        echo '<meta http-equiv="refresh" content="0;url=index-admin.php?route-admin=lichlamviecbacsi&date='.$year.'-'.$month.'-1">';
    }
    else if ($action == 'sua') {
        if (isset($_GET['idca']) && isset($_GET['calamviec'])) {
            $id_ca = $_GET['idca'];
            $calamviec = $_GET['calamviec'];
        }
        else {
            $id_ca = 0;
            $calamviec = 0;
        }

        // echo "UPDATE calamviecbs SET calamviec = '$calamviec' WHERE id_calv = $id_ca";
        $mysqli->query("UPDATE calamviecbs SET calamviec = '$calamviec' WHERE id_calv = $id_ca");

        $sql_ngaylamviec = "SELECT * FROM calamviecbs WHERE id_calv = $id_ca";
        $query_ngaylamviec = mysqli_query($mysqli, $sql_ngaylamviec);
        $ngaylamviec = mysqli_fetch_array($query_ngaylamviec);
        $month = date("m", strtotime($ngaylamviec['ngaylamviec']));
        $year = date("Y", strtotime($ngaylamviec['ngaylamviec']));

        echo '<meta http-equiv="refresh" content="0;url=index-admin.php?route-admin=lichlamviecbacsi&date='.$year.'-'.$month.'-1">';
    }
    else if ($action == 'xoa') {
        if (isset($_GET['idca'])) {
            $id_ca = $_GET['idca'];
        }
        else {
            $id_ca = 0;
        }
        
        $sql_ngaylamviec = "SELECT * FROM calamviecbs WHERE id_calv = $id_ca";
        $query_ngaylamviec = mysqli_query($mysqli, $sql_ngaylamviec);
        $ngaylamviec = mysqli_fetch_array($query_ngaylamviec);
        $month = date("m", strtotime($ngaylamviec['ngaylamviec']));
        $year = date("Y", strtotime($ngaylamviec['ngaylamviec']));

        // echo "UPDATE calamviecbs SET calamviec = '$calamviec' WHERE id_calv = $id_ca";
        $mysqli->query("DELETE FROM calamviecbs WHERE id_calv = $id_ca");
        
        echo '<meta http-equiv="refresh" content="0;url=index-admin.php?route-admin=lichlamviecbacsi&date='.$year.'-'.$month.'-1">';
    }
}


?>