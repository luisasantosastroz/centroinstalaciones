<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Reserva_Instalacion_Articulo</title>
    <link rel="stylesheet" href="../CSS\estiselect.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include("../conexiones/conexion.php");
    ?>
    <header>
        <div class="contenedor">
            <div id="marca">
                <h1 style=" font-family: 'Yatra One'">
                    <span class="resaltado">Reserva Instalación Artículo</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Reserva_Instalacion_Articulo</a></li>
                    <li><a href="../reserva_instalacion/insert.php">Reserva_Instalacion</a></li>
                    <li><a href="../bienvenido.php">Menú</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'">Seleccionar Reserva Instalación Artículo</h1>
                <p style=" font-family: 'Yatra One'">Como vemos en esta sección encontramos la lista de reserva_instalacion_articulo
                    con sus campos correspondientes.
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <form method="POST" action="select.php" method="post" enctype="multipart/form-data">
                <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Listado de Reserva_Instalacion_Articulo</h1>
                <center>
                    <table style="font-family: 'Yatra One';font-size:30px">
                        <thead>
                            <tr align="center">
                                <td><b>Id reserva_instalacion</b></td>
                                <td><b>Nombre Artículo</b></td>
                                <td><b>Cantidad</b></td>
                                <td><b>Actualizar</b></td>
                                <td><b>Eliminar</b></td>
                            </tr>
                        </thead>
                        <?php
                        $consulta = "select * from reservainstalacion_articulo ";
                        $ejecutar = mysqli_query($conexion, $consulta);
                        $i = 0;
                        while ($Fila = mysqli_fetch_assoc($ejecutar)) {
                            $id = $Fila['Id'];
                            $idr = $Fila['Idreserinsta'];
                            $ida = $Fila['Idarticulo'];
                            $cantidad = $Fila['Cantidad'];
                            $i++;
                        ?>
                            <td><?php
                                $sub_sql_1 = "SELECT Idreserinsta FROM reserva_instalacion WHERE Idreserinsta=" . $idr;
                                $execute = mysqli_query($conexion, $sub_sql_1);
                                $reserva_i = mysqli_fetch_assoc($execute);
                                echo $reserva_i['Idreserinsta'];
                                ?>
                            </td>
                            <td><?php
                                $sub_sql_2 = "SELECT Nombrearticulo FROM articulo WHERE Idarticulo=" . $ida;
                                $execute = mysqli_query($conexion, $sub_sql_2);
                                $articulo = mysqli_fetch_assoc($execute);
                                echo $articulo['Nombrearticulo'];
                                ?>
                            </td>
                            <td><?php
                                $sub_sql_3 = "SELECT Cantidad FROM reservainstalacion_articulo WHERE Id=" . $id;
                                $execute = mysqli_query($conexion, $sub_sql_3);
                                $reserva_a = mysqli_fetch_assoc($execute);
                                echo $reserva_a['Cantidad'];
                                ?>
                            </td>
                            <td>
                                <a style="color:#E63946" href="update.php?actualizar=<?php echo $id; ?>"> Actualizar
                                </a>
                            </td>
                            <td>
                                <a style="color:#E63946" href="select.php?eliminar=<?php echo $id; ?>"> Eliminar
                                </a>
                            </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </center>
                <?php
                if (isset($_GET['actualizar'])) {
                    include("update.php");
                }
                ?>
                <?php
                if (isset($_GET['eliminar'])) {
                    $borrar_id = $_GET['eliminar'];
                    $eliminar = "DELETE FROM reservainstalacion_articulo WHERE Id='$borrar_id'";
                    $ejecutar = mysqli_query($conexion, $eliminar);

                    if ($ejecutar) {
                        echo "<script>alert('Esta reserva_instalación_artículo ha sido eliminada!')</script>";
                        echo "<script>window.open('select.php','_self')</script>";
                    }
                }
                ?>
            </form>
        </div>
    </section>
    <footer>
        <p>CENTRO DE INSTALACIONES DEPORTIVAS</p>
    </footer>
</body>

</html>