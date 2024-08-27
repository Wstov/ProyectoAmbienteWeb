<?php
include "../config.php";
session_start();

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['UsuarioID'])) {
            $usuarioID = intval($_POST['UsuarioID']);
            
            // Preparar y ejecutar la consulta de eliminación
            $stmt = $conn->prepare("DELETE FROM Usuarios WHERE UsuarioID = ?");
            $stmt->bind_param("i", $usuarioID);

            if ($stmt->execute()) {
                // Éxito: asignar mensaje a la sesión
                $_SESSION['message'] = 'Usuario eliminado con éxito';
                $_SESSION['message_type'] = 'success';
            } else {
                throw new Exception('No se pudo eliminar el usuario.');
            }

            $stmt->close();
        } else {
            throw new Exception('ID de usuario no proporcionado.');
        }
    } else {
        throw new Exception('Método de solicitud no permitido.');
    }
} catch (Exception $e) {
    // Error: asignar mensaje a la sesión
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['message_type'] = 'danger';
}

$conn->close();

// Redireccionar a la página de usuarios
header("Location: ../../view/admin/errorEliminaUsuario.php");
exit();
?>
