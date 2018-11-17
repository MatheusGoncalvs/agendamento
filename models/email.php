<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email-recuperar'];
//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'matheusreiinformatica@gmail.com';                 // SMTP username
    $mail->Password = '2aXN1392';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('matheusreiinformatica@gmail.com', 'Sistema de agendamento NAF');
    $mail->addAddress($email);              // Name is optional

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Teste de envio de email';
    $mail->Body    = 'Testando o envio de email pela biblioteca phpmailer 
        <a href="http://localhost/agendamento/models/nova_senha.php">Clique aqui para alterar a sua senha</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    include("../services/msg-recuperar-senha.php");
    header("refresh:5;url=../index-login.php");

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}