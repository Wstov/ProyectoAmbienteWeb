<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../view/errorLogin.php");
    exit();
}

// Obtener el ID del usuario de la sesión
$usuarioID = $_SESSION['UsuarioID'];
?>
