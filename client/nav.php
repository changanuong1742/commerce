<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Chào mừng đến với AShop</span>
            </div>
            <div class="pull-right">
                <?php $dataAllInfo = $db->readInfo();
                ?>

                <ul class="header-top-links">
                    <?php
                    foreach ($dataAllInfo as $rowInfo) {
                    ?>
                    <li><a href="#"><i class="fa fa-phone"></i> <?= $rowInfo['infor_phone'] ?></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> <?= $rowInfo['infor_email'] ?></a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> <?= $rowInfo['infor_address'] ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="../client">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <?php $dataAllFindProduct = $db->readFliter();
                    ?>
                    <form action="" method="post">
                        <input class="input search-input" type="text" placeholder="Nhập Từ Cần Tìm" name="searchProductValue">
                        <select class="input search-categories">
                            <option>Tất Cả</option>
                        </select>
                        <button class="search-btn" type="submit" name="searchProductProduct"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <?php if (isset($_SESSION['loged'])) {
                    $rowUser = $db->getUserById($_SESSION['user_id']);
                    ?>

                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                              <img src="<?= $rowUser['user_avatar'] ?>" width="45" height="45">
                            </div>
                            <strong class="text-uppercase">Tài Khoản <i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="../member/logout.php" class="text-uppercase">Đăng Xuất</a><a href="#" class="text-uppercase"></a>
                        <ul class="custom-menu">
                            <?php if (isset($_SESSION['admin'])) { ?>
                            <li><a href="../admin"><i class="fa fa-user-o"></i> Tài Khoản Của Tôi</a></li>
                            <?php } else { ?>
                            <li><a href="../member"><i class="fa fa-user-o"></i> Tài Khoản Của Tôi</a></li>
                        <?php } ?>

                            <li><a href="#"><i class="fa fa-user"></i><?= $rowUser['user_name'] ?></a></li>
                        </ul>
                    </li>
                    <?php } else { ?>


                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">Tài Khoản <i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="../client/login.php" class="text-uppercase">Đăng Nhập</a><a href="#" class="text-uppercase"></a>
                        <ul class="custom-menu">
                            <li><a href="#"><i class="fa fa-user-o"></i> Tài Khoản Của Tôi</a></li>
                            <li><a href="../client/register.php"><i class="fa fa-user-plus"></i> Tạo Tài khoản</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <!-- /Account -->

                    <!-- Cart -->
                    <?php if (isset($_SESSION['loged'])){ ?>
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <?php
                            if (isset($_SESSION['cart'])){ ?>
                                <span class="qty"><?= count($_SESSION['cart']) ?></span>
                                <?php } else { ?>
                                <span class="qty">0</span>
                                <?php }  ?>
                            </div>
                            <strong class="text-uppercase">Giỏ Hàng:</strong>
                            <br>
                            <?php
                            if (isset($_SESSION['cart'])){
                            $totalCart = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $totalCart = $totalCart + $value['order_totalProduct'];
                            }
                            $_SESSION['totalCart'] = $totalCart;
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['cart'])){ ?>
                            <span><?= number_format($totalCart)  ?></span>
                            <?php } else { ?>
                            <span>0</span>
                            <?php } ?>

                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">

                                    <?php
                                        if (isset($_SESSION['cart'])){
                                    foreach ($_SESSION['cart'] as $key => $value) {?>
                                            <?php $rowCart = $db->getProduct($value['product_id']) ?>
                                    <div class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="<?= $rowCart['product_image1'] ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price"><?= number_format($rowCart['product_sale']) ?> <span class="qty"><?= 'x' . $value['order_qtyProduct'] ?></span></h3>
                                            <h2 class="product-name"><a href="#"><?= $rowCart['product_name'] ?></a></h2>
                                        </div>
                                        <form action="" method="post">
                                            <input name="product_id" value="<?= $value['product_id'] ?>" hidden>
                                        <button class="cancel-btn" name="deleteProductCart"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                   <?php }} ?>

                                </div>
                                <div class="shopping-cart-btns">
                                    <a href="checkout.php"><button class="main-btn">Giỏ Hàng</button></a>
                                    <a href="checkout.php"><button class="primary-btn">Thanh Toán <i class="fa fa-arrow-circle-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } else { ?>

                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">0</span>
                            </div>
                            <strong class="text-uppercase">Giỏ Hàng:</strong>
                            <br>
                            <span>0 VND</span>

                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">


                                        <div class="product product-widget">

                                            <div class="product-body">
                                                <h2 class="product-name"><a href="../client/login.php">Đăng Nhập Để Mua Hàng</a></h2>
                                            </div>

                                        </div>

                                </div>
                                <div class="shopping-cart-btns">
                                    <a href="login.php"><button class="main-btn">Giỏ Hàng</button></a>
                                    <a href="login.php"><button class="primary-btn">Thanh Toán <i class="fa fa-arrow-circle-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php } ?>

                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
