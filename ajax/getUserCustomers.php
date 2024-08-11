<?php




require_once("../loader.php");

$db = new Conexion;

$search = cdp_sanitize($_REQUEST['term']);

$sql = "SELECT CONCAT(fname, ' ', lname) as label, id, fname, lname, email, phone, address,country, city, postal FROM cdb_users WHERE fname LIKE '%" . $search . "%'";

$db->cdp_query($sql);
$db->cdp_execute();

$data = $db->cdp_registros();

echo json_encode($data);
