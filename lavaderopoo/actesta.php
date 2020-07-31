<?php
require "clases.php";
	
	$id=$_GET['id'];
	$obj=new servicio();
	$obj->estado1($id);
		


	echo "<script> opener.location.href = \"listaser.php\"</script>";
	echo "<script> window.close();</script>";	



?>




