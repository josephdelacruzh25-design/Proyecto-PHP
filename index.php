<?php
session_start();
if (isset($_SESSION['user'])) {
		header('Location: dashboard.php');
		exit;
}
$error = isset($_GET['error']) ? (int)$_GET['error'] : 0;
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" href="assets/style.css">
	</head>
	<body>
		<main class="login-container">
			<form class="card" action="login.php" method="post">
				<h1>Iniciar sesión</h1>
				<?php if ($error === 1): ?>
					<div class="alert">Credenciales inválidas.</div>
				<?php endif; ?>
				<label for="username">Usuario</label>
				<input id="username" name="username" type="text" required autofocus>

				<label for="password">Contraseña</label>
				<input id="password" name="password" type="password" required>

				<button type="submit">Entrar</button>
			</form>
		</main>
	</body>
</html>