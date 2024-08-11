<?php





require_once("../loader.php");

$db = new Conexion;

$search = cdp_sanitize($_REQUEST['q']);

$list = array();
$data = [];


$sql = "SELECT * FROM cdb_users
 WHERE
  (fname LIKE '%" . $search . "%'
  or lname LIKE '%" . $search . "%'  
  or email LIKE '%" . $search . "%'
  or phone LIKE '%" . $search . "%'
  or locker LIKE '%" . $search . "%')

   and userlevel='1'";

$db->cdp_query($sql);
$db->cdp_execute();

$datas = $db->cdp_registros();

foreach ($datas as $key) {

   $data[] = array('id' => $key->id, 'text' => $key->fname . " " . $key->lname);
}

echo json_encode($data);
