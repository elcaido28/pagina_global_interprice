<?php
session_start();
  $nomU = $_POST['usuario'];
  $pas = $_POST['clave'];

  if(empty($nomU) || empty($pas)){
  	header("Location:index.php");
  	exit();
  }
   include('conexion.php');


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


 ?>
