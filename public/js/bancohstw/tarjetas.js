
var botonsini = document.getElementById("aceptar");
var buro_boton = document.getElementById("buro_boton");

buro_boton.style.display = "none"

function buro(){
	botonsini.disabled = false;
}

function credito(){
	botonsini.disabled = true;
	buro_boton.style.display = "block"
}

function debito(){
	botonsini.disabled = false;
	buro_boton.style.display = "none"
}