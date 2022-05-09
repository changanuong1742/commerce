
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav">
                <span class="category-header">Tất Cả Hãng <i class="fa fa-list"></i></span>
                <ul class="category-list">
                    <?php     $dataAllBrand = $db->readBrand();
                    ?>
                    <?php
                    foreach ($dataAllBrand as $rowBrand) {
                    ?>
                        <li><a href="../client/store.php?brand=<?= $rowBrand['brand_id'] ?>"><?= $rowBrand['brand_name'] ?></a></li>

                        <?php
                    }
                    ?>


                    <li><a href="#">View All</a></li>
                </ul>
            </div>
            <!-- /category nav -->

            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="../client/">Trang Chủ</a></li>
                    <li><a href="../client/store.php">Cửa Hàng</a></li>

                </ul>
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                <?php     $dataAllSlideShow = $db->readSlideShow();
                ?>
                <?php
                foreach ($dataAllSlideShow as $rowSlideShow) {

                ?>
                <div class="banner banner-1">
                    <img src="<?= $rowSlideShow['slideShow_image'] ?>" width="670" height="376" alt="">
                    <div class="banner-caption text-center">
                       <a href="../client/store.php"> <button class="primary-btn">Mua Ngay</button></a>
                    </div>
                </div>
                <?php

                }
                ?>
                <!-- /banner -->


            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>