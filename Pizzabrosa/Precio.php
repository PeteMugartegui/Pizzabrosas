<!DOCTYPE html>
<?php
	$con = mysql_connect("localhost","root","");  
	$cuki=$_COOKIE['username'];
					if(!$con)
					{
    					die('no se pudo conectar con el servidor'.mysql_error());

					}
	$bd_seleccionada = mysql_select_db('pizzabrosas', $con);
	if (!$bd_seleccionada) {
    die ('No se puede usar pizzabrosas : ' . mysql_error());
	}
	session_start();
	//Comprobamos que el checkbox y los radiobuttons no esten vacíos con los if, y si estan vacíos que no nos tire error
	if (isset($_REQUEST['especialidad'])) {
	$_SESSION['especialidad'] = $_POST['especialidad'];
	}
	if (isset($_REQUEST['ingredientes'])) {
    $_SESSION['ingredientes'] = $_POST["ingredientes"];
	}
	if (isset($_REQUEST['tam-pizza'])) {
	$_SESSION['tam-pizza'] = $_POST['tam-pizza'];
	}
	if (isset($_REQUEST['postre-refresco'])) {
	$_SESSION['postre-refresco'] = $_POST['postre-refresco'];
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
	<title>Tu orden es la siguiente:</title>
</head>
<body>
	<nav class="barra">

		<img src="pizzabrosas.png" class="logo">

	</nav>
		<section  id="pizza" styles="width:100% height:100%">
			<div id="fondo">
				<h1 id="inicio">Tu orden es la siguiente:</h1>
				<!--<a class="boton" type="button" href="#tamanos"><br>Ordena ahora!</a>-->
				<?php
					$PTamano=0;
					$PIng=0;
					$PPostre=0;
					$tamano=$_POST['tam-pizza'];//recoger datos del formulario.
					//Asignamos precios diferentes por tamaño de pizza
					if ($tamano=="Grande") {
						$PTamano=150; 
					}elseif ($tamano=="Mediana") {
						$PTamano=110;
					}elseif ($tamano=="Chica") {
						$PTamano=85;
					}
					$postre=$_POST['postre-refresco'];
					if (isset($_REQUEST['ingredientes'])) {
						echo "<p class='titulo'>"."El tamaño de tu pizza es: "."</p>"."<P>".$tamano."</p>";
						echo "<p class='titulo'>"." Ingredientes:</p>";
						if ($_SERVER["REQUEST_METHOD"] == "POST") {  
						    $ingredientes=$_POST["ingredientes"];
						    $count = count($ingredientes);
						    for ($i = 0; $i < $count; $i++) {
						        echo "<p class='titulo'>"."</p>"."<p>".$ingredientes[$i]."</p>"."<br>"; //Asignamos precios según el numero de ingredientes
						        if ($count<=3) {
						        	$PIng=15;
						        }elseif ($count>3 && $count<=6) {
						        	$PIng=30;
						        }elseif ($count>6 && $count<=11) {
						        	$PIng=40;
						        }
						    }
						}
						echo "<p class='titulo'>Extra: "."</p>"."<p>".$postre."</p>";
						if ($postre="Brownie") {
							$PPostre=25;
						} elseif ($postre="Refresco") {
							$PPostre=20;
						}
						$PTotal1=$PTamano+$PIng+$PPostre;
						$Precio=$PTotal1;
						//Se agregan datos a base de datos:
    					$ing = array($_POST['ingredientes']);
    					$array_string=mysql_real_escape_string(serialize($ing));
    					$tam = $_POST['tam-pizza'];
    					$posref = $_POST['postre-refresco'];
						echo "<p class='titulo'> Total a pagar:"."</p>"."<p id='total'>"."$".$PTotal1."</p>";
						/******************************Obtener la direccion********************/
						$direccion=mysql_query("SELECT direccion FROM usuario WHERE username LIKE '$cuki' ", $con);
						if($direccion === FALSE) {
    						die(mysql_error()); // TODO: better error handling
						}
						$row=mysql_fetch_array($direccion);
						$rd=$row['direccion'];
						/************************************Obtener el Usuario***********************/
						$user=mysql_query("SELECT username FROM usuario WHERE username LIKE '$cuki' ", $con);
						if($user === FALSE) {
    						die(mysql_error()); // TODO: better error handling
						}
						$row=mysql_fetch_array($user);
						$usr=$row['username'];
						echo "<script>"."alert('$rd')"."</script>";
						echo "<script>"."alert('$usr')"."</script>";
						/****************************** Inserccion de datos**********************/
						$consulta="INSERT INTO pedidos(user,tamano,ingredientes,extra,precio,direccion)
						VALUES ('$usr','$tam','$array_string','$posref','$PTotal1','$rd')";
        				if(!mysql_query($consulta,$con))
           				{
             				die('Error de insercion'.mysql_error());
        				}
        				echo "<script>"."alert('Se agrego un registro');"."</script>";
					/*************** Termina inserccion de datos*****************************/ 
					} else{
					
						echo "<p class='titulo'>Tamaño: "."</p>"."<p>".$tamano."</p>";
						if (isset($_REQUEST['especialidad']))
						{
							$especialidad=$_POST['especialidad'];
							echo "<p class='titulo'>Especialidad: "."</p>"."<p>".$especialidad."</p>";
						}
						echo "<p class='titulo'>Extra: "."</p>"."<p>".$postre."</p>";
						$PTotal2=$PTamano+$PPostre;
						$Precio=$PTotal2;
						$espec = $_POST['especialidad'];
    					$tam = $_POST['tam-pizza'];
    					$posref = $_POST['postre-refresco'];
						echo "<p class='titulo'> Total a pagar:"."</p>"."<p id='total'>"."$".$PTotal2."</p>";
						/***********************Obtener Direccion**************/
						$direccion=mysql_query("SELECT direccion FROM usuario WHERE username LIKE '$cuki' ", $con);
						if($direccion === FALSE) {
    						die(mysql_error()); // TODO: better error handling
						}
						$row=mysql_fetch_array($direccion);
						$rd=$row['direccion'];
						echo "<script>"."alert('$rd')"."</script>";
						/***********************************Obtener Usename*****************************/
						$user=mysql_query("SELECT username FROM usuario WHERE username LIKE '$cuki' ", $con);
						if($user === FALSE) {
    						die(mysql_error()); // TODO: better error handling
						}
						$row=mysql_fetch_array($user);
						$usr=$row['username'];
						echo "<script>"."alert('$usr')"."</script>";
        				//***************Inserccion de Datos
						$consulta="INSERT INTO pedidos(user,tamano,especialidad,extra,precio,direccion)
						VALUES ('$usr','$tam','$espec','$posref','$PTotal2','$rd')";
        				if(!mysql_query($consulta,$con))
           				{
             				die('Error de insercion'.mysql_error());
        				}
        				echo "<script>"."alert('Se agrego un registro');"."</script>";
        				/****************************Termina insercciòn de datos************************/
					}
						$_SESSION['Precio']=$Precio;
				?>
				<a class="boton" href="datos.php">Continuar.</a>
			</div>
		</section>
</body>
</html>