<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");
if (!$link) {
    die('Error de conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

// Obtener datos del formulario
$StrUser = isset($_POST["txtNombre"]) ? $_POST["txtNombre"] : '';
$StrEmail = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : '';
$StrPassword = isset($_POST["txtPass"]) ? $_POST["txtPass"] : '';
$StrPhone = isset($_POST["txtPhone"]) ? $_POST["txtPhone"] : '';

if (empty($StrUser) || empty($StrEmail) || empty($StrPassword)) {
    header("Location:  ../../index.php?errorCode=3");
    exit();
}

// Verificar si el correo ya existe en la base de datos
$queryCheck = "SELECT correo FROM Usuario WHERE correo = ?";
$stmtCheck = mysqli_prepare($link, $queryCheck);
mysqli_stmt_bind_param($stmtCheck, 's', $StrEmail);
mysqli_stmt_execute($stmtCheck);
mysqli_stmt_store_result($stmtCheck);

if (mysqli_stmt_num_rows($stmtCheck) > 0) {
    // El correo ya existe
    header("Location:  ../../index.php?errorCode=5");
    exit();
}
mysqli_stmt_close($stmtCheck);

// Insertar datos en la base de datos
$query = "INSERT INTO Usuario (nombre, correo, password, telefono, rol) VALUES (?, ?, ?, ?, 'cliente')";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, 'ssss', $StrUser, $StrEmail, $StrPassword, $StrPhone);

if (mysqli_stmt_execute($stmt)) {
    session_start();
    $_SESSION['correo'] = $StrEmail; // Asegurarse de que se utiliza el mismo nombre de columna
    $_SESSION['nombre'] = $StrUser;
    $_SESSION['rol'] = "cliente";
    header("Location: ../../index.php");
} else {
    header("Location: ../../login.php?errorCode=4");
}

mysqli_stmt_close($stmt);
mysqli_close($link);
?>
