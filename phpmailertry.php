<?php

//// using SendGrid's PHP Library
//// https://github.com/sendgrid/sendgrid-php
//// If you are using Composer (recommended)
////require 'vendor/autoload.php';
//// If you are not using Composer
//require("sendgrid-php/sendgrid-php.php");
//$from = new SendGrid\Email("Jishu Dohare", "kmk67584@miauj.com");
//$subject = "Sending with SendGrid is Fun";
//$to = new SendGrid\Email("Jishu Dohare", "jishu.dohare2016@vitstudent.ac.in");
//$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
//$mail = new SendGrid\Mail($from, $subject, $to, $content);
//$apiKey = getenv('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');
//$sg = new \SendGrid($apiKey);
//$response = $sg->client->mail()->send()->post($mail);
//echo $response->statusCode();
//print_r($response->headers());
//echo $response->body();


/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 23-10-2017
 * Time: 17:56
 */


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Link for the SSL problem - https://stackoverflow.com/questions/3477766/phpmailer-smtp-error-could-not-connect-to-smtp-host
//Load composer's autoloader
require 'vendor/autoload.php';
//echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings

    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dohare.jishu@gmail.com';                 // SMTP username
    $mail->Password = 'password';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('dohare.jishu@gmail.com', 'dohare.jishu@gmail.com');
    $mail->addAddress('jishu.dohare2016@vitstudent.ac.in', 'Jishu Dohare');     // Add a recipient
    //$mail->addAddress('ellen@example.com');
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments

    $mail->addAttachment('attendence.txt');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = "This is the HTML message body <b>in bold!</b>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.<br>';
    echo 'Mailer Error&#8628;<br>' . $mail->ErrorInfo;
}



//?>