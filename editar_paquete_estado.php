<?php
include('conexion.php');


$id_paquete=$_REQUEST['id'];
$estado=$_REQUEST['std'];
// if ($estado=="1") {
//   $consulta="UPDATE registro_paquetes SET estadop_id='1' WHERE paq_id='$id_paquete'";
//   $ejec=mysqli_query($con,$consulta);
//   //header("reporte_recibo_entrega.php?id=$id_paquete");
//
// }
if ($estado=="2") {
  $consulta="UPDATE registro_paquetes SET estadop_id='2' WHERE paq_id='$id_paquete'";
  $ejec=mysqli_query($con,$consulta);

}



mysqli_close($con);
header('Location:lista_paquetes.php');
?>
