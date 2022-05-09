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



                <?php if ($brand_update == true) { ?>

                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thêm Hãng </h4>

                                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputName1">Tên Hãng: </label>
                                        <input type="text" class="form-control" name="brand_name" value="<?= $brand_name ?>" id="exampleInputName1" placeholder="Nhập Tên Hãng ...">
                                    </div>

                                    <div class="form-group">
                                        <label>Ảnh Hãng:</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="brand_image" class="form-control file-upload-info" placeholder="Bấm Tải Lên">
                                            <input type="hidden" name="brand_image_Old" value="<?= $brand_image; ?>">
                                            <img src="<?= $brand_image; ?>" width="120" class="img-thumbnail">


                                        </div>
                                    </div>

                                        <input type="submit" name="updateBrand" class="btn btn-success btn-block"
                                               value="Xác Nhận Cập Nhật">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>


                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Đơn Hàng</h4>

                                <div class="table-responsive">

                                    <?php     $dataAllOrder = $db->readOrder();
                                    ?>

                                    <table class="table table-striped" id="dataTable">
                                        <thead>
                                        <tr>

                                            <th>
                                                Ảnh Sản Phẩm
                                            </th>
                                            <th>
                                                ID Sản Phẩm
                                            </th>
                                            <th>
                                                Tên Sản Phẩm
                                            </th>
                                            <th>
                                                Tên Khách hàng
                                            </th>
                                            <th>
                                                Số Điện Thoại
                                            </th>
                                            <th>
                                                Địa Chỉ
                                            </th>
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
                                        foreach ($dataAllOrder as $rowOrder) {
                                            ?>
                                            <?php $rowProduct = $db->getProduct($rowOrder['product_id'])?>
                                            <?php $rowUser = $db->getUserById($rowOrder['user_id'])?>

                                            <tr>
                                                <td class="py-1">
                                                    <img src="<?php echo $rowProduct['product_image1'] ?>" alt="image"
                                                </td>
                                                <td class="py-1">
                                                    <?php echo $rowProduct['product_id'] ?>
                                                </td>
                                                <td class="py-1">
                                                    <?php echo $rowProduct['product_name'] ?>
                                                </td>
                                                <td class="py-1">
                                                    <?php echo $rowUser['user_name'] ?>
                                                </td>
                                                <td class="py-1">
                                                    <?php echo $rowUser['user_phone'] ?>
                                                </td>
                                                <td class="py-1">
                                                    <?php echo $rowUser['user_address'] ?>
                                                </td>
                                                <?php if ($rowOrder['order_orderStatus'] == "Đang Chờ Duyệt"){ ?>
                                                <td class="py-1">
                                                  <a class="badge badge-warning">  <?php echo $rowOrder['order_orderStatus'] ?></a>
                                                </td>
                                                <?php } else { ?>
                                                <td class="py-1">
                                                    <a class="badge badge-success">  <?php echo $rowOrder['order_orderStatus'] ?></a>
                                                </td>
                                                <?php } ?>
                                                <td>
                                                    <form action="" method="post">
                                                        <input name="order_id" value="<?= $rowOrder['order_id']; ?>" hidden>
                                                    <button href="../action/action.php?deleteBrand=<?= $rowOrder['order_id']; ?>"
                                                       class="btn btn-danger p-2" name="deleteOrderById"
                                                       onclick="return confirm('Do you want delete this record?');">Xóa</button>
                                                    <button href="brands.php?editBrand=<?= $rowOrder['order_id']; ?>" name="updateOrderById"
                                                       class="btn btn-success p-2">Duyệt</button>
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
