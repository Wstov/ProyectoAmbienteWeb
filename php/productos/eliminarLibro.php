<?php

include("../config.php");
session_start();

try {
    if (isset($_GET['LibroID'])) {
        $libroID = $_GET['LibroID'];

        // Consulta para obtener la URL de la imagen
        $sql = $conn->prepare("SELECT ImagenURL FROM Libros WHERE LibroID = ?");
        if (!$sql) {
            throw new Exception("Error en la preparación de la consulta: " . $conn->error);
        }
        
        $sql->bind_param("i", $libroID);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagenURL = $row['ImagenURL'];

            // Eliminar el registro de la base de datos
            $sql = $conn->prepare("DELETE FROM Libros WHERE LibroID = ?");
            if (!$sql) {
                throw new Exception("Error en la preparación de la consulta: " . $conn->error);
            }

            $sql->bind_param("i", $libroID);

            if ($sql->execute()) {
                // Eliminar la imagen del servidor si existe
                if ($imagenURL && file_exists("../../booksImages/" . $imagenURL)) {
                    unlink("../../booksImages/" . $imagenURL);
                }
                header("Location: ../../view/admin/mostrarLibro.php?mensaje=Libro eliminado con éxito");
                exit();
            } else {
                throw new Exception("Error al eliminar el libro: " . $conn->error);
            }
        } else {
            throw new Exception("No se encontró el libro con el ID especificado.");
        }

        $sql->close();
        $conn->close();
    } else {
        throw new Exception("ID de libro no proporcionado");
    }
} catch (Exception $e) {
    // Redirigir a la página de error con el mensaje de error
    header("Location: ../../view/admin/errorItemsDelete.php?");
    exit();
}

?>
