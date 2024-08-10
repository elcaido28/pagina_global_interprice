<?php include('cabecera.php'); include('menu.php');?>
<div class="contenido">
  <div class="formulario_registrate">
    <div class="titulo">
      <h3>REGÍSTRATE</h3>
    </div>
    <div class="nota">
      <h3>Tener en cuenta siempre que suba un Archivos</h3>
      <p>Regístrate y recibe una dirección física en USA y España, las cuales podrás utilizar para direccionar tus compras desde Amazon, Ebay, Walmart y muchas otras tiendas y recibirlas en la puerta de tu casa.</p>
    </div>
    <form name="" action="generar_arch.php" method="POST" enctype="multipart/form-data">

      <div class="row">
        <div class="row_form_lg">
          <label for="telefono">Seleccione Archivo Excel</label> <input type="file" name="subirE" accept="application/,.xlsx" required>
        </div>

      </div>

      <div class="centrar_boton">
        <input type="submit" id="btnenviar" value="Subir">
      </div>

    </form>
  </div>


</div>
<br>
<?php include('footer.php'); ?>
  </body>
</html>
