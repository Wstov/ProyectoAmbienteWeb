<?php
session_start();
include("../../php/config.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../view/errorLogin.php");
    exit();
}

// Obtener el ID del usuario de la sesión
$usuarioID = $_SESSION['UsuarioID'];

// Consulta SQL para obtener la información del usuario
$consulta = "SELECT * FROM usuarios WHERE UsuarioID = '$usuarioID'";
$resultado = mysqli_query($conn, $consulta);

// Verificar si se encontró el usuario
if ($user = mysqli_fetch_array($resultado)) {
    // Usuario encontrado
} else {
    // Usuario no encontrado
    header("Location: ../view/errorLogin.php");
    exit();
}

// Manejar la actualización del perfil
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['Nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['Apellido']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $edad = mysqli_real_escape_string($conn, $_POST['Edad']);
    $direccion = mysqli_real_escape_string($conn, $_POST['Direccion']);
    $telefono = mysqli_real_escape_string($conn, $_POST['Telefono']);

    // Consulta SQL para actualizar la información del usuario
    $update = "UPDATE usuarios SET 
                Nombre = '$nombre', 
                Apellido = '$apellido', 
                Email = '$email', 
                Edad = '$edad', 
                Direccion = '$direccion', 
                Telefono = '$telefono' 
               WHERE UsuarioID = '$usuarioID'";

    if (mysqli_query($conn, $update)) {
        // Redirigir al perfil después de la actualización
        header("Location: ./usuarioDatos.php");
        exit();
    } else {
        echo "Error al actualizar la información: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <title>Editar Perfil</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar Perfil</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo htmlspecialchars($user['Nombre']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" value="<?php echo htmlspecialchars($user['Apellido']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="<?php echo htmlspecialchars($user['Email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="Edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="Edad" name="Edad" value="<?php echo htmlspecialchars($user['Edad']); ?>">
        </div>
        <div class="mb-3">
            <label for="Direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Direccion" name="Direccion" value="<?php echo htmlspecialchars($user['Direccion']); ?>">
        </div>
        <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo htmlspecialchars($user['Telefono']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="./usuarioDatos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
