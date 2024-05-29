<?php

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$need = $_POST["need"];
$message = $_POST["message"];

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmass.co";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = "gmass";
    $mail->Password = "7960b3d4-f60d-40be-9376-cee5d1c7f60d";



    $mail->setFrom($email, $name);
    $mail->addAddress("malcolmn404@gmail.com");

    $mail->isHTML(true);
    $mail->Subject = "Mail to the company";
    $mail->Body = $message;

    $mail->send();
    header("Location: sent.php");
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
