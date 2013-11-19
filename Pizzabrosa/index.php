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
			<li><a href="iniciasesion.php">Inicio de sesión</a></li>
			<li><a href="registro.php">Registrarse</a></li>
		</ul>

	</nav>
		<section class="wrapper" id="pizza">
			<div id="fondo" style="height:100%;">
				<h1 id="inicio">Las pizzas más famosas de la isla</h1>
				<p>(Te aseguramos que no podrás comer solo una rebanada)</p>
				<a class="boton-social" type="button" href="" onclick="fblogin()"><br>Registrate con tu cuenta Facebook</a>


				 <script>  
  					function fblogin() {  
    				window.open('facebook.php','fblogin','width=600,height=400');  
  					}  
  				</script> 
			</div>
		</section>
</body>
</html>