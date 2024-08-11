<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$errors = array();

if (empty($_POST['country']))
  $errors['country'] = $lang['validate_field_ajax48'];

if (empty($_POST['state']))
  $errors['state'] = $lang['validate_field_ajax49'];

if (cdp_cityExists($_POST['city_name']))
  $errors['city_name'] = $lang['validate_field_ajax50'];

if (empty($_POST['city_name']))
  $errors['city_name'] = $lang['validate_field_ajax51'];

if (empty($errors)) {

  $data = array(
    'state' => cdp_sanitize($_POST['state']),
    'city_name' => cdp_sanitize($_POST['city_name']),
  );

  $insert = cdp_insertCity($data);
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