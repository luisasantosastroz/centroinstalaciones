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
    <title>Registro</title>
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
            <form action="registrate.php" method="POST">
                <img class="avatar" src="img\avatar.svg.svg">
                <br>
                <h2>Registrate</h2>
                <div class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-user"></i><br>
                    </div>
                    <div>
                        <h5>Nombre Usuario</h5>
                        <input class="input" name="txtNombreUsuario" required type="text"><br>
                    </div>
                </div>
                <div class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-user"></i><br>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input" name="txtEmail" required type="text"><br>
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Contraseña</h5>
                        <input class="input" name="txtClave" required type="password">
                    </div>
                </div>
                <?php
                if (isset($_POST['regis'])) {
                    $sql = 'insert into usuario(NombreUsuario,Email,Clave,idrol) values ("' . $_POST['txtNombreUsuario'] . '", "' . $_POST['txtEmail'] . '", "' . $_POST['txtClave'] . '",4)';
                    $result = mysqli_query($conexion, $sql) or die(mysqli_error());
                    //$id = mysqli_insert_id($conexion);
                    echo "<script>alert('Usuario registrado ya puedes iniciar sesion')</script>";
                    echo "<script>window.open('login.php','_self')</script>";
                }
                ?>
                <br>
                <input type="submit" name="regis" class="btn" value="REGISTRARME">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>