<?php
include ('../conexion/conexion.php');
session_start();
?>

<!DOCTYPE html>
<html>
  <head></head>
  <body>

    <?php
   $fbid = $_GET["fbid"];
   $con = new mysqli($servidor, $usuario, $password, $bd);
   $con->set_charset("utf8");
   global $con;
   $sql = "SELECT fb_nombrecampania FROM facebook where fb_id = $fbid;";
   $respuesta = $con -> query($sql);
   $filas = mysqli_num_rows($respuesta);
   if($filas > 0)
   {
       while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
     {
           $salida =  $result['fb_nombrecampania'];
       }
   }

    echo "<h2> Campaña: ".$salida."</h2>";?>

    <?php
   $fbid = $_GET["fbid"];
   $con = new mysqli($servidor, $usuario, $password, $bd);
   $con->set_charset("utf8");
   global $con;
   $sql = "SELECT COUNT(fb_id) as count
   FROM facebook, conjunto_anuncios, rate_type, genero, dispositivo
   where COA_FACEBOOK = $fbid and fb_id = coa_facebook and COA_RATETYPE = rty_id and COA_GENERO = gen_id and COA_DISPOSITIVO = dis_id";
   $respuesta = $con -> query($sql);
   $filas = mysqli_num_rows($respuesta);
   if($filas > 0)
   {
       while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
     {
           $salida =  $result['count'];
       }
   }

    echo "Tiene: ".$salida." conjuntos de anuncios";
    echo "<br><br>";
    ?>
    <label>Conjunto de anuncios: </label>

      <?php
      if(isset($_GET["fbid"])) {
        $fbid = $_GET["fbid"];
        $con = new mysqli($servidor, $usuario, $password, $bd);
        if ($con->connect_errno) {
           printf("Connect failed: %s\n", $con->connect_error);
           exit();
       }
        global $con;
        $sql = "SELECT distinct coa_id, coa_nombre, rty_nombre, coa_idate, coa_fdate, gen_nombre, coa_edadmin, coa_edadmax, COA_SEGMENTACION, COA_FREC, COA_FRECDIAS,  dis_nombre, COA_INVERSION
                FROM facebook, conjunto_anuncios, rate_type, genero, dispositivo
                where COA_FACEBOOK = $fbid and COA_RATETYPE = rty_id and COA_GENERO = gen_id and COA_DISPOSITIVO = dis_id
                group by coa_id desc;";
        if($result = $con->query($sql)){
          while($row = $result->fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {
            echo "<h2>",$row["coa_nombre"],"</h2>";
            echo "<table id='example2' class='table table-bordered table-hover' border='1'>";
            echo "<thead>";
            echo "<tr>";
              echo "<th>ID</th>";
              echo "<th>Rate type</th>";
              echo "<th>Inicio_conjunto_anuncio</th>";
              echo "<th>Fin_conjunto_anuncio</th>";
              echo "<th>Género</th>";
              echo "<th>Edad mínima</th>";
              echo "<th>Edad máxima</th>";
              echo "<th>Segmentación</th>";
              echo "<th>Frecuencia de anuncios</th>";
              echo "<th>Frecuencia en días</th>";
              echo "<th>Dispositivo</th>";
              echo "<th>Inversion</th>";
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
               echo "<td>", $row["coa_id"],"</td>" ;
               echo "<td>", $row["rty_nombre"],"</td>" ;
               echo "<td>", $row["coa_idate"], "</td>";
               echo "<td>", $row["coa_fdate"], "</td>";
               echo "<td>", $row["gen_nombre"], "</td>";
               echo "<td>", $row["coa_edadmin"], "</td>";
               echo "<td>", $row["coa_edadmax"], "</td>";
               echo "<td>", $row["COA_SEGMENTACION"], "</td>";
               echo "<td>", $row["COA_FREC"], "</td>";
               echo "<td>", $row["COA_FRECDIAS"], "</td>";
               echo "<td>", $row["dis_nombre"], "</td>";
               echo "<td>", $row["COA_INVERSION"], "</td>";

               echo "</tr>";
               echo "</tbody>
             </table>";
            }
        }
      }?>


    <br><br>

    <?php
   $fbid = $_GET["fbid"];
   $con = new mysqli($servidor, $usuario, $password, $bd);
   $con->set_charset("utf8");
   global $con;
   $sql = "SELECT count(coa_id) as count
          from anuncios, conjunto_anuncios
          where anu_facebook = coa_id and coa_facebook = $fbid";
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
      if(isset($_GET["fbid"])) {
        $fbid = $_GET["fbid"];
        $con = new mysqli($servidor, $usuario, $password, $bd);
        if ($con->connect_errno) {
           printf("Connect failed: %s\n", $con->connect_error);
           exit();
       }
        global $con;
        $sql = "SELECT DISTINCT anu_id, anu_nombre, tfo_nombre, aut_nombre, vle_nombre, anu_inidate, anu_findate
from anuncios, conjunto_anuncios, tipo_formato, ad_unit_type, video_length
where anu_facebook = coa_id and coa_facebook = $fbid and anu_formatotema = tfo_id and anu_aut = aut_id and anu_videolength = vle_id
group by anu_id desc;";
        if($result = $con->query($sql)){
          while($row = $result->fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
          {

            echo "<h2>",$row["anu_nombre"],"</h2>";
            echo "<table id='example2' class='table table-bordered table-hover ' border='1'>";
            echo "<thead>";
            echo "<tr>";
              echo "<th>ID</th>";
              echo "<th>Formato tema</th>";
              echo "<th>Ad unit type</th>";
              echo "<th>Video length</th>";
              echo "<th>Inicio anuncios</th>";
              echo "<th>Fin Anuncios</th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            echo "<tr>";
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
              echo "<td></td>" ;
               echo "<tr>";
               echo "<td>", $row["anu_id"],"</td>" ;
               echo "<td>", $row["tfo_nombre"],"</td>" ;
               echo "<td>", $row["aut_nombre"], "</td>";
               echo "<td>", $row["vle_nombre"], "</td>";
               echo "<td>", $row["anu_inidate"], "</td>";
               echo "<td>", $row["anu_findate"], "</td>";
               echo "</tr>";
               echo "</tbody>
             </table>";
            }
        }
      }?>




  </body>
</html>
