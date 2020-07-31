<?php
require "clases.php";
	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$documento=$_POST['documento'];
	$tel=$_POST['tel'];
	$placa=$_POST['placa'];
	$tipovehi=$_POST['tipovehi'];
	$marca=$_POST['marca'];
	$color=$_POST['color'];

	$datos=array($nombre,$apellido,$tel,$documento);
	$datos1=array($placa,$marca,$color,$documento,$tipovehi);

	echo var_dump($datos1);
	echo var_dump($datos);

	$obj= new cliente();
	$obj->actualizar($datos);

	$obj1=new vehiculo();
	$obj1->actualizar($datos1);


	header("STATUS: 301 Moved Permanently");
	header("Location: listacli.php");
	exit;

	

?>


