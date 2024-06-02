<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del producto seleccionado
$idUsuario = $_POST['modifUsuario'];

// Obtener los nuevos datos del formulario
$nombre = isset($_POST['nombreUs']) ? $_POST['nombreUs'] : '';
$correo = isset($_POST['correoUs']) ? $_POST['correoUs'] : '';
$telefono = isset($_POST['telefonoUs']) ? $_POST['telefonoUs'] : '';
$pass = isset($_POST['passUs']) ? $_POST['passUs'] : '';
$rol = isset($_POST['rolUs']) ? $_POST['rolUs'] : '';

// Preparar la consulta SQL para actualizar el producto
$sql = "UPDATE Usuario SET ";
$updateFields = array();

if (!empty($nombre)) {
    $updateFields[] = "nombre = '$nombre'";
}

if (!empty($correo)) {
    $updateFields[] = "correo = '$correo'";
}

if (!empty($telefono)) {
    $updateFields[] = "telefono = '$telefono'";
}

if (!empty($pass)) {
    $updateFields[] = "password = '$pass'";
}

if (!empty($rol)) {
    $updateFields[] = "rol = '$rol'";
}



$sql .= implode(", ", $updateFields);
$sql .= " WHERE idUsuario = $idUsuario";

if (!empty($updateFields)) {
    if ($conn->query($sql) === TRUE) {
        // Si la actualización fue exitosa, redirigir a una página de éxito o mostrar un mensaje
        header("Location: ../../usuarios.php?errorCode=1");
        exit();
    } else {
        // Si hubo un error al actualizar, mostrar un mensaje de error
        header("Location: ../../usuarios.php?errorCode=3");
    }
} else {
    header("Location: ../../usuarios.php?errorCode=3");
}

// Cerrar la conexión
$conn->close();
?>