<?php




require_once("loader.php");

$user = new User();
$core = new Core();
// ... ask if we are logged in here:
if ($user->cdp_loginCheck() == true) {


    include('views/consolidate_packages/payments_gateways_list.php');
} else {

    header("location: login.php");
    exit;
}
