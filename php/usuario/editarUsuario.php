<?php
include("../config.php");
session_start();

// Obtener el ID del usuario desde la URL
$userId = isset($_GET['UsuarioID']) ? intval($_GET['UsuarioID']) : 0;

// Consultar los datos del usuario
$sql = "SELECT Nombre, Apellido, Email, Edad, Direccion, Telefono FROM usuarios WHERE UsuarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si el usuario existe
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Usuario no encontrado";
    exit();
}

// Cerrar la conexión
$stmt->close();
$conn->close();

// Incluir el archivo de vista
include 'perfil_view.php';
?>