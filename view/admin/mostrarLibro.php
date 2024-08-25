<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/editarBtn.css">
    <link rel="stylesheet" href="../../css/eliminarBtn.css">
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
              <a href="./registroLibro.php" class="nav-link">Registrar Libro</a>
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
<div class=" m-5">
        <h1 class="mb-4">Lista de Libros</h1>
        <?php
        include "../../php/config.php";
        $sql = $conn->query("SELECT * FROM Libros");
        if ($sql->num_rows > 0) {
        ?>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <!-- <th class="text-center">Imagen</th> -->
                        <th class="text-center">Título</th>
                        <th class="text-center">Autor</th>
                        <th class="text-center">Editorial</th>
                        <th class="text-center">Año Publicación</th>
                        <th class="text-center">Formato</th>
                        <th class="text-center">Idioma</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center">Precio</th>
                        
                        <th class="text-center px-5">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $sql->fetch_object()) { ?>
                        <tr>

                            <td class="text-center"><?= htmlspecialchars($row->Titulo) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->Autor) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->Editorial) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->AnioPublicacion) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->Formato) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->Idioma) ?></td>
                            <td class="text-center"><?= htmlspecialchars($row->Categoria) ?></td>
                            <td class="text-center"><?= number_format($row->Precio, 2, ',', '.') ?></td>
                            
                            
                              <td class=" text-center-custom d-flex align-items-center justify-content-center ">
                                  <a href="./editarLibro.php?LibroID=<?= htmlspecialchars($row->LibroID) ?>" class="edit-button" title="Editar">
                                      <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                          <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                      </svg>
                                  </a>
                                  <a href="#" class="delete-button" title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="<?= htmlspecialchars($row->LibroID) ?>">
                                    <svg class="delete-svgIcon" viewBox="0 0 448 512">
                                      <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                    </svg>
                                  </a>

                              </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
        var libroID = button.getAttribute('data-bs-id');
        var confirmDelete = document.getElementById('confirmDelete');
        confirmDelete.href = "../../php/productos/eliminarLibro.php?LibroID=" + libroID;
    });
});
</script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>