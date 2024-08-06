<?php
include '../php/config.php';

// Fetch the specific book details
$libroId = $_GET['LibroID'] ?? 0;
$sql = $conn->query("SELECT * FROM libros WHERE LibroID = $libroId");
$showBook = $sql->fetch_object();

// Fetch recommended books based on genre
$recommendedSql = $conn->query("SELECT * FROM libros WHERE Categoria = '$showBook->Categoria' AND LibroID != $libroId");
$recommendedBooks = [];
while ($row = $recommendedSql->fetch_object()) {
    $recommendedBooks[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storybound Books</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/verMasBtn.css">
</head>
<body>
<header>
      <nav class="navbar navbar-expand-lg py-3 navbar-light">
        <div class="container">
          <a class="navbar-brand" href="../index.php">
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
    <main>
        <section>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-xl-7 mb-lg-0 py-5 py-md-6">
                        <div class="lc-block mb-3 mb-md-5 lh-1">
                            <div>
                                <h1 class="text-primary fw-bolder display-5">Storybound Books</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5">
                        <div class="lc-block px-md-4 px-lg-5 lh-lg">
                            <div>
                                <p class="rfs-7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et metus id ligula malesuada placerat sit amet quis enim.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="../booksImages/<?= htmlspecialchars($showBook->ImagenURL) ?>" class="img-fluid grow-on-hover" alt="Portada del libro" style="width: 100%; height: auto;">
                    </div>
                    <div class="col-md-5">
                        <form action="user/cart/add-product.php" method="POST">
                            <input type="hidden" value="<?= htmlspecialchars($showBook->LibroID) ?>" name="idProduct">
                            <input type="hidden" value="<?= htmlspecialchars($showBook->Titulo) ?>" name="nameProduct">
                            <input type="hidden" value="<?= htmlspecialchars($showBook->Precio) ?>" name="price">

                            <p class="fw-bold display-5"><?= htmlspecialchars($showBook->Titulo) ?></p>
                            <p><strong>Autor:</strong> <?= htmlspecialchars($showBook->Autor) ?></p>
                            <p><strong>Editorial:</strong> <?= htmlspecialchars($showBook->Editorial) ?></p>
                            <p><strong>Fecha de Publicación:</strong> <?= htmlspecialchars($showBook->AnioPublicacion) ?></p>
                            <p><strong>Formato:</strong> <?= htmlspecialchars($showBook->Formato) ?></p>
                            <p><strong>Idioma:</strong> <?= htmlspecialchars($showBook->Idioma) ?></p>
                            <p><strong>Género:</strong> <?= htmlspecialchars($showBook->Categoria) ?></p>
                            <p><strong>Precio:</strong> ₡<?= number_format($showBook->Precio, 2, ',', '.') ?></p>
                            <div class="form-group row mb-3">
                                <label for="cantidad" class="col-sm-2 col-form-label"><strong>Cantidad:</strong></label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
                                </div>
                            </div>

                            <button class="CartBtn">
                                <span class="IconContainer"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="#fff" class="icon"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                                </span>
                                <p class="text_buy">Agregar al Carrito</p>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <h4>Recomendaciones Especiales</h4>
                        <p>Libros que también te pueden interesar:</p>
                        <hr>

                        <div class="scroll-container" style="height: 350px; overflow-y: auto;">
                            <?php foreach ($recommendedBooks as $book) { ?>
                                <div class="zoom">
                                    <a style="text-decoration: none;" href="./infoLibro.php?LibroID=<?= htmlspecialchars($book->LibroID) ?>">
                                        <div class="d-flex align-items-center">
                                            <div class="p-2">
                                                <img src="../booksImages/<?= htmlspecialchars($book->ImagenURL) ?>" alt="portada del libro" class="img-thumbnail" style="width: 70px; height: auto;">
                                            </div>
                                            <div class="p-2">
                                                <p class="mb-1 text-secondary"><?= strlen($book->Titulo) > 20 ? htmlspecialchars(substr($book->Titulo, 0, 20)) . '...' : htmlspecialchars($book->Titulo) ?></p>
                                                <p class="mb-1 text-secondary">₡<?= number_format($book->Precio, 2, ',', '.') ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="lc-block mb-4">
                    <div>
                        <p class="fw-bold display-2 about-title">Sobre el Libro</p>
                    </div>
                </div>
                <div class="lc-block mb-5">
                    <div>
                        <p class="fs-5"><?= htmlspecialchars($showBook->Sipnosis) ?></p>
                    </div>
                </div>
            </div>
        </section>
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
                  src="../img/logobook_withe_logo.png"
                  style="max-height: 20vh"
                />
              </div>
              <div class="lc-block small">
                <div editable="rich">
                  <p>
                    I am text block. Click edit button to change this text.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                    elit tellus, luctus nec ullamcorper matti pibus leo.
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
                    Resources
                    <br />
                  </p>
                  <p>Docs</p>
                  <p>Example</p>
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
                  <p>Story</p>
                  <p>Work with us</p>
                  <p>Blog</p>
                  <p>News</p>
                </div>
              </div>
              <!-- /lc-block -->
            </div>
            <div class="col-lg-2 offset-lg-1">
              <div class="lc-block mb-4">
                <div editable="rich">
                  <h4>Downloads</h4>
                </div>
              </div>
              <!-- /lc-block -->
              <div class="lc-block small">
                <div editable="rich">
                  <p>Vertex 1.2</p>
                  <p>Templates</p>
                  <p>Sounds</p>
                  <p>Gradients</p>
                </div>
              </div>
              <!-- /lc-block -->
            </div>
          </div>
        </div>
        <div class="py-5 container">
          <div class="row">
            <div class="col-6 small">
              <div class="lc-block">
                <div editable="rich">
                  <p>Copyright © My Company 2020</p>
                </div>
              </div>
              <!-- /lc-block -->
            </div>
            <div class="col-6 text-end small">
              <div class="lc-block">
                <div editable="rich">
                  <p>
                    <a class="text-decoration-none" href="#">License Details</a>
                    -
                    <a class="text-decoration-none" href="#"
                      >Terms &amp; Conditions</a
                    >
                  </p>
                </div>
              </div>
              <!-- /lc-block -->
            </div>
          </div>
        </div>
      </section>
    </footer>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
