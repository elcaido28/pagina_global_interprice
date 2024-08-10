<?php include('cabecera.php'); include('menu.php'); include('conexion.php'); $id_su=$_SESSION['ID_usu']; ?>
<div class="contenido">
  <div class="content_tabla_listas">
    <div class="titulo_testimonio">
      <h3>Lista de Paquetes</h3> <a href="Descargar_Excel_pedidos.php">Descargar Excel</a>
    </div>
    <div class="">
      <form class="formu_busc_fecha" action="lista_paquetes.php" method="post">
        <p>Fecha Inicio</p><p>Fecha Fin</p>
        <div class="conten_caja_btn">
          <input type="date" class="txtmod" name="fechaini" value="">
          <input type="date" class="txtmod" name="fechafin" value="">
          <input type="submit" class="btng" name="" value="Filtrar">
        </div>
      </form>
    </div>
    <div class="comentar">
      <div class="content_table">
        <br><br>
        <table class="tabla">
          <thead>
            <tr>
              <th>Opciones</th>
              <th>Nº Guia</th>
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
              <th>Opción</th>
            </tr>
          </thead>
          <tr>
          <?php
          if (isset($_POST['fechaini'])) {
             $Desde=$_POST['fechaini'];
             $Hasta=$_POST['fechafin'];
             if ($Desde=="" || $Hasta=="") {
               $Desde="2000-01-01";
               $Hasta=date('Y-m-d');
             }
             $query1=" and RP.paq_fecha_ingreso between '$Desde' and '$Hasta'";
             $_SESSION['FE_QUERY']=$query1;
          }else{
            if (isset($_SESSION['FE_QUERY'])) {
              $query1=$_SESSION['FE_QUERY'];
            }else{
              $query1="";
            }

          }

          $cons4="SELECT * FROM registro_paquetes RP INNER JOIN estado_paquete EP on RP.estadop_id=EP.estadop_id WHERE RP.ru_id !='$id_su' ".$query1;
            $ejec4=mysqli_query($con,$cons4);
            while ($row4=mysqli_fetch_array($ejec4)) {
          ?>
            <td>
              <div class="optabla2">
                <a href="editar_paquete_guia.php?id=<?php echo $row4['paq_id']; ?>" title="Agregar numero de Guia"><i class="fas fa-pencil-alt esp-right"></i></a>
                <a href="reporte_recibo_entrega.php?id=<?php echo $row4['paq_id']; ?>&std=1" target="_blank" title="Marcar como Entregado" ><i class="far fa-check-square"></i></a>
              </div>
            </td>
            <td><?php echo $row4['numero_guiaP']; ?></td>
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
            <td>
              <div class="optabla2">
                <a href="editar_paquete_estado.php?id=<?php echo $row4['paq_id']; ?>&std=2" title="Marcar como Por Entregar"><i class="far fa-calendar-times"></i></a>
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
