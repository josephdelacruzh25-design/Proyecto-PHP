<?php
session_start();
include("conexion.php");

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios 
        WHERE correo = '$correo' 
        AND contrasena = '$contrasena'";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 1) {

    $usuario = mysqli_fetch_assoc($resultado);

    $_SESSION['usuario'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    // Redirección según rol
    if ($usuario['rol'] == 'alumno') {
        header("Location: ALUMNO/inicio.php");
    } elseif ($usuario['rol'] == 'docente') {
        header("Location: inicio_docente.php");
    } else {
        header("Location: inicio_admin.php");
    }

} else {
    header("Location: index.php?error=1");
}
