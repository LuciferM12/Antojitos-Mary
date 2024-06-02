<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['txtPlatillo'];
$descripcion = $_POST['txtDescripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

// Verificar si se cargó una foto
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fotoTemp = $_FILES['foto']['tmp_name']; // Ruta temporal de la foto
    $fotoNombre = $_FILES['foto']['name']; // Nombre de la foto

    // Mover la foto a la carpeta assets/imgs/
    //$uploadDir = 'assets/imgs/'; // Especificar la ruta de destino
    //$foto = $uploadDir . $fotoNombre; // Ruta completa con nombre de archivo

    if (move_uploaded_file($fotoTemp, $foto)) {
        // La foto se movió correctamente
         
    } else {
        // Error al mover la foto
        echo "Error al mover la foto.";
        exit();
    }
    //$foto = 'assets/imgs/defaultCarne.jpg';
} else {
    // No se cargó una foto
    $foto = 'assets/imgs/defaultCarne.jpg'; // Asignar una imagen predeterminada
}

// Preparar la consulta SQL para insertar un nuevo producto
$sql = "INSERT INTO Producto (descripcion, foto, costo, categoria, nombre) VALUES ('$descripcion', 'assets/imgs/defaultCarne.jpg', $precio, '$categoria', '$nombre')";

if ($conn->query($sql) === TRUE) {
    // Si la inserción fue exitosa, redirigir a una página de éxito o mostrar un mensaje
    header("Location: ../../platillos.php?errorCode=1");
    exit();
} else {
    // Si hubo un error al insertar, mostrar un mensaje de error
    header("Location: ../../login.php?errorCode=2");
}

// Cerrar la conexión
$conn->close();
?>