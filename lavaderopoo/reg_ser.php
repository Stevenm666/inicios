<?php
require "clases.php";
date_default_timezone_set('America/Bogota');
	$fecha=date("Y-m-d H:i:s");
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$documento=$_POST['documento'];
	$tel=$_POST['tel'];
	$placa=$_POST['placa'];
	$marca=$_POST['marca'];
	$color=$_POST['color'];
	$tipovehi=$_POST['tipovehi'];
	$lavador=$_POST['lavador'];
	$tipolavado=$_POST['tipo_lavado'];

	$tp=new tipovehiculo();
	$tp1=$tp->consulta($tipovehi);

	$tar=new tarifa();
	$tarifa=$tar->consulta($tipolavado,$tipovehi);

	$datos=array($documento,$nombre,$apellido,$tel);
	$datos1=array($placa,$marca,$color,$documento,$tp1);
	$datos2=array($placa,$documento,$lavador,$tarifa,$fecha);
	
	$obj=new cliente();
	$obj->insertar($datos);	

	$obj1=new vehiculo();
	$obj1->insertar($datos1);

	$obj2=new servicio();
	$obj2->insertar($datos2);


header("Status: 301 Moved Permanently");
header("Location: patio.php");
exit;

?>

