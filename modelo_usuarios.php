<?php
	require_once("db_modelo_de_abstraccion.php");
	class usuario extends DBModeloAbstraccion {
		public $nombre;
		public $apellido;
		public $email;
		private $clave;
		protected $id;

		function __construct() {
			$this->db_nombre = "book_example";

		}
	}
?>