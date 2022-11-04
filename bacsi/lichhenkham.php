<?php
    $maphieu = $_GET['maphieu'];
?>
<div class="container-fluid mb-5">
    <div class="card card-cascade cascading-admin-card">
        <div class="card-body card-body-cascade">
            <div class="row p-3">
                <div class="col-lg-12 canhgiua mb-3" style="background-color: #0d47a1!important;height: 50px">
                    <h5 class="font-weight-bold white-text" style="text-transform: uppercase;">LỊCH KHÁM CỦA KHÁCH HÀNG <?php
                        $sql_phieu = "SELECT * FROM phieukhambenh WHERE phieukhambenh.maphieu = '$maphieu'";
                        $query_phieu = mysqli_query($mysqli, $sql_phieu);
                        $phieu = mysqli_fetch_array($query_phieu);
                        echo $phieu['tenkhachhang'];
                    ?></h5>
                                           
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-2 m-0" style="display: flex;align-items: center;">
                    <div style="background-color: #33b5e5!important;width: 40px; height: 15px;"></div>
                    <i>&nbsp;Đã hoàn thành</i>
                </div>
                <div class="col-lg-3 m-0" style="display: flex;align-items: center;">
                    <div class="grey" style="width: 40px; height: 15px;"></div>
                    <i>&nbsp;Chưa hoàn thành</i>
                </div>
                <div class="col-lg-12 canhgiua mt-3">
                    <?php
                        $sql_check = "SELECT * FROM lichtaikham WHERE maphieu = '$maphieu' AND tieude = 'Tái khám định kỳ lần 24'";
                        $query_check = mysqli_query($mysqli, $sql_check);
                        if (mysqli_num_rows($query_check) == 0) {
                            ?>
                                <button class="btn btn-sm success-color-dark white-text" id="btn-apDungLT" onclick="niengrang('<?php echo $maphieu ?>');">ÁP DỤNG LỊCH TRÌNH NIỀNG RĂNG</button>
                            <?php
                        }

                        $sql_check02 = "SELECT * FROM lichtaikham WHERE maphieu = '$maphieu'";
                        $query_check02 = mysqli_query($mysqli, $sql_check02);
                        if (mysqli_num_rows($query_check02) != 0) {
                        ?>
                            <button class="btn btn-sm danger-color-dark white-text" id="btn-xoaLT" onclick="xoatatca('<?php echo $maphieu ?>');">XÓA TẤT CẢ LỊCH KHÁM</button>
                        <?php
                        }
                    ?>
                    
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">

                    <!-- Stepers Wrapper -->
                    <ul class="stepper stepper-vertical mt-0">

                    <!-- First Step -->
                    <li class="completed">
                        <a href="#!">
                        <span class="circle">1</span>
                        <span class="label">Chỉ định dịch vụ &nbsp;&nbsp;<i style="font-size: 14px;font-weight: 400;"><?php echo date("d-m-Y H:i:s" ,strtotime($phieu['ngaylapphieu'])) ?></i></span>
                        </a>

                        <div class="step-content grey lighten-3">
                            <p>Chỉ định dịch vụ:</p>
                            <ul><?php
                                $sql_dsdichvu = "SELECT * FROM dichvuduocchidinh, dichvu WHERE dichvuduocchidinh.id_dichvu = dichvu.id_dichvu AND maphieu = '$maphieu'";
                                $query_dsdichvu = mysqli_query($mysqli, $sql_dsdichvu);
                                while($ds_dichvu = mysqli_fetch_array($query_dsdichvu)) {
                                    ?>
                                        <li><?php echo $ds_dichvu['ten_dichvu'] ?></li>
                                    <?php
                                }
                            ?></ul>                         
                        </div>
                    </li>

                    <?php
                        $sql_taikham = "SELECT * FROM lichtaikham WHERE maphieu = '$maphieu' ORDER BY ngaytaikham ASC, giohen ASC";
                        $query_taikham = mysqli_query($mysqli, $sql_taikham);
                        $stt = 1;                 
                        if (mysqli_num_rows($query_taikham) != 0) {
                            while($lichtaikham = mysqli_fetch_array($query_taikham)) {
                            ?>
                            <li onclick="capnhat<?php echo $lichtaikham['id_lichtaikham'] ?>(<?php echo '\''.$lichtaikham['id_lichtaikham'].'\', \''.++$stt.'\'' ?>)" class="<?php if ($lichtaikham['trangthai'] == 1) {
                                echo 'active';
                            } ?>" id="dulieu-<?php echo $lichtaikham['id_lichtaikham'] ?>" style="display: block;">
                                <a>
                                    <span class="circle"><?php echo $stt; ?></span>
                                    <span class="label"><?php echo $lichtaikham['tieude'] ?> &nbsp;&nbsp;<i style="font-size: 14px;font-weight: 400;"><?php if($lichtaikham['giohen'] != NULL) {
                                        echo date("d-m-Y" ,strtotime($lichtaikham['ngaytaikham'])).' '.date("H:i:s",strtotime($lichtaikham['giohen']));
                                        }
                                        else {
                                            echo date("d-m-Y" ,strtotime($lichtaikham['ngaytaikham']));
                                        }
                                    ?></i></span>
                                </a>

                                <?php
                                    if ($lichtaikham['noidung'] != NULL) {
                                        ?>
                                            <div class="step-content grey lighten-3" style="width: 1000px;">
                                                <p class="<?php
                                                if ($lichtaikham['trangthai'] == 0) {
                                                    echo 'grey-text';
                                                }
                                            ?>"><?php echo $lichtaikham['noidung'] ?></p>
                                            </div>
                                        <?php
                                    }
                                ?>
                                
                            </li>
                            <li id="<?php echo 'capnhat-'.$lichtaikham['id_lichtaikham'] ?>"></li>
                            <script>
                                function capnhat<?php echo $lichtaikham['id_lichtaikham'] ?>(maphieu, stt) {
                                    document.querySelector('#dulieu-<?php echo $lichtaikham['id_lichtaikham'] ?>').style.display = 'none';
                                    document.querySelector('#capnhat-<?php echo $lichtaikham['id_lichtaikham'] ?>').style.display = 'block';
                                    // document.querySelector('#themlich').style.display = 'block';
                                    document.querySelector('#btnAdd').disabled = true;
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("<?php echo 'capnhat-'.$lichtaikham['id_lichtaikham'] ?>").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
                                        }
                                    };
                                    xmlhttp.open("GET", "capnhatlich.php?maphieu=" + maphieu + "&stt=" + stt + "&id=" + <?php echo $lichtaikham['id_lichtaikham'] ?>, true);
                                    xmlhttp.send();
                                }
                            </script>
                            <?php
                            }
                        } 
                    ?>

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
                                
                            </div>
                            
                            <div class="container-new">
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
                                                $idbs = $phieu['id_bs'];
                                                $bacsi = "SELECT * FROM calamviecbs WHERE id_bs = $idbs";
                                                $query_calamviec = mysqli_query($mysqli, $bacsi);
                                                $check = 0;
                                                if (mysqli_num_rows($query_calamviec) != 0) {
                                                    while($row_calamviec = mysqli_fetch_array($query_calamviec)) {
                                                        if($row_calamviec['ngaylamviec'] == $w) {
                                                            // if($row_calamviec['calamviec'] == "A") {
                                                            //     $check = 1;
                                                            //     echo '<a class="day-calender bg-info white-text" id="'.$i.'" onclick="chonngay('.$i.')" data-dismiss="modal"><p style="margin: 0;">'.$i.'<b class="margin-top: 0px" style="font-size: 13px;">Sáng - Chiều</b></p></a>';
                                                            // }
                                                            // else if($row_calamviec['calamviec'] == "S") {
                                                            //     $check = 1;
                                                            //     echo '<a class="day-calender bg-info white-text" id="'.$i.'" onclick="chonngay('.$i.')" data-dismiss="modal"><p style="margin: 0;"><b>'.$i.'</b><b class="margin-top: 0px" style="font-size: 13px;">Sáng</b></p></a>';
                                                            // }
                                                            // else {
                                                            //     $check = 1;
                                                            //     echo '<a class="day-calender bg-info white-text" id="'.$i.'" onclick="chonngay('.$i.')" data-dismiss="modal"><p style="margin: 0;">'.$i.'<b class="margin-top: 0px" style="font-size: 13px;">Chiều</b></p></a>';
                                                            // }
                                                            echo '<a class="day-calender bg-info white-text canhgiua" id="'.$i.'" onclick="chonngay('.$i.')" data-dismiss="modal"><p style="margin: 0;">'.$i.'</p></a>';
                                                            $check = 1;
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
                                <h6 class="mt-3 mb-3 red-text d-flex align-items-center justify-content-center">Vui lòng chọn ngày làm việc để chọn giờ khám</h6>
                            </div>

                            <div class="modal-footer">                                                               
                                <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect ml-3 mr-3" data-dismiss="modal">ĐÓNG</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div id="themlich">
                        <!-- <li>
                            <a href="#!">
                                <span class="circle"><php echo ++$stt ?></span>
                                <span class="label">Kết thúc </span>
                            </a>
                        </li>                       -->
                    </div>
                    <div id="loadPage"></div>
                    <li id="li-kt-02" style="display: block;">
                        <a href="#!">
                            <span class="circle"><?php echo ++$stt ?></span>
                            <span class="label">Kết thúc </span>
                        </a>
                    </li>

                    </ul>

                    <div class="col-md-12" style="display: flex;justify-content: right;">
                        <input type="button" id="btnAdd" class="btn btn-primary" onclick='themlich("<?php echo $maphieu ?>", <?php echo $stt ?>, <?php echo $phieu["id_bs"] ?>)' value="THÊM LỊCH">
                    </div>                   

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function themlich(maphieu, stt, idbs) {
        document.querySelector('#li-kt-02').style.display = 'none';
        document.querySelector('#themlich').style.display = 'block';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("themlich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "themlich.php?maphieu=" + maphieu + "&stt=" + stt + "&idbs=" + idbs, true);
        xmlhttp.send();
    }

    function xoalich(idlich) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("loadPage").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "xoalich.php?idlich=" + idlich, true);
        xmlhttp.send();
    }

    function niengrang(maphieu) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("loadPage").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "./lichtrinh/niengRang.php?maphieu=" + maphieu, true);
        xmlhttp.send();
    }

    function xoatatca(maphieu) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("loadPage").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "./lichtrinh/xoaLichTrinh.php?maphieu=" + maphieu, true);
        xmlhttp.send();
    }

</script>
<script>
    let monthEle = document.querySelector('.month-calender');
    let yearEle = document.querySelector('.year-calender');
    let btnNext = document.querySelector('.btn-next-calender');
    let btnPrev = document.querySelector('.btn-prev-calender');
    let btnToday = document.querySelector('.btn-today');
    let dateEle = document.querySelector('.date-container');

    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    // function displayInfo() {
    //     // Hiển thị tên tháng
    //     // let currentMonthName = new Date(
    //     //     currentYear,
    //     //     currentMonth
    //     // ).toLocaleString('en-us', { month: 'long' });

    //     monthEle.innerText = 'Tháng ' + (currentMonth + 1);

    //     // Hiển thị năm
    //     yearEle.innerText = currentYear;
        
    //     // Hiển thị ngày trong tháng
    //     renderDate();
    // }

    // Lấy số ngày của 1 tháng
    function getDaysInMonth() {
        return new Date(currentYear, currentMonth + 1, 0).getDate();
    }

    // Lấy ngày bắt đầu của tháng
    function getStartDayInMonth() {
        return new Date(currentYear, currentMonth, 1).getDay();
    }

    // Active current day
    function activeCurrentDay(day) {
        let day1 = new Date().toDateString();
        let day2 = new Date(currentYear, currentMonth, day).toDateString();
        return day1 == day2 ? 1 : 0;
    }

    // Hiển thị ngày trong tháng lên trên giao diện
    // function renderDate() {
    //     let daysInMonth = getDaysInMonth();
    //     let startDay = getStartDayInMonth();

    //     dateEle.innerHTML = '';

    //     for (let i = 0; i < startDay; i++) {
    //         dateEle.innerHTML += `
    //             <div class="day-calender"></div>
    //         `;
    //     }

    //     for (let i = 0; i < daysInMonth; i++) {
    //         if (activeCurrentDay(i+1) == 0) {
    //             dateEle.innerHTML += `
    //                 <a class="day-calender" id="${i + 1}-${currentMonth}" onclick="chonngay(${i + 1}, ${currentMonth})">${i + 1}</a>
    //             `;
    //         }
    //         else {
    //             dateEle.innerHTML += `
    //                 <a class="day-calender red-text font-weight-bold" id="${i + 1}-${currentMonth}" onclick="chonngay(${i + 1}, ${currentMonth})">
    //                     ${i + 1}
    //                 </a>
    //             `;
    //         }
    //     }
    // }

    function chonngay(day) {
        document.getElementById('from').value = `${currentYear}-${currentMonth+1}-${day}`;
        var mabs = <?php echo $phieu['id_bs'] ?>;
        var maPhieu = document.getElementById('maphieu').value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chongiokham").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
        };
        xmlhttp.open("GET", "../giokham.php?mabs=" + mabs + "&maphieu=" + maPhieu + "&day=" + day + "&month=" + (currentMonth + 1) + "&year=" + currentYear + "&thaotac=bacsi", true);
        xmlhttp.send();
    }
    
    function test() {
        var mabs = <?php echo $phieu['id_bs'] ?>;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("form-contact-message").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "../themlichhen.php", true);
        xmlhttp.send();
    }

    function chongio(thoigian) {
        switch(thoigian) {
        case 1:
            document.getElementById('giokham').value = '7:00';
            break;
        case 2:
            document.getElementById('giokham').value = '8:30';
            break;
        case 3:
            document.getElementById('giokham').value = '10:00';
            break;
        case 4:
            document.getElementById('giokham').value = '13:00';
            break;
        case 5:
            document.getElementById('giokham').value = '14:30';
            break;
        case 6:
            document.getElementById('giokham').value = '16:00';
            break;
        }
        
    }

    // Xử lý khi ấn vào nút next month
    btnNext.addEventListener('click', function () {
        if (currentMonth == 11) {
            currentMonth = 0;
            currentYear++;
        } else {
            currentMonth++;
        }
        // displayInfo();
        document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
        document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

        var mabs = <?php echo $phieu['id_bs'] ?>

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "../ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
        xmlhttp.send();
    });

    // Xử lý khi ấn vào nút previous month
    btnPrev.addEventListener('click', function () {
        if (currentMonth == 0) {
            currentMonth = 11;
            currentYear--;
        } else {
            currentMonth--;
        }
        // displayInfo();
        document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
        document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

        var mabs = <?php echo $phieu['id_bs'] ?>

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "../ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
        xmlhttp.send();
    });

    btnToday.addEventListener('click', function () {
        let d = new Date();
        currentMonth = d.getMonth();
        currentYear = d.getFullYear();
        // displayInfo();
        document.getElementById("thang").innerHTML = `<p class="month-calender info-calender">Tháng ${currentMonth+1}</p>`;
        document.getElementById("nam").innerHTML = `<p class="month-calender info-calender">${currentYear}</p>`;

        var mabs = <?php echo $phieu['id_bs'] ?>

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lich").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
            }
        };
        xmlhttp.open("GET", "../ngaygiokham.php?mabs=" + mabs + "&month=" + (currentMonth + 1) + "&year=" + currentYear, true);
        xmlhttp.send();
    });

    window.onload = displayInfo;
</script>