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
   $this->SetXY(80,15);
   $this->Cell(50,10,'GLOBAL INTERPRICE COURIER INTERCOURIER S.A.',0,1,'C');
   $this->SetXY(60,25);
   $this->SetFont('arial','B',11);
   $this->MultiCell(90,5,'S6, Guillermo Pareja, MZ94, Garzota, Centro, Guayaquil 090505',0,'C',0);
   $this->SetXY(80,35);
   $this->Cell(50,5,'Telf: 0959761013',0,1,'C');
   $this->SetXY(80,40);
   $this->Cell(50,5,'erosales@globalintercourier.com',0,1,'C');
  }
  function Footer(){
    // $this->SetY(-15);
    // $this->SetFont('arial','I',8);
    // $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
