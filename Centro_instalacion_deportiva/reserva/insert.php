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
    <title>Insertar Reserva</title>
</head>

<body>
    <header>
        <div class="contenedor">
            <div id="marca">
                <h1 style="text-align: center; font-family: 'Yatra One'">
                    <span class="resaltado">Reservas</span>
                </h1>
            </div>
            <nav class="menu">
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Reserva</a></li>
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
                <h1 style=" font-family: 'Yatra One'">Insertar Reserva</h1>
                <p style=" font-family: 'Yatra One'">Si desea agregar una reserva abajo están las opciones
                    para insertar el nombre del socio, hora de inicio, hora final, y el total de horas.
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #E85D04; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Inserción de Datos</h1>
            <form class="form-register" action="insert.php" method="POST" enctype="multipart/form-data">
                <h3>Ingrese los datos de la reserva</h3>
                <h3 style="text-align: justify;"> Socio:</h3>
                <select name="selectsocio" class="controls" style="color:black">
                    <option class="controls" value="0">--</option>
                    <?php
                    $consulta = "SELECT * FROM socio";
                    $ejecutar = mysqli_query($conexion, $consulta);
                    while ($res = mysqli_fetch_assoc($ejecutar)) {
                        echo "<option value = '" . $res['Idsocio'] . "'>" . $res['Nombre'] . "</option>";
                    }
                    ?>
                </select>
                <h3 style="text-align: justify;">Hora Inicio:</h3>
                <input class="controls" type="time" style="font-size: 150%; color:black;" name="txthorainicio" placeholder="Hora Inicio">
                <br><br>
                <h3 style="text-align: justify;">Hora Final:</h3>
                <input class="controls" type="time" style="font-size: 150%; color:black;" name="txthorafinal" placeholder="Hora Final">
                <br><br>
                <h3 style="text-align: justify;">Total Horas:</h3>
                <input class="controls" type="text" style="font-size: 150%; color:black;" name="txttotal" placeholder="Total Horas">
                <br><br>
                <?php
                if (isset($_POST['Enviar'])) {
                    $sql = 'insert into reserva(Idsocio,Hora_inicio,Hora_fin,Total_horas) values ("' . $_POST['selectsocio'] . '", "' . $_POST['txthorainicio'] . '", "' . $_POST['txthorafinal'] . '", "' . $_POST['txttotal'] . '")';
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