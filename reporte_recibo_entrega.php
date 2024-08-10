
<?php

include('conexion.php');
$id_paquete=$_REQUEST['id'];
$estado=$_REQUEST['std'];
if ($estado=="1") {
  $consulta="UPDATE registro_paquetes SET estadop_id='1' WHERE paq_id='$id_paquete'";
  $ejec2=mysqli_query($con,$consulta);
  //header("reporte_recibo_entrega.php?id=$id_paquete");


include('TD_reportes4.php');
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


$cons="SELECT * FROM registro_paquetes RP inner join registro_usuario RU on RU.ru_id=RP.ru_id where RP.paq_id='$id_paquete' ";
  $ejec=mysqli_query($con,$cons);
  $row=mysqli_fetch_assoc($ejec);
// ############ CABECERA ##########################3
$pdf->SetFont('arial','B',20);
$pdf->Cell(50,10,utf8_decode('Guía(h):'),0,0,'C');
$pdf->SetFont('arial','B',20);
$pdf->Cell(80,10,utf8_decode($row['numero_guiaP']),1,0,'C');
$pdf->SetFont('arial','B',12);
$pdf->Cell(60,10,utf8_decode("  ".$row['paq_fecha_ingreso']),0,0,'L');
$pdf->SetLineWidth(1);
$pdf->Line(10,75,200,75);
$pdf->SetLineWidth(0);

$pdf->SetFont('arial','B',12);
$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->Cell(95,6,utf8_decode('DESTINATARIO:'),0,1,'L');
$pdf->SetFont('arial','B',10);

$pdf->MultiCell(150,5,utf8_decode("NOMBRES: ".$row['ru_nombres']." ".$row['ru_apellidos']),0,'L',0);
$pdf->MultiCell(150,5,utf8_decode("DIRECCIÓN: ".$row['ru_direccion']),0,'L',0);
$pdf->Cell(95,6,utf8_decode("CEDULA: ".$row['ru_numero_id']),0,1,'L');
$pdf->Cell(95,6,utf8_decode('Guayaquil - Ecuador'),0,1,'L');


// ################### CUERPO ##########################3
$pdf->SetY(110);
$pdf->SetFont('arial','B',10);

$pdf->Cell(190,8,utf8_decode('DESCRIPCTIÓN'),1,1,'C');

$pdf->SetFont('arial','B',7);

$pdf->MultiCell(190,5,utf8_decode($row['paq_nombre']),'LRB','L',0);


$y=$pdf->GetY();
$pdf->SetXY(50,$y+20);
$pdf->SetFont('arial','B',12);
$pdf->Cell(50,10,utf8_decode('Recibi conforme'),'T',0,'C');
$pdf->Cell(20,10,utf8_decode(' '),0,0,'C');
$pdf->Cell(50,10,utf8_decode('Autorizado por'),'T',1,'C');
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

$pdf->Output();

//$pdf->Output('D',$row['numero_guia'].'.pdf');
}
 ?>
