
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