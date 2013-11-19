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
		<ul class="iniciosec">
			<li><a href="">Inicio de sesión</a></li>
			<li><a href="registro.php">Registrarse</a></li>
		</ul>

	</nav>
		<section class="wrapper" id="pizza">
			<div id="fondo" style="height:100%;">
				<h1 id="inicio">¿Ya tienes cuenta?, Inicia Sesión </h1>
				<form action="iniciosesion.php" method="POST">
					<label class="input-datos">Username:</label><input  name="username" type="text"><br>
					<label class="input-datos">Contraseña:</label><input name="contrasena"  type="password"><br>
					<input class="boton" type="submit" value="Entrar!">
				</form>
			</div>
		</section>
</body>
</html>