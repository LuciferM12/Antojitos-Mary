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
        <script src="https://kit.fontawesome.com/4ffe7a9329.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">   
        <title>Menú | Antojitos Mary</title>
    
        <!-- font icons -->
        <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

        <link rel="stylesheet" href="assets/vendors/animate/animate.css">

        <!-- Bootstrap + FoodHut main styles -->
        <script src="assets/js/calendario.js" defer></script>
        <link rel="stylesheet" href="assets/css/estilosR.css">
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
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Nosotros</a>
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
                        <a class="nav-link" href="index.php">Blog<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Reseñas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Contáctanos</a>
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
        <!-- BLOG Section  -->
        <div id="blog" style="margin-top:100px ;" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
            <h2 class="section-title py-5">Nuestro Menú</h2>
            <div class="row justify-content-center">
                <div class="col-sm-7 col-md-4 mb-5">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#carnes" role="tab" aria-controls="pills-home" aria-selected="true">Carnes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#bebidas" role="tab" aria-controls="pills-profile" aria-selected="false">Bebidas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#ensaladas" role="tab" aria-controls="pills-profile" aria-selected="false">Ensaladas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#postres" role="tab" aria-controls="pills-profile" aria-selected="false">Postres</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="carnes" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <?php
                        // Conectar a la base de datos

                        $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Consulta SQL para obtener los datos de los productos
                        $sql = "SELECT foto,categoria, nombre, costo, descripcion FROM Producto WHERE categoria = 'Carnes' ";
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
                <div class="tab-pane fade" id="bebidas" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                    <?php
                        // Conectar a la base de datos

                        $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Consulta SQL para obtener los datos de los productos
                        $sql = "SELECT foto,categoria, nombre, costo, descripcion FROM Producto WHERE categoria = 'Bebidas' ";
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
                <div class="tab-pane fade" id="ensaladas" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                    <?php
                        // Conectar a la base de datos

                        $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Consulta SQL para obtener los datos de los productos
                        $sql = "SELECT foto,categoria, nombre, costo, descripcion FROM Producto WHERE categoria = 'Ensaladas' ";
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
                <div class="tab-pane fade" id="postres" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                    <?php
                        // Conectar a la base de datos

                        $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Consulta SQL para obtener los datos de los productos
                        $sql = "SELECT foto,categoria, nombre, costo, descripcion FROM Producto WHERE categoria = 'Postres' ";
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
        
        <!-- page footer -->
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
        
        

        <script src="assets/js/foodhut.js"></script>
        
    </body>
</html>
