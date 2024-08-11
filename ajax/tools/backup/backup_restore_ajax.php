<?php




require_once("../../../loader.php");
require_once("../../../helpers/backups_function.php");

/* == Delete SQL Backup == */
if (isset($_POST['restoreBackup'])) :

  $ok = doRestore($_POST['restoreBackup']);


  if ($ok == 1) { ?>

    <div class="alert alert-info" id="success-alert">
      <p><span class="icon-info-sign"></span><i class="close icon-remove-circle"></i>
        Database restored successfully!
      </p>
    </div>
  <?php
  } else {  ?>

    <div class="alert alert-info" id="danger-alert">
      <p><span class="icon-info-sign"></span><i class="close icon-remove-circle"></i>
        <?php echo $lang['message_ajax_error2']; ?>
      </p>
    </div>
<?php
  }

endif;
