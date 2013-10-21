<?php
$diccionario = array
(
	'subtitle'=>array
	(
		VIEW_SET_USER=>'Crear un nuevo usuario',
		VIEW_GET_USER=>'Buscar Usuario',
		VIEW_DELETE_USER=>'Eliminar Usuario',
		VIEW_EDIT_USER=>'Modificar Usuario'
		),
	'links_menu'=>array
	(
		'VIEW_SET_USER'=>MODULO.VIEW_SET_USER.'/',
		'VIEW_GET_USER'=>MODULO.VIEW_GET_USER.'/',
		'VIEW_DELETE_USER'=>MODULO.VIEW_DELETE_USER.'/',
		'VIEW_EDIT_USER'=>MODULO.VIEW_EDIT_USER.'/'
		),
	'form_actions'=>array
	(
		'SET'=>'/vr-php1/'.MODULO.SET_USER.'/',
		'GET'=>'/vr-php1/'.MODULO.GET_USER.'/',
		'DELETE'=>'/vr-php1/'.MODULO.DELETE_USER.'/',
		'EDIT'=>'/vr-php1/'.MODULO.EDIT_USER.'/'
		)

);
function get_template($form='get0') {
	$file = '../out/usuarios/usuario_'.$form.'.html';
	$template = file_get_contents($file);
	return $template;
}


function render_dinamic_data($html, $data) {

	foreach ($data as $clave=>$valor) {
		$html = str_replace('{'.$clave.'}', $valor, $html);

	}
	return $html;

}
function retornar_vista($vista , $data=array()) {
	global $diccionario;
	$html = get_template('template');
	$html = str_replace('{subtitulo}', $diccionario['subtitle'][$vista], $html, $count2);
	$html = str_replace('{formulario}', get_template($vista), $html, $countx);

	$html = render_dinamic_data($html, $diccionario['form_actions']);
	$html = render_dinamic_data($html, $diccionario['links_menu']);
	// d($html);

	$html = render_dinamic_data($html, $data);
d($data);
	//render (mensaje)
	/*if (array_key_exists('nombre', $data)&&array_key_exists('apellido', $data)&&$vista==VIEW_GET_USER) {
		$mensaje = 'Editar usuario '.$data['nombre'].' '.$data['apellido'];
	} else {
		if (array_key_exists('mensaje', $data)) {
			$mensaje = $data['mensaje'];
		} else {
			$mensaje = "Datos del usuario";
		}
	}
	$html = str_replace('{mensaje}', $mensaje, $html);*/
	print $html;

}

?>