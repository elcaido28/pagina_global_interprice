<?php include('cabecera.php'); include('menu.php'); include('conexion.php');?>
<div class="contenido">
  <div class="content_tabla_listas">
    <div class="titulo_testimonio">
      <h3>Historial de Guías Aereas</h3>
    </div>

    <div class="comentar">
      <div class="content_table">
        <br><br>
        <table class="tabla">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tr>
          <?php
          $cons4="SELECT DISTINCT feha_subida_arch FROM todas_facturas ";
            $ejec4=mysqli_query($con,$cons4);
            while ($row4=mysqli_fetch_array($ejec4)) {
          ?>

            <td><?php echo $row4['feha_subida_arch']; ?></td>
            <td><div class="optabla2">
                <a href="det_guias_aereas.php?idfech=<?php echo $row4['feha_subida_arch']; ?>" title="Eliminar"><i class="far fa-arrow-alt-circle-right"></i></a>
              </div>
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
