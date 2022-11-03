<?php
    $MaKH = $_SESSION['khachhang']['id_kh'];
    $thongtinkh = "SELECT * FROM khachhang WHERE id_kh = $MaKH";
    $query_thongtinkh = mysqli_query($mysqli, $thongtinkh);
    $row_thongtinkh = mysqli_fetch_array($query_thongtinkh);

    $sql_lichhen = "SELECT * FROM lichhentruoc WHERE id_kh = $MaKH";
    $query_lichhen = mysqli_query($mysqli, $sql_lichhen);
    if (mysqli_num_rows($query_lichhen) != 0) {
        $lichhen = mysqli_fetch_array($query_lichhen);
        $lich = 1;
    }
    else {
        $lich = 0;
    }
    

    if (isset($_SESSION['khachhang'])) {
        $ktra = true;
    }
    else {
        $ktra = false;
    }
    ?>

    <form action="./themlichhen.php" name="themlich" method="POST" onload="ktra()">
    <div class="row">

        <div class="col-md-6">
        <div class="md-form mb-0">
            <input type="text" id="hotenbs" name="hotenkh" class="form-control" value="<?php echo $row_thongtinkh['hoten_kh'] ?>" readonly>
            <label for="hotenbs" class="">Họ tên khách hàng</label>
        </div>
        </div>

        <div class="col-md-6">
        <div class="md-form mb-0">
            <input type="text" id="form-contact-email" name="emailkh" class="form-control" value="<?php echo $row_thongtinkh['email_kh'] ?>" readonly>
            <label for="form-contact-email" class="">Địa chỉ email</label>
        </div>
        </div>

    </div>

    <div class="row">

        <!-- Grid column -->
        <div class="col-md-6">
            <div class="md-form">
                <input type="text" id="form-contact-phone" name="sdtkh" class="form-control" value="<?php echo $row_thongtinkh['sdt_kh'] ?>" readonly>
                <label for="form-contact-phone" class="">Số điện thoại</label>
            </div>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4">
        <div class="md-form mb-0 mt-0">
            <p class="m-0 p-0" style="font-size: 12px;color: #757575;">Chọn bác sĩ</p>
            <select id="dsbacsi" name="bacsi" class="form-select-sm form-select form-control md-form" onchange="chonbacsi()">
            <option value="0">Bác sĩ bất kỳ</option>
                <?php
                $dsbacsi = "SELECT * FROM bacsi";
                $query_ds = mysqli_query($mysqli, $dsbacsi);
                
                while($row_ds = mysqli_fetch_array($query_ds)) {
                    if ($lichhen['id_bs'] == $row_ds['id_bs']) {
                       ?><option value="<?php echo $row_ds['id_bs'] ?>" selected><?php echo $row_ds['hoten_bs'] ?></option><?php    
                    }
                    else {
                    ?>
                        <option value="<?php echo $row_ds['id_bs'] ?>"><?php echo $row_ds['hoten_bs'] ?></option>
                    <?php
                    }
                    }                    
                ?>
            </select>
        </div>
        
        </div>
        <!-- Grid column -->
        <div class="col-md-2">
        <div class="md-form mt-3">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-info">Xem thông tin bác sĩ</button>
            <div class="modal fade modal-ext" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 py-3" id="myModalLabel">DANH SÁCH BÁC SĨ NHA KHOA TQUEEN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body text-center p-5" style="font-size: 14px;">
                    <?php
                    $bs = "SELECT * FROM bacsi";
                    $query_bs = mysqli_query($mysqli, $bs);
                    while($row_bs = mysqli_fetch_array($query_bs)) {
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                            <img src="<?php echo $row_bs['anhdaidien_bs'] ?>" width="100%">
                            </div>
                            <div class="col-md-8">
                            <ul style="text-align: left;">
                                <li><b>Họ tên:</b> <?php echo $row_bs['hoten_bs'] ?>.</li>
                                <li><b>Năm sinh:</b> <?php echo $row_bs['namsinh_bs'] ?>.</li>
                                <li><b>Chuyên môn:</b> <?php echo $row_bs['chuyenmon'] ?>.</li>
                                <li><b>Kinh nghiệm:</b> <?php echo $row_bs['kinhnghiem'] ?>.</li>
                                <li><b>Giới thiệu:</b> <?php echo $row_bs['gioithieu'] ?>.</li>
                            </ul>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                </div>
                <!--Footer-->
                <div class="modal-footer">                                                               
                    <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect" data-dismiss="modal">ĐÓNG</button>
                </div>
                </div>
                <!--/Content-->
            </div>
            </div>

            <!--Footer-->

        </div>
        </div>

    </div>

    <div>
        <div class="row">
        <div class="col-md-6">
            <div class="md-form">
            <input type="text" id="from" name="ngaykham" class="form-control" data-toggle="modal" data-target="#modal-info-new" <?php
                if($lich == 1) {
                    echo 'value="'.$lichhen['ngaydangky'].'"';
                }
            ?> required readonly>
            <label for="date-picker-example">Chọn ngày khám</label>
            </div>
            <div class="modal fade modal-ext" id="modal-info-new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <!--Content-->
                <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 py-3" id="myModalLabel">LỊCH LÀM VIỆC CỦA BÁC SĨ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div id="ngaygiokham">
                    <h6 class="mt-3 mb-3 red-text d-flex align-items-center justify-content-center">Vui lòng chọn bác sĩ khám để có thể chọn ngày theo lịch làm việc của bác sĩ</h6>
                </div>
                
                <div class="container-new ">
                    <a class="btn btn-floating aqua-gradient btn-prev-calender mr-3 ml-3">
                    <span><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                    </a>
                    <div class="calendar-new mt-3 mb-3">
                        <div class="row mb-3">
                        <div class="col-md-4" id="thang" style="display: flex;align-items: center;justify-content: left;">
                            <p class="month-calender info-calender" ><?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $month = date("m");
                            echo 'Tháng '.$month;
                            ?></p>
                        </div>
                        <div class="col-md-4" style="display: flex;align-items: center;justify-content: center;">
                            <a class="btn-today btn aqua-gradient m-auto" >HÔM NAY</a>
                        </div>
                        <div class="col-md-4" id="nam" style="display: flex;align-items: center;justify-content: right;">
                            <p class="year-calender info-calender"><?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $year = date("Y");
                            echo $year;
                            ?></p>
                        </div>                                            
                            
                        </div>
                        <div class="date-calender white-text font-weight-bold bg-primary">
                            <div class="day-name-calender">CN</div>
                            <div class="day-name-calender">T2</div>
                            <div class="day-name-calender">T3</div>
                            <div class="day-name-calender">T4</div>
                            <div class="day-name-calender">T5</div>
                            <div class="day-name-calender">T6</div>
                            <div class="day-name-calender">T7</div>
                        </div>
                        <div class="date-calender date-container" id="lich">
                            <?php
                                if($lich == 1) {
                                    $day = date("d");
                                    $str = "$year-$month-1";
                                    $date = new DateTime($str);
                                    $w = (int)$date->format('w');
                                    for($i = 0; $i < $w; $i++) {
                                        echo '<div class="day-calender"></div>';
                                    }
                            
                                    function lastday($month_ld = '', $year_ld = '') {
                                        if (empty($month_ld)) {
                                            $month_ld = date('m');
                                        }
                                        if (empty($year_ld)) {
                                            $year_ld = date('Y');
                                        }
                                        $result = strtotime("{$year_ld}-{$month_ld}-01");
                                        $result = strtotime('-1 second', strtotime('+1 month', $result));
                                        return date('d', $result);
                                    }
                                    $lastday = lastday(''.$month.'',''.$year.'');
                            
                                    $today = date("Y-m-d");
                                    for($i=1; $i <= $lastday; $i++) {
                                        $day_calender = new DateTime("$year-$month-$i");
                                        $w = $day_calender->format('Y-m-d'); //Ngày mà i đang chạy qua
                                        // echo $w;
                                        $idbs = $lichhen['id_bs'];
                                        $bacsi = "SELECT * FROM calamviecbs WHERE id_bs = $idbs";
                                        $query_calamviec = mysqli_query($mysqli, $bacsi);
                                        $check = 0;
                                        if (mysqli_num_rows($query_calamviec) != 0) {
                                            while($row_calamviec = mysqli_fetch_array($query_calamviec)) {
                                                if($row_calamviec['ngaylamviec'] == $w) {
                                                    if($row_calamviec['calamviec'] == "A") {
                                                        $check = 1;
                                                        echo '<a class="day-calender bg-info white-text" id="'.$i.'" onclick="chonngay('.$i.')" data-dismiss="modal"><p style="margin: 25px 0 0 0">'.$i.'</p><p class="margin-top: 0px" style="font-size: 13px;">Sáng - Chiều</p></a>';
                                                    }
                                                    else if($row_calamviec['calamviec'] == "S") {
                                                        $check = 1;
                                                        echo '<a class="day-calender bg-info white-text" id="'.$i.'" onclick="chonngay('.$i.')" data-dismiss="modal"><p style="margin: 25px 0 0 0">'.$i.'</p><p class="margin-top: 0px" style="font-size: 13px;">Sáng</p></a>';
                                                    }
                                                    else {
                                                        $check = 1;
                                                        echo '<a class="day-calender bg-info white-text" id="'.$i.'" onclick="chonngay('.$i.')" data-dismiss="modal"><p style="margin: 25px 0 0 0">'.$i.'</p><p class="margin-top: 0px" style="font-size: 13px;">Chiều</p></a>';
                                                    }
                                                }
                                                // else {
                                                //     echo '<a class="day-calender" id="'.$i.'-'.$month.'" onclick="chonngay('.$i.','.$month.')">'.$i.'</a>';
                                                // }                     
                                            }
                                            if ($check == 0) {
                                                if($today == $w) {
                                                    echo '<a class="day-calender red-text font-weight-bold" id="'.$i.'" >'.$i.'</a>';   
                                                }
                                                else {
                                                    echo '<a class="day-calender" id="'.$i.'">'.$i.'</a>';
                                                }
                                            }
                                        }
                                        else {
                                            echo '<a class="day-calender" id="'.$i.'-'.$month.'">'.$i.'</a>';
                                        }
                                        
                                        
                                        
                                    }
                                }
                                else {
                                    $day = date("d");
                                        $str = "$year-$month-1";
                                        $date = new DateTime($str);
                                        $w = (int)$date->format('w');
                                        for($i = 0; $i < $w; $i++) {
                                            echo '<div class="day-calender"></div>';
                                        }
                            
                                        function lastday($month_ld = '', $year_ld = '') {
                                            if (empty($month_ld)) {
                                                $month_ld = date('m');
                                            }
                                            if (empty($year_ld)) {
                                                $year_ld = date('Y');
                                            }
                                            $result = strtotime("{$year_ld}-{$month_ld}-01");
                                            $result = strtotime('-1 second', strtotime('+1 month', $result));
                                            return date('d', $result);
                                        }
                                        $lastday = lastday(''.$month.'',''.$year.'');
                            
                                        $today = date("Y-m-d");
                                        for($i=1; $i <= $lastday; $i++) {
                                            $day_calender = new DateTime("$year-$month-$i");
                                            $w = $day_calender->format('Y-m-d');
                                            // echo $w;
                                            if ($today == $w) {
                                                    echo '<a class="day-calender red-text font-weight-bold" id="'.$i.'-'.$month.'">'.$i.'</a>';                   
                                            }
                                            else {
                                                echo '<a class="day-calender" id="'.$i.'-'.$month.'" onclick="chonngay('.$i.','.$month.')">'.$i.'</a>';
                                            }
                                            
                                        }
                                }
                            ?>
                        </div>
                    </div>
                    <div id="right">
                    <a class="btn btn-floating aqua-gradient btn-next-calender">
                        <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                    </div>
                    
                </div>
                <!--Footer-->
                <div class="modal-footer">                                                               
                    <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect ml-3 mr-3" data-dismiss="modal">ĐÓNG</button>
                </div>
                </div>
                <!--/Content-->
            </div>
            </div>
        </div>
        <div class="col-md-6">

        <div class="md-form">  
            <input type="text" id="giokham" name="giokham" class="form-control" data-toggle="modal" data-target="#modal-info-giokham" value="<?php if($lich == 1 ) echo $lichhen['giodangky'] ?>" required readonly>
            <label for="giokham">Chọn giờ khám</label>
            <div class="modal fade modal-ext" id="modal-info-giokham" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--Content-->
                    <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 py-3" id="myModalLabel">CHỌN GIỜ KHÁM</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div id="gio">
                        
                    </div>

                    <div id="chongiokham">
                        <?php
                            $checkTime = 0;
                            if($lich == 1) {
                                if ($day < 10) {
                                    $day = '0'.$day;
                                }

                                $dateCreate = $lichhen['ngaydangky'];
                                $date = date_create("$dateCreate");
                                $day = date_format($date, "d");
                                $month = date_format($date, "m");
                                $year = date_format($date, "Y");
                                $mabs = $lichhen['id_bs'];
                                
                                echo '<div class="row p-5">';
                                
                                $bacsi = "SELECT * FROM bacsi WHERE id_bs = $mabs";
                                $query_bacsi = mysqli_query($mysqli, $bacsi);
                                $row_bacsi = mysqli_fetch_array($query_bacsi);
                                echo
                                    '<div class="col-lg-4 col-md-6">
                                        <div class=" overlay z-depth-1 z-depth-2 canhgiua">
                                            <img src="'.$row_bacsi['anhdaidien_bs'].'" class="img-fluid">
                                        </div>
                                        <h6 class="mb-3 text-center mt-3 font-weight-bold text-uppercase">BS. '.$row_bacsi['hoten_bs'].'</h6>
                                    </div>';
                                
                                $giokham = "SELECT * FROM lichhentruoc WHERE id_bs = $mabs AND ngaydangky = '$year-$month-$day'";
                                $query_giokham = mysqli_query($mysqli, $giokham);
                                $lich = array("F", "F", "F", "F", "F", "F");
                                while($row_giokham = mysqli_fetch_array($query_giokham)) {
                                    // echo '<div>'.$row_giokham['giodangky'].'</div>';
                                    switch($row_giokham['giodangky']) {
                                        case "07:00:00":
                                            $lich[0] = "T";
                                            break;
                                        case "08:30:00":
                                            $lich[1] = "T";
                                            break;
                                        case "10:00:00":
                                            $lich[2] = "T";
                                            break;
                                        case "13:00:00":
                                            $lich[3] = "T";
                                            break;
                                        case "14:30:00":
                                            $lich[4] = "T";
                                            break;
                                        case "16:00:00":
                                            $lich[5] = "T";
                                            break;
                                    }
                                }
                                
                                // foreach ($lich as $value) {
                                //     echo '<p>'.$value.'</p>';
                                // }
                                
                                echo '<div class="col-lg-8 col-md-12 text-left">
                                        <div>
                                            ';
                                
                                $ca_lv = "SELECT * FROM calamviecbs WHERE id_bs = $mabs AND ngaylamviec = '$year-$month-$day'";
                                $query_calv = mysqli_query($mysqli, $ca_lv);
                                $row_calv = mysqli_fetch_array($query_calv);
                                
                                // if($row_calv['calamviec'] === "A") {
                                //     $casang = true;
                                //     $cachieu = true;
                                // }
                                // else if ($row_calv['calamviec'] === "S") {
                                //     $casang = true;
                                //     $cachieu = false;
                                // }
                                // else {
                                //     $casang = false;
                                //     $cachieu = true;
                                // }
                                
                                if ($row_calv['calamviec'] != "C") {
                                    echo '<div class="div canhgiua" style="width: 100%;">
                                        <h6 class="font-weight-bold text-center">CA SÁNG</h6>
                                    </div>
                                
                                    <div style="display: flex; justify-content: space-between;">';
                                    //Ô chọn giờ 1
                                    if ($lich[0] == "T") {
                                        echo
                                            '<a class="btn btn-sm btn-success" style="min-width: 130px;">
                                                7h00 - 8h30<br/>
                                                ĐÃ ĐƯỢC CHỌN
                                            </a>';
                                    }
                                    else {
                                        echo '
                                            <a class="btn btn-sm btn-outline-warning" onclick="chongio(1)" data-dismiss="modal" style="min-width: 130px;">
                                                7h00 - 8h30<br/>
                                                CÒN TRỐNG
                                            </a>
                                        ';
                                    }
                                
                                    //Ô chọn giờ 2
                                    if($lich[1] == "T") {
                                        echo
                                            '<a class="btn btn-sm btn-success" style="min-width: 130px;">
                                                8h30 - 10h00<br/>
                                                ĐÃ ĐƯỢC CHỌN
                                            </a>';
                                    }
                                    else {
                                        echo '
                                            <a class="btn btn-sm btn-outline-warning" onclick="chongio(2)" data-dismiss="modal" style="min-width: 130px;">
                                                8h30 - 10h00<br/>
                                                CÒN TRỐNG
                                            </a>
                                        ';
                                    }
                                
                                    //Ô chọn giờ 3
                                    if($lich[2] == "T") {
                                        echo
                                            '<a class="btn btn-sm btn-success" style="min-width: 130px;">
                                                10h00 - 11h30<br/>
                                                ĐÃ ĐƯỢC CHỌN
                                            </a>';
                                    }
                                    else {
                                        echo '
                                            <a class="btn btn-sm btn-outline-warning" onclick="chongio(3)" data-dismiss="modal" style="min-width: 130px;">
                                                10h00 - 11h30<br/>
                                                CÒN TRỐNG
                                            </a>
                                        ';
                                    }
                                    echo '
                                        </div>
                                    </div>';
                                }
                                
                                if ($row_calv['calamviec'] !== "S") {
                                    echo '
                                    <hr>
                                    <div>
                                    <div class="div canhgiua" style="width: 100%;">
                                        <h6 class="font-weight-bold text-center">CA CHIỀU</h6>
                                    </div>
                                    
                                    <div style="display: flex; justify-content: space-between;">
                                ';
                                
                                //Ô chọn giờ 4
                                if($lich[3] == "T") {
                                    echo
                                        '<a class="btn btn-sm btn-success" style="min-width: 130px;">
                                        13h00 - 14h30<br/>
                                            ĐÃ ĐƯỢC CHỌN
                                        </a>';
                                }
                                else {
                                    echo '
                                        <a class="btn btn-sm btn-outline-warning" onclick="chongio(4)" data-dismiss="modal" style="min-width: 130px;">
                                        13h00 - 14h30<br/>
                                            CÒN TRỐNG
                                        </a>
                                    ';
                                }
                                
                                //Ô chọn giờ 5
                                if($lich[4] == "T") {
                                    echo
                                        '<a class="btn btn-sm btn-success" style="min-width: 130px;">
                                            14h30 - 16h00<br/>
                                            ĐÃ ĐƯỢC CHỌN
                                        </a>';
                                }
                                else {
                                    echo '
                                        <a class="btn btn-sm btn-outline-warning" onclick="chongio(5)" data-dismiss="modal" style="min-width: 130px;">
                                            14h30 - 16h00<br/>
                                            CÒN TRỐNG
                                        </a>
                                    ';
                                }
                                
                                //Ô chọn giờ 6
                                if($lich[5] == "T") {
                                    echo
                                        '<a class="btn btn-sm btn-success" style="min-width: 130px;">
                                            16h00 - 17h30<br/>
                                            ĐÃ ĐƯỢC CHỌN
                                        </a>';
                                }
                                else {
                                    echo '
                                        <a class="btn btn-sm btn-outline-warning" onclick="chongio(6)" data-dismiss="modal" style="min-width: 130px;">
                                            16h00 - 17h30<br/>
                                            CÒN TRỐNG
                                        </a>
                                    ';
                                }
                                
                                // echo $year.'-'.$month.'-'.$day;
                                
                                echo '</div>
                                </div>';
                                
                                }
                                
                                echo '</div>
                                </div>';

                                $checkTime = 1;
                            }
                            if ($checkTime == 0) {
                                echo '<h6 class="mt-3 mb-3 red-text d-flex align-items-center justify-content-center">Vui lòng chọn bác sĩ và ngày làm việc để chọn giờ khám đặt trước</h6>';
                            }
                        ?>
                        
                    </div>

                    <div class="modal-footer">                                                               
                        <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect ml-3 mr-3" data-dismiss="modal">ĐÓNG</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
        
    </div>
    

    <div class="row">

        <!-- Grid column -->
        <div class="col-md-12">
        <div class="md-form mb-0">
            <textarea type="text" id="form-contact-message" name="loinhan" class="form-control md-textarea" rows="3" ><?php if($lich == 1) echo $lichhen['loinhan'] ?></textarea>
            <label for="form-contact-message">Lời nhắn (có thể để trống)</label>
        </div>
        </div>
        <div class="col-md-12" id="test-giokham">

        </div>
        <!-- Grid column -->

    </div>
    <div style="text-align: center;" class="mt-3">
        <input type="submit" name="themlichhen" id="themlichhen" class="btn btn-primary btn-rounded" value="LƯU LỊCH HẸN">
    </div>
    </form>