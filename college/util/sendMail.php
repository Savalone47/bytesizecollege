<?php

function sendmail($to,$subject,$body,$headers){
require 'phpmailer/class.phpmailer.php';
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.smtp.php';

require 'phpmailer/Exception.php';


$mail = new PHPMailer;

 $mail->SMTPDebug = 4;                  

//$mail->isSMTP();                                      
$mail->Host = 'smtp.ngomadigitech.com'; 
$mail->SMTPAuth = true;                               
$mail->Username =  'mail.ngomadigitech.com';            
$mail->Password = 'secret';                           
$mail->SMTPSecure = 'tls';                   
$mail->Port = 587;   

$mail->addAddress($to);     // Add a recipient
$mail->setFrom($headers);	//Set from
                                        
$mail->addReplyTo( 'admin@ngomadigitech.com');

//$mail->addAttachment();
$mail->isHTML(true);    //Adds an attachment from a path on the filesystem
$mail->Subject = $subject;   //Sets the Subject of the message
$mail->Body = $body;    //An HTML or plain text message body
$mail->Send();

 }
    
?>