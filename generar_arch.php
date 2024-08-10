<?php
include('conexion.php'); //Agregamos la conexión
require 'PHPExcel/Classes/PHPExcel/IOFactory.php'; //Agregamos la librería
if (isset($_FILES["subirE"]["name"])) {

$nombre=$_FILES["subirE"]["name"];
$ruta=$_FILES["subirE"]["tmp_name"];
$destino="archivos_excel/".$nombre;
copy($ruta,$destino);


//Variable con el nombre del archivo
$nombreArchivo = $destino;
// Cargo la hoja de cálculo
$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
//Asigno la hoja de calculo activa
$objPHPExcel->setActiveSheetIndex(0);
//Obtengo el numero de filas del archivo
$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
$feha_subida_arch=date('Y-m-d');
$dele=mysqli_query($con,"DELETE from facturas");
for ($i = 2; $i <= $numRows; $i++) {

  $numero_guia = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
  $remitente = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
  $cedula_remitente = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
  $destinatario = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
  $cedula_destinatario = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
  $peso = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
  $valor_fob = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
  $descripcion = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
  $piezas = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
  $unidades = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
  $numero_factura = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
  $fecha = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
  $subpartida = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();

  $direccion_remite = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
  $direccion_destin = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();

  $sql = "INSERT INTO todas_facturas (numero_guia, remitente, cedula_remitente,destinatario,cedula_destinatario,peso,valor_fob,descripcion,piezas,unidades,numero_factura,fecha,subpartida,direccion_remitente,direccion_destinatario,feha_subida_arch) VALUES
  ('$numero_guia','$remitente','$cedula_remitente','$destinatario','$cedula_destinatario','$peso','$valor_fob','$descripcion','$piezas','$unidades','$numero_factura','$fecha','$subpartida','$direccion_remite','$direccion_destin','$feha_subida_arch')";
  $result = mysqli_query($con,$sql);

  $sql2 = "INSERT INTO facturas (numero_guia, remitente, cedula_remitente,destinatario,cedula_destinatario,peso,valor_fob,descripcion,piezas,unidades,numero_factura,fecha,subpartida,direccion_remitente,direccion_destinatario,feha_subida_arch) VALUES
  ('$numero_guia','$remitente','$cedula_remitente','$destinatario','$cedula_destinatario','$peso','$valor_fob','$descripcion','$piezas','$unidades','$numero_factura','$fecha','$subpartida','$direccion_remite','$direccion_destin','$feha_subida_arch')";
  $result = mysqli_query($con,$sql2);
}
}
 header("Location:lista_reg_excel.php");
 ?>
