<?php
require"clases.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <script src="./upper.js"></script>
  <script src="./permiso.js"></script>
  <title>Servicio</title>
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
<body>

<header>
  <div style="width: 50%; float: right;">
  <h1 style="text-align: center">Listado De Servicios</h1>
</div><div style="width: 50%;float: left; ">
  <form action="listaser_buscar.php" method="get"/>
  <table style="position: absolute;left: 188px;top:170px;border:hidden;font-weight: bold;">
  <tr>
  <td>Filtrar:</td>
  <td style="border:hidden">
  <select name="busqueda_lista" id="busqueda_lista" style="width:85PX;height: 21px">
  <option value="" selected="" disabled="" >SELECCIONAR</option> 
  <option value="1">CEDULA</option>
  <option value="2">PLACA</option>
  <option value="3">LAVADOR</option>
  <option value="4">FECHA</option>
  </select>
  </td>
  <td style="border:hidden"><input type="busqueda" name="busqueda" style="width: 90px" id="buscar"></td>
  <td style="width:1px;height:10px"><input class="boton" type="submit" name="buscar" value="buscar" class="boton" style="font-size: 13px" onclick="upperB()"></td>
  </tr>
</table>
</form>
</div>

</header>
<table style="margin: 0 auto;color: green;">
  <tr style="color: red; font-size: 20px;font-weight: bold">
    <td>N° Servicio</td>
    <td>Placa</td>
    <td>Cliente</td>
    <td>Documento</td>
    <td>Tipo Lavado</td>
    <td>Tipo Vehiculo</td>
    <td>Valor</td>
    <td>Lavador</td>
    <td>Estado</td>
    <td>Fecha Ini</td>
    <td>Fecha Fin</td>
  </tr>
<?php 
$num_reg=12;

$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
    $num_show=$pagina*12;
}
else {
    $inicio = ($pagina - 1) * $num_reg;
    $num_show=$pagina*12;
}
$con=new conexion();
$conn=$con->conectar();
$sql="SELECT * from servicios";
$query=mysqli_query($conn,$sql);
$total=mysqli_num_rows($query);
$total_paginas = ceil($total / $num_reg);

$obj= new servicio();
$datos=$obj->consulta($inicio,$num_reg);
 foreach($datos as $fila){?>
<tr>
  <td><?php echo $fila['id_servi'];?></td>
  <td><?php echo $fila['id_vehi'];?></td>
  <td><?php echo $fila['nombre'];?></td>
  <td><?php echo $fila['id_cli'];?></td>
  <td><?php echo $fila['tipolavado'];?></td>
  <td><?php echo $fila['tipovehi'];?></td>  
  <td><?php echo $fila['valor'];?></td>
  <td><?php echo $fila['nombre1'];?></td> 
  <?php if($fila['estado']=="INACTIVO"){?>
  <td><a onclick="modificarI(<?php echo $fila['id_servi'];?>)" style="color:red;text-decoration: underline red;," id="estado"><?php echo $fila['estado'];?></td>
  <?php }else{?>
  <td><a onclick="modificarI(<?php echo $fila['id_servi'];?>)" style="color:blue;text-decoration: underline blue;" id="estado"><?php echo $fila['estado'];?></td>
  <?php }?> 
  <td><?php echo $fila['fecha_ini']?></td>
  <td><?php echo $fila['fecha_fin']?></td>
</tr>
<?php
}; 
?>
</table>
<table style="border:hidden;margin: 0 auto">
  <tr><td>
  <?php 
  if ($total_paginas > 1){
    for ($i=1;$i<=$total_paginas;$i++){
       if ($pagina == $i)
          //si muestro el índice de la página actual, no coloco enlace
          echo $pagina . " ";
       else
          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
          echo "<a href='listaser.php?pagina=" . $i . "'>" . $i . "</a> ";
    }}
    echo "<br>Registros del $inicio hasta $num_show de un total de $total";
    echo "<br>          TOTAL PAGINAS: $total_paginas"
    ?>
      </td></tr>
    </table>
</body>
</html>