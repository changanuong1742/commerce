<?php
require '../action/action.php';
?>

<?php if (isset($_SESSION['loged']) && isset($_SESSION['admin'])) { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require 'nav.php'?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require 'leftMenu.php'?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


                <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Thành Viên </h4>
                            <?php if (isset($registerStatusError)){ ?>
                                <p class="text-danger" style="font-weight: bold"><?= $registerStatusError ?></p>
                            <?php } ?>
                            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                <input type="text" class="form-control" name="user_id" value="<?= $user_id ?> " hidden>

                                <div class="form-group">
                                    <label for="exampleInputName1">Họ Tên: </label>
                                    <input type="text" class="form-control" name="user_name" value="<?= $user_name ?>" id="exampleInputName1" placeholder="Nhập Họ Tên ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email: </label>
                                    <input type="email" class="form-control" name="user_email" value="<?= $user_email ?>" id="exampleInputEmail3" placeholder="Nhập Email ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Mật Khẩu: </label>
                                    <input type="password" class="form-control" name="user_pass" value="<?= $user_pass ?>" id="exampleInputPassword4" placeholder="Nhập Mật Khẩu ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Giới Tính</label>
                                    <select class="form-control" name="user_gender" value="<?= $user_gender ?>" id="exampleSelectGender">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh Đại Diện:</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="user_avatar" class="form-control file-upload-info" placeholder="Bấm Tải Lên">
                                        <input type="hidden" name="user_avatar_Old" value="<?= $user_avatar; ?>">
                                        <img src="<?= $user_avatar; ?>" width="120" class="img-thumbnail">


                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Địa Chỉ:</label>
                                    <input type="text" class="form-control" name="user_address" value="<?= $user_address ?>" id="exampleInputCity1" placeholder="Nhập Địa Chỉ ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Số Điện Thoại: </label>
                                    <input type="text" class="form-control" name="user_phone" value="<?= $user_phone ?>" id="exampleInputPhone" placeholder="Nhập Địa Chỉ ...">
                                </div>
                                <?php if ($user_update == true) { ?>
                                    <input type="submit" name="updateUser" class="btn btn-success btn-block"
                                           value="Xác Nhận Cập Nhật">
                                <?php } else { ?>
                                    <input type="submit" name="addUser" class="btn btn-primary btn-block"
                                           value="Thêm">
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
                </div>


            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php require 'footer.php' ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/data-table.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
</body>

</html>
<?php } else {
    header("Location: ../client");
}    ?>

