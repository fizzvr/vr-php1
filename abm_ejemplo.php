<?php
	require_once('modelo_usuarios.php');
	// traer datos de un usario
	$usuario1 = new usuario();
	$usuario1->get('user@email.com');
	print $usuario1->nombre. ' ' . $usuario1->apellido. ' existe<br>';

	// creando un nuevo usuario
	$datos_del_usuario = array (
		'nombre'=>'VE',
		'apellido'=>'DOS',
		'email'=>'alw2ma222',
		'clave'=>'1234567890'
		);
	$usuario2 = new usuario();
	$usuario2->set($datos_del_usuario);
	$usuario2->get($datos_del_usuario['email']);
	print $usuario2->nombre.' '.$usuario2->apellido.' ha sido creado<br>';



?>