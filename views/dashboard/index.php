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
    <meta name="keywords" content="<?= $core->site_name?>" />
    <meta name="author" content="Jaomweb">
    <title><?php echo $lang['left-menu-sidebar-2'] ?> | <?php echo $core->site_name ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/<?php echo $core->favicon ?>">
    <?php include 'views/inc/head_scripts.php'; ?>
    <script src="assets/template/assets/extra-libs/chart.js-2.8/Chart.min.js"></script>

</head>

<body>
    <?php include 'views/inc/preloader.php'; ?>

    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->


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
                        <h4 class="page-title"><?php echo $lang['left-menu-sidebar-2'] ?></h4>
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
                <!-- Earnings, Sale Locations -->
                <!-- ============================================================== -->
                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-sm-12 col-md-6 col-lg-8">
                                        <div class="card-body border-bottom">
                                            <h5 class="card-title">Control Panel</h5>
                                        </div>

                                        <div class="row">
                                            <!-- col -->
                                            <div class="col-lg-6 col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10">
                                                        <a href="dashboard_admin_shipments.php">
                                                            <span class="text-orange display-6">
                                                                <i class="mdi mdi-package-variant-closed"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div><span>shipments</span>
                                                        <h3 class="font-medium m-b-0">
                                                            <?php

                                                            $db->cdp_query('SELECT COUNT(*) as total FROM cdb_add_order WHERE  order_incomplete=1');

                                                            $db->cdp_execute();

                                                            $count = $db->cdp_registro();

                                                            echo $count->total;
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- col -->
                                            <!-- col -->
                                            <div class="col-lg-6 col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><a href="accounts_receivable.php"><span class="text-primary display-6"><i class="mdi mdi-package-down"></i></span></a></div>
                                                    <div><span> Account Receivable</span>
                                                        <h3 class="font-medium m-b-0">
                                                            <?php

                                                            $db->cdp_query('SELECT COUNT(*) as total FROM cdb_add_order WHERE order_payment_method >1');

                                                            $db->cdp_execute();

                                                            $count = $db->cdp_registro();

                                                            echo $count->total;
                                                            ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                <div class="card-body border-bottom">

                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><span class="text-primary display-6"><i class="mdi mdi-basket"></i></span></div>
                                                    <div><span class="text-muted">Total registered packages</span>
                                                        <h4 class="font-medium m-b-0"><?php echo $core->currency; ?>

                                                            <?php

                                                            $db->cdp_query('SELECT IFNULL(SUM(total_order),0) as total FROM cdb_customers_packages WHERE status_courier!=21');

                                                            $db->cdp_execute();

                                                            $count = $db->cdp_registro();

                                                            echo cdb_money_format($count->total);

                                                            ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12 col-lg-6">
                                                <div class="card-body border-bottom">

                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10"><span class="text-orange display-6"><i class="mdi mdi-wallet"></i></span></div>
                                                    <div><span class="text-muted">Total accounts receivable</span>
                                                        <h4 class="font-medium m-b-0"><?php echo $core->currency; ?>

                                                            <?php

                                                            $db->cdp_query('SELECT IFNULL(SUM(total_order),0) as total FROM cdb_add_order where status_courier!=21 and  status_invoice!=0 and order_payment_method>1');

                                                            $db->cdp_execute();

                                                            $count = $db->cdp_registro();

                                                            echo cdb_money_format($count->total);
                                                            ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                        <div class="card-body border-bottom">
                                            <h5 class="card-title"><?php echo $lang['dash-general-9'] ?></h5>
                                        </div>
                                        <ul class="list-style-none">
                                            <li class="m-t-30">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <span class="text-muted">Total Shipments</span>
                                                        <h4 class="m-b-0">
                                                            <span class="font-16">
                                                                <?php echo $core->currency; ?>
                                                                <?php

                                                                $db->cdp_query('SELECT IFNULL(SUM(total_order),0) as total FROM cdb_add_order where status_courier!=21 and is_pickup=0');

                                                                $db->cdp_execute();

                                                                $row = $db->cdp_registro();

                                                                $sum1 = $row->total;

                                                                echo cdb_money_format($sum1);

                                                                ?>
                                                            </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="progress m-t-10">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo cdb_money_format_bar($sum1) / 100; ?>%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-12 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body border-bottom">
                                    <h5 class="card-title">Users</h5>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6 m-t-30 m-b-20">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <?php if ($userData->userlevel == 9) { ?>
                                                <a href="users_list.php">
                                                    <span class="display-6">
                                                        <i class="mdi mdi-account-settings-variant" style="color: #36bea6;"></i>
                                                    </span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($userData->userlevel == 2) { ?>
                                                <a href="#"><span class="display-6"><i class="mdi mdi-account-settings-variant" style="color: #36bea6;"></i></span></a>
                                            <?php } ?>
                                        </div>
                                        <div>
                                            <span class="text-muted">Super Admin</span>
                                            <h3 class="font-medium m-b-0">
                                                <?php

                                                $db->cdp_query('SELECT COUNT(*) as total FROM cdb_users WHERE userlevel=9');

                                                $db->cdp_execute();

                                                $count = $db->cdp_registro();

                                                echo $count->total;
                                                ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <?php if ($userData->userlevel == 9) { ?>
                                                <a href="users_list.php"><span class="display-6"><i class="mdi mdi-account-settings" style="color: #fb8c00;"></i></span></a>
                                            <?php } ?>
                                            <?php if ($userData->userlevel == 2) { ?>
                                                <a href="#"><span class="display-6"><i class="mdi mdi-account-settings" style="color: #fb8c00;"></i></span></a>
                                            <?php } ?>
                                        </div>
                                        <div><span class="text-muted"><?php echo $lang['dash-general-15'] ?></span>
                                            <h3 class="font-medium m-b-0">
                                                <?php

                                                $db->cdp_query('SELECT COUNT(*) as total FROM cdb_users WHERE userlevel=2');

                                                $db->cdp_execute();

                                                $count = $db->cdp_registro();

                                                echo $count->total;
                                                ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a href="drivers_list.php"><span class="display-6"><i class="mdi mdi-account-star-variant" style="color: #7460ee;"></i></span></a></div>
                                        <div><span class="text-muted"><?php echo $lang['dash-general-16'] ?></span>
                                            <h3 class="font-medium m-b-0">
                                                <?php

                                                $db->cdp_query('SELECT COUNT(*) as total FROM cdb_users WHERE userlevel=3');

                                                $db->cdp_execute();

                                                $count = $db->cdp_registro();

                                                echo $count->total;
                                                ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a href="customers_list.php"><span class="display-6"><i class="mdi mdi-account-check" style="color: #1f95ff;"></i></span></a></div>
                                        <div><span class="text-muted"><?php echo $lang['dash-general-17'] ?></span>
                                            <h3 class="font-medium m-b-0">
                                                <?php

                                                $db->cdp_query('SELECT COUNT(*) as total FROM cdb_users WHERE userlevel=1');

                                                $db->cdp_execute();

                                                $count = $db->cdp_registro();

                                                echo $count->total;
                                                ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-shipment" role="tab" aria-controls="pills-shipment" aria-selected="true">
                                            List of Shipments
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-shipment" role="tabpanel" aria-labelledby="pills-home-tab">

                                        <div class="col-md-4 mt-4 mb-4">
                                            <div class="input-group">
                                                <input type="text" name="search_shipment" id="search_shipment" class="form-control input-sm float-right" placeholder="<?php echo $lang['left21551'] ?>" onkeyup="cdp_load(1);">
                                                <div class="input-group-append input-sm">
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="results_shipments"></div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-pickup" role="tabpanel" aria-labelledby="pills-profile-tab">

                                        <div class="col-md-4 mt-4 mb-4">
                                            <div class="input-group">
                                                <input type="text" name="search_pickup" id="search_pickup" class="form-control input-sm float-right" placeholder="<?php echo $lang['left21551'] ?>" onkeyup="cdp_load(1);">
                                                <div class="input-group-append input-sm">
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="results_pickup"></div>

                                    </div>
                                    <div class="tab-pane fade" id="pills-consolidated" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <div class="col-md-4 mt-4 mb-4">
                                            <div class="input-group">
                                                <input type="text" name="search_consolidated" id="search_consolidated" class="form-control input-sm float-right" placeholder="<?php echo $lang['left21551'] ?>" onkeyup="cdp_load(1);">
                                                <div class="input-group-append input-sm">
                                                    <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="results_consolidated"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'views/inc/footer.php'; ?>
        </div>
    </div>




    <script src="dataJs/dashboard_index.js"></script>