<?php
  require('lib/conector.php');
  session_start();


  



if(isset($_SESSION['username'])){

	$con=new ConectorBD('localhost','user_prueba','12345');

	
	if($con->initConexion('evaluacionphp')=='OK'){
		$resp=$con->eliminarRegistro('eventos',"id=".$_POST['id']." and nombre_usuario='".$_SESSION['username']."'");
		if($resp){	
			$response['msg']="OK";
		}
		else{
			$response['msg']="Datos no eliminado";
		}
		//$response['msg']=$resp;
		

	}else{
		$response['msg']='No se realizo la conexion';
	}
	echo json_encode($response);
}
else{
	$response['msg']="Inicie cession";
	echo json_encode($response);
}

 ?>
