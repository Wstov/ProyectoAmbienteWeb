<?php
include("../config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $rolID = $_POST['RolID'];
    $usuarioID = $_POST['UsuarioID'];

    // Preparar la sentencia SQL para evitar inyecciones SQL
    $stmt = $conn->prepare("UPDATE usuarios SET RolID=? WHERE UsuarioID=?");

    // Vincular parámetros
    $stmt->bind_param("ii", $rolID, $usuarioID);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        header("Location: ../../view/admin/adminUsuarios.php");
        exit();
    } else {
        echo "Error al ejecutar la sentencia: " . $stmt->error;
    }

    // Cerrar la sentencia
    $stmt->close();

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Método de solicitud no válido";
}
?>
