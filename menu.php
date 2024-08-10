<?php if(isset($_SESSION['TIPOU']) && $_SESSION['TIPOU']!="3"  || !isset($_SESSION['TIPOU'])){?>
<nav class="menu" id="menu">
 <ul>


   <?php if(isset($_SESSION['ID_usu'])){?>
   <li><a href="perfil.php"><i class="far fa-id-card"></i>  Perfil</a></li>
 <?php }else{ ?>
   <li> <a href="crear_cuenta.php"><i class="fas fa-user"></i>  Crear Cuenta</a> </li>
 <?php } ?>
   <li><a href="http://www.fasterservicescorp.com/rastrea-tu-envio.php"><i class="fas fa-location-arrow"></i>  Rastreo de Paquetes</a></li>
   <li><a href="calculadora.php"><i class="fas fa-calculator"></i>  Calculadora</a></li>
   <li><a href="4x4.php"><i class="fas fa-box-open"></i> Paqueteria  4 X 4 o Categoria “B”</a></li>
   <li><a href="courier_empresarial.php"><i class="fas fa-toolbox"></i> Courier  Empresarial / Comercial</a></li>
   <li><a href="testimonios.php"><i class="fas fa-comment"></i>  Testimonios</a></li>
   <?php if(isset($_SESSION['ID_usu'])){?>
     <li><a href="mis_paquetes.php"><i class="fas fa-box-open"></i></i>  Mis Paquetes</a></li>
   <li><a href="salir.php"><i class="fas fa-power-off"></i>  Cerrar sesión</a></li>
 <?php } ?>
 </ul>
</nav>



<!-- <!-- MODAL INICIAR SESION -->
<div id="mimodal2" class="modal2">
  <div class="flex2" id="flex2">
    <div class="contenido_modal2">
      <div class="modal_header2 flex2">
        <div class="titulo_modal2"><h2>Inicia Sesión</h2></div>
        <div class="cerrar_modal2"><span class="close2" id="close2">&times;</span></div>
      </div>
      <div class="modal_body2">
        <form action="login.php" method="POST" enctype="multipart/form-data">
          <div class="row_modal">
            <label  class="lblmodal" for="usuario">Email</label> <input type="text" id="usuario" name="usuario" placeholder="Ej: carlos@gmail.com" class="txtmod">
          </div>
          <div class="row_modal">
            <label class="lblmodal" for="clave">Contraseña</label>
            <div class="columx2">
              <input type="password" id="clave" name="clave" class="txtmod" maxlength="16"><button class="boton_ver_clave" type="button"><i class="fas fa-eye"></i></button>
            </div>
          </div>
          <div class="centrarbtn"><input type="submit" value="Entrar" class="btng" onClick="comprobarClave()"></div>
          <!-- <div class="centrarbtn"><input type="button" value="Ingresar con Facebook" class="btng2" onClick="comprobarClave()"></div> -->
          <br>
          <div class="centrarbtn"><a href="restablecer_clave.php">He olvidado mi contraseña</a></div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $('.boton_ver_clave').click(function(){
    var caja_clave = document.getElementById('clave');
    var cambio = caja_clave.type;
    if(cambio=="text"){
      $("#clave").attr("type","password");
    }else{
      $("#clave").attr("type","text");
    }

  });
</script>
<script src="js/modal3.js"></script>


<?php if(isset($_SESSION['ID_usu'])){?>
<div class="boton_flotante">
    <a href="#" id="abrir"><i class="fas fa-plus"></i> Registrar Paquete</a>
  </div>
<?php } ?>



<!-- MODAL REGISTRAR PAQUETES -->
<div id="mimodal" class="modal">
  <div class="flex" id="flex">
    <div class="contenido_modal">
      <div class="modal_header flex">
        <div class="titulo_modal"><h2>Registo de Paquetes</h2></div>
        <div class="cerrar_modal"><span class="close" id="close">&times;</span></div>
      </div>
      <div class="modal_body">
        <form name="form" action="guardar_paquete.php" method="POST" enctype="multipart/form-data">
          <div class="row_form">
            <div class="row_form_lg">
              <label for="nombre">Nombre o descripción</label>
              <input type="text" name="nombre" id="nombre" placeholder="Ej: teclado y mouse para pc" onkeypress="return soloLetras(event)" required>
            </div>
          </div>
<script>
    $(document).on('keyup','#nombre', function(){
        var valr= $('#nombre').val();
        if(valr!=""){
          // alert(valr);
          var texto = MaysPrimera(valr);
          document.getElementById('nombre').value=texto;
        }
    });
</script>
          <div class="row_form">
            <div class="colum_form">
              <label for="categoria">Factura de compra</label>
              <input type="file" id="archivo" name="archivo" accept="image/jpeg,.pdf,.png" required>
            </div>
            <div class="colum_form">
              <label for="numtracking">Número de tracking</label>
              <input type="text" name="numtracking" id="numtracking" placeholder="Ej: 498N34" required>
            </div>
          </div>
          <div class="row_form">
            <div class="colum_form">
              <label for="remitente">Remitente</label>
              <input type="text" name="remitente" id="remitente" placeholder="Ej: Amazon" onkeypress="return soloLetras(event)" required>
            </div>
            <div class="colum_form">
              <label for="codigo">Código Migrante (incluir si aplica)</label>
              <input type="text" name="codigo" id="codigo" placeholder="Cédula de migrante" maxlength="10" onkeypress="return soloNumeros(event)" onchange="return check_CedulaMigrante(form)" value="<?php echo $cod_migrante; ?>">
            </div>
          </div>
          <div class="row_form">
            <div class="colum_form">
              <label for="valor">Valor</label>
              <div class="columx2">
                <input type="text" name="valor" id="valor" placeholder="Ej: 25" onkeypress="return soloNumeros(event)" maxlength="6" required>
                <select name="tipomoneda" id="tipomoneda" required>
                  <option value="USD">USD</option>
<!--                   <option value="EUR">EUR</option>
                  <option value="COP">COP</option>
                  <option value="PEN">PEN</option> -->
                </select>
              </div>
            </div>
            <div class="colum_form">
              <label for="origen">Origen</label>
              <select name="origen" id="origen" required>
                <option value="">Por favor seleccione un pais</option>
                <?php
                  include ('conexion.php');
                  $cons1="SELECT * from pais_origen";
                  $ejec1=mysqli_query($con,$cons1);
                  while ($row1=mysqli_fetch_array($ejec1)) {
                    echo "<option value='".$row1['pais_origen_id']."'>";
                    echo $row1['pais_origen_dscrp']; echo "</option>";
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="row_form">
            <div class="colum_form">
              <label>Desea asegurar</label>
              <!-- <select name="categoria" id="categoria" required>
                <option value="">Seleccione Categoría</option>
                <?php/*
                  include ('conexion.php');
                  $cons1="SELECT * from categoria";
                  $ejec1=mysqli_query($con,$cons1);
                  while ($row1=mysqli_fetch_array($ejec1)) {
                    echo "<option value='".$row1['categoria_id']."'>";
                    echo $row1['categoria_dscrp']; echo "</option>";
                  }
                */?>
              </select> -->
              <div class="conte_cont_radiobutton">
                <div class="cont_radiobutton">
                  <label>Si</label><input type="radio" name="Psegura" value="Asegurada">
                </div>
                <div class="cont_radiobutton">
                  <label>No</label><input type="radio" name="Psegura" value="No Asegurada" checked>
                </div>
              </div>
            </div>

          </div>
          <div class="row_form">
            <div class="colum_form_lg">
              <label for="">Observación</label>
              <textarea name="observacion" id="observacion"></textarea>
            </div>
          </div>
          <div class="row_form">
            <div class="colum_form_lg">
              <label>NOTA IMPORTANTE: </label>
              <p>Seguro de Carga: Ofrecemos darle cobertura a sus compras personales a un costo de US $5.00 Exclusivamente por ROBO y/o PÉRDIDA por un monto no mayor de US $400.00. De no contratar séguro, la carga viajara a cuenta y riesgo por parte del cliente.</p>

            </div>
          </div>

          <div class="botones_modal">
            <!-- <input class="cerrar2" type="button" value="Cancelar" id="cerrar2"> -->
            <input class="registrar" type="submit" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="js/modal2.js"></script>
<?php }else{?>



  <nav class="menu">
   <ul>
       <li> Administración </li>
       <li> <a href="lista_clientes.php"><i class="fas fa-user"></i>  Lista de clients</a> </li>
       <li> <a href="lista_paquetes.php"><i class="fas fa-user"></i>  Lista de paquetes</a> </li>
       <li> <a href="lista_comentarios.php"><i class="fas fa-user"></i>  Lista de Comentarios</a> </li>
       <li> <a href="subir_arch_excel.php"><i class="fas fa-user"></i>  Subir Excel </a> </li>
       <li> <a href="lista_reg_excel.php"><i class="fas fa-user"></i>  Ganerar Facturas </a> </li>
       <li> <a href="historia_guia_aerea.php"><i class="fas fa-user"></i>  Guías Aéreas </a> </li>
       <li><a href="salir.php"><i class="fas fa-power-off"></i>  Cerrar sesión</a></li>
   </ul>
  </nav>



<?php } ?>
<script type="text/javascript">
//document.getElementById("menu").style.display = "none";
  function mostrar(){
    document.getElementById("menu").style.display = "block";
    document.getElementById("menu").style.margin = "180px 0 -160px 0";
    }
    function ocultar(){
      document.getElementById("menu").style.display = "none";
      }
    $('#ico_menu').click(function(e){
        var desl= document.getElementById("menu");

        if(desl.style.display =="none"){
          mostrar();
        }else {
          ocultar();
        }
      })
</script>
