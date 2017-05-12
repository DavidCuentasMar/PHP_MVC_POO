<?php

$boton=$_POST['boton'];

	switch ($boton){
		
		case'enviar':
		
		
		$destino="luiszy21@gmail.com";
$nombre= $_POST["name"];
$correo= $_POST["email"];

$tema= $_POST["subject"];
$mensaje= $_POST["message"];

$contenido="Nombre: " . $nombre . "\nCorreo:" . $correo . "\nTema:" . $tema . "\nMensaje:" . $mensaje;

//si tuvieramos un servidor :^(
//mail($destino,"Contacto",$contenido);

echo "exito";
break;

    

		
		} 









?>