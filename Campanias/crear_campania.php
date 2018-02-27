<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{
        $nombrecampania=$_POST['nombrecampania'];
        $FechaInicio=$_POST['FechaInicio'];
        $FechaFin=$_POST['FechaFin'];

        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        $sql = "SELECT concat(DATE_FORMAT('$FechaInicio', '%b'), DATE_FORMAT('$FechaInicio', '%y')) as concat";
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $FechaInicioCorta =  $result['concat'];

            }
        }

        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        $sql = "SELECT concat(DATE_FORMAT('$FechaFin', '%b'), DATE_FORMAT('$FechaFin', '%y')) as concat";
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $FechaFinCorta =  $result['concat'];

            }
        }

        $nombre= "{$nombrecampania} | {$FechaInicioCorta} | {$FechaFinCorta}";

        $sql = "INSERT INTO campania(CAMP_NOMBRE,	CAMP_FINICIO,	CAMP_FFIN, CAMP_NOMBRECAMPANIA)
                    VALUES  ('$nombrecampania','$FechaInicio','$FechaFin', '$nombre')";
                     //camp_id es auto increment, por lo que no se agrega
        echo $sql;
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
