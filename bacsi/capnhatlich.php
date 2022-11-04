<?php
include("../config.php");
include("../autoload.php");
session_start();

if (isset($_GET['maphieu']) && isset($_GET['stt']) && isset($_GET['id'])) {
    $maphieu = $_GET['maphieu'];
    $stt = $_GET['stt'];
    $id = $_GET['id'];
}
else {
    $maphieu = 0;
    $stt = 0;
    $id = 0;
}

$sql_dulieu = "SELECT * FROM lichtaikham WHERE id_lichtaikham = $id";
$query_dulieu = mysqli_query($mysqli, $sql_dulieu);
$dulieu = mysqli_fetch_array($query_dulieu);

echo '
<form action="./action-themlich.php" name="capnhatlichbacsi" method="POST">';?>
    <a href="#!">
        <span class="circle">
            <?php echo $stt ?>
        </span>
        <span class="label" style="width: 940px">
            <div class="row">
                <div class="col-lg-6">
                    <div class="md-form m-0 p-0">
                        <input type="text" id="tieude" name="tieude" class="form-control" value="<?php echo $dulieu['tieude'] ?>">
                        <label for="tieude" class="active">Tiêu đề</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="md-form m-0 p-0">
                        <input type="text" id="from" name="ngaykham" class="form-control" data-toggle="modal" data-target="#modal-info-new" value="<?php echo $dulieu['ngaytaikham'] ?>" required readonly>
                        <label for="date-picker-example" class="active">Chọn ngày khám</label>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="md-form m-0 p-0">
                        <input type="text" id="giokham" name="giokham" class="form-control" data-toggle="modal" data-target="#modal-info-giokham" value="<?php echo $dulieu['giohen'] ?>" required readonly>
                        <label for="giokham" class="active">Chọn giờ khám</label>
                    </div>
                </div>
                <div class="col-lg-3" hidden>
                    <div class="md-form m-0 p-0">
                        <input type="text" id="id_lichtaikham" name="id_lichtaikham" class="form-control" data-toggle="modal" value="<?php echo $dulieu['id_lichtaikham'] ?>" required readonly>
                        <label for="id_lichtaikham">Mã phiếu</label>
                    </div>
                </div>
            </div> 
        </span>
    </a>
    <div class="step-content grey lighten-3" style="width: 1000px">
        <div class="md-form m-0 p-0">
            <textarea id="noidung" name="noidung" class="form-control md-textarea"><?php echo $dulieu['noidung'] ?></textarea>
            <label for="noidung" class="active">Nội dung</label>
        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" name="capnhatlich-bacsi" id="capnhatlich-bacsi" 
                class="btn btn-success btn-rounded btn-sm" value="CẬP NHẬT">
            <a class="btn btn-danger btn-rounded btn-sm canhgiua" data-toggle="modal" data-target="#frameModalTopInfoDemo-03-<?php echo $dulieu['id_lichtaikham'] ?>" data-backdrop="false">XÓA</a>
            <a class="btn warning-color-dark btn-rounded btn-sm canhgiua" id="btn-dong"
                onclick="document.querySelector('#dulieu-<?php echo $dulieu['id_lichtaikham'] ?>').style.display = 'block';
                document.getElementById('capnhat-<?php echo $dulieu['id_lichtaikham'] ?>').innerHTML= '';
                document.querySelector('#btnAdd').disabled = false;">
                           HỦY
            </a>           
        </div>
        <section>
            <div class="modal fade top" id="frameModalTopInfoDemo-03-<?php echo $dulieu['id_lichtaikham'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center">
                        <p class="pt-3 pr-2">Bạn chắc chắn muốn xóa lịch hẹn khám này ?</p>
                        <a type="button" class="btn btn-danger btn-sm" onclick="xoalich(<?php echo $dulieu['id_lichtaikham'] ?>)">Có, tôi chắc chắn</a>
                        <a type="button" class="btn btn-outline-danger btn-sm waves-effect" data-dismiss="modal">Không, tôi không muốn xóa</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    
    
    
<?php echo '</form>';

?>