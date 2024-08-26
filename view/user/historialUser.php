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
<main style="height: 60vh">
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


<footer >
  <section class="bg-dark text-light">
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-3">
              <div class="lc-block mb-4">
                <img
                  class="img-fluid"
                  alt="logo"
                  src="../../img/logobook_withe_logo.png"
                  style="max-height: 20vh"
                />
              </div>
              <div class="lc-block small">
                <div editable="rich">
                  <p>
                  Bienvenido a nuestra librería. Aquí encontrarás una amplia selección de libros de todas las categorías. 
                  Nos apasiona compartir el amor por la lectura con todos nuestros clientes. ¡Explora, descubre y disfruta!
                  </p>
                </div>
              </div>
              <!-- /lc-block -->
              <div class="lc-block py-2">
                <a class="text-decoration-none" href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 320 512"
                    width="1em"
                    height="1em"
                    lc-helper="svg-icon"
                    fill="var(--bs-light)"
                  >
                    <path
                      d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
                    ></path>
                  </svg>
                </a>
                <a class="text-decoration-none" href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                    width="1em"
                    height="1em"
                    lc-helper="svg-icon"
                    fill="var(--bs-light)"
                  >
                    <path
                      d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                    ></path>
                  </svg>
                </a>
                <a class="text-decoration-none" href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    width="1em"
                    height="1em"
                    lc-helper="svg-icon"
                    fill="var(--bs-light)"
                  >
                    <path
                      d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                    ></path>
                  </svg>
                </a>
                <a class="text-decoration-none" href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512"
                    width="1em"
                    height="1em"
                    lc-helper="svg-icon"
                    fill="var(--bs-light)"
                  >
                    <path
                      d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"
                    ></path>
                  </svg>
                </a>
                <a class="text-decoration-none" href="#">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    width="1em"
                    height="1em"
                    lc-helper="svg-icon"
                    fill="var(--bs-light)"
                  >
                    <path
                      d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                    ></path>
                  </svg>
                </a>
              </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
              <div class="lc-block mb-4">
                <div editable="rich">
                  <h4>Get Started</h4>
                </div>
              </div>
              <!-- /lc-block -->
              <div class="lc-block small">
                <div editable="rich">
                  <p>Tutorial</p>
                  <p>
                    Recursos
                    <br />
                  </p>
                  <p>Docs</p>
                  <!-- <p>Example</p> -->
                </div>
              </div>
              <!-- /lc-block -->
            </div>
            <div class="col-lg-2 offset-lg-1">
              <div class="lc-block mb-4">
                <div editable="rich">
                  <h4>About us</h4>
                </div>
              </div>
              <!-- /lc-block -->
              <div class="lc-block small">
                <div editable="rich">
                  <p>Historia</p>
                  <p>Trabajar con nosotros</p>
                  <p>Blog</p>
                 <!-- <p>News</p> -->
                </div>
              </div>
              <!-- /lc-block -->
            </div>
           <!--  <div class="col-lg-2 offset-lg-1">
              <div class="lc-block mb-4">
                <div editable="rich">
                  <h4>Downloads</h4>
                </div>
              </div> -->
              <!-- /lc-block -->
             <!-- <div class="lc-block small">
                <div editable="rich">
                  <p>Vertex 1.2</p>
                  <p>Templates</p>
                  <p>Sounds</p>
                  <p>Gradients</p>
                </div>
              </div> -->
              <!-- /lc-block -->
            </div>
          </div>
        </div>
        <div class="py-5 container">
          <div class="row">
            <div class="col-6 small">
              <div class="lc-block">
                <div editable="rich">
                  <p>Copyright © Story Bound Books 2024</p>
                </div>
              </div>
              <!-- /lc-block -->
            </div>
            
          </div>
        </div>
      </section>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>