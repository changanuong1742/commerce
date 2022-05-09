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
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

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
<?php require './slider.php' ?>
<!-- /NAVIGATION -->

<!-- HOME -->

<!-- /HOME -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php     $dataAllBrand = $db->readBrand();
            ?>

            <!-- banner -->
            <?php
            foreach ($dataAllBrand as $rowBrand) {
                ?>
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="../client/store.php?brand=<?= $rowBrand['brand_id'] ?>">
                    <img src="<?= $rowBrand['brand_image'] ?>" height="277"  alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color"><?= $rowBrand['brand_name'] ?></h2>
                    </div>
                </a>
            </div>
                <?php
            }
            ?>
            <!-- /banner -->



        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->

        <?php     $dataAllBrand = $db->readBrand();
        ?>


<!-- /section -->

<!-- section -->

<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->

        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">ĐANG GIẢM GIÁ</h2>
                </div>
            </div>
            <!-- section title -->
            <!-- Product Single -->
            <?php     $dataSellProduct = $db->readSellProduct();
            ?>
            <?php
            foreach ($dataSellProduct as $rowSellProduct) {
                ?>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span class="sale"><?= $rowSellProduct['statusProduct_name'] ?></span>
                        </div>
                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                        <img src="<?= $rowSellProduct['product_image1'] ?>" alt="" height="230">
                    </div>
                    <div class="product-body">
                        <h4 class="product-price"><?= number_format($rowSellProduct['product_sale']) ?>
                            <del class="product-old-price"><?= number_format($rowSellProduct['product_price']) ?></del>
                        </h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="../client/productDetail.php?productDetail=<?= $rowSellProduct['product_id']; ?>"><?= $rowSellProduct['product_name'] ?></a></h2>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <a href="../client/productDetail.php?productDetail=<?= $rowSellProduct['product_id']; ?>"
                               class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Mua Sản Phẩm</a>                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->
                <?php
            }
            ?>
    </div>


        <div class="row">
            <!-- section title -->
            <?php     $dataAllStatusProduct = $db->readStatusProduct();
            ?>

            <div class="col-md-12">

                <div class="section-title">
                    <h2 class="title">MỚI VỀ</h2>
                </div>
            </div>

            <!-- section title -->
            <!-- Product Single -->
            <?php     $dataNewProduct = $db->readNewProduct();
            ?>
            <?php
            foreach ($dataNewProduct as $rowNewProduct) {
                ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span><?= $rowNewProduct['statusProduct_name'] ?></span>
                            </div>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="<?= $rowNewProduct['product_image1'] ?>" alt="" height="230">
                        </div>
                        <div class="product-body">
                            <h4 class="product-price"><?= number_format($rowNewProduct['product_sale']) ?>
                                <del class="product-old-price"><?= number_format(($rowNewProduct['product_price'])) ?></del>
                            </h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="../client/productDetail.php?productDetail=<?= $rowNewProduct['product_id']; ?>"><?= $rowNewProduct['product_name'] ?></a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <a href="../client/productDetail.php?productDetail=<?= $rowNewProduct['product_id']; ?>"
                                   class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Mua Sản Phẩm</a>                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
                <?php
            }
            ?>
        </div>


        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">SẢN PHẨM XEM NHIỀU NHẤT</h2>
                </div>
            </div>
            <!-- section title -->
            <!-- Product Single -->
            <?php     $dataRateProduct = $db->readRateProduct();
            ?>
            <?php
            foreach ($dataRateProduct as $rowRateProduct) {
                ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span class="sale">Yêu Thích</span>
                            </div>
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="<?= $rowRateProduct['product_image1'] ?>" alt="" height="230">
                        </div>
                        <div class="product-body">
                            <h4 class="product-price"><?= number_format($rowRateProduct['product_sale']) ?>
                                <del class="product-old-price"><?= number_format($rowRateProduct['product_price']) ?></del>
                            </h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="../client/productDetail.php?productDetail=<?= $rowRateProduct['product_id']; ?>"><?= $rowRateProduct['product_name'] ?></a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <a href="../client/productDetail.php?productDetail=<?= $rowRateProduct['product_id']; ?>"
                                   class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Mua Sản Phẩm</a>                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
                <?php
            }
            ?>
        </div>


    <!-- /container -->
</div>
<!-- /section -->

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

