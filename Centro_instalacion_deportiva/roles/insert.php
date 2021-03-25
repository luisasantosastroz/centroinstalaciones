<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Insertar Rol</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS\estiinsert.css">
    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="contenedor">
            <div id="marca">
                <h1 style=" font-family: 'Yatra One'">
                    <span class="resaltado">ROLES</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="insert.php">Roles</a></li>
                    <li><a href="../usuarios/insert.php">Usuarios</a></li>
                    <li><a href="../bienvenido.php">Menú</a></li>
                    <li><a href="../salir.php">CERRAR SESION</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'">ROLES DE USUARIO</h1>
                <p style=" font-family: 'Yatra One'">Si desea agregar un nuevo rol abajo está la opción
                    para insertar lo que es simplemente el nombre del rol.
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
            <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Inserción de Datos</h1>
            <form class="form-register" name="form" action="insert.php" method="post" enctype="multipart/form-data">
                <h3>Ingrese el rol</h3><br>
                <h3 style="text-align: justify;"> Nombre Rol:</h3>
                <input class="controls" type="text" style="font-size: 150%; color:black;" name="txtNombreRol" placeholder="Nombre Usuario">
                <br><br>

                <?php
                if (isset($_POST['Enviar'])) {
                    $sql = 'insert into rol(NombreRol) values ("' . $_POST['txtNombreRol'] . '")';
                    $result = mysqli_query($conexion, $sql) or die(mysqli_error());
                    $id = mysqli_insert_id($conexion);
                    echo "<script>alert('Dato insertado correctamente')</script>";
                }
                ?>
                <br>
                <input class="botons" type="submit" name="Enviar" value="Insertar">
                <br>
                <br>
                <center><a href="select.php" style="color: black ;">
                        <h5><b>VER LISTADO</b></h5>
                    </a></center>
            </form>
        </div>
        </div>
    </section>
    <br><br>
    <footer>
        <p>Servicio Nacional de Aprendizaje - SENA ADSI 2056751 - Luisa Fernanda Santos Astroz</p>
    </footer>
</body>

</html>