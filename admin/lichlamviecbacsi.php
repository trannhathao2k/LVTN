<div class="container-new">
    <div id="link"></div>
    <section>
        <div class="calendar-new mt-3 mb-3">
            <h3>LỊCH LÀM VIỆC CỦA BÁC SĨ TQUEEN</h3>
            <div class="row mb-3">
                <div class="col-md-6 pl-0" style="display: flex;justify-content: left;">
                    <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        if(isset($_GET['date'])) {
                            $date = $_GET['date'];
                            $month = date("m", strtotime($date));
                            $year = date("Y", strtotime($date));
                        }
                        else {
                            $month = date("m");
                            $year = date("Y");
                        }
                    ?>
                    <a class="btn btn-outline-primary btn-prev-calender"
                            href="http://localhost/web-nha-khoa/admin/index-admin.php?route-admin=lichlamviecbacsi&date=<?php
                                if ($month == 1) {
                                    $currentMonth = 12;
                                    $currentYear = $year - 1;
                                }
                                else {
                                    $currentMonth = $month - 1;
                                    $currentYear = $year;
                                }
                                echo $currentYear.'-'.$currentMonth.'-1';
                            ?>">
                        <span><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                    </a>            
                    <a class="btn btn-outline-primary btn-next-calender"
                            href="http://localhost/web-nha-khoa/admin/index-admin.php?route-admin=lichlamviecbacsi&date=<?php
                                if ($month == 12) {
                                    $currentMonth = 1;
                                    $currentYear = $year + 1;
                                }
                                else {
                                    $currentMonth = $month + 1;
                                    $currentYear = $year;
                                }
                                echo $currentYear.'-'.$currentMonth.'-1';
                            ?>">
                        <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                    <a class="btn-today btn aqua-gradient ml-3"
                            href="http://localhost/web-nha-khoa/admin/index-admin.php?route-admin=lichlamviecbacsi&date=<?php
                                $currentMonth = date("m");
                                $currentYear = date("Y");
                                echo $currentYear.'-'.$currentMonth.'-1';
                            ?>">
                        HÔM NAY
                    </a>
                </div>
                <div class="col-md-6" style="display: flex;justify-content: right;align-items: center;">
                    <div id="thang">
                        <p class="month-calender info-calender m-0"><?php
                            echo 'Tháng '.$month.',&nbsp';
                        ?></p>
                    </div>
                    <div id="nam" class="m-0">
                        <p class="year-calender info-calender m-0" id="year"><?php
                            echo $year;
                        ?></p>
                    </div>  
                </div>
                
                
                <div class="date-calender-th white-text font-weight-bold bg-primary mt-3">
                    <div class="day-name-calender-th">CHỦ NHẬT</div>
                    <div class="day-name-calender-th">THỨ 2</div>
                    <div class="day-name-calender-th">THỨ 3</div>
                    <div class="day-name-calender-th">THỨ 4</div>
                    <div class="day-name-calender-th">THỨ 5</div>
                    <div class="day-name-calender-th">THỨ 6</div>
                    <div class="day-name-calender-th">THỨ 7</div>
                </div>
                <div class="date-calender date-container" id="lich" style="display: flex;flex-wrap: wrap;">
                    <?php
                        $day = date("d");
                        $str = "$year-$month-1";
                        $date = new DateTime($str);
                        $w = (int)$date->format('w');
                        for($i = 0; $i < $w; $i++) {
                            echo '<div class="day-calender"></div>';
                        }
            
                        function lastday10($month_ld = '', $year_ld = '') {
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
                        $lastday = lastday10(''.$month.'',''.$year.'');
            
                        $today = date("Y-m-d");
                        for($i=1; $i <= $lastday; $i++) {
                            $day_calender = new DateTime("$year-$month-$i");
                            $w = $day_calender->format('Y-m-d');
                            // echo $w;
                            ?><a class="<?php
                                if($w == $today) {
                                    echo 'day-calender-today grey lighten-2';
                                }
                                else {
                                    echo 'day-calender';
                                }
                            ?>" id="<?php echo $i.'-'.$month ?>" data-toggle="modal" data-target="#modal-info-icon-<?php echo $i ?>">
                                <div style="height: 30px;text-align: right;font-weight: bold;"><?php echo $i ?></div>
                                <?php
                                    $sql_lichlamviec = "SELECT * FROM calamviecbs, bacsi WHERE calamviecbs.id_bs = bacsi.id_bs AND ngaylamviec = '$year-$month-$i'";
                                    $query_lichlamviec = mysqli_query($mysqli, $sql_lichlamviec);
                                    if (mysqli_num_rows($query_lichlamviec) == 4) {
                                        while($lichlamviec = mysqli_fetch_array($query_lichlamviec)) {
                                            ?>
                                            <div class="name-bacsi">
                                                <div class="row m-0 p-0">
                                                    <div class="col-lg-7 p-0">
                                                        <div class="m-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $lichlamviec['hoten_bs'] ?></div>
                                                    </div>
                                                    <div class="col-lg-5 p-0">
                                                        <span style="float: right;font-size: 10px"><?php
                                                            if ($lichlamviec['calamviec'] == "A") {
                                                                echo 'CẢ NGÀY';
                                                            }
                                                            else if ($lichlamviec['calamviec'] == "S") {
                                                                echo "CA SÁNG";
                                                            }
                                                            else {
                                                                echo 'CA CHIỀU';
                                                            }
                                                        ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    else if(mysqli_num_rows($query_lichlamviec) > 0 && mysqli_num_rows($query_lichlamviec) < 4) {
                                        while($lichlamviec = mysqli_fetch_array($query_lichlamviec)) {
                                            ?>
                                                <div class="name-bacsi">
                                                    <div class="row m-0 p-0">
                                                        <div class="col-lg-7 p-0">
                                                            <div class="m-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $lichlamviec['hoten_bs'] ?></div>
                                                        </div>
                                                        <div class="col-lg-5 p-0">
                                                            <span style="float: right;font-size: 10px"><?php
                                                                if ($lichlamviec['calamviec'] == "A") {
                                                                    echo 'CẢ NGÀY';
                                                                }
                                                                else if ($lichlamviec['calamviec'] == "S") {
                                                                    echo "CA SÁNG";
                                                                }
                                                                else {
                                                                    echo 'CA CHIỀU';
                                                                }
                                                            ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                    else if(mysqli_num_rows($query_lichlamviec) > 0 && mysqli_num_rows($query_lichlamviec) > 4) {
                                        $j = 0;
                                        $soluong_ca = mysqli_num_rows($query_lichlamviec);
                                        while(($lichlamviec = mysqli_fetch_array($query_lichlamviec)) && $j < 3) {
                                            ?>
                                                <div class="name-bacsi">
                                                    <div class="row m-0 p-0">
                                                        <div class="col-lg-7 p-0">
                                                            <div class="m-0" style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $lichlamviec['hoten_bs'] ?></div>
                                                        </div>
                                                        <div class="col-lg-5 p-0">
                                                            <span style="float: right;font-size: 10px"><?php
                                                                if ($lichlamviec['calamviec'] == "A") {
                                                                    echo 'CẢ NGÀY';
                                                                }
                                                                else if ($lichlamviec['calamviec'] == "S") {
                                                                    echo "CA SÁNG";
                                                                }
                                                                else {
                                                                    echo 'CA CHIỀU';
                                                                }
                                                            ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            $j++;
                                        }
                                        ?>
                                            <div class="name-bacsi name-more">+<?php echo ($soluong_ca - 3) ?> thêm</div>
                                        <?php
                                    }
                                ?>
                            <?php echo '</a>';?>
                            <?php                  
                            $date = date("$year-$month-$i");
                            if(strtotime($date) >= strtotime($today)) {
                                ?>
                                <!--Modal Info-->
                                <div class="modal fade modal-ext" id="modal-info-icon-<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title w-100 py-3" id="myModalLabel">LỊCH LÀM VIỆC CỦA BÁC SĨ NGÀY <?php echo $i.'-'.$month.'-'.$year ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!--Body-->
                                            <div class="modal-body text-center" style="font-size: 14px;">
                                                <h5 class="title mb-3 font-weight-bold">Thêm ca làm việc</h5>
                                                <div class="row canhgiua mt-4 mb-0">
                                                    <div class="col-lg-4">
                                                        <select id="calamviec-bacsi-<?php echo $i ?>" class="mdb-select md-form mb-0" searchable="Tìm kiếm..">
                                                            <!-- <option disabled selected>Chọn bác sĩ</option> -->
                                                            <?php
                                                            $sql_bacsi = "SELECT * FROM bacsi WHERE id_bs 
                                                                    NOT IN (SELECT id_bs FROM calamviecbs WHERE ngaylamviec = '$year-$month-$i')";
                                                            $query_bacsi = mysqli_query($mysqli, $sql_bacsi);
                                                            if (mysqli_num_rows($query_bacsi) != 0) {
                                                                while($bacsi = mysqli_fetch_array($query_bacsi)) {
                                                                    ?>
                                                                    <option value="<?php echo $bacsi['id_bs'] ?>" data-icon="../<?php echo $bacsi['anhdaidien_bs'] ?>"
                                                                        class="rounded-circle"><?php echo $bacsi['hoten_bs'] ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            else {
                                                                ?>
                                                                    <option disabled>Không có bác sĩ</option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="calamviec-bacsi-<?php echo $i ?>" class="mdb-main-label">Chọn bác sĩ</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select id="chonCa-<?php echo $i ?>" class="mdb-select colorful-select dropdown-primary md-form mb-0">
                                                            <option value="S">CA SÁNG</option>
                                                            <option value="C">CA CHIỀU</option>
                                                            <option value="A">CẢ NGÀY</option>
                                                        </select>
                                                        <label for="chonCa-<?php echo $i ?>" class="mdb-main-label">Chọn ca làm việc</label>
                                                    </div>
                                                    <div class="col-lg-2" style="margin-top: -25px;">
                                                        <input type="button" class="btn btn-success" id="btn-themCa-<?php echo $i ?>" value="THÊM" onclick="themcalamviec('<?php echo $i ?>', '<?php echo $month ?>', '<?php echo $year ?>')"></input>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="title mb-3 font-weight-bold">Danh sách làm việc hôm nay</h5>
                                                <div class="row p-0 m-0 canhgiua">
                                                    <div class="col-lg-10">
                                                        <table class="table mb-0">
                                                            <tbody>
                                                                <?php
                                                                    $sql_calamviec = "SELECT * FROM calamviecbs, bacsi WHERE calamviecbs.id_bs = bacsi.id_bs AND ngaylamviec = '$year-$month-$i'";
                                                                    $query_calamviec = mysqli_query($mysqli, $sql_calamviec);
                                                                    while($calamviec = mysqli_fetch_array($query_calamviec)) {
                                                                        ?><tr>
                                                                            <td style="vertical-align: middle;text-align: center;"><?php echo $calamviec['hoten_bs'] ?></td>
                                                                            <td id="selectSua-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>">
                                                                                <select id="calamviec-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>" class="mdb-select colorful-select dropdown-primary md-form mb-0">
                                                                                    <option value="S" <?php if ($calamviec['calamviec'] == "S") {echo 'selected';} ?>>CA SÁNG</option>
                                                                                    <option value="C" <?php if ($calamviec['calamviec'] == "C") {echo 'selected';} ?>>CA CHIỀU</option>
                                                                                    <option value="A" <?php if ($calamviec['calamviec'] == "A") {echo 'selected';} ?>>CẢ NGÀY</option>
                                                                                </select>
                                                                                <label for="calamviec-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>" class="mdb-main-label">Ca làm việc</label>
                                                                            </td>
                                                                            <td style="vertical-align: middle;" id="selectBtn-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>">
                                                                                <a class="badge cyan canhgiua" style="float: left;width: 25px; height: 25px;" id="btnUpdate-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>" style="width: 25px; height: 25px"  data-toggle="tooltip" data-placement="bottom" title="Cập nhật"
                                                                                    onclick="suacalamviec('calamviec-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>','<?php echo $calamviec['id_calv'] ?>')">
                                                                                    <i class="fas fa-pen-square"></i>
                                                                                </a>
                                                                                <a class="badge bg-danger canhgiua ml-2" style="width: 25px; height: 25px;float: left;" data-toggle="tooltip" data-placement="bottom" title="Xóa"
                                                                                        onclick="xoacalamviec('<?php echo $calamviec['id_calv'] ?>')">
                                                                                    <i class="fas fa-calendar-times"></i>
                                                                                </a>
                                                                            </td>
                                                                            </tr>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Footer-->
                                            <div class="modal-footer">                        
                                                <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect" data-dismiss="modal">ĐÓNG</button>
                                            </div>
                                        </div>
                                        <!--/Content-->
                                    </div>
                                </div>
                                <!--/Modal Info-->
                            <?php
                            }
                            else {
                                ?>
                                    <!--Modal Info-->
                                    <div class="modal fade modal-ext" id="modal-info-icon-<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                            aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <!--Content-->
                                            <div class="modal-content">
                                                <!--Header-->
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 py-3" id="myModalLabel">LỊCH LÀM VIỆC CỦA BÁC SĨ NGÀY <?php echo $i.'-'.$month.'-'.$year ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!--Body-->
                                                <div class="modal-body text-center" style="font-size: 14px;">
                                                    <h5 class="title mb-3 font-weight-bold">Danh sách làm việc hôm nay</h5>
                                                    <div class="row p-0 m-0 canhgiua">
                                                        <div class="col-lg-10">
                                                            <table class="table mb-0">
                                                                <tbody>
                                                                    <?php
                                                                        $sql_calamviec = "SELECT * FROM calamviecbs, bacsi WHERE calamviecbs.id_bs = bacsi.id_bs AND ngaylamviec = '$year-$month-$i'";
                                                                        $query_calamviec = mysqli_query($mysqli, $sql_calamviec);
                                                                        while($calamviec = mysqli_fetch_array($query_calamviec)) {
                                                                            ?><tr>
                                                                                <td style="vertical-align: middle;text-align: center;"><?php echo $calamviec['hoten_bs'] ?></td>
                                                                                <td >
                                                                                    <?php
                                                                                        if($calamviec['calamviec'] == 'A') {
                                                                                            echo 'CẢ NGÀY';
                                                                                        }
                                                                                        else if ($calamviec['calamviec'] == "S") {
                                                                                            echo "CA SÁNG";
                                                                                        }
                                                                                        else {
                                                                                            echo "CA CHIỀU";
                                                                                        }
                                                                                    ?>
                                                                                </td>
                                                                                </tr>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Footer-->
                                                <div class="modal-footer">                        
                                                    <button type="button" class="btn btn-sm btn-rounded btn-danger waves-effect" data-dismiss="modal">ĐÓNG</button>
                                                </div>
                                            </div>
                                            <!--/Content-->
                                        </div>
                                    </div>
                                    <!--/Modal Info-->
                                <?php
                            }
                        }
                    ?>                 
                </div>
                
            </div>
        </div>
    </section>

</div>
<script>
    function themcalamviec(ngay, thang, nam) {
        var idbs = document.getElementById('calamviec-bacsi-' + ngay).value;
        var calamviec = document.getElementById('chonCa-' + ngay).value;

        linkGET = "./action-admin.php?action=them&idbacsi=" + idbs + "&ngaylamviec=" + nam + "-" + thang + "-" + ngay + "&calamviec=" + calamviec;
        // document.getElementById('link').innerHTML = linkGET;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("link").innerHTML =(this.responseText);
          }
        };
        xmlhttp.open("GET", linkGET, true);
        xmlhttp.send();
    }

    function suacalamviec(id, idca) {
        var calamviec = document.getElementById('' + id).value; 
        linkGET = "./action-admin.php?action=sua&idca=" + idca + "&calamviec=" + calamviec;
        // document.getElementById('link').innerHTML = linkGET;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("link").innerHTML =(this.responseText);
          }
        };
        xmlhttp.open("GET", linkGET, true);
        xmlhttp.send();
    }

    function xoacalamviec(id_ca) {
        linkGET = "./action-admin.php?action=xoa&idca=" + id_ca;
        // document.getElementById('link').innerHTML = linkGET;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("link").innerHTML =(this.responseText);
          }
        };
        xmlhttp.open("GET", linkGET, true);
        xmlhttp.send();
    }
</script>