<?php

include "PHPMailer/src/PHPMailer.php"; 
include "PHPMailer/src/SMTP.php"; 
include 'PHPMailer/src/Exception.php'; 
include 'PHPMailer/src/OAuth.php'; 
include 'PHPMailer/src/POP3.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public function mailxacnhan($mailkhachhang, $tenkhachhang, $maxacnhan, $tendangnhap) {
        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();
            $mail->CharSet  = "utf-8";                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'trannhathao2473@gmail.com';                 // SMTP username
            $mail->Password = 'mwlvekuwqfebfoph';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('trannhathao2473@gmail.com', 'Nha khoa TQueen');

            $mail->addAddress($mailkhachhang, $tenkhachhang);     // Add a recipient
            // $mail->addAddress('tnhmailtest03@gmail.com', 'Test Mail');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Đặt lại mật khẩu tài khoản '.$tenkhachhang.' tại Nha khoa TQueen';
            $mail->Body    = 'Xin chào '.$tenkhachhang.'!<br/>
                            Bạn đã quên mật khẩu cho tài khoản của mình ?<br/>
                            Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.<br/><br/>
                            Tên đăng nhập của tài khoản này là: '.$tendangnhap.'<br/><br/>
                            Vui lòng nhập mã xác nhận: '.$maxacnhan.'<br/>
                            Nhập tại trang chúng tôi hoặc theo link dưới đây:<br/>http://localhost/web-nha-khoa/matkhaumoi.php?email='.$mailkhachhang.'.<br/>
                            Cảm ơn quý khách đã sử dụng dịch vụ tại phòng khám chúng tôi.';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

?>