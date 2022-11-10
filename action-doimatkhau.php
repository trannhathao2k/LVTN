<?php
include("./config.php");
include("./ham.php");
session_start();

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'kiemtra') {
        if (isset($_GET['maNhap'])) {
            $maNhap = $_GET['maNhap'];
        }
        else {
            $maNhap = 0;
        }

        $maXN = $_SESSION['maxacnhan'];
        // echo $maNhap;
        if ($maNhap == $maXN) {
            echo '<div class="form-header info-color-dark">
                <h3>NHẬP MẬT KHẨU MỚI</h3>
            </div>
            <div class="md-form mb-0">
                <i class="fas fa-user prefix white-text"></i>
                <input type="password" id="matKhauMoi" name="matKhauMoi" class="form-control" required>
                <label for="matKhauMoi">Mật khẩu mới</label>
            </div>

            <div class="md-form mb-0">
                <i class="fas fa-lock prefix white-text"></i>
                <input type="password" id="xacNhanMatKhau" name="xacNhanMatKhau" class="form-control" required>
                <label for="xacNhanMatKhau">Xác nhận mật khẩu</label>
            </div>
            
            <div class="text-center">
                <a class="btn info-color-dark btn-lg white-text" onclick="luumatkhau()">LƯU</a>
            </div>
            
            <div id="kiemtramatkhau"></div>
            <div id="check"></div>';
        }
        else {
            echo '<div class="form-header info-color-dark">
                <h3>ĐẶT LẠI MẬT KHẨU</h3>
            </div>

            <div class="md-form mb-0">
                <i class="fas fa-user prefix white-text"></i>
                <input type="text" id="maXacNhan" name="maXacNhan" class="form-control" required>
                <label for="maXacNhan">Mã xác nhận</label>
                </div>

                <div class="text-center">
                    <a class="btn info-color-dark btn-lg white-text" onclick="kiemtra()">Tiếp theo</a>
                </div>

                <div class="text-center">

                    <div class="mb-1 wow fadeIn mt-3" >
                        <b class="text-danger" style="font-size: 13px;">Mã xác nhận sai. Vui lòng thử lại</b>
                    </div>

                </div>
            </div>';
        }
    }
    else if ($action == 'luumatkhau') {
        if (isset($_GET['matkhau']) && isset($_GET['email'])) {
            $matkhau = $_GET['matkhau'];
            $email = $_GET['email'];
        }
        else {
            $matkhau = 0;
            $email = 0;
        }

        // echo $matkhau;
        $passwd = md5($matkhau);
        $mysqli->query("UPDATE khachhang SET password_kh = '$passwd' WHERE email_kh = '$email'");
        echo '<meta http-equiv="refresh" content="0;url=dangnhap.php">';
    }
}


?>