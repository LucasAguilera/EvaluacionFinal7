<?php
require('conector.php');
$con = new conectorBD();
response['conexion'] = $con->initConexion($con->database);

if (isset($_SESSION['email'])) {
	$response['msg'] = 'ok';
	$response['acceso'] = 'Autorizado';

} else {
	
}





 ?>
