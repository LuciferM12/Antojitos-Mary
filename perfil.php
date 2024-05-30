<!DOCTYPE html>
<html lang="es">
<?php
    session_start();
    $correo = isset($_SESSION['correo']) ? $_SESSION['correo'] : "";
    $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
    $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : ""; // Aquí se almacena el rol del usuario
?>

<?php
    // Establecer la conexión con la base de datos (reemplaza 'host', 'usuario', 'contraseña' y 'nombre_de_base_de_datos' con los valores correspondientes)
    $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para obtener el teléfono y la contraseña del usuario
    $sql = "SELECT telefono, password, idUsuario FROM Usuario WHERE nombre = '".$_SESSION['nombre']."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encontraron resultados, mostrarlos en los campos correspondientes
        while($row = $result->fetch_assoc()) {
            $telefono = $row['telefono'];
            $contrasena = $row['contrasena'];
            $idUsuario = $row['idUsuario'];
        }
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión con la base de datos
    $conn->close();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Antojitos Mary.">
    <meta name="author" content="Sebastián Rodríguez y Martín Omar Rojas">
    <script src="https://kit.fontawesome.com/4ffe7a9329.js" crossorigin="anonymous"></script>
    <title>Perfil | Antojitos Mary</title>
   
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="assets/vendors/animate/animate.css">

    <!-- Bootstrap + FoodHut main styles -->
    <link rel="stylesheet" href="assets/css/estilosP.css">
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
                    <li class="nav-item"><a class="nav-link" href="contact.php">Reservaciones</a></li>
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
        <div class="contenedor-imagen">
            <div class="foto">
                <img src="assets/imgs/Carlota.jpg" alt="" class="img-perfil">
            </div>
            
                <div class="datos">
                    <form action="assets/script/modiUs.php" method="post" class="formulario">
                        <?php echo htmlspecialchars($_SESSION['nombre']); ?>
                        <div class="entrada">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <input id="username" type="text" placeholder="Username" value="<?php echo htmlspecialchars($nombre); ?>" disabled name='firstname'>
                        </div>
                        <div class="entrada">
                            <i class="fas fa-envelope"></i>
                            <input id="email" type="email" placeholder="Correo" value="<?php echo htmlspecialchars($correo); ?>" disabled name='email'>
                        </div>
                        <div class="entrada">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password" placeholder="Password" value="<?php echo htmlspecialchars($contrasena); ?>" disabled name='contrasenia'>
                        </div>
                        <div class="entrada">
                            <i class="fas fa-phone"></i>
                            <input id="phone" type="tel" placeholder="Teléfono" disabled value="<?php echo htmlspecialchars($telefono); ?>" name='phone'>
                        </div>
                        <input type="hidden" name="idUsuario" value="<?php echo htmlspecialchars($idUsuario); ?>">
                        <button id="editButton" class="boton" onclick="enableEditMode()" type='button'>Editar</button>
                        <button id="saveButton" class="boton"  style="display:none;" type="submit">Guardar</button>
                        <button id="cancelButton" class="boton" onclick="cancelEdit()" style="display:none;" type="buton">Cancelar</button>
                     </form>
                </div>
           
        </div>
        <div class="contenedor-info">
            <div class="historial">
                <div class="compra">
                    <div class="tabla-compras">
                        <section class="header-tabla">
                            <h1>Historial de Compras</h1>
                        </section>
                        <section class="body-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Vendedor</th>
                                        <th>Formato</th>
                                        <th>Fecha</th>
                                        <th>Estatus</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Genaro Niño</td>
                                        <td>En tienda</td>
                                        <td>24 Nov, 2023</td>
                                        <td>
                                            <p class="estatus entregada">Entregada</p>
                                        </td>
                                        <td><strong>$128.00</strong></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Roxana Herrera</td>
                                        <td>En tienda</td>
                                        <td>24 Nov, 2023</td>
                                        <td>
                                            <p class="estatus cancelada">Cancelada</p>
                                        </td>
                                        <td><strong>$128.00</strong></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Omar Montaño</td>
                                        <td>En tienda</td>
                                        <td>24 Nov, 2023</td>
                                        <td>
                                            <p class="estatus proceso">Curso</p>
                                        </td>
                                        <td><strong>$128.00</strong></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Francisco Ordaz</td>
                                        <td>En tienda</td>
                                        <td>24 Nov, 2023</td>
                                        <td>
                                            <p class="estatus entregada">Entregada</p>
                                        </td>
                                        <td><strong>$128.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
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

    <script>
        function enableEditMode() {
            document.getElementById('username').disabled = false;
            document.getElementById('email').disabled = false;
            document.getElementById('password').disabled = false;
            document.getElementById('phone').disabled = false;

            document.getElementById('editButton').style.display = 'none';
            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('cancelButton').style.display = 'inline-block';
        }

        function cancelEdit() {
            // Aquí puedes agregar la lógica para restaurar los valores originales si es necesario

            // Desactivar los inputs y cambiar la visibilidad de los botones
            document.getElementById('username').disabled = true;
            document.getElementById('email').disabled = true;
            document.getElementById('password').disabled = true;
            document.getElementById('phone').disabled = true;

            document.getElementById('editButton').style.display = 'inline-block';
            document.getElementById('saveButton').style.display = 'none';
            document.getElementById('cancelButton').style.display = 'none';
        }
    </script>
</body>
</html>
