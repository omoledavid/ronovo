<?php




if (!$user->cdp_is_Admin())
	cdp_redirect_to("login.php");

$userData = $user->cdp_getUserData();

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
	<!-- This Page CSS -->
	<!-- Custom CSS -->
	<link href="assets/css/style.min.css" rel="stylesheet">

	<link href="assets/css/front.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/jquery.ui.touch-punch.js"></script>
	<script src="assets/js/jquery.wysiwyg.js"></script>
	<script src="assets/js/global.js"></script>
	<script src="assets/js/custom.js"></script>
	<link href="assets/customClassPagination.css" rel="stylesheet">



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

			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<div class="email-app">
				<!-- ============================================================== -->
				<!-- Left Part menu -->
				<!-- ============================================================== -->

				<?php include 'views/inc/left_part_menu.php'; ?>

				<!-- ============================================================== -->
				<!-- Right Part contents-->
				<!-- ============================================================== -->
				<div class="right-part mail-list bg-white">
					<div class="p-15 b-b">
						<div class="d-flex align-items-center">
							<div>
								<span><?php echo $lang['tools-config61'] ?> | List of Shipping Line</span>
							</div>

						</div>
					</div>
					<!-- Action part -->
					<!-- Button group part -->
					<div class="bg-light p-15">
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


					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="row">
								<!-- Column -->
								<div class="col-12">
									<div class="card-body">
										<form class="form-horizontal form-material" id="save_data" name="save_data" method="post">
											<header><?php echo $lang['tools-shipline6'] ?> <span><?php echo $lang['tools-shipline7'] ?></span></header> <br><br>
											<section>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="firstName1"><?php echo $lang['tools-shipline6'] ?></label>
															<input type="text" class="form-control" name="ship_line" id="ship_line" placeholder="<?php echo $lang['tools-shipline6'] ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="lastName1"><?php echo $lang['tools-shipline8'] ?></label>
															<input type="text" class="form-control" name="detail" id="detail" placeholder="<?php echo $lang['tools-shipmode8'] ?>">
														</div>
													</div>
												</div>
											</section>
											<br><br>
											<div class="form-group">
												<div class="col-sm-12">
													<button class="btn btn-outline-primary btn-confirmation" name="dosubmit" type="submit"><?php echo $lang['tools-shipline9'] ?> <span><i class="icon-ok"></i></span></button>
													<a href="shipline_list.php" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['tools-shipline5'] ?></a>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- Column -->
							</div>
						</div>
					</div>




				</div>

			</div>
			<!-- ============================================================== -->
			<!-- End Page wrapper  -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->


		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<!-- Bootstrap tether Core JavaScript -->
		<script src="assets/custom_dependencies/jquery-3.6.0.min.js"></script>
		<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
		<script src="assets/custom_dependencies/bootstrap.min.js"></script>
		<!-- apps -->
		<script src="assets/js/app.min.js"></script>
		<script src="assets/js/app.init.js"></script>
		<script src="assets/template/dist/js/app-style-switcher.js"></script>
		<!-- slimscrollbar scrollbar JavaScript -->
		<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
		<script src="assets/js/sparkline/sparkline.js"></script>
		<!--Wave Effects -->
		<script src="assets/js/waves.js"></script>
		<!--Menu sidebar -->
		<script src="assets/js/sidebarmenu.js"></script>
		<!--Custom JavaScript -->
		<script src="assets/js/custom.min.js"></script>

		<script src="dataJs/shipline.js"></script>
</body>

</html>