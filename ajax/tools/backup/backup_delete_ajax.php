<?php





/* == Delete SQL Backup == */
if (isset($_POST['deleteBackup'])) :
  $action = @unlink('../../../backups/' . trim($_POST['deleteBackup']));

?>

  <div class="alert alert-info" id="success-alert">
    <p><span class="icon-info-sign"></span><i class="close icon-remove-circle"></i>
      Backup deleted successfully!
    </p>
  </div>
<?php


endif;
