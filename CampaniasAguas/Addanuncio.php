<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{

        $idcampania=$_POST['idcampania'];
        $formatotema=$_POST['formatotema'];
        $Ad_unit_type=$_POST['Ad_unit_type'];
        if(empty($_POST['video_length'])){
          $video_length=200;
        }else {
          $video_length=$_POST['video_length'];
        }
        $Inicio_anuncio=$_POST['Inicio_anuncio'];
        if(empty($_POST['Fin_anuncio'])){
            $Fin_anuncio='';
        }else {
          $Fin_anuncio=$_POST['Fin_anuncio'];
        }
        if(empty($_POST['Identificador'])){
          $Identificador='';
        }else {
          $Identificador=$_POST['Identificador'];
        }
        if(empty($_POST['inversion'])){
          $inversion='NULL';
        }else {
          $inversion=$_POST['inversion'];
        }
        if(empty($_POST['link'])){
          $link='';
        }else {
          $link=$_POST['link'];
        }

        echo $idcampania;

        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT COA_FACEBOOK, rty_nombre
                FROM conjunto_anuncios, rate_type
                WHERE coa_id = $idcampania and COA_RATETYPE = rty_id";
        //echo $sql;
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
            $fb =  $result['COA_FACEBOOK'];
            $rate_type =  $result['rty_nombre'];

            }
        }

        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT tob_nombre
                FROM facebook, tipo_objetivo
                WHERE fb_id = $fb and fb_objetivo = tob_id";
        echo $sql;
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $objetivo =  $result['tob_nombre'];

            }
        }


        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        //AdUnitType | Objetivo | rate_type | video_length | Inicio_anuncio - Fin_anuncio - Tipo formato - texto libre
        $sql = "SELECT concat(AUT_nombre,' | ','$objetivo',' | ','$rate_type',' | ',VLE_nombre,' | ','$Inicio_anuncio',' - ',tfo_nombre,' - ','$Identificador') as nombrecampania
                FROM tipo_formato, ad_unit_type, video_length
                WHERE tfo_id = '$formatotema'
                and AUT_id= '$Ad_unit_type'
                and VLE_id= '$video_length'";
        //echo $sql;
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $salida =  $result['nombrecampania'];

            }
        }

        $sql = "INSERT INTO anuncios(ANU_FACEBOOK, ANU_FORMATOTEMA, ANU_AUT, ANU_VIDEOLENGTH, ANU_INIDATE, ANU_FINDATE, ANU_INVERSION, ANU_LINK, ANU_NOMBRE)
                      VALUES  ($idcampania, $formatotema, $Ad_unit_type, $video_length, '$Inicio_anuncio', '$Fin_anuncio',$inversion, '$link', '$salida')";             //camp_id es auto increment, por lo que no se agrega
        echo $sql;
        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            echo $mostrar;
            header("location: anuncios.php?mensaje=$salida");

        }
        else
        {
            echo 'Error: '.mysqli_error($con);
        }

}
?>
