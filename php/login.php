<?php

include("./config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $usuario;

    // Función de encriptación de contraseña
    $clave = "Proyecto2C2024";

    function encrypt($string, $key) {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }

    // Ejecuta la función
    $Contrasena_encrypt = encrypt($password, $clave);

    // Consulta SQL para verificar las credenciales del usuario
    $consulta = "SELECT UsuarioID, Nombre, Apellido, RolID FROM usuarios WHERE Email = '$usuario' AND Contrasena = '$Contrasena_encrypt'";
    $resultado = mysqli_query($conn, $consulta);

    // Verificar si se encontró una fila que coincida con las credenciales
    if ($filas = mysqli_fetch_array($resultado)) {
        // Guardar nombre, apellido, y UsuarioID en la sesión
        $_SESSION['Nombre'] = $filas['Nombre'];
        $_SESSION['Apellido'] = $filas['Apellido'];
        $_SESSION['UsuarioID'] = $filas['UsuarioID']; // Almacena el ID de usuario

        // Verificar el rol del usuario
        if ($filas['RolID'] === '1') {
            header("Location: ../view/user/indexUser.php");
        } elseif ($filas['RolID'] === '2') {
            header("Location: ../view/admin/indexAdmin.php");
        }
    } else {
        header("Location: ../view/errorLogin.php");
    }
}
?>
