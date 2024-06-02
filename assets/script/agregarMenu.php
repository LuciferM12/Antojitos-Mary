<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el ID del usuario seleccionado
    $idUsuario = $_POST['modifUsuario'];

    // Preparar la consulta SQL para eliminar el usuario
  $sql = "INSERT INTO MenuDiario (IdProducto) VALUES ($idUsuario)";

    if ($conn->query($sql) === TRUE) {
        // Si la eliminación fue exitosa, redirigir a una página de éxito o mostrar un mensaje
        header("Location: ../../platillos.php?errorCode=4");
        exit();
    } else {
        // Si hubo un error al eliminar, mostrar un mensaje de error
        header("Location: ../../platillos.php?errorCode=2");
    }

    // Cerrar la conexión
    $conn->close();
}
?>