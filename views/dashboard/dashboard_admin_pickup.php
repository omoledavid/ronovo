<?php




$userData = $user->cdp_getUserData();

$db = new Conexion;

?>
<!DOCTYPE html>
<html dir="<?php echo $direction_layout; ?>" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $core->site_name ?>" />
    <meta name="author" content="Jaomweb">
    <title><?php echo $lang['left-menu-sidebar-19'] ?> | <?php echo $core->site_name ?></title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/<?php echo $core->favicon ?>">

    <?php include 'views/inc/head_scripts.php'; ?>
</head>

<body>

    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->

        <?php include 'views/inc/preloader.php'; ?>

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->

        <?php include 'views/inc/topbar.php'; ?>

        <!-- End Topbar header -->


        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <?php include 'views/inc/left_sidebar.php'; ?>


        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?php echo $lang['left-menu-sidebar-19'] ?></h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title"><?php echo $lang['dash-general-9'] ?></h4>
                                        <h5 class="card-subtitle"><?php echo $lang['dash-general-24'] ?></h5>

                                    </div>
                                </div>

                                <!-- column -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a href="pickup_list.php"><span class="text-cyan display-6"><i class="mdi mdi-star-circlemdi mdi-clock-fast"></i></span></a></div>
                                            <div><span> <?php echo $lang['dash-general-2'] ?></span>
                                                <h3 class="font-medium m-b-0">
                                                    <?php
                                                    $month = date('m');
                                                    $year = date('Y');

                                                    $db->cdp_query("SELECT COUNT(*) as total FROM cdb_add_order WHERE is_pickup=1 and status_courier=14 and month(order_date)='$month' AND year(order_date)='$year'");

                                                    $db->cdp_execute();

                                                    $count = $db->cdp_registro();

                                                    echo $count->total;
                                                    ?>

                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a href="pickup_list.php"><span class="text-orange display-6"><i class="mdi mdi-backspace"></i></span></a></div>
                                            <div><span><?php echo $lang['dash-general-221'] ?></span>
                                                <h3 class="font-medium m-b-0">
                                                    <?php

                                                    $month = date('m');
                                                    $year = date('Y');

                                                    $db->cdp_query("SELECT COUNT(*) as total FROM cdb_add_order WHERE is_pickup=1 and status_courier=12 and month(order_date)='$month' AND year(order_date)='$year'");

                                                    $db->cdp_execute();

                                                    $count = $db->cdp_registro();

                                                    echo $count->total;
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a href="pickup_list.php"><span class="text-danger display-6"><i class="mdi mdi-close-circle"></i></span></a></div>
                                            <div><span><?php echo $lang['dash-general-222'] ?></span>
                                                <h3 class="font-medium m-b-0">
                                                    <?php

                                                    $month = date('m');
                                                    $year = date('Y');

                                                    $db->cdp_query("SELECT COUNT(*) as total FROM cdb_add_order WHERE is_pickup=1 and status_courier=21 and month(order_date)='$month' AND year(order_date)='$year'");

                                                    $db->cdp_execute();

                                                    $count = $db->cdp_registro();

                                                    echo $count->total;
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a href="pickup_list.php"><span class="text-success display-6"><i class="mdi mdi-package-down"></i></span></a></div>
                                            <div><span><?php echo $lang['dash-general-220'] ?></span>
                                                <h3 class="font-medium m-b-0">
                                                    <?php

                                                    $month = date('m');
                                                    $year = date('Y');

                                                    $db->cdp_query("SELECT COUNT(*) as total FROM cdb_add_order WHERE status_courier=8 and  is_pickup=1 and month(order_date)='$month' AND year(order_date)='$year'");

                                                    $db->cdp_execute();

                                                    $count = $db->cdp_registro();

                                                    echo $count->total;
                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12 col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-info display-6"><i class="mdi mdi-currency-usd"></i></span></div>
                                            <div>
                                                <span>
                                                    <?php echo $lang['dash-general-27'] ?>
                                                </span>
                                                <h4 class="font-medium m-b-0">
                                                    <?php
                                                    $month = date('m');
                                                    $year = date('Y');

                                                    $db->cdp_query("SELECT IFNULL(SUM(total_order), 0) as total FROM cdb_add_order WHERE status_courier!=21 and is_pickup=1 and month(order_date)='$month' AND year(order_date)='$year'");

                                                    $db->cdp_execute();

                                                    $count = $db->cdp_registro();

                                                    echo $core->currency . ' ' . cdb_money_format($count->total);
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title"><?php echo $lang['dash-general-26'] ?></h4>

                                    </div>
                                </div>

                                <div>
                                    <canvas id="bar-chart" height="119"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title"><?php echo $lang['dash-general-28'] ?></h4>
                                        <h5 class="card-subtitle"><?php echo $lang['dash-general-244'] ?></h5>
                                    </div>

                                </div>
                                <div class="outer_div">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->

            </div>
            <?php include 'views/inc/footer.php'; ?>
        </div>
    </div>
    <?php include('helpers/languages/translate_to_js.php'); ?>

    <script src="dataJs/dashboard_pickup.js"></script>

    <script src="assets/template/assets/extra-libs/chart.js-2.8/Chart.min.js"></script>