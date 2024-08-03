<?php

include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $usuario;

    // Consulta SQL para verificar las credenciales del usuario
    $consulta = "SELECT * FROM usuarios WHERE Email = '$usuario' AND Contrasena = '$password'";
    $resultado = mysqli_query($conn, $consulta);

    // Verificar si se encontró una fila que coincida con las credenciales
    if ($filas = mysqli_fetch_array($resultado)) {
        // Verificar el rol del usuario
        if ($filas['RolID'] === '1') {
            header("Location: ../view/user/indexUser.php");
        } elseif ($filas['RolID'] === '2') {
            header("Location: ../view/admin/indexAdmin.php");
        }
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>