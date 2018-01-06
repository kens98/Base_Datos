<?php
  require('lib/conector.php');
  session_start();


  



if(isset($_SESSION['username'])){

	 //$data["id"]=$_POST['id'];	
	 //$data["titulo"]="'".$_POST['titulo']."'";
	 $data["fecha_inicio"]="'".$_POST['start_date']."'";
	 //$data["dia_completo"]="'".$_POST['allDay']."'";
	 $data["fecha_finalizacion"]="'".$_POST['end_date']."'";
	 $data["hora_finalizacion"]="'".$_POST['end_hour']."'";
	 $data["hora_inicio"]="'".$_POST['start_hour']."'";

	 //$data["nombre_usuario"]="'".$_SESSION['username']."'";



	$con=new ConectorBD('localhost','user_prueba','12345');

	
	if($con->initConexion('evaluacionphp')=='OK'){
		$resp=$con->actualizarRegistro('eventos',$data,"id=".$_POST['id']." and nombre_usuario='".$_SESSION['username']."'");
		if($resp){	
			$response['msg']="OK";
		}
		else{
			$response['msg']="Datos no actualizado";
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
