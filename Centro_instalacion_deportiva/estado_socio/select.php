<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seleccionar Estado Socio</title>
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
					<span class="resaltado">Estado Socio</span>
				</h1>
			</div>
			<nav>
				<ul style=" font-family: 'Yatra One';font-weight: bold">
					<li class="actual"><a href="insert.php">Estado Socio</a></li>
					<li><a href="../socio/insert.php">Socio</a></li>
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
				<h1 style=" font-family: 'Yatra One'">Seleccionar Estado Socio</h1>
				<p style=" font-family: 'Yatra One'">Como vemos en esta sección encontramos la lista de estados
					que puede contener un socio por lo tanto solo está el nombre.
				</p>
			</div>
		</div>
	</section>
	<section id="Boletin">
		<div id="tablas">
			<div class="contenedor">
				<form method="POST" action="select.php" method="post" enctype="multipart/form-data">
					<h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Listado de Estado Socio</h1>
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
							$consulta = "select * from estado_socio";
							$ejecutar = mysqli_query($conexion, $consulta);
							$i = 0;
							while ($Fila = mysqli_fetch_assoc($ejecutar)) {
								$id = $Fila['Idestado_socio'];
								$no_u = $Fila['Nombre_estadosocio'];
								$i++;
							?>
								<td><?php
									$sub_sql_1 = "SELECT Nombre_estadosocio FROM estado_socio WHERE Idestado_socio=" . $id;
									$execute = mysqli_query($conexion, $sub_sql_1);
									$usuario = mysqli_fetch_assoc($execute);
									echo $usuario['Nombre_estadosocio'];
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
						$eliminar = "DELETE FROM estado_socio WHERE Idestado_socio='$borrar_id'";
						$ejecutar = mysqli_query($conexion, $eliminar);

						if ($ejecutar) {
							echo "<script>alert('Este estado ha sido eliminado!')</script>";
							echo "<script>window.open('select.php','_self')</script>";
						}
					}
					?>
			</div>
		</div>
		</form>
	</section>
	<footer>
		<p>CENTRO DE INSTALACIONES DEPORTIVAS</p>
	</footer>
</body>

</html>