<?php
use PHPMailer\PHPMailer\PHPMailer.php;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

require 'PHPMailer\PHPMailer\PHPMailer.php';
require 'PHPMailer\PHPMailer\SMTP.php';
require 'PHPMailer\PHPMailer\Exception.php';


$mail = new PHPMailer (true);

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'salma.kh.1999.sk@gmail.com';
$mail->Password = 'I6302632020';                          // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('salma.kh.1999.sk@gmail.com', 'Mailer');
$mail->addAddress( 'salma');     // Add a recipient
$mail->addReplyTo('salmakouhou6gmail.com', 'Information');


$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = ("$email ($subject)");
$mail->Body    = $body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $status = "success";
    $response = "email sent";

} else {
    $status = "failed";
    $response = "oups";
    
}
}