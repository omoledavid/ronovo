<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/consolidate_packages/report_consolidate_agency/report_consolidate_agency_excel.php');
} else {

  header("location: login.php");
  exit;
}
