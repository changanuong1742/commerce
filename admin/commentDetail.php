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
    <link rel="shortcut icon" href="images/favicon.png"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require 'nav.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require 'leftMenu.php' ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


                <?php $dataAllCommentByProduct = $db->getCommentByProduct($_GET['detailCommentByProduct']);
                $rowProduct = $db->getProduct($_GET['detailCommentByProduct'])

                ?>

                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?= $rowProduct['product_name'] ?></h4>

                                <div class="table-responsive">


                                    <table class="table table-striped">
                                        <thead>
                                        <tr>

                                            <th>
                                                Ảnh Sản Phẩm
                                            </th>
                                            <th>
                                                ID User
                                            </th>
                                            <th>
                                                Họ Tên
                                            </th>
                                            <th>
                                                Số Điện Thoại
                                            </th>
                                            <th>
                                                Nội dung Bình Luận
                                            </th>
                                            <th>
                                                Thao Tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($dataAllCommentByProduct as $rowCommentByProduct) {
                                            ?>

                                            <tr>
                                                <td class="py-1">
                                                    <img src="<?php echo $rowProduct['product_image1'] ?>" alt="image">
                                                </td>
                                                <td class="py-1">
                                                    <?php echo $rowCommentByProduct['user_id'] ?>
                                                </td>
                                                <?php $rowUser = $db->getUserById($rowCommentByProduct['user_id']) ?>

                                                <td>
                                                    <?php echo $rowUser['user_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowUser['user_phone'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowCommentByProduct['comment_content'] ?>
                                                </td>


                                                <td>
                                                    <form action="" method="post">
                                                        <input name="comment_id"
                                                               value="<?= $rowCommentByProduct['comment_id'] ?>" hidden>
                                                        <button
                                                                class="btn btn-danger p-2" name="deleteCommentById"
                                                                onclick="return confirm('Do you want delete this record?');">
                                                            Xóa
                                                        </button>
                                                    </form>
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
<script>
    $(document).ready(function () {

        $('.table').dataTable({});
    });
</script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
</body>

</html>
<?php } else {
    header("Location: ../client");
}    ?>

