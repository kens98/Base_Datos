<?php
include('lib/conector.php');

$data[0]['nombre']="'kevin@mail.com'";
$data[0]['nombre_completo']="'kevin ramos'";
$data[0]['clave']="'".password_hash('123',PASSWORD_DEFAULT)."'";
$data[0]['fecha_nacimiento']='1990/01/15';

$data[1]['nombre']="'alexander@mail.com'";
$data[1]['nombre_completo']="'alexander ramos'";
$data[1]['clave']="'".password_hash('123',PASSWORD_DEFAULT)."'";
$data[1]['fecha_nacimiento']='1990/01/03';

$data[2]['nombre']="'luis@mail.com'";
$data[2]['nombre_completo']="'luis bolaños'";
$data[2]['clave']="'".password_hash('123',PASSWORD_DEFAULT)."'";
$data[2]['fecha_nacimiento']='1990-01-15';

$data[2]['nombre']="'adelson@mail.com'";
$data[2]['nombre_completo']="'adelson trejo'";
$data[2]['clave']="'".password_hash('123',PASSWORD_DEFAULT)."'";
$data[2]['fecha_nacimiento']='1990-01-15';

$con=new ConectorBD('localhost','user_prueba','12345');

$response['conexion']=$con->initConexion('evaluacionphp');

if($response['conexion']=='OK'){
	
	for($i=0;$i<4;$i++){
		if($con->insertData('usuarios',$data[$i])){
			$response['msg']+="/Datos insertado "+$data[$i]['nombre'];
		}else{
			$response['msg']+="/No se guardo el dato: "+$data[$i]['nombre'];
		}
	}

}else{
	$response['msg']="No se realizo la conexion a la base de datos";
}

echo json_encode($response);


?>
