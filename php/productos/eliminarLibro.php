<?php

include("../config.php");
session_start();

if (isset($_GET['LibroID'])) {
    $libroID = $_GET['LibroID'];

    // Consulta para obtener la URL de la imagen
    $sql = $conn->prepare("SELECT ImagenURL FROM Libros WHERE LibroID = ?");
    $sql->bind_param("i", $libroID);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagenURL = $row['ImagenURL'];

        // Eliminar el registro de la base de datos
        $sql = $conn->prepare("DELETE FROM Libros WHERE LibroID = ?");
        $sql->bind_param("i", $libroID);

        if ($sql->execute()) {
            // Eliminar la imagen del servidor si existe
            if ($imagenURL && file_exists("../../booksImages/" . $imagenURL)) {
                unlink("../../booksImages/" . $imagenURL);
            }
            header("Location: ../../view/admin/mostrarLibro.php?mensaje=Libro eliminado con éxito");
            exit();
        } else {
            echo "Error al eliminar el libro: " . $conn->error;
        }
    } else {
        echo "No se encontró el libro con el ID especificado.";
    }

    // Cerrar la conexión
    $sql->close();
    $conn->close();
} else {
    echo "ID de libro no proporcionado";
}
?>