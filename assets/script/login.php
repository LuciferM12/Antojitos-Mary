<?php
session_start();

// Conexión a la base de datos
$link = mysqli_connect("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");
if (!$link) {
    die('Error de conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Obtener datos del formulario
$StrUser = isset($_POST["txtUser"]) ? $_POST["txtUser"] : '';
$StrPassword = isset($_POST["txtPassword"]) ? $_POST["txtPassword"] : '';

if (empty($StrUser) || empty($StrPassword)) {
    header("Location: ../../login.php?errorCode=0");
    exit();
}

// Consulta a la base de datos
$q = mysqli_query($link, "SELECT correo, password, rol FROM Usuario WHERE correo = '$StrUser'");

if (mysqli_num_rows($q) > 0) {
    $f = mysqli_fetch_assoc($q);
    if ($f['password'] == $StrPassword) {
        // Inicio de sesión exitoso
        $_SESSION['correo'] = $StrUser;
        $_SESSION['nombre'] = $StrUser;
        $_SESSION['rol'] = $f['rol'];
        header("Location: ../../index.php");
    } else {
        // Contraseña incorrecta
        header("Location: ../../login.php?errorCode=1");
    }
} else {
    // Usuario no encontrado
    header("Location: ../../login.php?errorCode=2");
}

mysqli_close($link);
?>
