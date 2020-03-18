<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="pop.css">
<title>Modal Popup Box</title>
<?php
    $email="induwarajaya@gmail.com";

    include("model/config.php");
    session_start();

    $message =  "Congratulations,
    You are officially in the GasMaster !

    Regards,
    Admin,
    GasMaster";

    date_default_timezone_set("Etc/UTC");
    require 'PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->port = 465;
    $mail->STMPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "codex2k18@gmail.com";
    $mail->Password = "Codex@2018";
    $mail->setFrom('codex2k18@gmail.com');
    $mail->addReplyTo('codex2k18@gmail.com');
    $mail->addAddress($email);
    $mail->Subject = "Welcome to GasMaster";
    $mail->Body = $message;
    if (!$mail->send()) {
        echo "Mailer Error :" . $mail->ErrorInfo;
    } else {
        echo "Message Sent";
    }
?>
</html>
