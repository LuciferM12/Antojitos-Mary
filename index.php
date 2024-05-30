<!DOCTYPE html>
<html lang="es">

<?php
    session_start();
    $correo = isset($_SESSION['correo']) ? $_SESSION['correo'] : "";
    $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
    $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : ""; // Aquí se almacena el rol del usuario
?>

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
                    <a class="nav-link" href="menuCompleto.php">Menú</a>
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
                        <a class="nav-link" href="actualizar.php">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reportes.php">Reportes</a>
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
                        <a class="nav-link" href="actualizar.php">Actualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reportes.php">Reportes</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="compra.php">Venta</a>
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
            <a class="btn btn-lg btn-primary" href="#blog">Menú Diario</a>
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
                <?php
                    // Conectar a la base de datos

                    $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta SQL para obtener los datos de los productos
                    $sql = "SELECT Producto.foto,Producto.categoria, Producto.nombre, Producto.costo, Producto.descripcion, MenuDiario.idProducto FROM Producto INNER JOIN MenuDiario ON MenuDiario.idProducto = Producto.idProducto WHERE categoria != 'Bebidas' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Mostrar los datos de cada producto
                        while($row = $result->fetch_assoc()) {
                            // Obtener los datos del producto
                            $foto = $row["foto"];
                            $nombre = $row["nombre"];
                            $costo = $row["costo"];
                            $descripcion = $row["descripcion"];

                            // Mostrar los datos en la plantilla HTML
                    ?>
                            <div class="col-md-4">
                                <div class="card border my-3 my-md-0">
                                    <img src="<?php echo $foto; ?>" alt="<?php echo $nombre; ?>" class="rounded-0 card-img-top mg-responsive">
                                    <div class="card-body">
                                        <h1 class="text-center mb-4"><a href="#" class="badge">$<?php echo $costo; ?></a></h1>
                                        <h4 class="pt20 pb20"><?php echo $nombre; ?></h4>
                                        <p class="text-black"><?php echo $descripcion; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No se encontraron productos.";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="tab-pane fade" id="juices" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row">
                <?php
                    // Conectar a la base de datos

                    $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta SQL para obtener los datos de los productos
                    $sql = "SELECT Producto.foto,Producto.categoria, Producto.nombre, Producto.costo, Producto.descripcion, MenuDiario.idProducto FROM Producto INNER JOIN MenuDiario ON MenuDiario.idProducto = Producto.idProducto WHERE categoria = 'Bebidas' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Mostrar los datos de cada producto
                        while($row = $result->fetch_assoc()) {
                            // Obtener los datos del producto
                            $foto = $row["foto"];
                            $nombre = $row["nombre"];
                            $costo = $row["costo"];
                            $descripcion = $row["descripcion"];

                            // Mostrar los datos en la plantilla HTML
                    ?>
                            <div class="col-md-4">
                                <div class="card border my-3 my-md-0">
                                    <img src="<?php echo $foto; ?>" alt="<?php echo $nombre; ?>" class="rounded-0 card-img-top mg-responsive">
                                    <div class="card-body">
                                        <h1 class="text-center mb-4"><a href="#" class="badge">$<?php echo $costo; ?></a></h1>
                                        <h4 class="pt20 pb20"><?php echo $nombre; ?></h4>
                                        <p class="text-black"><?php echo $descripcion; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No se encontraron productos.";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
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
