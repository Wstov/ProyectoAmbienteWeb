<?php
session_start();
include '../php/router.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <title>Storybound Books</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg py-3 navbar-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img
              src="../img/storybound_books_logo_black.png"
              width="130"
              height="130a"
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

          <div class="lc-block collapse navbar-collapse" id="myNavbar3">
            <div lc-helper="shortcode" class="live-shortcode ms-auto">
              <!--  lc_nav_menu -->
              <ul id="menu-menu-1" class="navbar-nav">
                <li
                  class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-32739"
                >
                  <a
                    href="https://library.livecanvas.com/starters"
                    class="nav-link"
                    >BS5 Page Templates</a
                  >
                </li>
                <li
                  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738"
                >
                  <a
                    href="https://library.livecanvas.com/sections/"
                    class="nav-link"
                    >BS5 Snippets</a
                  >
                </li>
              </ul>
              <!-- /lc_nav_menu -->
            </div>
            <div class="lc-block ms-auto d-grid gap-2 d-lg-block">
              <a class="btn link-secondary" href="#" role="button" 
                >Ingresar</a
              >
              <a class="btn btn-primary" href="../view/registroUsuario.php" role="button">Registrarse</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
  </body>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>
