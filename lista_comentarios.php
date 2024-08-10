<?php include('cabecera.php'); include('menu.php'); include('conexion.php');?>
<div class="contenido">
  <div class="content_tabla_listas">
    <div class="titulo_testimonio">
      <h3>Lista de Testimonios</h3>
    </div>

    <div class="comentar">
      <div class="content_table">
        <br><br>
        <table class="tabla">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>nombres</th>
              <th>Correo</th>
              <th>Comentario</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tr>
          <?php
          $id_su=$_SESSION['ID_usu'];
          $cons4="SELECT * FROM testimonios ";
            $ejec4=mysqli_query($con,$cons4);
            while ($row4=mysqli_fetch_array($ejec4)) {
          ?>

            <td><?php echo $row4['test_fecha_creacion']; ?></td>
            <td><?php echo $row4['test_comentador']; ?></td>
            <td><?php echo $row4['test_email_comentador']; ?></td>
            <td><?php echo $row4['test_comentario']; ?></td>
            <td>
              <div class="optabla2">
                <a href="eliminar_comentario.php?id=<?php echo $row4['test_id']; ?>" title="Eliminar"><i class="far fa-trash-alt"></i></a>
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
