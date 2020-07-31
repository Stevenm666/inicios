<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lavadores</title>
</head>
 <script src="./permiso.js"></script>
 <script src="./upper.js"></script>
<h1 style="text-align: center;color: #4CAF50"><b>SISTEMA PARA LAVADERO</b></h1>
	<link rel="stylesheet" type="text/css" href="listados.css">
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
<body>
<?php
require"clases.php";
$menu=$_GET['busqueda_lista'];
$busqueda=$_GET['busqueda'];

?>	
<header>
  <h1  style="width: 70%; text-align: right; ">LAVADORES</h1>

   <form action="listalav_buscar.php" method="get"/>
  <div style="width: 50%; float: right;">
  <table style="position: absolute;left: 188px;top:170px;border:hidden;font-weight: bold;">
  <tr>
  <td>Filtrar:</td>
  <td style="border:hidden">
  <select name="busqueda_lista" id="busqueda_lista" style="width:85PX;height: 21px">
  <option value="" selected="" disabled="" >SELECCIONAR</option> 
  <option value="1">CEDULA</option>
  <option value="2">LAVADOR</option>
  </select>
  </td>
  <td style="border:hidden"><input type="busqueda" name="busqueda" style="width: 90px" id="buscar"></td>
  <td style="width:1px;height:10px"><input class="boton" type="submit" name="buscar" value="buscar" class="boton" style="font-size: 13px" onclick="upperB()"></td>
  </tr>
</table>
</div>
</header>
<table style="margin:0 auto;color: green">
	<tr style="color: red; font-size: 20px;font-weight: bold">
		<td>Documento</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Telefono</td>
		<td>Direccion</td>
		<td>Fecha Nacimiento</td>
		<td>Estado</td>
	</tr>
<?php 
$obj= new lavador();
$datos=$obj->consultaB($busqueda,$menu);
 foreach($datos as $fila){?>
<tr>
	<td><a href="" style="color: red"><?php echo $fila['id_lav'];?></a></td>
	<td><?php echo $fila['nombre'];?></td>
	<td><?php echo $fila['apellido'];?></td>
	<td><?php echo $fila['tel'];?></td>
	<td><?php echo $fila['direccion'];?></td>
	<td><?php echo $fila['fena'];?></td>
	<?php if($fila['estado']== "INACTIVO"){?>
  <td><a onclick="modificarE(<?php echo $fila['id_lav'];?>)" style="color:red;text-decoration: underline;"><?php echo $fila['estado'];?></td><?php }else{?><td><a onclick="modificarE(<?php echo $fila['id_lav'];?>)" style="color:blue;text-decoration: underline;"><?php echo $fila['estado'];?></td><?php }?>

</tr>
<?php
}; 
?>
</table>
</body>
</html>