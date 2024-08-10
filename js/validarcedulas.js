function Cedula(form) 
{
  var numeroide = f1.numeroide.value; 
  array = numeroide.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      //alert( "Datos Guardados Correctamente !" );
      return true;
    }
    else
    {
      alert( "La c\xe9dula NO es v\xe1lida!!!" );
      document.getElementById('numeroide').value="";
      return false;
    }
  }
  else
  {
    alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
    return false;
  }
}
function CedulaMigrante(form) 
{
  var codigo = f1.codigo.value; 
  array = codigo.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      //alert( "Datos Guardados Correctamente !" );
      return true;
    }
    else
    {
      alert( "La c\xe9dula NO es v\xe1lida!!!" );
      document.getElementById('codigo').value="";
      return false;
    }
  }
  else
  {
    alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
    return false;
  }
}