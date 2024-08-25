<?php
session_start(); // Asegúrate de que la sesión esté iniciada
include '../config.php'; // Ajusta la ruta a tu archivo config.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['UsuarioID'])) {
        $userId = $_SESSION['UsuarioID'];
        
        // Obtener los datos del carrito del usuario
        $sql = "SELECT CarritoID, LibroID, Cantidad, PrecioUni FROM Carrito WHERE UsuarioID = ? AND Vendido = 0";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $total = 0;
        $carritoItems = [];
        
        while ($row = $result->fetch_assoc()) {
            $carritoItems[] = $row;
            $total += $row['PrecioUni'] * $row['Cantidad'];
        }

        // Insertar la venta en la tabla Ventas
        $sqlVenta = "INSERT INTO Ventas (UsuarioID, CarritoID, FechaVenta, Total) VALUES (?, ?, NOW(), ?)";
        $stmtVenta = $conn->prepare($sqlVenta);

        foreach ($carritoItems as $item) {
            $stmtVenta->bind_param("iid", $userId, $item['CarritoID'], $total);
            if (!$stmtVenta->execute()) {
                echo "Error al registrar la venta: " . $stmtVenta->error;
                $stmtVenta->close();
                $stmt->close();
                $conn->close();
                exit();
            }
        }

        $stmtVenta->close();

        // Actualizar la columna 'Vendido' a 1 (verdadero) para todos los productos en el carrito del usuario
        $sqlUpdate = "UPDATE Carrito SET Vendido = 1 WHERE UsuarioID = ? AND Vendido = 0";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("i", $userId);

        if ($stmtUpdate->execute()) {
            // Redirigir a una página de confirmación o mostrar un mensaje de éxito
            header("Location: ../../view/user/confirmarPago.php");
            exit();
        } else {
            echo "Error al procesar el pago: " . $stmtUpdate->error;
        }

        $stmtUpdate->close();
        $stmt->close();
        $conn->close();
    } else {
        echo "Usuario no autenticado.";
    }
}
?>
