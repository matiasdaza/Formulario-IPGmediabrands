<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{
        $idcampania=$_POST['idcampania']; //Id campaña facebook
        $rate_type=$_POST['rate_type'];
        $Inicio_conjunto_anuncio=$_POST['Inicio_conjunto_anuncio'];
        $Fin_conjunto_anuncio=$_POST['Fin_conjunto_anuncio'];
        $genero=$_POST['genero'];
        $edadmin=$_POST['edadmin'];
        $edadmax=$_POST['edadmax'];
        $segmentacion=$_POST['segmentacion'];
        if(empty($_POST['frec'])){
          $frec='NULL';
        }else {
          $frec=$_POST['frec'];
        }
        if(empty($_POST['frecdias'])){
          $frecdias='NULL';
        }else {
          $frecdias=$_POST['frecdias'];
        }
        $dispositivo=$_POST['dispositivo'];
        if(empty($_POST['inversion'])){
          $inversion='NULL';
        }else {
          $inversion=$_POST['inversion'];
        }
        if(empty($_POST['Identificador'])){
          $Identificador='NULL';
        }else {
          $Identificador=$_POST['Identificador'];
        }
        $categoria=4; // Viña y Pisquera tiene id 4

        $con = new mysqli($servidor, $usuario, $password, $bd);
        $con->set_charset("utf8");
        global $con;
        //echo "<p>",$hola=date("Y").date("m").date("d"),"</p>";
        $sql = "SELECT concat(rty_nombre,' | ','$Inicio_conjunto_anuncio',' | ','$Fin_conjunto_anuncio',' | ','$Identificador') as nombreconjanuncio
                FROM rate_type
                WHERE rty_id = '$rate_type'";
        $respuesta = $con -> query($sql);
        $filas = mysqli_num_rows($respuesta);
        if($filas > 0)
        {
            while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
                $salida = $result['nombreconjanuncio'];
            }
        }
        echo $salida;
        $sql = "INSERT INTO CONJUNTO_ANUNCIOS(COA_FACEBOOK, COA_RATETYPE, COA_IDATE , COA_FDATE , COA_GENERO , COA_EDADMIN,	COA_EDADMAX, COA_SEGMENTACION, COA_FREC, COA_FRECDIAS, COA_DISPOSITIVO, COA_INVERSION, COA_NOMBRE, COA_CATEGORIA)
                    VALUES  ($idcampania,$rate_type,'$Inicio_conjunto_anuncio','$Fin_conjunto_anuncio',$genero,$edadmin,$edadmax,'$segmentacion', $frec, $frecdias, $dispositivo, $inversion, '$salida', $categoria)";
                     //camp_id es auto increment, por lo que no se agrega
        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header("location: conjuntoanuncios.php?mensaje=$salida");

        }
        else
        {
            echo 'Error: '.mysqli_error($con);
        }

}
?>
