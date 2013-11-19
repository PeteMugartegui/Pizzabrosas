<!DOCTYPE html>
<?php
    session_start(); 
	if (isset($_REQUEST['tam-pizza'])) {
	$_SESSION['tam-pizza'] = $_POST['tam-pizza'];
	}
	if (isset($_REQUEST['postre-refresco'])) {
	$_SESSION['postre-refresco'] = $_POST['postre-refresco'];
	}
	if (isset($_REQUEST['nombre'])) {
	$_SESSION['nombre'] = $_POST['nombre'];
	}
	if (isset($_REQUEST['apellido'])) {
	$_SESSION['apellido'] = $_POST['apellido'];
	}
	if (isset($_REQUEST['direccion'])) {
	$_SESSION['direccion'] = $_POST['direccion'];
	if (isset($_REQUEST['telefono'])) {
	$_SESSION['telefono'] = $_POST['telefono'];
	}
	}
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
				<?php
				echo "<p>"."Señor (a): ".$_SESSION['nombre']."</p>"."<br>";
				echo "<P>"."Su pizza es de tamaño: ".$_SESSION['tam-pizza']."</p>"."<br>";
				echo "<p>"."Junto con un: ".$_SESSION['postre-refresco']."</p>"."<br>";
				echo "<p>"."Será enviada a la siguiente direccion: ".$_SESSION['direccion']."</p>";
				echo "<p>"."El precio total es de:"."</p>"."<p id='total'>"."$".$_SESSION['Precio']."</p>";
				?>
				<a class="boton" href="Logout.php">Hacer Pedido</a>
			</div>
		</section>
</body>
</html>