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

    function lastday8($month_ld = '', $year_ld = '') {
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
    $lastday = lastday8(''.$month.'',''.$year.'');

    $today = date("Y-m-d");
    $day_today = date("d");
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
                                    <label for="calamviec-bacsi-<?php echo $i ?>">Chọn bác sĩ</label>
                                    <select id="calamviec-bacsi-<?php echo $i ?>" class="form-control form-select">
                                        <!-- <option disabled selected>Chọn bác sĩ</option> -->
                                        <?php
                                        $sql_bacsi = "SELECT * FROM bacsi WHERE id_bs 
                                                NOT IN (SELECT id_bs FROM calamviecbs WHERE ngaylamviec = '$year-$month-$i')";
                                        $query_bacsi = mysqli_query($mysqli, $sql_bacsi);
                                        if (mysqli_num_rows($query_bacsi) != 0) {
                                            while($bacsi = mysqli_fetch_array($query_bacsi)) {
                                                ?>
                                                <option value="<?php echo $bacsi['id_bs'] ?>"
                                                    ><?php echo $bacsi['hoten_bs'] ?></option>
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
                                    
                                </div>
                                <div class="col-lg-4">
                                    <label for="chonCa-<?php echo $i ?>" class="form-label">Chọn ca làm việc</label>
                                    <select id="chonCa-<?php echo $i ?>" class="form-control form-select mb-0">
                                        <option value="S">CA SÁNG</option>
                                        <option value="C">CA CHIỀU</option>
                                        <option value="A">CẢ NGÀY</option>
                                    </select>
                                    
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
                                                            <label for="calamviec-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>" class="mdb-main-label">Ca làm việc</label>
                                                            <select id="calamviec-<?php echo $calamviec['id_bs'] ?>-<?php echo $i ?>" class="form-control form-select">
                                                                <option value="S" <?php if ($calamviec['calamviec'] == "S") {echo 'selected';} ?>>CA SÁNG</option>
                                                                <option value="C" <?php if ($calamviec['calamviec'] == "C") {echo 'selected';} ?>>CA CHIỀU</option>
                                                                <option value="A" <?php if ($calamviec['calamviec'] == "A") {echo 'selected';} ?>>CẢ NGÀY</option>
                                                            </select>
                                                            
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