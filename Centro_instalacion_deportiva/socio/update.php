<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Socio</title>
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
                    <span class="resaltado">Socios</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Socio</a></li>
                    <li><a href="../estado_socio/insert.php">Estado Socio</a></li>
                    <li><a href="../ciudad/insert.php">Ciudad</a></li>
                    <li><a href="../cuota/insert.php">Cuota</a></li>
                    <li><a href="../bienvenido.php">Menú</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'">Actualizar Socio</h1>
                <p style=" font-family: 'Yatra One'">En esta página nos permite actualizar los campos correspodientes del socio.
                </p>
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Actualización de Socios</h1>
            <?php
            if (isset($_GET['actualizar'])) {
                $editar_id = $_GET['actualizar'];
                $consulta = " SELECT * FROM socio WHERE Idsocio='$editar_id'";
                $ejecutar = mysqli_query($conexion, $consulta);
                $fila = mysqli_fetch_assoc($ejecutar);
                $ids = $fila["Idsocio"];
                $idc = $fila["Idciudad"];
                $ide = $fila["Idestado_socio"];
                $nombresocio = $fila["Nombre"];
                $apellido = $fila["Apellido"];
                $direccion = $fila["Direccion"];
                $telefono = $fila["Telefono"];
            }
            ?>
            <form class="form-register" method="POST" action="" enctype="multipart/form-data">
                <h3 style="color:#E85D04">SOCIO</h3>
                <label>Nombre: </label>
                <input class="controls" style="color:black" ; type="text" name="txtNombresocio" value="<?php echo $nombresocio; ?>"><br><br>
                <label>Apellido: </label>
                <input class="controls" style="color:black" ; type="text" name="txtApellidosocio" value="<?php echo $apellido; ?>"><br><br>
                <label>Seleccione Ciudad: </label>
                <select class="controls" style="color:black" name="selectciudad">
                    <?php
                    $sql = "SELECT * FROM ciudad c, socio s WHERE c.Idciudad = s.Idciudad AND s.Idsocio = '$editar_id'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        $seleccionando = $res['Idciudad'];
                        echo "<option value = '" . $res['Idciudad'] . "'>" . $res['Nombreciudad'] . "</option value>";
                    }
                    $sql = "SELECT * FROM ciudad c WHERE c.Idciudad <> '$seleccionando'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idciudad'] . "'>" . $res['Nombreciudad'] . "</option value>";
                    }
                    ?>
                </select>
                <br><br>
                <label>Direccion: </label>
                <input class="controls" type="text" style="color:black" ; name="txtDireccion" value="<?php echo $direccion; ?>"><br>
                <br>
                <label>Telefono: </label>
                <input class="controls" type="text" style="color:black" ; name="txtTelefono" value="<?php echo $telefono; ?>"><br><br>
                <label>Seleccione Estado Socio: </label>
                <select class="controls" style="color:black" name="selectestado">
                    <br><br>
                    <?php
                    $sql = "SELECT * FROM estado_socio e, socio s WHERE e.Idestado_socio = s.Idestado_socio AND s.Idsocio = '$editar_id'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        $seleccionando = $res['Idestado_socio'];
                        echo "<option value = '" . $res['Idestado_socio'] . "'>" . $res['Nombre_estadosocio'] . "</option value>";
                    }
                    $sql = "SELECT * FROM estado_socio e WHERE e.Idestado_socio<> '$seleccionando'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idestado_socio'] . "'>" . $res['Nombre_estadosocio'] . "</option value>";
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
                    $idm = $_POST['txtidsocio'];
                    $idc = $_POST['selectciudad'];
                    $ide = $_POST['selectestado'];
                    $nombre = $_POST['txtNombresocio'];
                    $apellido = $_POST['txtApellidosocio'];
                    $direccion = $_POST['txtDireccion'];
                    $telefono = $_POST['txtTelefono'];
                    $actualizar = "UPDATE socio SET Nombre='$nombre', Apellido='$apellido', Idciudad='$idc', Direccion='$direccion',Telefono='$telefono',Idestado_socio='$ide' WHERE Idsocio=$editar_id";
                    echo $actualizar;
                    $ejecutar = mysqli_query($conexion, $actualizar) or die(mysqli_error());

                    $id = $editar_id;
                } else {
                    $nombreciudad = $_POST['txtNombre'];
                    $actualizar = "UPDATE ciudad SET Nombre='$nombreciudad' WHERE Id'$editar_id'";
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