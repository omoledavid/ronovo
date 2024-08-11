<?php




if (!$user->cdp_is_Admin())
    cdp_redirect_to("login.php");
$userData = $user->cdp_getUserData();


require_once('helpers/querys.php');

if (isset($_GET['id'])) {
    $data = cdp_getCategoryEdit($_GET['id']);
}

if (!isset($_GET['id']) or $data['rowCount'] != 1) {
    cdp_redirect_to("category_list.php");
}

$row_item = $data['data'];

?>
<!DOCTYPE html>
<html dir="<?php echo $direction_layout; ?>" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/<?php echo $core->favicon ?>">
    <title><?php echo $lang['tools-config61'] ?> | <?php echo $core->site_name ?></title>
    <?php include 'views/inc/head_scripts.php'; ?>


</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->


    <?php include 'views/inc/preloader.php'; ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
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
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <span><?php echo $lang['tools-config61'] ?> | <?php echo $lang['tools-category4'] ?></span>

                    </div>
                </div>
            </div>
            <!-- Action part -->
            <!-- Button group part -->
            <div class="bg-light">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <!-- <div id="loader" style="display:none"></div> -->
                                <div id="resultados_ajax"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Action part -->


            <div class="container-fluid mb-4">

                <div class="row">
                    <!-- Column -->

                    <div class="col-lg-12 col-xl-12 col-md-12">

                        <div class="card">
                            <div class="card-body">

                                <form class="form-horizontal form-material" id="update_data" name="update_data" method="post">
                                    <header><span><?php echo $lang['tools-category2'] ?> <i class="icon-double-angle-right"></i> <?php echo $row_item->name_item; ?></span></header> <br> <br>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="firstName1"><?php echo $lang['tools-category6'] ?></label>
                                                    <input type="text" class="form-control" name="name_item" id="name_item" value="<?php echo $row_item->name_item; ?>" placeholder="<?php echo $lang['tools-category1'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="lastName1"><?php echo $lang['tools-category8'] ?></label>
                                                    <textarea class="form-control" rows="2" type="text" name="detail_item" id="detail_item" value="" placeholder="<?php echo $lang['tools-category3'] ?>"><?php echo $row_item->detail_item; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-category4'] ?> <span><i class="icon-ok"></i></span></button>
                                            <a href="category_list.php" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-category5'] ?></a>
                                        </div>
                                    </div>
                                    <input name="id" id="id" type="hidden" value="<?php echo $_GET['id']; ?>" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>

            <?php include 'views/inc/footer.php'; ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <script src="dataJs/category.js"></script>
</body>

</html>