<?php
session_start();
include "./php/config.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="css/styles.css" /> -->
    <title>Storybound Books</title>
  </head>
  <body>
    <!-- lazily load the Swiper CSS file -->
    <link rel="preload" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <!-- lazily load the Swiper JS file -->
    <script defer="defer" src="https://unpkg.com/swiper@8/swiper-bundle.min.js" onload="initializeSwiperRANDOMID();"></script>

    <!-- lc-needs-hard-refresh -->

    <script>
        function initializeSwiperRANDOMID(){
                const swiper = new Swiper(".mySwiper-RANDOMID", {
                    slidesPerView: 1,
                    grabCursor: true,
                    spaceBetween: 30,
                    
                    pagination: {
                        el: ".swiper-pagination",
                        dynamicBullets: true,
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                    },
                });
            }
    </script>

    <style>
        .mySwiper-RANDOMID .card {max-width:21rem}
    </style>


  <header>
      <nav class="navbar navbar-expand-lg py-3 navbar-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img
              src="img/storybound_books_logo_black.png"
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
                    href="#"
                    class="nav-link"
                    >BS5 Page Templates</a
                  >
                </li>
                <li
                  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738"
                >
                  <a
                    href="#"
                    class="nav-link"
                    >BS5 Snippets</a
                  >
                </li>
              </ul>
              <!-- /lc_nav_menu -->
            </div>
            <div class="lc-block ms-auto d-grid gap-2 d-lg-block">
              <a class="btn link-secondary" href="view/login.php" role="button" 
                >Ingresar</a
              >
              <a class="btn btn-primary" href="view/registroUsuario.php"  role="button">Registrarse</a> <!-- < onclick="ROUTER.load('home')" -->
            </div>
          </div>
        </div>
      </nav>
    </header>
  
    <main>
    <section class="py-4 py-xxl-5" lc-helper="background" style="background:linear-gradient(180deg, rgba(19, 16, 34, 0.58) 0%, rgba(19, 16, 34, 0.78) 100%), url(https://images.unsplash.com/photo-1542744173-8e7e53415bb0?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8M3x8Y29tcGFueXxlbnwwfDB8fHwxNjQ2MDU3MDAw&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768)  center / cover no-repeat;
">
	<div class="container pt-4 py-md-6">
		<div class="row justify-content-center">
			<div class="col-md-12 col-xxl-6">
				<div class="lc-block text-light mb-4">
					<div editable="rich">
						<h1 class="display-2 fw-bold text-center">The quick brown fox jumps over the lazy dog</h1>
					</div>
				</div><!-- /lc-block -->
				<div class="lc-block mb-5">
					<div editable="rich">
						<p class="text-center rfs-9 text-white-50"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc et metus id ligula malesuada placerat sit amet quis enim.</p>
					</div>
				</div><!-- /lc-block -->
				<div class="lc-block text-center">
					<a class="btn btn-primary btn-lg" href="#" role="button" lc-helper="button">View Our Projects</a>
				</div><!-- /lc-block -->
			</div><!-- /col -->
		</div>
	</div>
	<div class="container-fluid py-6" style=" ">
		<div class="row g-3 justify-content-around">
			<div class="col-md-4 text-center text-md-start mb-3">
				<div class="lc-block d-inline-block me-2">


					<a href="https://www.linkedin.com/">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="3em" height="3em" viewBox="0 0 24 24" style="" lc-helper="svg-icon" fill="currentColor" class="text-light">
							<path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z"></path>
						</svg>
					</a>


				</div>
				<div class="lc-block d-inline-block me-2">

					<a href="https://facebook.com/">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="text-light" width="3em" height="3em" viewBox="0 0 24 24" style="" lc-helper="svg-icon" fill="currentColor">
							<path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"></path>
						</svg>
					</a>


				</div>

				<div class="lc-block d-inline-block me-2">

					<a href="https://twitter.com/">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="text-light" width="3em" height="3em" viewBox="0 0 24 24" style="" lc-helper="svg-icon" fill="currentColor">
							<path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z"></path>
						</svg>
					</a>


				</div>
				<div class="lc-block d-inline-block me-2">

					<a href="https://www.youtube.com/">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="text-light" width="3em" height="3em" viewBox="0 0 24 24" style="" lc-helper="svg-icon" fill="currentColor">
							<path d="M10,15L15.19,12L10,9V15M21.56,7.17C21.69,7.64 21.78,8.27 21.84,9.07C21.91,9.87 21.94,10.56 21.94,11.16L22,12C22,14.19 21.84,15.8 21.56,16.83C21.31,17.73 20.73,18.31 19.83,18.56C19.36,18.69 18.5,18.78 17.18,18.84C15.88,18.91 14.69,18.94 13.59,18.94L12,19C7.81,19 5.2,18.84 4.17,18.56C3.27,18.31 2.69,17.73 2.44,16.83C2.31,16.36 2.22,15.73 2.16,14.93C2.09,14.13 2.06,13.44 2.06,12.84L2,12C2,9.81 2.16,8.2 2.44,7.17C2.69,6.27 3.27,5.69 4.17,5.44C4.64,5.31 5.5,5.22 6.82,5.16C8.12,5.09 9.31,5.06 10.41,5.06L12,5C16.19,5 18.8,5.16 19.83,5.44C20.73,5.69 21.31,6.27 21.56,7.17Z"></path>
						</svg>
					</a>

				</div>
			</div>
			<div class="col-md-4 text-center mb-3">
				<div class="lc-block"><a class="btn btn-lg btn-link text-decoration-none text-white" href="" role="button">Explore projects <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="ms-2" viewBox="0 0 16 16">
							<path d="m11.798 8.271-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z"></path>
							<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm.694 2.09A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09l-.636 7a1 1 0 0 1-.996.91H2.826a1 1 0 0 1-.995-.91l-.637-7zM6.172 2a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"></path>
						</svg></a></div><!-- /lc-block -->
			</div>
		</div>
	</div>
</section>

<section class="my-5">
    <div class="container py-6">
        <!-- Slider main container -->
        <div class="swiper mySwiper-RANDOMID">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php
                $sql = $conn->query("SELECT * FROM libros WHERE Destacado = 1");

                if ($sql->num_rows > 0) {
                    while ($row = $sql->fetch_object()) {
                ?>
                        <div class="swiper-slide h-100">
                            <div class="card shadow mx-auto">
                                <div class="card-body">
                                    <div class="lc-block">
                                        <img class="img-fluid" src="./booksImages/<?= htmlspecialchars($row->ImagenURL) ?>" sizes="(max-width: 1080px) 100vw, 1080px" width="1080" height="1080" alt="Photo by Dayana Brooke" loading="lazy">
                                    </div>
                                    <div class="card-body">
                                        <div class="lc-block mb-3">
                                            <div editable="rich">
                                                <h2 class="h5"><?= htmlspecialchars($row->Titulo) ?></h2>
                                                <p><?= htmlspecialchars($row->Autor) ?></p>
                                                <p>₡<?= number_format($row->Precio, 2, ',', '.') ?></p>
                                            </div>
                                        </div>
                                        <div class="lc-block">
                                            <a class="btn btn-primary" href="#" role="button">Button</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<p>No hay libros disponibles.</p>';
                }
                ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination position-relative pt-5 bottom-0"></div>
        </div>
    </div>
</section>

<!-- NOVEDADES -->
<!-- CARDS DE NOVEDADES -->
<section>
    <section class="pt-5" style="">
        <div class="container text-center ">
            <div class="p-5 lc-block">
                <div class="lc-block mb-4">
                    <div>
                        <h2 class="display-1 fw-bold">TíTulo</h2>
                    </div>
                </div>
                <div class="lc-block">
                    <div>
                        <p class="lead">Lorem, ipsum dolor sit amet cons iste minus, minima ducimus! Non fugiat beatae dolore architecto, amet voluptatum delectus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto p-2" style="max-width: 1200px;">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $sql = $conn->query("SELECT * FROM libros WHERE Destacado = 0");

            if ($sql->num_rows > 0) {
                while ($row = $sql->fetch_object()) {
            ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-lg">
                            <a>
                                <img src="./booksImages/<?= htmlspecialchars($row->ImagenURL) ?>" class="card-img-top" alt="<?= htmlspecialchars($row->Titulo) ?>">
                            </a>
                            <div class="card-body d-flex flex-column align-items-center">
                                <h5 class="card-title"><?= htmlspecialchars($row->Titulo) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($row->Autor) ?></p>
                                <p class="card-text">₡<?= number_format($row->Precio, 2, ',', '.') ?></p>
                                <a type="submit" class="button_show_more text-uppercase">
                                    Ver Más
                                    <div class="arrow-wrapper">
                                        <div class="arrow"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p>No hay libros disponibles.</p>';
            }
            $conn->close();
            ?>
        </div>
    </section>
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
                  src="img/logobook_withe_logo.png"
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

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/router.js"></script>
    <script src="js/routes.js"></script>
    <script src="js/index.js"></script>

  </body>
</html>
