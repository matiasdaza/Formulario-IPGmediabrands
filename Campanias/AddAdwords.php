<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{
        $idcampania=$_POST['idcampania'];
        $idmarca=$_POST['idmarca'];
        $idobjetivo=$_POST['idobjetivo'];
        $idred=$_POST['idred'];
        $idcanal=$_POST['idcanal'];
        $ordenes=$_POST['ordenes'];
        $rate_type=$_POST['rate_type'];
        $Inicio_conjunto_anuncio=$_POST['Inicio_conjunto_anuncio'];
        $Fin_conjunto_anuncio=$_POST['Fin_conjunto_anuncio'];
        $genero=$_POST['genero'];
        $rangoEdad=$_POST['rangoEdad'];
        $segmentacion=$_POST['segmentacion'];
        $frec=$_POST['frec'];
        $frecdias=$_POST['frecdias'];
        $dispositivo=$_POST['dispositivo'];
        $inversion=$_POST['inversion'];
        $Identificador=$_POST['Identificador'];


        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT concat('Chile | ',tma_nombre,' | ',camp_nombre,' | ',red_nombre,' | ',can_nombre,' | ',tob_nombre,' | ', '$Identificador') as nombrecampania
                FROM campania, tipo_marca, tipo_objetivo, canal, red
                WHERE CAMP_ID = '$idcampania'
                and tma_id= '$idmarca'
                and tob_id= '$idobjetivo'
                and red_id= '$idred'
                and can_id= '$idcanal'";
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $salida =  $result['nombrecampania'];
            }
        }


        $sql = "INSERT INTO adwords(ADW_CAMPANIA, ADW_MARCA, ADW_OBJETIVO , ADW_RED, ADW_CANAL, ADW_ORDENES,
                            ADW_NOMBRE, ADW_RTY, ADW_IDATE, ADW_FDATE, ADW_GENERO, ADW_REDAD, ADW_SEGMENTACION,
                            ADW_FREC, ADW_FRECDIAS, ADW_DISPOSITIVO, ADW_INVERSION)
                    VALUES  ($idcampania,$idmarca,$idobjetivo,$idred, $idcanal, '$ordenes', '$salida', $rate_type, '$Inicio_conjunto_anuncio',
                       '$Fin_conjunto_anuncio', $genero, '$rangoEdad', '$segmentacion', $frec, $frecdias, $dispositivo, $inversion)";
                     //camp_id es auto increment, por lo que no se agrega

        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header("location: adwords.php?mensaje=$salida");
        }
        else
        {
            echo 'Error: '.mysqli_error($con);
        }


}
?>
