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
						<span><?php echo $lang['tools-config61'] ?> | <?php echo $lang['lefttrackin'] ?></span>

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
								<header><b>
										<h4 class="card-title"><b><?php echo $lang['tools-config35'] ?></b></h4>
									</b></header>
								<form class="form-horizontal form-material" id="save_config" name="save_config" method="post">
									<hr />

									<section>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstName1"><?php echo $lang['tools-config36'] ?></label>
													<input type="text" data-toggle="tooltip" class="form-control" name="prefix" id="prefix" value="<?php echo $core->prefix; ?>" placeholder="<?php echo $lang['tools-config40'] ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="lastName1"><i class="mdi mdi-cube-send"></i> <?php echo $lang['tools-config38'] ?></label>
													<input type="text" data-toggle="tooltip" class="form-control" name="track_digit" id="track_digit" value="<?php echo $core->track_digit; ?>" placeholder="<?php echo $lang['tools-config39'] ?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstName1"><?php echo $lang['tools-config71'] ?></label>
													<input type="text" data-toggle="tooltip" class="form-control" name="prefix_consolidate" id="prefix_consolidate" value="<?php echo $core->prefix_consolidate; ?>" placeholder="<?php echo $lang['tools-config68'] ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="lastName1"><i class="mdi mdi-gift" style="color:#7460ee"></i> <?php echo $lang['tools-config72'] ?></label>
													<input type="text" data-toggle="tooltip" class="form-control" name="track_consolidate" id="track_consolidate" value="<?php echo $core->track_consolidate; ?>" placeholder="<?php echo $lang['tools-config70'] ?>">
												</div>
											</div>
										</div>



										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstName1"><?php echo $lang['tools-config74'] ?></label>
													<input type="text" data-toggle="tooltip" class="form-control" name="prefix_online_shopping" id="prefix_online_shopping" value="<?php echo $core->prefix_online_shopping; ?>" placeholder="<?php echo $lang['tools-config74'] ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="lastName1"><i class="mdi mdi-gift" style="color:#7460ee"></i> <?php echo $lang['tools-config73'] ?></label>
													<input type="text" data-toggle="tooltip" class="form-control" name="track_online_shopping" id="track_online_shopping" value="<?php echo $core->track_online_shopping; ?>" placeholder="<?php echo $lang['tools-config73'] ?>">
												</div>
											</div>
										</div>

										<div><br></div>

										<div class="row">
											<div class="col-md-6">
												<label for="firstName1"><?php echo $lang['tools-config89'] ?></label>
												<div class="form-group">

													<div class="btn-group" data-toggle="buttons">
														<label class="btn">
															<div class="custom-control custom-radio">
																<input type="radio" id="customRadio4" name="code_number" value="1" <?php cdp_getChecked($core->code_number, 1); ?> class="custom-control-input">
																<label class="custom-control-label" for="customRadio4"> <?php echo $lang['tools-config90'] ?></label>
															</div>
														</label>
														<label class="btn">
															<div class="custom-control custom-radio">
																<input type="radio" id="customRadio5" name="code_number" value="0" <?php cdp_getChecked($core->code_number, 0); ?> class="custom-control-input">
																<label class="custom-control-label" for="customRadio5"> <?php echo $lang['leftorder14442'] ?></label>
															</div>
														</label>
													</div>

												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for="lastName1"><i class="mdi mdi-cube-send"></i> <?php echo $lang['tools-config88'] ?></label>
													<input type="text" data-toggle="tooltip" class="form-control" name="digit_random" id="digit_random" value="<?php echo $core->digit_random; ?>" placeholder="Track digits random">
												</div>
											</div>
										</div>

										<div><br><br></div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="emailAddress1"><?php echo $lang['tools-config42'] ?></label>
													<textarea class="form-control" rows="6" name="interms" id="interms"><?php echo $core->interms; ?></textarea>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstName1"><?php echo $lang['tools-config43'] ?></label>
													<input type="text" class="form-control" name="signing_company" id="signing_company" value="<?php echo $core->signing_company; ?>" placeholder="<?php echo $lang['tools-config43'] ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="lastName1"><?php echo $lang['tools-config44'] ?></label>
													<input type="text" class="form-control" name="signing_customer" id="signing_customer" value="<?php echo $core->signing_customer; ?>" placeholder="<?php echo $lang['tools-config44'] ?>">
												</div>
											</div>
										</div>
										<hr />
									</section>
									<div class="form-group">
										<div class="col-sm-12">
											<button type="submit" class="btn btn-primary btn-confirmation" name="dosubmit"><?php echo $lang['tools-config56'] ?> <span><i class="icon-ok"></i></span></button>
										</div>
									</div>
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

	<script src="dataJs/config_track.js"></script>
</body>

</html>