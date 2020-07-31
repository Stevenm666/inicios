<?php
require "clases.php";

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$documento=$_POST['documento'];
	$tel=$_POST['tel'];
	$direc=$_POST['direc'];
	$ciudad=$_POST['ciudad'];

	$datos=array($nombre,$apellido,$documento,$tel,$direc);

	$obj= new lavador();
	$obj->actualizar($datos);

	header("Location:listalav.php");
	exit;
?>


