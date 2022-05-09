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
                <span class="menu-title">Tài Khoản</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="userDetail.php"> Thông Tin Của Tôi </a></li>
                    <li class="nav-item"> <a class="nav-link" href="myOrders.php"> Đơn Hàng Của Tôi </a></li>
                </ul>
            </div>
        </li>



    </ul>
</nav>
