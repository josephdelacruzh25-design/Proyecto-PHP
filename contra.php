<?php
include("INCLUDES/conexion.php");

$usuario = "admin";
$correo = "admin@colegio.com";
$contrasena = "admin123"; // 👈 esta será la contraseña
$rol = "admin";

$passwordHash = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, correo, password, rol)
        VALUES ('$usuario', '$correo', '$passwordHash', '$rol')";

if (mysqli_query($conexion, $sql)) {
    echo "✅ Administrador creado correctamente.<br>";
    echo "Usuario: admin<br>";
    echo "Contraseña: admin123";
} else {
    echo "❌ Error: " . mysqli_error($conexion);
}
