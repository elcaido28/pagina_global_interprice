<?php include('cabecera.php'); include('menu.php'); session_start(); ?>
<?php
  $_SESSION['modidpaq']=$_REQUEST['id'];
  $id_paquete=$_SESSION['modidpaq'];
  $consulta="SELECT * from registro_paquetes RP INNER JOIN estado_paquete EP ON RP.estadop_id=EP.estadop_id INNER JOIN pais_origen PO ON RP.pais_origen_id=PO.pais_origen_id  WHERE RP.paq_id='$id_paquete'";
  $ejec=mysqli_query($con,$consulta);
  $row=mysqli_fetch_array($ejec);
?>
<div class="contenido">
  <div class="formulario_registrate">
    <form action="modificar_paquete.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <h3>Editar Datos del Paquete</h3>
      </div><hr><br>
      <div class="row">
        <div class="colum_form_lg">
          <label for="nombre">Nombre o descripción</label>
          <input type="text" name="nombre" id="nombre" placeholder="Ej: teclado y mouse para pc" value="<?php echo $row['paq_nombre'];?>" required>
        </div>

      </div>
      <div class="row">
        <div class="colum">
          <label for="categoria">Archivo</label>
          <input type="file" id="archivo" name="archivo" accept="image/jpeg,.pdf,.png">
        </div>
        <div class="colum">
          <label for="numtracking">Número de tracking</label>
          <input type="text" name="numtracking" id="numtracking" placeholder="Ej: 4821AC23" value="<?php echo $row['paq_num_trac'];?>" required>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="remitente">Remitente</label>
          <input type="text" name="remitente" id="remitente" placeholder="Ej: Amazon" value="<?php echo $row['paq_remitente'];?>" onkeypress="return soloLetras(event)" required>
        </div>
        <div class="colum">
          <label for="codigo">Código Migrante (incluir si aplica)</label>
          <input type="text" name="codigo" id="codigo" placeholder="Cédula de migrante" value="<?php echo $row['paq_codigo'];?>" maxlength="10">
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="valor">Valor</label>
          <div class="columx2">
            <input type="text" name="valor" id="valor" placeholder="Ej: 25" value="<?php echo $row['paq_valor'];?>" onkeypress="return soloNumeros(event)" maxlength="6" required>
            <select name="tipomoneda" id="tipomoneda" required>
              <option value="<?php echo $row['paq_tipo_moneda'];?>"><?php echo $row['paq_tipo_moneda'];?></option>
              <option value="USD">USD</option>
            </select>
          </div>
        </div>
        <div class="colum">
          <label for="origen">Origen</label>
          <select name="origen" id="origen" required>
            <option value="<?php echo $row['pais_origen_id'];?>"><?php echo $row['pais_origen_dscrp'];?></option>
            <?php
              include ('conexion.php');
              $cons1="SELECT * from pais_origen";
              $ejec1=mysqli_query($con,$cons1);
              while ($row1=mysqli_fetch_array($ejec1)) {
                echo "<option value='".$row1['pais_origen_id']."'>";
                echo $row1['pais_origen_dscrp']; echo "</option>";
              }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label>Desea asegurar paquete</label>
          <div class="conte_cont_radiobutton">
            <div class="cont_radiobutton">
              <label>Si</label><input type="radio" name="Psegura" value="Asegurada" <?php if ($row['paq_asegurarp']=="Asegurada"){?>checked<?php } ?> >
            </div>
            <div class="cont_radiobutton">
              <label>No</label><input type="radio" name="Psegura" value="No Asegurada"<?php if ($row['paq_asegurarp']=="No Asegurada"){?>checked<?php } ?>>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="colum_form_lg">
          <label for="">Observación</label>
          <textarea name="observacion" id="observacion" cols="30" rows="10"><?php echo $row['paq_observacion'];?></textarea>
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
