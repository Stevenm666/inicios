<?php
require "clases.php";

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$documento=$_POST['documento'];
	$tel=$_POST['tel'];
	$direc=$_POST['direc'];
	$fena=$_POST['fena'];

	$datos=array($documento,$nombre,$apellido,$tel,$direc,$fena);

	
	$obj=new lavador();
	$obj->insertar($datos);

	header("Status: 301 Moved Permanently");
	header("Location: listalav.php");
exit;
?>

