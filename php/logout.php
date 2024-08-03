<?php
session_start(); // Iniciar la sesión

// Verificar si la sesión está iniciada antes de intentar destruirla
if (isset($_SESSION)) {
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
}

// Redirigir al usuario a la página de inicio de sesión o página de inicio
header("Location: ../index.php"); 
exit();
?>