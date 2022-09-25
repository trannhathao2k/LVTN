<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" >
                <h5 class="font-weight-bold white-text bg-info p-3 mt-0" style="text-align: center;">DANH SÁCH THU PHÍ KHÁCH HÀNG</h5>
                <table id="dtMaterialDesignExample" class="table table-striped table-responsive" cellspacing="0" width="100%">
                    <colgroup>
                        <col width="10%" span="1">
                        <col width="15%" span="2">
                        <col width="10%" span="2">
                        <col width="12%" span="1">
                        <col width="5%" span="1">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Mã phiếu
                            </th>
                            <th>Tên khách hàng
                            </th>
                            <th>Bác sĩ khám</th>
                            <th>Ngày lập phiếu</th>
                            <th>Phí dịch vụ
                            </th>
                            <th>Trạng thái thu phí</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $ttphieu = "SELECT * FROM phieukhambenh, bacsi WHERE phieukhambenh.id_bs = bacsi.id_bs";
                        $query_ttphieu = mysqli_query($mysqli, $ttphieu);
                        while($row_ttphieu = mysqli_fetch_array($query_ttphieu)) {
                    ?>
                        <tr>
                            <td><?php echo $row_ttphieu['maphieu'] ?></td>
                            <td><?php echo $row_ttphieu['tenkhachhang'] ?></td>
                            <td><?php echo $row_ttphieu['hoten_bs'] ?></td>
                            <td><?php echo $row_ttphieu['ngaylapphieu'] ?></td>
                            <td class="font-weight-bold red-text"><?php echo number_format($row_ttphieu['tongchiphi'], 0, '', '.') ?> VNĐ</td>
                            <td><?php
                                if($row_ttphieu['trangthaithuphi'] == 0) {
                                    echo '<button type="button" class="btn btn-sm btn-outline-deep-orange waves-effect mt-0 mb-0" style="width: 120px">Chờ thu phí</button>';
                                }
                                else {
                                    echo '<button type="button" class="btn btn-sm btn-outline-success waves-effect mt-0 mb-0" style="width: 120px">Đã thu phí</button>';
                                }
                            ?></td>
                            <td>
                                <a class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="modal" data-target="#modal-info-<?php echo $row_ttphieu['maphieu'] ?>" data-placement="right" title="Xem chi tiết">
                                  <i class="fas fa-arrow-right"></i>
                                </a>
                            </td>
                            <!--Modal Info-->
                            <div class="modal fade modal-ext" id="modal-info-<?php echo $row_ttphieu['maphieu'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 py-3" id="myModalLabel">THÔNG TIN CHI TIẾT</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!--Body-->
                                <div class="modal-body text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Tên khách hàng: <?php echo $row_ttphieu['tenkhachhang'] ?></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="mdb-select" multiple searchable="Search here..">
                                                <option value="" disabled selected>Search select</option>
                                                <option value="1">USA</option>
                                                <option value="2">Germany</option>
                                                <option value="3">France</option>
                                                <option value="3">Poland</option>
                                                <option value="3">Japan</option>
                                            </select>
                                        </div>
                                    </div>
                                   

                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-rounded btn-info waves-effect" data-dismiss="modal">ĐÓNG</button>
                                </div>
                                </div>
                                <!--/Content-->
                            </div>
                            </div>
                            <!--/Modal Info-->
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <div class="col-lg-12">
    <select class="mdb-select" multiple searchable="Search here..">
                                                <option value="" disabled selected>Search select</option>
                                                <option value="1">USA</option>
                                                <option value="2">Germany</option>
                                                <option value="3">France</option>
                                                <option value="3">Poland</option>
                                                <option value="3">Japan</option>
                                            </select>
    </div>
    
</div>