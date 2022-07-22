<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//checking the sesson

// if(isset($_POST['submit'])){

$name = $_POST['contactName'];
$email = $_POST['contactEmail'];
$message = $_POST['contactMessage'];
$process = $_POST['process'];
$facility = $_POST['facility'];
$additional = $_POST['additional'];
$subject = "New Visitor";

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'alchemyacademy1@gmail.com';                     // SMTP username
    $mail->Password   = 'eulsrhznzswtnxxq';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('alchemyacademy1@gmail.com');     // Add a recipient
    //$mail->addAddress('bcc@example.com');               // Name is optional
    // $mail->addReplyTo('bcc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $body = "<b>Visitor :</b> $name <br> <b> Visitor Email :</b> $email <br>  <b> Message : </b> $message <br> <b> Service1 :</b> $process <br> <b>Service2 : </b>$facility <br><b> Service3:</b> $additional";
    $mail->Body    = $body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();  
    exit();
} catch (Exception $e) {
    ;
     exit();
    }

    ?>