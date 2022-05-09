<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="#">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /footer logo -->

                    <p>A-SHOP Chuyên Bán Điện Thoại Di Động Rẻ Nhất. Phục Vụ 24/7</p>
                    <!-- footer social -->
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Tài Khoản</h3>
                    <ul class="list-links">
                        <li><a href="#">Tài Khoản Của Tôi</a></li>
                        <li><a href="#">Thanh Toán</a></li>
                        <li><a href="#">Đăng Nhập</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Dịch Vụ</h3>
                    <ul class="list-links">
                        <li><a href="#">Giới Thiệu</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <?php $dataAllInfo = $db->readInfo();
            ?>


            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="footer">
                    <h3 class="footer-header">Liên Hệ</h3>
                    <ul class="header-top-links">
                        <?php
                        foreach ($dataAllInfo as $rowInfo) {
                            ?>
                            <p>
                            <li><a href="#"><i class="fa fa-phone"></i> <?= $rowInfo['infor_phone'] ?></a></li></p>
                            <p>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> <?= $rowInfo['infor_email'] ?></a></li></p>
                            <p>
                            <li><a href="#"><i class="fa fa-map-marker"></i> <?= $rowInfo['infor_address'] ?></a>
                            </li></p>
                            <?php
                        }
                        ?>
                    </ul>

                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    A-SHOP Chuyên Bán Điện Thoại Di Động Uy Tín Giá Rẻ
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <!-- /footer copyright -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>