<?php
session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Eliminar la variable de sesión 'rol'
unset($_SESSION['rol']);

// Redireccionar al usuario a la página de inicio después de cerrar sesión
header("Location:../../index.php");
exit();
?>