<?php
	abstract class DBModeloAbstraccion {
		private static $db_servidor = "localhost";
		private static $db_usuario = "root";
		private static $db_clave = "1266";
		protected $db_nombre = "miBaseDatos";
		protected $consulta;
		protected $filas = array();
		private $conexion;

		// metodos abstractos para ABM de clases que ereden
		abstract protected function get();
		abstract protected function set();
		abstract protected function edit();
		abstract protected function delete();

		// los siguientes metodos pueden definirse con exactitud y no son abstractos
		// Conectar con la BD
		private function abrir_conexion() {
			$this->conexion = new mysqli(self::$db_servidor,self::$db_usuario,
				self::$db_clave, $this->db_nombre);
		}
		// desconectar de la BD
		private function cerrar_conexion() {
			$this->conexion->close();
		}
		// ejecutar un query simple del tipo INSERT, DELETE, UPDATE
		protected function ejecutar_consulta_simple() {
			$this->abrir_conexion();
			$this->conexion->query($this->consulta);
			$this->cerrar_conexion();
		}
		// traer resultados de una consulta en un array
		protected function devolver_resultados_de_la_consulta() {
			$this->abrir_conexion();
			$resultado = $this->conexion->query($this->consulta);
			while ($this->filas[] = $resultado->fetch_assoc());
			$resultado->close();
			$this->cerrar_conexion();
			array_pop($this->filas);

		}

	}
?>
