<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

require_once('phpmailer/PHPMailerAutoload.php');
$email = new PHPMailer;
$email->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$email->isSMTP();                                      // Set mailer to use SMTP
$email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$email->SMTPAuth = true;                               // Enable SMTP authentication
$email->Username = 'eugene.paulya@gmail.com';                 // Наш логин
$email->Password = '*******';                           // Наш пароль от ящика
$email->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$email->Port = 465;                                    // TCP port to connect to
 
$email->setFrom('eugene.paulya@gmail.com', 'Pulse');   // От кого письмо 
$email->addAddress('sejegi2624@chordmi.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$email->isHTML(true);                                  // Set email format to HTML

$email->Subject = 'Данные';
$email->Body    = '
		Пользователь оставил данные <br> 
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
	E-mail: ' . $email . '';

if(!$email->send()) {
    return false;
} else {
    return true;
}

?>