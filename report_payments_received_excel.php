<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/reports/accounts_receivable/payments_received/report_payments_received_excel.php');
} else {

  header("location: login.php");
  exit;
}
