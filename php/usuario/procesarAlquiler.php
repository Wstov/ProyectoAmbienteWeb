<?php
session_start();
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['UsuarioID'])) {
        $usuarioID = $_SESSION['UsuarioID'];
        $libroID = $_POST['LibroID'];
        $fechaDevolucion = $_POST['FechaDevolucion'];
        $precio = $_POST['Precio'];
        $total = $precio; // Puedes calcular el total basado en el número de días o alguna otra lógica

        // Insertar el alquiler en la base de datos
        $sql = "INSERT INTO Alquileres (UsuarioID, LibroID, FechaAlquiler, FechaDevolucion, Total) VALUES (?, ?, NOW(), ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisd", $usuarioID, $libroID, $fechaDevolucion, $total);

        if ($stmt->execute()) {
            // Actualizar el stock
            $sqlUpdateStock = "UPDATE Stock SET Cantidad = Cantidad - 1, unitOut = unitOut + 1 WHERE LibroID = ?";
            $stmtUpdateStock = $conn->prepare($sqlUpdateStock);
            $stmtUpdateStock->bind_param("i", $libroID);

            if ($stmtUpdateStock->execute()) {
                header("Location: ../../view/user/confirmarAlquiler.php");
                exit();
            } else {
                echo "Error al actualizar el stock: " . $stmtUpdateStock->error;
            }

            $stmtUpdateStock->close();
        } else {
            echo "Error al registrar el alquiler: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Usuario no autenticado.";
    }
}
?>