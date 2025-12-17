<?php
$servidor = "localhost:3306";
$usuario = "root";
$contrasena = "admin123";  
$db = "colegio";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $db);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>