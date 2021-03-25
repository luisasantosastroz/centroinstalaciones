<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seleccionar Estado Cuota</title>
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
					<span class="resaltado">Estado Cuota</span>
				</h1>
			</div>
			<nav>
				<ul style=" font-family: 'Yatra One';font-weight: bold">
					<li class="actual"><a href="insert.php">Estado Cuota</a></li>
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
				<h1 style=" font-family: 'Yatra One'">Seleccionar Estado Cuota</h1>
				<p style=" font-family: 'Yatra One'">Como vemos en esta sección encontramos la lista de estados
					que puede contener una cuota por lo tanto solo está el nombre.
				</p>
			</div>
		</div>
	</section>
	<section id="Boletin">
		<div class="contenedor">
			<form method="POST" action="select.php" method="post" enctype="multipart/form-data">
				<h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Listado de Estado Cuota</h1>
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
						$consulta = "select * from estado_cuota";
						$ejecutar = mysqli_query($conexion, $consulta);
						$i = 0;
						while ($Fila = mysqli_fetch_assoc($ejecutar)) {
							$id = $Fila['Idestado_cuota'];
							$no_u = $Fila['Nombrecuota'];
							$i++;
						?>
							<td><?php
								$sub_sql_1 = "SELECT Nombrecuota FROM estado_cuota WHERE Idestado_cuota=" . $id;
								$execute = mysqli_query($conexion, $sub_sql_1);
								$cuota = mysqli_fetch_assoc($execute);
								echo $cuota['Nombrecuota'];
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
					$eliminar = "DELETE FROM estado_cuota WHERE Idestado_cuota='$borrar_id'";
					$ejecutar = mysqli_query($conexion, $eliminar);

					if ($ejecutar) {
						echo "<script>alert('Este estado ha sido eliminado!')</script>";
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