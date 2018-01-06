<?php
require('lib/conector.php');

$username=$_POST['username'];
$password=$_POST['password'];
session_start();

$con=new ConectorBD('localhost','user_prueba','12345');


$response['conexion']=$con->initConexion('evaluacionphp');

if($response['conexion']=='OK'){
	$resp=$con->consultar(['usuarios'],['*'],"nombre='".$username."' and clave='".password_hash($password,PASSWORD_DEFAULT)."';");
			
	
	if(count($resp)>0){
		$response['msg']='OK';
		$_SESSION['username']=$username;
	}
	else{
		$response['msg']='Usuario o clave incorrectas';
	}
$con->cerrarConexion();
}
else{
	$response['msg']="Error en la conexion a la BD";
}


echo json_encode($response);


 ?>
