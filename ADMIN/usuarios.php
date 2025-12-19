<?php
session_start();
include("../INCLUDES/conexion.php");

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

// Consulta de usuarios
$sql = "SELECT id, usuario, rol, estado, creado_en FROM usuarios";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios | Panel Admin</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

</head>

<body class="bg-light">
    <div class="container mt-4">
        <h2 class="mb-4">
            <i class="fa-solid fa-users"></i> Gestión de Usuarios
        </h2>

        <!-- Botón nuevo usuario -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalUsuario">
            <i class="fa-solid fa-user-plus"></i> Nuevo Usuario
        </button>

        <!-- Tabla usuarios -->
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($u = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?= $u['id'] ?></td>
                                <td><?= $u['usuario'] ?></td>
                                <td>
                                    <span class="badge bg-info"><?= $u['rol'] ?></span>
                                </td>
                                <td>
                                    <?php if ($u['estado'] == 'activo') { ?>
                                        <span class="badge bg-success">Activo</span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary">Inactivo</span>
                                    <?php } ?>
                                </td>
                                <td><?= $u['creado_en'] ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalUsuario" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="guardar_usuario.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Usuario</label>
                        <input type="text" name="usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Rol</label>
                        <select name="rol" class="form-select">
                            <option value="admin">Admin</option>
                            <option value="docente">Docente</option>
                            <option value="alumno">Alumno</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>