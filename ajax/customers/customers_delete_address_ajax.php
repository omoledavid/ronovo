<?php




require_once("../../loader.php");
require_once("../../helpers/querys.php");

$id = $_REQUEST['id'];

$errors = array();


if (empty($errors)) {

    $verifyExistsShipment = cdp_verifyReferentialIntegrity('cdb_add_order', 'sender_address_id', $id);
    $verifyExistsCustomerPackages = cdp_verifyReferentialIntegrity('cdb_customers_packages', 'sender_address_id', $id);
    $verifyExistsConsolidate = cdp_verifyReferentialIntegrity('cdb_consolidate', 'sender_address_id', $id);

    if ($verifyExistsShipment || $verifyExistsCustomerPackages || $verifyExistsConsolidate) {
        $errors['constrains'] = $lang['validate_field_ajax133'];
    } else {

        $delete = cdp_deleteCustomerAddress($id);
        if ($delete) {
            $messages[] = $lang['message_ajax_success_delete'];
        } else {
            $errors['critical_error'] = $lang['message_ajax_error1'];
        }
    }
}





if (!empty($errors)) {

    echo json_encode([
        'success' => false,
        'errors' => $errors
    ]);
} else {

    echo json_encode([
        'success' => true,
        'messages' => $messages
    ]);
}
