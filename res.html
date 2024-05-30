
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
        <title>Reservas | Antojitos Mary</title>
    
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
        <div class="contenedor-informacion">
            <div class="texto-tit">
                Seleccione una fecha para su reservación dando click en el dia deseado:
            </div>
            <div class="parte-calendario">
                <div class="wrapper">
                    <header>
                        <div class="fecha-actual">Mayo 2024</div>
                        <div class="iconos">
                            <span id="prev" class="material-symbols-rounded">chevron_left</span>
                            <span id="next" class="material-symbols-rounded">chevron_right</span>
                        </div>
                    </header>
                    <div class="calendario">
                        <ul class="semanas">
                            <li>Dom</li>
                            <li>Lun</li>
                            <li>Mar</li>
                            <li>Mie</li>
                            <li>Jue</li>
                            <li>Vie</li>
                            <li>Sab</li>
                        </ul>
                        <ul class="dias">
                            
                        </ul>
                    </div>
                </div>
            </div>


            <div class="segundaParte">
                <form method="post" action="assets/script/registrarCita.php">
                    
                    <?php if ($_SESSION['rol'] === "vendedor") : ?>
                    <div class="texto-tit">
                            Seleccione un usuario:
                    </div>
                        <select class="form-control" name="txtUsuario" required>
                            <option value="">Seleccione un Usuario</option>
                            <?php
                                $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

                                if ($conn->connect_error) {
                                    die("Conexión fallida: " . $conn->connect_error);
                                }

                                $sql = "SELECT correo, nombre FROM Usuario WHERE rol = 'cliente'";
                                $result = $conn->query($sql);
                                $options = "";

                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $options .= '<option value="' . $row["nombre"] . '">' . $row["correo"] . '</option>';
                                    }
                                } else {
                                    $options .= '<option value="">No hay usuarios</option>';
                                }

                                $conn->close();
                                echo $options;
                            ?>
				        </select>
                <?php endif; ?>

                    <div class="form-group">
                        <div class="texto-tit" id="disabledtext">
                            Dia seleccionado:
                        </div>
                        <input class="form-control" id="disabledInput" type="date" required name="date">
                    </div>
                    <div class="texto-tit">
                        Seleccione una hora para su reservación:
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="hora" required>
                                <option value="">Seleccione una hora disponible</option>
                                <option value="14:00:00">14:00:00</option>
                                <option value="14:30:00">14:30:00</option>
                                <option value="15:00:00">15:00:00</option>
                                <option value="15:30:00">15:30:00</option>
                                <option value="16:00:00">16:00:00</option>
                                <option value="16:30:00">16:30:00</option>
                                <option value="17:00:00">17:00:00</option>
                                <option value="17:30:00">17:30:00</option>
                                <option value="18:00:00">18:00:00</option>
                                <option value="18:30:00">18:30:00</option>
                                <option value="19:00:00">19:00:00</option>
                                <option value="19:30:00">19:30:00</option>
                        </select>
                    </div>
                    <div class="botones">
                        <button class="boton" type="submit">Reservar</button>
                        <button class="boton" onclick="window.location.href='index.php'">Cancelar</button>
                    </div>
                </form>
                
            </div>
            <div class="segundaParte">
                <div class="botones">
                            <button class="boton" onclick="window.location.href='reservar2.php'">Administrar citas</button>
                </div>
            </div>
            <script>
                <?php
                    if (isset($_GET["errorCode"])) {
                        $errorCode = $_GET["errorCode"];
        
                        switch ($errorCode) {
                                                    
                            case 1:
                                echo "alert('Ya existe una cita programada para la misma hora y fecha. Por favor, elige otra hora o fecha.');";
                                break;
                            case 2:
                                echo "alert('Error al verificar la disponibilidad de la cita.');";
                                break;
                            case 3:
                                echo "alert('La cita ha sido agendada correctamente.');";
                                break;
                            case 5:
                                echo "alert('Usuario no encontrado.');";
                                break;
                            case 4:
                                echo "alert('Error al agendar la cita');";
                                break;
                            
                                header("Location: reservar.php");
                        }
                    }
                ?>
            </script>
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