<?php
include '../../php/config.php';

// Obtener el ID del usuario desde la URL
$usuarioID = isset($_GET['UsuarioID']) ? $_GET['UsuarioID'] : '';

if ($usuarioID) {
    $sql = "SELECT * FROM usuarios WHERE UsuarioID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuarioID);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
} else {
    die("UsuarioID no especificado 45434534.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <title>Storybound Books - Administrador</title>
</head>
<body>
<header>
    <!-- (Aquí iría tu código del header y el menú de navegación) -->
</header>

<section class="bg-light py-5">
    <div class="p-5 lc-block shadow rounded-3 col-xl-10 offset-xl-1">
        <h3 class="card-title text-center mb-5 font-weight-bold fs-3">Editar Usuario:</h3>
        <form class="form-horizontal" method="POST" action="../../php/usuario/editarUsuario.php" enctype="multipart/form-data">
    <input type="hidden" name="UsuarioID" value="<?= htmlspecialchars($usuario['UsuarioID']) ?>" />

    <div class="row mb-4">
        <div class="col-md-4">
            <label for="Nombre">Nombre:</label>
            <input name="Nombre" type="text" class="form-control" id="Nombre" value="<?= htmlspecialchars($usuario['Nombre']) ?>" readonly/>
        </div>
        <div class="col-md-4">
            <label for="Apellido">Apellido:</label>
            <input name="Apellido" type="text" class="form-control" id="Apellido" value="<?= htmlspecialchars($usuario['Apellido']) ?>" readonly/>
        </div>
        <div class="col-md-4">
            <label for="Email">Email:</label>
            <input name="Email" type="email" class="form-control" id="Email" value="<?= htmlspecialchars($usuario['Email']) ?>" readonly/>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <label for="RolID">Rol:</label>
            <select class="form-select form-control" id="RolID" name="RolID" required>
                <option value="1" <?= ($usuario['RolID'] == 1) ? 'selected' : ''; ?>>Cliente</option>
                <option value="2" <?= ($usuario['RolID'] == 2) ? 'selected' : ''; ?>>Administrador</option>
            </select>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-lg btn-primary w-50">Actualizar</button>
        <a href="./adminUsuarios.php" class="btn btn-lg btn-secondary w-50">Cancelar</a>
    </div>
</form>

    </div>
</section>

<footer>
    <!-- (Aquí iría tu código del footer) -->
</footer>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
