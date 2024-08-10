<?php include('cabecera.php'); include('menu.php'); include('conexion.php');

$id_paquete=$_REQUEST['id'];
$consulta="SELECT * from registro_paquetes RP INNER JOIN estado_paquete EP ON RP.estadop_id=EP.estadop_id INNER JOIN pais_origen PO ON RP.pais_origen_id=PO.pais_origen_id INNER JOIN categoria C ON RP.categoria_id=C.categoria_id WHERE RP.paq_id='$id_paquete'";
$ejec=mysqli_query($con,$consulta);
$row=mysqli_fetch_array($ejec);

?>

<div class="contenido">
  <div class="formulario_registrate">
    <form action="modificar_paquete_guia.php?id=<?php echo $id_paquete; ?>" method="POST" >
      <div class="row">
        <h3>Agregar Numero de Guía al Paquete</h3>
      </div><hr><br>

      <div class="row">
        <div class="colum">
          <label for="numtracking">Número de Guía</label>
          <input type="text" name="numguia" id="numguia" placeholder="" value="<?php if (isset($row['numero_guiaP'])){ echo $row['numero_guiaP']; } ?>" required>
        </div>
      </div>
      <div class="centrar_boton">
        <input type="submit" id="btnenviar" value="Editar">
      </div>
    </form>

  </div>
</div>
<br>
<?php include('footer.php'); ?>
<script src="js/jquery.js" charset="utf-8"></script>
<script src="js/validarcajas.js" charset="utf-8"></script>
  </body>
</html>
