<?php
include('conexion.php');
session_start();
$nombre_producto=$_POST['nombre'];
$numtracking=$_POST['numtracking'];
$remitente=$_POST['remitente'];
$codigo=$_POST['codigo'];
$valor=$_POST['valor'];
$tipomoneda=$_POST['tipomoneda'];
$origen=$_POST['origen'];
$observacion=$_POST['observacion'];

  $Psegura=$_POST['Psegura'];



//imagen seleccionada
$nombre=$_FILES["archivo"]["name"];
$ruta=$_FILES["archivo"]["tmp_name"];
$destino="paquetes_img/".$nombre;
copy($ruta,$destino);
//fin imagen seleccionada
$estado='2';
$fecha=date('Y-m-d');
$id_usuario=$_SESSION['ID_usu'];
$numero_guiaP="";
$query="INSERT INTO registro_paquetes (paq_nombre, paq_archivo, paq_num_trac, paq_remitente, paq_codigo, paq_valor, paq_tipo_moneda, paq_fecha_ingreso, paq_observacion, numero_guiaP, pais_origen_id, paq_asegurarp, estadop_id,ru_id) VALUES
('$nombre_producto', '$destino', '$numtracking', '$remitente', '$codigo', '$valor', '$tipomoneda', '$fecha', '$observacion','$numero_guiaP', '$origen', '$Psegura', '$estado', '$id_usuario')";
echo $query;
$ingreso=mysqli_query($con,$query) or die ("error".mysqli_error());
mysqli_close($con);
header("Location:mis_paquetes.php");
?>
