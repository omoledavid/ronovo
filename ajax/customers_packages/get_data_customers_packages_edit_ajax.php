<?php





require_once("../../loader.php");

$db = new Conexion;

$order_id = cdp_sanitize($_GET['id']);
$list = array();

$sql = "SELECT * FROM cdb_customers_packages_detail  WHERE  order_id='" . $order_id . "'";

$db->cdp_query($sql);
$db->cdp_execute();

$data = $db->cdp_registros();

foreach ($data as $key) {
    $list[] = array(
        'id' => $key->order_item_id,
        'qty' => $key->order_item_quantity,
        'description' => $key->order_item_description,
        'length' => $key->order_item_length,
        'width' => $key->order_item_width,
        'height' => $key->order_item_height,
        'weight' => $key->order_item_weight,
        'declared_value' => $key->order_item_declared_value,
        'fixed_value' => $key->order_item_fixed_value,
    );
}

echo json_encode($list);
