<?php
session_start();
include '../../php/config.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../../php/login.php");
    exit();
}

$userId = $_SESSION['UsuarioID'];

// Obtener el historial de ventas del usuario
$sql = "SELECT v.VentaID, v.FechaVenta, v.Total, l.Titulo, l.ImagenURL, c.Cantidad, c.LibroID
        FROM Ventas v
        INNER JOIN Carrito c ON v.CarritoID = c.CarritoID
        INNER JOIN Libros l ON c.LibroID = l.LibroID
        WHERE v.UsuarioID = ?
        ORDER BY v.FechaVenta DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$ventas = [];
while ($row = $result->fetch_assoc()) {
    $ventas[] = $row;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../css/cart.css">
  <link rel="stylesheet" href="../../css/verMasBtn.css">
  <title>Storybound Books</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg py-3 navbar-light">
      <div class="container">
        <a class="navbar-brand" href="indexUser.php">
          <img
            src="../../img/storybound_books_logo_black.png"
            width="130"
            height="130"
            class="align-middle me-1 img-fluid"
            alt="bookshop logo"
          />
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#myNavbar3"
          aria-controls="myNavbar3"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar3">
          <div class="d-flex align-items-center ms-auto">

            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Acciones
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="./usuarioDatos.php">Perfil</a></li>
                  <li><a class="dropdown-item" href="../../php/logout.php">Cerrar sesión</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <a class="btn-cart me-3" href="./carrito.php">
          <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
            <title>icon-cart</title>
            <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
          </svg>
          <span class="quantity"></span>
        </a>
        </div>
      </div>
    </nav>
</header>
<main>
    <div class="container mt-5">
        <h2 class="mb-4">Historial de Ventas</h2>
        <?php if (!empty($ventas)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha de Venta</th>
                        <th>Título del Libro</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acción</th> <!-- Nueva columna para acciones -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta): ?>
                        <tr>
                            <td><?php echo date("d/m/Y H:i", strtotime($venta['FechaVenta'])); ?></td>
                            <td><?php echo htmlspecialchars($venta['Titulo']); ?></td>
                            <td><img src="../../booksImages/<?php echo htmlspecialchars($venta['ImagenURL']); ?>" alt="Imagen del Libro" style="width: 50px; height: auto;"></td>
                            <td><?php echo htmlspecialchars($venta['Cantidad']); ?></td>
                            <td>₡<?php echo number_format($venta['Total'], 2); ?></td>
                            <td>
                                <a href="resenaLibro.php?LibroID=<?php echo $venta['LibroID']; ?>&VentaID=<?php echo $venta['VentaID']; ?>" class="btn btn-success btn-sm w-100">Dar Reseña</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay ventas registradas.</p>
        <?php endif; ?>
        <a href="./indexUser.php" class="btn btn-primary">Volver al Perfil</a>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>