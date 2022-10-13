<?php
    if(!$_SESSION['admin']) {
        header("location:../index.php");
    }
?>
<div class="container-fluid" >

    <!-- Section: Edit Account -->
    <section class="section">
        <!-- First row -->
        <div class="row">
        <!-- First column -->
        <div class="col-lg-4 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header mdb-color blue">
                <h5 class="mb-0 font-weight-bold">ẢNH ĐẠI DIỆN</h5>
            </div>
            <!-- Card image -->

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">
                <img src="../img/AnhDaiDien/pngtree-flat-default-avatar-png-image_2848906.jpg" alt="User Photo" class="z-depth-1 mb-3 mx-auto" width="120px" />
                
                <div class="row flex-center">
                <button class="btn btn-info btn-rounded btn-sm">Cập nhật ảnh đại diện</button><br>
                </div>
            </div>
            <!-- Card content -->
            <script>
                    var loadFile_1 = function(event) {
                        var review_1 = document.getElementById('review_1');
                        review_1.src = URL.createObjectURL(event.target.files[0]);
                        review_1.onload = function() {
                            URL.revokeObjectURL(review_1.src) // free memory
                        }
                    };
                </script>

            </div>
            <!-- Card -->

        </div>
        <!-- First column -->

        <!-- Second column -->
        <div class="col-lg-8 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header mdb-color blue">
                <h5 class="mb-0 font-weight-bold">THÔNG TIN CÁ NHÂN</h5>
            </div>
            <!-- Card image -->

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="POST" action="./action-thembacsi.php">
                <!-- First row -->

                <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" name="unamebs" id="unamebs" class="form-control validate" value="<?php
                            $id_bs = "SELECT MAX(id_bs) id_max FROM bacsi";
                            $query_id_bs = mysqli_query($mysqli, $id_bs);
                            $row_id_bs = mysqli_fetch_array($query_id_bs);
                            $id_bs_new = $row_id_bs['id_max'] + 1;
                            if($row_id_bs['id_max'] < 10) {
                               echo "bacsi0$id_bs_new";
                            }
                            else {
                                echo "bacsi$id_bs_new";
                            }
                        ?>" readonly disabled>
                        <label for="unamebs" data-error="wrong" data-success="right">Tên đăng nhập</label>
                    </div>
                    </div>
                    <!-- Second column -->
                    <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" name="passwdbs" id="passwdbs" class="form-control validate" value="<?php
                            if($row_id_bs['id_max'] < 10) {
                                echo "bacsi0$id_bs_new";
                             }
                             else {
                                 echo "bacsi$id_bs_new";
                             }
                        ?>" readonly disabled>
                        <label for="passwdbs" data-error="wrong" data-success="right">Mật khẩu</label>
                    </div>
                    </div>
                </div>
                <!-- First row -->

                <!-- First row -->
                <div class="row">
                    <!-- First column -->
                    <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" name="hotenbs" id="hotenbs" class="form-control validate" required>
                        <label for="hotenbs" data-error="wrong" data-success="right">Họ tên bac si</label>
                    </div>
                    </div>

                    <!-- Second column -->
                    <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="email" name="emailbs" id="emailbs" class="form-control validate">
                        <label for="emailbs" data-error="wrong" data-success="right">Email</label>
                    </div>
                    </div>
                </div>
                <!-- First row -->

                <!-- Second row -->
                <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" name="sdtbs" id="sdtbs" class="form-control validate">
                        <label for="sdtbs">Số điện thoại</label>
                    </div>
                    </div>
                    <!-- Second column -->

                    <div class="col-md-3">
                    <div class="md-form mb-0">
                        <input type="text" name="tuoibs" id="tuoibs" class="form-control validate">
                        <label for="tuoibs" data-error="wrong" data-success="right">Năm sinh</label>
                    </div>
                    </div>
                    <div class="col-md-3 ">
                    </div>

                    

                    

                </div>
                <!-- Second row -->

                <div class="row">
                    <div class="col-md-6">
                    <div class="md-form mb-5">
                        <textarea type="text" name="gioithieu" id="gioithieu" class="md-textarea form-control"></textarea>
                        <label for="gioithieu">Giới thiệu</label>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                        <div class="md-form">
                            <p class="form-control mb-0 ml-0" style="border: 0">Giới tính:</p>
                        </div>
                        </div> 
                        <div class="col-md-6 mb-0">
                        <div class="md-form mb-0 ml-0 form-group">
                            <input class="form-check-input" type="radio" id="nam" name="gioitinhbs" value="Nam">
                            <label for="nam" class="form-check-label">Nam</label>
                            <input class="form-check-input" type="radio" id="nu" name="gioitinhbs" value="Nu">
                            <label for="nu" class="form-check-label">Nữ</label>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" name="chuyenmon" id="chuyenmon" class="form-control validate">
                        <label for="chuyenmon">Chuyên môn</label>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" name="kinhnghiem" id="kinhnghiem" class="form-control validate">
                            <label for="kinhnghiem">Kinh nghiệm</label>
                        </div>
                    </div>
                </div>

                <!-- Third row -->
                <div class="row">

                    <!-- First column -->
                    <div class="col-md-12">
                    <div class="md-form mb-0">
                        <textarea type="text" name="diachibs" id="diachibs" class="md-textarea form-control" rows="3"></textarea>
                        <label for="diachibs">Địa chỉ</label>
                    </div>
                    </div>
                </div>
                <!-- Third row -->

                <!-- Fourth row -->
                <div class="row">
                    <div class="col-md-12 text-center my-4">
                    <input type="submit" name="registerbs" id="registerbs" value="TẠO TÀI KHOẢN" class="btn btn-info btn-rounded">
                    </div>
                </div>
                <!-- Fourth row -->

                </form>
                <!-- Edit Form -->

            </div>
            <!-- Card content -->

            </div>
            <!-- Card -->

        </div>
        <!-- Second column -->

        </div>
        <!-- First row -->

    </section>
    <!-- Section: Edit Account -->

</div>
