<?php
include('conexion.php');

$numguia=$_POST['numguia'];
$id_paquete=$_REQUEST['id'];

$consulta="UPDATE registro_paquetes SET numero_guiaP='$numguia' WHERE paq_id='$id_paquete'";
$ejec=mysqli_query($con,$consulta);


mysqli_close($con);
header('Location:lista_paquetes.php');
?>
