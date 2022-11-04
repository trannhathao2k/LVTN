<?php
include("../../config.php");
include("../../autoload.php");

if (isset($_GET['maphieu'])) {
    $maphieu = $_GET['maphieu'];
}
else {
    $maphieu = 0;
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("Y-m-d");
$time = date("H:i:s");

//Khám và chỉ định dịch vụ niềng răng
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Khám, tư vấn và thiết kế mắc cài','Khám, tư vấn và chụp X quang răng</br>Lên phác đồ điều trị và lấy dấu răng</br>Thiết kế mắc cài','$date',null,0)");

//Nhận mắc cài và tiến hành gắn mắc cài
$date_7_day = date("Y-m-d", strtotime(' + 7 day', strtotime($date)));
$khamlan2 = "INSERT INTO lichtaikham VALUES (null,'$maphieu','Tiến hành gắn mắc cài','Lấy dấu hàm xong, bác sĩ sẽ hẹn lịch gắn mắc cài với bệnh nhân. Lúc này, các bạn sẽ quay lại và tiến hành gắn mắc cài lên răng.','$date_7_day',null,0)";
$mysqli->query($khamlan2);
// echo $khamlan2;

//Tái khám định kỳ

//Lần 1
$date_add_1_month_lan_1 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_7_day)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 1',null,'$date_add_1_month_lan_1',null,0)");

//Lần 2
$date_add_1_month_lan_2 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_1)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 2',null,'$date_add_1_month_lan_2',null,0)");

//Lần 3
$date_add_1_month_lan_3 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_2)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 3',null,'$date_add_1_month_lan_2',null,0)");

//Lần 4
$date_add_1_month_lan_4 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_3)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 4',null,'$date_add_1_month_lan_4',null,0)");

//Lần 5
$date_add_1_month_lan_5 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_4)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 5',null,'$date_add_1_month_lan_5',null,0)");

//Lần 6
$date_add_1_month_lan_6 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_5)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 6',null,'$date_add_1_month_lan_6',null,0)");

//Lần 7
$date_add_1_month_lan_7 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_6)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 7',null,'$date_add_1_month_lan_7',null,0)");

//Lần 8
$date_add_1_month_lan_8 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_7)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 8',null,'$date_add_1_month_lan_8',null,0)");

//Lần 9
$date_add_1_month_lan_9 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_8)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 9',null,'$date_add_1_month_lan_9',null,0)");

//Lần 10
$date_add_1_month_lan_10 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_9)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 10',null,'$date_add_1_month_lan_10',null,0)");

//Lần 11
$date_add_1_month_lan_11 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_10)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 11',null,'$date_add_1_month_lan_11',null,0)");

//Lần 12
$date_add_1_month_lan_12 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_11)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 12',null,'$date_add_1_month_lan_12',null,0)");

//Lần 13
$date_add_1_month_lan_13 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_12)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 13',null,'$date_add_1_month_lan_13',null,0)");

//Lần 14
$date_add_1_month_lan_14 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_13)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 14',null,'$date_add_1_month_lan_14',null,0)");

//Lần 15
$date_add_1_month_lan_15 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_14)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 15',null,'$date_add_1_month_lan_15',null,0)");

//Lần 16
$date_add_1_month_lan_16 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_15)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 16',null,'$date_add_1_month_lan_16',null,0)");

//Lần 17
$date_add_1_month_lan_17 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_16)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 17',null,'$date_add_1_month_lan_17',null,0)");

//Lần 18
$date_add_1_month_lan_18 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_17)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 18',null,'$date_add_1_month_lan_18',null,0)");

//Lần 19
$date_add_1_month_lan_19 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_18)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 19',null,'$date_add_1_month_lan_19',null,0)");

//Lần 20
$date_add_1_month_lan_20 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_19)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 20',null,'$date_add_1_month_lan_20',null,0)");

//Lần 21
$date_add_1_month_lan_21 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_20)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 21',null,'$date_add_1_month_lan_21',null,0)");

//Lần 22
$date_add_1_month_lan_22 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_21)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 22',null,'$date_add_1_month_lan_22',null,0)");

//Lần 23
$date_add_1_month_lan_23 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_22)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 23',null,'$date_add_1_month_lan_23',null,0)");

//Lần 24
$date_add_1_month_lan_24 = date("Y-m-d", strtotime(' + 1 month', strtotime($date_add_1_month_lan_23)));
$mysqli->query("INSERT INTO lichtaikham VALUES (null,'$maphieu','Tái khám định kỳ lần 24',null,'$date_add_1_month_lan_24',null,0)");

echo '<meta http-equiv="refresh" content="0;url=./index-bs.php?route=lichhenkham&maphieu='.$maphieu.'">';

?>