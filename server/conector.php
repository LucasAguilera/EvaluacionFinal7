<?php
	session_start();
	//crear conector
	// editar el host, usuario, password y database de acuerdo a los requerimietos de usuario de phpmyadmin
	class conectorBD(){
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		public $database = 'agenda_bd';

		public $conexion;

		function verifyConexion(){//Funcion que verifica la funcion
			$init = @$this->conexion = new mysqli($this->host, $this->user, $this->password);//iniciar coneccion ala servidor

			if (! $this->conexion) {//si existe error de conexion
				$conexion['msg'] =  "<h3>Error al conectarse a la base de datos.</h3>";
			}
			if ( $this->conexion){//Verificar si existe un error al comparar que la respuesta del servidor sea diferente de 0
			
			$response = "<h6>Error al conectarse a la base de datos.</h6>";
			
			}
		}
	}



 ?>