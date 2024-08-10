<?php
include('conexion.php');

$tipo_usuario=$_POST['tipousu'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$tipoide=$_POST['tipoide'];
$numeroide=$_POST['numeroide'];
$email=$_POST['email'];
$direccion=$_POST['direccion'];
$departamento=$_POST['pais'];
$ciudad=$_POST['provincia'];
$clave=$_POST['clave'];
$telefono=$_POST['telefono'];
$celular=$_POST['celular'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$year=$_POST['year'];
$codigo=$_POST['codigo'];
$tipo_usu="2";

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
	default: echo "escoja una opcion"; break;
}
// echo "<br>provincia ".$departamento;
// echo "<br>ciudad ".$ciudad;
$consulta="INSERT INTO registro_usuario (ru_nombres, ru_apellidos, ru_tipo_usu, ru_tipo_ide, ru_numero_id, ru_correo, ru_direccion, ru_departamento, ru_ciudad, ru_clave, ru_telefono, ru_celular, ru_dia, ru_mes,
	 ru_year, ru_codigo,tipo_usu) VALUES ('$nombres', '$apellidos', '$tipo_usuario', '$tipoide', '$numeroide', '$email', '$direccion', '$departamento', '$ciudad', '$clave', '$telefono', '$celular', '$dia',
		  '$mes', '$year', '$codigo','$tipo_usu')";
$ingreso=mysqli_query($con,$consulta) or die ("error".mysqli_error());

session_start();
  $nomU = $_POST['email'];
  $pas = $_POST['clave'];

  if(empty($nomU) || empty($pas)){
  	header("Location:index.php");
  	exit();
  }



  $result= mysqli_query($con,"SELECT * from registro_usuario where ru_correo='$nomU'");
  $row= mysqli_fetch_assoc($result);
  $abc=$row['ru_id'];
  if($row['ru_clave']==$pas){
    $result2= mysqli_query($con,"SELECT * from registro_usuario where ru_correo='$nomU'");
     $row4= mysqli_fetch_assoc($result2);
     $_SESSION['ID_usu']=$row4['ru_id'];
     $_SESSION['NU']=$row4['ru_nombres'];  //." ".$row4['ru_apellidos'];
    $_SESSION['NUID']=$row4['ru_numero_id'];
    $_SESSION['CMIG']=$row4['ru_codigo'];
    $_SESSION['EMAIl']=$row4['ru_correo'];
    $_SESSION['TIPOU']=$row4['tipo_usu'];

    //$_SESSION['TD']=$row4['todoR'];
    //$_SESSION['S']=$row4['recurso_secre'];
    //$_SESSION['PD']=$row4['recurso_profe_dele'];
    //$_SESSION['SC']=$row4['recurso_secre_conse'];
    header("Location:index.php");
  }else{
    header("Location:index.php");
  }





mysqli_close($con);
//header("Location:crear_cuenta.php");
?>
