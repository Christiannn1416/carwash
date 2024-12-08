<?php if (isset($mensaje)):
    $app->alert($tipo, $mensaje);
    require('views/alert_cliente.php');
endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AutoWash - Car Wash Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="views/visitante/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="views/visitante/lib/animate/animate.min.css" rel="stylesheet">
    <link href="views/visitante/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="views/visitante/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="logo">
                        <a href="index.html">
                            <h1>Car<span>Wash</span></h1>
                            <!-- <img src="views/visitante/img/logo.jpg" alt="Logo"> -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 d-none d-lg-block">
                    <div class="row">
                        <div class="col-4">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Horario</h3>
                                    <p>Lunes - Viernes<br> 8:00 A.M. - 5:00 P.M.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>LLámanos</h3>
                                    <p>+012 345 6789</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Email</h3>
                                    <p>carwash@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="visitor.php" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">Sobre Nosotros</a>
                        <a href="#servicios" class="nav-item nav-link">Servicios</a>
                        <a href="#productos" class="nav-item nav-link">Productos</a>
                        <a href="#recompensas" class="nav-item nav-link">Recompensas</a>
                        <a href="#registro" class="nav-item nav-link">Registro</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="views/visitante/img/carousel-1.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h3>Lavado & Detalle</h3>
                        <h1>Mantén tu carro nuevo</h1>
                        <a class="btn btn-custom" href="">Explorar Más</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="views/visitante/img/carousel-2.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h3>Lavado & Detalle</h3>
                        <h1>Calidad de Servicio</h1>
                        <a class="btn btn-custom" href="">Explorar Más</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="views/visitante/img/carousel-3.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h3>Lavado & Detalle</h3>
                        <h1>Lavado Exterior & Interior</h1>
                        <a class="btn btn-custom" href="">Explorar Más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div id="about" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="views/visitante/img/about.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header text-left">
                        <p>Sobre Nosotros</p>
                        <h2>Lavado y Detallado</h2>
                    </div>
                    <div class="about-content">
                        <p>
                            En Car Wash, no solo lavamos autos, ¡los transformamos! Sabemos que tu vehículo
                            es más que un medio de transporte; es una parte importante de tu vida. Por eso, nos
                            dedicamos a ofrecerte un servicio de calidad superior con rapidez y atención personalizada.
                        </p>
                        <ul>
                            <li><i class="far fa-check-circle"></i>Lavado Exterior</li>
                            <li><i class="far fa-check-circle"></i>Lavado Interior</li>
                            <li><i class="far fa-check-circle"></i>Pulido Y Encerado</li>
                            <li><i class="far fa-check-circle"></i>Limpieza de Motor</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Price Start -->
    <div id="servicios" class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Servicios</p>
                <h2>Escoge el mejor para tu auto</h2>
            </div>
            <div class="row">
                <?php foreach ($servicios as $servicio): ?>
                    <div class="col-md-4 p-3">
                        <div class="price-item">
                            <div class="price-header">
                                <h3><?php echo $servicio['servicio'] ?></h3>
                                <h2>$<?php echo $servicio['precio'] ?></h2>
                            </div>
                            <div class="price-body">
                                <p><?php echo $servicio['descripcion'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- Price End -->

    <!-- Price Start -->
    <div id="productos" class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Productos</p>
                <h2>Agrega un producto para siempre tener tu carro presentable</h2>
            </div>
            <div class="row">
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-4 p-3">
                        <div class="price-item">
                            <div class="price-header">
                                <h3><?php echo $producto['producto'] ?></h3>
                                <img src="<?php
                                if (file_exists("../uploads/" . $producto['imagen'])) {
                                    echo ("../uploads/" . $producto['imagen']);
                                } else {
                                    echo ("../uploads/default.png");
                                }
                                ?> " class="card-img-top p-3 m-auto" alt="<?php echo $producto['imagen']; ?>">
                                <h2>$<?php echo $producto['precio'] ?></h2>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- Price End -->


    <!-- Recompensa Start -->
    <div id="recompensas" class="location">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-header text-left">
                        <p>Recompensas</p>
                        <h2>Gana lavados y productos gratis por tu lealtad</h2>
                    </div>
                    <div class="row">
                        <?php foreach ($recompensas as $recompensa): ?>
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-gift"></i>
                                    <div class="location-text">
                                        <h3><?php echo $recompensa['recompensa']; ?></h3>
                                        <p>Acumulando <?php echo $recompensa['acumulado']; ?> Lavados</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div id="registro" class="col-lg-5">
                    <div class="location-form">
                        <h3>Registrate y empieza a ganar</h3>
                        <form action="visitor.php?accion=nuevo_registro" method="post">
                            <div class="control-group">
                                <input type="text" class="form-control" placeholder="Nombre" required="required"
                                    name="data[cliente]" />
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" placeholder="Email" required="required"
                                    name="data[correo]" />
                            </div>
                            <div class=" control-group">
                                <input type="numbre" class="form-control" placeholder="Teléfono" required="required"
                                    name="data[telefono]" />
                            </div>
                            <div>
                                <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recompensa End -->


    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            <div class="section-header text-center">
                <p>Nuestro Trabajo</p>
                <h2>Galería</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="views/visitante/img/blog-1.jpg" alt="Image">
                            <div class="meta-date">
                                <span>01</span>
                                <strong>Jan</strong>
                                <span>2045</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="#">Lorem ipsum dolor sit amet</a></h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Pellent iaculis blandit lorem, quis convall diam
                                eleife. Nam in arcu sit amet massa ferment quis enim. Nunc augue velit metus congue eget
                                semper
                            </p>
                        </div>
                        <div class="blog-meta">
                            <p><i class="fa fa-user"></i><a href="">Admin</a></p>
                            <p><i class="fa fa-folder"></i><a href="">Web Design</a></p>
                            <p><i class="fa fa-comments"></i><a href="">15 Comments</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="views/visitante/img/blog-2.jpg" alt="Image">
                            <div class="meta-date">
                                <span>01</span>
                                <strong>Jan</strong>
                                <span>2045</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="#">Lorem ipsum dolor sit amet</a></h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Pellent iaculis blandit lorem, quis convall diam
                                eleife. Nam in arcu sit amet massa ferment quis enim. Nunc augue velit metus congue eget
                                semper
                            </p>
                        </div>
                        <div class="blog-meta">
                            <p><i class="fa fa-user"></i><a href="">Admin</a></p>
                            <p><i class="fa fa-folder"></i><a href="">Web Design</a></p>
                            <p><i class="fa fa-comments"></i><a href="">15 Comments</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="views/visitante/img/blog-3.jpg" alt="Image">
                            <div class="meta-date">
                                <span>01</span>
                                <strong>Jan</strong>
                                <span>2045</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="#">Lorem ipsum dolor sit amet</a></h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Pellent iaculis blandit lorem, quis convall diam
                                eleife. Nam in arcu sit amet massa ferment quis enim. Nunc augue velit metus congue eget
                                semper
                            </p>
                        </div>
                        <div class="blog-meta">
                            <p><i class="fa fa-user"></i><a href="">Admin</a></p>
                            <p><i class="fa fa-folder"></i><a href="">Web Design</a></p>
                            <p><i class="fa fa-comments"></i><a href="">15 Comments</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-contact">
                        <h2>Get In Touch</h2>
                        <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope"></i>info@example.com</p>
                        <div class="footer-social">
                            <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h2>Popular Links</h2>
                        <a href="">About Us</a>
                        <a href="">Contact Us</a>
                        <a href="">Our Service</a>
                        <a href="">Service Points</a>
                        <a href="">Pricing Plan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h2>Useful Links</h2>
                        <a href="">Terms of use</a>
                        <a href="">Privacy policy</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-newsletter">
                        <h2>Newsletter</h2>
                        <form>
                            <input class="form-control" placeholder="Full Name">
                            <input class="form-control" placeholder="Email">
                            <button class="btn btn-custom">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright">
            <p>&copy; <a href="#">Your Site Name</a>, All Right Reserved. Designed By <a
                    href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to top button -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Pre Loader -->
    <div id="loader" class="show">
        <div class="loader"></div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="views/visitante/lib/easing/easing.min.js"></script>
    <script src="views/visitante/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="views/visitante/lib/waypoints/waypoints.min.js"></script>
    <script src="views/visitante/lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="views/visitante/mail/jqBootstrapValidation.min.js"></script>
    <script src="views/visitante/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="views/visitante/js/main.js"></script>
</body>

</html>