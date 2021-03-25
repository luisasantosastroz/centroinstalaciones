<?php
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
    <title>Restablecer Contraseña</title>
</head>

<body>
    <header>
    </header>
    <img class="wave" src="img\wave2.png">
    <div class="container">
        <div class="img">
            <img src="img\img.svg.svg">
        </div>
        <div class="login-container">
            <form action="olvido.php" method="POST">
                <img class="avatar" src="img\avatar.svg.svg">
                <br>
                <h2>Restablecer</h2>
                <div class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-user"></i><br><br>
                    </div>
                    <div>
                        <h5>Nombre Usuario</h5>
                        <input class="input" name="txtusu" required type="text"><br>
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Nueva Contraseña</h5>
                        <input class="input" name="txtPass1" required type="password">
                    </div>
                </div>
                <br>
                <input type="submit" name="actualizar" class="btn" value="RESTABLECER CLAVE">
                <?php 
                if (isset($_POST['actualizar'])){
                	$Usuario = $_POST['txtusu'];
                    $contra = $_POST['txtPass1'];
	$sql = "UPDATE usuario SET Clave = '$contra' WHERE NombreUsuario= '$Usuario'";
	$ejecuta = mysqli_query($conexion,$sql);
    echo "<script>alert('Contraseña Actualizada')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}
            
?>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>