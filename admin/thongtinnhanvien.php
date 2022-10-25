<?php
    if(!isset($_SESSION['admin'])) {
        header("location:../index.php");
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card card-cascade cascading-admin-card ">
                <div class="card-body">
                    <a href="./index-admin.php?route-admin=themnhanvien" type="button" class="btn btn-primary">THÊM NHÂN VIÊN</a>
                    <div class="p-1">
                        <div class="col-lg-12 canhgiua mt-3" style="background-color: #40c4ff;height: 50px">
                            <h5 class="font-weight-bold white-text">DANH SÁCH NHÂN VIÊN THU NGÂN</h5>                      
                        </div>
                        <div class="">
                            <table id="dtMaterialDesignExample" class="table table-striped table-responsive" style="border: 1px solid #01579b;" cellspacing="0" width="100%">
                                <colgroup>
                                    <col width="20" span="1">
                                    <col width="100" span="1">
                                    <col width="150" span="3">
                                    <col width="250" span="1">
                                    <col width="50" span="2">
                                    <col width="150" span="1">
                                    <col width="50" span="1">
                                </colgroup>
                                <thead>
                                    <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
                                        <th class="font-weight-bold">ID</th>
                                        <th class="font-weight-bold">Ảnh đại diện</th>
                                        <th class="font-weight-bold">Tên nhân viên</th>
                                        <th class="font-weight-bold">Username</th>
                                        <!-- <th class="font-weight-bold">Password</th> -->
                                        <th class="font-weight-bold">SĐT</th>
                                        <th class="font-weight-bold">Email</th>
                                        <th class="font-weight-bold">Giới tính</th>
                                        <th class="font-weight-bold">Năm sinh</th>
                                        <th class="font-weight-bold">Địa chỉ</th>
                                        <th class="font-weight-bold">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $nhanvien = "SELECT * FROM nhanvien";
                                        $queue_nhanvien = mysqli_query($mysqli, $nhanvien);
                                        while($row_nv = mysqli_fetch_array($queue_nhanvien)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $row_nv['id_nv'] ?></td>
                                                    <td><img src="<?php echo $row_nv['anhdaidien_nv']?>" width="40px" height="40px"></td>
                                                    <td><?php echo $row_nv['hoten_nv'] ?></td>
                                                    <td><?php echo $row_nv['username_nv'] ?></td>                                               
                                                    <td><?php echo $row_nv['sdt_nv'] ?></td>
                                                    <td><?php echo $row_nv['email_nv'] ?></td>
                                                    <td><?php echo $row_nv['gioitinh_nv'] ?></td>
                                                    <td><?php echo $row_nv['namsinh'] ?></td>
                                                    <td><?php echo $row_nv['diachi_nv'] ?></td>
                                                    <td>
                                                        <a class="badge bg-info canhgiua" style="width: 25px; height: 25px;float: left;"  title="Xem danh sách các ca khám bệnh của nhân viên"><i class="fas fa-arrow-right"></i></a>
                                                        <a class="badge bg-danger canhgiua" style="width: 25px; height: 25px; float: right;" title="Xóa" onclick="XoaNV(<?php echo $row_nv['id_nv'] ?>)"><i class="far fa-trash-alt"></i></a>
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
        </div>
    </div>
</div>
<div id="xoanv"></div>
<script>
    // function XoaNV(manv) {
    //   var xmlhttp = new XMLHttpRequest();
    //   xmlhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //         document.getElementById("xoanv").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
    //     }
    //   };
    //   xmlhttp.open("GET", "xoabacsi.php?mabs=" + mabs, true);
    //   xmlhttp.send();
    // }
</script>