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


        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT concat(tpl_nombre,' | Chile | ',tma_nombre,' | ',camp_nombre,' | ',tob_nombre,' | ',tco_nombre) as nombrecampania
                FROM campania, tipo_plataforma, tipo_marca, tipo_objetivo, tipo_compra
                WHERE CAMP_ID = '$idcampania'
                and tpl_id= '$idplataforma'
                and tma_id= '$idmarca'
                and tob_id= '$idobjetivo'
                and tco_id= '  $idtcompra'";
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                echo $result['nombrecampania'];
            }
        }

}
?>
