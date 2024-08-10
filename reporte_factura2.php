
<?php
include('TD_reportes.php');
include('conexion.php');
//mete los datos a un arreglo separandolos al encontrar una coma

$id_fac=$_REQUEST['idf'];


$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+20);
$pdf->SetFont('arial','B',12);
// $pdf->SetFillColor(255, 96, 28);
//  $pdf->SetTextColor(255, 255, 255);


$cons="SELECT * FROM todas_facturas where id_todas_facturas='$id_fac' ";
  $ejec=mysqli_query($con,$cons);
  $row=mysqli_fetch_assoc($ejec);
// ############ CABECERA ##########################3
$pdf->Cell(95,6,utf8_decode('EXPORT DATE (Fecha Exportación)'),'LTR',0,'L');
$pdf->Cell(95,6,utf8_decode('AWB SKY BILL'),'LTR',1,'C');
$pdf->SetFont('arial','',10);
$pdf->Cell(95,6,utf8_decode($row['fecha']),'LBR',0,'L');
$pdf->Cell(95,6,utf8_decode($row['numero_guia']),'LBR',1,'C');

$pdf->SetFont('arial','B',12);
$pdf->Cell(95,6,utf8_decode('SHIPPER / REMITENTE'),'LTR',0,'L');
$pdf->Cell(95,6,utf8_decode('IMPORTER (If Other than consignee'),'LTR',1,'L');
$pdf->SetFont('arial','',10);
$pdf->Cell(95,6,utf8_decode($row['remitente']),'LBR',0,'L');
$pdf->Cell(95,6,utf8_decode($row['destinatario']),'LBR',1,'L');

$pdf->SetFont('arial','B',12);
$pdf->Cell(95,6,utf8_decode('COUNTRY ORIGIN OF GOODS'),'LTR',0,'L');
$pdf->Cell(95,6,utf8_decode(''),'LTR',1,'C');
$pdf->SetFont('arial','B',12);
$pdf->Cell(95,6,utf8_decode('(País de origen)'),'LR',0,'L');
$pdf->Cell(95,6,utf8_decode(''),'LR',1,'C');
$pdf->Cell(95,6,utf8_decode('USA'),'LR',0,'L');
$pdf->Cell(95,6,utf8_decode(''),'LR',1,'C');
$pdf->SetFont('arial','B',12);
$pdf->Cell(95,6,utf8_decode('COUNTRY DESTINATION OF GOODS'),'LR',0,'L');
$pdf->Cell(95,6,utf8_decode(''),'LR',1,'C');
$pdf->SetFont('arial','B',12);
$pdf->Cell(95,6,utf8_decode('(País de destino)'),'LR',0,'L');
$pdf->Cell(95,6,utf8_decode(''),'LR',1,'C');
$pdf->Cell(95,6,utf8_decode('ECUADOR'),'LBR',0,'L');
$pdf->Cell(95,6,utf8_decode(''),'LBR',1,'C');
$pdf->Cell(25,2,utf8_decode(''),0,1,'C');
// ################### CUERPO ##########################3
$pdf->SetFont('arial','B',8);
$pdf->Cell(25,8,utf8_decode('Nº OF PKGB'),'LTR',0,'C');
$pdf->Cell(70,8,utf8_decode('COMPLETE DESCRIPCTION OF GOODS'),'LTR',0,'C');
$pdf->Cell(20,8,utf8_decode('WEIGHT'),'LTR',0,'C');
$pdf->Cell(25,8,utf8_decode('QUANTITY'),'LTR',0,'C');
$pdf->Cell(25,8,utf8_decode('UNIT VALUE $'),'LTR',0,'C');
$pdf->Cell(25,8,utf8_decode('TOTAL VALUE $'),'LTR',1,'C');
$pdf->SetFont('arial','B',7);
$pdf->Cell(25,5,utf8_decode('(Nº de envios)'),'LBR',0,'C');
$pdf->Cell(70,5,utf8_decode('(descripción completa)'),'LBR',0,'C');
$pdf->Cell(20,5,utf8_decode('(peso)'),'LBR',0,'C');
$pdf->Cell(25,5,utf8_decode('(cantidad)'),'LBR',0,'C');
$pdf->Cell(25,5,utf8_decode('(valor unitario)'),'LBR',0,'C');
$pdf->Cell(25,5,utf8_decode('(valor total)'),'LBR',1,'C');


$pdf->Line(10,122,10,220);
$pdf->Line(35,122,35,220);
$pdf->Line(105,122,105,220);
$pdf->Line(125,122,125,220);
$pdf->Line(150,122,150,220);
$pdf->Line(175,122,175,220);
$pdf->Line(200,122,200,220);
$pdf->Line(10,220,200,220);



$pdf->Cell(25,10,utf8_decode($row['piezas']),0,0,'C');
$y=$pdf->GetY();
$pdf->MultiCell(70,5,utf8_decode($row['descripcion']),0,'L',0);
$pdf->SetXY(105,$y);
$pdf->Cell(20,10,utf8_decode($row['peso']),0,0,'C');
$pdf->Cell(25,10,utf8_decode($row['unidades']),0,0,'C');
$pdf->Cell(25,10,utf8_decode($row['valor_fob']),0,0,'C');
$pdf->Cell(25,10,utf8_decode($row['valor_fob']),0,1,'C');

$pdf->SetFont('arial','B',10);
$pdf->SetXY(125,220);
$pdf->Cell(50,10,utf8_decode('TOTAL'),1,0,'C');
$pdf->SetFont('arial','B',8);
$pdf->Cell(25,10,utf8_decode('$       '.$row['valor_fob']),1,1,'C');

$pdf->Cell(175,20,utf8_decode(''),0,1,'C');
$pdf->SetFont('arial','B',8);
$pdf->Cell(165,5,utf8_decode('THESE COMODITIES ARE LICENSED FOR THE ULTIMATE DESTINATION SHOWN DIVERSION CONTRARY TO THE '),0,1,'L');
$pdf->Cell(165,5,utf8_decode('UNITED STATES LAW IS PROHIBITED.'),0,1,'L');
$pdf->SetFont('arial','B',7);
$pdf->Cell(165,5,utf8_decode('(Estos envíos están autorizados para el destino indicado. Cambios contrarios a las leyes Americanas están Prohibidos).'),0,1,'L');
$pdf->SetFont('arial','B',8);
$pdf->Cell(165,5,utf8_decode('I DECLARE THAT ALL INFORMATION CONTAINED IN THIS INVOICE TO BE TRUE AND CORRECT.'),0,1,'L');
$pdf->SetFont('arial','B',7);
$pdf->Cell(165,5,utf8_decode('(Declaro que toda la información contenida es verdad).'),0,1,'L');


// while($row5=mysqli_fetch_array($consulta)){
//
// $pdf->Cell(30,10,utf8_decode($row5['numero_parcela']),1,0,'C');
// $pdf->Cell(30,10,utf8_decode($row5['fecha_plantacion']),1,0,'C');
// $pdf->Cell(100,10,utf8_decode($row5['descripcion']),1,0,'C');
// $pdf->Cell(30,10,utf8_decode($row5['estado']),1,1,'C');
//
//
// }
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/

//$pdf->Output();

$pdf->Output('D',$row['numero_guia'].'.pdf');

 ?>
