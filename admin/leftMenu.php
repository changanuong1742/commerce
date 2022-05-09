<?php




?>


<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Quản Lý Thành Viên</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="users.php"> Thành Viên </a></li>
                    <li class="nav-item"> <a class="nav-link" href="addUser.php"> Thêm Thành Viên </a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-collage menu-icon"></i>
                <span class="menu-title">Quản Lý Sản Phẩm</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="products.php"> Sản Phẩm </a></li>
                    <li class="nav-item"> <a class="nav-link" href="addProduct.php"> Thêm Sản Phẩm </a></li>
                    <li class="nav-item"> <a class="nav-link" href="brands.php"> Hãng </a></li>
                    <li class="nav-item"> <a class="nav-link" href="statusProducts.php"> Trạng Thái Sản Phẩm </a></li>
                    <li class="nav-item"> <a class="nav-link" href="colorProducts.php"> Màu Sắc </a></li>
                    <li class="nav-item"> <a class="nav-link" href="memoryProducts.php"> Dung Lượng </a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#slideShow" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-image-filter menu-icon"></i>
                <span class="menu-title">Quản Lý SlideShow</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="slideShow">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="slideShow.php"> SlideShow </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-comment menu-icon"></i>
                <span class="menu-title">Bình Luận</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="comment">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="comments.php"> Tất Cả Bình Luận </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#infoShop" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-information menu-icon"></i>
                <span class="menu-title">Quản Lý Thông Tin Website</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="infoShop">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="info.php"> Thông Tin Shop </a></li>
                </ul>
            </div>
        </li>


    </ul>
</nav>
