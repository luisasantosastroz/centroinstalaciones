<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Instalación</title>
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
                    <span class="resaltado">Instalación</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Instalacion</a></li>
                    <li><a href="../bienvenido.php">Menú</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'"> Actualizar Instalación</h1>
                <p style=" font-family: 'Yatra One'">En esta página nos permite actualizar nombre de la instalación.
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Actualización de Instalaciones</h1>
            <?php
            if (isset($_GET['actualizar'])) {
                $editar_id = $_GET['actualizar'];
                $consulta = " SELECT * FROM instalacion WHERE Idinstalacion='$editar_id'";
                $ejecutar = mysqli_query($conexion, $consulta);
                $fila = mysqli_fetch_assoc($ejecutar);
                $id = $fila["Idinstalacion"];
                $nombre = $fila["Nombreinstalacion"];
            }
            ?>
            <form class="form-register" method="POST" action="" enctype="multipart/form-data">
                <h3 style="color:#E85D04">Instalación</h3>
                <label>Nombre: </label>
                <input class="controls" style="color:black" ; type="text" name="txtNombreinstalacion" value="<?php echo $nombre; ?>"><br><br>
                <input class="botons" type="submit" name="actualizar" value="Actualizar Datos">
            </form>
            <?php
            if (isset($_POST['actualizar'])) {
                if ('txtFoto') {
                    $editar_id = $_GET['actualizar'];
                    $id = $_POST['txtid'];
                    $nombre = $_POST['txtNombreinstalacion'];
                    $actualizar = "UPDATE instalacion SET Nombreinstalacion='$nombre' WHERE Idinstalacion=$editar_id";
                    echo $actualizar;
                    $ejecutar = mysqli_query($conexion, $actualizar) or die(mysqli_error());

                    $id = $editar_id;
                }
                echo "<script>alert('Dato Actualizado correctamente')</script>";
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
        <p>CENTRO DE INSTALACIONES DEPORTIVAS</p>
    </footer>
</body>

</html>