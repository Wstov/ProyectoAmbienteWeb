<?php
session_start();
include '../../php/config.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../view/errorLogin.php");
    exit();
}

// Obtener el ID del libro desde la URL
$libroID = isset($_GET['LibroID']) ? intval($_GET['LibroID']) : 0;

// Obtener la información del libro
$sql = "SELECT * FROM Libros WHERE LibroID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $libroID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Libro no encontrado.";
    exit();
}

$book = $result->fetch_object();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css"> <!-- Incluye tu archivo CSS para estilos personalizados -->
    <title>Alquilar Libro</title>
    <style>
        .book-image {
            max-width: 100%; /* Ajusta para que la imagen ocupe todo el ancho disponible */
            height: auto;
            border-radius: 8px; /* Añade bordes redondeados */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Sombra más prominente */
        }
        .container {
            margin-top: 20px;
        }
        .form-container {
            display: flex;
            align-items: flex-start; /* Alinea al inicio (arriba) del contenedor */
            gap: 20px; /* Espacio entre el formulario y la imagen */
        }
        .form-section {
            flex: 1;
            max-width: 600px; /* Ajusta el tamaño máximo del formulario */
        }
        .image-section {
            flex: 0 0 400px; /* Ajusta el tamaño fijo de la imagen */
            display: flex;
            justify-content: center; /* Centra la imagen en su contenedor */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Alquilar Libro</h1>
        <div class="form-container">
            <div class="image-section">
                <img src="../../booksImages/<?= htmlspecialchars($book->ImagenURL) ?>" alt="Portada del libro" class="book-image">
            </div>
            <div class="form-section">
                <form action="../../php/usuario/alquilarLibro.php" method="POST">
                    <input type="hidden" name="LibroID" value="<?= htmlspecialchars($book->LibroID) ?>">
                    <input type="hidden" name="Precio" value="<?= htmlspecialchars($book->Precio) ?>">

                    <div class="mb-3">
                        <label for="FechaDevolucion" class="form-label">Fecha de Devolución</label>
                        <input type="datetime-local" class="form-control" id="FechaDevolucion" name="FechaDevolucion" required>
                    </div>

                    <div class="mb-3">
                        <p><strong>Título:</strong> <?= htmlspecialchars($book->Titulo) ?></p>
                        <p><strong>Precio:</strong> ₡<?= number_format($book->Precio, 2, ',', '.') ?></p>
                    </div>

                    <button type="submit" class="btn btn-primary">Confirmar Alquiler</button>
                    <a href="../view/userInfoLibro.php?LibroID=<?= htmlspecialchars($book->LibroID) ?>" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
