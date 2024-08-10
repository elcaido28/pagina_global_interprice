
<?php
require 'FPDF/fpdf.php';

class PDF extends FPDF
{

  function Header()
  {
   //  include('conexion.php');
   //  $result= mysqli_query($con,"SELECT * from informacion");
   //  $row= mysqli_fetch_assoc($result);
   // $this->image($row['logo'],15,10,35);

   // $this->SetFont('arial','B',10);
   // $this->SetXY(145,6);
   // $this->Cell(50,10,'Fecha: Guayaquil, '.date('d-m-y').'',0,1,'C');
   $this->SetFont('arial','B',14);
   $this->SetXY(80,30);
   $this->Cell(50,8,utf8_decode('GLOBAL INTERPRICE COURIER INTERCOURIER S.A.'),0,1,'C');
   $this->SetXY(50,40);
   $this->SetFont('arial','B',10);
   $this->Cell(100,5,utf8_decode('Telf: 0959761013  Email: erosales@globalintercourier.com'),0,1,'C');
   $this->SetXY(80,50);
   $this->SetFont('arial','B',16);
   $this->Cell(50,5,utf8_decode('RECIBO DE ENTREGA'),0,1,'C');

  }
  function Footer(){
    // $this->SetY(-15);
    // $this->SetFont('arial','I',8);
    // $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
