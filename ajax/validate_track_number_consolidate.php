<?php





require_once("../loader.php");

$db = new Conexion;

$search = cdp_sanitize($_REQUEST['track']);
$search = intval($search);


$sql_digits = "SELECT * FROM cdb_settings";

$db->cdp_query($sql_digits);
$db->cdp_execute();
$trackd = $db->cdp_registro();

$digits = $trackd->track_digit;

$format_track = str_pad($search, "" . $digits . "", "0", STR_PAD_LEFT);

$sql = "SELECT c_no FROM cdb_consolidate WHERE c_no = '" . $format_track . "'";

$db->cdp_query($sql);
$db->cdp_execute();

$data = $db->cdp_registro();

if ($data) {

	echo json_encode(true);
} else {

	echo json_encode(false);
}
