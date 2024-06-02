<?php
session_start(); // Asegúrate de que las sesiones están habilitadas
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $fecha = $_POST["date"];
    $hora = $_POST["hora"];
    if(isset($_SESSION["rol"]) && $_SESSION["rol"] !== "vendedor") {
    $nombreUsuario = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "";
} else {
    $nombreUsuario = isset($_POST["txtUsuario"]) ? $_POST["txtUsuario"] : "";
}
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Escapar las entradas para prevenir inyección de SQL
    $fecha = $conn->real_escape_string($fecha);
    $hora = $conn->real_escape_string($hora);
    $nombreUsuario = $conn->real_escape_string($nombreUsuario);

    // Verificar si ya existe una cita para la misma hora y fecha
    $sql = "SELECT COUNT(*) as total FROM Cita WHERE fecha = '$fecha' AND hora = '$hora'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $totalCitas = $fila["total"];

        if ($totalCitas > 0) {
            header("Location: ../../reservar.php?errorCode=1");
            exit();
        }
    } else {
        header("Location: ../../reservar.php?errorCode=2");
        exit();
    }

    // Obtener el idUsuario a partir del nombre de usuario
    $sql = "SELECT idUsuario FROM Usuario WHERE nombre = '$nombreUsuario'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $idUsuario = $fila["idUsuario"];

        // Insertar la nueva cita
        $sql = "INSERT INTO Cita (fecha, hora, status, usuario) VALUES ('$fecha', '$hora', 'Activa', $idUsuario)";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../../reservar.php?errorCode=3");
            exit();
        } else {
            header("Location: ../../reservar.php?errorCode=4");
            exit();
        }
    } else {
        header("Location: ../../reservar.php?errorCode=5");
        exit();
    }

    $conn->close();
}
?>
