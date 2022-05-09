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
                                <?php $rowColorProduct = $db->getProduct($_GET['detailColorProduct']) ?>
                                <h4 class="card-title">Màu Sắc Của Sản Phẩm: <?= $rowColorProduct['product_name'] ?> </h4>
                                <?php if (isset($statusColorProduct)){ ?>
                                    <p class="text-danger" style="font-weight: bold"><?= $statusColorProduct ?></p>
                                <?php } ?>
                                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                    <input type="text" class="form-control" name="product_id" value="<?= $product_id ?>" id="exampleInputName1" placeholder="Nhập Họ Tên ..." hidden>
                                    <input type="text" class="form-control" name="colorProduct_id" value="<?= $colorProduct_id ?>" id="exampleInputName1" placeholder="Nhập Họ Tên ..." hidden>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Tên Màu: </label>
                                        <input type="text" class="form-control" name="colorProduct_name" value="<?= $colorProduct_name ?>" id="exampleInputName1" placeholder="Nhập Tên Màu ...">
                                    </div>


                                    <?php     $dataAllProduct = $db->readColorProduct();
                                    ?>



                                    <div class="form-group">
                                        <label>Ảnh Màu:</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="colorProduct_image" class="form-control file-upload-info" placeholder="Bấm Tải Lên">
                                            <input type="hidden" name="colorProduct_image_Old" value="<?= $colorProduct_image; ?>">
                                            <img src="<?= $colorProduct_image; ?>" width="120" class="img-thumbnail">


                                        </div>
                                    </div>

                                    <?php if ($colorProduct_update == true) { ?>
                                        <input type="submit" name="updateColorProductDetail" class="btn btn-success btn-block"
                                               value="Xác Nhận Cập Nhật">
                                    <?php } else { ?>
                                        <input type="submit" name="addColorProductDetail" class="btn btn-primary btn-block"
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
                                <h4 class="card-title">Màu</h4>

                                <div class="table-responsive">

                                    <?php     $dataAllColorProduct = $db->getColorProduct($product_id);
                                    ?>

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>



                                            <th>
                                                Ảnh Màu
                                            </th>
                                            <th>
                                                Tên Màu
                                            </th>

                                            <th>
                                                Thao Tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($dataAllColorProduct as $rowColorProduct) {
                                            ?>

                                            <tr>


                                                <td class="py-1">
                                                    <img src="<?php echo $rowColorProduct['colorProduct_image'] ?>" alt="image">
                                                </td>

                                                <td class="py-1">
                                                    <?php echo $rowColorProduct['colorProduct_name'] ?>
                                                </td>



                                                <td>
                                                    <form action="" method="post">
                                                        <input name="colorProduct_id" value="<?= $rowColorProduct['colorProduct_id']; ?>" hidden>
                                                    <button name="deleteColorProductById"
                                                       class="btn btn-danger p-2"
                                                       onclick="return confirm('Do you want delete this record?');">Xóa</button>
                                                    <button name="editColorProductById"
                                                       class="btn btn-success p-2">Sửa</button>
                                                    </form>
                                                </td>
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

