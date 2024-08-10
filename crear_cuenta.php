<?php include('cabecera.php'); include('menu.php');?>
<div class="contenido">
  <div class="formulario_registrate">
    <div class="titulo">
      <h3>REGÍSTRATE</h3>
    </div>
    <div class="nota">
      <h3>¿QUIERES HACER COMPRAS EN INTERNET Y RECIBIRLAS EN ECUADOR?</h3>
      <p>Regístrate y realiza tus compras en Amazon, Ebay, Walmart y muchas otras tiendas, luego registra tu paquete y listo cuando llege a nuestras manos recibiras un correo. Y ya ahora podres Retirar tu paquete en nuestra oficina  .</p>
    </div>
    <form name="f1" action="guardar_usuario.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="colum">
          <label for="tipousu">Tipo de Usuario</label><select name="tipousu" id="tipousu"><option value="Persona Natural">Persona Natural</option><option value="Persona Jurídica">Persona Jurídica</option></select>
        </div>
        <div class="colum">
          <label for="nombres">Nombres</label><input type="text" name="nombres" id="nombres" placeholder="Ej: Carlos Walter" onkeypress="return soloLetras(event)" required>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="apellidos">Apellidos</label><input type="text" name="apellidos" id="apellidos" placeholder="Ej: Carlos Walter" onkeypress="return soloLetras(event)" required>
        </div>
<script>
    $(document).on('keyup','#nombres', function(){
        var valr= $('#nombres').val();
        if(valr!=""){
          // alert(valr);
          var texto = toTitleCase(valr);
          document.getElementById('nombres').value=texto;
        }
    });
</script>
<script>
    $(document).on('keyup','#apellidos', function(){
        var valr2= $('#apellidos').val();
        if(valr2!=""){
          // var texto = MaysPrimera(valr.tolowerCase());
          // var texto = MaysPrimera(valr); // solo la primera palabra esta en mayuscula
          var texto2 = toTitleCase(valr2); // todas las palabras empiezan con mayuscula
          document.getElementById('apellidos').value=texto2;
        }
    });
</script>
        <div class="colum">
          <label for="tipoide">Tipo de identificación</label><select name="tipoide" id="tipoide" onchange="cambioTipoIde();" required><option value="">-</option><option value="Cedula">Cédula de ciudadanÍa</option><option value="RUC">RUC</option></select>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="numeroide">Número de Identificación</label><input name="numeroide" id="numeroide" type="text" onkeypress="return soloNumeros(event)" onchange="return Cedula(f1)" maxlength="10">
        </div>
<script>
  function cambioTipoIde(){
    var tipo = document.getElementById('tipoide').value;
    if(tipo!="Cedula"){
      document.getElementById("numeroide").removeAttribute("onchange");
      document.getElementById("numeroide").setAttribute("maxlength","13");

    }else{
      document.getElementById("numeroide").setAttribute("onchange","return Cedula(f1)");
      document.getElementById("numeroide").setAttribute("maxlength","10");
    }
  }
</script>
        <div class="colum">
          <label for="email">Email</label><input name="email" id="email" type="text" placeholder="Ej: john@gmail.com" onchange="validarcorreo()">
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="direccion">Dirección</label><input name="direccion" id="direccion" type="text" placeholder="Ej: Calle 12 #15">
        </div>
        <div class="colum">
          <label for="departamento">Provincia</label>
          <select name=pais onchange="cambia_provincia()">
            <option value="0" selected>Seleccione...
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
      </div>
      <div class="row">
        <div class="colum">
          <label for="ciudad">Ciudad</label>
          <select name=provincia id="ciudad">
            <option value="">Seleccione...</option>
          </select>
        </div>
        <div class="colum">
          <label for="clave">Contraseña</label><input name="clave" id="clave" type="text" placeholder="">
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="telefono">Teléfono</label><input name="telefono" id="telefono" type="text" placeholder="Ej: 42313123" onkeypress="return soloNumeros(event)" maxlength="10" required>
        </div>
        <div class="colum">
          <label for="celular">Celular</label><input name="celular" id="celular" type="text" placeholder="Ej: 42313123" onkeypress="return soloNumeros(event)" maxlength="10" required>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="">Fecha de Nacimiento</label>
          <div class="row2">
            <select name="dia" id="dia"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
            <select name="mes" id="mes"><option value="1">Enero</option><option value="2">Febrero</option><option value="3">Marzo</option><option value="4">Abril</option><option value="5">Mayo</option><option value="6">Junio</option><option value="7">Julio</option><option value="8">Agosto</option><option value="9">Septiembre</option><option value="10">Octubre</option><option value="11">Noviembre</option><option value="12">Diciembre</option></select>
            <select name="year" id="year">
              <option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option>
            </select>
          </div>
        </div>
        <div class="colum"><label for="codigo">Código Migrante(incluir si aplica)</label><input name="codigo" id="codigo" type="text" placeholder="Cédula del Migrante" onkeypress="return soloNumeros(event)" onchange="return Cedula(f1)" maxlength="10"></div>
      </div>
      <div class="centro_1">
        <input type="checkbox" name="chk" id="chke" onclick="checkar()"><label for="chk">He leído y acepto el <a href="#">contrato de servicio</a></label>
      </div>
      <div class="centrar_boton">
        <input type="submit" id="btnenviar" value="Enviar" disabled>
      </div>
      <div class="centro_1">
        <!-- <a href="#">Ya tengo una cuenta</a> -->
      </div>
    </form>
  </div>

  <div class="varia_info">
    <p class="pregunta">Proceso de Importación y Exportación en Ecuador</p>
    <div class="video">
      <iframe width="853" height="480" src="https://www.youtube.com/embed/56KJwvDSfNo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <!-- <div class="info_tres">
      <div class="info1">
        <img src="img/call.jpg" alt=""><p>Asesoría personalizada durante el proceso y servicio post-venta.</p>
      </div>
      <div class="info1">
        <img src="img/market.jpg" alt=""><p>Rastrea tus paquetes 24/7 sin costos adicionales.</p>
      </div>
      <div class="info1">
        <img src="img/carrito.jpg" alt=""><p>Podrás comprar en nuestro marketplace productos de las mejores tiendas del mundo y recibirlos en la comodidad de tu casa.</p>
      </div>
    </div> -->
  </div>
</div>
<br>
<?php include('footer.php'); ?>

<script>
  function checkar() {
    var ch = document.getElementById('chke').checked;
    if(ch == true){
      document.getElementById('btnenviar').disabled=false;
    }else{
      document.getElementById('btnenviar').disabled=true;
    }
    // document.getElementById('cost').value=costo.toFixed(2);
}
</script>

<script>
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
  function cambia_provincia(){
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
  </body>
</html>
