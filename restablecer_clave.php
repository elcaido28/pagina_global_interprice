<?php include('cabecera2.php'); include('menu.php'); ?>
<?php $_SESSION['caaa']="jsjsjsjjs";
?>
<div class="contenido">
  <div class="formularios">
    <div class="separador">
      <hr>
    </div>
    <div class="titulo_testimonio">
      <h3>Reestablecer Clave</h3>
    </div><br>
    <div class="comentar">
      <form action="validar_datos.php" method="POST" name="form1" enctype="multipart/form-data">
        <div class="row">
          <div class="colum">
            <label for="nombres">Nombres</label><input type="text" name="nombres" id="nombres" placeholder="Ej: Carlos Walter" onkeypress="return soloLetras(event)" required>
          </div>
          <div class="colum">
            <label for="apellidos">Apellidos</label><input type="text" name="apellidos" id="apellidos" placeholder="Ej: Carlos Walter" onkeypress="return soloLetras(event)" required>
          </div>
        </div>
        <div class="row">
          <div class="colum">
            <label for="cedula">Cédula</label><input type="text" name="cedula" id="cedula" placeholder="Nº de identificación" required>
          </div>
          <div class="colum">
            <label for="apellidos">Correo</label><input type="text" name="correo" id="correo" placeholder="Ej: C_Walter@gmal.com" onchange="validarcorreo()">
          </div>
        </div>
        <div class="centrar_boton">
          <!-- <input type="submit" id="btnenviar" value="Comentar" disabled> -->
          <input type="submit" name="comentar" value="Confirmar">
        </div>
      </form>
    </div>

    <hr><br>
<?php
if (isset($_SESSION['neg'])) {
  switch ($_SESSION['neg']) {
    case '1': $msn="La cedula introducida no es correcta. "; ?>
    <div class="error_clave">
      <p>
        <?php echo $msn; ?>
      </p>
    </div>
    <?php
      break;
    case '2': $msn="El correo introducido no es correcto. "; ?>
    <div class="error_clave">
      <p>
        <?php echo $msn; ?>
      </p>
    </div>
    <?php
      break;
    case '3': $msn="El nombre introducido no es correcto. "; ?>
    <div class="error_clave">
      <p>
        <?php echo $msn; ?>
      </p>
    </div>
    <?php
      break;
    case '4': $msn="El apellido introducido no es correcto. "; ?>
    <div class="error_clave">
      <p>
        <?php echo $msn; ?>
      </p>
    </div>
    <?php
      break;
    default: $msn = "ajaj";
      break;
  }
  unset($_SESSION['neg']);
}
if (isset($_SESSION['val'])) {
  if ($_SESSION['val']=="1") {
    $msn = "Datos seran enviados pronto"; ?>
    <div class="confirmar_clave">
      <p>
        Su usuario es: <span><?php echo $_SESSION['usuario'];?></span> y su contraseña es: <span><?php echo $_SESSION['clave']; ?></span>
      </p>.
    </div>
<?php
  unset($_SESSION['val']); unset($_SESSION['usuario']); unset($_SESSION['clave']);
}
}
?>
  </div>
</div>
  </body>
</html>
