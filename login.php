


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4ffe7a9329.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/estilosL.css">
    <title>Inicia Sesión</title>
</head>
<body>
    <div class="contenedor">
        <div class="inicioSesion-Registrarse">
            <form action="assets/script/login.php" method="post" class="inicioSesion">
                <h2 class="titulo">Inicio de Sesión</h2>
                <div class="entrada">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="text" name="txtUser" placeholder="Correo" required>
                </div>
                <div class="entrada">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="txtPassword" placeholder="Password" required>
                </div>
                <input type="submit" value="Entrar" class="btn">
                <p class="texto-cuenta">¿No tienes una cuenta? <a href="#" id="Registrate-btn2">Registrate</a></p>
            </form>
            
            <form action="assets/script/register.php" method="post" class="Registrate">
                <h2 class="titulo">Registrate</h2>
                <div class="entrada">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="text" name="txtNombre" placeholder="Username" required>
                </div>
                <div class="entrada">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="email" name="txtEmail" placeholder="Email" required>
                </div>
                <div class="entrada">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="txtPass" placeholder="Password" required>
                </div>
                <div class="entrada">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="txtPhone" placeholder="Teléfono">
                </div>
                <input type="submit" value="Registrate" class="btn">
                <p class="texto-cuenta">¿Ya tiene una cuenta? <a href="#" id="IniciaSesion-btn2">Inicia sesión</a></p>
            </form>
        </div>
        <div class="contenedor-paneles">
            <div class="panel panel-izquierdo">
                <div class="contenido">
                    <h3>¿Tienes ya una cuenta?</h3>
                    <p>Si ya formas parte de la comunidad de "Antojitos Mary" solamente inicia sesión y accede a nuestro delicioso menú <b>¡No dejes pasar el hambre!</b></p>
                    <button class="btn" id="inicia-sesion-btn">Inicia Sesión</button>
                    <img src="assets/imgs/chefo.png" alt="" class="image">
                    <button class="btn" onclick="window.location.href='index.php'">Volver</button>
                </div>
            </div>
            <div class="panel panel-derecho">
                <div class="contenido">
                    <h3>¿Eres nuevo?</h3>
                    <p>¡Únete a la familia de "Antojitos Mary"! Accede a todo nuestro menú, elige el que más te agrade y sumergete en la mejor experiencia culinaria de San Luis Potosí.</p>
                    <button class="btn" id="registrate-btn">Registrate</button>
                    <img src="assets/imgs/chefa.png" alt="" class="image">
                    <button class="btn" onclick="window.location.href='index.php'">Volver</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/Loggin.js"></script>

    <script>
		<?php
			if (isset($_GET["errorCode"])) {
		        $errorCode = $_GET["errorCode"];

                switch ($errorCode) {
                                            
                    case 1:
                        echo "alert('Contraseña incorrecta');";
                        break;
                    case 2:
                        echo "alert('Usuario no encontrado');";
                        break;
                    case 0:
                        echo "alert('Datos faltantes');";
                        break;
                    case 5:
                        echo "alert('El usuario o el correo electrónico ya están registrados');";
                        break;
                    case 4:
                        echo "alert('Registro erroneo');";
                        break;
                }
			}
		?>
	</script>

</body>
</html>
