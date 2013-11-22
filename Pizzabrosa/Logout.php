<?php
session_start();
session_destroy();
setcookie("username", "", time()-3600);
header("location:http://localhost/Pizzabrosa/index.php"); //redirigir despues de cerrar sesion
exit();
?>