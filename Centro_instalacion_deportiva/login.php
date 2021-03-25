<?php
  session_start();
  require_once('conexiones/conexion.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Login</title>
</head>
<body>
<header>
</header>
    <img class="wave" src="img\wave2.png">
    <div class="container">
    <div class="img">
    <img  src="img\img.svg.svg">
    </div>
    <div class="login-container">
    <form action="validalogin.php" method="POST">
    <img class="avatar" src="img\avatar.svg.svg">
    <br>
    <h2>Bienvenido</h2>
    <div class="input-div one focus">
    <div class="i">
    <i class="fas fa-user"></i><br>
    </div>
    <div>
    <h5>Ingrese su correo</h5>
    <input class="input" name="txtusu" required type="text">
    </div>
    </div>
    <div class="input-div two">
    <div class="i">
    <i class="fas fa-lock"></i>
    </div>
    <div>
    <h5>Contraseña</h5>
    <input class="input" name="contra" required type="password">
    </div>
    </div>
    <a href="olvido.php">¿Olvidaste tu contraseña?</a>
    <a href="registrate.php">Registrate</a>
    <input type="submit" class="btn" value="Ingresar">
    <?php
        if (isset($_SESSION["Error"])) {
          $error = $_SESSION["Error"];

          echo "<script> alert('.$error.')</script>";
        }
        ?>
    </form>
    </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
<?php
unset($_SESSION["Error"]);
?>