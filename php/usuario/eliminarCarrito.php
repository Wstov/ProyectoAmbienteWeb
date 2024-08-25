<?php
include("../config.php");
session_start();

if (isset($_GET['CarritoID'])) {
    $itemID = $_GET['CarritoID'];

    // Eliminar el registro del carrito de la base de datos
    $sql = $conn->prepare("DELETE FROM Carrito WHERE CarritoID = ?");
    $sql->bind_param("i", $itemID);

    if ($sql->execute()) {
        // Redirigir a la página del carrito con un mensaje de éxito
        header("Location: ../../view/user/carrito.php?mensaje=Ítem eliminado con éxito");
        exit();
    } else {
        echo "Error al eliminar el ítem: " . $conn->error;
    }

    // Cerrar la conexión
    $sql->close();
    $conn->close();
} else {
    echo "ID de ítem no proporcionado.";
}
?>
