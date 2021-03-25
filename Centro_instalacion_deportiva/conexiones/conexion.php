<?php
$usuario = "root";//usuario
$contrasena = "";// contraseña
$servidor = "localhost";
$base = "centroinstalaciones_deportivas";
//Error de conexion
$conexion = mysqli_connect($servidor, $usuario, $contrasena) or die ("Error de conexion");
//Error de Base de Datos
$db = mysqli_select_db($conexion, $base) or die ("Error de base de datos");
?>