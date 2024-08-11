<?php





require_once("../loader.php");

$db = new Conexion;

$list = array();

$data = [];

$sql = "SELECT *  FROM cdb_packaging ";

$db->cdp_query($sql);
$db->cdp_execute();

$datas = $db->cdp_registros();

foreach ($datas as $key) {

	$data[] = array(

		'id' => $key->id,
		'name_pack' => $key->name_pack,

	);
}

echo json_encode($data);
