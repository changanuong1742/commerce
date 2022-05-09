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
                                <h4 class="card-title">Thêm Trạng Thái </h4>
                                <?php if (isset($statusCheckProductError)){ ?>
                                    <p class="text-danger" style="font-weight: bold"><?= $statusCheckProductError ?></p>
                                <?php } ?>
                                <form class="forms-sample" action="" method="post">

                                    <div class="form-group">
                                        <label for="exampleInputName1">Trạng Thái: </label>
                                        <input type="text" class="form-control" name="statusProduct_name" value="<?= $statusProduct_name ?>" placeholder="Nhập Trạng Thái ...">
                                    </div>


                                    <?php if ($statusProduct_update == true) { ?>
                                        <input type="submit" name="updateStatusProduct" class="btn btn-success btn-block"
                                               value="Xác Nhận Cập Nhật">
                                    <?php } else { ?>
                                        <input type="submit" name="addStatusProduct" class="btn btn-primary btn-block"
                                               value="Thêm">
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Trạng Thải Sản Phẩm</h4>

                                <div class="table-responsive">

                                    <?php     $dataAllStatusProduct = $db->readStatusProduct();
                                    ?>

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>


                                            <th>
                                                Trạng Thái
                                            </th>

                                            <th>
                                                Thao Tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($dataAllStatusProduct as $rowStatusProduct) {
                                            ?>

                                            <tr>

                                                <td class="py-1">
                                                    <?php echo $rowStatusProduct['statusProduct_name'] ?>
                                                </td>



                                                <td>
                                                    <a href="../action/action.php?deleteStatusProduct=<?= $rowStatusProduct['statusProduct_id']; ?>"
                                                       class="btn btn-danger p-2"
                                                       onclick="return confirm('Do you want delete this record?');">Xóa</a>
                                                    <a href="statusProducts.php?editStatusProduct=<?= $rowStatusProduct['statusProduct_id']; ?>"
                                                       class="btn btn-success p-2">Sửa</a></td>
                                            </tr>
                                            <?php
                                        }


                                        ?>

                                        </tbody>
                                    </table>
                                    <?php

                                    ?>

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
