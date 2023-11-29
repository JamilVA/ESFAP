<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

require './vendor/autoload.php';

enviarEmail();

function enviarEmail()
{
	if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['mensaje'])) {
		$nombres = $_POST['nombres'] . ' ' . $_POST['apellidos'];
		$email = $_POST['email'];
		$mensaje = $_POST['mensaje'];

		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = 2;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host = 'mail.esfapmua.edu.pe';                     //Set the SMTP server to send through
			$mail->SMTPAuth = true;                                   //Enable SMTP authentication
			$mail->Username = '_mainaccount@esfapmua.edu.pe';                     //SMTP username
			$mail->Password = 'ESF@Pmu@#2020';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('suarezpedro768@gmail.com', 'Mailer');
			$mail->addAddress('jamilvasquez20@gmail.com', 'Mesa de Partes');     //Add a recipient
			$mail->addAddress('jvasqueza18_2@unc.edu.pe', 'Mesa de Partes');               //Name is optional

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Formulario de contacto rellenado';
			$mail->Body = 'Nombres: ' . $nombres . '<br/>Correo: ' . $email . '<br/>' . $mensaje;

			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	} else {
		return;
	}
}

error_reporting(E_ALL);
?>