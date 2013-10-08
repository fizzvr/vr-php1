<?php
	require_once("db_modelo_de_abstraccion.php");
	class Usuario extends DBModeloAbstraccion {
		public $nombre;
		public $apellido;
		public $email;
		private $clave;
		protected $id;

		function __construct() {
			$this->db_nombre = "book_example";

		}

		public function get($user_email='') {
			if ($user_email != ''):
				$this->consulta ="Select id, nombre, apellido, email, clave from usuarios where email ='$user_email'; ";
				$this->devolver_resultados_de_la_consulta();
			endif;

			if (count($this->filas) == 1):
				foreach ($this->filas[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function set($user_data=array()) {
			if(array_key_exists('email', $user_data)):
				$this->get($user_data['email']);
				if($user_data['email'] != $this->email):
					foreach ($user_data as $campo=>$valor):
						$$campo = $valor;
					endforeach;
					$this->consulta = "insert into usuarios (nombre,apellido,email,clave) values ('$nombre','$apellido','$email','$clave') ";
					$this->ejecutar_consulta_simple();
				endif;
			endif;
		}

		public function edit($user_data=array()) {
			foreach ($user_data as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->consulta = "
				update 	usuarios
				set 	nombre='$nombre',
						apellido='$apellido',
						clave='$clave'
				where 	email='$email'
			";
			$this->ejecutar_consulta_simple();
		}

		public function delete($user_email='') {
			$this->consulta = "delete from usuarios where email='$user_email'";
			$this->ejecutar_consulta_simple();
		}

		public function __destruct() {
			unset($this);
		}
	}
?>