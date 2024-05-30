<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que al menos un campo se haya llenado
    if ( !empty($_POST['firstname'])|| !empty($_POST['email']) || !empty($_POST['contrasenia']) || !empty($_POST['phone'])) {
        // Recibir los datos del formulario
        $nombre = $_POST['firstname'];
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];
        $telefono = $_POST['phone'];
        $idUsuario = $_POST['idUsuario'];
        
        
        // Conectar a la base de datos

        $conn = new mysqli("localhost","u222406285_Omar12", "IguanoPHPDev22", "u222406285__BD_IngSoft");

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Construir la consulta SQL
        $sql = "UPDATE Usuario SET";
        $updates = array();
        if (!empty($nombre)) {
            $updates[] = "nombre = '$nombre'";
        }
        if (!empty($email)) {
            $updates[] = "correo = '$email'";
        }
        if (!empty($contrasenia)) {
            $updates[] = "password = '$contrasenia'";
        }
        if (!empty($telefono)) {
            $updates[] = "telefono = '$telefono'";
        }

        $sql .= " " . implode(", ", $updates);
        $sql .= " WHERE idUsuario = $idUsuario";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            session_unset();

            // Destruir la sesión
            session_destroy();
            echo"<script>
                alert('Usuario actualizado correctamente');
                window.location.href = 'https://itiuplsp.tech/Antojitos-Mary/index.php';
              </script>";
            exit();
        } else {
            echo"<script>
            alert('Error al actualizar');
            window.location.href = 'https://itiuplsp.tech/Antojitos-Mary/perfil.php';
          </script>";
    exit();
        }

        $conn->close();
    } else {
        echo"<script>
                alert('Por favor, actualice al menos un campo');
                window.location.href = 'https://itiuplsp.tech/Antojitos-Mary/perfil.php';
              </script>";
        exit();
    }
}
?>