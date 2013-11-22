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
		<ul class="iniciosec" style="font-size:14px;">
			<li>
				<a href="">
					<?php
					echo "Bienvenido   ".$_COOKIE['username'] ." !";
					?>
				</a>
			</li>
			<li><a href="Logout.php">Cerrar Sesión</a></li>
		</ul>
	<nav class="barra-admin"> 
		<ul style="margin-left:40%; font-size:14px; padding:13px;">
			<li><a href="admin.php">Pedidos</a></li>
			<li><a  href="#">Especialidades</a></li>
			<li><a class="active" href="admin-ing.php">Ingredientes</a></li>
		</ul>
	</nav>
	</nav>
		<section class="wrapper" id="pizza">
			<div id="fondo" style="height:100%;">
				<div class="centrado" style="color:#FFF; font-family: 'Open Sans Condensed', sans-serif; font-size:16px; margin-left:650px; margin-top:50px;">
					
						<?php
							$bdhost = "localhost"; 
							$bdtabla = "ingredientes";
							$bdusuario = "root"; 
							$bdclave = "";
							$bdname = "pizzabrosas"; 
							$accion="";
							if(isset($_POST['accion'])){$accion=$_POST['accion'];}
							if(isset($_POST['id_usuario'])){$id=$_POST['id_usuario'];}
							//$id = $_POST['idusuario'];
							$db = mysql_connect($bdhost,$bdusuario,$bdclave); 
							mysql_select_db($bdname) or die(mysql_error());
							if($accion == "eliminar" && $id)  {
							    mysql_query("DELETE FROM ingredientes WHERE id='$id'");
							    
							    header('refresh:.1; url=http://localhost/Pizzabrosa/elimining.php'); 
							}

							$query = "SELECT * FROM ingredientes "; 
							$resultado = mysql_query($query);
							while($r = mysql_fetch_array($resultado)) {
							    $id = $r['id'];
							    $ing = $r['nombre'];
							    echo "<form method='post'>
									<table border = '1' bordercolor='white'>  
							    	<tr><td>".$ing."</td></tr>"."<tr><td><input type=hidden name='id_usuario' value=$id>
							    	<input type=hidden name='accion' value='eliminar'>
							        <input type=submit name='submit' value='ELIMINAR'>
							        </table>
							        </form>";
							}
							mysql_close($db);
						?>
					<a href="http://localhost/Pizzabrosa/admin-ing.php">Agregar Ingredientes</a>				
					
				</div>
			</div>
		</section>
</body>
</html>