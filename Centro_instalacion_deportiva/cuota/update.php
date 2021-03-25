<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cuota</title>
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
                    <span class="resaltado">Cuotas</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Cuota</a></li>
                    <li><a href="../estado_cuota/insert.php">Estado Cuota</a></li>
                    <li><a href="../socio/insert.php">Socio</a></li>
                    <li><a href="../bienvenido.php">Menú</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'">Actualizar Cuota</h1>
                <p style=" font-family: 'Yatra One'">En esta página nos permite actualizar los campos correspodientes de la cuota.
                </p>
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Actualización de Cuotas</h1>
            <?php
            if (isset($_GET['actualizar'])) {
                $editar_id = $_GET['actualizar'];
                $consulta = " SELECT * FROM cuota WHERE Idcuota='$editar_id'";
                $ejecutar = mysqli_query($conexion, $consulta);
                $fila = mysqli_fetch_assoc($ejecutar);
                $idc = $fila["Idcuota"];
                $ids = $fila["Idsocio"];
                $numero = $fila["Numero_cuotas"];
                $monto = $fila["Monto_cuota"];
                $fecha = $fila["Fecha_pago"];
                $estado = $fila["Idestado_cuota"];
            }
            ?>
            <form class="form-register" method="POST" action="" enctype="multipart/form-data">
                <h3 style="color:#E85D04">CUOTA</h3>
                <label>Seleccione Socio: </label>
                <select class="controls" style="color:black" name="selectsocio">
                    <?php
                    $sql = "SELECT * FROM socio s, cuota c WHERE s.Idsocio = c.Idsocio AND c.Idcuota = '$editar_id'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        $seleccionando = $res['Idsocio'];
                        echo "<option value = '" . $res['Idsocio'] . "'>" . $res['Nombre'] . "</option value>";
                    }
                    $sql = "SELECT * FROM socio s WHERE s.Idsocio <> '$seleccionando'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idsocio'] . "'>" . $res['Nombre'] . "</option value>";
                    }
                    ?>
                </select>
                <label>Numero Cuotas: </label>
                <input class="controls" style="color:black" ; type="text" name="txtnumero" value="<?php echo $numero; ?>"><br><br>
                <label>Monto Cuota: </label>
                <input class="controls" style="color:black" ; type="text" name="txtmonto" value="<?php echo $monto; ?>"><br><br>
                <label>Fecha Pago: </label>
                <input class="controls" type="date" style="color:black" ; name="txtpago" value="<?php echo $fecha; ?>"><br>
                <br>
                <label>Seleccione Estado Cuota: </label>
                <select class="controls" style="color:black" name="selectestado">
                    <br><br>
                    <?php
                    $sql = "SELECT * FROM estado_cuota e, cuota c WHERE e.Idestado_cuota = c.Idestado_cuota AND c.Idcuota = '$editar_id'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        $seleccionando = $res['Idestado_cuota'];
                        echo "<option value = '" . $res['Idestado_cuota'] . "'>" . $res['Nombrecuota'] . "</option value>";
                    }
                    $sql = "SELECT * FROM estado_cuota e WHERE e.Idestado_cuota<> '$seleccionando'";
                    $ejecutar = mysqli_query($conexion, $sql);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idestado_cuota'] . "'>" . $res['Nombrecuota'] . "</option value>";
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
                    $idc = $_POST['txtidcuota'];
                    $socio = $_POST['selectsocio'];
                    $estado = $_POST['selectestado'];
                    $numero = $_POST['txtnumero'];
                    $monto = $_POST['txtmonto'];
                    $pago = $_POST['txtpago'];
                    $actualizar = "UPDATE cuota SET Idsocio='$socio', Numero_cuotas='$numero', Monto_cuota='$monto', Fecha_pago='$pago',Idestado_cuota='$estado' WHERE Idcuota=$editar_id";
                    echo $actualizar;
                    $ejecutar = mysqli_query($conexion, $actualizar) or die(mysqli_error());

                    $id = $editar_id;
                } else {
                    $nombrecuota = $_POST['txtNombre'];
                    $actualizar = "UPDATE estado_cuota SET Nombrecuota='$nombrecuota' WHERE Idestado_cuota'$editar_id'";
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