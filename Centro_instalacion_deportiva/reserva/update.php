<?php
include("../conexiones/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Reserva</title>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS\estiinsert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header>
        <div class="contenedor">
            <div id="marca">
                <h1 style=" font-family: 'Yatra One'">
                    <span class="resaltado">Reserva</span>
                </h1>
            </div>
            <nav>
                <ul style=" font-family: 'Yatra One';font-weight: bold">
                    <li class="actual"><a href="../usuarios\insert.php">USUARIOS</a></li>
                    	<li><a href="../reportes\reportes_con_parametros1.php">INFORMES CON PARAMETROS</a></li>
						<li><a href="../reportes\reportes_sin_parametros.php">INFORMES SIN PARAMETROS</a></li>
						 <li><a href="../salir.php">CERRAR SESION</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>
    <section id="cabecera">
        <div class="contenedor">
            <div id="Mensaje">
                <h1 style=" font-family: 'Yatra One'">Actualizar Reserva</h1>
                <p style=" font-family: 'Yatra One'">En esta página nos permite actualizar los campos correspodientes del socio.
                </p>
                </p>
            </div>
        </div>
    </section>
    <section id="Boletin">
        <div class="contenedor">
        <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:50px; font-family: 'Yatra One', cursive;text-align:center">Actualización de Reservas</h1>
        <?php
            if (isset($_GET['actualizar'])) {
                $editar_id = $_GET['actualizar'];
                $consulta = " SELECT * FROM reserva WHERE Idreserva='$editar_id'";
                $ejecutar = mysqli_query($conexion, $consulta);
                $fila = mysqli_fetch_assoc($ejecutar);
                $idr = $fila["Idreserva"];
                $ids = $fila["Idsocio"];
                $hi = $fila["Hora_inicio"];
                $hf = $fila["Hora_fin"];
                $total = $fila["Total_horas"];
            }
            ?>
            <form class="form-register" method="POST" action="" enctype="multipart/form-data">
            <h3 style="color:#E85D04">RESERVA</h3>
            <label>Seleccione Socio: </label>
            <select class="controls" style="color:black" name="selectsocio">
            <?php
            $sql = "SELECT * FROM socio s, reserva r WHERE s.Idsocio = r.Idsocio AND r.Idreserva = '$editar_id'";
            $ejecutar = mysqli_query($conexion, $sql);
            while($res = mysqli_fetch_assoc($ejecutar)){
                $seleccionando = $res['Idsocio'];
                echo "<option value = '".$res['Idsocio']."'>".$res['Nombre']."</option value>";
            }
            $sql = "SELECT * FROM socio s WHERE s.Idsocio <> '$seleccionando'";
            $ejecutar = mysqli_query($conexion, $sql);
            while($res = mysqli_fetch_assoc($ejecutar)){
                echo "<option value = '".$res['Idsocio']."'>".$res['Nombre']."</option value>";
            }            
            ?>
            </select>
            <br><br>
            <label>Hora Inicio: </label>
                <input class="controls" type="time" style="color:black"; name="txthorainicio" value="<?php echo $hi; ?>"><br>
            <br>
            <label>Hora Final: </label>
                <input class="controls" type="time" style="color:black"; name="txthorafin" value="<?php echo $hf; ?>"><br><br>
                <label>Total Horas: </label>
                <input class="controls" type="text" style="color:black"; name="txttotal" value="<?php echo $total; ?>"><br><br>
                <input class="botons"  type="submit" name="actualizar" value="Actualizar Datos">
            </form>
            <?php
		if (isset($_POST['actualizar'])){
		if('txtFoto'){
			$editar_id = $_GET['actualizar'];
				$idm = $_POST['txtidreserva'];
				$ids = $_POST['selectsocio'];
				$horai = $_POST['txthorainicio'];
			    $horaf = $_POST['txthorafin'];
                $total = $_POST['txttotal'];
				$actualizar= "UPDATE reserva SET Idsocio='$ids', Hora_inicio='$horai', Hora_fin='$horaf', Total_horas='$total' WHERE Idreserva=$editar_id";
				echo $actualizar;
				$ejecutar= mysqli_query($conexion, $actualizar) or die(mysqli_error());	

  			$id=$editar_id;
  		
		}	
		
		else{
		$nombresocio=$_POST['txtNombre'];
		$actualizar="UPDATE socio SET Nombre='$nombresocio' WHERE Id'$editar_id'";
		$ejecutar= mysqli_query($conexion, $actualizar) or die(mysqli_error());
		}
			echo "<script>alert('Datos Actualizados correctamente')</script>";
			echo "<script>window.open('select.php','_self')</script>";
	}	
	?>
    </div>
    <center>
    </form>
        </div>
        </section>
        <br><br>
        <footer>
            <p>Servicio Nacional de Aprendizaje - SENA ADSI 2056751 - Luisa Fernanda Santos Astroz</p>
        </footer>
</body>

</html>