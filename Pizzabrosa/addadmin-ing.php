<?php
							
							$con = mysql_connect("localhost","root",""); 
							$NewIng = $_POST['NewIng'];
	
							$link = mysql_connect("localhost", "root",""); 
							$bd_seleccionada = mysql_select_db('pizzabrosas', $link);
							if (!$bd_seleccionada) {
	    						die ('No se puede usar pizzabrosas : ' . mysql_error());
							}
							mysql_select_db("Pizzabrosas", $link); 
							$consulta="INSERT INTO ingredientes(nombre)
							VALUES ('$NewIng')";
        					if(!mysql_query($consulta,$con))
           					{
             					die('Error de insercion'.mysql_error());
        					}
        					header('refresh:.1; url=http://localhost/Pizzabrosa/admin-ing.php'); 
        					?>