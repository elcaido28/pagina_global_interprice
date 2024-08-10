<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
    <script src="../js/jquery.js" charset="utf-8"></script>
    <title></title>
  </head>
  <body>
     <div class="container">
       <h4>titulo de la seleccion</h4>
       <input type="checkbox" name="" id="ckbcheckAll" value="factura"> Check Todos <hr>
       <div id="checkBoxes">
         <input type="checkbox" class="checkBox" name="" value="rojo">rojo <br>
         <input type="checkbox" class="checkBox" name="" value="amarillo">amarillo <br>
         <input type="checkbox" class="checkBox" name="" value="verde">verde <br>
         <input type="checkbox" class="checkBox" name="" value="blanco">blanco <br>

       </div>
       <input type="button" id="save_value" name="" value="save">

     </div>

     <script type="text/javascript">
       $('#save_value').click(function() {
         var val =[]
         //captura el value de todos lo check chequados
         // $(':checkbox:checked:not(#ckbcheckAll)').each(function(i) {
         $(':checkbox:checked').each(function(i) {
           val[i]=$(this).val();
         });
         alert(val);
         $.ajax({
           type:"POST",
           url:"data.php",
           data:{
             value:val
           },
           success:function(data) {
             console.log(data);
           }
         });
       });
       $(document).ready(function() {
         $('#ckbcheckAll').click(function () {
           $('.checkBox').prop('checked',$(this).prop('checked'));
         });
       });
     </script>
  </body>
</html>
