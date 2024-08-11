<?php




require_once("../../../loader.php");

$db = new Conexion;
$user = new User;
$core = new Core;
$userData = $user->cdp_getUserData();

$year = date('Y');

$data = array();


for ($month = 1; $month <= 12; $month++) {

	$sql = "SELECT IFNULL(SUM(total_order), 0) as total FROM cdb_add_order WHERE status_courier!=21 and is_pickup=1 and  month(order_date)='$month' AND year(order_date)='$year'";

	$db->cdp_query($sql);
	$total_data = $db->cdp_registro();

	$data[] = number_format($total_data->total, 2, '.', '');
}
echo json_encode($data);
