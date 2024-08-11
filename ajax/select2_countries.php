<?php





require_once("../loader.php");

$db = new Conexion;

$sWhere = '';
if (isset($_REQUEST['q'])) {
    $search = cdp_sanitize($_REQUEST['q']);
    $sWhere = "and  name LIKE '%" . $search . "%'";
}
$list = array();
$data = [];


$sql = "SELECT * FROM cdb_countries where is_active=1 $sWhere";

$db->cdp_query($sql);
$db->cdp_execute();

$datas = $db->cdp_registros();

foreach ($datas as $key) {

    $data[] = array('id' => $key->id, 'text' => $key->name);
}

echo json_encode($data);
