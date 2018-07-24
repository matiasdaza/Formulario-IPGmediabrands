<?php
include ('../conexion/conexion.php');
session_start();

if (isset($_POST['enviar']))
{

        $nombreCampania=$_POST['nombreCampania'];
        $Cadreon=$_POST['Cadreon'];
        $Medio=$_POST['Medio'];
        $tipo_compra=$_POST['tipo_compra'];
        $plataforma=$_POST['plataforma'];
        $Inversion=$_POST['Inversion'];
        $FechaInicio=$_POST['FechaInicio'];
        $FechaFin=$_POST['FechaFin'];

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
