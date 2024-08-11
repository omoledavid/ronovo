<?php




require_once("../../../loader.php");
require_once("../../../helpers/querys.php");

$errors = array();

if (empty($_POST['name_branch']))
  $errors['name_branch'] =  $lang['validate_field_ajax92'];

if (cdp_branchofficeExistsr9ufr($_POST['name_branch']))
  $errors['name_branch'] =  $lang['validate_field_ajax93'];


if (empty($_POST['branch_address']))
  $errors['branch_address'] =  $lang['validate_field_ajax94'];

if (empty($_POST['branch_city']))
  $errors['branch_city'] = $lang['validate_field_ajax95'];

if (empty($_POST['phone_branch']))
  $errors['phone_branch'] =  $lang['validate_field_ajax96'];


if (empty($errors)) {

  $data = array(
    'name_branch' => cdp_sanitize($_POST['name_branch']),
    'branch_address' => cdp_sanitize($_POST['branch_address']),
    'branch_city' => cdp_sanitize($_POST['branch_city']),
    'phone_branch' => cdp_sanitize($_POST['phone_branch'])
  );

  $insert = cdp_insertBranchOffices($data);

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