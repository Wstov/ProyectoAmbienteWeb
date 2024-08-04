<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
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
              <a href="./adminUsuarios.php" class="nav-link">Administrar Usuarios</a>
            </li>

            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
              <a href="./listarLibro.php" class="nav-link">Lista de Libros</a>
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
  <div class="container mt-5">
    <h1 class="mb-4">Registro de Libro</h1>
    <div class="card shadow-sm">
      <div class="card-body">
        <form id="bookForm" action="../../php/productos/registroLibro.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="col-md-6">
              <label for="autor" class="form-label">Autor</label>
              <input type="text" class="form-control" id="autor" name="autor" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4">
              <label for="editorial" class="form-label">Editorial</label>
              <input type="text" class="form-control" id="editorial" name="editorial" required>
            </div>
            <div class="col-md-4">
              <label for="anioPublicacion" class="form-label">Año de Publicación</label>
              <input type="number" class="form-control" id="anioPublicacion" name="anioPublicacion" required>
            </div>
            <div class="col-md-4">
              <label for="formato" class="form-label">Formato</label>
              <input type="text" class="form-control" id="formato" name="formato" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="idioma" class="form-label">Idioma</label>
              <select class="form-select form-control" id="idioma" name="idioma" required>
                <option selected disabled>Seleccione un Idioma...</option>
                <option value="Español">Español</option>
                <option value="Ingles">Ingles</option>
                <option value="Italiano">Italiano</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="genero" class="form-label">Género</label>
              <select class="form-select form-control" id="genero" name="genero" required>
                <option selected disabled>Agregar género...</option>
                <option value="Ficción">Ficción</option>
                <option value="Fantasía">Fantasía</option>
                <option value="Infantil">Infantil</option>
                <option value="Filosofía">Filosofía</option>
                <option value="Salud">Salud</option>
                <option value="Crimen">Crimen</option>
                <option value="Superación">Superación</option>
                <option value="Espiritualidad">Espiritualidad</option>
                <option value="Historia">Historia</option>
                <option value="Terror">Terror</option>
                <option value="Novela">Novela</option>
                <option value="Clásicos">Clásicos</option>
                <option value="Poesía">Poesía</option>
              </select>
            </div>
          </div>

            <!-- <div class="col-md-6">
              <label for="stock" class="form-label">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock" required>
            </div> -->
            <div class="row mb-3 align-items-center  ">
            <!-- Columna para el input de precio -->
              <div class="col-md-4">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
              </div>
       
              <div class="col-md-4">
                <div class="form-group">
                  <label for="imagenURL" class="form-label">Subir Imagen:</label>
                  <input class="form-control" type="file" id="imagenURL" name="imagenURL"/>
                </div>
              </div>

              <!-- Columna para el checkbox -->
              <div class="col-md-4"> 
                <div class="form-check form-switch">
                  <input class="form-check-input mr-3" type="checkbox" role="switch" id="destacado" name="highlight" />
                  <input type="hidden" name="destacado" value="false" />
                  <label class="form-check-label" for="destacado">Destacar Producto</label>
                </div>
              </div>

                            <!-- <div class="col-sm-auto"> 
                                <div class="form-check form-switch">
                                    <input class="form-check-input mr-3" type="checkbox" role="switch" id="offer" name="offer" />
                                    <input type="hidden" name="offer" value="false" />
                                    <label class="form-check-label" for="offer">Producto en Oferta</label>
                                </div>
                            </div> -->
            </div>



          
          <div class="mb-3">
            <label for="sipnosis" class="form-label">Sinopsis</label>
            <textarea class="form-control" id="sipnosis" name="sipnosis" rows="3" required></textarea>
          </div>
          <!-- <div class="mb-3">
            <label for="imagenURL" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagenURL" name="imagenURL" required>
          </div> -->
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Registrar Libro</button>
          </div>
          
        </form>
      </div>
    </div>
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
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
