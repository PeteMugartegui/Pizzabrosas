<?php
//session_start();
$con = mysql_connect("localhost","root","");  

if(!$con)
{
    die('no se pudo conectar con el servidor'.mysql_error());

}
mysql_select_db("pizzabrosas",$con);

$valor1 = $_POST['username'];
$valor2 = $_POST['contrasena'];
//$username = mysql_fetch_array($query);
$sql = "SELECT username,contrasena FROM usuario WHERE username = '$valor1' AND contrasena = '$valor2' ";
$query = mysql_query($sql);
// $resultado = @mysql_fetch_object("$query");
$user = mysql_fetch_array($query);
$sel="SELECT tipo FROM usuario WHERE username = '$valor1'";
	$query2=mysql_query($sel);
	$tip=mysql_fetch_array($query2);
	echo "<script>"."alert('$tip')"."</script>";
//$contador = 0; 
//echo $resultado = mysql_affected_rows($query);echo "<pre>";
if ($user["username"] == $valor1) {
	
	if($tip["tipo"]==1){
	setcookie("username","$valor1",time()+3600,"/");
	header("Location: http://localhost/Pizzabrosa/admin.php");

	}else{
	setcookie("username","$valor1",time()+3600,"/");
	header("Location: http://localhost/Pizzabrosa/OrdenPizza.php");
}
	//header("Location: seleccionmenu.php");
}
/*while($resultado = mysql_fetch_array($query)) {
   //$contador=$contador+1;
}*/

//f ($contador==1) {
	//header("Location: seleccionmenu.php");
	
else{
	echo "El usuario y/o password son incorrectos";
}


?>