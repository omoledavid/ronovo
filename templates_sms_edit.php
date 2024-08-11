<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


  include('views/tools/templates_sms/templates_sms_edit.php');
} else {

  header("location: login.php");
  exit;
}
