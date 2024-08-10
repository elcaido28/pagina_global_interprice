
<?php
include('TD_reportes3.php');
include('conexion.php');
//mete los datos a un arreglo separandolos al encontrar una coma

$id_fac=$_REQUEST['idf'];


$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(105,60);
$y=$pdf->GetY();
$pdf->SetY($y+2);
$pdf->SetFont('arial','B',12);
// $pdf->SetFillColor(255, 96, 28);
//  $pdf->SetTextColor(255, 255, 255);


$cons="SELECT * FROM facturas where id_facturas='$id_fac' ";
  $ejec=mysqli_query($con,$cons);
  $row=mysqli_fetch_assoc($ejec);
// ############ CABECERA ##########################3
$pdf->SetFont('arial','B',20);
$pdf->Cell(50,10,utf8_decode('Guía(h):'),0,0,'C');
$pdf->SetFont('arial','B',20);
$pdf->Cell(80,10,utf8_decode($row['numero_guia']),1,0,'C');
$pdf->SetFont('arial','B',12);
$pdf->Cell(60,10,utf8_decode("  ".$row['fecha']),0,0,'L');
$pdf->SetLineWidth(1);
$pdf->Line(10,75,200,75);
$pdf->SetLineWidth(0);

$pdf->SetFont('arial','B',12);
$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->Cell(95,6,utf8_decode('REMITENTE:'),0,0,'L');
$pdf->Cell(95,6,utf8_decode('DESTINATARIO'),0,1,'L');
$pdf->SetFont('arial','B',10);
$y=$pdf->GetY();
$pdf->MultiCell(95,5,utf8_decode($row['remitente']),0,'L',0);
$pdf->SetXY(105,$y);
$pdf->MultiCell(95,5,utf8_decode($row['destinatario']),0,'L',0);
$y=$pdf->GetY();
$pdf->MultiCell(95,5,utf8_decode($row['direccion_remitente']),0,'L',0);
$pdf->SetXY(105,$y);
$pdf->MultiCell(95,5,utf8_decode($row['direccion_destinatario']),0,'L',0);
$pdf->Cell(95,6,utf8_decode($row['cedula_remitente']),0,0,'L');
$pdf->Cell(95,6,utf8_decode($row['cedula_destinatario']),0,1,'L');
$pdf->Cell(95,6,utf8_decode('Estados Unidos'),0,0,'L');
$pdf->Cell(95,6,utf8_decode('Ecuador'),0,1,'L');


// ################### CUERPO ##########################3
$pdf->SetY(130);
$pdf->SetFont('arial','B',10);
$pdf->Cell(25,13,utf8_decode('BULTOS'),1,0,'C');
$pdf->Cell(20,13,utf8_decode('U.F.'),1,0,'C');
$pdf->Cell(100,13,utf8_decode('DESCRIPCTIÓN'),1,0,'C');
$pdf->Cell(20,13,utf8_decode('PESO[Kg]'),1,0,'C');
$pdf->Cell(25,13,utf8_decode('VALOR $'),1,1,'C');
$pdf->SetFont('arial','B',7);

$pdf->Line(10,130,10,180);
$pdf->Line(35,130,35,180);
$pdf->Line(55,130,55,180);
$pdf->Line(155,130,155,180);
$pdf->Line(175,130,175,180);
$pdf->Line(200,130,200,180);
$pdf->Line(10,180,200,180);



$pdf->Cell(25,10,utf8_decode($row['piezas']),0,0,'C');
$pdf->Cell(25,10,utf8_decode($row['unidades']),0,0,'C');
$y=$pdf->GetY();
$pdf->MultiCell(70,5,utf8_decode($row['descripcion']),0,'L',0);
$pdf->SetXY(155,$y);
$pdf->Cell(25,10,utf8_decode($row['peso']),0,0,'C');
$pdf->Cell(25,10,utf8_decode($row['valor_fob']),0,1,'C');

$pdf->SetFont('arial','B',10);
$pdf->SetXY(125,180);
$pdf->Cell(50,10,utf8_decode('TOTAL:'),0,0,'C');
$pdf->SetFont('arial','B',8);
$pdf->Cell(25,10,utf8_decode('$       '.$row['valor_fob']),0,1,'C');

$pdf->Cell(175,20,utf8_decode(''),0,1,'C');

$y=$pdf->GetY();
$pdf->SetXY(70,$y+10);
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,10,utf8_decode('REMITENTE'),'T',1,'C');
$pdf->Cell(190,5,utf8_decode('Doy fé que lo declarado en el presente documento es valido'),0,1,'C');

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
