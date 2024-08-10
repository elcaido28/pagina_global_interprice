<?php include('cabecera.php'); include('menu.php');?>

<div class="contenido">
  <div class="formulario_registrate">
    <form action="">
      <div class="row">
        <h3>Datos</h3>
      </div>
      <div class="row">
        <div class="colum">
          <label for="peso">Peso Aproximado</label>
          <div class="columnx2">
            <input name="peso" id="peso" type="text" placeholder="Ej: 7" maxlength="6" onkeypress="return soloNumeros(event)">
            <select name="unidad" id="unidad"><option value="1">lbs</option><option value="2">kg</option></select>
          </div>
        </div>
        <div class="colum">
          <label for="fob">FOB</label>
          <input name="fob" id="fob" type="text" placeholder="Ej: 250" maxlength="6" onkeypress="return soloNumeros(event)">
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="advaloren">ADVALOREN</label>
          <select name="advaloren" id="advaloren"><option value="0">0%</option><option value="5">5%</option><option value="10">10%</option><option value="15">15%</option><option value="20">20%</option><option value="25">25%</option><option value="30">30%</option></select>
        </div>
        <div class="colum">
          <label for="salvaguarda">SALVAGUARDA</label>
          <select name="salvaguarda" id="salvaguarda"><option value="0">0%</option><option value="5">5%</option><option value="10">10%</option><option value="25">25%</option><option value="11">11.7%</option></select>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="ice">ICE</label>
          <select name="ice" id="ice"><option value="0">0%</option><option value="10">10%</option><option value="15">15%</option><option value="20">20%</option><option value="35">35%</option><option value="100">100%</option><option value="150">150%</option><option value="300">300%</option></select>
        </div>
        <div class="colum">
          <label for="multa">Multa</label>
          <input name="multa" id="multa" type="text" placeholder="Multa" maxlength="5" onkeypress="return soloNumeros(event)">
        </div>
      </div><br>
      <div class="centrar_boton">
        <input type="button" id="btnenviar" value="Calcular" onclick="calcular()">
        <input type="button" id="btnnuevo" value="Nuevo" onclick="nuevo()">
      </div>
      <hr>
      <br>
      <h3>Detalle</h3>
      <div class="row">
        <div class="colum">
          <label for="resultado">Flete</label>
          <input name="flete" id="flete" type="text" placeholder="Flete" disabled>
        </div>
        <div class="colum">
          <label for="seguro">Seguro</label>
          <input name="seguro" id="seguro" type="text" placeholder="Seguro" disabled>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="cif">CIF</label>
          <input name="cif" id="cif" type="text" placeholder="Cif" disabled>
        </div>
        <div class="colum">
          <label for="baseice">Base ICE</label>
          <input name="baseice" id="baseice" type="text" placeholder="Base ICE" disabled>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="adv">Advaloren</label>
          <input name="adv" id="adv" type="text" placeholder="Advaloren" disabled>
        </div>
        <div class="colum">
          <label for="salvg">Salvaguarda</label>
          <input name="salvg" id="salvg" type="text" placeholder="Salvaguarda" disabled>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="fodinfa">Fodinfa</label>
          <input name="fodinfa" id="fodinfa" type="text" placeholder="Fodinfa" disabled>
        </div>
        <div class="colum">
          <label for="icee">ICE</label>
          <input name="icee" id="icee" type="text" placeholder="ICE" disabled>
        </div>
      </div>
      <div class="row">
        <div class="colum">
          <label for="iva">IVA</label>
          <input name="iva" id="iva" type="text" placeholder="IVA" disabled>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="colum"></div>
        <div class="colum">
          <label for="total">TOTAL</label>
          <input name="total" id="total" type="text" placeholder="Total" disabled>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  function nuevo(){
    document.getElementById('peso').value="";
    document.getElementById('unidad').value="";
    document.getElementById('fob').value="";
    document.getElementById('advaloren').value="";
    document.getElementById('salvaguarda').value="";
    document.getElementById('ice').value="";
    document.getElementById('multa').value="";
  }
</script>
<script>
  function calcular(){
    // cajas de datos
    var peso = document.getElementById('peso').value;
    var unidadpeso = document.getElementById('unidad').value;
    var fob = document.getElementById('fob').value;
    var advaloren = document.getElementById('advaloren').value;
    var salvaguarda = document.getElementById('salvaguarda').value;
    var ice = document.getElementById('ice').value;
    var multa = document.getElementById('multa').value;
    if(multa==""){
      multa = 0;
    }
    // cajas de resultado
    var cajaflete = document.getElementById('flete');
    var cajaseguro = document.getElementById('seguro');
    var cajacif = document.getElementById('cif');
    var cajabaseice = document.getElementById('baseice');
    var cajaadv = document.getElementById('adv');
    var cajasalvg = document.getElementById('salvg');
    var cajafodinfa = document.getElementById('fodinfa');
    var cajaice = document.getElementById('icee');
    var cajaiva = document.getElementById('iva');
    var cajatotal = document.getElementById('total');
    var valorflete, valorseguro, valorcif, valorbaseice, valoradv, valorsalvg, valorfodinfa, valorice, valoriva, valormulta, valortotal;
    // alert ('peso '+peso+', unidad '+unidadpeso+', fob '+fob+', advaloren '+advaloren+', salvaguarda '+salvaguarda+', ice '+ice);
    if ((peso!="") && (unidadpeso!="") && (fob!="") && (advaloren!="") && (salvaguarda!="") && (ice!="")) {
      if (unidadpeso==1) { //1lbs, 2 kg
        valorflete = (peso/2.205)*1.5;
      }else{
        valorflete = peso*1.5;
      }
    }
    // calculos
    valorseguro = (parseFloat(fob)+parseFloat(valorflete))*0.01;
    valorcif = parseFloat(fob)+parseFloat(valorflete)+parseFloat(valorseguro);
    switch(advaloren){
      case '0': valoradv = parseFloat(valorcif)*0;
      break;
      case '5': valoradv = parseFloat(valorcif)*0.05;
      break;
      case '10': valoradv = parseFloat(valorcif)*0.10;
      break;
      case '15': valoradv = parseFloat(valorcif)*0.15;
      break;
      case '20': valoradv = parseFloat(valorcif)*0.20;
      break;
      case '25': valoradv = parseFloat(valorcif)*0.25;
      break;
      case '30': valoradv = parseFloat(valorcif)*0.30;
      break;
      default: alert('escoja una opcion');
    }
    switch(salvaguarda){
      case '0': valorsalvg = parseFloat(valorcif)*0;
      break;
      case '5': valorsalvg = parseFloat(valorcif)*0.05;
      break;
      case '10': valorsalvg = parseFloat(valorcif)*0.10;
      break;
      case '25': valorsalvg = parseFloat(valorcif)*0.25;
      break;
      case '11': valorsalvg = parseFloat(valorcif)*0.117;
      break;
      default: alert('escoja una opcion');
    }
    valorfodinfa = parseFloat(valorcif)*0.005;
    valorbaseice = (parseFloat(valorcif)+parseFloat(valoradv)+parseFloat(valorsalvg)+parseFloat(valorfodinfa))*1.25;
    switch(ice){
      case '0': valorice = parseFloat(valorbaseice)*0;
      break;
      case '10': valorice = parseFloat(valorbaseice)*0.10;
      break;
      case '15': valorice = parseFloat(valorbaseice)*0.15;
      break;
      case '20': valorice = parseFloat(valorbaseice)*0.20;
      break;
      case '35': valorice = parseFloat(valorbaseice)*0.35;
      break;
      case '100': valorice = parseFloat(valorbaseice)*1;
      break;
      case '150': valorice = parseFloat(valorbaseice)*1.5;
      break;
      case '300': valorice = parseFloat(valorbaseice)*3;
      break;
      default: alert('escoja una opcion');
    }
    valoriva = (parseFloat(valorcif)+parseFloat(valoradv)+parseFloat(valorsalvg)+parseFloat(valorfodinfa)+parseFloat(valorice))*0.14;
    valormulta = parseFloat(multa);
    valortotal = (parseFloat(valoradv)+parseFloat(valorsalvg)+parseFloat(valorfodinfa)+parseFloat(valorice)+parseFloat(valoriva)+parseFloat(valormulta));
    // muestro datos en cajas
    cajaflete.value = valorflete.toFixed(2);
    cajaseguro.value = valorseguro.toFixed(2);
    cajacif.value = valorcif.toFixed(2);
    cajaadv.value = valoradv.toFixed(2);
    cajasalvg.value = valorsalvg.toFixed(2);
    cajafodinfa.value = valorfodinfa.toFixed(2);
    cajabaseice.value = valorbaseice.toFixed(2);
    cajaice.value = valorice.toFixed(2);
    cajaiva.value = valoriva.toFixed(2);
    cajatotal.value = '$ '+valortotal.toFixed(2);
  }
</script>
<?php include('footer.php'); ?>
<script src="js/jquery.js" charset="utf-8"></script>
  </body>
</html>
