<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cerrar Dia</title>
	<h1 style="text-align: center;color: #4CAF50"><b>SISTEMA PARA LAVADERO</b></h1>
	<link  href="informediario.css" rel="stylesheet" > 
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
<header>
  <h1>Ventas Hoy</h1>
</header>
<body>
  <script src="./permiso.js"></script>
  <table style="margin: 0 auto; border: hidden;">
    <tr>
      <td>
<table >
    <tr style="color: red;font-weight: bold">
      <td>Identificacion</td>
      <td>Lavadores</td>
      <td>Servicios</td>
      <td>Valores</td>
      <td>Pagar</td>
    </tr>
<?php 
  require "clases.php";
  $obj=new lavador();
  $data=$obj->consultaInf();
  foreach ($data as $fila){
?>
    <tr>
      <td><a onclick="modificarl(<?php echo $fila['id_lav'];?>)" style="color:red;text-decoration: underline;"><?php echo $fila['id_lav'];?></a></td>
      <td><?php echo $fila['nombre']; ?></td>
      <td><?php echo $fila['count(l.nombre)']; ?></td>
      <td><?php echo $fila['SUM(t.valor)']; ?></td>
      <td><?php echo $fila['SUM(t.valor)']*0.45; ?></td>
    </tr>
<?php 
};
?>
</table>
</td>
<td style="border: hidden;"></td>
<td style="border: hidden;"></td>
<td>
<table>
  <tr style="color: red;font-weight: bold">
    <td>Total Servicios</td>
    <td>Total Valor</td>
    <td>Ganancias</td>
  </tr>
  <?php 
    $obj1=new lavador();
    $datos=$obj1->consultaTotal();
    foreach($datos as $datos){
  ?>
  <tr>
    <td><?php echo $datos['count(l.nombre)']; ?></td>
    <td><?php echo $datos['SUM(t.valor)']; ?></td>
    <td><?php echo $datos['SUM(t.valor)']*0.55; ?></td>
    <input id="valor" type="hidden" name="valor" value="<?php echo $datos['SUM(t.valor)']; ?>">   
    <input id="ganancias" type="hidden" name="ganancias" value="<?php echo $datos['SUM(t.valor)']*0.55; ?>"> 
    <input id="servicios" type="hidden" name="servicios" value="<?php echo $datos['count(l.nombre)']; ?>">
  </tr>
  <?php
};
  ?>
</table>
</td>
</tr>
<tr style="border: hidden;">
  <td></td>
  <td style="border: hidden;"><input class="boton" type="submit" name="Guardar" value="Guardar" onclick="guardado()"></td>
</tr>
</table>  

</body>
</html>