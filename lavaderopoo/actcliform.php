<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Actualizar Cliente</title>
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
	<?php 
	require "clases.php";
	$documento=$_GET['documento'];
	$placa=$_GET['placa'];
	$obj= new cliente();
	$data=$obj->consulta1($documento,$placa);
	?>
	<header><h1 class="titulo">Actualizar Cliente</h1></header>
<body>
<form method="post" action="act_cli.php">
<link  href="recepcion_servicio.css" rel="stylesheet" >
<table style="margin:0 auto;">
	<tr>
		<td>
	Placa:
	</td><td>
		<input type="text" name="placa" minlength="5"maxlength="8" required="" id="placa" onfocusout="upperP()" value="<?php echo $placa;?>" readonly ></td>
		<td></td>
	<td>
		Tipo Vehiculo:
	</td>
	<?php
	foreach($data as $fila){
	?>
	<td><input type="text" name="tipovehi"  id="tipovehi" value="<?php echo $fila['tipovehi']?>" onfocusout="upperT()">
	</td>
	</tr>
	<tr>
		<td>
			Marca:
			<td>
			<input type="text" name="marca" maxlength="20" required="" id="marca" onfocusout="upperM()" value="<?php echo $fila['marca']?>" >	
		</td></td>	<td></td>
		<td>Color:
		</td><td><input required="" type="text" name="color"  maxlength="20" id="color" 
			onfocusout="upperC()" value="<?php echo $fila['color']?>" >
	</tr>
	<tr>
		<td>
			Nombre:
		</td><td><input type="text" name="nombre"  id="nombre" maxlength="30" required="" 
			onfocusout="upperN()" value="<?php echo $fila['nombre']?>" readonly />
		</td>	<td></td>
		<td>
			Apellido:
		</td><td><input type="text" name="apellido"  maxlength="30" required="" id="apellido" 
			onfocusout="upperA()" value="<?php echo $fila['apellido']?>" readonly />
		</td>
	</tr>
	<tr>
		<td>
			Identificacion:
		</td><td><input type="text" name="documento" maxlength="10"required="" value="<?php echo $fila['id_cli']?>" readonly="readonly" />
			
		</td>	<td></td>
		<td>
			Telefono:
		</td><td><input type="tel"name="tel" minlength="7" maxlength="11" required="" value="<?php echo $fila['tel']?>" />	
		</td>
	</tr>
	<?php
};
?>

	<tr>
		<td></td><td></td><td><input class="boton" type="submit" name="enviar" value="Actualizar" 
			style="height:20px;width:100%; margin: 0 auto;" onclick="modificarC()"></td>
	</tr>
</table>
</form>
<script src="./upper.js"></script>
</body>
</html>
