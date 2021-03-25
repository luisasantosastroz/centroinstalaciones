<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS\estiinsert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="contenedor">
            <div id="marca">
                <h1 style=" font-family: 'Yatra One'">
                    <span class="resaltado">USUARIOS</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Usuarios</a></li>
                    <li><a href="../roles/insert.php">Roles</a></li>
                    <li><a href="../reportes/reportes_con_parametros1.php">INFORMES CON PARAMETROS</a></li>
                    <li><a href="../reportes/reportes_sin_parametros.php">INFORMES SIN PARAMETROS</a></li>
                    <li><a href="../bienvenido.php">Menú</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'">USUARIOS</h1>
                <p style=" font-family: 'Yatra One'">En esta página nos permite actualizar Nombre, correo, contraseña y rol.
                </p>
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Actualización de Usuarios</h1>
            <?php
            if (isset($_GET['actualizar'])) {
                $editar_id = $_GET['actualizar'];
                $consulta = " SELECT * FROM usuario WHERE idusuario='$editar_id'";
                $ejecutar = mysqli_query($conexion, $consulta);
                $fila = mysqli_fetch_assoc($ejecutar);
                $Idrol = $fila["idrol"];
                $id_u = $fila["idusuario"];
                $nombreusuario = $fila["NombreUsuario"];
                $email = $fila["Email"];
                $clave = $fila["Clave"];
            }
            ?>
            <form class="form-register" method="POST" action="" enctype="multipart/form-data">
                <label>Nombre Usuario: </label>
                <input class="controls" style="color:black" ; type="text" name="txtNombreUsuario" value="<?php echo $nombreusuario; ?>"><br><br>
                <label>Email </label>
                <input class="controls" style="color:black" ; type="text" name="txtEmail" value="<?php echo $email; ?>"><br><br>
                <label>Contraseña: </label>
                <input class="controls" type="text" style="color:black" ; name="txtClave" value="<?php echo $clave; ?>"><br><br>
                <label>Seleccione Rol: </label>
                <select class="controls" style="color:black" name="selectRol">
                    <?php
                    $sql = "SELECT * FROM rol r, usuario u WHERE r.idrol = u.idrol AND u.idusuario = '$editar_id'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        $seleccionando = $res['idrol'];
                        echo "<option value = '" . $res['idrol'] . "'>" . $res['NombreRol'] . "</option value>";
                    }
                    $sql = "SELECT * FROM rol r WHERE r.idrol <> '$seleccionando'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['idrol'] . "'>" . $res['NombreRol'] . "</option value>";
                    }
                    ?>
                </select>
                <br><br>
                <input class="botons" type="submit" name="actualizar" value="Actualizar Datos">
            </form>
            <?php
            if (isset($_POST['actualizar'])) {
                if ('txtFoto') {
                    $editar_id = $_GET['actualizar'];
                    $idm = $_POST['txtidusuario'];
                    $idr = $_POST['selectRol'];
                    $nombre = $_POST['txtNombreUsuario'];
                    $correo = $_POST['txtEmail'];
                    $clave = $_POST['txtClave'];
                    $actualizar = "UPDATE usuario SET NombreUsuario='$nombre', Email='$correo', Clave='$clave', idrol='$idr' WHERE idusuario=$editar_id";
                    echo $actualizar;
                    $ejecutar = mysqli_query($conexion, $actualizar) or die(mysqli_error());

                    $id = $editar_id;
                } else {
                    $nombrerol = $_POST['txtNombreRol'];
                    $actualizar = "UPDATE rol SET NombreRol='$nombrerol' WHERE idrol='$editar_id'";
                    $ejecutar = mysqli_query($conexion, $actualizar) or die(mysqli_error());
                }
                echo "<script>alert('Datos Actualizados')</script>";
                echo "<script>window.open('select.php','_self')</script>";
            }
            ?>
        </div>
        <center>
            </form>
            </div>
    </section>
    <br><br>
    <footer>
        <p>Servicio Nacional de Aprendizaje - SENA ADSI 2056751 - Luisa Fernanda Santos Astroz</p>
    </footer>
</body>

</html>