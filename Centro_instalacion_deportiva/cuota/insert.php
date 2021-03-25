<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS\estiinsert.css">
    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Insertar Cuota</title>
</head>

<body>
    <header>
        <div class="contenedor">
            <div id="marca">
                <h1 style="text-align: center; font-family: 'Yatra One'">
                    <span class="resaltado">Cuota</span>
                </h1>
            </div>
            <nav class="menu">
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
                <h1 style=" font-family: 'Yatra One'">Insertar Cuota</h1>
                <p style=" font-family: 'Yatra One'">Si desea agregar una cuota abajo está la opción
                    para insertar el numero de cuotas, monto, fecha de pago, y el estado de cuota en que se encuentra.
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #E85D04; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Inserción de Datos</h1>
            <form class="form-register" action="insert.php" method="POST" enctype="multipart/form-data">
                <h3>Ingrese los datos de la cuota</h3>
                <h3 style="text-align: justify;"> Nombre Socio:</h3>
                <select name="selectsocio" class="controls">
                    <option class="controls" value="0">--</option>
                    <?php
                    $consulta = "SELECT * FROM socio";
                    $ejecutar = mysqli_query($conexion, $consulta);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idsocio'] . "'>" . $res['Nombre'] . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                <h3 style="text-align: justify;">Numero de Cuotas:</h3>
                <input class="controls" type="text" style="font-size: 150%; color:black;" name="txtnumero" placeholder="Numero">
                <br><br>
                <h3 style="text-align: justify;">Monto Cuota:</h3>
                <input class="controls" type="text" style="font-size: 150%; color:black;" name="txtmonto" placeholder="Monto">
                <br><br>
                <h3 style="text-align: justify;">Fecha de Pago:</h3>
                <input class="controls" type="date" style="font-size: 150%; color:black;" name="txtpago" placeholder="Fecha Pago">
                <br><br>
                <h3 style="text-align: justify;"> Estado Cuota:</h3>
                <select name="selectestado" class="controls">
                    <option class="controls" value="0">--</option>
                    <?php
                    $consulta = "SELECT * FROM estado_cuota";
                    $ejecutar = mysqli_query($conexion, $consulta);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idestado_cuota'] . "'>" . $res['Nombrecuota'] . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                <?php
                if (isset($_POST['Enviar'])) {
                    $sql = 'insert into cuota(Idsocio,Numero_cuotas,Monto_cuota,Fecha_pago,Idestado_cuota) values ("' . $_POST['selectsocio'] . '", "' . $_POST['txtnumero'] . '","' . $_POST['txtmonto'] . '", "' . $_POST['txtpago'] . '", "' . $_POST['selectestado'] . '")';
                    $result = mysqli_query($conexion, $sql) or die(mysqli_error());
                    $id = mysqli_insert_id($conexion);
                    echo "<script>alert('Datos insertados correctamente')</script>";
                }
                ?>
                <br>
                <input class="botons" type="submit" name="Enviar" value="Insertar">
                <br><br>
                <center>
                    <a href="select.php" style="color: black ;">
                        <h5><b>VER LISTADO</b></h5>
                    </a>
                </center>
            </form>
        </div>
    </section>
    <footer>
        <p>CENTRO DE INSTALACIONES DEPORTIVAS</p>
    </footer>
</body>

</html>