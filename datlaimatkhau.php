<?php
include("./config.php");
include("./ham.php");
require('./mail/sendmail.php');

session_start();

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'kiemtra'){
        if (isset($_GET['email'])) {
            $email = $_GET['email'];
        }
        else {
            $email = 'tnhmailtest03@gmail.com';
        }

        $sql_ktra = "SELECT * FROM khachhang WHERE email_kh = '$email'";
        $query_ktra = mysqli_query($mysqli, $sql_ktra);

        if(mysqli_num_rows($query_ktra) == 0) {
            echo '<b id="check" class="text-danger" style="font-size: 12px">Email không tồn tại</b>';
        }
        else {
            echo '<b id="check" class="text-success" style="font-size: 12px">Email hợp lệ</b>';
        }
    }
    else if ($action == 'guima') {
        if (isset($_GET['email'])) {
            $email = $_GET['email'];
        }
        else {
            $email = 'tnhmailtest03@gmail.com';
        }

        function generatePassword($length = 6) {
            $chars = '0123456789';
            $count = mb_strlen($chars);
        
            for ($i = 0, $result = ''; $i < $length; $i++) {
                $index = rand(0, $count - 1);
                $result .= mb_substr($chars, $index, 1);
            }
        
            return $result;
        }

        $sql_tenkh = "SELECT * FROM khachhang WHERE email_kh = '$email'";
        $query_tenkh = mysqli_query($mysqli, $sql_tenkh);
        $row_tenkh = mysqli_fetch_array($query_tenkh);
        $tenkh = $row_tenkh['hoten_kh'];
        $tendangnhap = $row_tenkh['username_kh'];

        $maxacnhan = generatePassword();

        $_SESSION['maxacnhan'] = $maxacnhan;

        echo '<meta http-equiv="refresh" content="0;url=matkhaumoi.php?email='.$email.'">';

        $mail = new Mailer();
        $mail->mailxacnhan($email, $tenkh, $maxacnhan, $tendangnhap);
    }
}




?>