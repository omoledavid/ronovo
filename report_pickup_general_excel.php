<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/pickup/report_pickup_general/report_pickup_general_excel.php');
} else {

  header("location: login.php");
  exit;
}
