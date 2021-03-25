<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Reserva_Instalacion</title>
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
                    <span class="resaltado">Reserva Instalacion</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Reserva_Instalacion</a></li>
                    <li><a href="../reserva_instalacion_articulo/insert.php">Reserva_Instalacion_Articulo</a></li>
                    <li><a href="../bienvenido.php">Menú</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'">Reserva Instalacion</h1>
                <p style=" font-family: 'Yatra One'">En esta página nos permite actualizar el Id_reserva, Nombre instalación y la fecha.
                </p>
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Actualización de Reserva_Instalacion</h1>
            <?php
            if (isset($_GET['actualizar'])) {
                $editar_id = $_GET['actualizar'];
                $consulta = " SELECT * FROM reserva_instalacion WHERE Idreserinsta='$editar_id'";
                $ejecutar = mysqli_query($conexion, $consulta);
                $fila = mysqli_fetch_assoc($ejecutar);
                $idr = $fila["Idreserva"];
                $idi = $fila["Idinstalacion"];
                $idri = $fila["Idreserinsta"];
                $fecha = $fila["Fecha"];
            }
            ?>
            <form class="form-register" method="POST" action="" enctype="multipart/form-data">
                <label>Seleccione Reserva: </label>
                <select class="controls" style="color:black" name="selectreserva">
                    <?php
                    $sql = "SELECT * FROM reserva r, reserva_instalacion o WHERE r.Idreserva = o.Idreserva AND o.Idreserinsta = '$editar_id'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        $seleccionando = $res['Idreserva'];
                        echo "<option value = '" . $res['Idreserva'] . "'>" . $res['Idreserva'] . "</option value>";
                    }
                    $sql = "SELECT * FROM reserva r WHERE r.Idreserva <> '$seleccionando'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idreserva'] . "'>" . $res['Idreserva'] . "</option value>";
                    }
                    ?>
                </select>
                <br><br>
                <label>Seleccione Nombre Instalacion </label>
                <select class="controls" style="color:black" name="selectinstalacion">
                    <?php
                    $sql = "SELECT * FROM instalacion i, reserva_instalacion o WHERE i.Idinstalacion = o.Idinstalacion AND o.Idreserinsta = '$editar_id'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        $seleccionando = $res['Idinstalacion'];
                        echo "<option value = '" . $res['Idinstalacion'] . "'>" . $res['Nombreinstalacion'] . "</option value>";
                    }
                    $sql = "SELECT * FROM instalacion i WHERE i.Idinstalacion <> '$seleccionando'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idinstalacion'] . "'>" . $res['Nombreinstalacion'] . "</option value>";
                    }
                    ?>
                </select>
                <br><br>
                <label>Fecha: </label>
                <input class="controls" style="color:black" ; type="date" name="txtfecha" value="<?php echo $fecha ?>"><br><br>
                <input class="botons" type="submit" name="actualizar" value="Actualizar Datos">
            </form>
        </div>
    </section>
    <?php
    if (isset($_POST['actualizar'])) {
        if ('txtFoto') {
            $editar_id = $_GET['actualizar'];
            $idm = $_POST['txtIdreserinsta'];
            $selectr = $_POST['selectreserva'];
            $selecti = $_POST['selectinstalacion'];
            $fecha = $_POST['txtfecha'];
            $actualizar = "UPDATE reserva_instalacion SET Idreserva='$selectr', Idinstalacion='$selecti', Fecha='$fecha'  WHERE Idreserinsta=$editar_id";
            echo $actualizar;
            $ejecutar = mysqli_query($conexion, $actualizar) or die(mysqli_error());
            $id = $editar_id;
        } else {
            $nombreinstala = $_POST['txtIdinstalacion'];
            $actualizar = "UPDATE instalacion SET Nombreinstalacion='$nombreinstala' WHERE Idinstalacion='$editar_id'";
            $ejecutar = mysqli_query($conexion, $actualizar) or die(mysqli_error());
        }
        echo "<script>alert('Datos Actualizados correctamente')</script>";
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