<?php
include('../config.php');
session_start();

// Obtener el ID del usuario desde la URL
$userID = isset($_GET['UsuarioID']) ? intval($_GET['UsuarioID']) : 0;

if ($userID > 0) {
    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT UsuarioID, Nombre, Apellido, Email, Edad, Direccion, Telefono FROM usuarios WHERE UsuarioID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Usuario no encontrado";
        exit();
    }

    $stmt->close();
} else {
    echo "ID de usuario no válido";
    exit();
}

$conn->close();

// Incluir el archivo de vista
include('../../view/user/indexUser.php');
?>
