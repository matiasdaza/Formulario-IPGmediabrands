<?php
include ('../conexion/conexion.php');
session_start();


if (isset($_POST['enviar']))
{
        $idcampania=$_POST['idcampania'];
        echo $idcampania;
        header("location: AWdetalle.php?idcampania=$idcampania");
}
?>
