<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
$user = htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <main class="center-card">
      <div class="card">
        <h1>Bienvenido, <?php echo $user; ?></h1>
        <p>Has iniciado sesión correctamente.</p>
        <p><a class="btn" href="logout.php">Cerrar sesión</a></p>
      </div>
    </main>
  </body>
</html>
