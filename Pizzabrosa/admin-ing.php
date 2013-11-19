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
	<nav class="barra-admin"> 
		<ul style="margin-left:40%;">
			<li><a href="admin.php">Pedidos</a></li>
			<li><a href="admin-esp.php">Especialidades</a></li>
			<li><a class="active" href="#">Ingredientes</a></li>
		</ul>
	</nav>
	</nav>
		<section class="wrapper" id="pizza">
			<div id="fondo" style="height:100%;">
				<div class="centrado" style="color:#FFF; font-family: 'Open Sans Condensed', sans-serif; font-size:16px; margin-left:650px; margin-top:50px;">
					<form action="addadmin-ing.php" METHOD="POST">
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
						Agregar Nuevo Ingrediente<br> <input name="NewIng" type="text"/><br>
						<input type="submit" value="Agregar">
					</form>
				</div>
			</div>
		</section>
</body>
</html>