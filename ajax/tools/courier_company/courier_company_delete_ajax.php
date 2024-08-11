<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$id = $_REQUEST['id'];


$errors = array();

if (empty($errors)) {

    $verifyExistsShipment = cdp_verifyReferentialIntegrity('cdb_add_order', 'order_courier', $id);
    $verifyExistsCustomerPackages = cdp_verifyReferentialIntegrity('cdb_customers_packages', 'order_courier', $id);
    $verifyExistsConsolidate = cdp_verifyReferentialIntegrity('cdb_consolidate', 'order_courier', $id);

    if ($verifyExistsShipment || $verifyExistsCustomerPackages || $verifyExistsConsolidate) {
        $errors['constrains'] = $lang['validate_field_ajax105'];
    } else {

        $delete = cdp_deleteCourierCompany($id);
        if ($delete) {
            $messages[] = $lang['message_ajax_success_delete'];
        } else {
            $errors['critical_error'] = $lang['message_ajax_error1'];
        }
    }
}

if (CDP_APP_MODE_DEMO === true) {
?>

    <div class="alert alert-warning" id="success-alert">
        <p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i>
            <span>Error! </span> There was an error processing the request
        <ul class="error">

            <li>
                <i class="icon-double-angle-right"></i>
                This is a demo version, this action is not allowed, <a class="btn waves-effect waves-light btn-xs btn-success" href="https://codecanyon.net/item/courier-deprixa-pro-integrated-web-system-v32/15216982" target="_blank">Buy DEPRIXA PRO</a> the full version and enjoy all the functions...

            </li>


        </ul>
        </p>
    </div>
    <?php
} else {
    if (!empty($errors)) {
    ?>
        <div class="alert alert-danger" id="success-alert">
            <p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i>
                <?php echo $lang['message_ajax_error2']; ?>
            <ul class="error">
                <?php
                foreach ($errors as $error) { ?>
                    <li>
                        <i class="icon-double-angle-right"></i>
                        <?php
                        echo $error;

                        ?>

                    </li>
                <?php

                }
                ?>


            </ul>
            </p>
        </div>



    <?php
    }

    if (isset($messages)) {

    ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <p><span class="icon-info-sign"></span>
                <?php
                foreach ($messages as $message) {
                    echo $message;
                }
                ?>
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

<?php
    }
}
