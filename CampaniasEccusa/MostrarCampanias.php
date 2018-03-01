<?php
include ('../conexion/conexion.php');
session_start();


if (isset($_POST['enviar']))
{
  $mostrar=$_POST['mostrar'];
  header("location: detall.php?fbid=$mostrar");
}else{
  $mostrar = $_GET["mostrar"];
  header("location: detall.php?fbid=$mostrar");
}

?>
