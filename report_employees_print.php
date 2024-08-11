<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/shipments/report_employees/report_employees_print.php');
} else {

  header("location: login.php");
  exit;
}
