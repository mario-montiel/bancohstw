
var botones_credito = document.getElementById("botones_credito");
var formrfc = document.getElementById("formrfc");
var formcurp = document.getElementById("formcurp");
var formnumero = document.getElementById("formnumero");
var formnombre = document.getElementById("formnombre");
var formrfc2 = document.getElementById("formrfc2");
var formcurp2 = document.getElementById("formcurp2");
var formnumero2 = document.getElementById("formnumero2");
var formnombre2 = document.getElementById("formnombre2");
var botones_debito = document.getElementById("botones_debito");

botones_credito.style.display = "none";
formrfc.style.display = 'none';
formcurp.style.display = 'none';
formnumero.style.display = 'none';
formnombre.style.display = 'none';
formrfc2.style.display = 'none';
formcurp2.style.display = 'none';
formnumero2.style.display = 'none';
formnombre2.style.display = 'none';
botones_debito.style.display = 'none';

function botonderfc(){
	formrfc.style.display = "block";
	formcurp.style.display = 'none';
	formnumero.style.display = 'none';
	formnombre.style.display = 'none';
	formrfc2.style.display = 'none';
	formcurp2.style.display = 'none';
	formnumero2.style.display = 'none';
	formnombre2.style.display = 'none';
}

function botoncurp(){
	formrfc.style.display = "none";
	formcurp.style.display = 'block';
	formnumero.style.display = 'none';
	formnombre.style.display = 'none';
	formrfc2.style.display = 'none';
	formcurp2.style.display = 'none';
	formnumero2.style.display = 'none';
	formnombre2.style.display = 'none';
}

function botonnum(){
	formrfc.style.display = "none";
	formcurp.style.display = 'none';
	formnumero.style.display = 'block';
	formnombre.style.display = 'none';
	formrfc2.style.display = 'none';
	formcurp2.style.display = 'none';
	formnumero2.style.display = 'none';
	formnombre2.style.display = 'none';
}

function botonnombre(){
	formrfc.style.display = "none";
	formcurp.style.display = 'none';
	formnumero.style.display = 'none';
	formnombre.style.display = 'block';
	formrfc2.style.display = 'none';
	formcurp2.style.display = 'none';
	formnumero2.style.display = 'none';
	formnombre2.style.display = 'none';
}

function botonderfc2(){
	formrfc.style.display = "none";
	formcurp.style.display = 'none';
	formnumero.style.display = 'none';
	formnombre.style.display = 'none';
	formrfc2.style.display = 'block';
	formcurp2.style.display = 'none';
	formnumero2.style.display = 'none';
	formnombre2.style.display = 'none';
}

function botoncurp2(){
	formrfc.style.display = "none";
	formcurp.style.display = 'none';
	formnumero.style.display = 'none';
	formnombre.style.display = 'none';
	formrfc2.style.display = 'none';
	formcurp2.style.display = 'block';
	formnumero2.style.display = 'none';
	formnombre2.style.display = 'none';
}

function botonnum2(){
	formrfc.style.display = "none";
	formcurp.style.display = 'none';
	formnumero.style.display = 'none';
	formnombre.style.display = 'none';
	formrfc2.style.display = 'none';
	formcurp2.style.display = 'none';
	formnumero2.style.display = 'block';
	formnombre2.style.display = 'none';
}

function botonnombre2(){
	formrfc.style.display = "none";
	formcurp.style.display = 'none';
	formnumero.style.display = 'none';
	formnombre.style.display = 'none';
	formrfc2.style.display = 'none';
	formcurp2.style.display = 'none';
	formnumero2.style.display = 'none';
	formnombre2.style.display = 'block';
}

function credito(){
	botones_credito.style.display = "block";
	botones_debito.style.display = 'none';
}

function debito(){
	botones_credito.style.display = "none";
	botones_debito.style.display = 'block';
}