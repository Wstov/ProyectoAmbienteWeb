<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/heightIndexAdmin.css">
    <title>Storybound Books - Administrador</title>
  </head>
  <body>
  <header>
    
  <nav class="position-relative navbar flex-wrap py-4 px-4 px-md-10 navbar-expand-lg navbar-light bg-white shadow-lg">
    <div class="container-fluid">

      <button class="d-lg-none ms-auto btn bg-light p-0 d-flex justify-content-center align-items-center rounded-circle" style="width: 50px; height: 50px" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_LC_logocenter" aria-controls="navbar_LC_logocenter" aria-expanded="false" aria-label="Toggle navigation">
        <svg style="width: 24px; height: 24px" viewBox="0 0 24 24">
          <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"></path>
        </svg>
      </button>
      <div class="d-none d-md-block position-absolute top-50 start-50 translate-middle">
        <a class="navbar-brand" href="./indexAdmin.php">
          <img src="../../img/storybound_books_logo_black.png" width="100" height="100" class="d-inline-block align-text-top me-2 img-fluid" alt=""/>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar_LC_logocenter">
        <div lc-helper="shortcode" class="live-shortcode me-auto text-end">
          <!-- lc_nav_menu -->
          <ul id="menu-menu-1" class="navbar-nav">
            <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-32739">
              <a href="./indexAdmin.php" class="nav-link">Inicio</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
              <a href="./registroLibro.php" class="nav-link">Registrar Libro</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
              <a href="./adminUsuarios.php" class="nav-link">Administrar Usuarios</a>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
              <a href="./mostrarLibro.php" class="nav-link">Lista de Libros</a>
            </li>
          </ul>
          <!-- /lc_nav_menu -->
        </div>
        <div class="ms-auto">
          <a href="../../php/logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </nav>
</header>

    <main>
    <div class="container py-5">
    <?php
        include "../../php/config.php";
        $sql = $conn->query("SELECT * FROM Libros");
        if ($sql->num_rows > 0) {
        ?>
    <div class="row">
    
      <?php while ($row = $sql->fetch_object()) { ?>
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="lc-block bg-white rounded shadow"><img class="responsive-image" src="../../booksImages/<?= htmlspecialchars($row->ImagenURL) ?>" alt="Imagen de <?= htmlspecialchars($row->Titulo) ?>" sizes="(max-width: 1080px) 100vw, 1080px" width="100%" height="459" loading="lazy">
            <div class="lc-block p-4">
                <div editable="rich">
                    <h3><?= htmlspecialchars($row->Titulo) ?></h3>
                    <p><?= htmlspecialchars($row->Autor) ?></p>
                    <p>₡<?= number_format($row->Precio, 2, ',', '.') ?></p>
                </div>
            </div>
          </div>
          </div>
        <?php } ?>
    
</div>
<?php
        } else {
            echo '<p>No hay libros disponibles.</p>';
        }
        $conn->close();
        ?>

</div>


    

    </main>
    <footer>

        <div
          class="container d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"
        >
          <div class="col-md-4 d-flex align-items-center">
            <div class="lc-block text-center mb-3 mb-md-0">
              <a class="navbar-brand" href="#">
                <img
                  class="img-fluid me-1"
                  src="../../img/storybound_books_logo_black.png"
                  alt="my brand"
                  width="120px"
                  height="120px"
                />
              </a>

              <span editable="inline" class="text-muted"
                >© 2024 Storybound Books</span
              >
            </div>
          </div>
        </div>

    </footer>
    
  </body>
</html>