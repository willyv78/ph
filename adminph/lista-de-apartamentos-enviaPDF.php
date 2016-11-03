<?php session_start();
require_once ("../conexion/conexion.php");
include_once ('../php/PHPMailer/class.phpmailer.php');
$email = "wilsonvelandia@editoreshache.com";
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

$empresa = utf8_decode('R + B Diseño Experimental');
$asunto = utf8_decode("Lista de apartamentos");

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom('info@rmasb.com', $empresa);
//Set an alternative reply-to address
$mail->addReplyTo('info@rmasb.com', $empresa);
//Set who the message is to be sent to
$mail->addAddress($email);
//Set the subject line
$mail->Subject = $asunto;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body = "En el archivo adjunto se presenta la lista de apartamentos";
//Replace the plain text body with one created manually
$mail->AltBody = 'En el adjunto encontrará  la lista de apartamentos';
//Attach an image file
$mail->addAttachment('ResultadosEncuesta.pdf');

//send the message, check for errors
if ($mail->send()) {
    echo "Email enviado";
}
?>