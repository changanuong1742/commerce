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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thành Viên</h4>

                                <div class="table-responsive">

                                    <?php     $dataAllProduct = $db->readProduct();
                                    ?>

                                    <table class="table table-striped">
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
                                                Giá Gốc
                                            </th>
                                            <th>
                                                Giá Đã Giảm
                                            </th>
                                            <th>
                                                Số Lượng
                                            </th>
                                            <th>
                                                Hãng
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
                                        foreach ($dataAllProduct as $rowProduct) {
                                            ?>

                                            <tr>
                                                <td class="py-1">
                                                    <img src="<?php echo $rowProduct['product_image1'] ?>" alt="image">
                                                </td>
                                                <td class="py-1">
                                                    <?php echo $rowProduct['product_id'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowProduct['product_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowProduct['product_price'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowProduct['product_sale'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowProduct['product_amountProduct'] ?>
                                                </td>

                                                <td>
                                                    <?php echo $rowProduct['brand_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowProduct['statusProduct_name'] ?>
                                                </td>

                                                <td><a href="../admin/userDetail.php?detailProduct=<?= $rowProduct['product_id']; ?>"
                                                       class="badge badge-primary p-2">Chi Tiết</a>
                                                    <a href="../action/action.php?deleteProduct=<?= $rowProduct['product_id']; ?>"
                                                       class="badge badge-danger p-2"
                                                       onclick="return confirm('Do you want delete this record?');">Xóa</a>
                                                    <a href="addProduct.php?editProduct=<?= $rowProduct['product_id']; ?>"
                                                       class="badge badge-success p-2">Sửa</a></td>
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