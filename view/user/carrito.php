<?php
include '../../php/config.php'; 
session_start();

// Asegúrate de que el usuario esté autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../../php/login.php");
    exit();
}

$userId = $_SESSION['UsuarioID'];
$sql = "SELECT CarritoID, LibroID, Cantidad, PrecioUni FROM Carrito WHERE UsuarioID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$books = [];
$sql = "SELECT CarritoID, LibroID, Cantidad, PrecioUni 
        FROM Carrito 
        WHERE UsuarioID = ? AND Vendido = 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $bookId = $row["LibroID"];
    $bookResult = $conn->query("SELECT Titulo, ImagenURL FROM libros WHERE LibroID = $bookId");
    if ($bookResult->num_rows > 0) {
        $books[$row["CarritoID"]] = array_merge($row, $bookResult->fetch_assoc());
    }
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos Agregados</title>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 20px;
        }
        .table img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }
        .no-records {
            text-align: center;
            font-style: italic;
            color: #999;
        }
    </style>
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
          <ul id="menu-menu-1" class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="./historialUser.php" class="nav-link">Historial de Compras</a>
            </li>
          </ul>
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
        </div>
      </div>
    </nav>
</header>

<section class="bg-light">
    <div class="container">
        <div class="p-1">
            <div class="mb-4">
                <h2 class="fw-bolder display-5">Lista de productos agregados</h2>
            </div>
        </div>

        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col" class="text-center">Imagen</th>
                                        <th scope="col" class="text-center">Nombre</th>
                                        <th scope="col" class="text-center">Cantidad</th>
                                        <th scope="col" class="text-center">Precio</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($books)): ?>
                                        <?php foreach ($books as $carritoId => $book): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <img src="../../booksImages/<?php echo htmlspecialchars($book["ImagenURL"]); ?>" alt="<?php echo htmlspecialchars($book["Titulo"]); ?>" class="img-fluid">
                                                </td>
                                                <td class="text-center h5"><?php echo htmlspecialchars($book["Titulo"]); ?></td>
                                                <td class="text-center h5"><?php echo htmlspecialchars($book["Cantidad"]); ?></td>
                                                <td class="text-center h5"><?php echo number_format($book["PrecioUni"], 2, ',', '.'); ?> ₡</td>
                                                <td class="text-center h5">
                                                    <a href="#" 
                                                       class="btn btn-sm btn-danger w-100" 
                                                       title="Eliminar" 
                                                       data-bs-toggle="modal" 
                                                       data-bs-target="#deleteModal" 
                                                       data-bs-id="<?php echo htmlspecialchars($carritoId); ?>">
                                                        <i class="bi bi-trash"></i> Eliminar
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center no-records">No se han agregado productos en tu carrito</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Resumen</h5>
                            <?php
                            $total = 0;
                            foreach ($books as $book) {
                                $total += $book["PrecioUni"] * $book["Cantidad"];
                            }
                            ?>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Total: ₡</span>
                                <span id="total-amount"><?php echo number_format($total, 2, ',', '.'); ?></span>
                            </div>
                            <form action="../../php/usuario/procesarPago.php" method="POST">
                                <button type="submit" class="btn btn-primary w-100">Realizar Pago</button>
                            </form>
                            <a href="./indexUser.php" class="btn btn-secondary w-100 mt-2">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este libro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="" id="confirmDelete" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var carritoID = button.getAttribute('data-bs-id');
            var confirmDelete = document.getElementById('confirmDelete');
            confirmDelete.href = "../../php/usuario/eliminarCarrito.php?CarritoID=" + carritoID;
        });
    });
</script>
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close(); // Cerrar la conexión con la base de datos
?>
