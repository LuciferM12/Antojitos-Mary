<?php
session_start();

// Obtener el nombre del vendedor de la sesión
$nombreVendedor = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
if (!$nombreVendedor) {
    die("Nombre de vendedor no disponible en la sesión.");
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el id del vendedor
$sql = "SELECT idUsuario FROM Usuario WHERE nombre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nombreVendedor);
$stmt->execute();
$result = $stmt->get_result();
$vendedorRow = $result->fetch_assoc();
$idVendedor = $vendedorRow['idUsuario'];
$stmt->close();

// Obtener datos del formulario
$idUsuario = $_POST['user'];
$totalCompra = $_POST['totalCompra'];
$fecha = date('Y-m-d');

// Insertar en la tabla Compra
$sqlCompra = "INSERT INTO Compra (idUsuario, idVendedor, fecha, total) VALUES (?, ?, ?, ?)";
$stmtCompra = $conn->prepare($sqlCompra);
$stmtCompra->bind_param("iisd", $idUsuario, $idVendedor, $fecha, $totalCompra);
$stmtCompra->execute();
$idCompra = $conn->insert_id; // Obtener el id de la compra recién insertada
$stmtCompra->close();

// Insertar en la tabla DetalleCompra
$productos = json_decode($_POST['productos'], true); // Asegurarse de que los productos se pasen como JSON

foreach ($productos as $producto) {
    $idProducto = $producto['idProducto'];
    $costo = $producto['precio'];
    $cantidad = $producto['cantidad'];

    $sqlDetalle = "INSERT INTO DetalleCompra (idCompra, idProducto, costo, cantidad) VALUES (?, ?, ?, ?)";
    $stmtDetalle = $conn->prepare($sqlDetalle);
    $stmtDetalle->bind_param("iidi", $idCompra, $idProducto, $costo, $cantidad);
    $stmtDetalle->execute();
    $stmtDetalle->close();
}

$conn->close();

// Redirigir a una página de confirmación
header("Location: confirmacion_compra.php");
exit();
?>
