<?php
//Incluimos librería y archivo de conexión
require 'PHPExcel/Classes/PHPExcel.php';
require 'conexion.php';
session_start();

//Consulta
$queryC="";
if (isset($_REQUEST['id'])) {
   $id_su=$_REQUEST['id'];
   $queryC="WHERE RP.ru_id='$id_su'";
}else{
  $id_su=$_SESSION['ID_usu'];
  $queryC="WHERE RP.ru_id!='$id_su'";
}
$cons4="SELECT * FROM registro_paquetes RP INNER JOIN registro_usuario RU on RU.ru_id=RP.ru_id INNER JOIN categoria C on C.categoria_id=RP.categoria_id INNER JOIN estado_paquete EP on RP.estadop_id=EP.estadop_id ".$queryC;
$ejec4=mysqli_query($con,$cons4);
$fila = 2; //Establecemos en que fila inciara a imprimir los datos

//Objeto de PHPExcel
$objPHPExcel  = new PHPExcel();
//Propiedades de Documento
$objPHPExcel->getProperties()->setCreator("SDC")->setDescription("Reporte de Pedidos");

//Establecemos la pestaña activa y nombre a la pestaña
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Pedidos");

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'CATEGORIA');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'FECHA DE REGISTRO');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'DESTINATARIO');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'CI. DESTINATARIO');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'DESCRIPCION');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Nº TRACKING');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'REMITENTE');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'VALOR');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'CI. MIGRANTE');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'OBSERBACION');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'ESTADO');
//Recorremos los resultados de la consulta y los imprimimos
while ($rows=mysqli_fetch_array($ejec4)) {

  $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['categoria_dscrp']);
  $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['paq_fecha_ingreso']);
  $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['ru_nombres']." ".$rows['ru_apellidos']);
  $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['ru_numero_id']);
  $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['paq_nombre']);
  $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['paq_num_trac']);
  $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['paq_remitente']);
  $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['paq_valor']);
  $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['paq_codigo']);
  $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['paq_observacion']);
  $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['estadop_dscrp']);

  $fila++; //Sumamos 1 para pasar a la siguiente fila
}


header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Reporte_pedidos.xlsx"');
header('Cache-Control: max-age=0');


$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->save('php://output');

 ?>
