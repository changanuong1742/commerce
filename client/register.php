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


<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside widget -->

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

                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">


                    <!-- row -->


                    <div class="row">
                        <!-- Product Single -->
                        <h2 class="text-center text-danger">ĐĂNG KÝ</h2>
                        <?php if (isset($registerStatusError)){ ?>
                            <p class="text-danger" style="font-weight: bold"><?= $registerStatusError ?></p>
                        <?php } ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Tên:</label>
                                <input type="text" class="form-control" name="user_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Họ Tên...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="user_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật Khẩu:</label>
                                <input type="password" class="form-control" name="user_pass" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Mật Khẩu...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập Lại Mật Khẩu</label>
                                <input type="password" class="form-control" name="user_repass" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <label>Giới Tính</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_gender" id="exampleRadios1" value="Nam" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_gender" id="exampleRadios2" value="Nữ" checked>
                                <label class="form-check-label" for="exampleRadios2">
                                    Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa Chỉ:</label>
                                <input type="text" class="form-control" name="user_address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Địa Chỉ...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Điện Thoại:</label>
                                <input type="tel" class="form-control" name="user_phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập Số Điện Thoại...">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
                                <input type="file" class="form-control-file" name="user_avatar" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" name="register" class="btn btn-danger">Đăng Ký</button>
                        </form>

                        <!-- /Product Single -->
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->


                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
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
