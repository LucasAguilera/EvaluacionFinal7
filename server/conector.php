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

		
	}



 ?>