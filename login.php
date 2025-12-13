<?php
session_start();
// Credenciales de ejemplo (en producción usar base de datos y hashing)
$validUser = 'admin';
$validPass = 'secret';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = isset($_POST['username']) ? trim($_POST['username']) : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    if ($user === $validUser && $pass === $validPass) {
        // Autenticación exitosa
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    }
}

// Si falla, redirigir al login con indicador de error
header('Location: index.php?error=1');
exit;
