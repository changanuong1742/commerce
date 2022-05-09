<?php
require '../action/action.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>E-SHOP HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- HEADER -->
<?php require './nav.php' ?>
<!-- /HEADER -->

<!-- NAVIGATION -->
<?php require './navProductDetail.php' ?>
<!-- /NAVIGATION -->

<form action="" method="post">

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Shop by:</h3>
                    <ul class="filter-list">

                        <?php
                        if (isset($_SESSION['searchProductValue'])){ ?>
                                <li><a href="?deleteKeyWord"
                                       style="color:#FFF; background-color:#8A2454;">Từ khóa: <?= $_SESSION['searchProductValue'] ?></a></li>
                                <?php
                            } ?>

                        <?php
                        if (isset($_POST['tick_memoryProductFliter'])){

                            foreach ($_POST['tick_memoryProductFliter'] as $memoryProductFliter) {
                                ?>
                                <li><a href="#"
                                       style="color:#FFF; background-color:#8A2454;">Dung lượng: <?= $memoryProductFliter ?></a></li>
                                <?php
                            }} ?>

                        <?php
                        if (isset($_POST['tick_colorProductFliter'])){

                            foreach ($_POST['tick_colorProductFliter'] as $colorProductFliter) {
                                ?>
                                <li><a href="#" style="color:#FFF; background-color:#8A2454;">Màu: <?= $colorProductFliter ?></a>
                                </li>
                                <?php
                            }} ?>

                        <?php
                        if (isset($_POST['tick_BrandProductFliter'])){

                            foreach ($_POST['tick_BrandProductFliter'] as $brandProductFliter) {
                                ?>
                                <li><a href="#" style="color:#FFF; background-color:#8A2454;">Hãng: <?= $brandProductFliter ?></a>
                                </li>
                                <?php
                            }} ?>
                        <?php
                        if (isset($_POST['tick_statusProductFliter'])){
                            foreach ($_POST['tick_statusProductFliter'] as $statusProductFliter) {
                                ?>
                                <li><a href="#" style="color:#FFF; background-color:#8A2454;">Trạng thái: <?= $statusProductFliter ?></a>
                                </li>
                                <?php
                            }} ?>

                        <?php if (empty($_POST['price_min']) != ' ') { ?>
                            <li><a href="#" style="color:#FFF; background-color:#8A2454;">Giá từ <?= $_POST['price_min'] ?></a>
                            </li>
                        <?php } ?>

                        <?php if (empty($_POST['price_max']) != ' ') { ?>

                            <li><a href="#" style="color:#FFF; background-color:#8A2454;">Đến <?= $_POST['price_max'] ?></a>
                            </li>
                        <?php } ?>

                    </ul>
                    <?php if (isset($_POST['find'])) { ?>
                            <form method="post" action="">
                    <button class="primary-btn" name="deleteOptionFilter">Xóa Tùy Chọn</button>
                            </form>
                    <?php } ?>

                </div>
                <!-- /aside widget -->
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Lọc Theo giá</h3>
                        <div class="qty-input">
                            <strong class="text-uppercase text-danger">GIÁ TỪ : </strong>
                            <input class="input" type="number" name="price_min">
                        </div>
                        <div class="qty-input">
                            <strong class="text-uppercase text-danger">ĐẾN: </strong>
                            <input class="input" type="number" name="price_max">
                        </div>
                    </div>


                    <!-- aside widget -->

                    <!-- aside widget -->

                    <div class="aside">
                        <?php $dataAllBrand = $db->readBrand();
                        ?>
                        <h3 class="aside-title">Lọc Theo Hãng:</h3>
                        <ul class="list-links">
                            <?php
                            foreach ($dataAllBrand as $rowBrand) {
                                ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           value="<?= $rowBrand['brand_name'] ?>" name="tick_BrandProductFliter[]"
                                           id="colorProductFliter<?= $rowBrand['brand_id'] ?>">
                                    <label class="custom-control-label"
                                           for="colorProductFliter<?= $rowBrand['brand_id'] ?>"><?= $rowBrand['brand_name'] ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- /aside widget -->


                    <!-- aside widget -->
                    <div class="aside">
                        <?php $dataAllColorProduct = $db->readColorProductFilter();
                        ?>
                        <h3 class="aside-title">Lọc Theo Màu Sắc:</h3>
                        <ul class="size-option">
                            <?php
                            foreach ($dataAllColorProduct as $rowColorProduct) {
                                ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           value="<?= $rowColorProduct['colorProduct_name'] ?>"
                                           name="tick_colorProductFliter[]"
                                           id="colorProductFliter<?= $rowColorProduct['colorProduct_name'] ?>">
                                    <label class="custom-control-label"
                                           for="colorProductFliter<?= $rowColorProduct['colorProduct_name'] ?>"><?= $rowColorProduct['colorProduct_name'] ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <div class="aside">
                        <?php $dataAllMemoryProduct = $db->readMemoryProductFilter();
                        ?>
                        <h3 class="aside-title">Lọc Theo Dung Lượng:</h3>
                        <ul class="size-option">
                            <?php
                            foreach ($dataAllMemoryProduct as $rowMemoryProduct) {
                                ?>
                                <div class="custom-control custom-checkbox">

                                    <input type="checkbox" class="custom-control-input"
                                           id="memoryProductFliter<?= $rowMemoryProduct['memoryProduct_name'] ?>"
                                           value="<?= $rowMemoryProduct['memoryProduct_name'] ?>"
                                           name="tick_memoryProductFliter[]">
                                    <label class="custom-control-label"
                                           for="memoryProductFliter<?= $rowMemoryProduct['memoryProduct_name'] ?>"><?= $rowMemoryProduct['memoryProduct_name'] ?></label>
                                </div>
                                <?php
                            }
                            ?>
                            <!-- aside widget -->
                            <div class="aside">
                                <?php $dataAllStatusProduct = $db->readStatusProduct();
                                ?>
                                <h3 class="aside-title">Lọc Theo Trạng Thái:</h3>
                                <ul class="size-option">
                                    <?php
                                    foreach ($dataAllStatusProduct as $rowStatusProduct) {
                                        ?>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   value="<?= $rowStatusProduct['statusProduct_name'] ?>"
                                                   name="tick_statusProductFliter[]"
                                                   id="statusProductFliter<?= $rowStatusProduct['statusProduct_name'] ?>">
                                            <label class="custom-control-label"
                                                   for="statusProductFliter<?= $rowStatusProduct['statusProduct_name'] ?>"><?= $rowStatusProduct['statusProduct_name'] ?></label>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- /aside widget -->

                            <button class="primary-btn add-to-cart" name="find"><i class="fa fa-search"></i> Lọc Sản
                                Phẩm


                        </ul>
                    </div>
                    <!-- /aside widget -->



                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">TOP Sản Phẩm Xem Nhiều</h3>
                    <?php $dataRateProduct = $db->readRateProduct();
                    ?>
                    <?php
                    foreach ($dataRateProduct as $rowRateProduct) {
                        ?>
                        <!-- widget product -->
                        <div class="product product-widget">
                            <div class="product-thumb">
                                <img src="<?= $rowRateProduct['product_image1'] ?>" alt="">
                            </div>
                            <div class="product-body">
                                <h2 class="product-name"><a
                                            href="../client/productDetail.php?productDetail=<?= $rowRateProduct['product_id']; ?>"><?= $rowRateProduct['product_name'] ?></a>
                                </h2>
                                <h3 class="product-price"><?= number_format($rowRateProduct['product_sale']) ?>
                                    <del class="product-old-price"><?= number_format($rowRateProduct['product_price']) ?></del>
                                </h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                    <!-- /widget product -->

                </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="pull-left">
                        <div class="row-filter">
                            <a href="#"><i class="fa fa-th-large"></i></a>
                            <a href="#" class="active"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="sort-filter">
                            <span class="text-uppercase">Sắp Xếp:</span>
                            <select class="input" name="sort">
                                <option value="order by product_sale asc" >Giá Tăng Dần</option>
                                <option value="order by product_sale desc">Giá Dảm Dần</option>
                            </select>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="page-filter">

                        </div>
                        <ul class="store-pages">
                            <?php $db->page(); ?>

                        </ul>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">


                    <!-- row -->


                    <div class="row">
                        <!-- Product Single -->
                        <?php if (isset($_POST['find']) || isset($_SESSION['searchProductValue'])) { ?>
                      <?php
                            $dataAllFindProduct = $db->readFliter();
                            foreach ($dataAllFindProduct as $rowFindProduct) {
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
                                            <div class="product-label">
                                                <span><?= $rowFindProduct['statusProduct_name'] ?></span>
                                                <span class="sale"><?= $rowFindProduct['brand_name'] ?></span>
                                            </div>

                                            <img src="<?= $rowFindProduct['product_image1'] ?>" alt="" height="230">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price"><?= number_format($rowFindProduct['product_sale']) ?>
                                                <del class="product-old-price"><?= number_format($rowFindProduct['product_price']) ?></del>
                                            </h3>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o empty"></i>
                                            </div>
                                            <h2 class="product-name" style="height: 50px"><a
                                                        href="../client/productDetail.php?productDetail=<?= $rowFindProduct['product_id']; ?>"><?= $rowFindProduct['product_name'] ?></a>
                                            </h2>

                                            <div class="product-btns">
                                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                                <a href="../client/productDetail.php?productDetail=<?= $rowFindProduct['product_id']; ?>"
                                                   class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
                                                    Mua
                                                    Sản Phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                        <?php $dataAllSearchProductFliter = $db->readSearchProductFliter();
                        ?>
                        <?php
                        foreach ($dataAllSearchProductFliter as $rowSearchProductFliter) {
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span><?= $rowSearchProductFliter['statusProduct_name'] ?></span>
                                        <span class="sale"><?= $rowSearchProductFliter['brand_name'] ?></span>
                                    </div>

                                    <img src="<?= $rowSearchProductFliter['product_image1'] ?>" alt="" height="230">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price"><?= number_format($rowSearchProductFliter['product_sale']) ?>
                                        <del class="product-old-price"><?= number_format($rowSearchProductFliter['product_price']) ?></del>
                                    </h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name" style="height: 50px"><a
                                                href="../client/productDetail.php?productDetail=<?= $rowSearchProductFliter['product_id']; ?>"><?= $rowSearchProductFliter['product_name'] ?></a>
                                    </h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <a href="../client/productDetail.php?productDetail=<?= $rowSearchProductFliter['product_id']; ?>"
                                           class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Mua
                                            Sản Phẩm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        ?>

                    </div>

                        <!-- /Product Single -->
                    <!-- /row -->
                </div>
                <!-- /STORE -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <div class="pull-right">
                        <div class="page-filter">

                        </div>
                        <ul class="store-pages">
                            <?php $db->page(); ?>

                        </ul>
                    </div>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
</form>

<!-- FOOTER -->
<?php require './footer.php' ?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>

</body>

</html>
