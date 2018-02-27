<?php
include ('../conexion/conexion.php');
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>



    <?php
    $fbid = $_GET["idcampania"];
   $con = new mysqli($servidor, $usuario, $password, $bd);
   $con->set_charset("utf8");
   global $con;
   $sql = "SELECT adw_nombre FROM adwords where adw_id = $fbid;";
   $respuesta = $con -> query($sql);
   $filas = mysqli_num_rows($respuesta);
   if($filas > 0)
   {
       while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
     {
           $salida =  $result['adw_nombre'];
       }
   }

    echo "<h2> Campaña:".$salida." </h2>";?>

    <?php
   $con = new mysqli($servidor, $usuario, $password, $bd);
   $con->set_charset("utf8");
   global $con;
   $sql = "SELECT COUNT(adw_id) as count FROM adwords";
   $respuesta = $con -> query($sql);
   $filas = mysqli_num_rows($respuesta);
   if($filas > 0)
   {
       while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
     {
           $salida =  $result['count'];
       }
   }

    ?>
    <label>Detalle de la campaña: </label>

      <?php
        $con = new mysqli($servidor, $usuario, $password, $bd);
        if ($con->connect_errno) {
           printf("Connect failed: %s\n", $con->connect_error);
           exit();
       }
        global $con;
        $sql = "SELECT adw_id, camp_nombre, tma_nombre, red_nombre, can_nombre, tob_nombre,
        adw_ordenes, rty_nombre, adw_idate, adw_fdate, gen_nombre, adw_redad, adw_segmentacion, adw_frec, adw_frecdias, dis_nombre, adw_inversion
                 FROM adwords, campania, tipo_marca, red, canal, tipo_objetivo, Rate_type, genero, dispositivo
                 WHERE adw_id = $fbid and ADW_CAMPANIA = camp_id and ADW_MARCA = tma_id and adw_red = red_id and ADW_CANAL = can_id and ADW_OBJETIVO = tob_id
                 and adw_rty = rty_id and adw_genero and gen_id and adw_dispositivo = dis_id
                 group by adw_id desc;";
        if($result = $con->query($sql)){
          while($row = $result->fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
            echo "<table id='example2' class='table table-bordered table-hover' border='1'>";
            echo "<thead>";
            echo "<tr>";
              echo "<th>ID</th>";
              echo "<th>Campaña</th>";
              echo "<th>Marca</th>";
              echo "<th>Red</th>";
              echo "<th>Canal</th>";
              echo "<th>Objetivos</th>";
              echo "<th>Ordenes</th>";
              echo "<th>Rate_type</th>";
              echo "<th>Ini_conjunto_anun: </th>";
              echo "<th>Fin_conjunto_anun: </th>";
              echo "<th>Género: </th>";
              echo "<th>Rango de edad: </th>";
              echo "<th>Segmentación: </th>";
              echo "<th>Frecuencia: </th>";
              echo "<th>Frecuencia por días: </th>";
              echo "<th>Dispositivo: </th>";
              echo "<th>Inversión: </th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            echo "<tr>";
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
               echo "<tr>";
               echo "<td>", $row["adw_id"],"</td>" ;
               echo "<td>", $row["camp_nombre"],"</td>" ;
               echo "<td>", $row["tma_nombre"], "</td>";
               echo "<td>", $row["red_nombre"], "</td>";
               echo "<td>", $row["can_nombre"], "</td>";
               echo "<td>", $row["tob_nombre"], "</td>";
               echo "<td>", $row["adw_ordenes"], "</td>";
               echo "<td>", $row["rty_nombre"], "</td>";
               echo "<td>", $row["adw_idate"], "</td>";
               echo "<td>", $row["adw_fdate"], "</td>";
               echo "<td>", $row["gen_nombre"], "</td>";
               echo "<td>", $row["adw_redad"], "</td>";
               echo "<td>", $row["adw_segmentacion"], "</td>";
               echo "<td>", $row["adw_frec"], "</td>";
               echo "<td>", $row["adw_frecdias"], "</td>";
               echo "<td>", $row["dis_nombre"], "</td>";
               echo "<td>", $row["adw_inversion"], "</td>";

               echo "</tr>";
               echo "</tbody>
             </table>";
            }
        }
      ?>


    <br><br>

    <?php
   $con = new mysqli($servidor, $usuario, $password, $bd);
   $con->set_charset("utf8");
   global $con;
   $sql = "SELECT count(AAW_ID) as count from anunciosaw, adwords where AAW_ADWORDS = $fbid and adw_id = AAW_ADWORDS";
   $respuesta = $con -> query($sql);
   $filas = mysqli_num_rows($respuesta);
   if($filas > 0)
   {
       while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
     {
           $salida =  $result['count'];
       }
   }

    echo "Tiene: ".$salida." Anuncios";
    echo "<br><br>";
    ?>
    <label>Anuncios: </label>
    <?php

        $con = new mysqli($servidor, $usuario, $password, $bd);
        if ($con->connect_errno) {
           printf("Connect failed: %s\n", $con->connect_error);
           exit();
       }
        global $con;
        $sql = "SELECT AAW_ID, AAW_NOMBREVIDEO, VLE_NOMBRE, aaw_nombre
        FROM anunciosaw, video_length
        WHERE AAW_ADWORDS = $fbid AND AAW_VIDEOLENGTH = VLE_ID GROUP BY AAW_ID DESC ";
        if($result = $con->query($sql)){
          while($row = $result->fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {

            echo "<h2>",$row["aaw_nombre"],"</h2>";
            echo "<table id='example2' class='table table-bordered table-hover ' border='1'>";
            echo "<thead>";
            echo "<tr>";
              echo "<th>ID</th>";
              echo "<th>Nombre de video</th>";
              echo "<th>Video length</th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            echo "<tr>";
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
               echo "<tr>";
               echo "<td>", $row["AAW_ID"],"</td>" ;
               echo "<td>", $row["AAW_NOMBREVIDEO"],"</td>" ;
               echo "<td>", $row["VLE_NOMBRE"], "</td>";
               echo "</tr>";
               echo "</tbody>
             </table>";
            }
        }
      ?>




  </body>
</html>
