<?php
	include ('../conexion/conexion.php');
	session_start();

	$id=$_POST['enviar'];
	echo $id;
	$con = new mysqli($servidor, $usuario, $password, $bd);
	$con->set_charset("utf8");
	global $con;
	$sql = "SELECT coa_idate, coa_fdate, coa_inversion
					FROM conjunto_anuncios
					where coa_id = $id;";
					echo $sql;
	$respuesta = $con -> query($sql);
	$filas = mysqli_num_rows($respuesta);
	if($filas > 0)
	{
			while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
		{
					$idate =  $result['coa_idate'];
					$fdate =  $result['coa_fdate'];
					$inversionActual =  $result['coa_inversion'];
			}
	}
	if(empty($_POST['Inicio_conjunto_anuncio'])){
		$Inicio_conjunto_anuncio=	$idate;
	}else{
		$Inicio_conjunto_anuncio=$_POST['Inicio_conjunto_anuncio'];
	}
	if(empty($_POST['Fin_conjunto_anuncio'])){
		$Fin_conjunto_anuncio=$fdate;
	}else{
		$Fin_conjunto_anuncio=$_POST['Fin_conjunto_anuncio'];
	}
	if(empty($_POST['inversion'])){
		$inversion=$inversionActual;
	}else{
		$inversion=$_POST['inversion'];
	}
	if (isset($_POST['enviar'])){
		$sql="UPDATE conjunto_anuncios
					SET coa_idate='$Inicio_conjunto_anuncio', coa_fdate='$Fin_conjunto_anuncio', coa_inversion=$inversion
					where coa_id = $id";
		echo $sql;
		if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header('location: AdminFacebook.php');

        }
        else
        {
            //echo '<br/><br/><br/>La sugerencia no fue ingresada, intente nuevamente. Error: '.mysqli_error($con);
            //header('location: agregar_falta_r.php');
        }
	}
?>
