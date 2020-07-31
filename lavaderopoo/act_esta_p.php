<?php
require "clases.php";
date_default_timezone_set('America/Bogota');
	$fecha=date("Y-m-d H:i:s");
	
	$id=$_GET['id'];
	$obj=new servicio();
	$obj->estado($id,$fecha);

	echo "<script> opener.location.href = \"patio.php\"</script>";
	echo "<script> window.close();</script>";


?>


