<?php





require_once("../loader.php");

$db = new Conexion;

$list = array();

$data = [];

$sql = "SELECT *  FROM cdb_category ";

$db->cdp_query($sql);
$db->cdp_execute();

$datas = $db->cdp_registros();

foreach ($datas as $key) {

	$data[] = array(

		'id' => $key->id,
		'name_item' => $key->name_item,

	);
}

echo json_encode($data);
