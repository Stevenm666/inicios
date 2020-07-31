<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
require"clases.php";
include "inicio.php";
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
<tr idservi="<?php echo $fila['id_servi'];?>">
  <td><?php echo $fila['id_servi'];?></td>
  <td><?php echo $fila['id_vehi'];?></td>
  <td><?php echo $fila['nombre'];?></td>
  <td><?php echo $fila['id_cli'];?></td>
  <td><?php echo $fila['tipolavado'];?></td>
  <td><?php echo $fila['tipovehi'];?></td>  
  <td><?php echo $fila['valor'];?></td>
  <td><?php echo $fila['nombre1'];?></td> 
  <td><a onclick="modificar(<?php echo $fila['id_servi']?>)" style="color:blue;text-decoration: underline blue;" id="estado"><?php echo $fila['estado'];?></td>
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
</body>
    <script type="text/javascript">

  function actualizar(){location.reload(true);}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  //setInterval("actualizar()",4000);
    function modificar(cod){
        newwindow=window.open("act_esta_p.php?id="+cod,'name','height=1,width=1');     
    }
    
</script>
</html>