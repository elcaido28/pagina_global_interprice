<?php
include('conexion.php');
$id=$_REQUEST['id'];
$departamento=$_POST['pais'];
$provincia=$_POST['provincia'];
$direccion=$_POST['direccion'];


switch ($departamento) {
	case '1': $departamento="Azuay"; break;
	case '2': $departamento="Bolívar"; break;
	case '3': $departamento="Cañar"; break;
	case '4': $departamento="Carchi"; break;
	case '5': $departamento="Chimborazo"; break;
	case '6': $departamento="Cotopaxi"; break;
	case '7': $departamento="El Oro"; break;
	case '8': $departamento="Esmeraldas"; break;
	case '9': $departamento="Galápagos"; break;
	case '10': $departamento="Guayas"; break;
	case '11': $departamento="Imbabura"; break;
	case '12': $departamento="Loja"; break;
	case '13': $departamento="Los Ríos"; break;
	case '14': $departamento="Manabí"; break;
	case '15': $departamento="Morona Santiago"; break;
	case '16': $departamento="Napo"; break;
	case '17': $departamento="Orellana"; break;
	case '18': $departamento="Pastaza"; break;
	case '19': $departamento="Pichincha"; break;
	case '20': $departamento="Santa Elena"; break;
	case '21': $departamento="Santo Domingo"; break;
	case '22': $departamento="Sucumbíos"; break;
	case '23': $departamento="Tungurahua"; break;
	case '24': $departamento="Zamora Chinchipe"; break;
	default:  break;
}
$nue_clave=$_POST['nue_clave'];
$confi_clave=$_POST['confi_clave'];

$telefono=$_POST['telefono'];
$celular=$_POST['celular'];


if ($nue_clave==$confi_clave && $nue_clave!="") {
  $ingreso=mysqli_query($con,"UPDATE registro_usuario SET ru_clave='$nue_clave' where ru_id='$id'") or die ("error".mysqli_error());
}

$ingreso=mysqli_query($con,"UPDATE registro_usuario SET ru_direccion='$direccion',ru_departamento='$departamento',ru_ciudad='$provincia',ru_telefono='$telefono',ru_celular='$celular' where ru_id='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:perfil.php");

 ?>
