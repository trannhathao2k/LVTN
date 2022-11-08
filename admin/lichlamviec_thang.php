<?php
    include("../config.php");
    include("../autoload.php");
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (isset($_GET['month']) && isset($_GET['year']) ) {
        $month = $_GET['month'];
        $year = $_GET['year'];
    }
    else {
        $month = date("m");
        $year = date("y");
    }

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
        if ($today == $w) {
            echo '<a class="day-calender-today grey lighten-2" id="'.$i.'-'.$month.'">'?>
                <div style="height: 30px;text-align: right;font-weight: bold;"><b id="icon-<?php echo $i ?>" style="float: left;margin-left: 5px;color: #00C851;font-weight: 300;visibility: hidden;"><i class="far fa-calendar-plus"></i></b><?php echo $i ?></div>
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
            <?php echo '</a>';                   
        }
        else {
            echo '<a class="day-calender" id="'.$i.'-'.$month.'">'?>
                <div style="height: 30px;text-align: right;font-weight: bold;"><b id="icon-<?php echo $i ?>" style="float: left;margin-left: 5px;color: #00C851;font-weight: 300;visibility: visible;"><i class="far fa-calendar-plus"></i></b><?php echo $i ?></div>
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
                    else if(mysqli_num_rows($query_lichlamviec) > 4) {
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
            <?php echo '</a>';
        }?>
        <!-- <script>
            var obj_<php echo $i ?>_over = document.getElementById('<php echo $i.'-'.$month ?>');
            obj_<php echo $i ?>_over.addEventListener('mouseover', function(){
                document.querySelector('#icon-<php echo $i ?>').style.visibility = 'visible';
            });

            var obj_<php echo $i ?>_out = document.getElementById('<php echo $i.'-'.$month ?>');
            obj_<php echo $i ?>_out.addEventListener('mouseout', function(){
                document.querySelector('#icon-<php echo $i ?>').style.visibility = 'hidden';
            });
        </script> -->
        <?php
    }

?>