<?php
// *************************************************************************
// *                                                                       *
// * VenoXpress - Integrated Web Shipping System                         *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: support@jaom.info                                              *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************



require_once('helpers/querys.php');
require_once("helpers/phpmailer/class.phpmailer.php");
require_once("helpers/phpmailer/class.smtp.php");
require_once 'helpers/vendor/autoload.php';
require_once 'helpers/src/src/Twilio/autoload.php';

use Twilio\Rest\Client;

$userData = $user->cdp_getUserData();

if (isset($_GET['id'])) {
    $data = cdp_getCourierPrint($_GET['id']);
}

if (!isset($_GET['id']) or $data['rowCount'] != 1) {
    cdp_redirect_to("courier_list.php");
}

$row = $data['data'];

$db->cdp_query("SELECT * FROM cdb_users where id= '" . $row->receiver_id . "'");
$receiver_data = $db->cdp_registro();

$office = $core->cdp_getOffices();
$statusrow = $core->cdp_getStatus();


$db->cdp_query("SELECT * FROM cdb_users where id= '" . $row->sender_id . "'");
$sender_data = $db->cdp_registro();

$driverrow = $user->cdp_userAllDriver();


if (isset($_POST['person_receives'])) {
    $db = new Conexion;


    $id = $_GET['id'];

    $errors = array();

    if (empty($_POST['deliver_date']))

        $errors['deliver_date'] = $lang['validate_field_ajax159'];

    if (empty($_POST['person_receives']))

        $errors['person_receives'] = $lang['validate_field_ajax162'];

    if (intval($_POST['driver_id']) <= 0)

        $errors['driver_id'] =  $lang['validate_field_ajax163'];

    $status_courier = 8;
    //signature update  
    if (isset($_POST['sig-dataUrl'])) {

        $img = $_POST['sig-dataUrl']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        file_put_contents('doc_signs/shipments_courier/' . $id . '.png', base64_decode($img));
    }


    if (!empty($_FILES['miarchivo']['name'])) {

        $target_dir = "files/";
        $image_name = time() . "_" . basename($_FILES["miarchivo"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $imageFileZise = $_FILES["miarchivo"]["size"];

        if (($imageFileType != "jpg" && $imageFileType != "png")) {

            $errors['miarchivo'] = $lang['validate_field_ajax62'];
        } else if (empty(getimagesize($_FILES['miarchivo']['tmp_name']))) { //1048576 byte=1MB

            $errors['miarchivo'] = $lang['validate_field_ajax62'];
        } else {

            move_uploaded_file($_FILES["miarchivo"]["tmp_name"], $target_file);
            $photo_delivered = 'files/' . $image_name;
        }
    }


    if (empty($errors)) {


        $db->cdp_query('UPDATE cdb_add_order SET    
                         
                status_courier =:status_courier,
                person_receives=:person_receives,
                photo_delivered=:photo_delivered
                where  order_id=:id      
            ');


        $db->bind(':status_courier', $status_courier);
        $db->bind(':person_receives', $_POST['person_receives']);
        $db->bind(':id', $id);
        $db->bind(':photo_delivered', $photo_delivered);


        $db->cdp_execute();


        $order_track = $row->order_prefix . $row->order_no;
        $date = date('Y-m-d', strtotime(trim($_POST["deliver_date"])));
        $time = date("H:i:s");
        $date = $date . ' ' . $time;


        $db->cdp_query("
                INSERT INTO cdb_courier_track 
                (
                    order_track,
                    t_date,
                    status_courier,
                    user_id
                    )
                VALUES
                    (
                    :order_track,
                    :t_date,
                    :status_courier,                   
                    :user_id
                    )
            ");



        $db->bind(':order_track',  $order_track);
        $db->bind(':user_id',  $_SESSION['userid']);
        $db->bind(':t_date',  trim($date));
        $db->bind(':status_courier', $status_courier);

        $db->cdp_execute();


        //INSERT HISTORY USER

        $db->cdp_query("
                INSERT INTO cdb_order_user_history 
                (
                    user_id,
                    order_id,
                    order_track,
                    action,
                    date_history                   
                    )
                VALUES
                    (
                    :user_id,
                    :order_id,
                    :order_track,
                    :action,
                    :date_history
                    )
            ");



        $db->bind(':order_id',  $id);
        $db->bind(':order_track',  $order_track);
        $db->bind(':user_id',  $_SESSION['userid']);
        $db->bind(':action',  $lang['notification_shipment12']);
        $db->bind(':date_history',  trim($date));
        $db->cdp_execute();


        // SAVE NOTIFICATION
        $db->cdp_query("
                INSERT INTO cdb_notifications 
                (
                    user_id,
                    order_id,
                    notification_description,
                    shipping_type,
                    notification_date

                )
                VALUES
                    (
                    :user_id,                    
                    :order_id,
                    :notification_description,
                    :shipping_type,
                    :notification_date                    
                    )
            ");



        $db->bind(':user_id',  $_SESSION['userid']);
        $db->bind(':order_id',  $_GET['id']);
        $db->bind(':notification_description',  $lang['notification_shipment13']);
        $db->bind(':shipping_type', '1');
        $db->bind(':notification_date',  date("Y-m-d H:i:s"));

        $db->cdp_execute();


        $notification_id = $db->dbh->lastInsertId();

        //NOTIFICATION TO DRIVER

        cdp_insertNotificationsUsers($notification_id, $row->driver_id);


        //NOTIFICATION TO ADMIN AND EMPLOYEES

        $users_employees = cdp_getUsersAdminEmployees();

        foreach ($users_employees as $key) {

            cdp_insertNotificationsUsers($notification_id, $key->id);
        }


        //NOTIFICATION TO CUSTOMER

        cdp_insertNotificationsUsers($notification_id, $row->sender_id);


        $sql = "SELECT * FROM cdb_settings";

        $db->cdp_query($sql);

        $db->cdp_execute();

        $settings = $db->cdp_registro();

        $site_email = $settings->site_email;
        $check_mail = $settings->mailer;
        $names_info = $settings->smtp_names;
        $mlogo      = $settings->logo;
        $msite_url  = $settings->site_url;
        $msnames    = $settings->site_name;

        //SMTP

        $smtphoste = $settings->smtp_host;
        $smtpuser = $settings->smtp_user;
        $smtppass = $settings->smtp_password;
        $smtpport = $settings->smtp_port;
        $smtpsecure = $settings->smtp_secure;


        $fullshipment = $row->order_prefix . $row->order_no;
        $date_ship   = date("Y-m-d H:i:s a");

        $app_url = $settings->site_url . 'track.php?order_track=' . $fullshipment;
        $subject = $lang['notification_shipment14'] . $lang['notification_shipment3'] . $fullshipment;
        $status_courier_deliver =  $lang['filter73'];



        $email_template = cdp_getEmailTemplatesdg1i4(18);

        $body = str_replace(
            array(
                '[NAME]',
                '[TRACKING]',
                '[DELIVERY_TIME]',
                '[COURIER]',
                '[URL]',
                '[URL_LINK]',
                '[SITE_NAME]',
                '[URL_SHIP]'
            ),
            array(
                $sender_data->fname . ' ' . $sender_data->lname,
                $fullshipment,
                $date_ship,
                $status_courier_deliver,
                $msite_url,
                $mlogo,
                $msnames,
                $app_url
            ),
            $email_template->body
        );


        $newbody = cdp_cleanOut($body);


        //SENDMAIL PHP

        if ($check_mail == 'PHP') {

            $message = $newbody;
            $to = $sender_data->email;
            $from = $site_email;

            $header = "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html; charset=UTF-8 \r\n";
            $header .= "From: " . $from . " \r\n";

            mail($to, $subject, $message, $header);
        } elseif ($check_mail == 'SMTP') {


            //PHPMAILER PHP   


            $destinatario = $sender_data->email;


            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

            //Server settings

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $smtphoste;                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $smtpuser;                   // SMTP username
            $mail->Password = $smtppass;               // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($site_email, $names_info);
            $mail->addAddress($destinatario);     // Add a recipient
            $mail->addCC($site_email,  $lang['notification_shipment14']);

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = "
                <html> 
                <body> 
                <p>{$newbody}</p>
                </body> 
                </html>
                <br />"; // Texto del email en formato HTML

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            try {
                $estadoEnvio = $mail->Send();
                //echo "El correo fue enviado correctamente.";
            } catch (Exception $e) {
                //echo "Ocurrió un error inesperado.";
            }
        }





        if (isset($_POST['notify_whatsapp_sender']) && $_POST['notify_whatsapp_sender'] == 1) {


            if ($core->twilio_sid != null && $core->twilio_token != null && $core->twilio_number != null) {

                $phone_sender = $sender_data->phone;


                $sid    = $core->twilio_sid;
                $token  = $core->twilio_token;

                $twilio = new Client($sid, $token);

                $message = $twilio->messages
                    ->create(
                        "whatsapp:" . $phone_sender, // to 
                        array(
                            "from" => "whatsapp:" . $core->twilio_number,
                            "body" => $lang['notification_shipment14'] . $lang['notification_shipment3'] . $fullshipment . $lang['notification_shipment4'] . $app_url
                        )
                    );
            }
        }


        if (isset($_POST['notify_whatsapp_receiver']) && $_POST['notify_whatsapp_receiver'] == 1) {


            if ($core->twilio_sid != null && $core->twilio_token != null && $core->twilio_number != null) {

                $phone_receiver = $receiver_data->phone;


                $sid    = $core->twilio_sid;
                $token  = $core->twilio_token;

                $twilio = new Client($sid, $token);

                $message = $twilio->messages
                    ->create(
                        "whatsapp:" . $phone_receiver, // to 
                        array(
                            "from" => "whatsapp:" . $core->twilio_number,
                            "body" => $lang['notification_shipment14'] . $lang['notification_shipment3'] . $fullshipment . $lang['notification_shipment4'] . $app_url
                        )
                    );
            }
        }



        //TEMPLATE NOTIFY SMS SENDER

        // Input string
        $subjectVal_sender = cdp_getsmsTemplates(5);

        // Array containing search string
        $searchVal_sender = array("[NAME]", "[TRACK]", "[LINK]");

        // Array containing replace string from  search string
        $replaceVal_sender = array("" . $sender_data->fname . ' ' . $sender_data->lname . "", "" . $fullshipment . "", "" . $app_url . "");

        $sender_body = $subjectVal_sender->body;

        // Function to replace string
        $resStr_sender = str_replace($searchVal_sender, $replaceVal_sender, $sender_body);

        $newbodyS_sender = $resStr_sender;


        //TEMPLATE NOTIFY SMS RECEIVER

        // Input string
        $subjectVal_receiver = cdp_getsmsTemplates(6);

        // Array containing search string
        $searchVal_receiver = array("[NAME]", "[TRACK]", "[LINK]");

        // Array containing replace string from  search string
        $replaceVal_receiver = array("" . $sender_data->fname . ' ' . $sender_data->lname . "", "" . $fullshipment . "", "" . $app_url . "");

        $receiver_body = $subjectVal_receiver->body;

        // Function to replace string
        $resStr_receiver = str_replace($searchVal_receiver, $replaceVal_receiver, $receiver_body);

        $newbodyS_receiver = $resStr_receiver;



        //NOTIFY SMS API
        if (isset($_POST['notify_sms_sender']) && $_POST['notify_sms_sender'] == 1) {


            if ($core->twilio_sms_sid != null && $core->twilio_sms_token != null && $core->twilio_sms_number != null) {


                $phone_sender = $sender_data->phone;

                // Your Account SID and Auth Token from twilio.com/console
                $account_sid = $core->twilio_sms_sid;
                $auth_token = $core->twilio_sms_token;
                // In production, these should be environment variables. E.g.:
                // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

                // A Twilio number you own with SMS capabilities
                $twilio_numbers = $core->twilio_sms_number;

                $client = new Client($account_sid, $auth_token);
                $client->messages->create(
                    // Where to send a text message (your cell phone?)
                    '' . $phone_sender . '',
                    array(
                        'from' => $twilio_numbers,
                        'body' => htmlentities('' . $newbodyS_sender . '')
                    )
                );
            }
        }


        if (isset($_POST['notify_sms_receiver']) && $_POST['notify_sms_receiver'] == 1) {


            if ($core->twilio_sms_sid != null && $core->twilio_sms_token != null && $core->twilio_sms_number != null) {

                $phone_receiver = $receiver_data->phone;

                // Your Account SID and Auth Token from twilio.com/console
                $account_sid = $core->twilio_sms_sid;
                $auth_token = $core->twilio_sms_token;
                // In production, these should be environment variables. E.g.:
                // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

                // A Twilio number you own with SMS capabilities
                $twilio_numbers = $core->twilio_sms_number;

                $client = new Client($account_sid, $auth_token);
                $client->messages->create(
                    // Where to send a text message (your cell phone?)
                    '' . $phone_receiver . '',
                    array(
                        'from' => $twilio_numbers,
                        'body' => htmlentities('' . $newbodyS_receiver . '')
                    )
                );
            }
        }


        header("location:courier_view.php?id=$id");
    }
}


?>
<!DOCTYPE html>
<html dir="<?php echo $direction_layout; ?>" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/<?php echo $core->favicon ?>">
    <title><?php echo $lang['deliver-ship1'] ?> | <?php echo $core->site_name ?></title>

    <?php include 'views/inc/head_scripts.php'; ?>
    <link rel="stylesheet" href="assets/template/assets/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">

    <link href="assets/template/assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
    <link href="assets/template/dist/css/custom_swicth.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->


    <?php include 'views/inc/preloader.php'; ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->

        <?php include 'views/inc/topbar.php'; ?>

        <!-- End Topbar header -->


        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <?php include 'views/inc/left_sidebar.php'; ?>


        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">


            <div class="container-fluid mb-4">


                <div class="row justify-content-center">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <!-- <div id="loader" style="display:none"></div> -->
                                <div id="resultados_ajax">
                                    <?php if (!empty($errors)) { ?>
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
                                    } ?>

                                </div>
                                <form name="myForm" class="xform" enctype="multipart/form-data" id="deliver_form" method="POST">
                                    <header>
                                        <h4 class="modal-title"> <b class="text-danger"><?php echo $lang['status-ship1'] ?> </b> <b>| <?php echo $row->order_prefix . $row->order_no; ?></b>
                                        </h4>
                                        <hr>
                                    </header>


                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="inputEmail3" class="control-label col-form-label"><?php echo $lang['deliver-ship4'] ?></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="deliver_date" id="deliver_date" value="<?php echo date('Y-m-d'); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $lang['add-title16'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputname" class="control-label col-form-label"><?php echo $lang['deliver-ship12'] ?></label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select col-12" id="driver_id" name="driver_id" required>
                                                    <option value=""><?php echo $lang['deliver-ship13'] ?></option>
                                                    <?php foreach ($driverrow as $row) : ?>
                                                        <option value="<?php echo $row->id; ?>" <?php if ($row->id == $_SESSION['userid']) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $row->fname . ' ' . $row->lname; ?>

                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="message-text" class="control-label"><?php echo $lang['deliver-ship6'] ?></label>
                                            <input type="text" name="person_receives" id="person_receives" class="form-control" placeholder="<?php echo $lang['deliver-ship6'] ?>" required="">
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="subtitle"><?php echo $lang['left1064'] ?> </label>
                                                <input type="file" class="form-control form-control-sm" name="miarchivo" id="miarchivo">
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-5 ml-4">
                                            <label for="inputcontact" class="control-label col-form-label">
                                                <i align='left'><img src='assets/images/alert/sign_icon.png' width='32' /></i>
                                                &nbsp;&nbsp;&nbsp;<?php echo $lang['deliver-ship14'] ?></label>

                                            <div class="row">

                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-info ml-4" data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo $lang['deliver-ship15'] ?> </button>

                                                <!-- sample modal content -->
                                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myLargeModalLabel"><?php echo $lang['deliver-ship14'] ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    <canvas id="sig-canvas" width="400" height="160">
                                                                        Get a better browser.
                                                                    </canvas>
                                                                </p>

                                                                <br><br><br><br><br><br><br><br>
                                                                <span class="btn btn-danger" id="sig-clearBtn"><?php echo $lang['deliver-ship16'] ?></span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect text-left" data-dismiss="modal"><?php echo $lang['deliver-ship15'] ?></button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </div>
                                            <div class="row" style="display:none">
                                                <div class="col-md-8">
                                                    <textarea id="sig-dataUrl" name="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($core->active_whatsapp == 1) {
                                        ?>
                                            <div class="col-sm-12 col-md-5 offset-1 mt-4">

                                                <label class="custom-control custom-checkbox" style="font-size: 18px; padding-left: 0px">
                                                    <input type="checkbox" class="custom-control-input" name="notify_whatsapp_sender" id="notify_whatsapp_sender" value="1">
                                                    <b><?php echo $lang['leftorder144430'] ?> &nbsp; <i class="fa fa-whatsapp" style="font-size: 22px; color:#07bc4c;"></i></b>
                                                    <span class="custom-control-indicator"></span>
                                                </label>

                                                <label class="custom-control custom-checkbox" style="font-size: 18px; padding-left: 0px">
                                                    <input type="checkbox" class="custom-control-input" name="notify_whatsapp_receiver" id="notify_whatsapp_receiver" value="1">
                                                    <b><?php echo $lang['leftorder144442'] ?> <i class="fa fa-whatsapp" style="font-size: 22px; color:#07bc4c;"></i></b>
                                                    <span class="custom-control-indicator"></span>
                                                </label>

                                            </div>
                                        <?php } ?>

                                        <?php
                                        if ($core->active_sms == 1) {
                                        ?>
                                            <div class="col-sm-12 col-md-5 offset-1 mt-4">

                                                <label class="custom-control custom-checkbox" style="font-size: 18px; padding-left: 0px">
                                                    <input type="checkbox" class="custom-control-input" name="notify_sms_sender" id="notify_sms_sender" value="1">
                                                    <b><?php echo $lang['leftorder144431'] ?> &nbsp; <i class="fa fa-envelope" style="font-size: 22px; color:#07bc4c;"></i></b>
                                                    <span class="custom-control-indicator"></span>
                                                </label>

                                                <label class="custom-control custom-checkbox" style="font-size: 18px; padding-left: 0px">
                                                    <input type="checkbox" class="custom-control-input" name="notify_sms_receiver" id="notify_sms_receiver" value="1">
                                                    <b><?php echo $lang['leftorder144443'] ?> <i class="fa fa-envelope" style="font-size: 22px; color:#07bc4c;"></i></b>
                                                    <span class="custom-control-indicator"></span>
                                                </label>

                                            </div>
                                        <?php } ?>
                                    </div>
                                    </br>
                                    </br>
                                    </br>
                                    <footer>
                                        <div class="pull-right">

                                            <a href="index.php" class="btn btn-outline-secondary btn-confirmation"><span><i class="ti-share-alt"></i></span> <?php echo $lang['status-ship11'] ?></a>

                                            <button class="btn btn-success" type="submit" id="sig-submitBtn"><?php echo $lang['deliver-ship10'] ?></button>
                                        </div>
                                    </footer>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'views/inc/footer.php'; ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include('helpers/languages/translate_to_js.php'); ?>

    <script src="assets/template/assets/libs/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/template/dist/js/app-style-switcher.js"></script>
    <script src="assets/template/assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
    <script src="dataJs/courier_deliver_shipment.js"></script>
</body>

</html>