<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$errors = array();

if (empty($_POST['country']))
  $errors['country'] =  $lang['validate_field_ajax44'];

if (cdp_countryExists($_POST['state_name']))
  $errors['state_name'] =  $lang['validate_field_ajax45'];

if (empty($_POST['state_name']))
  $errors['state_name'] = $lang['validate_field_ajax46'];

if (empty($errors)) {

  $data = array(
    'country' => cdp_sanitize($_POST['country']),
    'state_name' => cdp_sanitize($_POST['state_name']),
    'iso' => cdp_sanitize($_POST['iso']),
  );

  $insert = cdp_insertState($data);

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
  </div>

<?php
}
?>