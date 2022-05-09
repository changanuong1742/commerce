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
                                <?php $rowProduct = $db->getProduct($_GET['detailMemoryProduct']) ?>
                                <h4 class="card-title">Dung Lượng Của Sản Phẩm: <?= $rowProduct['product_name'] ?>  </h4>
                                <?php if (isset($statusCheckMemoryProduct)){ ?>
                                    <p class="text-danger" style="font-weight: bold"><?= $statusCheckMemoryProduct ?></p>
                                <?php } ?>
                                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                    <input type="text" class="form-control" name="product_id" value="<?= $product_id ?>" id="exampleInputName1" placeholder="Nhập Họ Tên ..." hidden>
                                    <input type="text" class="form-control" name="memoryProduct_id" value="<?= $memoryProduct_id ?>" id="exampleInputName1" placeholder="Nhập Họ Tên ..." hidden>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Dung Lượng: </label>
                                        <input type="text" class="form-control" name="memoryProduct_name" value="<?= $memoryProduct_name ?>" id="exampleInputName1" placeholder="Nhập Dung Lượng ...">
                                    </div>


                                    <?php     $dataAllProduct = $db->readColorProduct();
                                    ?>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Giá Dung Lượng: </label>
                                        <input type="text" class="form-control" name="memoryProduct_price" value="<?= $memoryProduct_price ?>" id="exampleInputName1" placeholder="Nhập Giá Dung Lượng ...">
                                    </div>



                                    <?php if ($memoryProduct_update == true) { ?>
                                        <input type="submit" name="updateMemoryProductDetail" class="btn btn-success btn-block"
                                               value="Xác Nhận Cập Nhật">
                                    <?php } else { ?>
                                        <input type="submit" name="addMemoryProductDetail" class="btn btn-primary btn-block"
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

                                    <?php     $dataAllMemoryProduct = $db->getMemoryProduct($product_id);
                                    ?>

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>



                                            <th>
                                                Dung Lượng
                                            </th>
                                            <th>
                                               Giá Dung lượng
                                            </th>

                                            <th>
                                                Thao Tác
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($dataAllMemoryProduct as $rowMemoryProduct) {
                                            ?>

                                            <tr>


                                                <td class="py-1">
                                                    <?php echo $rowMemoryProduct['memoryProduct_name'] ?>
                                                </td>

                                                <td class="py-1">
                                                    <?php echo $rowMemoryProduct['memoryProduct_price'] ?>
                                                </td>


                                                <td>
                                                    <form action="" method="post">
                                                    <input name="memoryProduct_id" value="<?= $rowMemoryProduct['memoryProduct_id']; ?>" hidden>
                                                    <button
                                                       class="btn btn-danger p-2"
                                                       onclick="return confirm('Do you want delete this record?');" name="deleteMemoryProductDetail">Xóa</button>
                                                    <button class="btn btn-success p-2" name="editMemoryProductDetail">Sửa</button></td>
                                                </form>
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
