<?php





require_once("../loader.php");

$db = new Conexion;

$sender = cdp_sanitize($_REQUEST['id']);

$list = array();

$data = [];

$sql = "SELECT *  FROM cdb_senders_addresses WHERE user_id='" . $sender . "'";

$db->cdp_query($sql);
$db->cdp_execute();

$datas = $db->cdp_registros();

foreach ($datas as $key) {

	$db->cdp_query("SELECT * FROM cdb_countries where id= '" . $key->country . "'");
	$country = $db->cdp_registro();

	$db->cdp_query("SELECT * FROM cdb_states where id= '" . $key->state . "'");
	$state = $db->cdp_registro();

	$db->cdp_query("SELECT * FROM cdb_cities where id= '" . $key->city . "'");
	$city = $db->cdp_registro();

	$data[] = array(
		'id' => $key->id_addresses,
		'text' => $key->address,
		'country' => $country->name,
		'state' => $state->name,
		'city' => $city->name,
		'zip_code' => $key->zip_code,
	);
}

echo json_encode($data);
