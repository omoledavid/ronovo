<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/pickup/report_pickup_customers/report_pickup_customers_excel.php');
} else {

  header("location: login.php");
  exit;
}
