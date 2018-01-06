<?php
 require('lib/conector.php');

session_start();
	$con=new ConectorBD('localhost','user_prueba','12345');

	if($con->initConexion('evaluacionphp')=='OK'){
		$resp=$con->consultar(['eventos'],['*'],"WHERE nombre_usuario='".$_SESSION['username']."'");
		
		if($resp->num_rows!=0){
			$i=0;
			while($fila = $resp->fetch_assoc()){
				$response['eventos'][$i]['id']=$fila['id'];
				$response['eventos'][$i]['title']=$fila['titulo'];
				$response['eventos'][$i]['start']=$fila['fecha_inicio'].' '.$fila['hora_inicio'];
				$response['eventos'][$i]['end']=$fila['fecha_finalizacion'].' '.$fila['hora_finalizacion'];
				$response['eventos'][$i]['allDay']=boolval($fila['dia_completo']);
				$i++;
			}
			

		}
		$response['msg']='OK';
		echo json_encode($response);
		$con->cerrarConexion();

	}else{
		echo $response['msg']="Se presento un error en la conexion";
		echo json_encode($response);
	}
 ?>
