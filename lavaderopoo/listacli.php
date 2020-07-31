<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Clientes</title>
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
</head>
 
<?php
require "clases.php";	
?>

<body>
<header>
	
	<h1 style="width: 70%; text-align: right; ">Clientes</h1>
	
<div style="width: 50%; float: right; background-color: grey">
	<form method="get" action="listacli_buscar.php">

	<table style="position: absolute;left: 188px;top:170px;border:hidden;font-weight: bold;">
  <tr>
  <td>Filtrar:</td>
  <td style="border:hidden">
  <select name="busqueda_lista" id="busqueda_lista" style="width:85PX;height: 21px">
  <option value="" selected="" disabled="" >SELECCIONAR</option> 
  <option value="1">CEDULA</option>
  <option value="2">PLACA</option>
  </select>
  </td>
  <td style="border:hidden"><input type="busqueda" name="busqueda" style="width: 90px" id="buscar"></td>
  <td style="width:1px;height:10px"><input class="boton" type="submit" name="buscar" value="buscar" class="boton" style="font-size: 13px" onclick="upperD()"></td>
  </tr>
</table>
</form>
</div>
</header>


	<script src="./permiso.js"></script>
<table style="color: green;margin: 0 auto">
	<tr style="color: red; font-size: 20px;font-weight: bold;">
		<td>Documento</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Placa</td>
		<td>Marca</td>
		<td>Color</td>
		<td>Tipo</td>
		<td>Telefono</td>
	</tr>
<?php 
$num_reg=12;
$pagina = $_GET["pagina"];
if(!$pagina){
	$inicio=0;
	$pagina=1;
	$num_show=$pagina*12;
}else{
	$inicio=($pagina-1)*$num_reg;
	$num_show=12;
}
$con=new conexion();
$conn=$con->conectar();
$sql="SELECT * FROM clientes";
$query=mysqli_query($conn,$sql);
$total=mysqli_num_rows($query);
$total_paginas = ceil($total / $num_reg);

$obj= new cliente();
$datos=$obj->consulta($inicio,$num_reg);
 foreach($datos as $fila){?>
<tr>
	<td><a onclick="modificarC(<?php echo $fila['id_cli'];?>,'<?php echo $fila['id_vehi']?>')" style="color:red;text-decoration: underline;"><?php echo $fila['id_cli'];?></a></td>
	<td><?php echo $fila['nombre'];?></td>
	<td><?php echo $fila['apellido'];?></td>
	<td><?php echo $fila['id_vehi'];?></td>	
	<td><?php echo $fila['marca'];?></td>	
	<td><?php echo $fila['color'];?></td>	
	<td><?php echo $fila['tipovehi'];?></td>	
	<td><?php echo $fila['tel'];?></td>
	</tr>
<?php
}; 
?>
</table>
<table style="margin: 0 auto;border: hidden;">
	<tr>
		<td>
			<?php 
			if($total_paginas>1){
				for($i=1;$i<=$total_paginas;$i++){
					if($pagina==$i)
						echo $pagina." ";
					else
					 echo "<a href='listacli.php?pagina=" . $i . "'>" . $i . "</a> ";
				}
			}   echo "<br>Registros del $inicio hasta $num_show de un total de $total";
    echo "<br>          TOTAL PAGINAS: $total_paginas"
			?>
		</td>
	</tr>
</table>
</body>
</html>