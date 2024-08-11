<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/packages_registered/report_packages_registered_driver/report_packages_registered_driver_list.php');
} else {

  header("location: login.php");
  exit;
}
