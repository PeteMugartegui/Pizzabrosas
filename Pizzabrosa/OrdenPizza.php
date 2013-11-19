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
			<li>
				<a href="">
					<?php
					echo "Bienvenido   ".$_COOKIE['username'] ." !";
					?>
				</a>
			</li>
			<li><a href="Logout.php">Cerrar Sesión</a></li>
		</ul>
		
			
		

	</nav>
		<section class="wrapper" id="pizza">
			<h1 id="inicio">Las pizzas más famosas de la isla</h1>
			<p>(Te aseguramos que no podrás comer solo una rebanada)</p>
			<a class="boton" type="button" href="#tamanos"><br>Ordena ahora!</a>
		</section>
		<section class="wrapper" id="tamanos">
			<!--<h1>¿Cuántas pizzas vas a ordenar?</h1>-->
		<form name="frm" action="Precio.php" class="form-tamano" METHOD="POST">
			<article class="tamano-pizza" id="chica">
				<h2 class="texto-tamano">Chica</h2>
				<input class="numero-pizza" type="radio" name="tam-pizza" value="Chica">	
			</article>
			<article class="tamano-pizza" id="mediana">
				<h2 class="texto-tamano">Mediana</h2>
				<input class="numero-pizza" type="radio" name="tam-pizza" value="Mediana">	
			</article>
			<article class="tamano-pizza" id="grande">
				<h2 class="texto-tamano">Grande</h2>
				<input class="numero-pizza" type="radio" name="tam-pizza" value="Grande"> 	
			</article>
			<a class="boton" type="button" href="#especialidad"><br>Siguiente Paso</a>
		
		</section>
		<section class="wrapper" id="seleccion">
			<!--<h1>¿Especialidad o quieres elegir tus ingredientes?</h1>-->
			<article class="seleccion-especialidad" id="especialidad" >
				<h2 class="titulo-sel-esp">Especialidad</h2>
				<div class="centrado">
						<?php 
						$link = mysql_connect("localhost", "root",""); 
						$bd_seleccionada = mysql_select_db('pizzabrosas', $link);
						if (!$bd_seleccionada) {
	    					die ('No se puede usar pizzabrosas : ' . mysql_error());
						}
						mysql_select_db("Pizzabrosas", $link); 
						$result = mysql_query("SELECT nombre FROM especialidades", $link); 
						if($result === FALSE) {
	    					die(mysql_error()); // TODO: better error handling
						}
						if ($row = mysql_fetch_array($result)){ 
	   						echo "<table border = '0'> \n"; 
	   						do { 
	      						echo "<tr><td>"."<input type='radio' name='especialidad' value="."$row[nombre]>"."<label class='esp-pizza'>".$row['nombre']."</label><br>"."</td></tr> \n"; 
	   						} while ($row = mysql_fetch_array($result)); 
	   						echo "</table> \n"; 
						} else { 
						echo "¡ No se ha encontrado ningún registro !"; 
						} 
					?> 
				</div>
			</article>
			<article class="seleccion-especialidad" id="ingredientes">
				<h2 class="titulo-sel-esp">Ingredientes</h2>
				<div class="centrado">
					<?php 
					$link = mysql_connect("localhost", "root",""); 
					$bd_seleccionada = mysql_select_db('pizzabrosas', $link);
					if (!$bd_seleccionada) {
    					die ('No se puede usar pizzabrosas : ' . mysql_error());
					}
					mysql_select_db("Pizzabrosas", $link); 
					$result = mysql_query("SELECT nombre FROM ingredientes", $link); 
					if($result === FALSE) {
    					die(mysql_error()); // TODO: better error handling
					}
					if ($row = mysql_fetch_array($result)){ 
   						echo "<table border = '0'> \n"; 
   						do { 
      						echo "<tr><td>"."<input id='ing'  type='checkbox' name='ingredientes[]'' value="."$row[nombre]>"."<label class='ing-pizza'>".$row['nombre']."</label><br>"."</td></tr> \n"; 
   						} while ($row = mysql_fetch_array($result)); 
   						echo "</table> \n"; 
					} else { 
					echo "¡ No se ha encontrado ningún registro !"; 
					} 
					?>
				</div>
			</article>
			<a class="boton" type="button" href="#postres-refresco"><br>Siguiente Paso</a>
		</section>
		<section class="wrapper" id="postres-refresco">
				
			<!--<h1 id="titulo-postre">¿Algún postre o refresco?</h1>-->
					<article class="seleccion-postre" id="postre">
						<h2 class="titulo-seleccion-postre">Brownie</h2>
						<input class="radio-postre-refresco" type="radio" name="postre-refresco" value="Brownie">
					</article>
					<article class="seleccion-postre" id="refresco">
						<h2 class="titulo-seleccion-postre">Refresco</h2>
						<input class="radio-postre-refresco" type="radio" name="postre-refresco" value="Refresco">
					</article>
					<input class="boton" type="submit" value="Pasar a Pagar">
			</form>
		</section>
</body>
</html>