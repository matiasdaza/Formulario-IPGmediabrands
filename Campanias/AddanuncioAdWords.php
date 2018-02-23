<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{

        $idcampania=$_POST['idcampania'];
        $nombrecampania=$_POST['nombrecampania'];
        $video_length=$_POST['video_length'];
        $Identificador=$_POST['Identificador'];

        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT concat('$nombrecampania',' | ',VLE_nombre,' | ', '$Identificador') as nombrecampania
                FROM video_length
                WHERE VLE_id= '$video_length'";

        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $salida =  $result['nombrecampania'];

            }
        }
        $sql = "INSERT INTO anunciosaw(AAW_ADWORDS, AAW_NOMBREVIDEO, AAW_VIDEOLENGTH, AAW_NOMBRE)
                    VALUES  ($idcampania, '$nombrecampania', $video_length, '$salida')";
                     //camp_id es auto increment, por lo que no se agrega
        echo $sql;
        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header("location: AWMostrarCampanias.php?mensaje=$idcampania");

        }
        else
        {
            echo 'Error: '.mysqli_error($con);
        }
}
?>
