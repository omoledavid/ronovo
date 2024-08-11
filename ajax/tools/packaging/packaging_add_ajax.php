<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$errors = array();

if (empty($_POST['name_pack']))
    $errors['name_pack'] = $lang['validate_field_ajax10'];

if (cdp_packExists($_POST['name_pack']))
    $errors['name_pack'] = $lang['validate_field_ajax11'];
if (empty($_POST['detail_pack']))
    $errors['detail_pack'] = $lang['validate_field_ajax12'];


if (empty($errors)) {

    $data = array(
        'name_pack' => cdp_sanitize($_POST['name_pack']),
        'detail_pack' => cdp_sanitize($_POST['detail_pack'])
    );

    $insert = cdp_insertPackaging($data);

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