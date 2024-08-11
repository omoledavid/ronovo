<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/customer_packages/print_label_package.php');
} else {

  header("location: login.php");
  exit;
}
