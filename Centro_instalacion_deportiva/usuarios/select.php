<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Usuario</title>
    <link rel="stylesheet" href="../CSS\usuario.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
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
                <p style=" font-family: 'Yatra One'">Como vemos en esta sección encontramos la lista de usuarios
                    que hasta el momento hemos insertado junto con el nombre, correo y rol.
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div id="tablas">
            <div class="contenedor">
                <form method="POST" action="select.php" method="post" enctype="multipart/form-data">
                    <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Listado de Usuarios</h1>
                    <center>
                        <table style="font-family: 'Yatra One';font-size:30px">
                            <thead>
                                <tr align="center">
                                    <td><b>Nombre Usuario</b></td>
                                    <td><b>Correo</b></td>
                                    <td><b>Rol</b></td>
                                    <td><b>Actualizar</b></td>
                                    <td><b>Eliminar</b></td>
                                </tr>
                            </thead>
                            <?php
                            $consulta = "select * from usuario";
                            $ejecutar = mysqli_query($conexion, $consulta);
                            $i = 0;
                            while ($Fila = mysqli_fetch_assoc($ejecutar)) {
                                $id_u = $Fila['idusuario'];
                                $no_u = $Fila['NombreUsuario'];
                                $email = $Fila['Email'];
                                $clave = $Fila['Clave'];
                                $rol = $Fila['idrol'];
                                $i++;
                            ?>
                                <td><?php
                                    $sub_sql_1 = "SELECT NombreUsuario FROM usuario WHERE idusuario=" . $id_u;
                                    $execute = mysqli_query($conexion, $sub_sql_1);
                                    $usuario = mysqli_fetch_assoc($execute);
                                    echo $usuario['NombreUsuario'];
                                    ?>

                                </td>
                                <td><?php
                                    $sub_sql_1 = "SELECT Email FROM usuario WHERE idusuario =" . $id_u;
                                    $execute = mysqli_query($conexion, $sub_sql_1);
                                    $usuario = mysqli_fetch_assoc($execute);
                                    echo $usuario['Email'];
                                    ?>

                                </td>

                                <td><?php
                                    $sub_sql_2 = "SELECT NombreRol FROM rol WHERE idrol=" . $rol;
                                    $execute = mysqli_query($conexion, $sub_sql_2);
                                    $rol = mysqli_fetch_assoc($execute);
                                    echo $rol['NombreRol'];
                                    ?>
                                </td>

                                <td>
                                    <a style="color:#E63946" href="update.php?actualizar=<?php echo $id_u; ?>"> Actualizar
                                    </a>
                                </td>
                                <td>
                                    <a style="color:#E63946" href="select.php?eliminar=<?php echo $id_u; ?>"> Eliminar
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
                        session_start();
                        $Rol = $_SESSION['Rol'];
                        if ($Rol != 1) {
                            $_SESSION['Error'] = "Sin permiso para ingresar";
                            echo "<script>alert('No puedes eliminar')</script>";
                            echo "<script>window.open('select.php', '_self')</script>";
                        } else {
                            $borrar_id = $_GET['eliminar'];
                            $eliminar = "DELETE FROM usuario WHERE idusuario='$borrar_id'";
                            $ejecutar = mysqli_query($conexion, $eliminar);

                            if ($ejecutar) {
                                echo "<script>alert('El usuario ha sido eliminado!')</script>";
                                echo "<script>window.open('select.php','_self')</script>";
                            }
                        }
                    }
                    ?>
            </div>
        </div>
        </form>
    </section>
    <br><br>
    <footer>
        <p>Servicio Nacional de Aprendizaje - SENA ADSI 2056751 - Luisa Fernanda Santos Astroz</p>
    </footer>
</body>

</html>