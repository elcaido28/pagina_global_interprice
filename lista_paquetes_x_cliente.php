<?php include('cabecera.php'); include('menu.php'); include('conexion.php'); $id_su=$_REQUEST['id']; ?>
<div class="contenido">
  <div class="content_tabla_listas">
    <div class="titulo_testimonio">
      <h3>Lista de Paquetes</h3> <a href="Descargar_Excel_pedidos.php?id=<?php echo $id_su; ?>">Descargar Excel</a>
    </div>

    <div class="comentar">
      <div class="content_table">
        <br><br>
        <table class="tabla">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Nombre/Descripción</th>
              <th>Remitente</th>
              <th>Número de tracking</th>
              <th>Carga</th>
              <th>Cedula Migrante</th>
              <th>Valor</th>
              <th>Factura</th>
              <th>Obserbacion</th>
            </tr>
          </thead>
          <tr>
          <?php

          $cons4="SELECT * FROM registro_paquetes RP INNER JOIN estado_paquete EP on RP.estadop_id=EP.estadop_id WHERE ru_id ='$id_su' ";
            $ejec4=mysqli_query($con,$cons4);
            while ($row4=mysqli_fetch_array($ejec4)) {
          ?>

            <td><?php echo $row4['paq_fecha_ingreso']; ?></td>
            <td><?php echo $row4['estadop_dscrp']; ?></td>
            <td><?php echo $row4['paq_nombre']; ?></td>
            <td><?php echo $row4['paq_remitente']; ?></td>
            <td><?php echo $row4['paq_num_trac']; ?></td>
            <td><?php echo $row4['paq_asegurarp']; ?></td>
            <td><?php echo $row4['paq_codigo']; ?></td>
            <td><?php echo $row4['paq_valor']; ?></td>
            <td><a href="<?php echo $row4['paq_archivo']; ?>" target="_blank" title="Vista Previa del Archivo"><img src="<?php echo $row4['paq_archivo']; ?>" alt="" width="50" height="50"></a></td>
            <td><?php echo $row4['paq_observacion']; ?></td>
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
