<?php
	include ('plantilla.php');
	include ('../conexion/conexion.php');
	session_start();
	$fecha=date("Y")."-".date("m")."-".date("d");
	global $con;
    $query = "SELECT ADW_NOMBRE, ADW_ORDENES, ADW_ID  FROM Adwords;";
    $resultado = $con -> query($query);
	$pdf = new PDF();
	$pdf -> AliasNbPages();
	$pdf -> AddPage();
	$pdf -> Ln(25);
	$pdf -> Cell(16, 6, 'Periodo: ', 0, 0, 'C');
	$pdf -> Cell(5, 6, '', 0, 0, 'C');
    if($row = $resultado -> fetch_assoc()){
      $pdf -> SetFont('Arial','', 10); // Fuente, tipo, tamaño
      $pdf -> Cell(20, 6, '2018/02/21', 0, 0, 'C');
      $pdf -> Cell(5, 6, ' al ', 0, 0, 'C');
	  $pdf -> Cell(20, 6, '2018/02/25', 0, 0, 'C');
    }

    $sql = "SELECT ADW_NOMBRE, ADW_ORDENES, ADW_ID  FROM Adwords;";
    $resultado = $con -> query($sql);

	$pdf -> Ln(15);
	$pdf->SetFillColor(232,232,232);
	$pdf -> SetFont('Arial','B', 10); // Fuente, tipo, tamaño
	$pdf -> Cell(110, 10, 'Nombre de campaña', 1, 1, 'C',1); //Ancho de celda, Alto de celda, String a mostrar, Borde 0= sin borde 1=con borde, posición actual 0 es a la derecha 1 es salto de linea , alineación L, C, R, Fondo transparente (false) pintado(true), link.
	//$pdf -> Cell(16, 6, 'Puntaje', 1, 1, 'C',1); //a la última se le agrega el salto de linea
	$pdf -> SetFont('Arial','', 8); // Fuente, tipo, tamaño
	while($row = $resultado->fetch_assoc())
	{

		$pdf -> Cell(110, 10, $row['ADW_NOMBRE'], 1, 1, 'C');
	}
	$pdf->Output('I','ReporteGlobal.pdf');
?>
