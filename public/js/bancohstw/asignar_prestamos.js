setTimeout(function() {
    $("p").fadeOut(1500);
},3000);

var asig_nombre = document.getElementById("form_asignar_nombre")
var asig_curp = document.getElementById("form_asignar_curp")
var asig_rfc = document.getElementById("form_asignar_rfc")
var asig_option = document.getElementById("asig_option").selected = "selected"

asig_nombre.style.display = "none"
asig_curp.style.display = "none"
asig_rfc.style.display = "none"

function verificacion() {

    var verificacion = document.getElementById("seleccion_opcion").value

    if (verificacion == "asig_nombre") {
        // alert("hey")
        asig_nombre.style.display = "block"
        asig_curp.style.display = "none"
        asig_rfc.style.display = "none"

    }
    else if (verificacion == "asig_curp") {
        asig_nombre.style.display = "none"
        asig_curp.style.display = "block"
        asig_rfc.style.display = "none"
    }
    else if (verificacion == "asig_rfc") {
        asig_nombre.style.display = "none"
        asig_curp.style.display = "none"
        asig_rfc.style.display = "none"
    }
}