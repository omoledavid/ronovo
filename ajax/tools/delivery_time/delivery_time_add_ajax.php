<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$errors = array();

if (empty($_POST['delitime']))

    $errors['delitime'] = $lang['validate_field_ajax13'];

if (cdp_DelitimeExists($_POST['delitime']))

    $errors['delitime'] = $lang['validate_field_ajax14'];


if (empty($_POST['detail']))

    $errors['detail'] = $lang['validate_field_ajax15'];

if (empty($errors)) {

    $data = array(
        'delitime' => cdp_sanitize($_POST['delitime']),
        'detail' => cdp_sanitize($_POST['detail'])
    );

    $insert = cdp_insertDeliverytime($data);

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