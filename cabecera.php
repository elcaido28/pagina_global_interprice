<?php session_start();
if (isset($_SESSION['CMIG'])) {
  $cod_migrante=$_SESSION['CMIG'];
}else{
  $cod_migrante="";
  session_unset();
  unset($_SESSION['ID_usu']);
  unset($_SESSION['NU']);
  unset($_SESSION['NUID']);
  session_destroy();
}
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo_global.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arimo:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/animaciones_estilos.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/modal2.css">
    <link rel="stylesheet" href="css/modal3.css">
    <link rel="stylesheet" href="css/modal4.css">
    <link rel="stylesheet" href="css/cssclave.css">
    <link rel="stylesheet" href="css/modal_pro.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/main.js"></script>
    <script src="js/validarcajas.js"></script>
    <script src="js/validarcedulas.js"></script>
    <title></title>
  </head>
  <body>
<header class="cabecera">
  <div class="logo">
    <a href="index.php"><img src="img/logo_global.png" alt="" class="img_logo"></a>
  </div>
  <div class="content_partes">
    <div class="parte1">
      <div class="logo">
        <a href="index.php"><img src="img/logo_global.png" alt="" class="img_logo"></a>
      </div>
      <i class="fas fa-bars fa-2x" id="ico_menu"></i>

      <p>Mostrando los precios en </p><div class="caja"><select class="combo1"> <option value="">  dólares americanos</option> </select> </div>  <div class="caja2"><select class="combo2"> <option value="">Ayuda</option>
        <option>Preguntas frecuentes</option><option>Contactanos</option> </select> </div> <button type="button"  class="btn_ini_sesion" name="button"><i class="fas fa-user"></i> <a href="#" id="abrir2">
          <?php if(isset($_SESSION['NU'])){echo "Hola ".$_SESSION['NU']; }else{ echo " Iniciar seción"; }  ?> </a></button>
    </div>
    <div class="parte2">
      <button type="button"  class="btn_ini_sesion" name="button"><i class="fas fa-user"></i> <a href="#" id="abrir5">
        <?php if(isset($_SESSION['NU'])){echo "Hola ".$_SESSION['NU']; }else{ echo " Iniciar seción"; }  ?> </a></button>
          <img src="img/courier_banner.jpg" alt="">
          <?php if(!isset($_SESSION['NU'])){ ?>
          <button type="button" class="btn_crear_cuenta" name="button"> <a href="crear_cuenta.php">Crear Cuenta</a></button>
        <?php } ?>
    </div>
  </div>
  <div class="parte_baja">


     <a href="index.php" class="Market_inicio"><i class="fas fa-home"></i> Inicio </a>
     <a href="https://www.amazon.com/" target="_blank" class="ing_link_paginas"><img src="img/amazon.png" alt="" ></a>
     <a href="https://www.aliexpress.com/" target="_blank" class="ing_link_paginas2"><img src="img/aliexpress.png" alt="" ></a>
     <a href="https://www.walmart.com/" target="_blank" class="ing_link_paginas2"><img src="img/walmarts.png" alt="" ></a>
     <a href="https://www.ebay.com/" target="_blank" class="ing_link_paginas2"><img src="img/ebay.png" alt="" ></a>
     <a href="https://www.bestbuy.com/" target="_blank" class="ing_link_paginas2"><img src="img/bestbuy.png" alt="" ></a>
     <a href="https://oldnavy.gap.com/browse/home.do?ssiteID=BR" target="_blank" class="ing_link_paginas2"><img src="img/oldnavy.png" alt="" ></a>
     <a href="https://www.gap.com/browse/home.do?ssiteID=ON" target="_blank" class="ing_link_paginas2"><img src="img/gap.png" alt="" ></a>
     <a href="https://www.levi.com/US/en_US/" target="_blank" class="ing_link_paginas2"><img src="img/levis.png" alt="" ></a>
     <a href="https://www.carters.com/" target="_blank" class="ing_link_paginas2"><img src="img/carter.png" alt="" ></a>
     <a href="https://www.6pm.com/" target="_blank" class="ing_link_paginas2"><img src="img/6pm.png" alt="" ></a>
     <a href="https://ww.victoriassecret.com/es/?gclid=EAIaIQobChMIz5mI06q45QIVBHiGCh2pBQYZEAAYASAAEgKFo_D_BwE&gclsrc=aw.ds" target="_blank" class="ing_link_paginas2"><img src="img/victoria.png" alt="" ></a>

  </div>

</header>
