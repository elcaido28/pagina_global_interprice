<?php
$idv=$_REQUEST['id'];
include('conexion.php');
mysqli_query($con,"DELETE from testimonios where test_id='$idv'");
mysqli_close($con);
header("Location:lista_comentarios.php");

 ?>
