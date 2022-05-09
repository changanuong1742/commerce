<?php
require '../action/action.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../admin/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../admin/images/favicon.png"/>

    <style>

        .profile-head {
            transform: translateY(5rem)
        }

        .cover {
            background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
            background-size: cover;
            background-repeat: no-repeat
        }

        body {
            background: #654ea3;
            background: linear-gradient(to right, #e96443, #904e95);
            min-height: 100vh
        }

    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require '../member/nav.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require '../member/leftMenu.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <?php $rowUser = $db->getUserById($_SESSION['user_id']) ?>

                <div class="row py-12 px-4">
                    <div class="col-md-12 mx-auto">
                        <!-- Profile widget -->
                        <div class="bg-white shadow rounded overflow-hidden">
                            <div class="px-4 pt-0 pb-4 cover">
                                <div class="media align-items-end profile-head">
                                    <div class="profile mr-3"><img src="<?= $rowUser['user_avatar'] ?>" alt="..."
                                                                   width="130" class="rounded mb-2 img-thumbnail">
                                        <button class="btn btn-outline-dark btn-sm btn-block" onclick="myFunction()">Đổi
                                            Thông Tin
                                        </button>
                                    </div>
                                    <div class="media-body mb-5 text-white">
                                        <h4 class="mt-0 mb-0"><?= $_SESSION['user_name'] ?></h4>
                                        <p class="small mb-4"><i
                                                    class="fas fa-map-marker-alt mr-2"></i><?= $_SESSION['user_address'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light p-4 d-flex justify-content-end text-center">

                            </div>
                            <div class="px-4 py-4">
                                <h5 class="mb-0">Thông Tin</h5>
                                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                    <input type="text" class="form-control" name="user_id"
                                           value="<?= $_SESSION['user_id'] ?>" hidden>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user_name"
                                               value="<?= $rowUser['user_name'] ?>" id="user_name" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user_phone"
                                               value="<?= $rowUser['user_phone'] ?>" id="user_phone" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user_email"
                                               value="<?= $rowUser['user_email'] ?>" id="user_email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user_address"
                                               value="<?= $rowUser['user_address'] ?>" id="user_address" disabled>
                                    </div>
                                    <div class="form-group" id="avatar" style="display: none">
                                        <label>Ảnh Đại Diện:</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="user_avatar" class="form-control file-upload-info"
                                                   placeholder="Bấm Tải Lên">
                                            <input type="hidden" name="user_avatar_Old"
                                                   value="<?= $rowUser['user_avatar'] ?>">
                                            <img src="<?= $rowUser['user_avatar'] ?>" width="120" class="img-thumbnail">
                                        </div>
                                    </div>

                                    <button id="changeInfoUser" name="changeInfoUser" style="display: none"
                                            class="btn btn-danger">Đổi Thông Tin
                                    </button>
                                </form>

                            </div>
                            <?php $dataAllCommentByUser = $db->getCommentByUser($_SESSION['user_id']) ?>
                            <div class="py-4 px-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="mb-0">Bình Luận Gần Đây</h5>
                                </div>
                                <div class="row">
                                    <?php
                                    foreach ($dataAllCommentByUser as $rowComment) {
                                        ?>
                                        <div class="col-lg-12 mb-2 pr-lg-1 border border-danger rounded bg-warning">

                                            <p><?= $rowComment['comment_content'] ?></p>
                                            <img src="<?= $rowComment['comment_image'] ?>" height="100">
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="py-4 px-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="mb-0">Ảnh Đã Đăng Gần Đây</h5>
                                </div>
                                <div class="row">
                                    <?php
                                    foreach ($dataAllCommentByUser as $rowComment) {
                                    ?>
                                    <div class="col-lg-6 mb-2 pr-lg-1"><img
                                                src="<?= $rowComment['comment_image'] ?>"
                                                alt="" height="400"></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php require '../admin/footer.php' ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="../admin/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="../admin/vendors/chart.js/Chart.min.js"></script>
<script src="../admin/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../admin/js/off-canvas.js"></script>
<script src="../admin/js/hoverable-collapse.js"></script>
<script src="../admin/js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../admin/js/dashboard.js"></script>
<script src="../admin/js/data-table.js"></script>
<script src="../admin/js/jquery.dataTables.js"></script>
<script src="../admin/js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
</body>

<script>

    function myFunction() {
        var x = document.getElementById("avatar");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

        var user_name = document.getElementById("user_name");

        if (user_name.disabled) {
            user_name.disabled = false;
        } else {
            user_name.disabled = true;
        }

        var user_phone = document.getElementById("user_phone");

        if (user_phone.disabled) {
            user_phone.disabled = false;
        } else {
            user_phone.disabled = true;
        }
        var user_email = document.getElementById("user_email");

        if (user_email.disabled) {
            user_email.disabled = false;
        } else {
            user_email.disabled = true;
        }
        var user_address = document.getElementById("user_address");

        if (user_address.disabled) {
            user_address.disabled = false;
        } else {
            user_address.disabled = true;
        }


        var changeInfoUser = document.getElementById("changeInfoUser");
        if (changeInfoUser.style.display === "none") {
            changeInfoUser.style.display = "block";
        } else {
            changeInfoUser.style.display = "none";
        }

    }

</script>
</html>


