<?php
include("../config.php");
include("../autoload.php");
session_start();

if (isset($_GET['maphieu'])) {
    $maphieu = $_GET['maphieu'];
    $stt = $_GET['stt'];
    $idbs = $_GET['idbs'];
}
else {
    $maphieu = 0;
    $stt = 0;
    $idbs = 0;
}

echo '
<li>
<form action="./action-themlich.php" name="themlichbacsi" method="POST">';?>
    <a href="#!">
        <span class="circle">
            <?php echo $stt ?>
        </span>
        <span class="label" style="width: 940px">
            <div class="row">
                <div class="col-lg-6">
                    <div class="md-form m-0 p-0">
                        <input type="text" id="tieude" name="tieude" class="form-control">
                        <label for="tieude" class="">Tiêu đề</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="md-form m-0 p-0">
                        <input type="text" id="from" name="ngaykham" class="form-control" data-toggle="modal" data-target="#modal-info-new" required readonly>
                        <label for="date-picker-example">Chọn ngày khám</label>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="md-form m-0 p-0">
                        <input type="text" id="giokham" name="giokham" class="form-control" data-toggle="modal" data-target="#modal-info-giokham" required readonly>
                        <label for="giokham">Chọn giờ khám</label>
                    </div>
                </div>
                <div class="col-lg-3" hidden>
                    <div class="md-form m-0 p-0">
                        <input type="text" id="maphieu" name="maphieu" class="form-control" data-toggle="modal" value="<?php echo $maphieu ?>" required readonly>
                        <label for="maphieu">Mã phiếu</label>
                    </div>
                </div>
            </div> 
        </span>
    </a>
    <div class="step-content grey lighten-3" style="width: 1000px">
        <div class="md-form m-0 p-0">
            <textarea id="noidung" name="noidung" class="form-control md-textarea"></textarea>
            <label for="noidung" class="">Nội dung</label>
        </div>
        <div class="d-flex justify-content-end">
            <input type="submit" name="themlich-bacsi" id="themlich-bacsi" 
                class="btn btn-primary btn-rounded btn-sm" value="LƯU">
            <a class="btn btn-danger btn-rounded btn-sm canhgiua" id="btn-dong"
                onclick="document.querySelector('#li-kt-02').style.display = 'block';
                        document.querySelector('#themlich').style.display = 'none';">
                           HỦY
            </a>
        </div>
    </div>
    
    
    
<?php echo '</li>
</form>
<li>
    <a href="#!">
        <span class="circle">'.++$stt.'</span>
        <span class="label">Kết thúc </span>
    </a>
</li>
';

?>