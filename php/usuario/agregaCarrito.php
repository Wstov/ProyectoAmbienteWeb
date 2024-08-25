<?php
session_start(); // Inicia la sesión
include '../config.php'; // Ajusta la ruta a tu config.php

// Verifica si se está enviando una solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $idProduct = $_POST['idProduct'];
    $nameProduct = $_POST['nameProduct'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $selled = 0; 

    // Verifica si UsuarioID está en la sesión
    if (isset($_SESSION['UsuarioID'])) {
        $userId = $_SESSION['UsuarioID'];

        // Insertar en la tabla Carrito
        $stmt = $conn->prepare("INSERT INTO Carrito (UsuarioID, LibroID, Cantidad, PrecioUni, Vendido) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiidi", $userId, $idProduct, $quantity, $price, $selled);

        if ($stmt->execute()) {
            header("Location: ../../view/user/carrito.php"); 
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Usuario no autenticado.";
    }
}

$conn->close();
?>
