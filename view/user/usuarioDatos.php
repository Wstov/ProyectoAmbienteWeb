<?php
session_start();
include("../../php/config.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['UsuarioID'])) {
    header("Location: ../view/errorLogin.php");
    exit();
}

// Obtener el ID del usuario de la sesión
$usuarioID = $_SESSION['UsuarioID'];

// Consulta SQL para obtener la información del usuario
$consulta = "SELECT * FROM usuarios WHERE UsuarioID = '$usuarioID'";
$resultado = mysqli_query($conn, $consulta);

// Verificar si se encontró el usuario
if ($user = mysqli_fetch_array($resultado)) {
    // Usuario encontrado
} else {
    // Usuario no encontrado
    header("Location: ../view/errorLogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/cart.css">
    <title>Perfil del Usuario</title>
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
            <h1 class="mb-4">Perfil del Usuario</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre</td>
                        <td><?php echo htmlspecialchars($user['Nombre']); ?></td>
                    </tr>
                    <tr>
                        <td>Apellido</td>
                        <td><?php echo htmlspecialchars($user['Apellido']); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo htmlspecialchars($user['Email']); ?></td>
                    </tr>
                    <tr>
                        <td>Edad</td>
                        <td><?php echo htmlspecialchars($user['Edad']); ?></td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td><?php echo htmlspecialchars($user['Direccion']); ?></td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td><?php echo htmlspecialchars($user['Telefono']); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center mt-3">
                <a href="./editarPerfil.php?UsuarioID=<?php echo htmlspecialchars($user['UsuarioID']); ?>" class="btn btn-primary">Editar Perfil</a>
            </div>
        </div>
    </main>
    <footer>
        <!-- Footer aquí -->
    </footer>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
