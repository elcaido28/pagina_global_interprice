<?php
include('conexion.php');
session_start();

$fecha=$_POST['fecha'];
$nombres=$_POST['nombres'];
$correo=$_POST['correo'];
$descripcion=$_POST['mensaje'];

$ingreso=mysqli_query($con,"INSERT into testimonios (test_comentador, test_email_comentador, test_comentario, test_fecha_creacion) values ('$nombres', '$correo', '$descripcion', '$fecha')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:testimonios.php");
?>