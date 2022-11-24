<?php
    if(!isset($_SESSION['bacsi'])) {
        header("location:../index.php");
    }

    $MaBS = $_SESSION['bacsi']['id_bs'];
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" >
                <h5 class="font-weight-bold white-text bg-info p-3 mt-0" style="text-align: center;">LỊCH TÁI KHÁM CỦA KHÁCH HÀNG</h5>
                <table id="dtMaterialDesignExample" class="table table-striped table-responsive" style="border: 1px solid #01579b;" cellspacing="0" width="100%">
                    <colgroup>
                        <col width="30" span="1">
                        <col width="125" span="1">
                        <col width="125" span="1">
                        <col width="100" span="1">
                        <col width="150" span="1">
                        <col width="125" span="1">
                        <col width="300" span="1">
                        <col width="100" span="1">
                        <col width="50" span="1">
                    </colgroup>
                    <thead>
                        <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
                            <th>STT</th>
                            <th class="font-weight-bold">Mã phiếu
                            </th>
                            <th class="font-weight-bold">Tên khách hàng
                            </th>
                            <th class="font-weight-bold">Ngày khám bệnh
                            </th>
                            <th class="font-weight-bold">Tổng chi phí
                            </th>
                            <th class="font-weight-bold">Tiêu đề</th>
                            <th class="font-weight-bold">Nội dung</th>
                            <th class="font-weight-bold">Ngày tái khám</th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $stt = 1;
                        $lichtaikham = "SELECT * FROM lichtaikham, phieukhambenh WHERE lichtaikham.maphieu = phieukhambenh.maphieu AND phieukhambenh.id_bs = $MaBS AND lichtaikham.trangthai = 0 ORDER BY lichtaikham.ngaytaikham ASC";
                        $query_lichtaikham = mysqli_query($mysqli, $lichtaikham);
                        while($row_lichtaikham = mysqli_fetch_array($query_lichtaikham)) {
                    ?>
                        <tr>
                            <?php
                                $maphieu02 = $row_lichtaikham['maphieu'];
                                $phieu = "SELECT * FROM phieukhambenh WHERE id_bs = $MaBS AND maphieu = '$maphieu02'";
                                $query_phieu = mysqli_query($mysqli, $phieu);
                                $row_phieu = mysqli_fetch_array($query_phieu);
                            ?>
                            <td><?php echo $stt++ ?></td>
                            <td><?php echo $row_phieu['maphieu'] ?></td>
                            <td><?php echo $row_phieu['tenkhachhang'] ?></td>
                            <td><?php echo date("d-m-Y h:i:s", strtotime($row_phieu['ngaylapphieu']))?></td>
                            <td class="red-text font-weight-bold"><?php echo number_format($row_phieu['tongchiphi'], 0, '', '.')  ?> VNĐ</td>
                            <td><?php echo $row_lichtaikham['tieude'] ?></td>
                            <td><?php echo $row_lichtaikham['noidung'] ?></td>
                            <td>
                                <?php
                                    if ($row_lichtaikham['giohen'] == null) {
                                        echo date("d-m-Y", strtotime($row_lichtaikham['ngaytaikham']));
                                    }
                                    else {
                                        echo date("d-m-Y", strtotime($row_lichtaikham['ngaytaikham'])).' '.$row_lichtaikham['giohen'];
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="index-bs.php?route=lichhenkham&maphieu=<?php echo $row_phieu['maphieu'] ?>" class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="tooltip" data-placement="right" title="Xem chi tiết">
                                  <i class="fas fa-arrow-right"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>