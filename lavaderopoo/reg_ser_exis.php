<?php
require "clases.php";
date_default_timezone_set('America/Bogota');
	$fecha=date("Y-m-d H:i:s");
	$documento=$_POST['documento'];
	$placa=$_POST['placa'];
	$tipovehi=$_POST['tipovehi'];
	$lavador=$_POST['lavador'];
	$tipolavado=$_POST['tipo_lavado'];

	$tp=new tipovehiculo();
	$tp1=$tp->consulta2($tipovehi);

	$tar=new tarifa();
	$tarifa=$tar->consulta($tipolavado,$tp1);


	$datos2=array($placa,$documento,$lavador,$tarifa,$fecha);
	$obj2=new servicio();
	$obj2->insertar($datos2);

header("Status: 301 Moved Permanently");
header("Location: patio.php");
exit;
?>

