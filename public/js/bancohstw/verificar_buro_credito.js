// alert("hola baby")
var form_nom_fecha = document.getElementById("form_nom_fecha")
var form_cliente_fecha = document.getElementById("form_cliente")
var form_cliente_curp = document.getElementById("form_cliente_curp")
var form_cliente_rfc = document.getElementById("form_cliente_rfc")
var option = document.getElementById("option").selected = "selected"

form_nom_fecha.style.display = "none"
form_cliente_fecha.style.display = "none"
form_cliente_curp.style.display = "none"
form_cliente_rfc.style.display = "none"

function verificar_buro_cliente(){
    var tipo_verificacion = document.getElementById("selector_cliente").value
    
    if (tipo_verificacion == "f_n_f"){
        form_nom_fecha.style.display = "block"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "none"
        form_cliente_fecha.style.display = "none"
    }
    else if (tipo_verificacion == "curp"){
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "block"
        form_cliente_rfc.style.display = "none"
        form_cliente_fecha.style.display = "none"
    }
    else if (tipo_verificacion == "rfc"){
        form_nom_fecha.style.display = "none"
        form_cliente_curp.style.display = "none"
        form_cliente_rfc.style.display = "block"
        form_cliente_fecha.style.display = "none"
    }

}


$('.my-select').selectpicker();

$(function () {
    $('select').selectpicker();
});
