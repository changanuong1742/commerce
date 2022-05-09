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
    <?php require '../admin/nav.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require '../admin/leftMenu.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


                <div class="row py-12 px-4">
                    <div class="col-md-12 mx-auto">
                        <!-- Profile widget -->
                        <div class="bg-white shadow rounded overflow-hidden">
                            <div class="px-4 pt-0 pb-4 cover">
                                <div class="media align-items-end profile-head">
                                    <div class="profile mr-3"><img src="<?= $row['user_avatar'] ?>" alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a></div>
                                    <div class="media-body mb-5 text-white">
                                        <h4 class="mt-0 mb-0"><?= $row['user_name'] ?></h4>
                                        <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i><?= $row['user_address'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light p-4 d-flex justify-content-end text-center">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">215</h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>Photos</small>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Followers</small>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="mb-0">Thông Tin</h5>
                                <div class="p-4 rounded shadow-sm bg-light">
                                    <p class="font-italic mb-0">Số Điện Thoại: <?= $row['user_phone'] ?></p>
                                    <p class="font-italic mb-0">Email: <?= $row['user_email'] ?></p>
                                    <p class="font-italic mb-0">Giới Tính: <?= $row['user_gender'] ?></p>
                                </div>
                            </div>
                            <div class="py-4 px-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                                    <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                                    <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                                    <div class="col-lg-6 pl-lg-1"><img src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
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

</html>


