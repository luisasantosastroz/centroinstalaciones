<?php
session_start();
require_once('conexiones/conexion.php');

if(isset($_POST['txtusu'])){
    $consulta = "select * from usuario where Email = '".$_POST['txtusu']."' and Clave = '".$_POST['contra']."'";
    $sql = mysqli_query($conexion, $consulta);
    $res = mysqli_fetch_assoc($sql);
    $num = mysqli_num_rows($sql);
    $_SESSION['Nombre'] = $res['NombreUsuario'];
    $_SESSION['Rol'] = $res['idrol'];

    if($num!=0){
        header('location:bienvenido.php');
    }
    else{
        $_SESSION['Error'] = "Error de usuario y contraseña";
        header('location:login.php');
    }
}

