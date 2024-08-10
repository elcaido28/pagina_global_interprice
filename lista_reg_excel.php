<?php include('cabecera.php'); include('menu.php'); include('conexion.php');?>
<div class="contenido">
  <div class="content_tabla_listas">
    <div class="titulo_testimonio">
      <h3>Lista de Paquetes</h3> <input type="button" id="save_value" name="" value="Generar Facturas">
    </div>
    <div class="comentar">
      <div class="content_table">
        <br><br>
        <table class="tabla">
          <thead>
            <tr>
              <th><input type="checkbox" name="" id="ckbcheckAllF" value="factura"> All_Factura</th>
              <th><input type="checkbox" name="" id="ckbcheckAllG" value="guia"> All_GíA</th>
              <th><input type="checkbox" name="" id="ckbcheckAllD" value="guia"> All_Decl._V.</th>
              <th><input type="checkbox" name="" id="ckbcheckAllR" value="guia"> All_Recibido</th>
              <th>Nº GíA</th>
              <th>Remitente</th>
              <th>Cedula Remi</th>
              <th>Destinatario</th>
              <th>Cedula Desti</th>
              <th>Peso Kg</th>
              <th>Valor FOB</th>
              <th>Descripción</th>
              <th>Piezas</th>
              <th>Unidades</th>
              <th>Nº Factura</th>
              <th>fecha</th>
              <th>Dirección Remi.</th>
              <th>Dirección Desti.</th>
              <th>SubPartida</th>

            </tr>
          </thead>
          <tr>
          <?php
          $id_su=$_SESSION['ID_usu'];
          $cons4="SELECT * FROM facturas";
            $ejec4=mysqli_query($con,$cons4);
            while ($row4=mysqli_fetch_array($ejec4)) {
          ?>
            <td><input type="checkbox" class="checkBoxF" name="" value="F-<?php echo $row4['id_facturas']; ?>"></td>
            <td><input type="checkbox" class="checkBoxG" name="" value="G-<?php echo $row4['id_facturas']; ?>"></td>
            <td><input type="checkbox" class="checkBoxD" name="" value="D-<?php echo $row4['id_facturas']; ?>"></td>
            <td><input type="checkbox" class="checkBoxR" name="" value="R-<?php echo $row4['id_facturas']; ?>"></td>
            <td><?php echo $row4['numero_guia']; ?></td>
            <td><?php echo $row4['remitente']; ?></td>
            <td><?php echo $row4['cedula_remitente']; ?></td>
            <td><?php echo $row4['destinatario']; ?></td>
            <td><?php echo $row4['cedula_destinatario']; ?></td>
            <td><?php echo $row4['peso']; ?></td>
            <td><?php echo $row4['valor_fob']; ?></td>
            <td><?php echo $row4['descripcion']; ?></td>
            <td><?php echo $row4['piezas']; ?></td>
            <td><?php echo $row4['unidades']; ?></td>
            <td><?php echo $row4['numero_factura']; ?></td>
            <td><?php echo $row4['fecha']; ?></td>
            <td><?php echo $row4['direccion_remitente']; ?></td>
            <td><?php echo $row4['direccion_destinatario']; ?></td>
            <td><?php echo $row4['subpartida']; ?></td>

          </tr><?php   } ?>
        </table>
        <script type="text/javascript">
          $('#save_value').click(function() {
            var val =[]
            //captura el value de todos lo check chequados
            // $(':checkbox:checked').each(function(i) {
            $(':checkbox:checked:not(#ckbcheckAllF):not(#ckbcheckAllG):not(#ckbcheckAllD):not(#ckbcheckAllR)').each(function(i) {
              val[i]=$(this).val();
            });
            //alert(val);
            $.ajax({
              type:"POST",
              url:"generar_facturas_data.php",
              data:{
                value:val
              },
              success:function(data) {
                console.log(data);
              }
            })
            .done(function(respuesta){

              var result = respuesta.split(",");
              var num_datos = result.length;
              for (var i = 0; i < num_datos; i++) {
                var dt_id = result[i].split("-");
                if (dt_id[0]=="F") {
                    alert(dt_id[1]);
                    var url_g="reporte_factura.php?idf="+dt_id[1];
                    document.location.target = "_blank";
                    document.location.href=url_g;
                }
                if (dt_id[0]=="G") {
                    alert(dt_id[1]);
                    var url_g="reporte_guia.php?idf="+dt_id[1];
                    document.location.target = "_blank";
                    document.location.href=url_g;
                }
                if (dt_id[0]=="D") {
                    alert(dt_id[1]);
                    var url_g="reporte_declaracion.php?idf="+dt_id[1];
                    document.location.target = "_blank";
                    document.location.href=url_g;
                }
                if (dt_id[0]=="R") {
                    alert(dt_id[1]);
                    var url_g="reporte_recibo_en.php?idf="+dt_id[1];
                    document.location.target = "_blank";
                    document.location.href=url_g;
                }

              }

            })
          });
          $(document).ready(function() {
            $('#ckbcheckAllF').click(function () {
              $('.checkBoxF').prop('checked',$(this).prop('checked'));
            });
          });
          $(document).ready(function() {
            $('#ckbcheckAllG').click(function () {
              $('.checkBoxG').prop('checked',$(this).prop('checked'));
            });
          });
          $(document).ready(function() {
            $('#ckbcheckAllD').click(function () {
              $('.checkBoxD').prop('checked',$(this).prop('checked'));
            });
          });
          $(document).ready(function() {
            $('#ckbcheckAllR').click(function () {
              $('.checkBoxR').prop('checked',$(this).prop('checked'));
            });
          });
        </script>
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
