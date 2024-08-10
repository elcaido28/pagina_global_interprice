let modal2 = document.getElementById('mimodal2');
let flex2 = document.getElementById('flex2');
let abrir2 = document.getElementById('abrir2');
let abrir5 = document.getElementById('abrir5');
let cerrar2 = document.getElementById('close2');

abrir2.addEventListener('click', function(){
	modal2.style.display = 'block';
});
abrir5.addEventListener('click', function(){
	modal2.style.display = 'block';
});
cerrar2.addEventListener('click', function(){
	modal2.style.display = 'none';
});
cerrar2.addEventListener('click', function(){
	modal2.style.display = 'none';
});
window.addEventListener('click', function(e){
	if(e.target == flex2){
		modal2.style.display = 'none';
	}
});
