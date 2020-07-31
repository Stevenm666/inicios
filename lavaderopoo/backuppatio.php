<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Patio</title>
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
<?php
require"clases.php";
?>
<header>
  <h1 style="text-align: center">En Patio</h1>
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
    <td>Fecha</td>
  </tr>
<?php 
$num_reg=13;
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $num_reg;
}
$con=new conexion();
$conn=$con->conectar();
$sql="SELECT * from servicios WHERE id_estado='1'";
$query=mysqli_query($conn,$sql);
$total=mysqli_num_rows($query);
$total_paginas = ceil($total / $num_reg);

$obj= new servicio();
$datos=$obj->consultaP($inicio,$num_reg);
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
  <td><a onclick="modificar(<?php echo $fila['id_servi'];?>)" style="color:blue;text-decoration: underline blue;" id="estado"><?php echo $fila['estado'];?></td>
  <td><?php echo $fila['fecha_ini']?></td>
</tr>
<?php
}; 
?>
</table>
<table style="border: hidden;margin: 0 auto">
  <tr><td>
  <?php 
  if ($total_paginas > 1){
    for ($i=1;$i<=$total_paginas;$i++){
       if ($pagina == $i)
          //si muestro el índice de la página actual, no coloco enlace
          echo $pagina . " ";
       else
          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
          echo "<a href='patio.php?pagina=" . $i . "'>" . $i . "</a> ";
    }}
    ?>
      </td></tr>
    </table>
    <script
src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<script src="code.js"></script>
</body>
    <script type="text/javascript">

  function actualizar(){location.reload(true);}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  //setInterval("actualizar()",4000);
    function modificar(cod){
        newwindow=window.open("http://127.0.0.1/lavaderopoo/act_esta_p.php?id="+cod,'name','height=1,width=1');     
    }
    
</script>
</html>