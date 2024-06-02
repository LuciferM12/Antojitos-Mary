<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que al menos un campo se haya llenado
    
        // Recibir los datos del formulario
        $usuario = $_POST['user'];
        $total = $_POST['total'];
        $fecha = $_POST['fecha'];
        $idVendedor = $_POST['idUsuario'];
        
        
        // Conectar a la base de datos

        $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Construir la consulta SQL
        $sql = "INSERT INTO Compra (idUsuario, idVendedor, fecha, costoTotal) VALUES ($usuario, $idVendedor, '$fecha', $total)";
        

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo"<script>
                alert('Compra realizada con exito');
                window.location.href = 'https://itiuplsp.tech/Antojitos-Mary/compra.php';
              </script>";
            exit();
        } else {
            echo"<script>
            alert('Error al realizar');
            window.location.href = 'https://itiuplsp.tech/Antojitos-Mary/perfil.php';
          </script>";
    exit();
        }

        $conn->close();
   
}
?>