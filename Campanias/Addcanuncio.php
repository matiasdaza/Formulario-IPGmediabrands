<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{
        $idcampania=$_POST['idcampania'];
        $rate_type=$_POST['rate_type'];
        $Inicio_conjunto_anuncio=$_POST['Inicio_conjunto_anuncio'];
        $Fin_conjunto_anuncio=$_POST['Fin_conjunto_anuncio'];
        $genero=$_POST['genero'];
        $edadmin=$_POST['edadmin'];
        $edadmax=$_POST['edadmax'];
        $segmentacion=$_POST['segmentacion'];
        $edadmax=$_POST['frec'];
        $edadmax=$_POST['frecdias'];
        $dispositivo=$_POST['dispositivo'];

        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT concat(rty_nombre,' | ','$Inicio_conjunto_anuncio',' | ','$Fin_conjunto_anuncio') as nombreconjanuncio
                FROM rate_type
                WHERE rty_id = '$rate_type'";
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                echo $result['nombreconjanuncio'];
            }
        }

}
?>
