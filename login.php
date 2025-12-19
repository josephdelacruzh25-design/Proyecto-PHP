<?php
session_start();
include("INCLUDES/conexion.php");

$input = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios 
        WHERE (usuario = '$input' OR correo = '$input')
        AND estado = 'activo'
        LIMIT 1";

$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) === 1) {

    $usuario = mysqli_fetch_assoc($resultado);

    if (password_verify($contrasena, $usuario['password'])) {

        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] === 'admin') {
            header("Location: ADMIN/inicio.php");
        } elseif ($usuario['rol'] === 'alumno') {
            header("Location: ALUMNO/inicio.php");
        }
        exit;
    }
}

// ❌ Error
header("Location: index.php?error=1");
exit;
?>