<?php

include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $email = $_POST['Email'];
    $password = $_POST['Contrasena'];
    $edad = $_POST['Edad'];
    $direccion = $_POST['Direccion'];
    $telefono = $_POST['Telefono'];

    // Asignar un valor predeterminado para $Rol
    $rol = 1; // Valor predeterminado

    // Preparar la sentencia SQL para evitar inyecciones SQL
    if ($stmt = $conn->prepare("INSERT INTO usuarios (Nombre, Apellido, Email, Contrasena, RolID, Edad, Direccion, Telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
        // Asignar el valor de $Rol a un ID, si es necesario
        $rolID = 1; 

        // Vincular parámetros
        $stmt->bind_param("ssssiiss", $nombre, $apellido, $email, $password, $rolID, $edad, $direccion, $telefono);

        // Ejecutar la sentencia
        if ($stmt->execute()) {
            header("Location: ../view/user/indexUser.php");

            exit();
        } else {
            header("Location: error.php");
            exit();
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la sentencia SQL: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Método de solicitud no válido";
}
?>
