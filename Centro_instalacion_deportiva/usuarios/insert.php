<?php
session_start();
$Rol=$_SESSION['Rol'];
if($Rol!=1 && $Rol!=7){
	$_SESSION['Error']='Sin permiso para ingresar';
	echo "<script>alert('error')</script>";
	echo "<script>window.open('../bienvenidos.php','_self')</script>";
}
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Insertar Usuario</title>
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
					<p style=" font-family: 'Yatra One'">Si desea agregar un nuevo usuario abajo están las opciones
					para insertar lo que es tanto el nombre, email, contraseña y el rol.
					</p>
				</div>
			</div>
		</section>
		<section id="Boletin">
			<div class="contenedor">
			<h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Inserción de Datos</h1>
				<form class="form-register" name="form" action="insert.php" method="post" enctype="multipart/form-data">
					<h3>Ingrese los datos del usuario</h3><br><br>
					<h3 style="text-align: justify;"> Nombre Usuario:</h3>
					<input class="controls" type="text" style="font-size: 150%; color:black;" name="txtNombreUsuario" placeholder="Nombre Usuario">
					<br><br>
					<h3 style="text-align: justify;"> Email:</h3>
					<input class="controls" type="text" style="font-size: 150%; color:black;" name="txtEmail" placeholder="Digite el Email">
					<br><br>
					<h3 style="text-align: justify;"> Contraseña:</h3>
					<input class="controls" type="password" style="font-size: 150%; color:black;" name="txtClave" placeholder="Digite una contraseña">
					<br><br>
					<h3 style="text-align: justify;"> Rol:</h3>
					<select name="selectRol" class="controls" style="color:black">
						<option class="controls" value="0">--</option>
						<?php
						$consulta = "SELECT * FROM rol";
						$ejecutar = mysqli_query($conexion, $consulta);
						while ($res = mysqli_fetch_assoc($ejecutar)) {
							echo "<option value = '" . $res['idrol'] . "'>" . $res['NombreRol'] . "</option>";
						}
						?>
					</select>
					<br><br>
		
					<?php
					if (isset($_POST['Enviar'])) {
						$sql = 'insert into usuario(NombreUsuario,Email,Clave,idrol) values ("' . $_POST['txtNombreUsuario'] . '", "' . $_POST['txtEmail'] . '", "' . $_POST['txtClave'] . '", "' . $_POST['selectRol'] . '")';
						$result = mysqli_query($conexion, $sql) or die(mysqli_error());
						$id = mysqli_insert_id($conexion);
						echo "<script>alert('Datos insertados correctamente')</script>";
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