<?php include('cabecera.php'); include('menu.php'); include('conexion.php');?>
<div class="contenido">
  <div class="content_tabla_listas">
    <div class="titulo_testimonio">
      <h3>Lista de Clientes</h3>
    </div>

    <div class="comentar">
      <div class="content_table">
        <br><br>
        <table class="tabla">
          <thead>
            <tr>
              <th>Tipo de persona</th>
              <th>nombres</th>
              <th>apellidos</th>
              <th>Número de identidicacion</th>
              <th>Correo</th>
              <th>Localidad</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Celular</th>
              <th>Fecha de Naci.</th>
              <th>Cedula migrante</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tr>
          <?php
          $id_su=$_SESSION['ID_usu'];
          $cons4="SELECT * FROM registro_usuario where ru_id!='$id_su' ";
            $ejec4=mysqli_query($con,$cons4);
            while ($row4=mysqli_fetch_array($ejec4)) {
          ?>
            <td><?php echo $row4['ru_tipo_usu']; ?></td>
            <td><?php echo $row4['ru_nombres']; ?></td>
            <td><?php echo $row4['ru_apellidos']; ?></td>
            <td><?php echo $row4['ru_numero_id']; ?></td>
            <td><?php echo $row4['ru_correo']; ?></td>
            <td><?php echo $row4['ru_departamento']." ".$row4['ru_ciudad']; ?></td>
            <td><?php echo $row4['ru_direccion']; ?></td>
            <td><?php echo $row4['ru_telefono']; ?></td>
            <td><?php echo $row4['ru_celular']; ?></td>
            <td><?php echo $row4['ru_dia']."/".$row4['ru_mes']."/".$row4['ru_year']; ?></td>
            <td><?php echo $row4['ru_codigo']; ?></td>
            <td>
              <div class="optabla2">
                <a href="lista_paquetes_x_cliente.php?id=<?php echo $row4['ru_id']; ?>" title="Ver pedidos"><i class="far fa-arrow-alt-circle-right"></i></a>
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
