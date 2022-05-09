
<?php require '../action/action.php' ?>

<?php if (isset($_SESSION['loged'])) { ?>
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
<?php require 'navProductDetail.php' ?>

<!-- NAVIGATION -->

<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang Chủ</a></li>
            <li class="active">Thanh toán</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form id="checkout-form" class="clearfix" action="" method="post">
                <div class="col-md-6">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">THÔNG TIN ĐƠN HÀNG</h3>
                        </div>
                        <?php $rowUser = $db->getUserById($_SESSION['user_id']) ?>
                        <div class="form-group">
                            <input class="input" type="text" name="user_name" placeholder="Last Name" value="<?= $rowUser['user_name'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="user_email" placeholder="Email" value="<?= $rowUser['user_email'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="user_address" placeholder="Address" value="<?= $rowUser['user_address'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="user_phone" placeholder="Telephone" value="<?= $rowUser['user_phone'] ?>" disabled>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">CHUYỂN HÀNG</h4>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="shipping" id="shipping-1" checked>
                            <label for="shipping-1">Miễn Phí Ship</label>
                            <div class="caption">
                                <p>Đơn của bạn sẽ được chuyên lâu hơn khoảng 3-7 ngày.
                                <p>
                            </div>
                        </div>
                    </div>

                    <div class="payments-methods">
                        <div class="section-title">
                            <h4 class="title">PHƯƠNG THỨC THANH TOÁN</h4>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-1" checked>
                            <label for="payments-1">Chuyển Khoản Ngân Hàng</label>
                            <div class="caption">
                                <p>NỘI DUNG CHUYỂN KHOẢN: Số Điện Thoại - Mã Thanh Toán
                                <p>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="radio" name="payments" id="payments-3">
                            <label for="payments-3">Thanh Toán Qua PayPal</label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                <p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) >0 ) { ?>
                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">SẢN PHẨM ĐÃ CHỌN</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th></th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                <?php $rowCart = $db->getProduct($value['product_id']) ?>
                                    <input name="product_id" value="<?= $value['product_id'] ?>" hidden>
                                <td class="thumb"><img src="<?= $rowCart['product_image1'] ?>" alt=""></td>
                                <td class="details">
                                    <a href="#"><?= $rowCart['product_name'] ?></a>
                                    <ul>
                                        <li><span>Dung lượng: <?= $value['order_memoryProduct_name'] ?></span></li>
                                        <li><span>Màu sắc: <?= $value['order_colorProduct_name'] ?></span></li>
                                    </ul>
                                </td>
                                <td class="price text-center"><strong><?= number_format($rowCart['product_sale']) ?></strong><br><del class="font-weak"><small><?= number_format($rowCart['product_price']) ?></small></del></td>
                                <td class="qty text-center"><input class="input" type="number" value="<?= $value['order_qtyProduct'] ?>" disabled></td>
                                <td class="total text-center"><strong class="primary-color"><?= number_format($value['order_totalProduct']) ?></strong></td>
                                <td class="text-right"><button class="main-btn icon-btn" name="deleteProductCart"><i class="fa fa-close"></i></button></td>
                            </tr>
                        <?php } ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>Thành Tiền</th>
                                <th colspan="2" class="sub-total"><?= number_format($_SESSION['totalCart']) ?></th>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>Phí Ship</th>
                                <td colspan="2">Miễn Phí</td>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>Tổng Tiền</th>
                                <th colspan="2" class="total"><?= number_format($_SESSION['totalCart']) ?></th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button class="primary-btn" name="acceptBuy">Thanh Toán</button>
                        </div>
                    </div>

                </div>

        <?php } else { ?>

                    <div class="col-md-12">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">SẢN PHẨM ĐÃ CHỌN</h3>
                            </div>
                            <table class="shopping-cart-table table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th></th>
                                    <th class="text-center">Giá</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Tổng tiền</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                    </div>

        <?php } ?>
            </form>
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

<?php } else {
    header("Location: login.php");
}

