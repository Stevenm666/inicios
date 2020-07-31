<?php
require "clases.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Lavador</title>
	<meta charset="UTF-8">
	<script src="./upper.js"></script>
	<h1 style="text-align: center;color: #4CAF50"><b>SISTEMA PARA LAVADERO</b></h1>
<link  href="recepcion_servicio.css" rel="stylesheet" >  
<link rel="stylesheet" href="toolbar.css">
	<div class="navbar">
  <a href="inicio.php">Inicio</a>
  <div class="dropdown">
    <button class="dropbtn">Servicio</button>
    <div class="dropdown-content">
      <a href="consulta_placa.php">Registrar</a>
      <a href="listaser.php">Listado</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Informes</button>
    <div class="dropdown-content">
    <a href="informed.php">Cerrar Dia</a>
    <a href="informes_mes.php">Por mes</a>
    <a href="informes_anio.php">Por Año</a>
  </div>
  </div>
    <div>
    <a href="listacli.php">Clientes</a>
    </div>
     <div class="dropdown">
    <button class="dropbtn">Lavador</button>
    <div class="dropdown-content">
   	  <a href="lav_form.php">Registrar</a>
      <a href="listalav.php">Listado</a>
    </div>    
</div>
<a href="patio.php">En Patio</a>
<h3 class="usuario" style="text-align: center; color: white; margin: 0% 2% 0% 90%;padding: 0.9% 0% 0% 0%">
<?php
echo $_SESSION['usuario'];
?>
  <div class="dropdown-content">
      <a href="cerrarsesion.php">Cerrar Sesion</a>
    </div>
</h3>

</div>
	</head>
	<?php 
	$documento=$_GET['documento'];
	$obj= new lavador();
	$data=$obj->consulta1($documento);
	?>
	<header><h1 class="titulo">Actualizar Lavador</h1></header>
<body>
<form method="post" action="act_lav.php">
<link  href="recepcion_servicio.css" rel="stylesheet" >
<table style="margin:0 auto;">
	<?php
	foreach($data as $fila){
	?>
		<tr>
		<td>Documento:</td>
		<td><input type="text" name="documento" maxlength="11" value="<?php echo $documento; ?>" readonly="readonly"></td>
		<td></td>
		<td>Fecha Nacimiento:</td>
		<td><input type="date" name="fena" id="fena" required="" max="2020-12-12" value="<?php echo $fila['fena']?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td>Nombre:</td>
		<td><input type="text" name="nombre" id="nombre" required="" onfocusout="upperN()" value="<?php echo $fila['nombre']?>" readonly="readonly"></td>
		<td></td>
		<td>Apellido:</td>
		<td><input type="text" name="apellido" id="apellido" required="" onfocusout="upperA()" value="<?php echo $fila['apellido']?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td>Telefono:</td>
		<td><input type="text" name="tel" maxlength="10" minlength="7" required="" value="<?php echo $fila['tel']?>" ></td>
		<td></td>
		<td>Direccion:</td>
		<td><input type="text" name="direc" id="direc" required="" onfocusout="upperD()" value="<?php echo $fila['direc']?>" ></td>
	</tr>
	<?php
}
?>

	<tr>
		<td></td><td></td><td><input class="boton" type="submit" name="enviar" value="Actualizar" 
			style="height:20px;width:100%; margin: 0 auto;" onclick="upperD()"></td>
	</tr>
</table>
</form>
<script src="./upper.js"></script>
</body>
</html>
