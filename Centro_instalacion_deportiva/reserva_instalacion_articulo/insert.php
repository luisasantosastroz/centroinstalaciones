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
    <title>Reserva Instalación Articulo</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <div id="marca">
                <h1 style="text-align: center; font-family: 'Yatra One'">
                    <span class="resaltado">Reserva Instalación Artículo</span>
                </h1>
            </div>
            <nav class="menu">
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
                <h1 style=" font-family: 'Yatra One'">Insertar Reserva Instalación Artículo</h1>
                <p style=" font-family: 'Yatra One'">Si desea agregar una reserva_instalacion_articulo abajo están las opciones
                    para insertar el respectivo id de la reserva_instalacion, el nombre del artículo deportivo alquilado, y la cantidad.
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
        <h1 class="animate__animated animate__backInLeft" style="color:  #E85D04; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Inserción de Datos</h1>
            <form class="form-register" action="insert.php" method="POST" enctype="multipart/form-data">
            <h3>Ingrese los datos de la reserva instalación artículo</h3>
            <h3 style="text-align: justify;">Ingrese el id de la reserva_instalacion:</h3>
					<select name="selectreservai" class="controls" style="color:black">
						<option class="controls" value="0">--</option>
						<?php
						$consulta = "SELECT * FROM reserva_instalacion";
						$ejecutar = mysqli_query($conexion, $consulta);
						while ($res = mysqli_fetch_assoc($ejecutar)) {
							echo "<option value = '" . $res['Idreserinsta'] . "'>" . $res['Idreserinsta'] . "</option>";
						}
						?>
					</select>
                    <br><br>
                    <h3 style="text-align: justify;">Ingrese el nombre del artículo deportivo:</h3>
					<select name="selectarticulo" class="controls" style="color:black">
						<option class="controls" value="0">--</option>
						<?php
						$consulta = "SELECT * FROM articulo";
						$ejecutar = mysqli_query($conexion, $consulta);
						while ($res = mysqli_fetch_assoc($ejecutar)) {
							echo "<option value = '" . $res['Idarticulo'] . "'>" . $res['Nombrearticulo'] . "</option>";
						}
						?>
					</select><br><br>
                <h3 style="text-align: justify;">Cantidad:</h3>
                <input class="controls" type="text" style="font-size: 150%; color:black;" name="txtcantidad" placeholder="Cantidad">
                <br><br>
                <?php
					if (isset($_POST['Enviar'])) {
						$sql = 'insert into reservainstalacion_articulo(Idreserinsta,Idarticulo,Cantidad) values ("' . $_POST['selectreservai'] . '", "' . $_POST['selectarticulo'] . '", "' . $_POST['txtcantidad'] . '")';
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