<?php

use PHPMailer\PHPMailer\PHPMailer;


require '../Model/PHPMailer.php';
require '../Model/SMTP.php';
require '../Model/Exception.php';


$mail = new PHPMailer();

//$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->SMTPDebug = 1;
$mail->Host = "ssl://smtp.gmail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';                          // SMTP password


$mail->Username = "jihenazzouz@gmail.com"; // SMTP username
$mail->Password = "allahuakbar@1395"; // SMTP password

$mail->SetFrom("workspace.noreply@gmail.com");
$mail->Subject = "Confirmation email";
$mail->AddAddress($email);

$mail->IsHTML(true);

//$email=$_POST['email'];
//$user_id=$_POST['username'];
//$addy = "http://localhost:63342/workspace/confirm.php?id=$user_id&token=$token";
$mail->Body = "Hi! \n\n we 're glad to tell you that you're in ! ";
$mail->WordWrap = 50;
$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}