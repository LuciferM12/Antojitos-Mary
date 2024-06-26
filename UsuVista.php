<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Antojitos Mary.">
    <meta name="author" content="Sebastián Rodríguez y Martín Omar Rojas">
    <title>Antojitos Mary</title>
   
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="assets/vendors/animate/animate.css">

    <!-- Bootstrap + FoodHut main styles -->
	<link rel="stylesheet" href="assets/css/foodhut.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
     <!-- Navbar -->
     <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Menú</a>
                </li>
                <?php if (isset($_SESSION['rol'])) : ?>
                    <li class="nav-item"><a class="nav-link" href="reservar.php">Reservaciones</a></li>
                <?php endif; ?>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/AM_Logo.png" class="brand-img" alt="">
                <span class="brand-txt">Antojitos Mary</span>
            </a>
            <ul class="navbar-nav">
                <?php if (!isset($_SESSION['rol']) || $_SESSION['rol'] == "") : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">Reseñas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contáctanos</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-primary ml-xl-4">Inicia Sesión</a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['rol'] === "cliente") : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="assets/script/logout.php" class="btn btn-primary ml-xl-4">Cerrar Sesión</a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['rol'] === "admin") : ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="assets/script/logout.php" class="btn btn-primary ml-xl-4">Cerrar Sesión</a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['rol'] === "vendedor") : ?>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testmonial">Venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="assets/script/logout.php" class="btn btn-primary ml-xl-4">Cerrar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">Antojitos Mary</h1>
            <h2 class="display-4 mb-5">Hogar &amp; Amor</h2>
            <a class="btn btn-lg btn-primary" href="#gallary">Menú Diario</a>
        </div>
    </header>

    <!--  About Section  -->
    <div id="about" class="container-fluid wow fadeIn" id="about"data-wow-duration="1.5s">
        <div class="row">
            <div class="col-lg-6 has-img-bg"></div>
            <div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-sm-8 py-5 my-5">
                        <h2 class="mb-4">Nuestra Historia</h2>
                        <p>Antojitos Mary es un negocio ubicado en San Luis Potosí. Nos especializamos en antojitos mexicanos, desde enchiladas potosinas hasta chilaquiles. Contamos con desayunos, cortes de carne, bebidas y mucho más.

                        </p>
                        <p><b>El restaurante Antojitos Mary fue abierto en el año del 2013</b> como sucesor de un negocio anterior el cual también tenia un giro en alimentos pero este se centraba en la venta de tacos y carnitas. <b>A diferencia del actual negocio el cual busca brindar un ambiente tranquilo y familiar mediante un servicio dentro de una variedad de aproximadamente 100 platillos los cuales presentan cada uno un toque especial.</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BLOG Section  -->
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <h2 class="section-title py-5">Menú Diario</h2>
        <div class="row justify-content-center">
            <div class="col-sm-7 col-md-4 mb-5">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#foods" role="tab" aria-controls="pills-home" aria-selected="true">Platillos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#juices" role="tab" aria-controls="pills-profile" aria-selected="false">Bebidas</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border my-3 my-md-0">
                            <img src="assets/imgs/Alambre.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge">$72</a></h1>
                                <h4 class="pt20 pb20">Alambre</h4>
                                <p class="text-black">Platillo de bisteck o pastor acompañado de pimiento,
                                    cebolla y queso fundido con tortillas de harina.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border my-3 my-md-0">
                            <img src="assets/imgs/Club.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge">$69</a></h1>
                                <h4 class="pt20 pb20">Club Sandwich</h4>
                                <p class="text-black">Sandwich de lomo, jamón y queso asadero acompañado de papas a la francesa y arroz.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border my-3 my-md-0">
                            <img src="assets/imgs/Hamburguesa.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge ">$35</a></h1>
                                <h4 class="pt20 pb20">Hamburguesa</h4>
                                <p class="text-black">Carne para Hamburguesa de la casa preparada con: Jamón, queso amarillo, lechuga, jitomate y aderezos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border my-3 my-md-0">
                            <img src="assets/imgs/HotDog.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge ">$15</a></h1>
                                <h4 class="pt20 pb20">Hot Dog</h4>
                                <p class="text-black">3 Hot Cakes bañados con jarabe de maple y fruta. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border my-3 my-md-0">
                            <img src="assets/imgs/Totita.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge ">$65</a></h1>
                                <h4 class="pt20 pb20">Torta</h4>
                                <p class="text-black">Torta de Lomo o Jamon acompañada de una porción de papas a la francesa. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border my-3 my-md-0">
                            <img src="assets/imgs/Carlota.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge ">$25</a></h1>
                                <h4 class="pt20 pb20">Carlota</h4>
                                <p class="text-black">Carlota con batido a base de limon. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="juices" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                    <div class="col-md-4 my-3 my-md-0">
                        <div class="card border">
                            <img src="assets/imgs/coca.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge ">$30</a></h1>
                                <h4 class="pt20 pb20">Coca Cola</h4>
                                <p class="text-black">Coca-Cola es una bebida azucarada gaseosa vendida a nivel mundial en tiendas, restaurantes y máquinas expendedoras en más de doscientos países o territorios. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3 my-md-0">
                        <div class="card border">
                            <img src="assets/imgs/monster.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge ">$50</a></h1>
                                <h4 class="pt20 pb20">Monster Energy</h4>
                                <p class="text-black">La Monster Energy es una bebida energética que fue lanzada y comercializada por Hansen's Natural hecha de setas en el año 2007. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3 my-md-0">
                        <div class="card border">
                            <img src="assets/imgs/blog-6.jpg" alt="template by DevCRID http://www.devcrud.com/" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge ">$41</a></h1>
                                <h4 class="pt20 pb20">Jugo de naranja</h4>
                                <p class="text-black">Delicioso y saludable jugo de naranja. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  gallary Section  -->
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <h2 class="section-title">Nuestro menú</h2>
    </div>
    <div class="gallary row">
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="assets/imgs/gallary-1.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="assets/imgs/gallary-2.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="assets/imgs/gallary-3.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
            <img src="assets/imgs/gallary-4.jpg" alt="template by DevCRID http://www.devcrud.com/" class="gallary-img">
            <a href="#" class="gallary-overlay">
                <i class="gallary-icon ti-plus"></i>
            </a>
        </div>
        
    </div>

    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-5">Reservas</h2>
            <div class="row mb-5">
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="email" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="EMAIL">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="NÚMERO DE INVITADOS" max="20" min="0">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="time" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="14:30 pm">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="12/12/12">
                </div>
            </div>
            <a href="#" class="btn btn-lg btn-primary" id="rounded-btn">Reserva</a>
        </div>
    </div>

    

    <!-- REVIEWS Section  -->
    <div id="testmonial" class="container-fluid wow fadeIn bg-dark text-light has-height-lg middle-items">
        <h2 class="section-title my-5 text-center">Críticas</h2>
        <div class="row mt-3 mb-5">
            <div class="col-md-4 my-3 my-md-0">
                <div class="testmonial-card">
                    <h3 class="testmonial-title">Ángel Torres</h3>
                    <h6 class="testmonial-subtitle">Cliente</h6>
                    <div class="testmonial-body">
                        <p>La comida está muy buena, además de que siempre están atentos de los que te haga falta.</p>
                    </div>    
                </div>
            </div>
            <div class="col-md-4 my-3 my-md-0">
                <div class="testmonial-card">
                    <h3 class="testmonial-title">Gabriela Gutiérrez</h3>
                    <h6 class="testmonial-subtitle">Cliente</h6>
                    <div class="testmonial-body">
                        <p>Recomendable! Super amables, comida caserita a buen precio. Aguas de sabor y café rico. Muy bien!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-3 my-md-0">
                <div class="testmonial-card">
                    <h3 class="testmonial-title">Adolfo Guerrero</h3>
                    <h6 class="testmonial-subtitle">Cliente</h6>
                    <div class="testmonial-body">
                        <p>Excelente servicio la comida está muy buena y muy buena lo recomiendo muchísimo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACT Section  -->
    <div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
        <div class="row">
            <div class="col-md-6 px-0">
                <div id="map" style="width: 100%; height: 100%; min-height: 400px"></div>
            </div>
            <div class="col-md-6 px-5 has-height-lg middle-items">
                <h3>ENCUENTRÁNOS</h3>
                <p>En "Antojitos Mary" podras encontrar una gran variedad de antojitos mexicanos, desayunos, cortes de carne y bebidas. ¿Qué esperas para conocernos?</p>
                <div class="text-muted">
                    <p><span class="ti-location-pin pr-3"></span> Francisco Gonzalez Bocanegra 514 Col. 21 De Marzo, San Luis Potosi S.L.P. 78437</p>
                    <p><span class="ti-support pr-3"></span> (52) 7203128909</p>
                    <p><span class="ti-email pr-3"></span>antojitosmaryoficial@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- page footer  -->
    <div class="container-fluid bg-dark text-light has-height-md middle-items border-top text-center wow fadeIn">
        <div class="row">
            <div class="col-sm-4">
                <h3>Correo</h3>
                <P class="text-muted">antojitosmaryoficial@gmail.com</P>
            </div>
            <div class="col-sm-4">
                <h3>Llamános</h3>
                <P class="text-muted">(52) 720-3128-909</P>
            </div>
            <div class="col-sm-4">
                <h3>Nuestro hogar</h3>
                <P class="text-muted">Francisco Gonzalez Bocanegra 514 Col. 21 De Marzo, San Luis Potosi S.L.P. 78437</P>
            </div>
        </div>
    </div>
    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Hecho por Martín Omar Rojas Rodríguez y Sebastián Rodríguez Torres </i></p>
    </div>
    <!-- end of page footer -->

    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <script src="assets/vendors/wow/wow.js"></script>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <script src="assets/js/foodhut.js"></script>

</body>
</html>
