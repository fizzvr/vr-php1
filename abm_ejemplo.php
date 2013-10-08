<?php
	require_once('modelo_usuarios.php');
	// traer datos de un usario
	$usuario1 = new usuario();
	$usuario1->get('user@email.com');
	print $usuario1->nombre. ' ' . $usuario1->apellido. ' existe<br>';

?>