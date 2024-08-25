<?php
session_start();
include '../../php/config.php'; // Ajusta la ruta a tu archivo config.php

// Verifica si el usuario está autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../../view/user/indexUser.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">¡Pago Procesado con Éxito!</h2>
        <p class="text-center">Tu compra ha sido realizada con éxito. Gracias por tu compra.</p>
        <div class="text-center">
            <a href="indexUser.php" class="btn btn-primary">Volver al Inicio</a>
        </div>
    </div>

    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
