<?php
	// Importamos el modelo de abtraccion de base de datos
	require_once("../core/db_modelo_de_abstraccion.php");
	class Usuario extends DBModeloAbstraccion {
		// Propiedades
		public $nombre;
		public $apellido;
		public $email;
		private $clave;
		protected $id;

		// Métodos Propios
		// Traer datos de un  usuario
		public function get($user_email='') {

			if ($user_email != ''){
				$this->consulta ="Select id, nombre, apellido, email, clave from usuarios where email ='$user_email'; ";

				$this->devolver_resultados_de_la_consulta();

			}
			if (count($this->filas) == 1){
				foreach ($this->filas[0] as $propiedad=>$valor){
					$this->$propiedad = $valor;
				}
				$this->mensaje = "Usuario encontrado";

			} else {
				$this->mensaje ="Usuario no encontrado";
			}

		}

		// Crear un nuevo usuario
		public function set($user_data=array()) {

			if(array_key_exists('email', $user_data)){
				$this->get($user_data['email']);
				if($user_data['email'] != $this->email){
					foreach ($user_data as $campo=>$valor){
						$$campo = $valor;
					}
					$this->consulta = "insert into usuarios (nombre,apellido,email,clave) values ('$nombre','$apellido','$email','$clave') ";
					$this->ejecutar_consulta_simple();
					$this->mensaje = "Usuario agregado correctamente";
				} else {
					$this->mensaje = "Usuario ya existe";
				}
			} else {
				$this->mensaje = "No se a agregado al usuario";
			}
		}

		// modificar un un usuario
		public function edit($user_data=array()) {
			foreach ($user_data as $campo=>$valor){
				$$campo = $valor;
			}
			$this->consulta = "
				update 	usuarios
				set 	nombre='$nombre',
						apellido='$apellido'
				where 	email='$email'
			";
			$this->ejecutar_consulta_simple();
			$this->mensaje ="Usuario modificado correctamente";
		}

		// eliminar un usuario
		public function delete($user_email='') {
			$this->consulta = "delete from usuarios where email='$user_email'";
			$this->ejecutar_consulta_simple();
			$this->mensaje = "Usuario eliminado";
		}
		// Método constructor
		function __construct() {
			$this->db_nombre = "vr-php1";

		}
		public function __destruct() {
			unset($this);
		}
	}
?>