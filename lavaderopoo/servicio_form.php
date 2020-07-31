
<?php
		require "clases.php";
		session_start();
		$placa=$_POST['placa'];
		$obj= new vehiculo();
		$datos=$obj->consulta1($placa);
		if($datos==NULL){
			?>
<!DOCTYPE html>
<html lang='es'>
<head> 
	<script src="./upper.js"></script>
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
<form action="reg_ser.php" method="POST"/>
<table style="margin:0 auto;">
	<tr>
		<td>
	Placa:
	</td><td>
		<input type="text" name="placa" minlength="5"maxlength="8" required="" id="placa" onfocusout="upperP()" value="<?php echo $placa ;?>"></td>
		<td></td>
	<td>
		Tipo Vehiculo:
	</td>
	<td><select name="tipovehi" onchange="prueba(this.value)" style="width: 99%" required="">
		<option value="" selected="" disabled="" >SELECCIONAR</option> 
		<?php
		$obj=new tipovehiculo();
		$data=$obj->mostrar();
		foreach($data as $fila){
		?>
		<option value="<?php echo $fila['id_tipovehi'];?>"><?php echo $fila['tipovehi'];?></option>
		<?php
		};
		?>
	</select>

	</td>
	</tr>
	<tr>
		<td>
			Marca:
			<td>
			<input type="text" name="marca" maxlength="20" required="" id="marca" onfocusout="upperM()">	
		</td></td>	<td></td>
		<td>Color:
		</td><td><input required="" type="text" name="color"  maxlength="20" id="color" onfocusout="upperC()">
	</tr>
	<tr>
		<td>
			Nombre:
		</td><td><input type="text" name="nombre"  id="nombre" maxlength="30" required="" onfocusout="upperN()"  />
		</td>	<td></td>
		<td>
			Apellido:
		</td><td><input type="text" name="apellido"  maxlength="30" required="" id="apellido" onfocusout="upperA()" />
		</td>
	</tr>
	<tr>
		<td>
			Identificacion:
		</td><td><input type="text" name="documento" maxlength="10"required=""/>
			
		</td>	<td></td>
		<td>
			Telefono:
		</td><td><input type="tel"name="tel" minlength="7" maxlength="11" required="">	
		</td>
	</tr>
	<tr>
		<td>
			Lavado:
		</td><td><select name="tipo_lavado" id="tipolavado" style="width: 99%" required="">
			<option value="" selected="" disabled="" >SELECCIONAR</option> 
				<?php
				$obj1=new tipolavado();
				$data1=$obj1->mostrar();
				foreach($data1 as $fila){
				?>
				<option value="<?php echo $fila['id_tipolav']?>"><?php echo $fila['tipolavado']?></option>
			<?php 
			};
			?>
			</select>
			</td><td></td><td>
			Lavador:
		</td><td><select name="lavador" id="lavador" style="width: 99%" required="">
			<option value="" selected="" disabled="" >SELECCIONAR</option> 
				<?php 
				$obj2=new lavador();
				$data2=$obj2->consultalis();
				foreach($data2 as $fila){
				?>
				<option value="<?php echo $fila['id_lav']; ?>"><?php echo $fila['nombre']; ?> </option>
				<?php 
				};
				?>
			</select>
		</td></td></tr>
		</td>
	</tr>
	<tr>
		<td></td><td></td><td><input class="boton" type="submit" name="enviar" value="Crear" style="height:20px; margin: 0 auto;"></td>
	</tr>
</table>
</body>
</html>


<?php
}else{?>
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
<form action="reg_ser_exis.php" method="POST"/>
<table style="margin:0 auto;">
	<tr>
		<td>
	Placa:
	</td><td>
		<input type="text" name="placa" minlength="5"maxlength="8" required="" id="placa" onfocusout="upperP()" value="<?php echo $placa;?>" readonly="readonly"></td>
		<td></td>
	<td>
		Tipo Vehiculo:
	</td>
	<?php
	foreach($datos as $fila){
	?>
	<td><input type="text" name="tipovehi" value="<?php echo $fila['tipovehi']?>" readonly="readonly">
	</td>
	</tr>
	<tr>
		<td>
			Marca:
			<td>
			<input type="text" name="marca" maxlength="20" required="" id="marca" onfocusout="upperM()" value="<?php echo $fila['marca']?>" readonly="readonly">	
		</td></td>	<td></td>
		<td>Color:
		</td><td><input required="" type="text" name="color"  maxlength="20" id="color" 
			onfocusout="upperC()" value="<?php echo $fila['color']?>" readonly="readonly">
	</tr>
	<tr>
		<td>
			Nombre:
		</td><td><input type="text" name="nombre"  id="nombre" maxlength="30" required="" 
			onfocusout="upperN()" value="<?php echo $fila['nombre']?>" readonly="readonly"/>
		</td>	<td></td>
		<td>
			Apellido:
		</td><td><input type="text" name="apellido"  maxlength="30" required="" id="apellido" 
			onfocusout="upperA()" value="<?php echo $fila['apellido']?>" readonly="readonly"/>
		</td>
	</tr>
	<tr>
		<td>
			Identificacion:
		</td><td><input type="text" name="documento" maxlength="10"required="" value="<?php echo $fila['id_cli']?>" readonly="readonly"/>
			
		</td>	<td></td>
		<td>
			Telefono:
		</td><td><input type="tel"name="tel" minlength="7" maxlength="11" required="" value="<?php echo $fila['tel']?>" readonly="readonly"/>	
		</td>
	</tr>
	<?php
};
?>
	<tr>
		<td>
			Lavado:
		</td><td><select name="tipo_lavado" id="tipolavado" style="width: 99%">
			<option value="" selected="" disabled="" >SELECCIONAR</option> 
				<?php
				$obj1=new tipolavado();
				$data1=$obj1->mostrar();
				foreach($data1 as $fila){
				?>
				<option value="<?php echo $fila['id_tipolav']?>"><?php echo $fila['tipolavado']?></option>
			<?php 
			};
			?>
			</select>
			</td><td></td><td>
			Lavador:
		</td><td><select name="lavador" id="lavador" style="width: 99%">
			<option value="" selected="" disabled="" >SELECCIONAR</option> 
				<?php 
				$obj2=new lavador();
				$data2=$obj2->consultaLis();
				foreach($data2 as $fila){
				?>
				<option value="<?php echo $fila['id_lav']; ?>"><?php echo $fila['nombre']; ?> </option>
				<?php 
				};
				?>
			</select>
		</td></td></tr>
		</td>
	</tr>
	<tr>
		<td></td><td></td><td><input class="boton" type="submit" name="enviar" value="Crear" 
			style="height:20px; margin: 0 auto;" ></td>
	</tr>
</table>
</body>

</html>                                                                                                                               
<?php
};
?>