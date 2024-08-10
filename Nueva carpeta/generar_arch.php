<?php
$con=mysqli_connect("localhost", "root", "root", "global_interprice"); //Agregamos la conexión
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

  $nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
  $valor = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
  $estado = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();

  $sql = "INSERT INTO reactivo (nombre_reactivo,precio_reactivo,id_estado) VALUES ('$nombre','$valor','$estado')";
  $result = mysqli_query($con,$sql);

}
echo "SE IMPORTO CON EXITO";
}

 ?>
