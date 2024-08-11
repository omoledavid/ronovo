<?php




require_once("../../loader.php");
require_once("../../helpers/querys.php");

session_start();

$status = intval($_GET['status']);
$data = json_decode($_GET['checked_data']);

foreach ($data as $key) {

    cdp_updateStatusCourierMultiple($key, $status);


    $courier = cdp_getCourierMultiple($key);

    $receiver = $courier->receiver_id;
    $prefix = $courier->order_prefix;
    $office = $courier->origin_off;

    $tracking = $prefix . $key;

    $comments = $lang['multiple_updated1'];
    $user = $_SESSION['userid'];

    cdp_updateShipTrackingMultiple($tracking, $status, $comments, $office, $user);

    $message[$key] = $key . ' ' . $lang['modal-text30'];
}

if (!empty($message)) {
?>
    <div class="alert alert-success" id="success-alert">
        <p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i>
            <?php echo  $lang['message_ajax_success_updated']; ?>
        <ul class="error">
            <?php
            foreach ($message as $msj) { ?>
                <li>
                    <i class="icon-double-angle-right"></i>
                    <?php
                    echo $msj;

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
