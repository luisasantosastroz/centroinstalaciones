<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seleccionar Instalación</title>
	<link rel="stylesheet" href="../CSS\estiselect.css">
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
				<h1 style=" font-family: 'Yatra One'">Seleccionar Instalación</h1>
				<p style=" font-family: 'Yatra One'">Como vemos en esta sección encontramos la lista de instalaciones
					que se han añadido.
				</p>
			</div>
		</div>
	</section>
	<section id="Boletin">
		<div class="contenedor">
			<form method="POST" action="select.php" method="post" enctype="multipart/form-data">
				<h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Listado de Instalaciones</h1>
				<center>
					<table style="font-family: 'Yatra One';font-size:30px">
						<thead>
							<tr align="center">
								<td><b>Nombre</b></td>
								<td><b>Actualizar</b></td>
								<td><b>Eliminar</b></td>
							</tr>
						</thead>
						<?php
						$consulta = "select * from instalacion";
						$ejecutar = mysqli_query($conexion, $consulta);
						$i = 0;
						while ($Fila = mysqli_fetch_assoc($ejecutar)) {
							$id = $Fila['Idinstalacion'];
							$no_u = $Fila['Nombreinstalacion'];
							$i++;
						?>
							<td><?php
								$sub_sql_1 = "SELECT Nombreinstalacion FROM instalacion WHERE Idinstalacion=" . $id;
								$execute = mysqli_query($conexion, $sub_sql_1);
								$instalacion = mysqli_fetch_assoc($execute);
								echo $instalacion['Nombreinstalacion'];
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
					session_start();
						$Rol = $_SESSION['Rol'];
						if ($Rol != 1) {
							$_SESSION['Error'] = "No puede realizar esta accion";
							echo "<script>alert('No puedes eliminar')</script>";
							echo "<script>window.open('select.php', '_self')</script>";
						} else {
					$borrar_id = $_GET['eliminar'];
					$eliminar = "DELETE FROM instalacion WHERE Idinstalacion='$borrar_id'";
					$ejecutar = mysqli_query($conexion, $eliminar);

					if ($ejecutar) {
						echo "<script>alert('Esta instalación ha sido eliminada!')</script>";
						echo "<script>window.open('select.php','_self')</script>";
					}
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