<?php
include("../../php/config.php");
include("../../php/session.php");

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
        header("Location: perfilUser.php");
        exit();
    } else {
        echo "Error al actualizar la información: " . mysqli_error($conn);
    }
}
?>