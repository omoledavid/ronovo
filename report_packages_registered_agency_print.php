<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/packages_registered/report_packages_registered_agency/report_packages_registered_agency_print.php');
} else {

  header("location: login.php");
  exit;
}
