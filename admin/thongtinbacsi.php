<?php
    if(isset($_SESSION['admin']) == false) {
        header("location:../index.php");
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card card-cascade cascading-admin-card ">
                <div class="card-body">
                    <a href="./index-admin.php?route-admin=thembacsi" type="button" class="btn btn-primary">THÊM BÁC SĨ</a>
                    <div class="p-1">
                        <div class="col-lg-12 canhgiua mt-3" style="background-color: #40c4ff;height: 50px">
                            <h5 class="font-weight-bold white-text">DANH SÁCH BÁC SĨ</h5>                      
                        </div>
                        <div class="">
                            <table id="dtMaterialDesignExample" class="table table-striped table-responsive" style="border: 1px solid #01579b;" cellspacing="0" width="100%">
                                <colgroup>
                                    <col width="10" span="1">
                                    <col width="50" span="1">
                                    <col width="100" span="3">
                                    <col width="150" span="2">
                                    <col width="150" span="1">
                                    <col width="50" span="1">
                                    <col width="200" span="1">
                                    <col width="50" span="1">
                                </colgroup>
                                <thead>
                                    <tr class="light-blue darken-4 font-weight-bold" style="color: white;">
                                        <th class="font-weight-bold">ID</th>
                                        <th class="font-weight-bold">Ảnh đại diện</th>
                                        <th class="font-weight-bold">Tên bác sĩ</th>
                                        <th class="font-weight-bold">Username</th>
                                        <!-- <th class="font-weight-bold">Password</th> -->
                                        <th class="font-weight-bold">SĐT</th>
                                        <th class="font-weight-bold">Email</th>
                                        <th class="font-weight-bold">Địa chỉ</th>
                                        <th class="font-weight-bold">Chuyên môn</th>
                                        <th class="font-weight-bold">Kinh nghiệm</th>
                                        <th class="font-weight-bold">Giới thiệu</th>
                                        <th class="font-weight-bold">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $bacsi = "SELECT * FROM bacsi";
                                        $queue_bacsi = mysqli_query($mysqli, $bacsi);
                                        while($row_bs = mysqli_fetch_array($queue_bacsi)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $row_bs['id_bs'] ?></td>
                                                    <td><img src="<?php echo $row_bs['anhdaidien_bs']?>" width="40px" height="40px"></td>
                                                    <td><?php echo $row_bs['hoten_bs'] ?></td>
                                                    <td><?php echo $row_bs['username_bs'] ?></td>                                               
                                                    <td><?php echo $row_bs['sdt_bs'] ?></td>
                                                    <td><?php echo $row_bs['email_bs'] ?></td>
                                                    <td><?php echo $row_bs['diachi_bs'] ?></td>
                                                    <td><?php echo $row_bs['chuyenmon'] ?></td>
                                                    <td><?php echo $row_bs['kinhnghiem'] ?></td>
                                                    <td><?php echo $row_bs['gioithieu'] ?></td>
                                                    <td>
                                                        <a class="badge bg-info canhgiua" style="width: 25px; height: 25px;float: left;"  title="Xem danh sách các ca khám bệnh của bác sĩ"><i class="fas fa-arrow-right"></i></a>
                                                        <a class="badge bg-danger canhgiua" style="width: 25px; height: 25px; float: right;" title="Xóa" onclick="XoaBS(<?php echo $row_bs['id_bs'] ?>)"><i class="far fa-trash-alt"></i></a>
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
<div id="xoabs"></div>
<script>
    function XoaBS(mabs) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("xoabs").innerHTML =(this.responseText); //=>kết quả trả về thêm vào element này, có html vẫn hiện được
        }
      };
      xmlhttp.open("GET", "xoabacsi.php?mabs=" + mabs, true);
      xmlhttp.send();
    }
</script>