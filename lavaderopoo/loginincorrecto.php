<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		input{
			padding: 1%;
			margin: 1%;
			border-radius: 5px;

		}

		button{
			padding: 1%;
			background-color: green;
			border: 0px;
			font-size: 15px;
			border-radius: 5px;
		}

	</style>
	<title>Login</title>
</head>
<body style="background-image: url(img/2.JPG)">
	<div style="padding: 10%">
		<center>
			<form method="POST" action="validar.php">
				<h1 style="color:white">Login</h1>
				<input type="text" name="usuario" placeholder="Usuario">
				<br>
				<input type="password" name="password" placeholder="Contraseña">
				<p style="color:red">¡Usuario o Contraseña Incorrectos!</p>
				<br>
				<button type="submit">Iniciar sesion</button>
				
			</form>
		</center>
	</div>

</body>
</html>