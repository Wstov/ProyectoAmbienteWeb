
<?php
session_start();
include("../../php/extraerUser.php");
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Invitado';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../css/cart.css">
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
          <ul id="menu-menu-1" class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">Historial de Compras</a>
            </li>
          </ul>
          <div class="d-flex align-items-center ms-auto">
            <button data-quantity="0" class="btn-cart me-3">
              <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
                <title>icon-cart</title>
                <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
              </svg>
              <span class="quantity"></span>
            </button>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo htmlspecialchars($username); ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                  <li><a class="dropdown-item" href="#">Perfil</a></li>
                  <li><a class="dropdown-item" href="../../php/logout.php">Cerrar sesión</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>



  
    <main>
      <section class="pt-6">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="lc-block text-center">
                <div editable="rich">
                  <h1 class="fw-bold">
                    Mundos Entre Páginas
                  </h1>
                </div>
              </div>
              <!-- /lc-block -->
            </div>
            <!-- /col -->
          </div>
        </div>
      </section>
      <section class="pb-6 pt-4">
        <div class="container-fluid" style="max-width: 1920px">
          <div class="row justify-content-center">
            <div class="col-xxl-10">
              <div class="lc-block">
                <div
                  id="carouselPortofolioIndicators"
                  class="carousel slide"
                  data-bs-ride="carousel"
                >
                  <div class="carousel-indicators">
                    <button
                      type="button"
                      data-bs-target="#carouselPortofolioIndicators"
                      data-bs-slide-to="0"
                      class="active"
                      aria-label="Slide 1"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselPortofolioIndicators"
                      data-bs-slide-to="1"
                      aria-label="Slide 2"
                      class=""
                      aria-current="true"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselPortofolioIndicators"
                      data-bs-slide-to="2"
                      aria-label="Slide 3"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselPortofolioIndicators"
                      data-bs-slide-to="3"
                      aria-label="Slide 4"
                    ></button>
                    <button
                      type="button"
                      data-bs-target="#carouselPortofolioIndicators"
                      data-bs-slide-to="4"
                      aria-label="Slide 5"
                    ></button>
                  </div>

                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img
                        src="../../img/93RRbiTAaI.jpg"
                        class="img-fluid"
                        alt="..."
                        width="1920"
                        height="960"
                        loading="lazy"
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="../../img/BfGuQJpDolQ.jpg"
                        class=""
                        alt="..."
                        width="1920"
                        height="960"
                        loading="lazy"
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="img/bWdVjVjFZU0.jpg"
                        class=""
                        alt="..."
                        width="1920"
                        height="960"
                        loading="lazy"
                      />
                    </div>
                    <!-- <div class="carousel-item">
                      <img
                        src="https://via.placeholder.com/1920x960.png/dce2ef/f4f6fa"
                        class=""
                        alt="..."
                        width="1920"
                        height="960"
                        loading="lazy"
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        src="https://via.placeholder.com/1920x960.png/f4f6fa/dce2ef"
                        class=""
                        alt="..."
                        width="1920"
                        height="960"
                        loading="lazy"
                      />
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="">
        <div class="container-fluid" style="max-width: 1920px">
          <div class="row justify-content-md-center">
            <div
              class="col-xxl-10 d-flex gap-3 justify-content-center justify-content-md-end py-4"
            >
              <div class="lc-block">
                <a href="https://www.facebook.com/">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="2em"
                    height="2em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    lc-helper="svg-icon"
                  >
                    <path
                      d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                    ></path>
                  </svg>
                </a>
              </div>
              <div class="lc-block">
                <a href="https://github.com/">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="2em"
                    height="2em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    lc-helper="svg-icon"
                    class=""
                  >
                    <path
                      d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"
                    ></path>
                  </svg>
                </a>
              </div>
              <div class="lc-block">
                <a href="https://twitter.com/">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="2em"
                    height="2em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    lc-helper="svg-icon"
                  >
                    <path
                      d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"
                    ></path>
                  </svg>
                </a>
              </div>
              <div class="lc-block">
                <a href="https://instagram.com/">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="2em"
                    height="2em"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    lc-helper="svg-icon"
                  >
                    <path
                      d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                    ></path>
                  </svg>
                </a>
              </div>
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
                  src="../../img/logobook_withe_logo.png"
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
                  <p>Copyright © Story Bound Books 2024</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- <script src="../../bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../js/router.js"></script>
    <script src="../../js/routes.js"></script>
    <script src="../../js/index.js"></script>

  </body>
</html>