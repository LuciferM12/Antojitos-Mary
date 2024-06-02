<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombreUs'];
$correo = $_POST['correoUs'];
$telefono = $_POST['telefonoUs'];
$pass = $_POST['passUs'];
$rol =  $_POST['rolUs'];

// Preparar la consulta SQL para insertar un nuevo producto
$sql = "INSERT INTO Usuario (nombre, correo, telefono, password, rol) VALUES ('$nombre', '$correo', $telefono, '$pass', '$rol')";

if ($conn->query($sql) === TRUE) {
    // Si la inserción fue exitosa, redirigir a una página de éxito o mostrar un mensaje
    header("Location: ../../usuarios.php?errorCode=1");
    exit();
} else {
    // Si hubo un error al insertar, mostrar un mensaje de error
    header("Location: ../../usuarios.php?errorCode=2");
}

// Cerrar la conexión
$conn->close();
?>