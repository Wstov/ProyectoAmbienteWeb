<?php

session_start();
include("../config.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../view/errorLogin.php");
    exit();
}

// Manejar la adición o actualización de stock
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libroID = mysqli_real_escape_string($conn, $_POST['LibroID']);
    $unitIn = mysqli_real_escape_string($conn, $_POST['unitIn']);
    $unitOut = mysqli_real_escape_string($conn, $_POST['unitOut']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['Cantidad']);

    // Validar los datos
    if ($libroID && $cantidad) {
        // Comprobar si ya existe un registro de stock para el LibroID
        $checkStock = "SELECT * FROM Stock WHERE LibroID = '$libroID'";
        $result = mysqli_query($conn, $checkStock);

        if (mysqli_num_rows($result) > 0) {
            // Actualizar stock existente
            $update = "UPDATE Stock SET unitIn = '$unitIn', unitOut = '$unitOut', Cantidad = '$cantidad' WHERE LibroID = '$libroID'";

            if (mysqli_query($conn, $update)) {
                header("Location: ../../view/admin/indexAdmin.php");
                exit();
            } else {
                echo "Error al actualizar el stock: " . mysqli_error($conn);
            }
        } else {
            // Insertar nuevo stock
            $insert = "INSERT INTO Stock (LibroID, unitIn, unitOut, Cantidad) VALUES ('$libroID', '$unitIn', '$unitOut', '$cantidad')";

            if (mysqli_query($conn, $insert)) {
                header("Location: ../../view/admin/indexAdmin.php");
                exit();
            } else {
                echo "Error al agregar el stock: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>