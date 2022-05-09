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
                                <h4 class="card-title">Thêm Sản Phẩm </h4>
                                <?php if (isset($statusCheckProduct)){ ?>
                                    <p class="text-danger" style="font-weight: bold"><?= $statusCheckProduct ?></p>
                                <?php } ?>
                                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                    <input type="text" class="form-control" name="product_id" value="<?= $product_id ?>" hidden>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Tên Sản Phẩm: </label>
                                        <input type="text" class="form-control" name="product_name" value="<?= $product_name ?>" id="exampleInputName1" placeholder="Nhập Tên Sản Phẩm ...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Giá Gốc: </label>
                                        <input type="text" class="form-control" name="product_price" value="<?= $product_price ?>" id="exampleInputName1" placeholder="Nhập Giá Gốc ...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Giá Đã Giảm: </label>
                                        <input type="text" class="form-control" name="product_sale" value="<?= $product_sale ?>" id="exampleInputName1" placeholder="Nhập Giá Đã Giảm ...">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Mô Tả Ngắn: </label>
                                        <textarea type="text" class="form-control" name="product_describe" id="product_describe" placeholder="Nhập Mô Tả Ngắn ..."><?= $product_describe; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Số Lượng : </label>
                                        <input type="text" class="form-control" name="product_amountProduct" value="<?= $product_amountProduct ?>" id="exampleInputName1" placeholder="Nhập Số Lượng ...">
                                    </div>





                                    <?php     $dataAllBrand = $db->readBrand();
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Hãng: </label>
                                        <select class="form-control" name="brand_id" id="exampleSelectGender">
                                            <?php
                                            foreach ($dataAllBrand as $rowBrand) {
                                            ?>
                                            <option value="<?= $rowBrand['brand_id'] ?>"><?php echo $rowBrand['brand_name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <?php     $dataAllStatusProduct = $db->readStatusProduct();
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Trạng Thái Sản Phẩm: </label>
                                        <select class="form-control" name="statusProduct_id" id="exampleSelectGender">
                                            <?php
                                            foreach ($dataAllStatusProduct as $rowStatusProduct) {
                                                ?>
                                                <option value="<?= $rowStatusProduct['statusProduct_id'] ?>"><?php echo $rowStatusProduct['statusProduct_name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh 1:</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="product_image1" class="form-control file-upload-info" placeholder="Bấm Tải Lên">
                                            <input type="hidden" name="product_image1_Old" value="<?= $product_image1; ?>">
                                            <img src="<?= $product_image1; ?>" width="120" class="img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh 2:</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="product_image2" class="form-control file-upload-info" placeholder="Bấm Tải Lên">
                                            <input type="hidden" name="product_image2_Old" value="<?= $product_image2; ?>">
                                            <img src="<?= $product_image2; ?>" width="120" class="img-thumbnail">
                                        </div>
                                    </div>        <div class="form-group">
                                        <label>Ảnh 3:</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="product_image3" class="form-control file-upload-info" placeholder="Bấm Tải Lên">
                                            <input type="hidden" name="product_image3_Old" value="<?= $product_image3; ?>">
                                            <img src="<?= $product_image3; ?>" width="120" class="img-thumbnail">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputName1">Chi Tiết Sản Phẩm: </label>
                                        <textarea type="text" class="form-control" name="product_detail" id="product_detail" placeholder="Nhập Nội Dung ..."><?= $product_detail; ?></textarea>
                                    </div>
                                    <?php if ($product_update == true) { ?>
                                        <input type="submit" name="updateProduct" class="btn btn-success btn-block"
                                               value="Xác Nhận Cập Nhật">
                                    <?php } else { ?>
                                        <input type="submit" name="addProduct" class="btn btn-primary btn-block"
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
<script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('product_detail', {
            width: "1165px",
            height: "300px"
        }
    );</script>
<script type="text/javascript">
    CKEDITOR.replace('product_describe', {
            width: "1165px",
            height: "200px"
        }
    );</script>
</html>

<?php } else {
header("Location: ../client");
}    ?>
