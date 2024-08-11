<?php




require_once("../../loader.php");
require_once("../../helpers/querys.php");

session_start();

$status = intval($_GET['status']);
$data = json_decode($_GET['checked_data']);

foreach ($data as $key) {

    cdp_updateStatusConsolidateMultiple($key, $status);


    $courier = cdp_getConsolidateMultiple($key);

    $receiver = $courier->receiver_id;
    $prefix = $courier->c_prefix;
    $office = $courier->origin_off;

    $tracking = $prefix . $key;

    $comments = $lang['multiple_updated1'];

    $user = $_SESSION['userid'];

    cdp_updateConsolidateTrackingMultiple($tracking, $status, $comments, $office, $user);

    $message[$key] = $key . ' ' . $lang['modal-text30'];
}


if (!empty($message)) {
?>
    <div class="alert alert-success" id="success-alert">
        <p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i>
            <span>Success! </span> Successfully updated shipments
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
