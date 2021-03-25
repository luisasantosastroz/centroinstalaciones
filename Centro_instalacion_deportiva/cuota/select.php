<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seleccionar Cuota</title>
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
					<span class="resaltado">Cuota</span>
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
				<h1 style=" font-family: 'Yatra One'">Seleccionar Cuota</h1>
				<p style=" font-family: 'Yatra One'">Como vemos en esta sección encontramos la lista de cuotas
					con sus campos correspondientes.
				</p>
			</div>
		</div>
	</section>
	<section id="Boletin">
		<div class="contenedor">
			<form method="POST" action="select.php" method="post" enctype="multipart/form-data">
				<h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Listado de Cuotas</h1>
				<center>
					<table style="font-family: 'Yatra One';font-size:30px">
						<thead>
							<tr align="center">
								<td><b>Nombre Socio</b></td>
								<td><b>Numero Cuotas</b></td>
								<td><b>Monto</b></td>
								<td><b>Fecha Pago</b></td>
								<td><b>Estado Cuota</b></td>
								<td><b>Actualizar</b></td>
								<td><b>Eliminar</b></td>
							</tr>
						</thead>
						<?php
						$consulta = "select * from cuota";
						$ejecutar = mysqli_query($conexion, $consulta);
						$i = 0;
						while ($Fila = mysqli_fetch_assoc($ejecutar)) {
							$idc = $Fila['Idcuota'];
							$ids = $Fila['Idsocio'];
							$numero = $Fila['Numero_cuotas'];
							$monto = $Fila['Monto_cuota'];
							$fecha = $Fila['Fecha_pago'];
							$estado = $Fila['Idestado_cuota'];
							$i++;
						?>
							<td><?php
								$sub_sql_1 = "SELECT Nombre FROM socio WHERE Idsocio=" . $ids;
								$execute = mysqli_query($conexion, $sub_sql_1);
								$socio = mysqli_fetch_assoc($execute);
								echo $socio['Nombre'];
								?>
							</td>
							<td><?php
								$sub_sql_2 = "SELECT Numero_cuotas FROM cuota WHERE Idcuota=" . $idc;
								$execute = mysqli_query($conexion, $sub_sql_2);
								$cuota = mysqli_fetch_assoc($execute);
								echo $cuota['Numero_cuotas'];
								?>
							</td>
							<td><?php
								$sub_sql_3 = "SELECT Monto_cuota FROM cuota WHERE Idcuota=" . $idc;
								$execute = mysqli_query($conexion, $sub_sql_3);
								$cuota = mysqli_fetch_assoc($execute);
								echo $cuota['Monto_cuota'];
								?>
							</td>
							<td><?php
								$sub_sql_4 = "SELECT Fecha_pago FROM cuota WHERE Idcuota=" . $idc;
								$execute = mysqli_query($conexion, $sub_sql_4);
								$cuota = mysqli_fetch_assoc($execute);
								echo $cuota['Fecha_pago'];
								?>
							</td>
							<td><?php
								$sub_sql_5 = "SELECT Nombrecuota FROM estado_cuota WHERE Idestado_cuota=" . $estado;
								$execute = mysqli_query($conexion, $sub_sql_5);
								$cuota = mysqli_fetch_assoc($execute);
								echo $cuota['Nombrecuota'];
								?>
							</td>
							<td>
								<a style="color:#E63946" href="update.php?actualizar=<?php echo $idc; ?>"> Actualizar
								</a>
							</td>
							<td>
								<a style="color:#E63946" href="select.php?eliminar=<?php echo $idc; ?>"> Eliminar
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
					$eliminar = "DELETE FROM cuota WHERE Idcuota='$borrar_id'";
					$ejecutar = mysqli_query($conexion, $eliminar);

					if ($ejecutar) {
						echo "<script>alert('Esta cuota ha sido eliminada!')</script>";
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