<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Error al Eliminar Libro</title>
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ocupa toda la altura de la ventana */
            text-align: center;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container error-container">
        <h1 class="display-4 text-danger">No se puede eliminar el libro</h1>
        <p class="lead display-6">
            <?php
            if (isset($_GET['error'])) {
                echo htmlspecialchars($_GET['error']);
            } else {
                echo "Aún hay registros activos en el inventario.";
            }
            ?>
        </p>
        <a href="../admin/mostrarLibro.php" class="btn btn-primary btn-back">Regresar</a>
    </div>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>