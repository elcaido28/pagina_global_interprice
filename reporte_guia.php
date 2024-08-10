
<?php
include('TD_reportes2.php');
include('conexion.php');
include('barcode.php');
//mete los datos a un arreglo separandolos al encontrar una coma

$id_fac=$_REQUEST['idf'];


$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);



$cons="SELECT * FROM facturas where id_facturas='$id_fac' ";
  $ejec=mysqli_query($con,$cons);
  $row=mysqli_fetch_assoc($ejec);
// ############ CABECERA ##########################3
$y=$pdf->GetY();
barcode('codigos/cbarra.png', $row['numero_guia'], 50, 'horizontal', 'code39');
$pdf->Image('codigos/cbarra.png',45,$y+5,70,15);

$pdf->SetXY(110,$y+8);
$pdf->SetFont('arial','B',28);
$pdf->Cell(50,10,utf8_decode('.  '.$row['numero_guia']),0,1,'C');

$y=$pdf->GetY();
$pdf->SetXY(60,$y+10);
$pdf->SetFont('arial','B',12);
$pdf->MultiCell(90,5,utf8_decode($row['remitente']." -  ".$row['direccion_remitente']),0,'C',0);
$y=$pdf->GetY();
$pdf->SetXY(40,115);
$pdf->SetFont('arial','B',10);

$pdf->Cell(130,6,utf8_decode('CONSIGNEE'),0,1,'C');
$pdf->SetFont('arial','',10);
$y=$pdf->GetY();
$pdf->SetXY(40,$y);
$pdf->MultiCell(130,5,utf8_decode($row['destinatario']),0,'C',0);
$y=$pdf->GetY();
$pdf->SetXY(40,$y);
$pdf->MultiCell(130,5,utf8_decode($row['direccion_destinatario']),0,'C',0);
$y=$pdf->GetY();
$pdf->SetXY(40,140);
$pdf->SetFont('arial','B',10);


$pdf->Cell(130,6,utf8_decode('GUAYAQUIL - ECUADOR'),0,1,'C');
$pdf->SetFont('arial','',10);

$pdf->Line(40,114,170,114);
$pdf->Line(40,114,40,146);
$pdf->Line(170,114,170,146);
$pdf->Line(40,146,170,146);

$y=$pdf->GetY();
$pdf->SetXY(40,$y);
$pdf->Cell(130,5,utf8_decode($row['descripcion']),0,1,'l');
$y=$pdf->GetY();
$pdf->SetXY(40,$y);
$pdf->Cell(130,5,utf8_decode('PIEZAS:'.$row['unidades'].', PESO: [Kg: '.$row['peso'].'], VALOR: $ '.$row['valor_fob']),0,1,'l');
$y=$pdf->GetY();
$pdf->SetXY(40,$y);
$pdf->Cell(130,4,utf8_decode(''),'B',1,'l');
$y=$pdf->GetY();
$pdf->SetXY(40,$y+3);
$pdf->Cell(130,5,utf8_decode(' PESO: [Kg: '.$row['peso'].']'),0,1,'l');
$y=$pdf->GetY();
$pdf->SetXY(40,$y);
$pdf->Cell(130,5,utf8_decode('Date: '.$row['fecha']),0,1,'l');


$y=$pdf->GetY();
barcode('codigos/cbarra2.png', $row['numero_guia'].'-'.$row['unidades'], 50, 'horizontal', 'code39');
$pdf->Image('codigos/cbarra2.png',45,$y+5,70,15);

$pdf->SetXY(115,$y+8);
$pdf->SetFont('arial','B',28);
$pdf->Cell(50,10,utf8_decode('.  '.$row['numero_guia'].'-'.$row['unidades']),0,1,'C');





//$pdf->Output();

$pdf->Output('D',$row['numero_guia'].'.pdf');

 ?>
