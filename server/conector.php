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

				if ($this->conexion->connect_errno == "2002") {//Verificar que el error sea por resolución de nombre de servidor a través de la respuesta del servidor numero "202"
					$response.="<p><h6><b>Error de conexión</b></h6> Vefirique que el <b style='font-size:1em'>nombre del servidor</b> corresponda al parámetro localhost en el archivo <b>conector.php</b> dentro de la <b>carpeta server</b> del proyecto</p>";
				}
				if ($this->conexion->connect_errno == "1045" ){ //Verificar que el error sea por error de usuario y/o contraseña a través de la respuesta del servidor numero "1045"
		        	$response.="<h6><b>Error de conexión</b></h6><p>Vefirique que los parámetros de conexion <b>username y password </b> del archivo <b>conector.php</b> dentro de la <b>carpeta server</b> del proyecto correspondan a un <b>usuario y contraseña válido de phpmyadmin</b></br>". $this->conexion->connect_error . "\n</p>";
		      	}

		      	if ($this->conexion->connect_errno == "1044" ){ //Verificar que el error sea por error de usuario y/o contraseña a través de la respuesta del servidor numero "1045"
		        	$response.="<h6><b>Error de conexión</b></h6><p>Vefirique que los parámetros de conexion <b>username y password </b> del archivo <b>conector.php</b> dentro de la <b>carpeta server</b> del proyecto correspondan a un <b>usuario y contraseña válido de phpmyadmin</b></br>". $this->conexion->connect_error . "\n</p>";
		      	}

		      	$conexion['phpmyadmin'] = "Error";

		      	$conexion['msg'] = $response;

			}else{
				$conexion['phpmyadmin'] = "OK";

		      	$conexion['msg'] = "<p>Conexion establecida con phpMyadmin</p>";

			}
			echo json_encode($conexion);//devuelve respuesta
	}
	function initConexion($nombre_db){
		$this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
		if ($this->conexion->connect_error) {
			return $this->conexion->connect_errno;
		}else{
			return "OK";
		}

	}

	function userSession(){
		if(isset($_SESSION['email'])){
			$response['msg'] = $_SESSION['email'];
		}else{
			$response['msg'] = '';
		}
		return json_encode($response);
	}

	function verifyUsers(){
		$sql = 'SELECT COUNT(email) FROM usuario';
		$totalUsers = $this->ejecutarQuery($sql);
		while ($row = $totalUsers->fetch_assoc()){
			return $row['COUNT(email)'];
		}
	}

	function getConexion(){
		return $this->$conexion;
	}
	function ejecutarQuery($query){
		return $this->conexion->query($query);
	}
	function crearTabla($nombre_tbl, $campos){}




 ?>