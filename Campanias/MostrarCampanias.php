<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{
        $monstrar=$_POST['monstar'];
        header("location: detalle.php?fbid=$monstrar");
}
?>
