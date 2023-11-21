<?php 
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$asunto = 'Formulario Rellenado';
	$mensaje = "Nombre: ".$nombres." ".$apellidos."<br> Email: $email<br> Mensaje:".$_POST['mensaje'];


	if(mail('jamilvasquez20@gmail.com', $asunto, $mensaje)){
		echo "Correo enviado";
	}
 ?>