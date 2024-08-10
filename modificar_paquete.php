<?php
include('conexion.php');
session_start();

$id_paquete=$_SESSION['modidpaq'];

$nombre_producto=$_POST['nombre'];
$numtracking=$_POST['numtracking'];
$remitente=$_POST['remitente'];
$codigo=$_POST['codigo'];
$valor=$_POST['valor'];
$tipomoneda=$_POST['tipomoneda'];
$origen=$_POST['origen'];
  $Psegura=$_POST['Psegura'];
$observacion=$_POST['observacion'];
//imagen seleccionada
$nombre=$_FILES["archivo"]["name"];
$ruta=$_FILES["archivo"]["tmp_name"];
$destino="paquetes_img/".$nombre;
copy($ruta,$destino);
//fin imagen seleccionada
$estado='2';
$fecha=date('Y-m-d');
$id_usuario=$_SESSION['ID_usu'];

if ($nombre == ""){
  		$consulta="UPDATE registro_paquetes SET paq_nombre='$nombre_producto', paq_num_trac='$numtracking', paq_remitente='$remitente', paq_codigo='$codigo', paq_valor='$valor', paq_tipo_moneda='$tipomoneda', paq_fecha_ingreso='$fecha', paq_observacion='$observacion', pais_origen_id='$origen', paq_asegurarp='$Psegura', estadop_id='$estado', ru_id='$id_usuario' WHERE paq_id='$id_paquete'";
	    $ejec=mysqli_query($con,$consulta);
  	}else{
  		$consulta="UPDATE registro_paquetes SET paq_nombre='$nombre_producto', paq_archivo='$destino', paq_num_trac='$numtracking', paq_remitente='$remitente', paq_codigo='$codigo', paq_valor='$valor', paq_tipo_moneda='$tipomoneda', paq_fecha_ingreso='$fecha', paq_observacion='$observacion', pais_origen_id='$origen', paq_asegurarp='$Psegura', estadop_id='$estado', ru_id='$id_usuario' WHERE paq_id='$id_paquete'";
	    $ejec=mysqli_query($con,$consulta);
  	}

mysqli_close($con);
header('Location:mis_paquetes.php');
?>
