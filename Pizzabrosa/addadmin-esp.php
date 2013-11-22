<?php
							
							$con = mysql_connect("localhost","root",""); 
							$NewEsp = $_POST['NewEsp'];
	
							$link = mysql_connect("localhost", "root",""); 
							$bd_seleccionada = mysql_select_db('pizzabrosas', $link);
							if (!$bd_seleccionada) {
	    						die ('No se puede usar pizzabrosas : ' . mysql_error());
							}
							mysql_select_db("Pizzabrosas", $link); 
							$consulta="INSERT INTO especialidades(nombre)
							VALUES ('$NewEsp')";
        					if(!mysql_query($consulta,$con))
           					{
             					die('Error de insercion'.mysql_error());
        					}
        					header('refresh:.1; url=http://localhost/Pizzabrosa/admin-esp.php'); 
        					
?>