<?php
require '../action/action.php';
if (isset($_SESSION['loged']) && isset($_SESSION['member'])){
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require 'nav.php'?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require 'leftMenu.php'?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="d-flex align-items-end flex-wrap">
                                <div class="mr-md-3 mr-xl-5">
                                    <h2>Welcome back,</h2>
                                    <p class="mb-md-0">Your analytics dashboard template.</p>
                                </div>
                                <div class="d-flex">
                                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                    <p class="text-primary mb-0 hover-cursor">Analytics</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end flex-wrap">
                                <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                                    <i class="mdi mdi-download text-muted"></i>
                                </button>
                                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                                    <i class="mdi mdi-clock-outline text-muted"></i>
                                </button>
                                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                                    <i class="mdi mdi-plus text-muted"></i>
                                </button>
                                <button class="btn btn-primary mt-2 mt-xl-0">Download report</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body dashboard-tabs p-0">
                                <ul class="nav nav-tabs px-4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Sales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Purchases</a>
                                    </li>
                                </ul>
                                <div class="tab-content py-0 px-0">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="d-flex flex-wrap justify-content-xl-between">
                                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Start date</small>
                                                    <div class="dropdown">
                                                        <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                            <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                            <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                            <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Revenue</small>
                                                    <h5 class="mr-2 mb-0">$577545</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Total views</small>
                                                    <h5 class="mr-2 mb-0">9833550</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Downloads</small>
                                                    <h5 class="mr-2 mb-0">2233783</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Flagged</small>
                                                    <h5 class="mr-2 mb-0">3497843</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                                        <div class="d-flex flex-wrap justify-content-xl-between">
                                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Start date</small>
                                                    <div class="dropdown">
                                                        <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                            <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                            <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                            <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Downloads</small>
                                                    <h5 class="mr-2 mb-0">2233783</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Total views</small>
                                                    <h5 class="mr-2 mb-0">9833550</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Revenue</small>
                                                    <h5 class="mr-2 mb-0">$577545</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Flagged</small>
                                                    <h5 class="mr-2 mb-0">3497843</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                                        <div class="d-flex flex-wrap justify-content-xl-between">
                                            <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Start date</small>
                                                    <div class="dropdown">
                                                        <a class="btn btn-secondary dropdown-toggle p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <h5 class="mb-0 d-inline-block">26 Jul 2018</h5>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkA">
                                                            <a class="dropdown-item" href="#">12 Aug 2018</a>
                                                            <a class="dropdown-item" href="#">22 Sep 2018</a>
                                                            <a class="dropdown-item" href="#">21 Oct 2018</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-currency-usd mr-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Revenue</small>
                                                    <h5 class="mr-2 mb-0">$577545</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-eye mr-3 icon-lg text-success"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Total views</small>
                                                    <h5 class="mr-2 mb-0">9833550</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-download mr-3 icon-lg text-warning"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Downloads</small>
                                                    <h5 class="mr-2 mb-0">2233783</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                                <i class="mdi mdi-flag mr-3 icon-lg text-danger"></i>
                                                <div class="d-flex flex-column justify-content-around">
                                                    <small class="mb-1 text-muted">Flagged</small>
                                                    <h5 class="mr-2 mb-0">3497843</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Cash deposits</p>
                                <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                                <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                                <canvas id="cash-deposits-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Total sales</p>
                                <h1>$ 28835</h1>
                                <h4>Gross sales over the years</h4>
                                <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
                                <div id="total-sales-chart-legend"></div>
                            </div>
                            <canvas id="total-sales-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Recent Purchases</p>
                                <div class="table-responsive">
                                    <table id="recent-purchases-listing" class="table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status report</th>
                                            <th>Office</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Gross amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Jeremy Ortega</td>
                                            <td>Levelled up</td>
                                            <td>Catalinaborough</td>
                                            <td>$790</td>
                                            <td>06 Jan 2018</td>
                                            <td>$2274253</td>
                                        </tr>
                                        <tr>
                                            <td>Alvin Fisher</td>
                                            <td>Ui design completed</td>
                                            <td>East Mayra</td>
                                            <td>$23230</td>
                                            <td>18 Jul 2018</td>
                                            <td>$83127</td>
                                        </tr>
                                        <tr>
                                            <td>Emily Cunningham</td>
                                            <td>support</td>
                                            <td>Makennaton</td>
                                            <td>$939</td>
                                            <td>16 Jul 2018</td>
                                            <td>$29177</td>
                                        </tr>
                                        <tr>
                                            <td>Minnie Farmer</td>
                                            <td>support</td>
                                            <td>Agustinaborough</td>
                                            <td>$30</td>
                                            <td>30 Apr 2018</td>
                                            <td>$44617</td>
                                        </tr>
                                        <tr>
                                            <td>Betty Hunt</td>
                                            <td>Ui design not completed</td>
                                            <td>Lake Sandrafort</td>
                                            <td>$571</td>
                                            <td>25 Jun 2018</td>
                                            <td>$78952</td>
                                        </tr>
                                        <tr>
                                            <td>Myrtie Lambert</td>
                                            <td>Ui design completed</td>
                                            <td>Cassinbury</td>
                                            <td>$36</td>
                                            <td>05 Nov 2018</td>
                                            <td>$36422</td>
                                        </tr>
                                        <tr>
                                            <td>Jacob Kennedy</td>
                                            <td>New project</td>
                                            <td>Cletaborough</td>
                                            <td>$314</td>
                                            <td>12 Jul 2018</td>
                                            <td>$34167</td>
                                        </tr>
                                        <tr>
                                            <td>Ernest Wade</td>
                                            <td>Levelled up</td>
                                            <td>West Fidelmouth</td>
                                            <td>$484</td>
                                            <td>08 Sep 2018</td>
                                            <td>$50862</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php require '../admin/footer.php' ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/data-table.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap4.js"></script>
<!-- End custom js for this page-->
</body>

</html>
<?php } else {
header("Location: ../client/login.php");

}  ?>

