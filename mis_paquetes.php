<?php include('cabecera.php'); include('menu.php'); include('conexion.php');?>
<div class="contenido">
  <div class="content_tabla_listas">
    <div class="titulo_testimonio">
      <h3>Mis Paquetes</h3>
    </div>

    <div class="comentar">
      <div class="content_table">
        <br><br>
        <table class="tabla">
          <thead>
            <tr>
              <th>Nombre/Descripció</th>
              <th>Fecha</th>
              <th>Remitente</th>
              <th>Número de tracking</th>
              <th>Valor</th>
              <th>Factura</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tr>
          <?php
          $id_su=$_SESSION['ID_usu'];
          $cons4="SELECT * FROM registro_paquetes RP INNER JOIN estado_paquete EP on RP.estadop_id=EP.estadop_id WHERE ru_id ='$id_su' ";
            $ejec4=mysqli_query($con,$cons4);
            while ($row4=mysqli_fetch_array($ejec4)) {
          ?>
            <td><?php echo $row4['paq_nombre']; ?></td>
            <td><?php echo $row4['paq_fecha_ingreso']; ?></td>
            <td><?php echo $row4['paq_remitente']; ?></td>
            <td><?php echo $row4['paq_codigo']; ?></td>
            <td><?php echo $row4['paq_valor']; ?></td>
            <td><a href="<?php echo $row4['paq_archivo']; ?>" target="_blank" title="Vista Previa del Archivo"><img src="<?php echo $row4['paq_archivo']; ?>" alt="" width="50" height="50"></a></td>
            <td><?php echo $row4['estadop_dscrp']; ?></td>
            <td>
              <?php if ($row4['estadop_id']=="2") { ?>
              <div class="optabla2">

                <a href="editar_paquete.php?id=<?php echo $row4['paq_id']; ?>" title="Editar"><i class="fas fa-pencil-alt esp-right"></i></a>

              </div>
            <?php }else{ echo "---";} ?>
            </td>
          </tr><?php   } ?>
        </table>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        $('.tabla').DataTable();
      });
    </script>
  </div>

</div>


<?php include ("footer.php"); ?>

  </body>
</html>
