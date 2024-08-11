<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$errors = array();

if (empty($_POST['mod_style']))

    $errors['mod_style'] = $lang['validate_field_ajax106'];

if (cdp_statusCourierExists($_POST['mod_style']))

    $errors['mod_style'] =  $lang['validate_field_ajax107'];

if (empty($_POST['detail']))

    $errors['detail'] =  $lang['validate_field_ajax108'];

if (empty($_POST['color']))

    $errors['color'] =  $lang['validate_field_ajax109'];

if (cdp_colorStatusCourierExists($_POST['color']))

    $errors['color'] = $lang['validate_field_ajax110'];

if (empty($errors)) {

    $data = array(

        'mod_style' => cdp_sanitize($_POST['mod_style']),
        'detail' => cdp_sanitize($_POST['detail']),
        'color' => cdp_sanitize($_POST['color'])
    );

    $insert = cdp_insertStatusCourier($data);

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