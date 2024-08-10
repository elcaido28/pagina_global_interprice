<?php
include('conexion.php');
session_start();

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$cedula=$_POST['cedula'];
$correo=$_POST['correo'];

$consulta="SELECT * from registro_usuario WHERE ru_numero_id='$cedula'";
$ejec=mysqli_query($con,$consulta);
$row = mysqli_num_rows($ejec);
if ($row==0) {
	echo "cedula erronea";
	$_SESSION['neg']=1; //cedula erronea
	// header("Location:restablecer_clave.php");
}else{
	echo "cedula correcta";
	$row2= mysqli_fetch_assoc($ejec);
	$id_usuario=$row2['ru_id'];
	if ($row2['ru_correo']==$correo) {
		if ($row2['ru_nombres']==$nombres) {
			if ($row2['ru_apellidos']==$apellidos) {
				$_SESSION['val']="1";
				$_SESSION['usuario'] = $row2['ru_correo'];
				$_SESSION['clave'] = $row2['ru_clave'];
				header("Location:restablecer_clave.php");
			}else{
				$_SESSION['neg']=4; //apellidos erroneos
				 header("Location:restablecer_clave.php");
			}
		}else{
			$_SESSION['neg']=3; //nombres erroneos
			 header("Location:restablecer_clave.php");
		}
	}else{
		$_SESSION['neg']=2; //correo erroneo
		 header("Location:restablecer_clave.php");
	}
}

// mysqli_close($con);
// header("Location:crear_cuenta.php");
?>
