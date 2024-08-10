<?php include('cabecera.php'); include('menu.php');?>
<div class="contenido">
<div class="conten_info_perfil">
  <div class="conten_info_perfil_direccion">
    <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.016993462357!2d-79.89378738564338!3d-2.149636998433064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d0a1c73cac1%3A0x68a2c93a783ab07a!2sGlobal%20Interprice%20Courier%20Intercourier%20S.A.!5e1!3m2!1ses-419!2sec!4v1573248136438!5m2!1ses-419!2sec"  allowfullscreen=""></iframe>

    </div>
    <div class="content_tarifas_perfil">
      <br><br>
      <h3>Dirección de Oficina Guayaquil</h3>
      <p><b>Empresa :</b>GLOBAL INTERPRICE COURIER INTERCOURIER S.A. </p>
      <p><b>Dirección : </b> S6, Guillermo Pareja, MZ94, Garzota, Centro, Guayaquil 090505 </p>
      <p><b>Correo : </b> erosales@globalintercourier.com</p>
      <p><b>Correo : </b> compras@globalintercourier.com</p>
      <p><b>Celular: </b><a href="telf:0959761013"><i class="fas fa-phone-volume"></i> 0959761013</a><b> whatsapp : </b><a href="https://api.whatsapp.com/send?phone=593959761013&text=Contactanos%20acesoria%20GRATUITA" class="ico-whatsapp"> <i class="fab fa-whatsapp"></i> 0959761013</a></p>

      <br><br>

    </div>
  </div>
  <div class="conten_info_perfil_datos">
    <div class="content_tarifas_perfil2">
      <?php
      include('conexion.php');
      $id_su=$_SESSION['ID_usu'];
      $consul=mysqli_query($con,"SELECT * from registro_usuario where ru_id='$id_su'");
      $row=mysqli_fetch_assoc($consul);


       ?>
      <h3>Datos Personales</h3>
      <a href="#" id="abrir4" class="edit_usu">Editar <i class="fas fa-user-edit"></i></a>
      <p><b>TIPO DE USUARIO:</b><?php echo $row['ru_tipo_usu']; ?></p>
      <p><b>NOMBRES: </b><?php echo $row['ru_nombres']; ?> </p>
      <p><b>APELLIDO : </b> <?php echo $row['ru_apellidos']; ?> </p>
      <p><b>CEDULA : </b> <?php echo $row['ru_numero_id']; ?></p>
      <p><b>CORREO: </b>  <?php echo $row['ru_correo']; ?></p>
      <p><b>CELULAR: </b> <?php echo $row['ru_celular']; ?></p>
      <p><b>DIRECCIÓN: </b><?php echo $row['ru_direccion']; ?> </p>

      <br><br>

    </div>
  </div>

</div>



<!-- MODAL REGISTRAR PAQUETES -->
<div id="mimodal4" class="modal4">
  <?php
  include('conexion.php');
  $id=$_SESSION['ID_usu'];
  $ejec4=mysqli_query($con,"SELECT * FROM registro_usuario WHERE ru_id='$id'");
  $row4=mysqli_fetch_array($ejec4);
  ?>
  <div class="flex4" id="flex4">
    <div class="contenido_modal4">
      <div class="modal_header4 flex4">
        <div class="titulo_modal4"><h2>Modificar datos</h2></div>
        <div class="cerrar_modal4"><span class="close4" id="close4">&times;</span></div>
      </div>
      <div class="modal_body4">


        <form action="modificar_perfil.php?id=<?php echo $id; ?>" name="f1"  method="post">
          <div class="row_form">
            <div class="colum_form">
              <label for="categoria">Provincia</label>

              <select name=pais onchange="cambia_provincia2()" id="pais">
                <option><?php echo $row4['ru_departamento']; ?>
                <option value="1">Azuay
                <option value="2">Bolívar
                <option value="3">Cañar
                <option value="4">Carchi
                <option value="5">Chimborazo
                <option value="6">Cotopaxi
                <option value="7">El Oro
                <option value="8">Esmeraldas
                <option value="9">Galápagos
                <option value="10">Guayas
                <option value="11">Imbabura
                <option value="12">Loja
                <option value="13">Los Ríos
                <option value="14">Manabí
                <option value="15">Morona Santiago
                <option value="16">Napo
                <option value="17">Orellana
                <option value="18">Pastaza
                <option value="19">Pichincha
                <option value="20">Santa Elena
                <option value="21">Santo Domingo
                <option value="22">Sucumbíos
                <option value="23">Tungurahua
                <option value="24">Zamora Chinchipe
              </select>


            </div>
            <div class="colum_form">
              <label for="categoria">ciudad</label>
              <select name=provincia id="ciudad">
                <option><?php echo $row4['ru_ciudad']; ?>
              </select>
            </div>
          </div>
          <div class="row_form">
            <div class="row_form_lg">
              <label for="nombre">Direcciom</label>
              <input type="text" name="direccion" value="<?php echo $row4['ru_direccion']; ?>" id="direccion" placeholder="">
            </div>
          </div>
          <div class="row_form">
            <div class="colum_form">
              <label for="nombre">Telefono</label>
              <input type="text" name="telefono" value="<?php echo $row4['ru_telefono']; ?>" id="telefono" placeholder="">
            </div>
            <div class="colum_form">
              <label for="nombre">Celular</label>
              <input type="text" name="celular" value="<?php echo $row4['ru_celular']; ?>" id="celular" placeholder="">
            </div>
          </div><hr><br>
  <script type="text/javascript">

    var provincias_1=new Array("Seleccione...","Camilo Ponce","Chordeleg","Cuenca","El Pan","Giron","Guachapala", "Gualaceo","Nabon","Oña","Paute","Pucara","San Fernando","Santa Isabel","Sevilla de Oro","Sigsig","...")
    var provincias_2=new Array("Seleccione...","Bolivar","Garcia Moreno","Los Andes","Monte Olivo","San Rafael", "San Vicente de Pusir","...")
    var provincias_3=new Array("Seleccione...","Azoques","Biblian","Cañar","Deleg","La Troncal","Suscal","Tambo","...")
    var provincias_4=new Array("Seleccione...","Bolivar","Espejo","Mira","Montufar","San Pedro de Huaca","Tulcan","...")
    var provincias_5=new Array("Seleccione...","Alausi","Chambo","Chunchi","Colta","Cumanda","Guamote","Guano","Pallatanga","Penipe","Riobamba","...")
    var provincias_6=new Array("Seleccione...","La Mana","Latacunga","Pangua","Pujil","Salcedo","Saquisili","Sigchos","...")
    var provincias_7=new Array("Seleccione...","Arenillas","Atahualpa","Balsas","Chilla","El Guabo","Huaquillas","Las Lajas","Machala","Marcabeli","Pasaje","Piñas","Portoviejo","Santa Rosa","Zaruma","...")
    var provincias_8=new Array("Seleccione...","Atacames","Eloy Alfaro","Esmeraldas","Muisne","Quinindé","Rioverde","San Lorenzo","...")
    var provincias_9=new Array("Seleccione...","Isabela","San Cristobal","Santa Cruz","...")
    var provincias_10=new Array("Seleccione...","Jujan","Balao","Balzar","Colimes","Daule","Duran","El Triunfo","El Empalme","Bucay","Playas","Guayaquil","Isidro Ayora","Lomas de Sargentillo","Marcelino Maridueña","Milagro","Naranjal","Naranjito","Nobol","Palestina","Pedro Carbo","Samborondon","Santa Lucia","Simon Bolivar","Salitre","Yaguachi","...")
    var provincias_11=new Array("Seleccione...","Atuntaqui","Cotacachi","Ibarra","Otavalo","Pimampiro","Urcuqui","...")
    var provincias_12=new Array("Seleccione...","Cariamanga","Catamayo","Celica","Chaguarpamba","Espindola","Gonzanama","Loja","Macara","Olmedo","Catacocha","Pindal","Puyango","Quilanga","Saraguro","Sozoranga","Zapotillo","...")
    var provincias_13=new Array("Seleccione...","Baba","Babahoyo","Buena Fe","Mocache","Montalvo","Palenque","Pueblo Viejo","Quevedo","Urdaneta","Valencia","Ventanas","Vinces","...")
    var provincias_14=new Array("Seleccione...","Bolivar","Chone","El Carmen","Flavio Alfaro","Jama","Jaramijo","Jipijapa","Junin","Manta","Montecristi","Olmedo","Pajan","Pedernales","Pichincha","Portoviejo","Puerto Lopez","Rocafuerte","San Vicente","Santa Ana","Sucre","Tosagua","...")
    var provincias_15=new Array("Seleccione...","Gualaquiza","Huamboya","Limon-indanza","Logroño","Morona","Pablo VI","Palora","San Juan Bosco","Santiago","Sucua","Taisha","Tiwinza","...")
    var provincias_16=new Array("Seleccione...","Aguarico","Archidona","Carlos J. Arosemana","El Chaco","Quijos","Tena","...")
    var provincias_17=new Array("Seleccione...","Aguarico","La Joya de los Sachas","Loreto","Orellana","...")
    var provincias_18=new Array("Seleccione...","Arajuno","Canelos","Curacay","Diez de Agosto","El Triunfo","Fatima","Montalvo","Pomona","Puyo","Rio Corrientes","Rio Tigre","Santa Clara","Sarayacu","Simon Bolivar","Tarqui","Teniente Hugo Ortiz","Veracruz","...")
    var provincias_19=new Array("Seleccione...","Cayambe","Mejia","Pedro Moncayo","Pedro Vicente Maldonado","Puerto Quito","Quito","Rumiñahui","San Miguel","...")
    var provincias_20=new Array("Seleccione...","La Libertad","Salinas","Santa Elena","...")
    var provincias_21=new Array("Seleccione...","Santo Domingo","Chiguilpe","Río Verde","Bombolí","Zaracay","Abraham Calazacón","Río Toachi","...")
    var provincias_22=new Array("Seleccione...","Cascales","Cuyabeno","Gonzalo Pizarro","Lago Agrio","Putumayo","Shushufindi","Sucumbios","...")
    var provincias_23=new Array("Seleccione...","Ambato","Baños de Agua Santa","Cevallos","Mocha","Patate","Quero","San Pedro de Pelileo","Santiago de Pillaro","Tisaleo","...")
    var provincias_24=new Array("Seleccione...","Centinela del Condor","Chinchipe","El Pangui","Nangaritza","Palanda","Yacuambi","Yantzaza","Zamora","...")

    var todasProvincias = [
        [],
        provincias_1,
        provincias_2,
        provincias_3,
        provincias_4,
        provincias_5,
        provincias_6,
        provincias_7,
        provincias_8,
        provincias_9,
        provincias_10,
        provincias_11,
        provincias_12,
        provincias_13,
        provincias_14,
        provincias_15,
        provincias_16,
        provincias_17,
        provincias_18,
        provincias_19,
        provincias_20,
        provincias_21,
        provincias_22,
        provincias_23,
        provincias_24,
    ];
    function cambia_provincia2(){
      //tomo el valor del select del pais elegido
      var pais
      pais = document.f1.pais[document.f1.pais.selectedIndex].value
      //miro a ver si el pais está definido
      if (pais != 0) {
          //si estaba definido, entonces coloco las opciones de la provincia correspondiente.
          //selecciono el array de provincia adecuado
          mis_provincias=todasProvincias[pais]
          //calculo el numero de provincias
          num_provincias = mis_provincias.length
          //marco el número de provincias en el select
          document.f1.provincia.length = num_provincias
          //para cada provincia del array, la introduzco en el select
          for(i=0;i<num_provincias;i++){
            document.f1.provincia.options[i].value=mis_provincias[i]
            document.f1.provincia.options[i].text=mis_provincias[i]
          }
      }else{
          //si no había provincia seleccionada, elimino las provincias del select
            document.f1.provincia.length = 1
            //coloco un guión en la única opción que he dejado
            document.f1.provincia.options[0].value = "Seleccione..."
            document.f1.provincia.options[0].text = "Seleccione..."
        }
        //marco como seleccionada la opción primera de provincia
        document.f1.provincia.options[0].selected = true
    }

  </script>
          <div class="row_form">
            <div class="colum_form">
              <label for="numtracking">Nueva contraseña</label>
              <input type="text" name="nue_clave" id="nue_clave" placeholder="">
            </div>
            <div class="colum_form">
              <label for="remitente">Confirmar contraseña</label>
              <input type="text" name="confi_clave" id="confi_clave" placeholder="">
            </div>
          </div>
          <div class="botones_modal">
  <script type="text/javascript">
    $(document).on('keyup','#confi_clave',function() {
      var nue_clave=document.getElementById('nue_clave').value;
      var confi_clav=document.getElementById('confi_clave').value;
      if (nue_clave==confi_clav) {
        document.getElementById('registrar').disabled=false;
        $("#confi_clave").css({
          "border": "1px solid #A7A5A5"
        });
      }else{
        document.getElementById('registrar').disabled=true;
        $("#confi_clave").css({
          "border": "1px solid #ff0000"
        });
      }
    })



    $(document).on('keyup','#direccion',function() {
      var pais=document.getElementById('pais').value;
      var ciudad=document.getElementById('ciudad').value;
      var direccion=document.getElementById('direccion').value;
      if (pais!="" && ciudad!="" && direccion!="") {
        document.getElementById('registrar').disabled=false;
        $("#direccion").css({
          "border": "1px solid #A7A5A5"
        });
        $("#ciudad").css({
          "border": "1px solid #A7A5A5"
        });
        $("#pais").css({
          "border": "1px solid #A7A5A5"
        });
      }else{
        document.getElementById('registrar').disabled=true;
        $("#direccion").css({
          "border": "1px solid #ff0000"
        });
        $("#ciudad").css({
          "border": "1px solid #ff0000"
        });
        $("#pais").css({
          "border": "1px solid #ff0000"
        });
      }
    })
  </script>

            <input class="registrar" id="registrar" type="submit" value="Registrar" disabled>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="js/modal4.js"></script>


</div>
<?php include('footer.php'); ?>

  </body>
</html>
