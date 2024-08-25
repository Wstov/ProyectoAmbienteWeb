<?php
session_start();
include '../../php/config.php';

if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../../php/login.php");
    exit();
}

$usuarioId = $_SESSION['UsuarioID'];
$libroId = $_POST['LibroID'] ?? null; // Obtén el libroID desde la solicitud POST

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $calificacion = $_POST['calificacion'];
    $comentario = $_POST['comentario'];

    // Inserta la reseña en la base de datos
    $sql = "INSERT INTO Resenas (UsuarioID, LibroID, Calificacion, Comentario, Fecha) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $usuarioId, $libroId, $calificacion, $comentario);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>¡Gracias por tu reseña!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al guardar la reseña: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();

    // Redirigir a la página de historial de ventas o a otra página
    header("Location: ../../view/user/historialUser.php");
    exit();
}
