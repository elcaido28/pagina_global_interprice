<?php include('cabecera.php'); include('menu.php');?>
<div class="contenido">
  <div class="formularios">
    <div class="separador">
      <hr>
    </div>

    <div class="titulo_testimonio">
      <h3>Comparte tu experiencia con nosotros</h3>
    </div>
    <div class="comentar">
      <form action="guardar_testimonio.php" method="POST" name="form1" enctype="multipart/form-data">
        <div class="row">
          <div class="colum">
            <label for="nombres">Nombres</label><input type="text" name="nombres" value="<?php if(isset($_SESSION['NU'])){echo $_SESSION['NU']; } ?>" id="nombres" placeholder="Ej: Carlos Walter" required>
          </div>
          <?php $fecha=date('Y-m-d'); ?>
          <input class="fecha" type="text" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
        </div>
        <div class="row">
          <div class="colum">
            <label for="apellidos">Correo</label><input type="text" name="correo" value="<?php if(isset($_SESSION['EMAIl'])){echo $_SESSION['EMAIl']; } ?>" id="correo" placeholder="Ej: C_Walter@gmal.com">
          </div>
        </div>
        <div class="row">
          <div class="colum">
            <label for="numeroide">Mensaje</label><textarea name="mensaje" id="mensaje" cols="" rows="" required></textarea>
          </div>
        </div>

        <div class="centrar_boton">
          <!-- <input type="submit" id="btnenviar" value="Comentar" disabled> -->
          <input type="submit" name="comentar" value="Comentar">
        </div>
      </form>
    </div>

    <hr><br>

    <div class="lista_comentarios">
      <div class="titulo_comentarios">
        <h3>Lista de Comentarios</h3>
      </div>
      <?php
        include('conexion.php');
        $consulta="SELECT * from testimonios ORDER BY test_id DESC LIMIT 3";
        $ejec=mysqli_query($con,$consulta);
        while ($row=mysqli_fetch_array($ejec)) {
      ?>
      <div class="comentarios">
        <p><?php echo $row['test_comentador']; ?></p>
        <textarea name="" id="" disabled=""><?php echo $row['test_comentario']; ?></textarea>
      </div>
      <?php } ?>
    </div>

  </div>

</div>
<?php include('footer.php'); ?>

<script src="js/jquery.js" charset="utf-8"></script>
  </body>
</html>
