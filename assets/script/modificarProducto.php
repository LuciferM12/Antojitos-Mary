<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del producto seleccionado
$idProducto = $_POST['modifPlatillo'];

// Obtener los nuevos datos del formulario
$nombre = isset($_POST['txtPlatillo']) ? $_POST['txtPlatillo'] : '';
$descripcion = isset($_POST['txtDescripcion']) ? $_POST['txtDescripcion'] : '';
$precio = isset($_POST['precio']) && !empty($_POST['precio']) ? $_POST['precio'] : 0;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';

// Preparar la consulta SQL para actualizar el producto
$sql = "UPDATE Producto SET ";
$updateFields = array();

if (!empty($descripcion)) {
    $updateFields[] = "descripcion = '$descripcion'";
}

if ($precio !== 0) {
    $updateFields[] = "costo = $precio";
}

if (!empty($categoria)) {
    $updateFields[] = "categoria = '$categoria'";
}

if (!empty($nombre)) {
    $updateFields[] = "nombre = '$nombre'";
}

$sql .= implode(", ", $updateFields);
$sql .= " WHERE idProducto = $idProducto";

if (!empty($updateFields)) {
    if ($conn->query($sql) === TRUE) {
        // Si la actualización fue exitosa, redirigir a una página de éxito o mostrar un mensaje
        header("Location: ../../platillos.php?errorCode=1");
        exit();
    } else {
        // Si hubo un error al actualizar, mostrar un mensaje de error
        header("Location: ../../platillos.php?errorCode=3");
    }
} else {
    header("Location: ../../platillos.php?errorCode=3");
}

// Cerrar la conexión
$conn->close();
?>