function soloNumeros(e) // no
  {
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key);//para solo numeros quitar .toLowerCase()
    numero="0123456789.";
    especial="8-37-38-46-164-13-9-16";
    tecla_especial=false;

    for(var i in especial){
      if(key==especial[i]){
        tecla_especial=true;break;
      }
    }
    if(numero.indexOf(teclado)==-1 && !tecla_especial){
      return false;
    }
}
function soloLetras(e) { // 1
  key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();//para solo numeros quitar .toLowerCase()
    numero=" abcdefghiyjklmnñopqrstuvwxyz_-óíáéú.";
    especial="8-37-38-46-164-13-9-16";
    tecla_especial=false;

    for(var i in especial){
      if(key==especial[i]){
        tecla_especial=true;break;
      }
    }
    if(numero.indexOf(teclado)==-1 && !tecla_especial){
      return false;
    }
}
function validarcorreo(){
  var correo = document.getElementById('email');
  //alert(correo);

  var emailRegex = /^[-\w.%+]{1,64}@(?:[a-zA-z]{3,63}\.){1,125}[a-z]{2,63}$/i;
  if (emailRegex.test(correo.value)) {
    //alert("correo correcto");
  } else {
    alert("Correo no Válido");
    document.getElementById('email').value="";
  }
}
function validarcelular(obj) { 
  nume=0; txt='El celular debe ' 
  num=obj.value.charAt(0);
  if(obj.value.length<10){ 
    nume++; 
    txt+=' tener 10 dígitos '; 
  } 
  if(num!='0') { 
    nume++; 
    txt+= (nume==2) ? 'y ' : ''; 
    txt+= 'empezar por 0'; 
  } 
  if(nume>0) {
    alert(txt); 
    obj.focus; 
  } 
}
function toTitleCase(str){
  return str.replace(/(?:^|\s)\w/g, function(match){
    return match.toUpperCase();
  });
}

function MaysPrimera(string){
  return string.charAt(0).toUpperCase() + string.slice(1);
}