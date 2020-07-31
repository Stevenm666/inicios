<?php
session_start();
?>
<!DOCTYPE html>
<html lang='es'>
<head> 
<title>Registrar Lavador</title>
<meta charset="UTF-8">
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
<body> 
<header><br/>
<h1 class="titulo">Registro de Lavador</h1></header>
<form action="reg_lav.php" method="POST" />
<table style="margin:0 auto;">
	<tr>
		<td>Documento:</td>
		<td><input type="text" name="documento" maxlength="11" required=""></td>
		<td></td>
		<td>Fecha Nacimiento:</td>
		<td><input type="date" name="fena" id="fena" required="" max="2020-12-12" ></td>
	</tr>
	<tr>
		<td>Nombre:</td>
		<td><input type="text" name="nombre" id="nombre" required="" onfocusout="upperN()"></td>
		<td></td>
		<td>Apellido:</td>
		<td><input type="text" name="apellido" id="apellido" required="" onfocusout="upperA()"></td>
	</tr>
	<tr>
		<td>Telefono:</td>
		<td><input type="text" name="tel" maxlength="10" minlength="7" required=""></td>
		<td></td>
		<td>Direccion:</td>
		<td><input type="text" name="direc" id="direc" required="" onfocusout="upperD()"></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="guarda" class="boton" value="Guardar" style="width: 80px" onclick="UpperD()"></td>
	</tr>
</table>
</body>
<script src="./upper.js"></script>

</html>