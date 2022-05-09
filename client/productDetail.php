<?php require '../action/action.php' ?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <![endif]-->

</head>

<body>
<!-- HEADER -->
<?php require './nav.php' ?>

<!-- /HEADER -->

<!-- NAVIGATION -->
<?php require './navProductDetail.php' ?>

<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="../client/">Trang Chủ</a></li>
            <li><a href="../client/store.php">Cửa Hàng</a></li>
            <li><a href="../client/store.php"><?= $rowProductDetail['brand_name'] ?></a></li>
            <li class="active"><?= $rowProductDetail['product_name'] ?></li>
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
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div id="product-main-view">
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image1'] ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image2'] ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image3'] ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image1'] ?>" alt="">
                        </div>
                    </div>
                    <div id="product-view">
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image1'] ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image2'] ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image3'] ?>" alt="">
                        </div>
                        <div class="product-view">
                            <img src="<?= $rowProductDetail['product_image1'] ?>" alt="">
                        </div>
                    </div>
                </div>

            <form action="" method="post">
                <div class="col-md-6">
                    <div class="product-body">
                        <div class="product-label">
                            <span class="sale"><?= $rowProductDetail['statusProduct_name'] ?></span>

                        </div>
                        <h2 class="product-name"><?= $rowProductDetail['product_name'] ?></h2>
                        <h3 class="product-price"><?= number_format($rowProductDetail['product_sale']) ?>
                            <del class="product-old-price"><?= number_format($rowProductDetail['product_price']) ?></del>
                        </h3>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <a href="#">3 Review(s) / Add Review</a>
                        </div>
                        <p><strong class="text-danger">Số Lượng Còn:</strong>
                            <strong><?= $rowProductDetail['product_amountProduct'] ?></strong></p>
                        <p><strong class="text-danger">Hãng:</strong>
                            <strong><?= $rowProductDetail['brand_name'] ?></strong></p>
                        <p><strong class="text-danger">Thông Số Kỹ Thuật </strong></p>
                        <p class="font-weight-bold"><strong><?= $rowProductDetail['product_describe'] ?></strong></p>
                        <div class="product-options">
                            <?php $dataAllMemoryProduct = $db->getMemoryProduct($product_id);
                            ?>
                            <ul class="size-option">
                                <li><strong class="text-uppercase text-danger">Dung Lượng:</strong>

                                    <select title="Select your surfboard" class="selectpicker" name="order_memoryProduct_name">
                                        <?php
                                        foreach ($dataAllMemoryProduct as $rowMemoryProduct) {
                                            ?>
                                            <option value="<?= $rowMemoryProduct['memoryProduct_name'] ?>"><?= $rowMemoryProduct['memoryProduct_name'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </li>
                            </ul>

                            <ul class="color-option">
                                <?php $dataAllColorProduct = $db->getColorProduct($product_id);
                                ?>
                                <li><strong class="text-uppercase text-danger">Màu Sắc:</strong>
                                    <select title="Select your surfboard" class="selectpicker" name="order_colorProduct_name">
                                        <?php
                                        foreach ($dataAllColorProduct as $rowColorProduct) {
                                            ?>
                                            <option data-thumbnail="<?= $rowColorProduct['colorProduct_image'] ?>" value="<?= $rowColorProduct['colorProduct_name'] ?>"><?= $rowColorProduct['colorProduct_name'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </li>
                            </ul>


                        </div>

                        <div class="product-btns">
                            <input name="product_sale" value="<?= $rowProductDetail['product_sale'] ?>" hidden>

                                <div class="qty-input">
                                <strong class="text-uppercase text-danger">Số Lượng: </strong>
                                <input class="input" type="number" value="1" name="order_qtyProduct">

                                </div>
                            <button class="primary-btn add-to-cart" name="addCart"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ
                            </button>
                            <div class="pull-right">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                            </div>
                        </div>
                    </div>

                </div></form>


                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Bình Luận</a></li>
                            <li><a data-toggle="tab" href="#tab1">Chi Tiết Sản Phẩm</a></li>

                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in" style="">
                                <p><?= $rowProductDetail['product_detail'] ?></p>
                            </div>

                            <div id="tab2" class="tab-pane fade in active">
                                <?php
                                $dataAllComment = $db->readCommentByProduct($_GET['productDetail'],0);
                                ?>
                                <div class="row" id="showComment">
                                    <div class="col-md-6">
                                        <div class="product-reviews" >
                                            <?php
                                            foreach ($dataAllComment as $rowComment) {
                                                ?>
                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <?php  $rowUserComment = $db->getUserById($rowComment['user_id']);
                                                        ?>
                                                        <div><a href="#"><i class="fa fa-user-o"></i> <?= $rowUserComment['user_name'] ?></a></div>
                                                        <div><a href="#"><i class="fa fa-clock-o"></i> <?= date("d/m/Y H:i:s", strtotime($rowComment['comment_date'])); ?></a>
                                                        </div>
                                                        <div class="review-rating pull-right">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o empty"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <?php if ($rowComment['comment_image'] == "../uploads/") { ?>
                                                            <p><?= $rowComment['comment_content'] ?></p>
                                                        <?php } else { ?>
                                                            <p><?= $rowComment['comment_content'] ?></p>
                                                            <p><img src="<?= $rowComment['comment_image'] ?>" height="100"></p>
                                                        <?php } ?>

                                                        <form action="" method="post">
                                                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#comment<?= $rowComment['comment_id'] ?>">Trả Lời</button>
                                                            <input name="comment_id" value="<?= $rowComment['comment_id'] ?>" hidden>
                                                            <button type="submit" class="btn btn-success" name="editComment">Sửa</button>
                                                            <button type="submit" class="btn btn-danger" name="deleteComment">Xóa</button>
                                                        </form>
                                                    </div>
                                                    <div id="comment<?= $rowComment['comment_id'] ?>" class="collapse">
                                                        <form class="review-form" action="" method="post" enctype="multipart/form-data" id="form-reply">
                                                            <input name="comment_parent" value="<?= $rowComment['comment_id'] ?>" hidden>
                                                            <input name="product_id" value="<?= $product_id ?>" hidden>

                                                            <div class="form-group">
                                                                <textarea class="input" name="reComment_content" placeholder="Trả Lời Bình Luận..."></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlFile1">Ảnh đính kèm</label>
                                                                <input type="file" class="form-control-file" name="reComment_image" id="exampleFormControlFile1">
                                                            </div>

                                                            <button class="primary-btn" name="reComment">Trả Lời</button>

                                                        </form>
                                                    </div>


                                                    <?php
                                                    $dataAllCommentChild = $db->readCommentByProduct($_GET['productDetail'],$rowComment['comment_id']);
                                                    ?>
                                                    <?php
                                                    foreach ($dataAllCommentChild as $rowCommentChild) {
                                                        ?>
                                                        <div class="single-review" style="padding-left: 40px; padding-top: 10px">
                                                            <div class="review-heading">
                                                                <?php  $rowUserComment = $db->getUserById($rowCommentChild['user_id']);
                                                                ?>
                                                                <div><a href="#"><i class="fa fa-user-o"></i> <?= $rowUserComment['user_name'] ?></a></div>
                                                                <div><a href="#"><i class="fa fa-clock-o"></i> <?= date("d/m/Y H:i:s", strtotime($rowCommentChild['comment_date'])); ?></a>
                                                                </div>
                                                                <div class="review-rating pull-right">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o empty"></i>
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <?php if ($rowCommentChild['comment_image'] == "../uploads/") { ?>
                                                                    <p><?= $rowCommentChild['comment_content'] ?></p>
                                                                <?php } else { ?>
                                                                    <p><?= $rowCommentChild['comment_content'] ?></p>
                                                                    <p><img src="<?= $rowCommentChild['comment_image'] ?>" height="100"></p>
                                                                <?php } ?>

                                                            </div>

                                                        </div>


                                                    <?php } ?>

                                                </div>

                                                <?php
                                            }
                                            ?>



                                            <ul class="reviews-pages">
                                                <li class="active">1</li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>



                                    <?php if ($update_comment ==true){ ?>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Chỉnh Sửa Bình Luận</h4>
                                            <!--                                        <p>Your email address will not be published.</p>-->
                                            <form class="review-form" action="" method="post" enctype="multipart/form-data" id="form-data">
                                                <input name="comment_id" value="<?= $comment_id ?>">

                                                <div class="form-group">
                                                    <textarea class="input" name="comment_content" placeholder="Viết Bình Luận..."><?= $comment_content ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Ảnh đính kèm</label>
                                                    <input type="file" class="form-control-file" name="updateComment_image" id="comment_image">
                                                    <input type="hidden" class="form-control-file" name="comment_image_Old" value="<?= $comment_image ?>" id="comment_image">
                                                    <img src="<?= $comment_image ?>" height="100">
                                                </div>

                                                <button class="primary-btn" id="updateComment" name="updateComment">Cập Nhật</button>
                                            </form>
                                        </div>

                                    <?php } elseif (isset($_SESSION['loged'])) {
                                        ?>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Bình Luận</h4>
                                            <!--                                        <p>Your email address will not be published.</p>-->
                                            <form class="review-form" action="" method="post" enctype="multipart/form-data" id="form-data">
                                                <input name="product_id" value="<?= $product_id ?>" hidden>

                                                <div class="form-group">
                                                    <textarea class="input" name="comment_content" placeholder="Viết Bình Luận..."></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Ảnh đính kèm</label>
                                                    <input type="file" class="form-control-file" name="comment_image" id="comment_image">
                                                </div>

                                                <button class="primary-btn" id="addComment" name="addComment">Bình Luận</button>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                    else { ?>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Bình Luận</h4>
                                            <!--                                        <p>Your email address will not be published.</p>-->
                                            <form class="review-form" action="" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <textarea class="input" name="comment_content" placeholder="Viết Bình Luận..." disabled></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Ảnh đính kèm</label>
                                                    <input type="file" class="form-control-file" name="comment_image" id="exampleFormControlFile1" disabled>
                                                </div>

                                                <p class="text-danger">Đăng Nhập Để Tham Gia Bình Luận</p>
                                            </form>
                                        </div>
                                    <?php }  ?>

                                </div>


                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <!-- /Product Details -->
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
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Sản Phẩm Liên Quan</h2>
                </div>
            </div>
            <!-- section title -->
            <?php $dataRelatedProduct = $db->readRelatedProduct($brand_id, $product_id);
            ?>
            <?php
            foreach ($dataRelatedProduct as $rowRelatedProduct) {
                ?>
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="<?= $rowRelatedProduct['product_image1'] ?>" alt="" height="230">
                        </div>
                        <div class="product-body">
                            <h4 class="product-price"><?= number_format($rowRelatedProduct['product_sale']) ?>
                                <del class="product-old-price"><?= number_format($rowRelatedProduct['product_price']) ?></del>
                            </h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a
                                        href="../client/productDetail.php?productDetail=<?= $rowRelatedProduct['product_id']; ?>"><?= $rowRelatedProduct['product_name'] ?></a>
                            </h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <a href="../client/productDetail.php?productDetail=<?= $rowRelatedProduct['product_id']; ?>"
                                   class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Mua Sản Phẩm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <!-- /Product Single -->


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
<script>




    $(document).ready(function () {

        // showAll();
        // function showAll() {
        //     $.ajax({
        //         url: "",
        //         type: "POST",
        //         data: {
        //             action: "view"
        //         },
        //         success: function (response) {
        //             $("#showComment").html(response);
        //         }
        //
        //     })
        // }

        $("#form-data").submit(function (e){
            e.preventDefault();
            $.ajax({
                url: '../action/action.php',
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function (response){
                    $("#showComment").load(location.href + " #showComment");
                    $("#form-reply").load(location.href + " #form-data");
                }
            })



        })

        $("#form-reply").submit(function (e){
            e.preventDefault();
            $.ajax({
                url: '../action/action.php',
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function (response){

                }
            })
            $("#showComment").load(location.href + " #showComment");
            $("#form-reply").load(location.href + " #form-data");


        })



        }
    );

</script>
</html>

