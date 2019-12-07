
var botonsini = document.getElementById("aceptar");
var buro_boton = document.getElementById("buro_boton");
var formesito = document.getElementById("formesito");

buro_boton.style.display = "none"

function buro(){
	botonsini.disabled = false;
}

function credito(){
	botonsini.disabled = true;
	buro_boton.style.display = "block"
	formesito.style.display = "none"
}

function debito(){
	botonsini.disabled = false;
	buro_boton.style.display = "none"
	formesito.style.display = "block"
}