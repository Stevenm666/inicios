<?php 
require "clases.php";
$valor=$_GET['valor'];
$ganancias=$_GET['ganancias'];
$servicios=$_GET['servicios'];

$datos=array($valor,$ganancias,$servicios);
 
 $obj=new informe();
 $obj->insertar($datos);

 echo "<script> window.close();</script>";	
 exit;
?>