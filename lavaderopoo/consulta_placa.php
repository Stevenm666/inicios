<?php
session_start();
?>
<!DOCTYPE html>
<html lang='es'>
<head> 
<title>Toma Servicio</title>
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
<h1 class="titulo">Recepcion de servicio</h1></header>
<form action="servicio_form.php" method="post"/>
<table style="margin:0 auto;">
	<tr>
		<td>
	Placa:
	</td><td>	
		<input type="text" name="placa" minlength="5"maxlength="8" required="" id="placa" onfocusout="upperP()" ></td>
		<td><input type="submit" name="buscar" value="buscar" class="boton" style="font-size: 13px" onclick="upperP()"></td></tr>
</table>
</body>

</html>

<script src="./upper.js">
</script>