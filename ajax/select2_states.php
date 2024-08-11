<?php





require_once("../loader.php");

$db = new Conexion;

$country = cdp_sanitize($_REQUEST['id']);

$search = '';
if (isset($_REQUEST['q'])) {
    $search = cdp_sanitize($_REQUEST['q']);
}

$list = array();
$data = [];


$sql = "SELECT * FROM cdb_states WHERE  name LIKE '%" . $search . "%' and country_id='" . $country . "'";

$db->cdp_query($sql);
$db->cdp_execute();

$datas = $db->cdp_registros();

foreach ($datas as $key) {

    $data[] = array('id' => $key->id, 'text' => $key->name);
}

echo json_encode($data);
