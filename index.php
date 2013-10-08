<!doctype html>
<html lang="es">
<head>
	<!-- meta estandar -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- propiedades del sitio -->
	<meta name="description" content="El paradigma de la Programación Orientada a Objetos en PHP y el patrón de arquitectura de software MVC">
	<meta name="keywords" content="las,palabras,clave">
	<meta name="author" content="fizzvr">
	<link rel="shortcut icon" href="act/ico/favicon.png">
	<title>www/vr-php1 | Vladimir Rodríguez</title>
	<!-- html shiv y respond -->
	<!-- [if lt IE 9]>
		<script src="act/js/html5shiv.js"></script>
		<script src="act/js/respond.min.js" ></script>
	<![endif] -->

	<!-- recursos -->

</head>
<body>
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
</body>
</html>