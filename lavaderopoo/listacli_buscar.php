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
<link  href="http://127.0.0.1/Lavadero/recepcion_servicio.css" rel="stylesheet" >   
<?php
require "clases.php";
$menu=$_GET['busqueda_lista'];
$busqueda=$_GET['busqueda'];	
?>
<header>
	
	<h1 style="width: 70%; text-align: right; ">Clientes</h1>
	<form method="get" action="listacli_buscar.php">
		<div style="width: 50%; float: left;">
	<table style="position: absolute;left: 188px;top:170px;border:hidden;font-weight: bold;">
  <tr>
  <td>Filtrar:</td>
  <td style="border:hidden">
  <select name="busqueda_lista" style="width:85PX;height: 21px;">
  <option disabled="">SELECCIONAR</option> 
  <option value="1">CEDULA</option>
  <option value="2">PLACA</option>
  </select>
  </td>
  <td style="border:hidden"><input type="busqueda" name="busqueda" style="width: 90px" id="buscar" value="<?php echo $busqueda;?>"></td>
  <td style="width:1px;height:10px"><input class="boton" type="submit" name="buscar" value="buscar" class="boton" style="font-size: 13px" onclick="upperD()"></td>
  </tr>
</table>
</div>


</header>
<body>
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
switch ($menu) {
	case '1':
	$sql="SELECT * FROM vehiculo where id_cli='$busqueda'";
	$query=mysqli_query($conn,$sql);
	$total=mysqli_num_rows($query);
		break;
	case '2':
		$sql="SELECT * FROM vehiculo where id_vehi='$busqueda'";
	$query=mysqli_query($conn,$sql);
	$total=mysqli_num_rows($query);
		break;
	}

$total_paginas = ceil($total / $num_reg);

$obj= new cliente();
$datos=$obj->consultaB($inicio,$num_reg,$menu,$busqueda);
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
			switch ($menu) {
				case '1':
					if($total_paginas>1){
				for($i=1;$i<=$total_paginas;$i++){
					if($pagina==$i)
						echo $pagina." ";
					else
					   echo "<a href='listaser_buscar.php?pagina=" . $i . "&busqueda_lista=".$menu."&busqueda=".$busqueda."'>" . $i . "</a> ";}}
					break;
				case '2':
					if($total_paginas>1){
				for($i=1;$i<=$total_paginas;$i++){
					if($pagina==$i)
						echo $pagina." ";
					else
					   echo "<a href='listaser_buscar.php?pagina=" . $i . "&busqueda_lista=".$menu."&busqueda=".$busqueda."'>" . $i . "</a> ";}
			}
					break;
				default:
					# code...
					break;
			
			}
			  echo "<br>Registros del $inicio hasta $num_show de un total de $total";
    echo "<br>          TOTAL PAGINAS: $total_paginas"
			?>
		</td>
	</tr>
</table>
</body>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">

  function actualizar(){location.reload(true);}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  //setInterval("actualizar()",4000);
  		function modificar(cod,placa){
  			
  			window.location=("actcliform.php?documento="+cod+"&placa="+placa);
		}
</script>

<script src="./permiso.js"></script>

</html>