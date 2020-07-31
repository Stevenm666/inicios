<?php

	class conexion{

	function conectar(){
	$server= "127.0.0.1";
	$user ="root";
	$pass = "lucero123";
	$db="lavadero";

	$this->con=mysqli_connect($server,$user,$pass,$db);
	
	return $this->con;
  }
	}

	class persona{
		public $nombre;
		public $apellido;
		public $documento;
		private $tel;
		private $direc;
		private $ciudad;
		
		public function consulta(){

		}

		public function consulta1(){

		}
		
		public function insertar(){

		}

		public function actualizar(){

		}

		public function eliminar(){

		}
	}

	class lavador extends persona{
		public $fena;
		
		public function consulta($inicio,$num_reg){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT *,e.estado FROM lavadores as l 
			INNER JOIN estado as e on e.id_estado=l.id_estado
			order By e.estado
			LIMIT $inicio,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

		public function consultaLis(){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT * FROM lavadores WHERE id_estado = '1'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

			public function consultaInf(){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			date_default_timezone_set('America/Bogota');
			$fecha=date("Y-m-d");
			$consulta="SELECT l.id_lav,l.nombre,SUM(t.valor),count(l.nombre) FROM servicios as s 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa
			INNER JOIN lavadores as l on l.id_lav=s.id_lav
			WHERE s.fecha_ini LIKE '$fecha%'
			GROUP BY s.id_lav
			ORDER BY s.id_lav";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

			public function consultaTotal(){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			date_default_timezone_set('America/Bogota');
			$fecha=date("Y-m-d");
			$consulta="SELECT SUM(t.valor),count(l.nombre) FROM servicios as s 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa
			INNER JOIN lavadores as l on l.id_lav=s.id_lav
			WHERE s.fecha_ini LIKE '$fecha%'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

			
			public function consulta1($id){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT * FROM lavadores WHERE id_lav=$id";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

		public function insertar($datos){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="INSERT INTO lavadores VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','1')";
			$query=mysqli_query($conn,$consulta);
		}

		public function actualizar($datos){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="UPDATE lavadores SET nombre='$datos[0]',apellido='$datos[1]',tel='$datos[3]',direc='$datos[4]' WHERE id_lav='$datos[2]'";
			$query=mysqli_query($conn,$consulta);
			
		}

		
			public function estado1($id){
			$esta=null;
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="SELECT id_estado FROM lavadores where id_lav='$id'";
			$query=mysqli_query($conn,$consulta);
			$fila=mysqli_fetch_assoc($query);
				$data=$fila['id_estado'];
	
			if($data==1){
				$esta="2";
			}elseif($data==2){
				$esta="1";	
		}	
			$consul="UPDATE lavadores SET id_estado='$esta' where id_lav='$id'";
			$query1=mysqli_query($conn,$consul);	
		
		}

			public function consultaB($id,$menu){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			switch ($menu) {
				case '1':
				$consulta="SELECT *,e.estado FROM lavadores as l 
			INNER JOIN estado as e on e.id_estado=l.id_estado
			where l.id_lav='$id'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
					break;

					case '2':
						$consulta="SELECT *,e.estado FROM lavadores as l 
			INNER JOIN estado as e on e.id_estado=l.id_estado
			where l.nombre='$id'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
						break;
			}
			
		}
	}

	class cliente extends persona{

		public function consulta($inicio,$num_reg){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT c.id_cli,c.nombre,c.apellido,v.id_vehi,v.marca,v.color,v.tipovehi,c.tel FROM clientes as c 
			INNER JOIN vehiculo as v on c.id_cli=v.id_cli
			order by v.id_vehi
			LIMIT $inicio,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

			public function consulta1($documento,$placa){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT c.id_cli,c.nombre,c.apellido,v.id_vehi,v.marca,v.color,v.tipovehi,c.tel FROM clientes as c 
			INNER JOIN vehiculo as v on c.id_cli=v.id_cli WHERE v.id_vehi='$placa'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

		public function insertar($datos){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="INSERT INTO clientes VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";
			$query=mysqli_query($conn,$consulta);
		}

		public function actualizar($datos){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="UPDATE clientes SET nombre='$datos[0]',apellido='$datos[1]',tel='$datos[2]',id_cli='$datos[3]' WHERE id_cli='$datos[3]'";
			$query=mysqli_query($conn,$consulta);
			
		}
		public function consultaB($inicio,$num_reg,$menu,$busqueda){
			$con= new conexion();
			$conn=$con->conectar();
			switch ($menu) {
				case '1':
					$consulta="SELECT c.id_cli,c.nombre,c.apellido,v.id_vehi,v.marca,v.color,v.tipovehi,c.tel FROM clientes as c 
			INNER JOIN vehiculo as v on c.id_cli=v.id_cli WHERE c.id_cli='$busqueda'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
					break;
				case '2':
						$consulta="SELECT c.id_cli,c.nombre,c.apellido,v.id_vehi,v.marca,v.color,v.tipovehi,c.tel FROM clientes as c 
			INNER JOIN vehiculo as v on c.id_cli=v.id_cli WHERE v.id_vehi='$busqueda'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
					break;
		
			}
		
		}
	}

	class estado {
		public $idestado;
		public $estado;
	}

	class tarifa{
			
		private $idtarifa;
		private $valor;

		public function consulta($tipolavado,$tipovehi){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();	
			$consulta="SELECT id_tarifa FROM tarifa where id_tipolav='$tipolavado' and id_tipovehi='$tipovehi'";
			$query=mysqli_query($conn,$consulta);
			$fila=mysqli_fetch_assoc($query); 
  			$data=$fila['id_tarifa'];
  			
  			return $data;
		}


		public function actualizar(){

		}

		public function eliminar(){

		}
	}

	class tipoLavado{

		private $idtipo;
		private $tipolavado;

		public function insertar(){
	
		}

		public function actualizar(){

		}

		public function mostrar(){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT * FROM tipo_lavado";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}
	}

	class tipoVehiculo{

		public $idtipove;
		public $tipovehi;
		
		
			public function consulta1($placa){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT v.placa,v.marca,v.color,v.tipovehi,c.nombre,c.apellido,c.tel FROM vehiculo as v
			INNER JOIN clientes as c on c.documento=v.documento
			WHERE v.placa='$placa'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

		public function actualizar(){

		}

		public function mostrar(){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT * FROM tipo_vehi";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

		public function consulta($tipovehi){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT tipovehi FROM tipo_vehi where id_tipovehi='$tipovehi'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data=$fila['tipovehi'];
  			}
  			return $data;
		}

		public function consulta2($tipovehi){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT id_tipovehi FROM tipo_vehi where tipovehi='$tipovehi'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data=$fila['id_tipovehi'];
  			}
  			return $data;
		}
	}

	class vehiculo{

		private $placa;
		private $marca;
		private $color;


		public function insertar($datos1){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="INSERT INTO vehiculo VALUES ('$datos1[0]','$datos1[1]','$datos1[2]','$datos1[3]','$datos1[4]')";
			$query=mysqli_query($conn,$consulta);
		}

		
			public function consulta1($placa){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT v.id_vehi,v.marca,v.color,v.tipovehi,c.nombre,c.apellido,c.tel,c.id_cli FROM vehiculo as v
			INNER JOIN clientes as c on c.id_cli=v.id_cli
			WHERE v.id_vehi='$placa'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

		public function actualizar($datos1){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
		$consulta="UPDATE vehiculo SET id_vehi='$datos1[0]',marca='$datos1[1]',color='$datos1[2]',id_cli='$datos1[3]',tipovehi='$datos1[4]' WHERE id_vehi='$datos1[0]'";
			$query=mysqli_query($conn,$consulta);
			}
	}

	class servicio{
		
		private $idservicio;
		private $estado;

		public function consulta($x,$num_reg){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="SELECT s.id_servi,v.id_vehi,c.nombre,c.id_cli,tp.tipolavado,t.valor,e.estado,v.tipovehi,s.fecha_ini,s.fecha_fin,l.nombre as nombre1 FROM servicios as s 
			INNER JOIN clientes as c on c.id_cli=s.id_cli 
			INNER JOIN vehiculo as v on v.id_vehi=s.id_vehi 
			INNER JOIN lavadores as l on l.id_lav=s.id_lav 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa 
			INNER JOIN tipo_lavado as tp on tp.id_tipolav=t.id_tipolav 
			INNER JOIN estado as e on e.id_estado=s.id_estado 
			order by id_servi
			LIMIT $x,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			} 
  			return $data;
		}

		public function consultaP($x,$num_reg){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="SELECT s.id_servi,v.id_vehi,c.nombre,c.id_cli,tp.tipolavado,t.valor,e.estado,v.tipovehi,s.fecha_ini,s.fecha_fin,l.nombre as nombre1 FROM servicios as s 
			INNER JOIN clientes as c on c.id_cli=s.id_cli 
			INNER JOIN vehiculo as v on v.id_vehi=s.id_vehi 
			INNER JOIN lavadores as l on l.id_lav=s.id_lav 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa 
			INNER JOIN tipo_lavado as tp on tp.id_tipolav=t.id_tipolav 
			INNER JOIN estado as e on e.id_estado=s.id_estado 
			WHERE e.estado = 'ACTIVO'
			order by id_servi
			LIMIT $x,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}


		public function consultaB($x,$num_reg,$menu,$busqueda){
			$con=new conexion();
			$conn=$con->conectar();
			switch ($menu) {
				case '1':
					$consulta="SELECT s.id_servi,v.id_vehi,c.nombre,c.id_cli,tp.tipolavado,t.valor,e.estado,v.tipovehi,s.fecha_ini,s.fecha_fin,l.nombre as nombre1 FROM servicios as s 
			INNER JOIN clientes as c on c.id_cli=s.id_cli 
			INNER JOIN vehiculo as v on v.id_vehi=s.id_vehi 
			INNER JOIN lavadores as l on l.id_lav=s.id_lav 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa 
			INNER JOIN tipo_lavado as tp on tp.id_tipolav=t.id_tipolav 
			INNER JOIN estado as e on e.id_estado=s.id_estado 
			WHERE c.id_cli = '$busqueda'
			order by id_servi
			LIMIT $x,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;		
					break;

				case '2':
				$consulta="SELECT s.id_servi,v.id_vehi,c.nombre,c.id_cli,tp.tipolavado,t.valor,e.estado,v.tipovehi,s.fecha_ini,s.fecha_fin,l.nombre as nombre1 FROM servicios as s 
			INNER JOIN clientes as c on c.id_cli=s.id_cli 
			INNER JOIN vehiculo as v on v.id_vehi=s.id_vehi 
			INNER JOIN lavadores as l on l.id_lav=s.id_lav 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa 
			INNER JOIN tipo_lavado as tp on tp.id_tipolav=t.id_tipolav 
			INNER JOIN estado as e on e.id_estado=s.id_estado 
			WHERE v.id_vehi = '$busqueda'
			order by id_servi
			LIMIT $x,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
  				break;

  				case '3':
				$consulta="SELECT s.id_servi,v.id_vehi,c.nombre,c.id_cli,tp.tipolavado,t.valor,e.estado,v.tipovehi,s.fecha_ini,s.fecha_fin,l.nombre as nombre1 FROM servicios as s 
			INNER JOIN clientes as c on c.id_cli=s.id_cli 
			INNER JOIN vehiculo as v on v.id_vehi=s.id_vehi 
			INNER JOIN lavadores as l on l.id_lav=s.id_lav 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa 
			INNER JOIN tipo_lavado as tp on tp.id_tipolav=t.id_tipolav 
			INNER JOIN estado as e on e.id_estado=s.id_estado
			WHERE l.nombre = '$busqueda' 
			order by id_servi
			LIMIT $x,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;

  			case '4':
  			$consulta="SELECT s.id_servi,v.id_vehi,c.nombre,c.id_cli,tp.tipolavado,t.valor,e.estado,v.tipovehi,s.fecha_ini,s.fecha_fin,l.nombre as nombre1 FROM servicios as s 
			INNER JOIN clientes as c on c.id_cli=s.id_cli 
			INNER JOIN vehiculo as v on v.id_vehi=s.id_vehi 
			INNER JOIN lavadores as l on l.id_lav=s.id_lav 
			INNER JOIN tarifa as t on t.id_tarifa=s.id_tarifa 
			INNER JOIN tipo_lavado as tp on tp.id_tipolav=t.id_tipolav 
			INNER JOIN estado as e on e.id_estado=s.id_estado
			WHERE s.fecha_ini LIKE '$busqueda%'
			order by id_servi
			LIMIT $x,$num_reg";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;		
  				break;
		
				default:
					# code...
					break;
		}}	



		public function estado($id,$fecha){
			$esta=null;
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="SELECT id_estado FROM servicios where id_servi='$id'";
			$consulta1="UPDATE servicios SET fecha_fin= '$fecha' where id_servi='$id'";
			$quer1=mysqli_query($conn,$consulta1);
			$query=mysqli_query($conn,$consulta);
			$fila=mysqli_fetch_assoc($query);
				$data=$fila['id_estado'];
	
			if($data==1){
				$esta="2";
			}elseif($data==2){
				$esta="1";	
		}	
			$consul="UPDATE servicios SET id_estado='$esta' where id_servi='$id'";
			$query1=mysqli_query($conn,$consul);	
		
		}

			public function estado1($id){
			$esta=null;
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="SELECT id_estado FROM servicios where id_servi='$id'";
			$query=mysqli_query($conn,$consulta);
			$fila=mysqli_fetch_assoc($query);
				$data=$fila['id_estado'];
	
			if($data==1){
				$esta="2";
			}elseif($data==2){
				$esta="1";	
		}	
			$consul="UPDATE servicios SET id_estado='$esta' where id_servi='$id'";
			$query1=mysqli_query($conn,$consul);	
		
		}

		public function insertar($datos2){
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="INSERT INTO servicios VALUES ('','$datos2[0]','$datos2[1]','$datos2[2]','$datos2[3]','1','$datos2[4]','')";
			$query=mysqli_query($conn,$consulta);
		}
		
	}

	class informe{

		public function insertar($datos){
			date_default_timezone_set('America/Bogota');
			setlocale(LC_TIME, "es_co");
			$mes= strftime("%B");
			$fecha=date("Y-m-d");
			$hora=date("H:i:s");
			$con=new conexion();
			$conn=$con->conectar();
			$consulta="INSERT INTO facturacion VALUES ('$fecha','$hora','$datos[0]','$datos[1]','$datos[2]','$mes')";
			$query=mysqli_query($conn,$consulta);
		}

		public function consultaInfo($fecha){
			$con=new conexion();
			$conn=$con->conectar();
			$sql="SELECT * FROM facturacion WHERE fecha LIKE '$fecha%'";
			$query=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_assoc($query)){
				$data[]=$fila;
			}
			return $data;
		}

		public function consultaAnio($fecha){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT mes,SUM(valor),SUM(servicios),SUM(ganancias) FROM facturacion WHERE fecha LIKE '$fecha%' GROUP BY mes";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}

		public function consultaTotal($fecha){
			$data=NULL;
			$con= new conexion();
			$conn=$con->conectar();
			$consulta="SELECT SUM(valor),SUM(servicios),SUM(ganancias) FROM facturacion WHERE fecha LIKE '$fecha%'";
			$query=mysqli_query($conn,$consulta);
			while($fila=mysqli_fetch_assoc($query)){
  			$data[]=$fila;
  			}
  			return $data;
		}
	}
?>