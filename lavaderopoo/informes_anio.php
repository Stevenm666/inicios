<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Informe Año</title>
    <h1 style="text-align: center;color: #4CAF50"><b>SISTEMA PARA LAVADERO</b></h1>
  <link  href="recepcion_servicio.css" rel="stylesheet" > 
  <link rel="stylesheet" type="text/css" href="informediario.css">
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
<form method="GET" action="informes_anio_buscar.php">
<body>
  <table style="margin: 0 auto;border: hidden;">
    <tr style="border: hidden;">
      <td style="border: hidden;">
        Seleccione
      </td>
      <td style="border: hidden;">Año:</td>
      <td style="border: hidden;">
        <select name="anio">
          <option disabled="" selected="">SELECCIONAR</option>
          <option>2020</option>
          <option>2021</option>
          <option>2022</option>
          <option>2023</option>
          <option>2024</option>
          <option>2025</option>
        </select>
      </td>
      <td><input class="boton" type="submit" name="buscar" value="Buscar" style="width: 70px"></td>
    </tr>
  </table>
</body>
</html>