<?php
require "clases.php";
$usuario= $_POST['usuario'];
$password= $_POST['password'];

if(empty($usuario) and empty($password)){
	header("Location: loginincorrecto.php");
	exit();
}

$obj = new conexion();
$obj = $obj->conectar();
$query="SELECT * FROM usuarios where usuario = $usuario";
$consulta=mysqli_query($obj,$query);


$fila=mysqli_fetch_assoc($consulta);

	if($fila['password']==$password){
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['usuario'] = $fila['nombre'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (5*60);
		header("location:inicio.php");
		
	}else{
		header("location:loginincorrecto.php");
	
	}


?>