<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" >
                <h5 class="font-weight-bold white-text bg-info p-3 mt-0" style="text-align: center;">THÔNG TIN KHÁCH HÀNG</h5>
                <table id="dtMaterialDesignExample" class="table table-striped table-responsive" cellspacing="0" width="100%">
                    <colgroup>
                        <col width="10%" span="1">
                        <col width="20%" span="1">
                        <col width="10%" span="2">
                        <col width="20%" span="1">
                        <col width="10%" span="2">
                        <col width="20%" span="1">
                    </colgroup>
                        <thead>
                            <tr>
                            <th>Ảnh đại diện
                            </th>
                            <th>Tên khách hàng
                            </th>
                            <th>Giới tính
                            </th>
                            <th>Tuổi
                            </th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ
                            </th>
                            <th>Hạng thành viên
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $khachhang = "SELECT * FROM khachhang";
                        $query_kh = mysqli_query($mysqli, $khachhang);
                        while($row_kh = mysqli_fetch_array($query_kh)) {
                    ?>
                        <tr>
                            <td class="canhgiua mt-0 mb-0"><img src="../img/AnhDaiDien/<?php echo $row_kh['anhdaidien_kh'] ?>" width="50px" height="50px"></td>
                            <td><?php echo $row_kh['hoten_kh'] ?></td>
                            <td><?php echo $row_kh['gioitinh_kh'] ?></td>
                            <td><?php echo $row_kh['tuoi_kh'] ?></td>
                            <td><?php echo $row_kh['email_kh'] ?></td>
                            <td><?php echo $row_kh['sdt_kh'] ?></td>
                            <td><?php echo $row_kh['diachi_kh'] ?></td>
                            <td><?php
                                if($row_kh['diemtichluy'] < 100) {
                                    echo '<b style="color: #0099CC">Khách hàng mới <i class="fas fa-user-alt"></i></b>';
                                }
                                else if ($row_kh['diemtichluy'] >= 100 && $row_kh['diemtichluy'] < 200 ) {
                                    echo '<b style="color: #CC0000">Khách hành thân thiết <i class="fas fa-hands-helping"></i></b>';
                                }
                                else {
                                    echo '<b style="color: #FF8800">Khách hàng VIP <i class="fas fa-spa"></i></b>';
                                }
                            ?></td>
                            <td>
                                <a class="badge cyan canhgiua" style="width: 25px; height: 25px" data-toggle="tooltip" data-placement="right" title="Xem chi tiết">
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