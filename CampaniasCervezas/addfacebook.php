<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{
        $idcampania=$_POST['idcampania'];
        $idplataforma=$_POST['idplataforma'];
        $idmarca=$_POST['idmarca'];
        $idobjetivo=$_POST['idobjetivo'];
        $idtcompra=$_POST['idtcompra'];
        $ordenes=$_POST['ordenes'];


        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT concat(tpl_nombre,' | Chile | ',tma_nombre,' | ',camp_nombrecampania,' | ',tob_nombre,' | ',tco_nombre,' | ','$ordenes') as nombrecampania
                FROM campania, tipo_plataforma, tipo_marca, tipo_objetivo, tipo_compra
                WHERE CAMP_ID = '$idcampania'
                and tpl_id= '$idplataforma'
                and tma_id= '$idmarca'
                and tob_id= '$idobjetivo'
                and tco_id= '$idtcompra'";
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $salida =  $result['nombrecampania'];
            }
        }
        echo $salida;
        $sql = "INSERT INTO facebook(FB_CAMPANIA, FB_PLATAFORMA, FB_MARCA, FB_OBJETIVO, FB_COMPRA, FB_ORDENES, FB_NOMBRECAMPANIA)
                    VALUES  ($idcampania,$idplataforma,$idmarca,$idobjetivo, $idtcompra, '$ordenes', '$salida')";
                     //camp_id es auto increment, por lo que no se agrega

        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header("location: facebook.php?mensaje=$salida");

        }
        else
        {
            echo 'Error: '.mysqli_error($con);
        }

}
?>
