<?php





require_once("../loader.php");

$db = new Conexion;

$sender_id = cdp_sanitize($_REQUEST['id']);

$search = '';

if (isset($_REQUEST['q'])) {

  $search = cdp_sanitize($_REQUEST['q']);
}

$list = array();
$data = [];


$sql = "SELECT * FROM cdb_recipients
 WHERE 
  (fname LIKE '%" . $search . "%'
  or lname LIKE '%" . $search . "%'
  or email LIKE '%" . $search . "%'
  or phone LIKE '%" . $search . "%'
)
  and sender_id='" . $sender_id . "'";

$db->cdp_query($sql);
$db->cdp_execute();

$datas = $db->cdp_registros();

foreach ($datas as $key) {

  $data[] = array('id' => $key->id, 'text' => $key->fname . " " . $key->lname);
}

echo json_encode($data);
