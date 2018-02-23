<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{

        $idcampania=$_POST['idcampania'];
        $formatotema=$_POST['formatotema'];
        $Ad_unit_type=$_POST['Ad_unit_type'];
        $video_length=$_POST['video_length'];
        $Inicio_anuncio=$_POST['Inicio_anuncio'];
        $Fin_anuncio=$_POST['Fin_anuncio'];
        $Identificador=$_POST['Identificador'];


        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT concat(tfo_nombre,' | ',AUT_nombre,' | ',VLE_nombre,' | ','$Inicio_anuncio',' | ','$Fin_anuncio',' | ','$Identificador') as nombrecampania
                FROM tipo_formato, ad_unit_type, video_length
                WHERE tfo_id = '$formatotema'
                and AUT_id= '$Ad_unit_type'
                and VLE_id= '$video_length'";
        echo $sql;
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $salida =  $result['nombrecampania'];

            }
        }
        
        $sql = "INSERT INTO anuncios(ANU_FACEBOOK, ANU_FORMATOTEMA, ANU_AUT, ANU_VIDEOLENGTH, ANU_INIDATE, ANU_FINDATE, ANU_NOMBRE)
                    VALUES  ($idcampania, $formatotema, $Ad_unit_type, $video_length, '$Inicio_anuncio', '$Fin_anuncio', '$salida')";
                     //camp_id es auto increment, por lo que no se agrega
        echo $sql;
        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header("location: anuncios.php?mensaje=$salida");

        }
        else
        {
            echo 'Error: '.mysqli_error($con);
        }

}
?>
