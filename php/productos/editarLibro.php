<?php

include("../config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $libroID = $_POST['libroID'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $anioPublicacion = $_POST['anioPublicacion'];
    $formato = $_POST['formato'];
    $idioma = $_POST['idioma'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];
    $sipnosis = $_POST['sipnosis'];
    $destacado = isset($_POST['destacado']) ? 1 : 0; // Asegurar que 'destacado' es booleano

    // Inicializar $imagenURL
    $imagenURL = '';

    // Manejar la carga de la imagen si se proporciona una nueva
    if ($_FILES["imagenURL"]["name"]) {
        $target_dir = "../../booksImages/";
        $target_file = $target_dir . basename($_FILES["imagenURL"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verificar si el archivo es una imagen real o un archivo falso
        $check = getimagesize($_FILES["imagenURL"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }

        // Verificar si el archivo ya existe
        if (file_exists($target_file)) {
            // Eliminar el archivo existente
            if (!unlink($target_file)) {
                echo "Lo siento, hubo un error al eliminar el archivo existente.";
                $uploadOk = 0;
            }
        }

        // Verificar el tamaño del archivo
        if ($_FILES["imagenURL"]["size"] > 500000) {
            echo "Lo siento, tu archivo es demasiado grande.";
            $uploadOk = 0;
        }

        // Permitir ciertos formatos de archivo
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "webp") {
            echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG, GIF y WEBP.";
            $uploadOk = 0;
        }

        // Verificar si $uploadOk es 0 debido a un error
        if ($uploadOk == 0) {
            header("Location: ../../view/Admin/error.php");
            echo "Lo siento, tu archivo no fue subido.";
        } else {
            // Intentar subir el archivo
            if (move_uploaded_file($_FILES["imagenURL"]["tmp_name"], $target_file)) {
                $imagenURL = basename($_FILES["imagenURL"]["name"]); // Guardar solo el nombre del archivo en la base de datos
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.";
            }
        }
    }

    // Preparar la sentencia SQL para evitar inyecciones SQL
    if ($stmt = $conn->prepare("UPDATE Libros SET Titulo=?, Autor=?, Editorial=?, AnioPublicacion=?, Formato=?, Idioma=?, Categoria=?, Precio=?, Sipnosis=?, ImagenURL=?, Destacado=? WHERE LibroID=?")) {
        
        // Vincular parámetros
        if ($imagenURL) {
            $stmt->bind_param("sssisssdssii", $titulo, $autor, $editorial, $anioPublicacion, $formato, $idioma, $genero, $precio, $sipnosis, $imagenURL, $destacado, $libroID);
        } else {
            $stmt->bind_param("sssisssdssii", $titulo, $autor, $editorial, $anioPublicacion, $formato, $idioma, $genero, $precio, $sipnosis, $destacado, $libroID);
        }

        // Ejecutar la sentencia
        if ($stmt->execute()) {
            header("Location: ../../view/admin/mostrarLibro.php");
            exit();
        } else {
            echo "Error al ejecutar la sentencia: " . $stmt->error;
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
