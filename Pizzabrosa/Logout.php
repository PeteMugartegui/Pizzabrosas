<?php
session_start();
session_destroy();
header("location:http://localhost/Pizzabrosa/index.php"); //redirigir despues de cerrar sesion
exit();
?>