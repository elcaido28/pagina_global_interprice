let modalpro = document.getElementById('mimodalpro');
let flexpro = document.getElementById('flexpro');
//let abrirpro = document.getElementById('abrirpro');
let cerrarpro = document.getElementById('closepro');
var abrirpro=1;

if(localStorage.getItem("unaolav")!="1"){
  var unasola="0";
  localStorage.setItem("unaolav",unasola);
}else{
  var unasola="0";
  localStorage.setItem("unaolav",unasola);
}
// abrirpro.addEventListener('click', function(){
// 	modalpro.style.display = 'block';
// });
if (abrirpro==1 && localStorage.getItem("unaolav")=="0") {
  modalpro.style.display = 'block';
  unasola="1";
  localStorage.setItem("unaolav",unasola);
}
cerrarpro.addEventListener('click', function(){
	modalpro.style.display = 'none';
  unasola="1";
  localStorage.setItem("unaolav",unasola);
  alert(localStorage.getItem("unaolav"));
});
window.addEventListener('click', function(e){
	if(e.target == flexpro){
		modalpro.style.display = 'none';
    unasola="1";
    localStorage.setItem("unaolav",unasola);

	}
});
