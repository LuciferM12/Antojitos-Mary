<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID de la cita desde la URL
$idCita = $_GET["id"];

// Confirmación de eliminación
if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'true') {
    // Consulta SQL para actualizar el estado de la cita
    $sql = "UPDATE Cita SET status = 'Cancelada' WHERE idCita = $idCita";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../../reservar2.php?errorCode=1");
    } else {
        header("Location: ../../reservar2.php?errorCode=2");
    }

    header("Location: ../../reservar2.php");
    $conn->close();
    exit;
} else {
    // Mostrar la confirmación de JavaScript
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Confirmación de cancelación de cita</title>
        <script>
            if (confirm("¿Estás seguro de cancelar la cita?")) {
                window.location.href = "?id=<?php echo $idCita; ?>&confirmar=true";
            } else {
                window.location.href = "Location: ../../reservar2.php";
            }
        </script>
    </head>
    <body></body>
    </html>
    <?php
}
?>