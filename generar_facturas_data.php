<?php

include('conexion.php');
if (isset($_POST['value'])) {
  //captura todos los datos y los separa por una coma
  $colors=implode(',', $_POST['value']);
  echo $colors;
  //mete los datos a un arreglo separandolos al encontrar una coma
  // $result = explode(',',$colors);
  // // cuenta cuantos datos tiene el array
  // $num_datos=count($result);
  // //presenta el array
  // for ($i=0; $i <$num_datos ; $i++) {
  //   //echo $result[$i];
  //   $dt_id = explode('-',$result[$i]);
  //   if ($dt_id[0]=="F") {
  //     //echo $dt_id[1];
  //     $id_fac=$dt_id[1];
  //     //header("Location:generar_factura_data.php?idf=$id_fac");
  //     // $cons="SELECT * FROM facturas where id_facturas='$id_fac' ";
  //     //   $ejec=mysqli_query($con,$cons);
  //     //   $row=mysqli_fetch_assoc($ejec);
  //   }
  //
  //   if ($dt_id[0]=="G") {
  //     echo $dt_id[1];
  //   }
  //
  //   if ($dt_id[0]=="D") {
  //     echo $dt_id[1];
  //   }
  //
  //
  // }

}

?>
