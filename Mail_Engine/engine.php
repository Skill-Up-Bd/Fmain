<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';


function send_mail($to, $body){

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = '00.educare@gmail.com'; // email
$mail->Password = 'yeupyxczgxfusqyk'; // password
$mail->setFrom('00.educare@gmail.com', 'edu care'); // From email and name
$mail->addAddress($to, 'Mr. Brown'); // to email and name


$mail->Subject = 'email verifichation';

//Body of mail
$mail->msgHTML($body); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,

$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body

// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "<div class='alert alert-success'>
  <strong>Email sent</strong> please check your inbox and spam.
</div>";

}
}


?>