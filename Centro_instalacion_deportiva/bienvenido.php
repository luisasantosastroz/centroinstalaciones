<?php
session_start();
require_once('conexiones/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina principal</title>
  <link rel="stylesheet" href="CSS\bienvenido.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<?php
  if (isset($_SESSION["Error"])) {
    $error = $_SESSION["Error"];
    echo "<script> alert('.$error.')</script>";
  }
  if(empty($_SESSION['Nombre'])){
    header('Location: login.php');
  }
  ?>
  <header>
    <h3 style="text-align: center; font-family: 'Yatra One'; font-size:33px; color:black" class="title text-center mb-2"> Bienvenido Señor Usuario:
    <?php
      echo '' . $_SESSION['Nombre'];
      ?><br><br>
      <div class="contenedor">

        <h1 style=" font-family: 'Yatra One';text-align:center">
          <span class="resaltado">APLICACIÓN DE RESERVAS CENTRO DE INSTALACIÓN DEPORTIVA</span>
        </h1>
      </div>
      </div>
  </header>
  <section id="cabecera">
    <div class="contenedor">
      <div id="Mensaje">
        <h1 style=" font-family: 'Yatra One'">APLICACIÓN DE RESERVAS CENTRO DE INSTALACIÓN DEPORTIVA</h1>
        <p style=" font-family: 'Yatra One'">Bienvenid@ a esta página en la cual encontrarás varios puntos de navegación como
          las que aparece aquí abajo.
        </p>
      </div>
    </div>
  </section>
  <BR>
  <section id="cabecera1">
    <div class="contenedor">
    <h1 class="animate__animated animate__backInLeft" style="color:  #360617; font-size:40px; font-family: 'Yatra One', cursive;text-align:center">MENÚ</h1>
    <div style=" font-family: 'Yatra One';" class="row">
<div class="col">
          <a style=" color: #E63946;" href="instalacion/insert.php">INSTALACIÓN</a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="articulo/insert.php">ARTICULO</a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="estado_socio\insert.php">ESTADO SOCIO</a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="estado_cuota/insert.php">ESTADO CUOTA</a>
        </div>
      </div>
      <div style=" font-family: 'Yatra One'" class="row">
      <div class="col">
          <a style=" color: #E63946;" href="ciudad\insert.php">CIUDAD</a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="socio\insert.php">SOCIO</a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="cuota\insert.php">CUOTA</a>
        </div>
        <div  class="col">
          <a style=" color: #E63946" href="reserva/insert.php">RESERVA</a>
        </div>
      </div>
      <div style=" font-family: 'Yatra One'; width: 790px;" class="row">
      <div class="col">
          <a style=" color: #E63946;" href="reserva_instalacion/insert.php">RESERVA_INSTALACION </a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="reserva_instalacion_articulo/insert.php">RESERVA_INSTALACION_ARTICULO</a>
        </div>
      <div class="col">
          <a style=" color: #E63946;" href="roles/insert.php">ROLES</a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="usuarios/insert.php">USUARIOS</a>
        </div>
        <div class="col">
          <a style=" color: #E63946;" href="salir.php">CERRAR SESION</a>
        </div>
  </section>

  <footer>
    <p>CENTRO DE INSTALACIÓN DEPORTIVA</p>
  </footer>
</body>

</html>
