<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$errors = array();

if (empty($_POST['name_com']))
    $errors['name_com'] = $lang['validate_field_ajax98'];

if (cdp_courierExists9y45g($_POST['name_com']))

    $errors['name_com'] = $lang['validate_field_ajax99'];

if (empty($_POST['address_cou']))
    $errors['address_cou'] = $lang['validate_field_ajax100'];

if (empty($_POST['phone_cou']))
    $errors['phone_cou'] = $lang['validate_field_ajax101'];

if (empty($_POST['country_cou']))
    $errors['country_cou'] = $lang['validate_field_ajax102'];

if (empty($_POST['city_cou']))
    $errors['city_cou'] = $lang['validate_field_ajax103'];

if (empty($_POST['postal_cou']))
    $errors['postal_cou'] = $lang['validate_field_ajax104'];


if (empty($errors)) {

    $data = array(
        'name_com' => cdp_sanitize($_POST['name_com']),
        'address_cou' => cdp_sanitize($_POST['address_cou']),
        'phone_cou' => cdp_sanitize($_POST['phone_cou']),
        'country_cou' => cdp_sanitize($_POST['country_cou']),
        'city_cou' => cdp_sanitize($_POST['city_cou']),
        'postal_cou' => cdp_sanitize($_POST['postal_cou'])
    );

    $insert = cdp_insertCourierCompany($data);

    if ($insert) {
        $messages[] = $lang['message_ajax_success_add'];
    } else {
        $errors['critical_error'] = $lang['message_ajax_error1'];
    }
}


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
?>