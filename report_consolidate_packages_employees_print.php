<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/consolidate_packages/report_consolidate_employees/report_consolidate_employees_print.php');
} else {

  header("location: login.php");
  exit;
}
