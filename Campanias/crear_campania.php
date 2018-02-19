<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{
        $nombrecampania=$_POST['nombrecampania'];
        $FechaInicio=$_POST['FechaInicio'];
        $FechaFin=$_POST['FechaFin'];

        $sql = "INSERT INTO campania(CAMP_NOMBRE,	CAMP_FINICIO,	CAMP_FFIN)
                    VALUES  ('$nombrecampania','$FechaInicio','$FechaFin')";
                     //camp_id es auto increment, por lo que no se agrega
        echo $sql;
        mysqli_query($con, $sql);
        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header('location: campanias.php');

        }
        else
        {
            echo 'Error: '.mysqli_error($con);
        }
}
?>
