<?php

$con = mysql_connect("localhost","root","");  


if(!$con)
{
    die('no se pudo conectar con el servidor'.mysql_error());

}
        
    $valor1 = $_POST['username'];
     $valor2 = $_POST['nombre'];
     $valor3 = $_POST['apellido'];
     $valor4 = $_POST['direccion'];
     $valor5 = $_POST['telefono'];
     $valor6 = $_POST['email'];
     $valor7 = $_POST['contrasena'];
     $tipo=2;


    if(isset($valor1) && isset($valor2) && isset($valor3) && isset($valor4) && isset($valor5) && isset($valor6) && isset($valor7)) {

	mysql_select_db("pizzabrosas",$con);
    setcookie("username",$valor1,time()+3600);
	setcookie("nombre",$valor2,time()+3600);
    setcookie("apellido",$valor3,time()+3600,"/");
    setcookie("direccion",$valor4,time()+3600,"/");
    setcookie("telefono",$valor5,time()+3600,"/");
    setcookie("email",$valor6,time()+3600,"/");
    setcookie("contrasena",$valor7,time()+3600,"/");
	$consulta="INSERT INTO usuario(username,tipo,nombre,apellido,direccion,telefono,email,contrasena)
	   VALUES ('$_POST[username]','$tipo','$_POST[nombre]','$_POST[apellido]','$_POST[direccion]','$_POST[telefono]','$_POST[email]','$_POST[contrasena]')";
	
        if(!mysql_query($consulta,$con))
           {
             die('Error de insercion'.mysql_error());
        }
        echo "Se agrego un registro"; 
   } header("Location: OrdenPizza.php");

?>