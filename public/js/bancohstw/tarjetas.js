
var botones_credito = document.getElementById("botones_credito");
var formrfc = document.getElementById("formrfc");
var formcurp = document.getElementById("formcurp");
/*var botonsini = document.getElementById("aceptar");
var buro_boton = document.getElementById("buro_boton");
var formesito = document.getElementById("formesito");
var formsito2 = document.getElementById("formsito2")*/

botones_credito.style.display = "none"
formrfc.style.display = 'none'
formcurp.style.display = 'none'
/*buro_boton.style.display = "none"
formsito2.style.display = "none"
formesito.style.display = "none"*/

function botonderfc(){
	formrfc.style.display = "block";
	formcurp.style.display = 'none'
}

function botoncurp(){
	formrfc.style.display = "none";
	formcurp.style.display = 'block'
}

function credito(){
	botones_credito.style.display = "block"
	/*botonsini.disabled = true;
	buro_boton.style.display = "block"
	formesito.style.display = "none"
	formsito2.style.display = 'block'*/
}

function debito(){
	botones_credito.style.display = "none"
	/*botonsini.disabled = false;
	buro_boton.style.display = "none"
	formesito.style.display = "block"
	formsito2.style.display = "none"*/
}