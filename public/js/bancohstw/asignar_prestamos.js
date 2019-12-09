setTimeout(function() {
    $("p").fadeOut(3000);
},3000);

var asig_nombre = document.getElementById("form_asignar_nombre")
var asig_curp = document.getElementById("form_asignar_curp")
var asig_rfc = document.getElementById("form_asignar_rfc")
var asig_num_cli = document.getElementById("asig_num_cli")
var asig_option = document.getElementById("asig_option").selected = "selected"
var btn_asignar_prestamos = document.getElementById('btn_asignar_prestamos')
// var form_group_num_cli = d

asig_nombre.style.display = "none"
asig_curp.style.display = "none"
asig_rfc.style.display = "none"
asig_num_cli.style.display = "none"
btn_asignar_prestamos.style.display = "none"
// numero_cliente
function verificacion() {

    var verificacion = document.getElementById("seleccion_opcion").value
    btn_asignar_prestamos.style.display = "block"
    // 
    
    // asig_num_cli.style.display = "block"

    if (verificacion == "asig_nombre") {
        asig_num_cli.style.display = "none"
        asig_nombre.style.display = "block"
        asig_curp.style.display = "none"
        asig_rfc.style.display = "none"
        
    }
    else if (verificacion == "asig_num_cliente") {
        asig_num_cli.style.display = "block"
        asig_nombre.style.display = "none"
        asig_curp.style.display = "none"
        asig_rfc.style.display = "none"
        // $('#nombre_cliente').val() = ""
    }
    else if (verificacion == "asig_curp") {
        asig_num_cli.style.display = "none"
        asig_nombre.style.display = "none"
        asig_curp.style.display = "block"
        asig_rfc.style.display = "none"
    }
    else if (verificacion == "asig_rfc") {
        asig_num_cli.style.display = "none"
        asig_nombre.style.display = "none"
        asig_curp.style.display = "none"
        asig_rfc.style.display = "block"
    }
}

// $('#btn_asignar_prestamos').click(function(){
//     alert("hey")
// });