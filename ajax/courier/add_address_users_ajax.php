<?php




require_once("../../loader.php");
require_once("../../helpers/querys.php");
$user = new User;
$core = new Core;
$errors = array();


if (empty($_POST['address_modal_user_address']))

    $errors['address'] =  $lang['validate_field_ajax100'];


if (empty($_POST['country_modal_user_address']))

    $errors['country'] =  $lang['validate_field_ajax102'];

if (empty($_POST['state_modal_user_address']))

    $errors['state'] = $lang['validate_field_ajax1022212'];

if (empty($_POST['city_modal_user_address']))

    $errors['city'] =  $lang['validate_field_ajax103'];

if (empty($_POST['postal_modal_user_address']))

    $errors['postal'] =  $lang['validate_field_ajax104'];

if (empty($errors)) {

    $db->cdp_query("
                  INSERT INTO cdb_senders_addresses 
                  (
                    country,
                    state,
                    city,
                    address,
                    zip_code,
                    user_id                                
                  )
                  VALUES 
                  (
                      :country,
                      :state,
                      :city, 
                      :address,
                      :zip_code,
                      :user_id                            
                  )
                ");

    $db->bind(':country',  cdp_sanitize($_POST["country_modal_user_address"]));
    $db->bind(':state',  cdp_sanitize($_POST["state_modal_user_address"]));
    $db->bind(':city',  cdp_sanitize($_POST["city_modal_user_address"]));
    $db->bind(':address',  cdp_sanitize($_POST["address_modal_user_address"]));
    $db->bind(':zip_code',  cdp_sanitize($_POST["postal_modal_user_address"]));
    $db->bind(':user_id',  $_GET["sender"]);

    $insert = $db->cdp_execute();

    $last_address_id = $db->dbh->lastInsertId();

    $db->cdp_query("SELECT * FROM cdb_senders_addresses where id_addresses= '" . $last_address_id . "'");
    $customer_address = $db->cdp_registro();

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
    <div class="alert alert-info" id="success-alert">
        <p><span class="icon-info-sign"></span><i class="close icon-remove-circle"></i>
            <?php
            foreach ($messages as $message) {
                echo $message;
            }
            ?>
        </p>

        <script>
            $("#add_address_users_from_modal_shipments")[0].reset();
        </script>
    </div>

    <script>
        var data_address = {
            id: <?php echo $customer_address->id_addresses; ?>,
            text: "<?php echo $customer_address->address; ?>"
        };

        var newOption = new Option(data_address.text, data_address.id, false, false);

        $('#sender_address_id').append(newOption).trigger('change');
        $('#sender_address_id').val(data_address.id).trigger('change');
    </script>

<?php
}
?>