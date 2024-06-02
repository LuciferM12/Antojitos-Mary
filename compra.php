
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
	<link rel="stylesheet" href="assets/css/estilosCompra.css">
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
    <div class="contenedor-informacion">
        <div class="contenedor-info">
            <div class="altaCompra">
                <h1>Control de Venta de Restaurante</h1>
                <!-- Select para seleccionar producto -->
                <form class="formulario" action="assets/script/altaCompra.php" method="post">
                    <label for="exampleFormControlSelect1">Seleccione un usuario:</label>
                    <select class="form-control" name="user" required>
                        <option value="">Seleccione un usuario</option>									
                        <?php
                            $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");
    
                            if ($conn->connect_error) {
                                die("Conexión fallida: " . $conn->connect_error);
                            }
    
                            $sql = "SELECT correo, idUsuario FROM Usuario WHERE rol = 'cliente'";
                            $result = $conn->query($sql);
                            $options = "";
    
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $options .= '<option value="' . $row["idUsuario"] .'">' . $row["correo"] . '</option>';
                                }
                            } else {
                                $options .= '<option value="">No hay usuarios</option>';
                            }
    
                            $conn->close();
                            echo $options;
                        ?>
                    </select>
                    <label for="exampleFormControlSelect1">Seleccione un producto:</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="product">
                    <option value="">Seleccione un platillo</option>									
                        <?php
                            $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");
    
                            if ($conn->connect_error) {
                                die("Conexión fallida: " . $conn->connect_error);
                            }
    
                            $sql = "SELECT * FROM Producto";
                            $result = $conn->query($sql);
                            $options = "";
    
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $options .= '<option value="' . $row["idProducto"] . '" data-precio="'. $row["costo"].'">' . $row["nombre"] . '</option>';
                                }
                            } else {
                                $options .= '<option value="">No hay usuarios</option>';
                            }
    
                            $conn->close();
                            echo $options;
                        ?>
                    </select>
                    <button onclick="agregarProducto()" class="boton" type="button">Agregar</button>
                </div>
                
                    <div class="historial">
                        <div class="compra">
                            <div class="tabla-compras">
                                <section class="header-tabla">
                                    <h1>Venta</h1>
                                </section>
                                <section class="body-table">
                                    <table id="tablaProductos">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Vendedor</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Fecha</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                        <input type="hidden" name="idUsuario" value="<?php echo htmlspecialchars($idUsuario); ?>">
                        <input type="hidden" name="total" id="TotalCompra">
                        <h2 style="margin-top: 20px;">Total de la compra: $<span id="totalCompra">0.00</span></h2>
                        <input type="hidden" name="fecha" id="fechaInput">
                        <button class="boton" type = "submit">Enviar</button>
                    </div>
            </form>
            <script>
             const nombreVendedor = <?php echo json_encode($_SESSION["nombre"]); ?>;
                function obtenerFechaActualSQL() {
                    // Crear un objeto Date para la fecha actual
                    const fecha = new Date();

                    // Obtener el año, mes y día
                    const year = fecha.getFullYear();
                    let month = fecha.getMonth() + 1; // Los meses en JavaScript van de 0 a 11
                    let day = fecha.getDate();

                    // Asegurarse de que el mes y el día tengan dos dígitos
                    if (month < 10) {
                        month = '0' + month;
                    }
                    if (day < 10) {
                        day = '0' + day;
                    }

                    // Formatear la fecha en el formato SQL (YYYY-MM-DD)
                    const fechaSQL = `${year}-${month}-${day}`;

                    return fechaSQL;
                }

                function agregarProducto() {
                    // Obtener el producto seleccionado y su precio
                    const select = document.getElementById('exampleFormControlSelect1');
                    const selectedOption = select.options[select.selectedIndex];
                    const producto = selectedOption.text;
                    const precio = parseFloat(selectedOption.getAttribute('data-precio'));
        
                    // Crear una nueva fila en la tabla
                    const tabla = document.getElementById('tablaProductos').getElementsByTagName('tbody')[0];
                    const nuevaFila = tabla.insertRow();
        
                    // Insertar celdas en la fila
                    const celdaProducto = nuevaFila.insertCell(0);
                    const celdaVendedor = nuevaFila.insertCell(1);
                    const celdaPrecio = nuevaFila.insertCell(2);
                    const celdaCantidad = nuevaFila.insertCell(3);
                    const celdaFecha = nuevaFila.insertCell(4);
                    const celdaTotal = nuevaFila.insertCell(5);
        
                    // Rellenar las celdas con información
                    celdaProducto.textContent = producto;
                    celdaPrecio.textContent = precio.toFixed(2);
                    
                        celdaVendedor.textContent =nombreVendedor;
                    celdaFecha.textContent = obtenerFechaActualSQL();
        
                    // Crear un input para la cantidad
                    const inputCantidad = document.createElement('input');
                    inputCantidad.type = 'number';
                    inputCantidad.value = 1;
                    inputCantidad.min = 1;
                    inputCantidad.oninput = function() {
                        actualizarTotal(this);
                    };
                    celdaCantidad.appendChild(inputCantidad);
        
                    // Calcular el total para esta fila
                    const totalFila = precio * inputCantidad.value;
                    celdaTotal.textContent = totalFila.toFixed(2);
        
                    // Actualizar el total de la compra
                    actualizarTotalCompra();
                }
        
                function actualizarTotal(input) {
                    const fila = input.parentElement.parentElement;
                    const precio = parseFloat(fila.cells[2].textContent);
                    const cantidad = parseInt(input.value);
                    const total = precio * cantidad;
        
                    fila.cells[5].textContent = total.toFixed(2);
        
                    // Actualizar el total de la compra
                    actualizarTotalCompra();
                }
        
                function actualizarTotalCompra() {
                    const tabla = document.getElementById('tablaProductos').getElementsByTagName('tbody')[0];
                    let totalCompra = 0;
        
                    for (let i = 0; i < tabla.rows.length; i++) {
                        totalCompra += parseFloat(tabla.rows[i].cells[5].textContent);
                    }
        
                    document.getElementById('totalCompra').textContent = totalCompra.toFixed(2);
                    document.getElementById('TotalCompra').value = totalCompra.toFixed(2);
                }
                const fechaInput = document.querySelector('#fechaInput');
                fechaInput.value = obtenerFechaActualSQL();
            </script>
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


