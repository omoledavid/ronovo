<?php




require_once("../../loader.php");
require_once("../../helpers/querys.php");


$errors = array();

if (empty($_POST['smtp_names']))

  $errors['smtp_names'] = $lang['validate_field_ajax63'];

if (empty($_POST['email_address']))

  $errors['email_address'] = $lang['validate_field_ajax64'];

if (empty($_POST['smtp_host']))

  $errors['smtp_host'] = $lang['validate_field_ajax65'];

if (empty($_POST['smtp_user']))

  $errors['smtp_user'] = $lang['validate_field_ajax66'];

if (empty($_POST['smtp_password']))

  $errors['smtp_password'] = $lang['validate_field_ajax67'];

if (empty($_POST['smtp_port']))

  $errors['smtp_port'] = $lang['validate_field_ajax68'];

if (empty($_POST['smtp_secure']))

  $errors['smtp_secure'] = $lang['validate_field_ajax69'];

if (CDP_APP_MODE_DEMO === true) {
?>

  <div class="alert alert-warning" id="success-alert">
    <p><span class="icon-minus-sign"></span><i class="close icon-remove-circle"></i>
      <span>Error! </span> There was an error processing the request
    <ul class="error">

      <li>
        <i class="icon-double-angle-right"></i>
        This is a demo version, this action is not allowed, <a class="btn waves-effect waves-light btn-xs btn-success" href="https://codecanyon.net/item/courier-deprixa-pro-integrated-web-system-v32/15216982" target="_blank">Buy DEPRIXA PRO</a> the full version and enjoy all the functions...

      </li>


    </ul>
    </p>
  </div>
  <?php
} else {

  if (empty($errors)) {

    $data = array(

      'mailer' => cdp_sanitize($_POST['mailer']),
      'smtp_names' => cdp_sanitize($_POST['smtp_names']),
      'email_address' => cdp_sanitize($_POST['email_address']),
      'smtp_host' => cdp_sanitize($_POST['smtp_host']),
      'smtp_user' => cdp_sanitize($_POST['smtp_user']),
      'smtp_password' => cdp_sanitize($_POST['smtp_password']),
      'smtp_port' => cdp_sanitize($_POST['smtp_port']),
      'smtp_secure' => cdp_sanitize($_POST['smtp_secure']),
    );


    $insert = cdp_updateConfigSmtpemailr2g61($data);
    if ($insert) {

      $messages[] = $lang['message_ajax_success_updated'];
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
}
?>