<?php
	include ('../conexion/conexion.php');
	session_start();

	$id=$_POST['enviar'];
	//echo $id;
	$con = new mysqli($servidor, $usuario, $password, $bd);
	$con->set_charset("utf8");
	global $con;
	$sql = "SELECT anu_inidate
					FROM anuncios
					where anu_id = $id;";
					//echo $sql;
	$respuesta = $con -> query($sql);
	$filas = mysqli_num_rows($respuesta);
	if($filas > 0)
	{
			while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
		{
					$idate =  $result['anu_inidate'];
			}
	}
	if(empty($_POST['Inicio_anuncio'])){
		$Inicio_anuncio=	$idate;
	}else{
		$Inicio_anuncio=$_POST['Inicio_anuncio'];
	}
	//TEST

	$sql = "SELECT anu_nombre
					FROM anuncios
					where anu_id = $id;";
	//echo $sql;
	$respuesta = $con -> query($sql);
	$filas = mysqli_num_rows($respuesta);
	if($filas > 0)
	{
			while($result = $respuesta -> fetch_assoc()) //fetch_assoc() = devuelve un arreglo asociativo con el row en el que se encuentre
		{
					$nombre =  $result['anu_nombre'];
					//echo $nombre."<br>";
			}
	}

	$nombreCortado = explode("|", $nombre);
	//AdUnitType | Objetivo | rate_type | video_length | Inicio_anuncio - Tipo formato - texto libre
	$AdUnitType = $nombreCortado[0]; // AdUnitType
	$objetivo = $nombreCortado[1]; // Objetivo
	$rate_type = $nombreCortado[2]; // rate_type
	$video_length = $nombreCortado[3]; // video_length
	$Identificador = $nombreCortado[4]; //Texto libre

	$identificadorCortado = explode(" ", $Identificador);
	$salida = $Inicio_anuncio." - ".$identificadorCortado[3]." - ".$identificadorCortado[5];

	$nombreFinal = $AdUnitType."|".$objetivo."|".$rate_type."|".$video_length."| ".$salida;
	//FIN TEST
	if (isset($_POST['enviar'])){
		$sql="UPDATE anuncios
					SET anu_inidate='$Inicio_anuncio', anu_nombre = '$nombreFinal'
					where anu_id = $id";


		if($con -> query($sql)) //$con -> query($sql) = True or false
        {
            header("location: AdminFacebook.php?mensaje=$nombreFinal");

        }
        else
        {
            //echo '<br/><br/><br/>La sugerencia no fue ingresada, intente nuevamente. Error: '.mysqli_error($con);
            //header('location: agregar_falta_r.php');
        }
	}
?>
