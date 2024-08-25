<?php
session_start();
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['UsuarioID'])) {
        $usuarioID = $_SESSION['UsuarioID'];
        $libroID = $_POST['LibroID'];
        $fechaDevolucion = $_POST['FechaDevolucion'];
        $precio = $_POST['Precio'];
        $total = $precio; // Puedes ajustar el cálculo del total según sea necesario

        // Verificar el stock disponible
        $sqlCheckStock = "SELECT Cantidad FROM Stock WHERE LibroID = ?";
        $stmtCheckStock = $conn->prepare($sqlCheckStock);
        $stmtCheckStock->bind_param("i", $libroID);
        $stmtCheckStock->execute();
        $result = $stmtCheckStock->get_result();
        $stock = $result->fetch_object();

        if ($stock && $stock->Cantidad > 0) {
            // Insertar el alquiler en la base de datos
            $sqlInsertAlquiler = "INSERT INTO Alquileres (UsuarioID, LibroID, FechaAlquiler, FechaDevolucion, Total) VALUES (?, ?, NOW(), ?, ?)";
            $stmtInsertAlquiler = $conn->prepare($sqlInsertAlquiler);
            $stmtInsertAlquiler->bind_param("iisd", $usuarioID, $libroID, $fechaDevolucion, $total);

            if ($stmtInsertAlquiler->execute()) {
                // Actualizar el stock
                $sqlUpdateStock = "UPDATE Stock SET Cantidad = Cantidad - 1, unitOut = unitOut + 1 WHERE LibroID = ?";
                $stmtUpdateStock = $conn->prepare($sqlUpdateStock);
                $stmtUpdateStock->bind_param("i", $libroID);

                if ($stmtUpdateStock->execute()) {
                    header("Location: ../../view/user/indexUser.php");
                    exit();
                } else {
                    echo "Error al actualizar el stock: " . $stmtUpdateStock->error;
                }

                $stmtUpdateStock->close();
            } else {
                echo "Error al registrar el alquiler: " . $stmtInsertAlquiler->error;
            }

            $stmtInsertAlquiler->close();
        } else {
            echo "No hay stock disponible para este libro.";
        }

        $stmtCheckStock->close();
        $conn->close();
    } else {
        echo "Usuario no autenticado.";
    }
}
