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
   $this->Cell(50,10,'GLOBAL INTERPRICE COURIER INTERCOURIER S.A.',0,1,'C');
   $this->SetXY(60,40);
   $this->MultiCell(90,5,'S6, Guillermo Pareja, MZ94, Garzota, Centro, Guayaquil 090505',0,'C',0);
   $this->SetXY(80,50);
   $this->Cell(50,10,'Telf: 0959761013',0,1,'C');
   $this->SetXY(80,56);
   $this->Cell(50,10,'erosales@globalintercourier.com',0,1,'C');

  }
  function Footer(){
    // $this->SetY(-15);
    // $this->SetFont('arial','I',8);
    // $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
