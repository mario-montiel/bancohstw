
var botonsini = document.getElementById("aceptar");
var buro_boton = document.getElementById("buro_boton");
var formesito = document.getElementById("formesito");
var formsito2 = document.getElementById("formsito2")

buro_boton.style.display = "none"
formsito2.style.display = "none"
formesito.style.display = "none"

function buro(){
	botonsini.disabled = false;
}

function credito(){
	botonsini.disabled = true;
	buro_boton.style.display = "block"
	formesito.style.display = "none"
	formsito2.style.display = 'block'
}

function debito(){
	botonsini.disabled = false;
	buro_boton.style.display = "none"
	formesito.style.display = "block"
	formsito2.style.display = "none"
}