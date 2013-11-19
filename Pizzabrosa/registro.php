<!DOCTYPE html>
<?php
    session_start(); 
?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	<link href='http://fonts.googleapis.com/css?family=Lily+Script+One' rel='stylesheet' type='text/css'>
	<title>Pizzabrosas, las mejores pizzas!</title>
</head>
<body>
	<nav class="barra">

		<img src="pizzabrosas.png" class="logo">

	</nav>
		<section class="wrapper" id="pizza">
			<div id="fondo">
				<h1 id="inicio">Bienvenido, ¿es tu primera visita?. Registrate</h1>
				<form action="registro2.php" name="datos" method="POST">
					<label class="input-datos">Nombre de Usuario:</label><input  name="username" type="text"><br>
					<label class="input-datos">Nombre:</label><input  name="nombre" type="text"><br>
					<label class="input-datos">Apellido:</label><input name="apellido"  type="text"><br>
					<label class="input-datos">Dirección:</label><input name="direccion"  type="text"><br>
					<label class="input-datos">Telefono:</label><input name="telefono"  type="text"><br>
					<label class="input-datos">E-mail:</label><input name="email"  type="text"><br><br>
					<label class="input-datos">Contraseña:</label><input name="contrasena"  type="password"><br><br>
					<input class="boton" type="submit" value="Enviar!">
				</form>
			</div>
		</section>
</body>
</html>