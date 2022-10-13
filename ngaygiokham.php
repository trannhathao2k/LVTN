<?php
    include("./config.php");
    include("./autoload.php");
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (isset($_GET['mabs']) && isset($_GET['month']) && isset($_GET['year']) ) {
        $mabs = $_GET['mabs'];
        $month = $_GET['month'];
        $year = $_GET['year'];
    }
    else {
        $mabs = 0;
        $month = date("m");
        $year = date("y");
    }

    // $taophieu = "DELETE FROM temp02";
    // $mysqli->query($taophieu);

    // $taophieu02 = "INSERT INTO temp02 VALUES (null, $mabs)";
    // $mysqli->query($taophieu02);

    if($mabs != 0) {
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
            $bacsi = "SELECT * FROM calamviecbs WHERE id_bs = $mabs";
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
    

    
    // echo $month.'-'.$year;

?>