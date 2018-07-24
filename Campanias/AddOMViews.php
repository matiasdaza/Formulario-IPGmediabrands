<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{

        $views=$_POST['views'];
        $viewsest=$_POST['viewsest'];
        $Imp=$_POST['Imp'];
        $Impest=$_POST['Impest'];
        $Clicks=$_POST['Clicks'];
        $Clicksest=$_POST['Clicksest'];
        $Inversion=$_POST['Inversion'];
        $R25=$_POST['R25'];
        $R50=$_POST['R50'];
        $R75=$_POST['R75'];
        $R100=$_POST['R100'];

        $sql = "INSERT INTO OM_Campania(OMCamp_nombre,OMCamp_cadreon,OMCamp_medio,OMCamp_TipoCompra,OMCamp_Formato,OMCamp_Inv,OMCamp_FINI,OMCamp_FFIN)
                    VALUES  ('$nombreCampania','$Cadreon','$Medio','$tipo_compra','$plataforma',$Inversion,'$FechaInicio','$FechaFin')";
                     //camp_id es auto increment, por lo que no se agrega
        echo $sql;
        if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            //echo $mostrar;
            header("location: OtrosMedios.php");

        }
        else
        {
            //echo '<br> Error: '.mysqli_error($con);
        }


}
?>
